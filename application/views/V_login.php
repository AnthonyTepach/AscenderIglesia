<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Ascender Iglesia | Iniciar sesión</title>
	<?php include APPPATH.'views/header.php';?>
	<style type="text/css">
		body{
			background-image: url('https://free4kwallpaper.com/wp-content/uploads/2016/01/White-Noise-Abstract-4K-Wallpaper.jpg');
		}
	</style>
</head>
<body>
<script type="text/javascript">
	$( document ).ready(function() {
    	$("button").on("click",function(){
    		if($("#U").val().length < 1) {  
		        //alertify.warning("<i class='fas fa-info-circle'></i> Ingrese el Usuario ");
		        $('#resultdiv').html('<blockquote style="color:#ffc107;border-color:#ffc107;"><i class="fas fa-terminal"></i> Ingrese el Usuario.</blockquote>');   
		        return false;  
    		}else if($("#P").val().length < 1){
		    	//alertify.warning("<i class='fas fa-info-circle'></i> Ingrese la Contraseña");
		    	$('#resultdiv').html('<blockquote style="color:#ffc107;border-color:#ffc107;"><i class="fas fa-terminal"></i> Ingrese la Contraseña');   
		        return false;  
    		}else{
    			 //alertify.success('Recuperando la Información <i class="far fa-thumbs-up"></i>');   
    			$.ajax({
                         type:'POST',
                         url:'C_login/loging',
                         data:{'user':$("#U").val(),'pass':$("#P").val()},
                         success:function(data){
                             $('#resultdiv').html(data);
                         },
						  error:function(jqXHR, status, errorThrown){
						  	alertify.error( "<i class='fas fa-bug'></i> ¡Lo sentimos, ha habido un problema al cargar!" );
						  	$('#resultdiv').html('<blockquote style="color:#dc3545; border-color:#dc3545;"><i class="fas fa-bug"></i> ¡Lo sentimos, ha habido un problema!<p style="font-size:12px">Contactar al desarrollador. <a href="mailto:ascender@anthonytepach.com"><i class="fas fa-at"></i>anthony_tepach</a></p>');   
						    console.log( "Error: " + errorThrown );
						    console.log( "Status: " + status );
						    console.dir( jqXHR );

						  }

                     });

    		}
    	});
    	
	});
	
</script>
  <nav>
    <div class="nav-wrapper encabezado">
      <a href="#" class="brand-logo center">
      	<img width="200px" src="<?=base_url('assets/iconos/logoa.png')?>">
      </a>
    </div>
  </nav>
        
	<div class="row">
		<div class="six columns">
			<div class="" style="margin-top: 120px;">
				<div class="container">
					
						<h3>Iniciar sesión</h3>
						<div class="row">
							<div class="twelve columns">
								<label for="Usuario">Usuario</label>
				      			<input class="u-full-width" placeholder="Usuario" id="U" type="text" >
							</div>
						</div>
						<div class="row">
							<div class="twelve columns">
								
							</div>
						</div>
						<div class="row">
							<div class="twelve columns">
								<label for="password">Contraseña</label>
				      			<input class="u-full-width" placeholder="Contraseña" id="P" type="password" >
							</div>
						</div>
						
						<div class="row">
							<div class="twelve columns" >
								<button class="btn waves-effect waves-light u-pull-right" style="background-color: #007bff;">Iniciar <i class="fas fa-book-open"></i></button>								
							</div>
						</div>
				
				</div>
			</div>
		</div>
		<!--segunda columna-->
		<div class="five columns">
		</div>
	</div>

	 
	<div class="row">
		<div class="six columns">
			<div id="resultdiv" class="container">
				<!--Contenido AJAX-->
   			</div>
		</div>		
	</div>
			
		
	
	
			
</body>
</html>