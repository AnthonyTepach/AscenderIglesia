<!DOCTYPE html>
<html>
<head>
	<title>Ascender Iglesia | Buscar </title>
	<meta charset="utf-8">
	<?php include APPPATH.'views/header.php';?>
	<script type="text/javascript">
		 $(document).ready(function(){
    $('#optionS').formSelect();
    $("#busqueda").keyup(function(){
    	  	var longitud =$(this).val().length;
    	    if (longitud>0) {
    	    	$.ajax({
                    type:'POST',
                    url:'C_Miembro/Busquedad',
                    data: $("#formsB").serialize(),
                    success:function(data){
                        $('#ajaxR').html(data);
                    },
					error:function(jqXHR, status, errorThrown){
					  	alertify.error( "<i class='fas fa-bug'></i> ¡Lo sentimos, ha habido un problema cargar!" );
					  	$('#ajaxR').html('<br><center><blockquote style="color:#dc3545; border-color:#dc3545;"><i class="fas fa-bug"></i> ¡Lo sentimos, ha habido un problema al cargar!<p style="font-size:12px">Contactar al desarrollador. <a href="mailto:ascender@anthonytepach.com"><i class="fas fa-at"></i>anthony_tepach</a></p></blockquote></center>');   
						    console.log( "Error: " + errorThrown );
						    console.log( "Status: " + status );
						    console.dir( jqXHR );
						  }
                     });
    	    }else if(longitud ==0){
    	    	$("#ajaxR").html('<br>'+
    				'<div class="row tada animated">'+
    					'<div class="twelve column" style="text-align: center;">'+
    						'<img class="responsive-img " style="max-width: 450px;" src="<?=base_url('assets/iconos/interfaz/seo.svg')?>">'+
    						'<center>¡Lo sentimos, no hay coincidencias sobre la búsqueda en la base de datos!</center>'+
    					'</div>'+
    				'</div>'
    					);
    	    }
    });

  })
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
		<form id="formsB">
		<div class="col s4 m2">
			 <div class="input-field col s12 m12">
			    <select id="optionS" class="select" name="type">
			     
			      <option value="Código">Código</option>
			      <option value="Nombre">Nombre</option>
			      <option value="Ministerio">Ministerio</option>
			    </select>
			    <label>Selecciona filtro</label>
			  </div>
		</div>
		<div class="col s8 m10">
			<div class="input-field col s12 m12">
                <i class="material-icons prefix">search</i>
                <input required="" id="busqueda" name="busqueda" type="text" class="validate">
                <label for="busqueda">ingresa plabra clave</label>
            </div>

		</div>
	</form>	
	</div>
	<div id="ajaxR" class="row">
		<?php include APPPATH."views/Errores/NoFound.php";?>
	</div>
</div>
</body>
</html>