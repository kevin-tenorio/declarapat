

<?php $__env->startSection('content'); ?>
<div class="content-body">
  <div class="container-fluid">

    <?php echo $__env->make('layouts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">
              DOMICILIO DEL DECLARANTE
              <br>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">
                <form action="<?php echo e(url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'])); ?>" method="POST" autocomplete="off">
                  <?php echo csrf_field(); ?>

                  <fieldset>
                    <legend><h4 class="mb-3">¿Dónde radicas actualmente?</h4></legend>

                    <div class="row">
                      <div class="col-md-4 mb-4">
                        <label for="pais">País: <code>*</code></label>
                        <select tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['pais'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="pais" name="pais" required="required">
                          <option value="">Seleccione...</option>
                          <?php $__currentLoopData = $declaracion->catalogo->paises(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pais): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($pais->ISO2); ?>"
                            <?php if(old('pais') == $pais->ISO2): ?>
                            selected
                            <?php elseif($declaracion->datos->pais == $pais->ISO2 and old('pais') == null): ?>
                            selected
                            <?php elseif(old('pais') == null and $declaracion->datos->pais == null): ?>
                              <?php if($pais->default == true): ?> selected <?php endif; ?>
                            <?php endif; ?>
                            >
                            <?php echo e($pais->ESPANOL); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['pais'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                          <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>

                      <div class="col-md-4 mb-3" id="div_entidadFederativa">
                        <label for="entidadFederativa_clave">Entidad Federativa: <code>*</code></label>
                        <select class="form-control <?php $__errorArgs = ['entidadFederativa_clave'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" tabindex="<?php echo e(++$tabindex); ?>" id="entidadFederativa_clave" name="entidadFederativa_clave" autofocus>
                          <option value="">Seleccionar:</option>
                          <?php $__currentLoopData = $declaracion->catalogo->inegiEntidades(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($entidad->Cve_Ent); ?>"
                            <?php if($entidad->Cve_Ent == old('entidadFederativa_clave')): ?>
                              selected
                            <?php else: ?>
                              <?php if($entidad->Cve_Ent == $declaracion->datos->entidadFederativa_clave and empty(old('entidadFederativa_clave'))): ?>
                                selected
                                <?php else: ?>
                              <?php endif; ?>
                            <?php endif; ?>
                            >
                            <?php echo e($entidad->Nom_Ent); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['entidadFederativa_clave'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                          <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>

                      <div class="col-md-4 mb-3" id="div_municipioAlcaldia">
                        <label for="municipioAlcaldia_clave">Municipio/Alcaldía: <code>*</code></label>
                        <select class="form-control <?php $__errorArgs = ['municipioAlcaldia_clave'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="municipioAlcaldia_clave" name="municipioAlcaldia_clave" tabindex="<?php echo e(++$tabindex); ?>">
                          <option value="">Seleccionar:</option>
                          <?php if(old('entidadFederativa_clave')): ?>
                            <?php $__currentLoopData = $declaracion->catalogo->inegiAlcaldias(old('entidadFederativa_clave')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alcaldia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($alcaldia->Cve_Mun); ?>"
                              <?php if($alcaldia->Cve_Mun == old('municipioAlcaldia_clave')): ?>
                                selected
                              <?php endif; ?>
                              >
                              <?php echo e($alcaldia->Nom_Mun); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php else: ?>
                            <?php $__currentLoopData = $declaracion->catalogo->inegiAlcaldias($declaracion->datos->entidadFederativa_clave); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alcaldia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($alcaldia->Cve_Mun); ?>"
                              <?php if($alcaldia->Cve_Mun == $declaracion->datos->municipioAlcaldia_clave): ?>
                                selected
                              <?php endif; ?>
                              >
                              <?php echo e($alcaldia->Nom_Mun); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                        </select>
                        <?php $__errorArgs = ['municipioAlcaldia_clave'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                          <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>

                      <div class="col-md-4 mb-3" id="div_coloniaLocalidad">
                        <label for="coloniaLocalidad_select">Colonia o Localidad: <code>*</code></label>
                        <select class="form-control <?php $__errorArgs = ['coloniaLocalidad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" tabindex="<?php echo e(++$tabindex); ?>" id="coloniaLocalidad_select" name="coloniaLocalidad">
                          <option value="">Seleccionar:</option>
                          <?php if(old('entidadFederativa_clave')): ?>

                            <?php if(old('municipioAlcaldia_clave')): ?>

                                <?php $__currentLoopData = $declaracion->catalogo->inegiLocalidades(old('entidadFederativa_clave'),old('municipioAlcaldia_clave')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colonia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($colonia->Nom_Loc); ?>"
                                  <?php if($colonia->Nom_Loc == old('coloniaLocalidad')): ?>
                                    selected
                                  <?php endif; ?>
                                  >
                                  <?php echo e($colonia->Nom_Loc); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php endif; ?>

                          <?php else: ?>

                            <?php $__currentLoopData = $declaracion->catalogo->inegiLocalidades($declaracion->datos->entidadFederativa_clave,$declaracion->datos->municipioAlcaldia_clave); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colonia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($colonia->Nom_Loc); ?>"
                              <?php if($colonia->Nom_Loc == $declaracion->datos->coloniaLocalidad): ?>
                                selected
                              <?php endif; ?>
                              >
                              <?php echo e($colonia->Nom_Loc); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          <?php endif; ?>
                        </select>
                        <?php $__errorArgs = ['coloniaLocalidad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                          <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>

                      <div class="col-md-4 mb-3" id="div_estadoProvincia">
                        <label for="estadoProvincia">Estado/Provincia: <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['estadoProvincia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="estadoProvincia" name="estadoProvincia" placeholder="" value="<?php if(old('estadoProvincia')): ?><?php echo e(old('estadoProvincia')); ?><?php else: ?><?php echo e($declaracion->datos->estadoProvincia); ?><?php endif; ?>" maxlength="100">
                        <?php $__errorArgs = ['estadoProvincia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                          <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>

                      <div class="col-md-4 mb-3" id="div_ciudadLocalidad">
                        <label for="ciudadLocalidad">Ciudad/Localidad: <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['ciudadLocalidad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="ciudadLocalidad" name="ciudadLocalidad" placeholder="" value="<?php if(old('ciudadLocalidad')): ?><?php echo e(old('ciudadLocalidad')); ?><?php else: ?><?php echo e($declaracion->datos->ciudadLocalidad); ?><?php endif; ?>" maxlength="100">
                        <?php $__errorArgs = ['ciudadLocalidad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                          <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="codigoPostal">Código Postal: <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['codigoPostal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="codigoPostal" name="codigoPostal" placeholder="" value="<?php if(old('codigoPostal')): ?><?php echo e(old('codigoPostal')); ?><?php else: ?><?php echo e($declaracion->datos->codigoPostal); ?><?php endif; ?>" maxlength="7" required >
                        <?php $__errorArgs = ['codigoPostal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                          <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="calle">Calle: <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['calle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="calle" name="calle" placeholder="" value="<?php if(old('calle')): ?><?php echo e(old('calle')); ?><?php else: ?><?php echo e($declaracion->datos->calle); ?><?php endif; ?>" maxlength="100" required>
                        <?php $__errorArgs = ['calle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                          <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="numeroExterior">Número Exterior: <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['numeroExterior'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="numeroExterior" name="numeroExterior" placeholder="" value="<?php if(old('numeroExterior')): ?><?php echo e(old('numeroExterior')); ?><?php else: ?><?php echo e($declaracion->datos->numeroExterior); ?><?php endif; ?>" maxlength="6" required>
                        <?php $__errorArgs = ['numeroExterior'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                          <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="numeroInterior">Número Interior: </label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['numeroInterior'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="numeroInterior" name="numeroInterior" placeholder="" value="<?php if(old('numeroInterior')): ?><?php echo e(old('numeroInterior')); ?><?php else: ?><?php echo e($declaracion->datos->numeroInterior); ?><?php endif; ?>" maxlength="6">
                        <?php $__errorArgs = ['numeroInterior'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                          <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                    </div>

                    <p>&nbsp;</p>

                    <fieldset>
                      <legend>
                        <h4 class="mb-3">
                          <label for="aclaracionesObservaciones">
                            Aclaraciones / Observaciones:
                          </label>
                        </h4>
                      </legend>
                      <div class="row">
                        <div class="col-md-12 mb-3">
                          <textarea tabindex="<?php echo e(++$tabindex); ?>" class="form-control" id="aclaracionesObservaciones" rows="7" name="aclaracionesObservaciones" placeholder=""><?php if(old('aclaracionesObservaciones')): ?><?php echo e(old('aclaracionesObservaciones')); ?><?php else: ?><?php echo e($declaracion->datos->aclaracionesObservaciones); ?><?php endif; ?></textarea>
                        </div>
                      </div>
                    </fieldset>

                  </fieldset>

                  <button tabindex="<?php echo e(++$tabindex); ?>" class="btn btn-primary btn-lg btn-block" type="submit">Siguiente</button>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('script'); ?>

$(document).ready(function(){

  $("#pais").ready(mostrar_mexico);
  $("#pais").change(mostrar_mexico);

  $("#entidadFederativa_clave").change(mostrar_alcaldias);
  $("#municipioAlcaldia_clave").change(mostrar_localidades);
  $("#coloniaLocalidad_select").change(mostrar_cp);


  function mostrar_mexico()
  {
    var paisValue = $("#pais").val();

    if(paisValue == "MX")
    {
      $('#div_entidadFederativa').show();
      $('#div_municipioAlcaldia').show();
      $('#div_coloniaLocalidad').show();

      $('#div_estadoProvincia').hide();
      $('#div_ciudadLocalidad').hide();

      $('#entidadFederativa_clave').attr("required","required");
      $('#municipioAlcaldia_clave').attr("required","required");
      $('#coloniaLocalidad_select').attr("required","required");
      $('#entidadFederativa_clave').attr("name","entidadFederativa_clave");
      $('#municipioAlcaldia_clave').attr("name","municipioAlcaldia_clave");
      $('#coloniaLocalidad_select').attr("name","coloniaLocalidad");
      $('#codigoPostal').attr("readonly","readonly");

      $('#estadoProvincia').removeAttr("name");
      $('#ciudadLocalidad').removeAttr("name");
      $('#estadoProvincia').removeAttr("required");
      $('#ciudadLocalidad').removeAttr("required");
    }
    else
    {
      $('#div_entidadFederativa').hide();
      $('#div_municipioAlcaldia').hide();
      $('#div_coloniaLocalidad').hide();

      $('#div_estadoProvincia').show();
      $('#div_ciudadLocalidad').show();

      $('#estadoProvincia').attr("required","required");
      $('#ciudadLocalidad').attr("required","required");
      $('#estadoProvincia').attr("name","estadoProvincia");
      $('#ciudadLocalidad').attr("name","ciudadLocalidad");

      $("#entidadFederativa_clave").removeAttr("name");
      $('#municipioAlcaldia_clave').removeAttr("name");
      $('#coloniaLocalidad_select').removeAttr("name");
      $("#entidadFederativa_clave").removeAttr("required");
      $('#municipioAlcaldia_clave').removeAttr("required");
      $('#coloniaLocalidad_select').removeAttr("required");

      $('#codigoPostal').removeAttr("readonly");
      $('#codigoPostal').attr("maxlength","13");
    }
  }



  function mostrar_alcaldias()
  {
    var entidadValue = $("#entidadFederativa_clave").val();

    $('#municipioAlcaldia_clave').find('option').not(':first').remove();

    $.ajax({
      url: '../../catalogo/getAlcaldias/'+entidadValue,
      type: 'get',
      dataType: 'json',
      success: function(response)
      {
        var len = 0;
        if(response != null)
        {
          len = response.length;
        }

        if(len > 0)
        {

          for(var i=0; i<len; i++)
          {
            var id = response[i].Cve_Mun;
            var nombre = response[i].Nom_Mun;
            var entidad = response[i].Cve_Ent;
            var option = "<option value='"+id+"'>"+nombre+"</option>";

            $("#municipioAlcaldia_clave").append(option);
            $('#coloniaLocalidad_select').find('option').not(':first').remove();
          }
        }
      }
    });
  };



  function mostrar_localidades()
  {
    var entidadValue = $("#entidadFederativa_clave").val();
    var alcaldiaValue = $("#municipioAlcaldia_clave").val();

    $('#coloniaLocalidad_select').find('option').not(':first').remove();

    $.ajax({
      url: '../../catalogo/getLocalidades/'+entidadValue+'/'+alcaldiaValue,
      type: 'get',
      dataType: 'json',
      success: function(response)
      {
        var len = 0;
        if(response != null)
        {
          len = response.length;
        }

        if(len > 0)
        {

          for(var i=0; i<len; i++)
          {
            var nombre = response[i].Nom_Loc;
            var option = "<option value='"+nombre+"'>"+nombre+"</option>";
            $("#coloniaLocalidad_select").append(option);
          }
        }
      }
    });
  }



  function mostrar_cp()
  {
    var entidadValue = $("#entidadFederativa_clave").val();
    var alcaldiaValue = $("#municipioAlcaldia_clave").val();
    var localidadValue = $("#coloniaLocalidad_select").val();

    $.ajax({
      url: '../../catalogo/getCP/'+entidadValue+'/'+alcaldiaValue+'/'+localidadValue,
      type: 'get',
      dataType: 'json',
      success: function(response)
      {
        var len = 0;
        if(response != null)
        {
          len = response.length;
        }

        if(len > 0)
        {

          for(var i=0; i<len; i++)
          {
            var cp = response[i].CP;
            $("#codigoPostal").val(cp);
            $("#codigoPostal").attr("readonly","readonly");
          }
        }
      }
    });
  }//////

});
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\declarapat\resources\views/L21_domicilio_declarante.blade.php ENDPATH**/ ?>