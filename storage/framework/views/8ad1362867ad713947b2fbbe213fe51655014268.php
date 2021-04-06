

<?php $__env->startSection('content'); ?>
<div class="content-body">
  <div class="container-fluid">

    <?php echo $__env->make('layouts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">
              DATOS GENERALES
              <br>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="<?php echo e(url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'])); ?>" method="POST" autocomplete="off">
                  <?php echo csrf_field(); ?>

                  <fieldset>
                    <legend><h4 class="mb-3">Tus datos personales:</h4></legend>


                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="nombres">Nombre(s): 🌐 <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" autofocus class="form-control <?php $__errorArgs = ['nombres'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nombres" name="nombres" value="<?php if(old('nombres')): ?><?php echo e(old('nombres')); ?><?php else: ?><?php echo e($declaracion->datos->nombres); ?><?php endif; ?>" maxlength="100" required="required">
                        <?php $__errorArgs = ['nombres'];
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
                        <label for="primerApellido">Primer apellido: 🌐 <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['primerApellido'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="primerApellido" name="primerApellido" placeholder="" value="<?php if(old('primerApellido')): ?><?php echo e(old('primerApellido')); ?><?php else: ?><?php echo e($declaracion->datos->primerApellido); ?><?php endif; ?>" maxlength="50" required="required">
                        <?php $__errorArgs = ['primerApellido'];
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
                        <label for="segundoApellido">Segundo apellido: 🌐</label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['segundoApellido'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="segundoApellido" name="segundoApellido" placeholder="" value="<?php if(old('segundoApellido')): ?><?php echo e(old('segundoApellido')); ?><?php else: ?><?php echo e($declaracion->datos->segundoApellido); ?><?php endif; ?>" maxlength="50">
                        <?php $__errorArgs = ['segundoApellido'];
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
                        <label for="paisNacimiento">País de nacimiento: <code>*</code></label>
                        <select tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['paisNacimiento'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="paisNacimiento" name="paisNacimiento" required="required">
                          <option value="">Seleccione...</option>
                          <?php $__currentLoopData = $declaracion->catalogo->paises(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pais): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($pais->ISO2); ?>"
                            <?php if(old('paisNacimiento') == $pais->ISO2): ?>
                            selected
                            <?php elseif($declaracion->datos->paisNacimiento == $pais->ISO2 and old('paisNacimiento') == null): ?>
                            selected
                            <?php elseif(old('paisNacimiento') == null and $declaracion->datos->paisNacimiento == null): ?>
                              <?php if($pais->default == true): ?> selected <?php endif; ?>
                            <?php endif; ?>
                            >
                            <?php echo e($pais->ESPANOL); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['paisNacimiento'];
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
                        <label for="nacionalidad">Nacionalidad: <code>*</code></label>
                        <select tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['nacionalidad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nacionalidad" name="nacionalidad" required="required">
                          <option value="">Seleccione...</option>
                          <?php $__currentLoopData = $declaracion->catalogo->paises(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pais): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($pais->ISO2); ?>"
                            <?php if(old('nacionalidad') == $pais->ISO2): ?>
                            selected
                            <?php elseif($declaracion->datos->nacionalidad == $pais->ISO2 and old('nacionalidad') == null): ?>
                            selected
                            <?php elseif(old('nacionalidad') == null and $declaracion->datos->nacionalidad == null): ?>
                              <?php if($pais->default == true): ?> selected <?php endif; ?>
                            <?php endif; ?>
                            >
                            <?php echo e($pais->ESPANOL); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['nacionalidad'];
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
                        <label for="curp">CURP: <code>*</code></label>
                        <input tabindex="<?php echo e(++$tabindex); ?>" type="text" class="form-control <?php $__errorArgs = ['curp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="curp" name="curp" placeholder="" value="<?php if(old('curp')): ?><?php echo e(old('curp')); ?><?php else: ?><?php echo e($declaracion->datos->curp); ?><?php endif; ?>" minlength="18" maxlength="18" required="required">
                        <?php $__errorArgs = ['curp'];
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
                        <label for="rfc_rfc">RFC: <code>*</code></label>
                        <input tabindex="<?php echo e(++$tabindex); ?>" type="text" class="form-control <?php $__errorArgs = ['rfc_rfc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="rfc_rfc" name="rfc_rfc" placeholder="" value="<?php if(old('rfc_rfc')): ?><?php echo e(old('rfc_rfc')); ?><?php else: ?><?php echo e($declaracion->datos->rfc_rfc); ?><?php endif; ?>"  maxlength="10" minlength="10" required="required">
                        <?php $__errorArgs = ['rfc_rfc'];
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

                      <div class="col-md-2 mb-3">
                        <label for="rfc_homoClave">Homoclave: <code>*</code></label>
                        <input tabindex="<?php echo e(++$tabindex); ?>" type="text" class="form-control <?php $__errorArgs = ['rfc_homoClave'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="rfc_homoClave" name="rfc_homoClave" placeholder="" value="<?php if(old('rfc_homoClave')): ?><?php echo e(old('rfc_homoClave')); ?><?php else: ?><?php echo e($declaracion->datos->rfc_homoClave); ?><?php endif; ?>" maxlength="3" minlength="3" required="required">
                        <?php $__errorArgs = ['rfc_homoClave'];
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

                    <legend><h4 class="mb-3">¿Dónde te contactamos?</h4></legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                      <label for="correoElectronico_institucional">Correo institucional: 🌐<code>*</code></label>
                        <input tabindex="<?php echo e(++$tabindex); ?>" type="email" class="form-control <?php $__errorArgs = ['correoElectronico_institucional'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="correoElectronico_institucional" name="correoElectronico_institucional" placeholder="tu@ejemplo.gob.mx" maxlength="75" value="<?php if(old('correoElectronico_institucional')): ?><?php echo e(old('correoElectronico_institucional')); ?><?php else: ?><?php echo e($declaracion->datos->correoElectronico_institucional); ?><?php endif; ?>">
                        <?php $__errorArgs = ['correoElectronico_institucional'];
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
                        <label for="correoElectronico_personal">Correo personal:</label>
                        <input tabindex="<?php echo e(++$tabindex); ?>" type="email" class="form-control <?php $__errorArgs = ['correoElectronico_personal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="correoElectronico_personal" name="correoElectronico_personal" placeholder="tu@ejemplo.com" maxlength="75" value="<?php if(old('correoElectronico_personal')): ?><?php echo e(old('correoElectronico_personal')); ?><?php else: ?><?php echo e($declaracion->datos->correoElectronico_personal); ?><?php endif; ?>">
                        <?php $__errorArgs = ['correoElectronico_personal'];
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
                        <label for="telefono_casa">Lada + Teléfono de casa:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">+</span>
                          </div>
                          <select tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['telefono_casa_lada'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="telefono_casa_lada" name="telefono_casa_lada" required="required">
                            <option value="">Seleccione...</option>
                            <?php $__currentLoopData = $declaracion->catalogo->paises(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pais): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($pais->LADA); ?>"
                              <?php if(old('telefono_casa_lada') == $pais->LADA): ?>
                              selected
                              <?php elseif($declaracion->datos->telefono_casa_lada == $pais->LADA and old('telefono_casa_lada') == null): ?>
                              selected
                              <?php elseif(old('telefono_casa_lada') == null and $declaracion->datos->telefono_casa_lada == null): ?>
                                <?php if($pais->default == true): ?> selected <?php endif; ?>
                              <?php endif; ?>
                              >
                              <?php echo e($pais->ESPANOL); ?>

                              <?php echo e($pais->LADA); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                          <input tabindex="<?php echo e(++$tabindex); ?>" type="text" class="form-control <?php $__errorArgs = ['telefono_casa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="telefono_casa" name="telefono_casa" value="<?php if(old('telefono_casa')): ?><?php echo e(old('telefono_casa')); ?><?php else: ?><?php echo e($declaracion->datos->telefono_casa); ?><?php endif; ?>" minlength="10" maxlength="10">
                          <?php $__errorArgs = ['telefono_casa'];
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
                          <?php $__errorArgs = ['telefono_casa_lada'];
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
                        <label for="telefono_celularPersonal">Lada + Teléfono celular:<code>*</code></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">+</span>
                          </div>
                          <select tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['telefono_celularPersonal_lada'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="telefono_celularPersonal_lada" name="telefono_celularPersonal_lada" required="required">
                            <option value="">Seleccione...</option>
                            <?php $__currentLoopData = $declaracion->catalogo->paises(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pais): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($pais->LADA); ?>"
                              <?php if(old('telefono_celularPersonal_lada') == $pais->LADA): ?>
                              selected
                              <?php elseif($declaracion->datos->telefono_celularPersonal_lada == $pais->LADA and old('telefono_celularPersonal_lada') == null): ?>
                              selected
                              <?php elseif(old('telefono_celularPersonal_lada') == null and $declaracion->datos->telefono_celularPersonal_lada == null): ?>
                                <?php if($pais->default == true): ?> selected <?php endif; ?>
                              <?php endif; ?>
                              >
                              <?php echo e($pais->ESPANOL); ?>

                              <?php echo e($pais->LADA); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                          <input tabindex="<?php echo e(++$tabindex); ?>" type="text" class="form-control <?php $__errorArgs = ['telefono_celularPersonal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="telefono_celularPersonal" name="telefono_celularPersonal" minlength="10" maxlength="10" value="<?php if(old('telefono_celularPersonal')): ?><?php echo e(old('telefono_celularPersonal')); ?><?php else: ?><?php echo e($declaracion->datos->telefono_celularPersonal); ?><?php endif; ?>">
                          <?php $__errorArgs = ['telefono_celularPersonal'];
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
                          <?php $__errorArgs = ['telefono_celularPersonal_lada'];
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
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend><h4 class="mb-3">¿Cuál es tu situación personal?</h4></legend>
                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="situacionPersonalEstadoCivil_clave">Estado civil: <code>*</code></label>
                        <select tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['situacionPersonalEstadoCivil_clave'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="situacionPersonalEstadoCivil_clave" name="situacionPersonalEstadoCivil_clave" required="required">
                          <option value="">Seleccione...</option>
                          <?php $__currentLoopData = $declaracion->catalogo->estadoCivil(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $civil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($civil->clave); ?>"
                            <?php if(old('situacionPersonalEstadoCivil_clave') == $civil->clave): ?>
                              selected
                            <?php elseif($declaracion->datos->situacionPersonalEstadoCivil_clave == $civil->clave and old('situacionPersonalEstadoCivil_clave') == null): ?>
                              <?php if($civil->clave == $declaracion->datos->situacionPersonalEstadoCivil_clave): ?> selected <?php endif; ?>
                            <?php endif; ?>
                            >
                            <?php echo e($civil->valor); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['situacionPersonalEstadoCivil_clave'];
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

                      <div id="div_regmat" class="col-md-4 mb-3">
                        <label for="regimenMatrimonial_clave">Régimen matrimonial: <code>*</code></label>
                        <select tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['regimenMatrimonial_clave'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="regimenMatrimonial_clave" name="regimenMatrimonial_clave">
                          <option value="">Seleccione...</option>
                          <?php $__currentLoopData = $declaracion->catalogo->regimenMatrimonial(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $regimen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($regimen->clave); ?>"
                            <?php if(!is_null($declaracion->datos->regimenMatrimonial_clave)): ?>
                              <?php if($regimen->clave == $declaracion->datos->regimenMatrimonial_clave): ?> selected <?php endif; ?>
                            <?php endif; ?>
                          >
                            <?php echo e($regimen->valor); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['regimenMatrimonial_clave'];
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

                      <div id="div_otro" class="col-md-4 mb-3">
                        <label for="especifiqueRegimen">Otro: <code>*</code></label>
                        <input type="text" tabindex="<?php echo e(++$tabindex); ?>" class="form-control <?php $__errorArgs = ['especifiqueRegimen'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="especifiqueRegimen" name="especifiqueRegimen" value="<?php if(old('especifiqueRegimen')): ?><?php echo e(old('especifiqueRegimen')); ?><?php else: ?><?php echo e($declaracion->datos->especifiqueRegimen); ?><?php endif; ?>" maxlength="100">
                        <?php $__errorArgs = ['especifiqueRegimen'];
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
$("#situacionPersonalEstadoCivil_clave").ready(mostrar_regmat);
$("#situacionPersonalEstadoCivil_clave").change(mostrar_regmat);

function mostrar_regmat()
{
  var sitperValue = $( "#situacionPersonalEstadoCivil_clave" ).val();

  if(sitperValue == "CAS")
  {
    $('#div_regmat').show();
    $('#regimenMatrimonial_clave').attr("required", "required");
    $('#regimenMatrimonial_clave').attr("name", "regimenMatrimonial_clave");

    <?php if(old('regimenMatrimonial_clave')): ?>
      $('#regimenMatrimonial_clave option[value="<?php echo e(old('regimenMatrimonial_clave')); ?>"]').attr("selected", "selected");
    <?php endif; ?>
  }
  else
  {
    $('#div_regmat').hide();
    $("#regimenMatrimonial_clave").removeAttr("required");
    $("#regimenMatrimonial_clave").removeAttr("name");
    $('#regimenMatrimonial_clave option:selected').removeAttr('selected');


    $('#div_otro').hide();
    $("#otro").removeAttr("required");
    $("#otro").removeAttr("name");
  }
}



$("#regimenMatrimonial_clave").ready(mostrar_otro);
$("#regimenMatrimonial_clave").change(mostrar_otro);

function mostrar_otro()
{
  var regmatValue = $( "#regimenMatrimonial_clave" ).val();

  if(regmatValue == "OTR")
  {
    $('#div_otro').show();
    $('#especifiqueRegimen').attr("required", "required");
    $('#especifiqueRegimen').attr("name", "especifiqueRegimen");
  }
  else
  {
    $('#div_otro').hide();
    $("#especifiqueRegimen").removeAttr("required");
    $("#especifiqueRegimen").removeAttr("name");
  }
}

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\declarapat\resources\views/L21_datos_generales.blade.php ENDPATH**/ ?>