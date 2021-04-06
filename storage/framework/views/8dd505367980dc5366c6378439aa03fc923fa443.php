

<?php $__env->startSection('content'); ?>
<div class="content-body">
  <div class="container-fluid">

    <?php echo $__env->make('layouts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">
              Bienes Inmuebles
              <br>
              <small>
                <?php if($declaracion->inicial == true): ?>
                 Situación Actual
                <?php endif; ?>
              </small>
              <small>
                <?php if($declaracion->inicial == true): ?>
                Entre el 01 de Enero y el 31 de Diciembre del Año Inmediato Anterior
                <?php endif; ?>
              </small>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="<?php echo e(url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar')); ?>" method="POST" autocomplete="off">
                  <?php echo csrf_field(); ?>

                  <input name="tipoOperacion" type="hidden" value="<?php echo e(Str::upper(Route::current()->parameters()['operacion'])); ?>">

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">Datos del Inmueble:</h4>
                    </legend>

                    <div class="row">
                      <div class="form-group col-md-6 mb-3">
                        <label for="titular">Titular del bien: <code>*</code></label>
                        <select class="form-control <?php $__errorArgs = ['tipoInmueble'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" tabindex="<?php echo e(++$tabindex); ?>" id="titular" name="titular">
                          <option value="">Seleccione...</option>
                          <?php $__currentLoopData = $declaracion->catalogo->tipoRelacion(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($relacion->valor); ?>"
                            <?php if($relacion->valor == old('relacion')): ?>
                            selected
                            <?php endif; ?>
                            >
                            <?php echo e($relacion->valor); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['relacion'];
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

                      <div class="col-md-6 mb-3">
                        <label for="porcentajePropiedad"> Porcentaje de Propiedad: 🌐 <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['porcentajePropiedad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="porcentajePropiedad" name="porcentajePropiedad" value="<?php if(old('porcentajePropiedad')): ?><?php echo e(old('porcentajePropiedad')); ?><?php endif; ?>">
                        <?php $__errorArgs = ['porcentajePropiedad'];
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


                      <div class="col-md-6 mb-3">
                        <label for="tipoInmueble">Tipo de inmueble: 🌐 <code>*</code></label>
                        <select class="form-control <?php $__errorArgs = ['representacion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" tabindex="<?php echo e(++$tabindex); ?>" id="tipoInmueble" name="tipoInmueble">
                          <option value="">Seleccione...</option>
                          <?php $__currentLoopData = $declaracion->catalogo->tipoRepresentacion(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $representacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($representacion->valor); ?>"
                            <?php if($representacion->valor == old('representacion')): ?>
                            selected
                            <?php endif; ?>
                            >
                            <?php echo e($representacion->valor); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['representacion'];
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

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">Datos del Transmisor:</h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="tipoPersona">Tipo de Persona: 🌐 <code>*</code></label>
                        <select class="form-control <?php $__errorArgs = ['tipoPersona'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" tabindex="<?php echo e(++$tabindex); ?>" id="tipoPersona" name="tipoPersona">
                          <option value="">Seleccione...</option>
                          <?php $__currentLoopData = $declaracion->catalogo->tipoRelacion(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($relacion->valor); ?>"
                            <?php if($relacion->valor == old('relacion')): ?>
                            selected
                            <?php endif; ?>
                            >
                            <?php echo e($relacion->valor); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['relacion'];
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
                      <div class="col-md-6 mb-3">
                        <label for="nombreRazonSocial"> Nombre del Transmisor: <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['nombreRazonSocial'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nombreRazonSocial" name="nombreRazonSocial" value="<?php if(old('nombreRazonSocial')): ?><?php echo e(old('nombreRazonSocial')); ?><?php endif; ?>">
                        <?php $__errorArgs = ['nombreRazonSocial'];
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

                      <div class="col-md-6 mb-3">
                        <label for="rfc"> RFC: <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['rfc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="rfc" name="rfc" value="<?php if(old('rfc')): ?><?php echo e(old('rfc')); ?><?php endif; ?>">
                        <?php $__errorArgs = ['rfc'];
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
                      <div class="col-md-6 mb-3">
                        <label for="relacion">Relación del Transmisor: <code>*</code></label>
                        <select class="form-control <?php $__errorArgs = ['relacion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" tabindex="<?php echo e(++$tabindex); ?>" id="relacion" name="relacion">
                          <option value="">Seleccione...</option>
                          <?php $__currentLoopData = $declaracion->catalogo->tipoRelacion(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($relacion->valor); ?>"
                            <?php if($relacion->valor == old('relacion')): ?>
                            selected
                            <?php endif; ?>
                            >
                            <?php echo e($relacion->valor); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['relacion'];
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


                  <fieldset>
                    <legend><h4 class="mb-3">Datos del Terreno:</h4></legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="superficieTerreno_valor">Superficie del Terreno: 🌐 <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['superficieTerreno_valor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="superficieTerreno_valor" name="superficieTerreno_valor" value="<?php if(old('superficieTerreno_valor')): ?><?php echo e(old('superficieTerreno_valor')); ?><?php endif; ?>">
                        <?php $__errorArgs = ['superficieTerreno_valor'];
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

                      <div class="col-md-6 mb-3">
                        <label for="superficieTerreno_unidad">Unidad: 🌐 <code>*</code></label>
                        <select class="form-control <?php $__errorArgs = ['superficieTerreno_unidad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" tabindex="<?php echo e(++$tabindex); ?>" id="superficieTerreno_unidad" name="superficieTerreno_unidad">
                          <option value="">Seleccione...</option>
                          <?php $__currentLoopData = $declaracion->catalogo->tipopersona(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $persona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($persona->valor); ?>"
                            <?php if($persona->valor == old('persona')): ?>
                            selected
                            <?php endif; ?>
                            >
                            <?php echo e($persona->valor); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['tipoPersona'];
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
                      <div class="col-md-6 mb-3">
                        <label for="superficieConstruccion_valor">Superficie de Construcción: 🌐 <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['superficieConstruccion_valor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="superficieConstruccion_valor" name="superficieConstruccion_valor" value="<?php if(old('superficieConstruccion_valor')): ?><?php echo e(old('superficieConstruccion_valor')); ?><?php endif; ?>">
                        <?php $__errorArgs = ['superficieConstruccion_valor'];
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

                      <div class="col-md-6 mb-3">
                        <label for="superficieConstruccion_unidad">Unidad: 🌐 <code>*</code></label>
                        <select class="form-control <?php $__errorArgs = ['superficieConstruccion_unidad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" tabindex="<?php echo e(++$tabindex); ?>" id="superficieConstruccion_unidad" name="superficieConstruccion_unidad">
                          <option value="">Seleccione...</option>
                          <?php $__currentLoopData = $declaracion->catalogo->tipopersona(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $persona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($persona->valor); ?>"
                            <?php if($persona->valor == old('persona')): ?>
                            selected
                            <?php endif; ?>
                            >
                            <?php echo e($persona->valor); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['tipoPersona'];
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

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">Datos de Adquisición del Bien Inmueble</h4>
                    </legend>
                    <div class="row" >
                      <div class="col-md-6 mb-3">
                        <label for="formaPago">Forma de Pago: 🌐 <code>*</code></label>
                        <select class="form-control <?php $__errorArgs = ['formaPago'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" tabindex="<?php echo e(++$tabindex); ?>" id="formaPago" name="formaPago">
                          <option value="">Seleccione...</option>
                          <?php $__currentLoopData = $declaracion->catalogo->tipopersona(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $persona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($persona->valor); ?>"
                            <?php if($persona->valor == old('persona')): ?>
                            selected
                            <?php endif; ?>
                            >
                            <?php echo e($persona->valor); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['tipoPersona'];
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

                    <div class="row" >
                      <div class="col-md-6 mb-3">
                        <label for="valorAdquisicion_valor">Valor de Adquisición: 🌐 <code>*</code></label>
                        <div class="input-group input-default">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="number-separator form-control <?php $__errorArgs = ['valorAdquisicion_valor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="valorAdquisicion_valor" name="valorAdquisicion_valor" value="<?php if(old('valorAdquisicion_valor')): ?><?php echo e(old('valorAdquisicion_valor')); ?><?php endif; ?>" required maxlength="20" style="text-align:right">
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                          <?php $__errorArgs = ['valorAdquisicion_valor'];
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
                      <div class="col-md-6 mb-3">
                        <label for="valorAdquisicion_moneda"> Moneda: 🌐 <code>*</code></label>
                        <select class="form-control <?php $__errorArgs = ['valorAdquisicion_moneda'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" tabindex="<?php echo e(++$tabindex); ?>" id="valorAdquisicion_moneda" name="valorAdquisicion_moneda" required>
                          <option value="">Seleccione...</option>
                          <?php $__currentLoopData = $declaracion->catalogo->tipoMoneda(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($tipo->clave); ?>"
                            <?php if(old('valorAdquisicion_moneda') == null and $tipo->default == 1): ?>
                            selected
                            <?php elseif($tipo->clave == old('valorAdquisicion_moneda')): ?>
                            selected
                            <?php endif; ?>
                            >
                            <?php echo e($tipo->valor); ?> - <?php echo e($tipo->clave); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['valorAdquisicion_moneda'];
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

                    <div class="row" >
                      <div class="col-md-6 mb-3">
                        <label for="valorConformeA">Valor conforme a: 🌐 <code>*</code></label>
                        <select class="form-control <?php $__errorArgs = ['valorConformeA'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" tabindex="<?php echo e(++$tabindex); ?>" id="valorConformeA" name="valorConformeA">
                          <option value="">Seleccione...</option>
                          <?php $__currentLoopData = $declaracion->catalogo->tipoRelacion(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($relacion->valor); ?>"
                            <?php if($relacion->valor == old('relacion')): ?>
                            selected
                            <?php endif; ?>
                            >
                            <?php echo e($relacion->valor); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['relacion'];
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
                      <div class="col-md-6 mb-3">
                        <label for="datoIdentificacion"> Dato de Identificación: <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['datoIdentificacion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="datoIdentificacion" name="datoIdentificacion" value="<?php if(old('datoIdentificacion')): ?><?php echo e(old('datoIdentificacion')); ?><?php endif; ?>">
                        <?php $__errorArgs = ['datoIdentificacion'];
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

                      <div class="col-md-6 mb-3">
                        <label for="fechaAdquisicion"> Fecha de Adquisición: 🌐 <code>*</code></label>
                        <input type="date" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['fechaAdquisicion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="fechaAdquisicion" name="fechaAdquisicion" value="<?php if(old('fechaAdquisicion')): ?><?php echo e(old('fechaAdquisicion')); ?><?php endif; ?>">
                        <?php $__errorArgs = ['fechaAdquisicion'];
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

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">Motivo de Baja</h4>
                    </legend>
                    <div class="row" >
                      <div class="col-md-6 mb-3">
                        <label for="motivoBaja">Motivo de Baja 🌐 <code>*</code></label>
                        <select class="form-control <?php $__errorArgs = ['motivoBaja'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" tabindex="<?php echo e(++$tabindex); ?>" id="motivoBaja" name="motivoBaja">
                          <option value="">Seleccione...</option>
                          <?php $__currentLoopData = $declaracion->catalogo->tipopersona(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $persona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($persona->valor); ?>"
                            <?php if($persona->valor == old('persona')): ?>
                            selected
                            <?php endif; ?>
                            >
                            <?php echo e($persona->valor); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['motivoBaja'];
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
<!--**********************************
Content body end
***********************************-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
$("#pais").ready(entidad);
$("#pais").change(entidad);

function entidad()
{
  var paisValue = $("#pais").val();

  if(paisValue == "MX")
  {
    $('#div_entidadFederativa').show();
  }
  else
  {
    $('#div_entidadFederativa').hide();
  }
}



$("#sector").ready(sector);
$("#sector").change(sector);

function sector()
{
  var sectorValue = $("#sector").val();

  if(sectorValue == "OTRO")
  {
    $('#div_especifiqueSector').show();
  }
  else
  {
    $('#div_especifiqueSector').hide();
  }
}

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\declarapat\resources\views/L21_bienes_inmuebles_datos.blade.php ENDPATH**/ ?>