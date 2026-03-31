<?php $__env->startSection('title', 'Member Meeting List'); ?>
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



                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Add Member Meeting</h5>
                            </div>
                            <div class="card-body">
                                <div class="live-preview">
                                    <form action="<?php echo e(route('Membermeeting.store')); ?>" method="post"
                                        enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        
                                        <div class="row gy-4" style="align-items: end;">
                                            <div class="col-lg-12">
                                                <div>
                                                    <label for="city_id"><span style="color:red;">*</span> City
                                                        Name</label>
                                                        <select class="form-control" name="city_id" id="city_id" required onchange="updateCityGroups()">
                                                    <option value="" selected>Select City Name</option>
                                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($city->id); ?>" <?php echo e(old('city_id') == $city->id ? 'selected' : ''); ?>>
                                                            <?php echo e($city->city_name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                </div>
                                                <div class="mt-3">
                                                <label for="citygroup_id"><span style="color:red;">*</span> City Group Name</label>
                                                <select class="form-control" name="citygroup_id" id="citygroup_id" required>
                                                    <option value="">Select City Group Name</option>
                                                    <?php $__currentLoopData = $cityGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($group->id); ?>" <?php echo e(old('citygroup_id') == $group->id ? 'selected' : ''); ?>>
                                                            <?php echo e($group->group_name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php $__errorArgs = ['citygroup_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span style="color: red;"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="mt-3">
                                               <span style="color:red;">*</span>Meeting Title
                                                <input type="text" class="form-control" 
                                                name="Meetingtitle" id="Meetingtitle" maxlength="100" autocomplete="off" placeholder="Cluster Meet"
                                                    required>
                                             </div>
                                             <div class="mt-3">
                                                 <span style="color: red;">*</span>Start Date & Time                                   
                                                <span style="color:red;" class="error-message"><?php echo e($errors->first('start_date')); ?></span> 
                                                <!-- <input type="datetime" class="form-control" name="start_date"
                                                    id="start_date" placeholder="Enter Start Date & Time"  value="<?php echo e(old('start_date')); ?>" required> -->
                                            <input type="text" name="start_date" class="form-control flatpickr-input active" data-provider="flatpickr" data-date-format="d.m.y" data-enable-time=""placeholder="Enter Start Date & Time"  value="<?php echo e(old('start_date')); ?>" required>
                                            </div>
                                            <div class="mt-3">
                                                 <span style="color: red;">*</span>End Date & Time                                   
                                                <span style="color:red;" class="error-message"><?php echo e($errors->first('End_date')); ?></span> 
                                                <!-- <input type="datetime" class="form-control" name="End_date"
                                                    id="End_date" placeholder="Enter End Date & Time"   value="<?php echo e(old('End_date')); ?>" required> -->
                                                <input type="text" class="form-control flatpickr-input active" data-provider="flatpickr" data-date-format="d.m.y" data-enable-time="" name="End_date" placeholder="Enter End Date & Time"   value="<?php echo e(old('End_date')); ?>" required>
                                            </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3">
                                                    <div class="d-flex align-items-center gap-1">
                                                        <button type="submit" class="btn btn-success btn-user float-right">Submit
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-user float-right" onclick="cancelForm()">Cancel</button>
                                                    </div>
                                                </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Member Meeting List</h5>
                            </div>
                            <div class="card-body table-responsive table-card">
                                <?php //echo date('ymd');
                                ?>
                                <?php if($Count > 0 ): ?>
                                
                                <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sr No</th>
                                            <th scope="col">Meeting Title</th>
                                            <th scope="col">City Name</th>
                                            <th scope="col">City Group name</th>                                          
                                            <th scope="col">Start Date & Time</th>
                                            <th scope="col">End Date & Time</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                      
                                        <?php $i = 1; ?>
                                        <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <?php
                                                    $meetingStart = \Carbon\Carbon::createFromFormat(
                                                        'd.m.y H:i',
                                                        $data->start_date,
                                                    );
                                                    $isPastMeeting = $meetingStart->lt(\Carbon\Carbon::now());
                                                ?>
                                            <tr>
                                                <td class="text-center"> <?php echo e($i + $datas->perPage() * ($datas->currentPage() - 1)); ?></td>
                                                <td class="text-center"><?php echo e($data->Meeting_title); ?></td>
                                                <td class="text-center"> <?php echo e(optional($cities->firstWhere('id', $data->city_id))->city_name); ?></td>
                                                <td class="text-center">
                                                    <?php echo e(optional($cityGroups->firstWhere('id', $data->city_group_id))->group_name); ?>

                                                </td>
                                              
                                                <td class="text-center"><?php echo e($data->start_date); ?></td>
                                                <td class="text-center"><?php echo e($data->End_date); ?></td>
                                                <td>
                                                    <div class="d-flex gap-2 justify-content-center">
                                                        <a class="mx-1" title="Edit" href="#"
                                                            onclick="getEditData(<?= $data->id ?>)" data-bs-toggle="modal"
                                                            data-bs-target="#showModal">
                                                            <i class="far fa-edit"></i>
                                                        </a>

                                                        <a class="" href="#" data-bs-toggle="modal"
                                                            title="Delete" data-bs-target="#deleteRecordModal"
                                                            onclick="deleteData(<?= $data->id ?>);">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </a>
                                                        <a class="" href="<?php echo e(route('Membermeeting.Memberindex',$data->id)); ?>" title="Add Member">
                                                            <i class="fas fa-plus-square" aria-hidden="true"></i>
                                                        </a>
                                                         <?php if($isPastMeeting): ?>
                                                                <a class=""
                                                                    href="<?php echo e(route('Membermeeting.Membercomment', $data->id)); ?>"
                                                                    title="Add Comment">
                                                                    <i class="fa fa-comment" aria-hidden="true"></i>
                                                                </a>
                                                            <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center mt-3">
                                    <?php echo e($datas->links()); ?>

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
               
                <!--Edit Modal Start-->
                <div class="modal fade flip" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header bg-light p-3">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Member Meeting</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    id="close-modal"></button>
                            </div>
                            <form method="POST" 
                                action="<?php echo e(route('Membermeeting.update')); ?>" autocomplete="off"
                                enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" id="getid">

                                <div class="modal-body">
                                           <div>
                                                <label for="city_id"><span style="color:red;">*</span> City Name</label>
                                                <select class="form-control" name="city_id" id="Editcity" required
                                                    onchange="editupdateCityGroups()">
                                                    <option value="" selected>Select City Name</option>
                                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option
                                                            value="<?php echo e($city->id); ?>">
                                                            <?php echo e($city->city_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="mb-3 pt-3">
                                                <label for="citygroup_id"><span style="color:red;">*</span> City Group
                                                    Name</label>
                                                <select class="form-control" name="citygroup_id" id="Editcitygroup_id" required>
                                                    <?php $__currentLoopData = $cityGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cityGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option
                                                            value="<?php echo e($cityGroup->id); ?>">
                                                            <?php echo e($cityGroup->group_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        <div class="mb-3 pt-3">
                                               <span style="color:red;">*</span>Meeting Title
                                                <input type="text" class="form-control" 
                                                name="Meeting_title" id="EditMeetingtitle" maxlength="100" autocomplete="off" placeholder="Cluster Meet"
                                                    required>
                                             </div>
                                             <div class="mb-3 pt-3">
                                                 <span style="color: red;">*</span>Start Date & Time                                   
                                                <span style="color:red;" class="error-message"><?php echo e($errors->first('start_date')); ?></span> 
                                                <!-- <input type="text" class="form-control" name="start_date"
                                                    id="Editstart_date" placeholder="Enter Start Date & Time"  value="<?php echo e(old('start_date')); ?>" required> -->
                                                    <input type="text" class="form-control flatpickr-input active"  name="start_date"  id="Editstart_date" placeholder="Enter Start Date & Time"  value="<?php echo e(old('start_date')); ?>"  data-provider="flatpickr" data-date-format="d.m.y" data-enable-time="" required>
                                            </div>
                                            <div class="mb-3 pt-3">
                                                 <span style="color: red;">*</span>End Date & Time                                   
                                                <span style="color:red;" class="error-message"><?php echo e($errors->first('End_date')); ?></span> 
                                                <!-- <input type="text" class="form-control" name="End_date"
                                                    id="EditEnd_date" placeholder="Enter End Date & Time"   value="<?php echo e(old('End_date')); ?>" required> -->
                                                    <input type="text" class="form-control flatpickr-input active"  name="End_date"   id="EditEnd_date" placeholder="Enter End Date & Time"   value="<?php echo e(old('End_date')); ?>"  data-provider="flatpickr" data-date-format="d.m.y" data-enable-time="" required>    
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-success" id="add-btn">Update</button>
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--Edit Modal End -->

                    <!--Delete Modal Start -->
                    <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        id="btn-close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mt-2 text-center">
                                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                            colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px">
                                        </lord-icon>
                                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                            <h4>Are you Sure ?</h4>
                                            <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record
                                                ?</p>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                        <button type="button" class="btn w-sm btn-light"
                                            data-bs-dismiss="modal">Close</button>
                                        <a class="btn btn-danger" href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault(); document.getElementById('user-delete-form').submit();">
                                            Yes,
                                            Delete It!
                                        </a>
                                        <form id="user-delete-form" method="POST"
                                            action="<?php echo e(route('Membermeeting.delete')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <input type="hidden" name="id" id="deleteid" value="">

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Delete modal End -->

                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>


  <script>
             function getEditData(id) {
                //  alert(id);
                 var url = "<?php echo e(route('Membermeeting.edit', ':id')); ?>";
                 url = url.replace(":id", id);
                 if (id) {
                     $.ajax({
                         url: url,
                         type: 'GET',
                         data: {
                             id: id
                         },
                         success: function(data) {
                             // console.log(data);
                             var obj = JSON.parse(data);
                             // alert(obj);
                             $("#EditMeetingtitle").val(obj.Meeting_title);
                             $('#getid').val(obj.id);
                             $('#Editcity').val(obj.city_id);
                             $('#Editcitygroup_id').val(obj.city_group_id);
                             $('#Editstart_date').val(obj.start_date);
                             $('#EditEnd_date').val(obj.End_date);

                         }
                     });
                 }
             }
         </script>

        <script>
            function deleteData(id) {
                $("#deleteid").val(id);
            }
        </script>

        <script>
            function chkname() {
                var name = $('#group_name').val();
                var url = "<?php echo e(route('serviceprovider.citygroupcheckserviceprovider')); ?>";
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        name,
                        name
                    },
                    success: function(data) {
                        console.log(data);
                        var obj = JSON.parse(data);
                        if (data == 1) {

                            alert('CityGroup Name Already Exist');
                            $('#group_name').val('');
                            $('#group_name').focus();
                            return false;

                        }
                    }
                });
            }
        </script>
        <script>
            function editchkname() {
                var name = $('#Editname').val();
                var id = $('#getid').val();
                var url = "<?php echo e(route('serviceprovider.citygroupeditcheckserviceprovider')); ?>";

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        name: name,
                        id: id
                    },
                    success: function(data) {
                        console.log(data);
                        if (data == 1) {
                            alert('CityGroup Name Already Exists');
                            $('#Editname').val('');
                            $('#Editname').focus();
                            return false;
                        }
                    }
                });
            }
        </script>


    <script>
        function updateCityGroups() {
            var city_id = $("#city_id").val();
            var url = "<?php echo e(route('members.cityid', ':city_id')); ?>";
            url = url.replace(":city_id", city_id);
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    city_id: city_id,
                },
                success: function(data) {
                    $("#citygroup_id").html('');
                    $("#citygroup_id").append(data);
                }
            });
        }
    </script>
 <script>
        function editupdateCityGroups() {
            var city_id = $("#Editcity").val();
            var url = "<?php echo e(route('members.cityid', ':city_id')); ?>";
            url = url.replace(":city_id", city_id);
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    city_id: city_id,
                },
                success: function(data) {
                    $("#Editcitygroup_id").html('');
                    $("#Editcitygroup_id").append(data);
                }
            });
        }
    </script>

<script>
        function cancelForm() {
            window.location.reload(); 
        }
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/evolve_business_live/resources/views/Membermeeting/index.blade.php ENDPATH**/ ?>