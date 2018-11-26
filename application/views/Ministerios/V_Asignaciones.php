<h4 class="slideInDown animated">Miembros</h4>
<script type="text/javascript">
	$(document).ready(function(){
		var key_pro;
            $(".secondary-content").click(function(){
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
              }});
            $("#modal"+key_pro).modal();
              $("#cerrarModal"+key_pro).click(function(){
                  $("#modal"+key_pro).remove();
                  $("#modal"+key_pro).remove();
              });
              
            });
         });
</script>
<div id="modalAjax">
</div>
 <?php foreach($consulta -> result() as $row){ ?>
	
 	<ul class="collection bounceInRight animated">
	    <li class="collection-item avatar">
	      <img src="<?= base_url('upload/miembros/').$row -> nom_imagen?>" alt="" class="circle">
	      <span class="title">Nombre</span>
	      <p><?=$row -> nom_miembro.' '.$row -> apat_miembro.' '.$row -> amat_miembro ?></p>
	      <span class="title">Código</span>
	      <p><p><?=$row -> codigo_miembro?></p>
	      <a class="secondary-content modal-trigger" href="#modal<?=$row -> id_miembro?>" id="<?=$row -> id_miembro?>"><i class="material-icons">more_vert</i></a>
	      
	    </li>
	</ul>

 <?php }?>
 