

<?php $__env->startSection('content'); ?>
<div class="content-body">
  <div class="container-fluid">

    <?php echo $__env->make('layouts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">
              <?php if($declaracion->inicial == true): ?>
              Datos Empleo, Cargo o Comisión que Inicia
              <?php endif; ?>
              <?php if($declaracion->modificacion == true): ?>
              Datos Empleo, Cargo o Comisión Actual
              <?php endif; ?>
              <?php if($declaracion->conclusion == true): ?>
              Datos Empleo, Cargo o Comisión que Concluye
              <?php endif; ?>
              <br>
              <small>  </small>
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
                      <h4 class="mb-3">Datos del Empleo Actual:</h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="nombreEntePublico"> Nombre del ente público: 🌐 <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['porcentajePropiedad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nombreEntePublico" name="nombreEntePublico" value="<?php if(old('nombreEntePublico')): ?><?php echo e(old('nombreEntePublico')); ?><?php endif; ?>">
                        <?php $__errorArgs = ['nombreEntePublico'];
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
                        <label for="nivelOrdenGobierno">Nivel orden de Gobierno: 🌐 <code>*</code></label>
                        <select class="form-control <?php $__errorArgs = ['nivelOrdenGobierno'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" tabindex="<?php echo e(++$tabindex); ?>" id="nivelOrdenGobierno" name="nivelOrdenGobierno">
                          <option value="">Seleccione...</option>
                          <?php $__currentLoopData = $declaracion->catalogo->nivelOrdenGobierno(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gobierno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($gobierno->valor); ?>"
                            <?php if($gobierno->valor == old('gobierno')): ?>
                            selected
                            <?php endif; ?>
                            >
                            <?php echo e($gobierno->valor); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['gobierno'];
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
                        <label for="ambitoPublico">Ámbito Público: 🌐 <code>*</code></label>
                        <select class="form-control <?php $__errorArgs = ['ambitoPublico'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" tabindex="<?php echo e(++$tabindex); ?>" id="ambitoPublico" name="ambitoPublico">
                          <option value="">Seleccione...</option>
                          <?php $__currentLoopData = $declaracion->catalogo->ambitoPublico(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($publico->valor); ?>"
                            <?php if($publico->valor == old('publico')): ?>
                            selected
                            <?php endif; ?>
                            >
                            <?php echo e($publico->valor); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['ambitoPublico'];
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
                      <h4 class="mb-3">Datos del Cargo:</h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="areaAdscripción"> Área de adscripción: 🌐 <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['areaAdscripción'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="areaAdscripción" name="areaAdscripción" value="<?php if(old('areaAdscripción')): ?><?php echo e(old('areaAdscripción')); ?><?php endif; ?>">
                        <?php $__errorArgs = ['areaAdscripción'];
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
                        <label for="empleoCargoComision"> Empleo, Cargo o Comisión: 🌐 <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['empleoCargoComision'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="empleoCargoComision" name="empleoCargoComision" value="<?php if(old('empleoCargoComision')): ?><?php echo e(old('empleoCargoComision')); ?><?php endif; ?>">
                        <?php $__errorArgs = ['empleoCargoComision'];
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
                        <label for="nivelEmpleoCargoComision"> Nivel Empleo: 🌐 <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['nivelEmpleoCargoComision'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nivelEmpleoCargoComision" name="nivelEmpleoCargoComision" value="<?php if(old('nivelEmpleoCargoComision')): ?><?php echo e(old('nivelEmpleoCargoComision')); ?><?php endif; ?>">
                        <?php $__errorArgs = ['nivelEmpleoCargoComision'];
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
                        <label for="funcionPrincipal">Función Principal: 🌐 <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['funcionPrincipal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="funcionPrincipal" name="funcionPrincipal" value="<?php if(old('funcionPrincipal')): ?><?php echo e(old('funcionPrincipal')); ?><?php endif; ?>">
                        <?php $__errorArgs = ['funcionPrincipal'];
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
                        <label for="fechaTomaPosesion"> Fecha Toma de Posesión: 🌐 <code>*</code></label>
                        <input type="date" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['fechaTomaPosesion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="fechaTomaPosesion" name="fechaTomaPosesion" value="<?php if(old('fechaTomaPosesion')): ?><?php echo e(old('fechaTomaPosesion')); ?><?php endif; ?>">
                        <?php $__errorArgs = ['nivelEmpleoCargoComision'];
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
                        <label for="contratadoPorHonorarios">¿Está contratado por honorarios? 🌐 <code>*</code></label>
                        <select class="form-control <?php $__errorArgs = ['contratadoPorHonorarios'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" tabindex="<?php echo e(++$tabindex); ?>" id="contratadoPorHonorarios" name="contratadoPorHonorarios">
                          <option value="">Seleccione...</option>
                          <option value=1>SI</option>
                          <option value=0>NO</option>
                        </select>
                        <?php $__errorArgs = ['contratadoPorHonorarios'];
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

                   <legend><h4 class="mb-3">Teléfonos de Contacto:</h4></legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="telefono"> Teléfono de oficina: 🌐 <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['telefono'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="telefono" name="telefono" value="<?php if(old('telefono')): ?><?php echo e(old('telefono')); ?><?php endif; ?>">
                        <?php $__errorArgs = ['telefono'];
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
                        <label for="extension"> Extensión: 🌐 <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['extension'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="extension" name="extension" value="<?php if(old('extension')): ?><?php echo e(old('extension')); ?><?php endif; ?>">
                        <?php $__errorArgs = ['nombreEntePublico'];
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

                  <?php if($declaracion->modificacion == true): ?>
                  <fieldset>
                    <legend>
                      <h4 class="mb-3">Datos del Otro Cargo:</h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-12 mb-3">
                        <label for="otroEmpleoCargoComision_nombreEntePublico"> Nombre del ente público: 🌐 <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['porcentajePropiedad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nombreEntePublico" name="nombreEntePublico" value="<?php if(old('nombreEntePublico')): ?><?php echo e(old('nombreEntePublico')); ?><?php endif; ?>">
                        <?php $__errorArgs = ['nombreEntePublico'];
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
                        <label for="otroEmpleoCargoComision_nivelOrdenGobierno">Nivel orden de Gobierno: 🌐 <code>*</code></label>
                        <select class="form-control <?php $__errorArgs = ['nivelOrdenGobierno'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" tabindex="<?php echo e(++$tabindex); ?>" id="nivelOrdenGobierno" name="nivelOrdenGobierno">
                          <option value="">Seleccione...</option>
                          <?php $__currentLoopData = $declaracion->catalogo->nivelOrdenGobierno(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gobierno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($gobierno->valor); ?>"
                            <?php if($gobierno->valor == old('gobierno')): ?>
                            selected
                            <?php endif; ?>
                            >
                            <?php echo e($gobierno->valor); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['gobierno'];
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
                        <label for="otroEmpleoCargoComision_ambitoPublico">Ámbito Público: 🌐 <code>*</code></label>
                        <select class="form-control <?php $__errorArgs = ['ambitoPublico'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" tabindex="<?php echo e(++$tabindex); ?>" id="ambitoPublico" name="ambitoPublico">
                          <option value="">Seleccione...</option>
                          <?php $__currentLoopData = $declaracion->catalogo->ambitoPublico(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($publico->valor); ?>"
                            <?php if($publico->valor == old('publico')): ?>
                            selected
                            <?php endif; ?>
                            >
                            <?php echo e($publico->valor); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['ambitoPublico'];
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
                        <label for="otroEmpleoCargoComision_areaAdscripción"> Área de adscripción: 🌐 <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['areaAdscripción'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="areaAdscripción" name="areaAdscripción" value="<?php if(old('areaAdscripción')): ?><?php echo e(old('areaAdscripción')); ?><?php endif; ?>">
                        <?php $__errorArgs = ['areaAdscripción'];
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
                        <label for="otroEmpleoCargoComision_empleoCargoComision"> Empleo, Cargo o Comisión: 🌐 <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['empleoCargoComision'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="empleoCargoComision" name="empleoCargoComision" value="<?php if(old('empleoCargoComision')): ?><?php echo e(old('empleoCargoComision')); ?><?php endif; ?>">
                        <?php $__errorArgs = ['empleoCargoComision'];
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
                        <label for="otroEmpleoCargoComision_nivelEmpleoCargoComision"> Nivel Empleo: 🌐 <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['nivelEmpleoCargoComision'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nivelEmpleoCargoComision" name="nivelEmpleoCargoComision" value="<?php if(old('nivelEmpleoCargoComision')): ?><?php echo e(old('nivelEmpleoCargoComision')); ?><?php endif; ?>">
                        <?php $__errorArgs = ['nivelEmpleoCargoComision'];
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
                      <div class="col-md-8 mb-3">
                        <label for="otroEmpleoCargoComision_funcionPrincipal">Función Principal: 🌐 <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['funcionPrincipal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="funcionPrincipal" name="funcionPrincipal" value="<?php if(old('funcionPrincipal')): ?><?php echo e(old('funcionPrincipal')); ?><?php endif; ?>">
                        <?php $__errorArgs = ['funcionPrincipal'];
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
                        <label for="otroEmpleoCargoComision_fechaTomaPosesion"> Fecha Toma de Posesión: 🌐 <code>*</code></label>
                        <input type="date" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['fechaTomaPosesion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="fechaTomaPosesion" name="fechaTomaPosesion" value="<?php if(old('fechaTomaPosesion')): ?><?php echo e(old('fechaTomaPosesion')); ?><?php endif; ?>">
                        <?php $__errorArgs = ['nivelEmpleoCargoComision'];
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
                        <label for="otroEmpleoCargoComision_contratadoPorHonorarios">¿Está contratado por honorarios? 🌐 <code>*</code></label>
                        <select class="form-control <?php $__errorArgs = ['contratadoPorHonorarios'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" tabindex="<?php echo e(++$tabindex); ?>" id="contratadoPorHonorarios" name="contratadoPorHonorarios">
                          <option value="">Seleccione...</option>
                          <option value=1>SI</option>
                          <option value=0>NO</option>
                        </select>
                        <?php $__errorArgs = ['contratadoPorHonorarios'];
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
                  <?php endif; ?>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\declarapat\resources\views/L21_datos_empleo_datos.blade.php ENDPATH**/ ?>