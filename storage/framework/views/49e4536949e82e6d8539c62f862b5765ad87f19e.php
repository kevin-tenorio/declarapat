

<?php $__env->startSection('content'); ?>
<div class="content-body">
  <div class="container-fluid">

    <?php echo $__env->make('layouts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
      <div class="col-xl-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">
              DATOS DEL EMPLEO, CARGO O COMISIÓN QUE INICIA
              DATOS DEL EMPLEO, CARGO O COMISIÓN ACTUAL
              DATOS DEL EMPLEO, CARGO O COMISIÓN QUE CONCLUYE
              <br>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="<?php echo e(url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'])); ?>" method="POST" autocomplete="off">
                  <?php echo csrf_field(); ?>

                  <fieldset>
                    <legend>
                      <span class="pull-right" id="agregar">
                        <a href="<?php echo e(url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar')); ?>" class="btn btn-rounded btn-primary">
                          <span class="btn-icon-left text-primary">
                            <i class="fa fa-plus color-info"></i>
                          </span>
                          AGREGAR
                        </a>
                      </span>

                      <h4 class="mb-3">
                        <label>
                          <input type="checkbox" value="1" name="ninguno" id="ninguno" <?php if($declaracion->datos->ninguno == 1 or old('ninguno') == 1): ?> checked  <?php endif; ?>>
                          NINGUNO
                        </label>
                      </h4>
                    </legend>

                    <div class="table-responsive" id="tabla">

                      <p>&nbsp;</p>

                      <table class="table table-responsive-md">
                        <thead>
                          <tr>
                            <th><strong>NO.</strong></th>
                            <th><strong>TIPO OPERACIÓN</strong></th>
                            <th><strong>NOMBRE DEL ENTE PÚBLICO</strong></th>
                            <th><strong>EMPLEO, CARGO O COMISIÓN</strong></th>
                            <th><strong>OPCIONES</strong></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><strong>1</strong></td>
                            <td><div class="d-flex align-items-center"><img src="images/avatar/1.jpg" class="rounded-lg mr-2" width="24" alt=""/> <span class="w-space-no">AGREGAR</span></div></td>
                            <td>H. AYUNTAMIENTO DE JUNGAPEO</td>
                            <td>AUXILIAR</td>
                            <td>
                              <div class="d-flex">
                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                              </div>
                            </td>

                          </tr>
                        </tbody>
                      </table>
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
                        <textarea tabindex="8" class="form-control" id="aclaracionesObservaciones" rows="7" name="aclaracionesObservaciones" placeholder=""><?php if(old('aclaracionesObservaciones')): ?><?php echo e(old('aclaracionesObservaciones')); ?><?php else: ?><?php echo e($declaracion->datos->aclaracionesObservaciones); ?><?php endif; ?></textarea>
                        <div class="invalid-feedback">
                        </div>
                      </div>
                    </div>
                  </fieldset>

                  <button tabindex="9" class="btn btn-primary btn-lg btn-block" type="submit">Siguiente</button>

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
  <?php echo $__env->make('layouts.ninguno', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\declarapat\resources\views/L21_datos_empleo.blade.php ENDPATH**/ ?>