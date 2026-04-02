

<?php $__env->startSection('title', 'Members List'); ?>
<?php $__env->startSection('content'); ?>

<style>
    .choices[data-type*="select-one"] {
        cursor: pointer;
        width: 100%;
        }
</style>

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
                    <!--<a href="<?php echo e(route('members.storeview')); ?>" class="btn btn-success">Add Member</a>-->
                </div>
                

               
               

                
                    <!-- Page Heading -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                               <form method="get" id="form" action="<?php echo e(route('members.index')); ?>">
                                    <div class="row align-items-center">

                                        <div class="col-md-2 mb-2">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="first_name"
                                                    placeholder="Search by member name" id="first_name"
                                                    value="<?php echo e($firstname ?? ''); ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <div class="d-flex align-items-center w-100">
                                                <select class="form-select select2 w-100" id="category_id" name="category_id" onchange="updatesubcategories()">
                                                    <option value="">Select Category</option>
                                                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($categori->id); ?>" <?php echo e($categori->id == $categorysearch ? 'selected' : ''); ?>>
                                                            <?php echo e($categori->name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <div class="d-flex align-items-center w-100">
                                                <select class="form-select select2 w-100" id="city_id" name="city_id">
                                                    <option value="">Select City</option>
                                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($city->id); ?>" <?php echo e($city->id == $citysearch ? 'selected' : ''); ?>>
                                                            <?php echo e($city->city_name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <div class="d-flex align-items-center w-100">
                                                <select class="form-select select2 w-100" id="group_id" name="group_id">
                                                    <option value="">Select Group</option>
                                                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($group->id); ?>" <?php echo e($group->id == $groupsearch ? 'selected' : ''); ?>>
                                                            <?php echo e($group->group_name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <div class="d-flex align-items-center w-100">
                                                <input type="submit" id="search" class="btn btn-success" name="search" title="Search" value="Search">
                                                <button type="button" id="cancel_search" class="btn btn-success">Cancel</button>
                                                <button class="btn btn-success" type="button" onclick="exportExcel();">
                                                    <i class="fa-solid fa-file-excel fa-xl"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-md-2 mb-2 text-end">
                                            <a href="<?php echo e(route('members.storeview')); ?>" class="btn btn-success">Add Member</a>
                                        </div>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                

                

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">  
                                    <h5 class="card-title mb-0">Members Name List</h5>
                        </div>
                        <div class="card-body">
                            <?php //echo date('ymd');
                            ?>
                            <?php if($Count > 0): ?>
                            <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr No</th>
                                        <th scope="col">Member Name</th>
                                        <th scope="col">Brand Name</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Group Name</th>
                                        <th scope="col">Category name</th>
                                        <!-- <th scope="col">SubCategory name</th> -->
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
                                            

                                            <td class="text-center">
                                                <a href="<?php echo e(route('Products_service.index',$data->memberid)); ?>">
                                                    <?php echo e($data->first_name); ?>

                                                </a>
                                            </td>
                                            <td class="text-center"><?php echo e($data->companyname); ?></td>
                                            <td class="text-center"><?php echo e($data->phonenumber); ?></td>
                                            <td class="text-center"><?php echo e($data->email); ?></td>
                                            
                                            <td class="text-center"><?php echo e($data->city_name); ?></td>
                                            <td class="text-center"><?php echo e($data->group_name); ?></td>
                                            <td class="text-center"><?php echo e($data->categoriesname); ?></td>
                                            <!-- <td class="text-center"><?php echo e($data->subcategoriesname); ?></td> -->
                                            
                                            
                                            

                                            <td>
                                            <?php if($data->status == 0): ?>
                                                    <span class="badge badge-gradient-danger">Inactive</span>
                                                    
                                                    <?php elseif($data->status == 1): ?>
                                                    <span class="badge badge-gradient-success">Active</span>
                                                    
                                                   <?php endif; ?>
                                            </td>
                                            
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <?php if($data->status == 0): ?>
                                                    <a href="<?php echo e(route('members.status', ['user_id' => $data->id, 'status' => 1])); ?>"
                                                        title="InActive" class="mx-1">
                                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                                    </a>
                                                   <?php elseif($data->status == 1): ?>
                                                    <a href="<?php echo e(route('members.status', ['user_id' => $data->id, 'status' => 0])); ?>"
                                                        title="Active" class="mx-1">
                                                        <i class="fa fa-unlock" aria-hidden="true"></i>
                                                    </a>
                                                    <?php endif; ?>
                                                   <a href="<?php echo e(route('members.Arrival', ['user_id' => $data->id])); ?>"
                                                            title="Archive" class="mx-1">
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                    </a>

                                                    <a href="<?php echo e(route('members.edit', $data->memberid)); ?>">
                                                        <i class="far fa-edit"></i>
                                                    </a>

                                                    <a class="" href="#" data-bs-toggle="modal" title="Delete"
                                                        data-bs-target="#deleteRecordModal"
                                                        onclick="deleteData(<?= $data->memberid ?>);">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>

                                                    <a class="mx-1" href="#" data-bs-toggle="modal"
                                                    title="Change Password" data-bs-target="#changepassword"
                                                    onclick="editpassword(<?= $data->id ?>);">
                                                    <i class="fa fa-key" aria-hidden="true"></i>
                                                </a>
                                                    
                                                    <div class="modal fade" id="changepassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-light p-3">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                                                        id="close-modal"></button>
                                                                </div>
                                                                <form method="post" action="<?php echo e(route('members.changepassword')); ?>" autocomplete="off">
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo method_field('post'); ?>
                                                
                                                                    <input type="hidden" name="id" id="GetId" value="">
                                                
                                                                    <div class="modal-body">
                                                                        <div class="mb-3" id="modal-id" style="display: none;">
                                                                            <label for="id-field" class="form-label">ID</label>
                                                                            <input type="text" id="id-field" class="form-control" placeholder="ID" readonly />
                                                                        </div>
                                                
                                                                        <div class="mb-3"  style="TEXT-ALIGN: start;">
                                                                            <span style="color:red;">*</span>New Password
                                                                            <input type="password" name="newpassword" id="newpassword" class="form-control"
                                                                                placeholder="Enter New Password" required />
                                                                            <div class="invalid-feedback">Please enter a customer name.</div>
                                                                        </div>
                                                
                                                                        <div class="mb-3"  style="TEXT-ALIGN: start;">
                                                                            <span style="color:red;">*</span>Confirm Password
                                                                            <input type="password" name="confirmpassword" id="confirmpassword" class="form-control"
                                                                                placeholder="Enter Confirm Password" required />
                                                                            <div class="invalid-feedback">Please enter an email.</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <div class="hstack gap-2 justify-content-end">
                                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-success" id="add-btn">Update</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-3">
                              <?php echo e($datas->appends(request()->except('page'))->links()); ?>

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
                                <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                                <a class="btn btn-danger" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault(); document.getElementById('user-delete-form').submit();">
                                    Yes,
                                    Delete It!
                                </a>
                                <form id="user-delete-form" method="POST" action="<?php echo e(route('members.delete')); ?>">
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
            var url = "<?php echo e(route('members.edit', ':id')); ?>";
            url = url.replace(":id", id);
            if (id) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        alert($data);
                        var obj = JSON.parse(data);
                        $("#Editname").val(obj.companyname);
                        $("#Editphonenumber").val(obj.phonenumber);
                        $("#Editemail").val(obj.email);
                        $("#Editaddress").val(obj.address);
                        $("#Editcity").val(obj.city);
                        $("#Editpincode").val(obj.pincode);
                        $("#Editgstnumber").val(obj.gstnumber);
                        $("#Editgstbudgecount").val(obj.budgecount);
                        $('#getid').val(id);
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
            var name = $('#companyname').val();
            var url = "<?php echo e(route('members.checkserviceprovider')); ?>";
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

                        alert('Members Already Exist');
                        $('#companyname').val('');
                        $('#companyname').focus();
                        return false;

                    }
                }
            });
        }
    </script>
    <script>
        function editchkname() {
            var name = $('#Editname').val();
            var url = "<?php echo e(route('members.editcheckserviceprovider')); ?>";
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

                        alert('Members Already Exist');
                        $('#Editname').val('');
                        $('#Editname').focus();
                        return false;

                    }
                }
            });
        }
    </script>

    <script>
        function updatesubcategories() {
            var categories_id = $("#category_id").val();
            var url = "<?php echo e(route('members.categoryid', ':category_id')); ?>";
            url = url.replace(":category_id", categories_id);
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    category_id: categories_id,
                },
                success: function(data) {
                    $("#subcategories_id").html('');
                    $("#subcategories_id").append(data);
                }
            });
        }
    </script>
    <script>
         function editpassword(id) {
            $("#GetId").val(id);
        }
    </script>
    <script>
        function openChangePasswordModal(memberId) {
          
            window.currentMemberId = memberId;            
            $('#changePasswordModal').modal('show');
        }

        function changePassword() {
      
            var memberId = window.currentMemberId;
            console.log("Changing password for member ID: " + memberId);
            $.ajax({
                url: "<?php echo e(route('members.changepassword', ':memberId')); ?>".replace(':memberId', memberId), 
                type: 'POST',
                data: {
                    memberId: memberId,
                    newPassword: $('#newPasswordInput').val(),
                    Confirmpassword: $('#Confirmpassword').val(), 
                    _token: '<?php echo e(csrf_token()); ?>',
                },
                
                success: function(response) {
                 
                    console.log(response);

                   
                    $('#changePasswordModal').modal('hide');
                },
                error: function(error) {
                  
                    console.error(error);
                }
            });
        }
    </script>
<script>
    $(document).ready(function(){
        $('#cancel_search').click(function(){
            // Clear all inputs and selects
            $('#first_name').val('');
            $('#category_id').val('').trigger('change');  // Select2 needs .trigger('change')
            $('#city_id').val('').trigger('change');
            $('#group_id').val('').trigger('change');

            // Submit the form
            $('#form').submit();
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            minimumResultsForSearch: Infinity
        });
    });
</script>
<script>
    function exportExcel() {
        var first_name = $("#first_name").val();
        var category_id = $("#category_id").val();
        var strURL = "<?php echo e(route('members.Memberexport')); ?>";
        strURL += "?first_name="+first_name+"&category_id="+category_id;

        window.location.href = strURL;
    }
</script> 


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp laravel11\htdocs\live_codes\Evolve Business\resources\views/members/index.blade.php ENDPATH**/ ?>