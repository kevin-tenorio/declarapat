

<?php $__env->startSection('content'); ?>
<div class="content-body">
  <div class="container-fluid">

    <?php echo $__env->make('layouts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">
              Datos Curriculares del Declarante
              <br>
              <small> </small>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="<?php echo e(url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar')); ?>" method="POST" autocomplete="off">
                  <?php echo csrf_field(); ?>
                  <input name="tipoOperacion" type="hidden" value="<?php echo e(Str::upper(Route::current()->parameters()['operacion'])); ?>">

                  <fieldset>
                    <legend><h4 class="mb-3">¿Dónde estudiaste?</h4></legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="nivel_clave">Nivel: 🌐 <code>*</code></label>
                        <select class="form-control <?php $__errorArgs = ['nivel_clave'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" tabindex="<?php echo e(++$tabindex); ?>" id="nivel_clave" name="nivel_clave" autofocus>
                          <option value="">Seleccione...</option>
                          <?php $__currentLoopData = $declaracion->catalogo->nivel(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nivel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($nivel->clave); ?>"
                            <?php if($nivel->clave == old('nivel_clave')): ?>
                            selected
                            <?php endif; ?>
                          >
                          <?php echo e($nivel->valor); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['nivel_clave'];
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

                      <div class="col-md-8 mb-3">
                        <label for="carreraAreaConocimiento">Carrera o Área de Conocimiento: 🌐 <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['carreraAreaConocimiento'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="carreraAreaConocimiento" name="carreraAreaConocimiento" value="<?php if(old('carreraAreaConocimiento')): ?><?php echo e(old('carreraAreaConocimiento')); ?><?php endif; ?>">
                        <?php $__errorArgs = ['carreraAreaConocimiento'];
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

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="institucionEducativa_ubicacion">Ubicación del Instituto: 🌐 <code>*</code></label>
                        <select class="form-control <?php $__errorArgs = ['institucionEducativa_ubicacion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" tabindex="<?php echo e(++$tabindex); ?>" id="institucionEducativa_ubicacion" name="institucionEducativa_ubicacion" >
                          <option value="">Seleccione...</option>
                          <?php $__currentLoopData = $declaracion->catalogo->extranjero(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localizacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($localizacion->clave); ?>"
                            <?php if($localizacion->clave == old('institucionEducativa_ubicacion')): ?>
                            selected
                            <?php endif; ?>
                          >
                          <?php echo e($localizacion->valor); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['institucionEducativa_ubicacion'];
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

                      <div class="col-md-8 mb-3">
                        <label for="institucionEducativa_nombre">Institución Educativa: 🌐 <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['institucionEducativa_nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="institucionEducativa_nombre" name="institucionEducativa_nombre" value="<?php if(old('institucionEducativa_nombre')): ?><?php echo e(old('institucionEducativa_nombre')); ?><?php endif; ?>">
                        <?php $__errorArgs = ['institucionEducativa_nombre'];
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

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="estatus">Estatus: 🌐 <code>*</code></label>
                        <select class="form-control <?php $__errorArgs = ['estatus'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" tabindex="<?php echo e(++$tabindex); ?>" id="estatus" name="estatus" value="" >
                          <option value="">Seleccione...</option>
                          <?php $__currentLoopData = $declaracion->catalogo->estatus(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($estatus->valor); ?>"
                          <?php if($estatus->valor == old('estatus')): ?>
                          selected
                          <?php endif; ?>
                          >
                          <?php echo e($estatus->valor); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['estatus'];
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
                        <label for="documentoObtenido">Documento Obtenido: 🌐 <code>*</code></label>
                        <select class="form-control <?php $__errorArgs = ['documentoObtenido'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" tabindex="<?php echo e(++$tabindex); ?>" id="documentoObtenido" name="documentoObtenido">
                          <option value="">Seleccione...</option>
                          <?php $__currentLoopData = $declaracion->catalogo->documentoObtenido(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $documento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($documento->clave); ?>"
                          <?php if($documento->valor == old('documentoObtenido')): ?>
                          selected
                          <?php endif; ?>
                          >
                          <?php echo e($documento->valor); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['documentoObtenido'];
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
                        <label for="fechaObtencion">Fecha del Documento 🌐 <code>*</code> </label>
                        <input type="date" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['fechaObtencion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="fechaObtencion" name="fechaObtencion" placeholder="" value="<?php if(old('fechaObtencion')): ?><?php echo e(old('fechaObtencion')); ?><?php endif; ?>" >
                        <?php $__errorArgs = ['fechaObtencion'];
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

                  </fieldset>

                  <p>&nbsp;</p>

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
$("#nivel_clave").ready(area);
$("#nivel_clave").change(area);

function area()
{
  var nivelValue = $("#nivel_clave" ).val();

  if(nivelValue == "PRI")
  {
    $('#carreraAreaConocimiento').attr("value", "EDUCACIÓN BÁSICA");
    $('#carreraAreaConocimiento').attr("readonly", "readonly");
    $("#documentoObtenido option[value='TITULO']").remove();
  }
  if(nivelValue == "SEC")
  {
    $('#carreraAreaConocimiento').attr("value", "EDUCACIÓN MEDIA");
    $('#carreraAreaConocimiento').attr("readonly", "readonly");
    $("#documentoObtenido option[value='TITULO']").remove();
  }
  if(nivelValue == "BCH")
  {
    $('#carreraAreaConocimiento').attr("value", "EDUCACIÓN MEDIA SUPERIOR");
    $('#carreraAreaConocimiento').attr("readonly", "readonly");
  }
  if(nivelValue == "CTC" || nivelValue == "LIC")
  {
    $('#carreraAreaConocimiento').attr("value", "");
    $('#carreraAreaConocimiento').attr("placeholder", "¿Cual es tu carrera? ");
    $('#carreraAreaConocimiento').removeAttr("readonly");
  }
  if(nivelValue == "MAE" || nivelValue == "ESP" || nivelValue == "DOC")
  {
    $('#carreraAreaConocimiento').attr("value", "");
    $('#carreraAreaConocimiento').attr("placeholder", "¿En que te especializaste?");
    $('#carreraAreaConocimiento').removeAttr("readonly");
  }
  if(0 === nivelValue.length)
  {
    $('#carreraAreaConocimiento').removeAttr("readonly");
    $('#carreraAreaConocimiento').removeAttr("value");
    $('#carreraAreaConocimiento').removeAttr("placeholder");
  }
}
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\declarapat\resources\views/L21_datos_curriculares_datos.blade.php ENDPATH**/ ?>