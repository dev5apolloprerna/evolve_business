<?php $__env->startSection('title', 'Member Visitor List'); ?>
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

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title mb-0" data-anchor="data-anchor">Member Visitor List
                                    </h5>
                                </div>
                            </div>
                            <!-- <h5 class="card-title mb-0">Products Service List</h5> -->
                        </div>
                        <div class="card-body">
                            <?php //echo date('ymd');
                            ?>
                            <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                                <?php if($count > 0): ?>
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Member</th>
                                            <th scope="col">Business Name</th>
                                            <th scope="col">Business Category</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>

                                                <td class="text-center">
                                                    <?php echo e($i + $datas->perPage() * ($datas->currentPage() - 1)); ?></td>
                                                <td class="text-center"><?php echo e($data->name); ?></td>
                                                <td class="text-center"><?php echo e($data->email); ?></td>
                                                <td class="text-center"><?php echo e($data->phone); ?></td>
                                                <td class="text-center"><?php echo e($data->members->Contact_person); ?></td>
                                                <td class="text-center"><?php echo e($data->business_name); ?></td>
                                                <td class="text-center"><?php echo e($data->business_category->name ?? ''); ?></td>
                                                <td class="text-center">
                                                    <?php if($data->iStatus == 0): ?>
                                                        Pending
                                                    <?php elseif($data->iStatus == 1): ?>
                                                        Approved
                                                    <?php elseif($data->iStatus == 2): ?>
                                                        Rejected
                                                    <?php else: ?>
                                                        -
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#statusModal"
                                                        onclick="getEditDatastatus(<?php echo e($data->id); ?>)"
                                                        title="Change Status">

                                                        <i class="fas fa-user-check text-success"></i>
                                                    </a>
                                                </td>

                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                <?php else: ?>
                                    <div class="row">
                                        <div
                                            class="col-lg-12 col-md-12  col-xs-12 col-sm-12 padding-5 bottom-border-verydark">
                                            <div
                                                class="alert alert-info clearfix profile-information padding-all-10 margin-all-0 backgroundgreen">
                                                <h1 class="font-white text-center">No Data Found ! </h1>
                                            </div>
                                        </div>
                                    </div>

                                <?php endif; ?>
                            </table>
                            <div class="d-flex justify-content-center mt-3">
                                <?php echo e($datas->links()); ?>

                            </div>
                        </div>


                    </div>
                </div>

                <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel"
                    aria-hidden="true">

                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="statusModalLabel">Change Status
                                    Comments</h5>
                                <button type="button" class="btn btn-success" onclick="$('#statusModal').modal('hide')">
                                    Close
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Add a form for changing status and adding rejected comments -->
                                <form action="<?php echo e(route('MemberVisitor.updateStatus')); ?>" method="post">
                                    <?php echo csrf_field(); ?>

                                    <input type="hidden" name="id" id="business_id">

                                    <div class="form-group">
                                        <label>Update Status:</label>
                                        <select class="form-control" name="newStatus" id="newStatus"
                                            onchange="toggleRejectedComments()">

                                            <option value="1">Approved</option>
                                            <option value="2">Rejected</option>
                                        </select>
                                    </div>

                                    <div class="form-group mt-2" id="rejectedCommentsDiv" style="display:none;">
                                        <label>Rejected Comments:</label>
                                        <textarea class="form-control" name="comment"></textarea>
                                    </div>

                                    <br>
                                    <button type="submit" class="btn btn-success">Save Changes</button>
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

    <script>
        function getEditDatastatus(id) {

            $('#business_id').val(id);
            $('#newStatus').val(1);
            toggleRejectedComments();

            var url = "<?php echo e(route('MemberVisitor.getStatus', ':id')); ?>";
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {

                    // direct object use (no JSON.parse needed)
                    if (data.iStatus == 1 || data.iStatus == 2) {
                        $('#newStatus').val(data.iStatus);
                    } else {
                        $('#newStatus').val("1"); // fallback Approved
                    }

                    toggleRejectedComments();
                }
            });
        }

        function toggleRejectedComments() {
            if ($('#newStatus').val() == 2) {
                $('#rejectedCommentsDiv').show();
            } else {
                $('#rejectedCommentsDiv').hide();
            }
        }
    </script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/evolve_business_live/resources/views/MemberVisitor/index.blade.php ENDPATH**/ ?>