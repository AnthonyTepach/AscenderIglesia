<!DOCTYPE html>
<html>
<head>
	<title>Ascender Iglesia | Eventos</title>
	<meta charset="utf-8">
	<?php include APPPATH.'views/header.php';?>
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
	<?php if($cantidad==0){?>
    <?php include APPPATH.'views/Errores/EmptyData.php';?>
	<?php }else{?>
		<div class="row">
		<?php
		foreach($consulta -> result() as $row){
		?>
			
					    <div class="col s6 m6">
					      <div class="card medium">
					        <div class="card-image">
					          <img src="<?=base_url('upload/eventos/').$row -> imagen_evento?>">
					          <span class="card-title"><?='<b>'.$row -> codigo_evento.'</b> '.$row -> nom_evento?></span>
					        </div>
					        <div class="card-content">
					          <p style="font-size: 12px;">
					          	<b>Fecha del evento:</b> <?=$row -> fecha_evento?>
					          	<br>
					          	<b>Horario:</b> <?=$row -> horario?> <b>hrs</b>
					          	<br>
					          	<b>Lugar del evento:</b> <?=$row -> Lugar?>
					          	<br>
					          	<b>Cupo del evento:</b> <?=$row -> cupo.' Personas'?>
					          </p>
					        </div>
					        <div class="card-action" style="padding-top: 0;padding-bottom: 0;">
					         <a href="" class="u-pull-right"><i class="material-icons">event_note</i> Más</a>					          
					        </div>
					      </div>
					    </div>
				  	
			
		 <?php }?>
		</div>
		 	<center>
    			<?= $pagination_n?>
  			</center> 
	<?php }?>
</div>
</body>
</html>