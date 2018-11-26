<!DOCTYPE html>
<html>
<head>
	<title>Ascender Iglesia | Menú Registro</title>
	<meta charset="utf-8">

	<?php include APPPATH.'views/header.php';?>
	<script type="text/javascript">
		 $(document).ready(function(){
		 	$('.tabs').tabs();
     		$("li").on("click",function(){
    			var a = $(this).attr("value");
    			$.ajax({
                         type:'POST',
                         url:'C_'+a+'/loadForms',
                         success:function(data){
                             $('#D'+a).html(data);
                         },
						  error:function(jqXHR, status, errorThrown){
						  	alertify.error( "<i class='fas fa-bug'></i> ¡Lo sentimos, ha habido un problema cargar!" );
						  	$('#D'+a).html('<br><center><blockquote style="color:#dc3545; border-color:#dc3545;"><i class="fas fa-bug"></i> ¡Lo sentimos, ha habido un problema al cargar!<p style="font-size:12px">Contactar al desarrollador. <a href="mailto:ascender@anthonytepach.com"><i class="fas fa-at"></i>anthony_tepach</a></p></blockquote></center>');   
						    console.log( "Error: " + errorThrown );
						    console.log( "Status: " + status );
						    console.dir( jqXHR );

						  }

                     });

    		});

    	
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

<br>

  <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s6" value="Miembro"><a href="#DMiembro">Miembro</a></li>
        <li class="tab col s6" value="Invitado"><a href="#DInvitado">Invitado</a></li>
      </ul>
    </div>
    <div id="DMiembro" class="col s12">
        <?php include APPPATH.'views/Errores/SelectTab.php';?>
    </div>
    <div id="DInvitado" class="col s12">
    	
    </div>
  </div>
        


</div>
</body>
</html>