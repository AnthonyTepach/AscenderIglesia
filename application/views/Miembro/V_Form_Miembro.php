<script type="text/javascript">
    $('.tabs.miembro').tabs();
    $('select').formSelect();
     $('.file-upload').file_upload();
     $('.materialboxed').materialbox();
     $('.datepicker').datepicker({
        format:'yyyy-mm-dd'      
     });
    
    $("#enviar").click(function(){
      // body...
      form =$("#formMiembro").serialize();
      alertify.alert(form);
      $("#formMiembro").submit();
    });
</script>
<br>
<div class="row">
    <div class="col s12">
        <ul class="tabs miembro">
            <li class="tab col s4 active"><a id="inf" href="#InfoP">Información personal</a></li>
            <li class="tab col s4"><a id="con" href="#Contacto">Contacto</a></li>
            <li class="tab col s4"><a id="adi" href="#adicional">Adicional</a></li>

        </ul>
    </div>

    <?=form_open_multipart(base_url()."C_Miembro/GuardarMiembro",'id="formMiembro"')?>
    <div id="InfoP" class="col s12 m12">
        <div class="row">
            <div class="col s12 m12">
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">fingerprint</i>
                        <input required="" id="icon_code" name="codigo_miembro" type="text" class="validate">
                        <label for="icon_code">Código</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m4">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="icon_name" type="text" name="nom_miembro" class="validate">
                        <label for="icon_name">Nombre(s): </label>
                    </div>
                    <div class="input-field col s6 m4">
                        <i class="material-icons prefix">label_outline</i>
                        <input id="icon_last_pat" type="tel" name="apat_miembro" class="validate">
                        <label for="icon_last_pat">Apellido parerno:</label>
                    </div>
                    <div class="input-field col s6 m4">
                        <i class="material-icons prefix">label_outline</i>
                        <input id="icon_last_mat" type="tel" name="amat_miembro" class="validate">
                        <label for="icon_last_mat">Apellido materno</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m4">
                        <i class="material-icons prefix">cake</i>
                        <input id="icon_naci" type="text" name="fnaci_miembro" class="datepicker validate" data-date-format='yyyy-mm-dd'>
                        <label for="icon_naci">Fecha de nacimiento: </label>
                    </div>
                    <div class="input-field col s6 m4">
                        <i class="material-icons prefix">details</i>
                        <select id="icon_civil" name="estado_civil_m" class="validate">
                            <option value="" disabled selected>Selecciona una opción</option>
                            <option value="Soltero/a">Soltero/a</option>
                            <option value="Casado/a">Casado/a</option>
                            <option value="Divorsiado/a">Divorsiado/a</option>
                            <option value="Viudo/a">Viudo/a</option>
                        </select>
                        <label for="icon_civil">Estado Civil</label>
                    </div>
                    <div class="input-field col s6 m4">
                        <i class="material-icons prefix">group</i>
                        <select id="icon_sexo" name="sexo_miembro" class="validate">
                            <option value="" disabled selected>Selecciona una opción</option>
                            <option value="Hombre">Hombre</option>
                            <option value="Mujer">Mujer</option>
                        </select>
                        <label for="icon_sexo">Sexo:</label>
                    </div>
                    <div class="input-field col s2 m2">
                <i class="material-icons prefix">date_range</i>
                <input id="icon_edad" type="text" name="edad_miembro" class="validate">
                <label for="icon_edad">Edad:</label>
            </div>
                </div>
            </div>
        </div>
       

    </div>

    <div id="Contacto" class="col s12 m12">
        <div class="row">
          Dirección
              <div class="col s12 m12">
                <div class="row">
                    <div class="input-field col s8 m5">
                        <i class="material-icons prefix">subway</i>
                        <input id="icon_calle" type="text" name="domicilio_miembro" class="validate">
                        <label for="icon_calle">Calle</label>
                    </div>
                    <div class="input-field col s4 m2">
                        <i class="material-icons prefix">extension</i>
                        <input id="icon_numc" type="text" name="num_miembro" class="validate">
                        <label for="icon_numc">N°</label>
                    </div>
                    <div class="input-field col s12 m5">
                        <i class="material-icons prefix">directions</i>
                        <input id="icon_col" type="text" name="colonia_m" class="validate" min="0">
                        <label for="icon_col">Colonia</label>
                    </div>
                </div>
                <div class="row">
                  <div class="input-field col s6 m2">
                        <i class="material-icons prefix">edit_location</i>
                        <input id="icon_cp" type="text" name="cp_m" class="validate">
                        <label for="icon_cp">C.P</label>
                    </div>
                     <div class="input-field col s6 m3">
                        <i class="material-icons prefix">location_city</i>
                        <input id="icon_city" type="text" name="ciudad_miembro" class="validate">
                        <label for="icon_city">Cuidad/Municipio</label>
                    </div>
                     <div class="input-field col s6 m3">
                        <i class="material-icons prefix">explore</i>
                        <input id="icon_edo" type="text" name="Estado_miembro" class="validate">
                        <label for="icon_edo">Estado</label>
                    </div>
                     <div class="input-field col s6 m4">
                        <i class="material-icons prefix">map</i>
                        <input id="icon_pais" type="text" name="pais_miembro" class="validate">
                        <label for="icon_pais">Páis</label>
                    </div>

                </div>
              </div>
             
        </div>
         <div class="row">
          Contacto
              <div class="col s12 m12">
                <div class="row">
                  <div class="input-field col s12 m5">
                        <i class="material-icons prefix">contact_mail</i>
                        <input id="icon_mail" name="email_miembro" type="email" class="validate">
                        <label for="icon_mail">Correo Electronico</label>
                  </div>
                   <div class="input-field col s4 m2">
                        <i class="material-icons prefix">call_made</i>
                        <input id="icon_lada" name="Lada_miembro" type="text" class="validate">
                        <label for="icon_lada">Lada</label>
                  </div>
                   <div class="input-field col s8 m5">
                        <i class="material-icons prefix">local_phone</i>
                        <input id="icon_local" name="telefono_miembro" type="text" class="validate">
                        <label for="icon_local">Teléfono</label>
                  </div>

                </div>
                <div class="row">
                  <div class="input-field col s12 m4">
                        <i class="material-icons prefix">smartphone</i>
                        <input id="icon_movil" name="movil_miembro" type="text" class="validate">
                        <label for="icon_movil">Móvil</label>
                  </div>
                   
                </div>
              </div>
        </div>
</div>

    <div id="adicional" class="col s12">
          <div class="row">
            <div class="col s12 m12">
              
                <center>
                <img style="max-width: 250px; max-height: 200px;" id="uploadPreview" src="<?=base_url('/assets/iconos/interfaz/user.svg')?>" class="materialboxed circle responsive-img">
                <label class="file-upload waves-effect waves-light button-primary" id="labelimg">
                  Subir imagen<input type="file" multiple="false" name="userfile" id="uploadImage" accept="image/x-png,image/gif,image/jpeg"/>
                </label>
                </center>
            </div>
          </div>
          <div class="row">
          
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">class</i>
                        <select id="icon_minis" name="Ministerio_miembro" class="validate">
                            <option value="0" disabled selected>Selecciona una opción</option>
                            <?php foreach($consulta -> result() as $row){?>
                              <option value="<?=$row-> id_ministerio?>"><?=$row-> nom_minsterio?></option>
                            <?php }?>
                        </select>
                        <label for="icon_minis">Ministerio:</label>
                    </div>
            
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">collections_bookmark</i>
                        <input id="icon_clasi" type="text" name="Clasificacion_miembro" class="validate">
                        <label for="icon_clasi">Clasificación</label>
                  </div>
                  <div class="input-field col s12 m12">
                    <button id="enviar" class="button-primary waves-effect waves-light u-pull-right" type="button">Enviar 
                      <i class="fab fa-telegram-plane"></i>
                    </button>
                  </div>
          </div>
</div>
<?=form_close()?>