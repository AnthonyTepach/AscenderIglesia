<!DOCTYPE html>
<html>
<head>
	<title>Ascender Iglesia | Membresias</title>
	<meta charset="utf-8">
	<?php include APPPATH.'views/header.php';?>
	<script src="<?php echo base_url();?>assets/js/Chart.bundle.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
    		$('.tabs').tabs();
    			$.ajax({
                         type:'POST',
                         url:'C_Menus/sexo_viewG',
                         success:function(data){
                             $('#sexo').html(data);
                         },
						  error:function(jqXHR, status, errorThrown){
						  	alertify.error( "<i class='fas fa-bug'></i> ¡Lo sentimos, ha habido un problema cargar!" );
						  	$('#sexo').html('<br><center><blockquote style="color:#dc3545; border-color:#dc3545;"><i class="fas fa-bug"></i> ¡Lo sentimos, ha habido un problema al cargar!<p style="font-size:12px">Contactar al desarrollador. <a href="mailto:ascender@anthonytepach.com"><i class="fas fa-at"></i>anthony_tepach</a></p></blockquote></center>');   
						    console.log( "Error: " + errorThrown );
						    console.log( "Status: " + status );
						    console.dir( jqXHR );

						  }

                     });
    		$('.tab.col.s6').click(function() {
    			// body...
    			var a=$(this).attr('value');
    			$.ajax({
                         type:'POST',
                         url:'C_Menus/'+a+'_viewG',
                         success:function(data){
                             $('#'+a).html(data);
                         },
						  error:function(jqXHR, status, errorThrown){
						  	alertify.error( "<i class='fas fa-bug'></i> ¡Lo sentimos, ha habido un problema cargar!" );
						  	$('#'+a).html('<br><center><blockquote style="color:#dc3545; border-color:#dc3545;"><i class="fas fa-bug"></i> ¡Lo sentimos, ha habido un problema al cargar!<p style="font-size:12px">Contactar al desarrollador. <a href="mailto:ascender@anthonytepach.com"><i class="fas fa-at"></i>anthony_tepach</a></p></blockquote></center>');   
						    console.log( "Error: " + errorThrown );
						    console.log( "Status: " + status );
						    console.dir( jqXHR );

						  }

                     });

    		})
 		});
	</script>
  
</head>
<body>
	<nav>
	    <div class="nav-wrapper encabezado">
	      <a href="<?=base_url('Principal');?>" class="brand-logo">
	      	<img width="200px" src="<?=base_url('assets/iconos/logoa.png')?>">
	      </a>
	      <ul id="nav-mobile" class="right hide-on-med-and-down">

	        <li>
	        	<a href="<?=base_url('Principal');?>">Regresar</a>
	    	</li>
	      </ul>
	    </div>
	</nav>

	<div class="container">
		  <div class="row">
		    <div class="col s12 m12">
		      <ul class="tabs">
		        <li class="tab col s6" value="sexo"><a href="#sexo" class="active">Sexo</a></li>
		        <li class="tab col s6" value="edad"><a href="#edad">Edades</a></li>
		        
		      </ul>
		    </div>
		    <div id="sexo" class="col s12">
					
		    </div>
		    <div id="edad" class="col s12">
		    	
		    </div>
		  
		  </div>
	</div>
</body>
</html>


