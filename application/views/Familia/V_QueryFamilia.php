<!DOCTYPE html>
<html>
<head>
	<title>Ascender Iglesia | Familias</title>
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
	<?php }?>

</div>
</body>
</html>