<?php
include 'header.php';
?>

<!-- BANNER -->
<!--<div class="banner"></div>-->
<div class="site-cover2 site-cover2-sm same-height overlay single-page" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('../images/tableros.jpg') no-repeat center; background-size: cover; cursor: default;">
	<div class="container">
	  <div class="row same-height justify-content-center">
		<div class="col-md-6">
		  <div class="post-entry text-center">
			<div class="text" style="padding-top: 80px;">
			  <h2>Hidalgo en Números</h2>
			  <p class="card-text">Información relevante y sintetizada en tableros dinámicos e infografías por municipio</p>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
  
  <section class="section">
	<div class="container">
		
			<?php
                
                include '../fun/conexion_s.php';

                $enlace = mysqli_connect($hostname, $username, $password, $database);
                mysqli_set_charset($enlace,"utf8");
                
                $id_grafica=$_GET['id'];
                
                $sql = "SELECT * FROM argis_graficas WHERE id_grafica='$id_grafica'";
                $resul = mysqli_query($enlace,$sql);

                while($resulto = mysqli_fetch_array($resul)) {
            ?>
			
                <header>
                    <h2 class="top-buffer">Tablero dinámico de <?php echo $resulto['titulo_grafica'];?>:</h2>
                    <p></p>
                    <hr class="red small-margin">
                    <iframe title="Información Georeferenciada" src="<?php echo $resulto['src_iframe'];?>" width="100%" height="800" frameborder="0" allowFullScreen="true"></iframe>
                   
                </header>
           <hr class="red small-margin">
          <div class="col-lg-3">
			<a href="../h_tableros.html" class="read-more">Volver</a>
		  </div>
            <?php }?>
	</div>
	
</section>

<?php
include 'footer.php';
?>
