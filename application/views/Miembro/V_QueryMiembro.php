<!DOCTYPE html>
<html>
<head>
	<title>Ascender Iglesia | Miembros </title>
	<?php include APPPATH.'views/header.php';?>
	<script type="text/javascript">
    
       $(document).ready(function(){

        var key_pro;
            $(".btn-floating.halfway-fab.waves-effect.waves-light.red.modal-trigger").click(function(){
             
              var key=$(this).attr('id');
              var key_f="#modal"+key;

              key_pro=key;
              $.ajax({
              type: 'POST',
              url: 'C_Miembro/loadModal/'+key,
              success: function(data) {
                  $("#modalAjax").append('<div id="modal'+key+'" class="modal modal-fixed-footer" style="max-width:500px;  height: 500px;">'+
                                      '<div class="modal-content">'+
                                        data+
                                      '</div>'+
                                      '<div class="modal-footer">'+
                                        '<a id="cerrarModal'+key+'" href="#!" class="modal-close waves-effect waves-green btn-flat"><i class="far fa-times-circle"></i></a>'+
                                        
                                      '</div>'+
                                    '</div>'
                  );
              }
              
              });
              $("#modal"+key_pro).modal();
              $("#cerrarModal"+key_pro).click(function(){
                  $("#modal"+key_pro).remove();
                  $("#modal"+key_pro).remove();
              });
              
            });
         });

  </script>
</head>
<body>
  <div id="modalAjax">
    
  </div>
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
     <!--Miembros Cards-->

  <div class="row">
        <?php foreach($consulta -> result() as $row){ ?>
            <div class="col s12 m3"><!--Inicia las columnas-->     
                 <div class="row lightSpeedIn animated">
                  <div class="col s12 m12">
                      <div class="card">
                        <div class="card-image">
                          <img class="circle responsive-img" src="<?= base_url('upload/miembros/').$row -> nom_imagen?>">
                          <span class="card-title txt_border" style="font-size: 20px;"><?=$row -> nom_miembro.' '.$row -> apat_miembro.' '.$row -> amat_miembro ?></span>

                          <a id="<?=$row -> id_miembro?>" class="btn-floating halfway-fab waves-effect waves-light red modal-trigger" href="#modal<?=$row -> id_miembro?>"><i class="material-icons">more_vert</i></a>
                          

                        </div>
                        <div class="card-content">
                          <p style="font-size: 15px;">
                            <b>Código: </b><?=$row -> codigo_miembro?>
                          </p>
                          <p style="font-size: 12px;">
                            <b>Email: </b><a href="mailto:<?=$row -> email_miembro ?>"><?=$row -> email_miembro ?></a>
                          </p>
                          <p style="font-size: 12px;">
                            <b>Móvil: </b><a href="tel:<?=$row -> movil_miembro?>"><?=$row -> movil_miembro?></a>
                          </p>
                          
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        <?php }?>
  </div>
  <!--Fin Miembros Cards-->
  <center>
    <?= $pagination_n?>
  </center>
<?php }?>
</div>

</body>
</html>

                      