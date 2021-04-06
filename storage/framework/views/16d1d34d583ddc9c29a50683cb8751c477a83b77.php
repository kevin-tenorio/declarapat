<?php if(count($errors) > 0): ?>
  <div class="alert alert-danger">
    <ul>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
<?php endif; ?>


<?php if(Session::has('success')): ?>
  <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
<?php endif; ?>


<?php if(Session::get('danger')): ?>
  <div class="alert alert-danger"><?php echo e(Session::get('danger')); ?></div>
<?php endif; ?>


<?php if(Session::get('warning')): ?>
  <div class="alert alert-warning"><?php echo e(Session::get('warning')); ?></div>
<?php endif; ?>


<?php if(Session::get('info')): ?>
  <div class="alert alert-info"><?php echo e(Session::get('info')); ?></div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\declarapat\resources\views/layouts/alert.blade.php ENDPATH**/ ?>