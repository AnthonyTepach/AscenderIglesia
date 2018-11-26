<!DOCTYPE html>
<html>
<head>
	<title>Ascender Iglesia | Ministerios</title>
	<meta charset="utf-8">
	<?php include APPPATH.'views/header.php';?>
	<script type="text/javascript">
		 $(document).ready(function(){
    		
    		$('.collapsible').click(function() {
    			// body...
    			var txt=$(this).attr('id');
    		$.ajax({
              type: 'POST',
              url: 'C_Ministerio/loadAsifnaciones',
              data:{txtt: txt},
              success: function(data) {
                  $("#miembrosajax").html(data);
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
	      		<a href="#">Nuevo ministerio</a>
	      	</li>
	        <li>
	        	<a href="<?=base_url('Principal');?>">Regresar</a>
	    	</li>
	      </ul>
	    </div>
	</nav>
<div class="container">
	<br>
	<?php if($cantidad==0){?>
    <?php include APPPATH.'views/Errores/EmptyData.php';?>
	<?php }else{?>
			<div class="row">
				<div class="col m4 s6">
				 <?php foreach($consulta -> result() as $row){ ?>
						<div class="col s12 m12">
							<ul class="collapsible" id="<?=$row -> id_ministerio?>">
							    <li>
							      <div class="collapsible-header">
							      	<img src="<?=base_url('upload/ministerios/').$row -> img_ministerio?>" class="responsive-img">
							      </div>
							      <div style="margin: 0; padding-left: 10px; padding-right: 10px;">
							      	<span>
							      		<b style="color: #007bff;"><?=$row -> nom_minsterio ?></b>
							       	</span>
							       		<p style="font-size: 12px; text-align: justify;">
							       			<b>Encargado: </b><?=$row -> encargado_min?><br>
							       			<b>Descripción: </b><?=$row -> des_ministerio  ?>
							       		</p>
							       </div>
							    </li>
							 </ul>
						</div>
				 <?php }?>
				</div>
				<div id="miembrosajax" class="col m8 s6">
					<br>
					<img style="display: block;margin: auto; max-width: 400px;" src="<?=base_url('assets/iconos/interfaz/monitor.svg')?>" class="responsive-img">
					<center>
						Aquí te mostraremos a los miembros que pertenecen a cada <b style="color: #007bff;">ministerio</b>.
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m12">
					<center>
						<?= $pagination_n?>
					</center>
				</div>
			</div>
	<?php }?>
</div>
</body>
</html>