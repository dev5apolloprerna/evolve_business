
<?php $__env->startSection('title', 'Member Subscription expried on'); ?>
<?php $__env->startSection('content'); ?>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                
                <?php if($errors->any()): ?>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="mb-5" style="color:red"><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                
                <?php echo $__env->make('common.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="d-flex justify-content-end mb-3">
   
                    </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title mb-0" data-anchor="data-anchor">Subscription Expried Detail
                                    </h5>
                                </div>    
                            </div>
                       
                        </div>
                        <div class="card-body">
                            <?php //echo date('ymd');
                            ?>
                            <?php if($Count > 0): ?>
                            <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Plan Name</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th> 
                                        <th scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $renewalhistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-center"><?php echo e($row->plan_name ?? ''); ?></td>
                                            <td class="text-center"><?php echo e($row->substartdate ?? ''); ?></td> 
                                            <td class="text-center"><?php echo e($row->stbenddate ?? ''); ?></td> 
                                            <td class="text-center"><?php echo e($row->amount ?? ''); ?></td>                                        
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>                   
                            </table>
                            <div class="d-flex justify-content-center mt-3">
                                
                                </div>
                                <?php else: ?> 
                                <div class="row">
                                    <div class="col-lg-12 col-md-12  col-xs-12 col-sm-12 padding-5 bottom-border-verydark">
                                        <div class="alert alert-info clearfix profile-information padding-all-10 margin-all-0 backgroundDark">
                                            <h1 class="font-white text-center"> No Data Found ! </h1>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                </div>
            </div>

            

            

        </div>
    </div>


    
    <?php $__env->stopSection(); ?>


    
    


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp laravel11\htdocs\live_codes\Evolve Business\resources\views/Membersub/index.blade.php ENDPATH**/ ?>