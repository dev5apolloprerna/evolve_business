<?php $__env->startSection('title', 'Admin user List'); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">Member Select</div>
                                <div class="card-body">
                                    <form action="<?php echo e(route('Membermeeting.memberstore')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="meetingid" value="<?php echo e($meetingid); ?>">
                                        <div class="mb-3">
                                            <label>
                                                <input type="checkbox" id="select-all">
                                                <strong>Select All Members</strong>
                                            </label>
                                        </div>

                                        <div class="">
                                            <div class="row">
                                                <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-lg-2 mb-2">
                                                        <div class="form-check" style="white-space: normal;">
                                                            <input type="checkbox" class="form-check-input" name="members[]"
                                                                value="<?php echo e($member->member_id); ?>"
                                                                id="member-<?php echo e($member->member_id); ?>"
                                                                <?php echo e(in_array($member->member_id, $meetingdata->pluck('member_id')->toArray()) ? 'checked' : ''); ?>>
                                                            <label class="form-check-label"
                                                                for="member-<?php echo e($member->member_id); ?>">
                                                                <?php echo e($member->Contact_person); ?>

                                                            </label>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <div class="row">
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-check" style="white-space: normal;">
                                                            <label for="Ppttaken_1">PPT taken 1</label>
                                                            <select name="ppt_taken_1" class="form-control">
                                                                <option value="">--please select--</option>
                                                                <?php $__currentLoopData = $allmembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allmeb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($allmeb->id); ?>"
                                                                        <?php echo e(in_array($allmeb->id, $pptTaken1) ? 'selected' : ''); ?>>
                                                                        <?php echo e($allmeb->Contact_person); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-check" style="white-space: normal;">
                                                            <label for="Ppttaken_1">PPT Taken 2</label>
                                                            <select name="ppt_taken_2" class="form-control">
                                                                <option value="">--please select--</option>
                                                                <?php $__currentLoopData = $allmembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allmeb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($allmeb->id); ?>"
                                                                        <?php echo e(in_array($allmeb->id, $pptTaken2) ? 'selected' : ''); ?>>
                                                                        <?php echo e($allmeb->Contact_person); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-check" style="white-space: normal;">
                                                            <label for="Ppttaken_1">Brand Showcase 1</label>
                                                            <select name="brand_showcase_1" class="form-control">
                                                                <option value="">--please select--</option>
                                                                <?php $__currentLoopData = $allmembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allmeb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($allmeb->id); ?>"
                                                                        <?php echo e(in_array($allmeb->id, $brand_showcase_1) ? 'selected' : ''); ?>>
                                                                        <?php echo e($allmeb->Contact_person); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-check" style="white-space: normal;">
                                                            <label for="Ppttaken_1">Brand Showcase 2</label>
                                                            <select name="brand_showcase_2" class="form-control">
                                                                <option value="">--please select--</option>
                                                                <?php $__currentLoopData = $allmembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allmeb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($allmeb->id); ?>"
                                                                        <?php echo e(in_array($allmeb->id, $brand_showcase_2) ? 'selected' : ''); ?>>
                                                                        <?php echo e($allmeb->Contact_person); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <button class="btn btn-success" type="submit">Submit</button>
                                                    <button type="button" class="btn btn-danger btn-user float-right"
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
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        function cancelForm() {
            window.location.reload();
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAll = document.getElementById('select-all');
            const checkboxes = document.querySelectorAll('input[name="members[]"]');

            selectAll.addEventListener('change', function() {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = selectAll.checked;
                });
            });
        });
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/evolve_business_live/resources/views/Membermeeting/Memberindex.blade.php ENDPATH**/ ?>