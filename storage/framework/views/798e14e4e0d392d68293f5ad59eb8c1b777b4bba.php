<?php $__env->startSection('title', 'Award Add'); ?>
<?php $__env->startSection('content'); ?>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script>
                <?php if($errors->any()): ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="mb-5" style="color:red"><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                
                <?php echo $__env->make('common.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <!-- <div class="row">
                                                                                                                                                                                                                <div class="col-10">
                                                                                                                                                                                                                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                                                                                                                                                                                                        <h4 class="mb-sm-0">Add Members</h4>
                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div> -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Add Award</h5>
                            </div>
                            <div class="card-body">
                                <div class="live-preview">
                                    <form action="<?php echo e(route('Award.store')); ?>" method="post" enctype="multipart/form-data">

                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name ="memberid" value="<?php echo e($memberid); ?>">
                                        <div class="row gy-3 mb-3">
                                            <div class="col-lg-3 col-md-6">
                                                <span style="color:red;">*</span>Title
                                                <input type="text" class="form-control" name="title" id="title"
                                                    placeholder="Enter Title" maxlength="100" autocomplete="off" required>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <span style="color:red;"></span> Photo
                                                <input type="file" class="form-control" name="photo" id="photo"
                                                    placeholder="Enter Image">
                                                <p class="help-block">Please upload a photo for your profile.</p>
                                            </div>

                                        </div>

                                        <div>
                                            <div>
                                                <label for="description">
                                                    <span style="color:red;">*</span>Description
                                                </label>
                                                <textarea class="form-control" name="description" id="description" placeholder="Enter Description" rows="4"
                                                    maxlength="500" autocomplete="off"></textarea>
                                            </div>
                                        </div>

                                        <div class="row gy-3">

                                            <div class="text-center">
                                                <button type="submit" class="btn btn-success btn-user"
                                                    style="width:
                                                    81px; height: 36px;">Submit</button>
                                                <button type="button" class="btn btn-danger btn-user"
                                                    style="width:
                                                    81px; height: 34px;"
                                                    onclick="cancelForm()">Cancel</button>
                                            </div>

                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/evolve_business_live/resources/views/Visitor/create.blade.php ENDPATH**/ ?>