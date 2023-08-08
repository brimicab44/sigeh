<?php
include 'header.php';
?>

<!-- BANNER -->
<!--<div class="banner"></div>-->
<div class="site-cover2 site-cover2-sm same-height overlay single-page" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('../images/numeros.jpg') no-repeat center; background-size: cover; cursor: default;">
	<div class="container">
	  <div class="row same-height justify-content-center">
		<div class="col-md-6">
		  <div class="post-entry text-center">
			<div class="text" style="padding-top: 80px;">
			  <h2>Desempeño de Gobierno</h2>
        <p class="card-text">Tableros donde se muestra la posición de Hidalgo con respecto a indicadores nacionales</p>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
  
  <section class="section">
	<div class="container">
		<h2>Ficha Técnica del Indicador / Dato / Resultado</h2>
      	<hr class="customhr">
			<?php
                
                include '../fun/conexion_s.php';
                $indicador = $_GET["idr"];

               $enlace = mysqli_connect($hostname, $username, $password, $database);
                mysqli_set_charset($enlace, "utf8");
			    $sql = "SELECT * FROM indicadores_nacionales WHERE idIndicador='$indicador'";
			    $resultM = mysqli_query($enlace,$sql);
			    while($result = mysqli_fetch_row($resultM))
		        {
		    		?>
		        		<div class="col-sm-12">
		        			<div class="row">
		        			<div class="col-sm-6">
		        				<div class="row">
									<div class="col-sm-7">
										<p id="subtitulo" style="background-color: #691B32; color: #fff; text-align: center;">
											Indicador
										</p>
										<h5 style="font-size: 18px; text-align: center;">
											<?php echo $result[1];?>
										</h5>
									</div>
									<div class="col-sm-5">
										<p id="subtitulo" style="background-color: #691B32; color: #fff; text-align: center;">
											Temporalidad
										</p>
										<h5 style="font-size: 18px; text-align: center;">
											<?php echo $result[4];?>
										</h5>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<p id="subtitulo" style="background-color: #98989A; color: #fff; text-align: center;">
													Descripción
										</p>
										<h5 style="font-size: 18px; text-align: center;">
											<?php echo $result[3];?>
										</h5>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="row">
											<div class="col-sm-7">
												<p id="subtitulo" style="background-color: #691B32; color: #fff; text-align: center;">
													Fuente
												</p>
												<h5 style="font-size: 16px; text-align: center;">
													<?php echo $result[2];?>
												</h5>
											</div>
											<div class="col-sm-5">
												<p id="subtitulo" style="background-color: #691B32; color: #fff; text-align: center;">
													Confiabilidad de la fuente
												</p>
												<h5 style="font-size: 18px; text-align: center;">
													<?php echo $result[5];?>
												</h5>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="row">
											<div class="col-sm-3">
												<p id="subtitulo" style="background-color: #BC955B; color: #fff; text-align: center;">
													Último dato <br>disponible
												</p>
												<h5 style="font-size: 16px; text-align: center;">
													<?php echo $result[7];?>
												</h5>
											</div>
											<div class="col-sm-3">
												<p id="subtitulo" style="background-color: #BC955B; color: #fff; text-align: center;">
													Valor <br> Hidalgo
												</p>
												<h5 style="font-size: 18px; text-align: center;">
													<?php echo $result[8];?>
												</h5>
											</div>
											<div class="col-sm-3">
												<p id="subtitulo" style="background-color: #BC955B; color: #fff; text-align: center;">
													Valor <br>Nacional
												</p>
												<h5 style="font-size: 16px; text-align: center;">
													<?php echo $result[9];?>
												</h5>
											</div>
											<div class="col-sm-3">
												<p id="subtitulo" style="background-color: #BC955B; color: #fff; text-align: center;">
													Lugar <br>Nacional
												</p>
												<h5 style="font-size: 18px; text-align: center;">
													<?php echo $result[10];?>
												</h5>
											</div>
										</div>
									</div>
								</div>
		        			</div>
		        			<div class="col-sm-6">
		        				<div class="row">
		        					<img src="http://sigeh.hidalgo.gob.mx/ind_nac/cartelera/images/<?php echo $result[12];?>">
		        				</div>
		        			</div>
		        		</div>	
		        		</div>
		        		<br>
		        		<div align="center">
		        			<div class="col-sm-3">
		        				<a href="../pdf_plugin/fichaTecnicaPDF.php?idIndicador=<?php echo $indicador;?>&tipo=1" target="_blank" class="read-more" style="background: linear-gradient(to right,#9E2343,#691B32) ">Imprimir Ficha</a>
		        			</div>
		        		</div>

		       <hr class="red small-margin">
	          <div class="col-lg-3">
				<a href="../h_tableros.html" class="read-more">Volver</a>
			  </div>    	 
		        	
						
					<?php
				}
			?>
		</div>
	</section>

<?php
include 'footer.php';
?>
