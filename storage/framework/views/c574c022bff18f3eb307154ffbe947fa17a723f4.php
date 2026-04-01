
<?php if(Session::has('success')): ?>
    <!-- Success Alert -->
    <div class="alert alert-primary alert-dismissible alert-solid alert-label-icon fade show" role="alert">
        <i class="ri-user-smile-line label-icon"></i>
        <strong>Success !</strong> <?php echo e(session('success')); ?>

        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if(Session::has('error')): ?>
    <!-- Danger Alert -->
    <div class="alert alert-danger alert-dismissible alert-solid alert-label-icon fade show" role="alert">
        <i class="ri-error-warning-line label-icon"></i>
        <strong>Error !</strong> <?php echo e(session('error')); ?>

        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <!-- `Warning Alert -->
    
<?php endif; ?>
<?php /**PATH C:\xampp laravel11\htdocs\live_codes\Evolve Business\resources\views/common/alert.blade.php ENDPATH**/ ?>