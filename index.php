<?php 
session_start(); 
include ("header.php");
$header = new header;
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1 , maximun-scale=1">
	<title>Series Y Algo mas</title>
	<link rel="stylesheet" type="text/css" href="general.css">
	<link rel="stylesheet" type="text/css" href="index.css">
	<link href='https://fonts.googleapis.com/css?family=Walter+Turncoat' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">
	<meta name="description" content="Este ejercicio aprenderemos a validar 
	                                  formularion con javascritp">
    <script type="text/javascript" src="js/jquery.js"></script> 
    <script type="text/javascript" src="ajax.js"></script>
	
	<script> 
          $(document).ready(function() {
          	     
          	  	  $('#session').on('click',function(e){
						e.preventDefault();
          	  	  	    var usuario = $('#usser').val();
                        var pass = $('#passw').val();
                        var pet = $('.contenedor header form').attr('action')
                        var met = $('.contenedor header form').attr('method')
                        alert(usuario+pass);
                        if (usuario == "" || pass == "") {
                        	alert("Te falto llenar un campo");
                        }else{
                            $('.session form').submit();
                        }

                  })

          	  	  $(".articulo li").click(function(){
                        var verificacion = "<?php echo $_SESSION['autenticidad']; ?>" ;
                        if (verificacion) {
						      var titulo = $(this).attr("id");
						      var link = $(this).attr("title");
						      location.href = link;
					    }else{
  							//mensaje de registro
 							//$('.fondo').s(2000);
 							         $('.fondo').fadeIn(500,function(){
					                	 $('.session form img').slideDown(500);
					                	 $('.label-registro').slideDown(500);
		                      	         $('.label-inicio').slideDown(500);
		                      	         $('#salir').slideDown(500);
			                    });
 						}
          	  	  })
                  
          	  	  $('.session form #registrar').click(function(){
                      var display = $(".fondo").css("display");
 						    if (display == 'none'){
 						    	$('.fondo').fadeIn(500,function(){
				                	 $('.session form img').slideDown(500);
				                	 $('.label-registro').slideDown(500);
	                      	         $('.label-inicio').slideDown(500);
	                      	         $('#salir').css('display','none');
	                      	         $('.cuadro').slideDown(500);
			                    });
 						    }else{
 						    	var display2 = $(".cuadro").css('display');
 						    	alert(display2);
 						    	if (display2 == 'none'){
	                      	         $('.cuadro').slideDown(500);
	                      	         $('#salir').css('display','none');
 						    	}
 						    }
                      });
          	  	  

          	  	  $('#cer').click(function(){
                     $('.cuadro').slideUp(500);
                     $('.session form img').slideUp(500);
                     $('.label-registro').slideUp(500);
                     $('.label-inicio').slideUp(500,function(){
                     	 $('.fondo').fadeOut(500);
                     });
          	  	  })

          	  	  $('#salir').click(function(){
          	  	  	     $('.cuadro').slideUp(500);
                      	 $('.session form img').slideUp(500);
                      	 $('.label-registro').slideUp(500);
                      	 $('.label-inicio').slideUp(500);
                      	 $('#salir').slideUp(500,function(){
                      	 	$('.fondo').fadeOut(500);
                      	 });
          	  	  })

          	  	  //$('.session').html("<label id='registrar'>Registrarme</label>");
                  
                 
          })   
	</script> 
	      
  </head>
<body>
    <div class="contenedor">
            <div class='fondo'>
                <div class="cancela">
                	<label id="salir">CANCELAR</label>
                </div>
                <div class='cuadro'>
			  	   <div class="formu">
			  	     <table>
			  	        <tr>
			  	           <td><label>Registro</label><hr></td>
			  	        </tr>
			  	        <tr>
			  	            <td><input type="text" id="usuario" name="usuario" placeholder="Usuario"></td>
			  	        </tr>
			  	        <tr>
			  	           <td><input type="text" id="pass" name="pass" placeholder="Contraseña"></td>
			  	        </tr>
			  	        <tr>
			  	           <td><input type="text" id="pass2" name="pass2" placeholder="Repite la Contraseña"></td>
			  	        </tr>
			  	        <tr>
			  	            <td><input type="text" id="nombres" name="nombres" placeholder="Nombre"></td>
			  	        </tr>
			  	        <tr>
			  	           <td><input type="text" id="apellidos" name="apellidos" placeholder="Apellido"></td>
			  	        </tr>
			  	        <tr>
			  	           <td><input type="text" id="email" name="email" placeholder="Email"></td>
			  	        </tr>
			  	        <tr>
			  	           <td><input type="submit" id="registrar" name="registrar" value="Registrar"></td>
			  	        </tr>
			  	     </table>
			  	  </div>
			      <button class='cerrar' id='cer' href='#'>Cancelar</button>  
			    </div> 
	        </div>
		    <?php 
	            $salida="of.php"; 
	            $subida="uploader.php";
	            $header->encabezado($salida,$subida); 
	        ?>
		    <div class="lateral">
		                <div class="separar">
		                  <form action="index.php" method="post">
			                <input type="text" id="busca" name="buscar" placeholder="Buscar">
			                <input type="submit" name="presionado" class="boton" id="boton" value="" />
				          </form>     
				                
		            	</div>
		            	<li>
		            	    <a href="index.php">Inicio</a>
		            		<!--<a href="#">Categoria</a>
		            		<a href="#">Lo mas visto</a>
		            		<a href="#">Lo mas nuevo</a>
		            		<a href="#">Juegos</a>
		            		<a href="#">Cursos</a>-->
		            	</li>
		    </div>

		    <div class="centrar">
		    	<?php 
					if (isset($_POST['presionado']) && !empty($_POST['buscar'])) {
					            $busqueda = mysqli_query($cnx,"SELECT nombre,tipo FROM contenido WHERE nombre = '".$_POST['buscar']."'");
                                $ena = mysqli_fetch_array($busqueda);
					            $ruta = "C:/AppServ/www/contenido/";
					            $link = opendir($ruta);
					            while ($rc = readdir($link)) {
						            if (is_dir($ruta.$rc) && $rc != '.' && $rc != '..') {
						            	echo "<div class='articulo' id='serie'>";
											//echo "<script>alert('Te falto llenar un campo 11');</script>";
											$direccion = '../contenido/tipo.php?anime='.$ena[0].'&capitulos='.$ena[0].'&capitulos='.$ena[0];
							                   echo "<li id='".$ena[1]."' title='".$direccion."'>
							                          <a href='#'>
							                           <img src='imagenes/$ena[0]'>
							                            <div class='descripcion'>
															<h3>",$ena[0],"</h3>
											    		</div>
							                          </a>
							                         </li>";
							                  echo "<script>alert('ruta = ".$ruta.$rc." ena 0 = ".$ena[0]." ena 1 = ".$ena[1]." rc = ".$rc."');</script>";           
	 								    echo "</div>";	
	 					            }
 					            } 
				    }else{
	                     $res->articulos();
					}	 	 

			    		 ?>
		    </div>

		    
		    <div class="footer">
		    	<p class="parrafo">El contenido publicado es con fines de entretenimient
		    	cualquier problema  favor de comunicarse con nosootros.</p>
		    </div>
		    
	</div>

</body>
</html>