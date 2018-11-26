<?php if ($cantidad == 0) { ?>
  <?php include APPPATH."views/Errores/NoFound.php";?>
<?php }else{ ?>
  <?php
 $array=array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
  foreach($consulta -> result() as $row){
     ?>
<div class="row z-depth-4 zoomIn animated">
  <div class="col s12 m3 rollIn animated" style="background-color: #007bff; color: #fff;">
    <center>
        <img class="circle responsive-img z-depth-1" style="background-color: #fff;" src="<?=base_url('upload/miembros/').$row -> nom_imagen?>">
        <h5><b><?=$row -> nom_miembro.' '.$row -> apat_miembro.' '.$row -> amat_miembro ?></b></h5>
    </center>
  </div>
  <?php $mes=(int)substr($row -> fnaci_miembro , 5, 2)-1?>
  <div class="col s12 m9 jackInTheBox animated" style="padding-left: 30px;">
    
    <div class="col s12 m6">
      <h5 style="color: #007bff">Información</h5>
      <br>
      <p style="font-size: 15px;">
        <b>Ministerio: </b><?=$row -> Ministerio_miembro ?>.<br>
        <b>Estado civil: </b><?=$row -> estado_civil_m  ?>.<br>
        <b>Edad: </b><?=$row -> edad_miembro   ?>.<br>
        <b>Sexo: </b><?=$row -> sexo_miembro   ?>.<br>
        <b>Fecha nacimiento: </b> <?=substr($row -> fnaci_miembro , 8, 2).' de '.$array[$mes].' de '.substr($row -> fnaci_miembro , 0, 4)?><br>
      </p>
    </div>
    <div class="col s12 m6">
      <h5 style="color: #007bff">Contacto</h5>
      <br>
      <p style="font-size: 15px;">
          <b>Email: </b><a href="mailto:<?=$row -> email_miembro ?>"><?=$row -> email_miembro ?></a><br>
          <b>Móvil: </b><a href="tel:<?=$row -> movil_miembro?>"><?=$row -> movil_miembro?></a><br>
          <b>Dirección: </b> <?=$row -> domicilio_miembro.' '.$row -> num_miembro.', '.$row -> colonia_m.',C.P. '.$row -> cp_m.', '.$row -> ciudad_miembro.', '.$row -> Estado_miembro.', '.$row -> pais_miembro.'.'?>
      </p>
    </div>
    
  </div>
</div>

<?php }?>
<?php } ?>