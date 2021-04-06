

<?php $__env->startSection('content'); ?>
<div class="content-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-12">
        <ul class="nav nav-pills review-tab">
          <li class="nav-item">
            <a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">
              Declaraciones Pendientes
            </a>
          </li>
          <li class="nav-item">
            <a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">
              Declaración Anteriores
            </a>
          </li>
        </ul>
        <div class="tab-content">
          <div id="navpills-1" class="tab-pane active">
            <div class="card review-table">
              <div class="table-responsive">
                <table class="table header-border verticle-middle">
                  <thead>
                    <tr>
                      <th scope="col">TIPO DE DECLARACIÓN</th>
                      <th scope="col">FECHA DE INICIO</th>
                      <th scope="col">FECHA LÍMITE</th>
                      <th scope="col">FECHA FINALIZACIÓN</th>
                      <th scope="col">AVANCE</th>
                      <th scope="col">OPCIONES</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>
                        <form id="declaracion" action="<?php echo e(url('/declaracion')); ?>" method="post">
                          <?php echo csrf_field(); ?>
                          <select name="tipo" required class="form-control">
                            <option value="">Seleccionar:</option>
                            <option value="Inicial">Inicial</option>
                            <option value="Modificación">Modificación</option>
                            <option value="Conclusión">Conclusión</option>
                          </select>
                        </form>
                      </th>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>
                        <button form="declaracion" type="submit" class="btn btn-info btn-sm">Crear</button>
                      </td>
                    </tr>
                    <?php $__currentLoopData = $declaraciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $declaracion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($declaracion->tipo); ?></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>
                        <a href="<?php echo e(url('declaracion/'.$declaracion->id)); ?>" class="btn btn-success btn-sm">Continuar</button>
                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div id="navpills-2" class="tab-pane">
            <div class="card review-table">
              h2
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\declarapat\resources\views/inicio.blade.php ENDPATH**/ ?>