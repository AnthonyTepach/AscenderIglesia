<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Ascender Iglesia | Principal</title>
	<?php include APPPATH.'views/header.php';?>
	<script type="text/javascript">
		$( document ).ready(function() {
			
			$(".dropdown-trigger").dropdown();
		});

        
	</script>
</head>
<body>
<ul id="dropdown1" class="dropdown-content">
  <li class="divider"></li>
  <li><a href="<?=base_url('Login');?>">Salir</a></li>
</ul>
<nav>
    <div class="nav-wrapper encabezado">
      <a href="<?php base_url('Principal');?>" class="brand-logo">
      	<img width="200px" src="<?=base_url('assets/iconos/logoa.png')?>">
      </a>

      <ul id="nav-mobile" class="right hide-on-med-and-down">
      	<li>
      		
      	</li>
      	<li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Bienvenido <b><?=$this->session->userdata('user')?></b><i class="material-icons right">arrow_drop_down</i></a></li>
        
      </ul>
    </div>
</nav>
<style type="text/css">
	.boton blockquote{
		border-left: none;
		padding-left: 0;
		border-radius: 10px;
		border-bottom: solid;
		}
	.boton blockquote:hover{
		color: #fff;
		background-color: #007bff;
		
	}
</style>

	<div class="container">
		<hr>
		<div class="row pulse animated" style="text-align: center;">
			<div class="col s12 m3">
				<a class="boton" href="<?=base_url('Consulta_Miembros')?>">
		      		<blockquote>
				    	<img class="responsive-img" src="<?=base_url('assets/iconos/interfaz/boss-1.png')?>">Miembros
				    </blockquote>		      			
		      	</a>
		</div>

			<div class="col s12 m3">
				<a class="boton" href="<?=base_url('Consulta_Invitados')?>">
					<blockquote>
						<img class="responsive-img"  src="<?=base_url('assets/iconos/interfaz/collaboration.png')?>">
		      			Invitados
					</blockquote>
		      	</a>
			</div>
			<div class="col s12 m3">
				<a class="boton" href="<?=base_url('Registro')?>">
					<blockquote>
		      			<img class="responsive-img" src="<?=base_url('assets/iconos/interfaz/customer-service.png')?>">
		      			Registro nuevo
		      		</blockquote>
		      	</a>
			</div>
			<div class="col s12 m3">
				<a class="boton" href="<?=base_url('Consulta_Eventos')?>">
					<blockquote>
		      			<img class="responsive-img" src="<?=base_url('assets/iconos/interfaz/calendar.svg')?>">
		      			Eventos
		      		</blockquote>
		      	</a>
			</div>
		</div>
		<div class="row bounce animated" style="text-align: center;">
			<div class="col s12 m3">
				<a class="boton" href="<?=base_url('Consulta_Ministerios')?>">
					<blockquote>
		      			<img class="responsive-img" src="<?=base_url('assets/iconos/interfaz/presentation.png')?>">
		      			Ministerios
		      		</blockquote>
		      	</a>
			</div>
			<div class="col s12 m3">
				<a class="boton" href="<?=base_url('Consulta_Familias')?>">
					<blockquote>
		      			<img class="responsive-img" src="<?=base_url('assets/iconos/interfaz/network.png')?>">
		      			Familias
		      		</blockquote>
		      	</a>
			</div>
			<div class="col s12 m3">
				<a class="boton" href="<?=base_url('Membresia')?>">
					<blockquote>
		      			<img class="responsive-img" src="<?=base_url('assets/iconos/interfaz/line-graph.png')?>">
		      			Estadisticas
		      		</blockquote>
		      	</a>
			</div>
			<div class="col s12 m3">
				<a class="boton" href="<?=base_url('Buscar')?>">
					<blockquote>
		      			<img class="responsive-img" src="<?=base_url('assets/iconos/interfaz/worker.png')?>">
		      			Buscar
		      		</blockquote>
		      	</a>
			</div>
		</div>
<hr>
	</div>
</body>
</html>