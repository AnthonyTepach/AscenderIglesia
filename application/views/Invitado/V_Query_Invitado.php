<!DOCTYPE html>
<html>
<head>
	<title>Ascender Iglesia | Invitados</title>
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
	<br>
	<?php if($cantidad==0){?>
		<?php include APPPATH.'views/Errores/EmptyData.php';?>
	<?php }else{?>
		<style type="text/css">
		tbody tr{
			font-size: 15px;
			text-decoration: none;
			font-weight: normal;
		}
		
		tbody tr:hover{
			background-color:   #f9feff  ;
			cursor: hand;
		}
		
	</style>

     <div class="row">
      <?php foreach($consulta -> result() as $row){ ?>
            <div class="col s12 m3">           
                <div class="card">
                  <!-- Card Content -->
                    <center>
                      <img class="circle responsive-img" style="max-width: 150px;" src="<?=base_url('upload/miembros/').$row -> nom_imagen?>">
                      <p style="font-size: 12px; padding: 0; margin: 0"><b ><?=$row -> nom_invitado." ".$row -> apat_inivtado." ".$row -> amat_invitado?></b><br>
                        <?=$row -> codigo_invitado?>
                      </p>
                    </center>
                    <div class="card-content" style="margin-top: 0; padding-top: 0;">
                      <h6>Información</h6>
                      <p style="font-size: 12px;">
                        <a href="mailto:<?=$row -> email_invitado?>">Email: <?=$row -> email_invitado?></a><br>
                        <a href="tel:<?=$row -> movil_invitado?>">Móvil: <?=$row -> movil_invitado?></a><br>
                        <b>Iglesia: </b><?=$row -> iglesia?>
                      </p>
                    </div>
                </div>
            </div> 
      <?php }?>
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