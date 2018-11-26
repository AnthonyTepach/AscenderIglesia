<script type="text/javascript">
	$('.tabs').tabs();
</script>
<?php
	 
            	
         $array=array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
          
		foreach($consulta -> result() as $row){
  	 ?>
  	 <center>
  	 	<img class="circle responsive-img" style="max-width: 140px;" src="<?=base_url('upload/miembros/').$row -> nom_imagen?>">
<h5><b><?=$row -> nom_miembro.' '.$row -> apat_miembro.' '.$row -> amat_miembro ?></b></h5>
</center>
 <div class="row">
    <div class="col s12">
      <ul class="tabs" id="info">
        <li class="tab col s2 m4"><a class="active" href="#test1">Información</a></li>
        <li class="tab col s2 m4"><a href="#test2">Direccion</a></li>
       
      </ul>
    </div>
    <?php $mes=(int)substr($row -> fnaci_miembro , 5, 2)-1?>
    <div id="test1" class="col s12 m12">
    	<p style="font-size: 15px;">
            <b>Ministerio: </b><?=$row -> Ministerio_miembro ?>.<br>
            <b>Estado civil: </b><?=$row -> estado_civil_m  ?>.<br>
            <b>Edad: </b><?=$row -> edad_s?>.<br>
            <b>Sexo: </b><?=$row -> sexo_miembro   ?>.<br>
            
           	<b>Fecha nacimiento: </b> <?=substr($row -> fnaci_miembro , 8, 2).' de '.$array[$mes].' de '.substr($row -> fnaci_miembro , 0, 4)?>
        </p>

    </div>
    <div id="test2" class="col s12 m12">
    	<p style="font-size: 20px;">
            <?=$row -> domicilio_miembro.' '.$row -> num_miembro.', '.$row -> colonia_m.',C.P. '.$row -> cp_m.', '.$row -> ciudad_miembro.', '.$row -> Estado_miembro.', '.$row -> pais_miembro.'.'?>
        </p>
    </div>
  	<?php }?>
  </div>