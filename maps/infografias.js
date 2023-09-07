	
var map2 = L.map('map2', {zoomControl: false}).setView([20.5791, -98.9621,], 8);



L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map2);

L.control.zoom({
     position: 'bottomleft'
}).addTo(map2);



var geojsonLayer = L.geoJSON(municipios, {
    style: function(feature) {
        return {
            fillColor: '#9f2241',  // color del relleno
            fillOpacity: 0.8,  // transparencia del relleno (0-1)
            color: 'white',  // color de la línea
            weight: 1,  // grosor de la línea
            opacity: 1  // transparencia de la línea (0-1)
        };
    },
    onEachFeature: function(feature, layer) {
		feature.layer=layer;
        layer.on({
            mouseover: function(e) {
                var layer = e.target;
                layer.setStyle({
                    fillColor: '#ddc9a3',  // color del relleno al hacer hover
                    color: 'white',  // color de la línea al hacer hover
                });
                layer.bindPopup(feature.properties.NOMGEO).openPopup();
            },
            mouseout: function(e) {
                var layer = e.target;
                geojsonLayer.resetStyle(layer);  // restablecer el estilo original
                layer.closePopup();
            },
            click: function(e) {
                // Abrir el PDF en una nueva ventana o pestaña
                window.open(feature.properties.link);
            }
        });
    }
}).addTo(map2);




//Lista desplegable
var select = L.countrySelect();

select.addTo(map2);
			
select.on('change', function(e){
    if (e.feature === undefined){ // Do nothing on title
        return;
    }

    // Establece el estilo para la característica seleccionada
    var selectedStyle = {
        "color": "#bc955c",
        "weight": 10,
        "opacity": 0.9,
        "fill": false,       // No relleno
        "fillOpacity": 0 ,    // Relleno transparente
    };

    var country = L.geoJson(e.feature, {
        style: selectedStyle
    });

    // Elimina cualquier capa anterior antes de agregar la nueva
    if (this.previousCountry != null) {
        map2.removeLayer(this.previousCountry);
    }
    
    this.previousCountry = country;

    // Agrega la característica al mapa y ajusta el zoom a sus límites
    country.addTo(map2);
    map2.fitBounds(country.getBounds());
});

document.addEventListener('DOMContentLoaded', (event) => {
	Swal.fire({
        title: 'Infografías Municipales',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        },
        confirmButtonText: 'Entendido',
        confirmButtonColor: '#bc955c',   // color del botón
        background: 'linear-gradient(45deg,#691c32 , #9f2241',         // color de fondo del modal
        titleText: 'Haz click en un municipio para abrir su infografía',            // color del texto del título
    })
});
