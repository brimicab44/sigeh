<!--@Header--> 
<?php
  include("../path_maps/header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        #map { 
  width: 100%;
  height: 100vh;
  box-shadow: 5px 5px 5px #888;
}

.boton{
  
  background: #00000;
  color:#fff;
  font-size: 12px;
  text-decoration: none;
  margin:10px 10px;
  padding: 5px 10px;
  display: inline-block;
  border-radius: 4px;
}
.boton:hover{
  opacity: 0.6;
  font-style: oblique;
  background: #1b09bd;
  color: #fff;

}
.info{
  align-content: center;
  text-align-last: center;  
  background: #e2d9d9;
  color:#0f0f0f;
  width: 100%;
  padding: 0%;
  margin: 0%;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 14px;
}
.imagen01{
    margin: 10px 10px;
}
</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" charset="UTF-8">
	<script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
	<script type="text/javascript" src="Municipios.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/Leaflet/Leaflet.legend/v1.0.0/dist/leaflet-legend.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.css" integrity="sha512-Z2xWcFNBEiA5f5msfsyt5gX8W/jaH5GItBxs10f13GKf8W75OWt/mvCQewY7Vq3ys8Wd7Vb/L/yhZKlN0ahW/g==" crossorigin=""/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.js" integrity="sha512-Q8wvMAVXC+i2i3qKxCWc9gflba7ILZCEQrc3qpnCZbT8wSjK6sRzfAgy7sLSdX9K4J4QLZcUaHkPT6Kx72wvug==" crossorigin=""></script>

  

<!-- Leaflet CSS y JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha384-+pPBEoY9YzxRE1yvKjQ2kqJSBdPpdnaxURZfmxg6AjFrlsMVX9QbMnDyJU6dqGO1" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha384-hVy4va1/F2QKjwS1lym90PTzF5XK0mHfKvVtR5AHt0Bgkk8Kj+dZIe1C5Q5qLuKV" crossorigin=""></script>

<!-- Leaflet.MarkerCluster CSS y JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />
<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>

    <title>Document</title>
</head>
<body>
    <div id = 'map'>
    </div>
    <script>
        var map = L.map('map').
           setView([20.112812821155515, -98.75163136228085],
           8);
           L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a class="boton" href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
            maxZoom: 18
            }).addTo(map);
            
            function getColor(d) {
                
    return d > 1000.0 ? '#bd0026' :
           d > 22288.0  ? '#ffff' :
           d > 50000.0  ? '#E31A1C' :
           d > 80000.0  ? '#FC4E2A' :
           d > 120000.0   ? '#FD8D3C' :
           d > 150000.0   ? '#FEB24C' :
           d > 180000.0   ? '#FED976' :
             
           '#FFEDA0';
       
            }

            function style(feature) {
    return {
        fillColor: getColor(feature.properties.Pob_Total),
        weight: 2,
        opacity: 1,
        color: 'white',
        dashArray: '3',
        fillOpacity: 0.7
    };
}

function popupContent(feature) {

  return '<div class="info"><img class="imagen01" src="imagenes/informacion.png" width="25px" height="25px"></img><br><strong>Municipio: </strong><br>' + feature.properties.NOM_MUN+
  '<br><strong><img src="imagenes/poblacion.png" width="20px" height="20px"></img> Población total: </strong><br>' + feature.properties.Pob_Total+
  '<br><a class="boton" href="http://sigeh.hidalgo.gob.mx/productos/infografias/Infografía%20Municipal%20'+feature.properties.NOM_MUN+'.pdf" target="_blank">Ver infografía</a></div>';

}

var Municipios01 = L.geoJson(municipios, { style: style,
  onEachFeature: function(feature, layer) {
    layer.bindPopup(popupContent(feature));
  }
}).addTo(map)

var baseMaps = {
  "Google Satelite":satelite,
  "OpenStreetMap":OpenStreetMap_Mapnik,
    "OpenTopoMap": layer2,
	"StamenLayer":stamenLayer	
};



var Overlays = {
  "<strong>Municipios:</strong>": Municipios01
};



var controlLayers = L.control.layers(baseMaps,Overlays,{collapsed: false,
    position: "topright"});

// Agregar control de capas al mapa
controlLayers.addTo(map);


</script>
</body>
</html>
<?php
include("../path_maps/footer.php");
?>