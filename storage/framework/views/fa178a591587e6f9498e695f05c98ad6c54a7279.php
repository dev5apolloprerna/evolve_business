<?php $__env->startSection('title', 'Connection  List'); ?>
<?php $__env->startSection('content'); ?>
<?php $session = auth()->user(); ?>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                
                
                <?php echo $__env->make('common.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="col-md-12 mt-3">
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title mb-0" data-anchor="data-anchor">Connection Given
                                    </h5>
                                </div>
                                <div>
                                <a href="#" data-bs-toggle="modal"
                                       data-bs-target="#EditModal1"
                                       onclick="referencegetData()"
                                       class="btn btn-success" title="">Give New Connection
                                </a>                                                             
                                </div>
                            </div>
                        </div>
            
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane preview-tab-pane active" role="tabpanel"
                                    aria-labelledby="tab-dom-dcc399ed-d1d3-44f8-99e0-31c1d0b7b540"
                                    id="dom-dcc399ed-d1d3-44f8-99e0-31c1d0b7b540">
                                    <div id="tableExample" data-list='{"valueNames":["name","email","age"]}'>
                                        <?php if($Count > 0): ?>
                                        <div class="table-responsive scrollbar">
                                            <table class="table table-bordered table-striped fs--1 mb-0">
                                                <thead class="bg-200 text-900">
                                                    <tr>
                                                        <th width="2%" data-sort="Title">Sr No</th>
                                                        <th width="5%" data-sort="Date">Given To</th>
                                                        <th width="5%" data-sort="Date">Company Name</th>
                                                        <th width="5%" data-sort="Date">Connection Name</th>
                                                        <th width="5%" data-sort="Date">Email</th>
                                                        <th width="5%" data-sort="Date">Phone Number
                                                        </th>
                                                        <th width="5%" data-sort="Date">Connection Date</th>
                                                        <th width="5%" data-sort="Date">Connection For Message</th>
                                                        <th width="5%" data-sort="Date">Rejected Comment</th>
                                                        <th width="5%" data-sort="Date">Status</th>
                                                        
                                                        <th width="5%" data-sort="Action">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    <?php $i = 1;                                                
                                                    ?>
                                                    <?php $__currentLoopData = $Business; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Business1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td class="text-center">
                                                                <?php echo e($i + $Business->perPage() * ($Business->currentPage() - 1)); ?>

                                                            </td>
                                                            <td class="text-center"><?php echo e($Business1->first_name); ?></td>
                                                            <td class="text-center"><?php echo e($Business1->Company_Name ? $Business1->Company_Name : 'N/A'); ?></td>
                                                            <td class="text-center"><?php echo e($Business1->Reference_Name); ?></td>
                                                            <td class="text-center"><?php echo e($Business1->Email ? $Business1->Email : 'N/A'); ?></td>
                                                            <td class="text-center"><?php echo e($Business1->phonenumber); ?></td>

                                                            <td class="text-center">
                                                                <?php echo e(\Carbon\Carbon::parse($Business1->Reference_Date)->format('d-m-Y')); ?>

                                                            </td>
                                                            <td class="text-center"><?php echo e($Business1->Refer_for_message ? $Business1->Refer_for_message : 'N/A'); ?></td>
                                                            <td class="text-center"> <?php echo e($Business1->Referencecomment !== null ? $Business1->Referencecomment : 'N/A'); ?></td>
                                                            <td class="text-center">
                                                            <?php echo e($Business1->isapproved_status == 0 ? 'Pending' : ($Business1->isapproved_status == 1 ? 'Approved' : 'Rejected')); ?>

                                                            </td>

                                                            <td class="text-center">
                                                                <?php if($Business1->isapproved_status == 0): ?> <!-- Check if status is pending -->
                                                                    <!-- <a href="#" data-bs-toggle="modal"
                                                                    data-bs-target="#EditModal"
                                                                    onclick="getEditData(<?= $Business1->Reference_id ?>)"
                                                                    class="" title="Edit">
                                                                        <span class="text-500 fas fa-edit"></span>
                                                                    </a> -->
                                                                    <a class="" href="#"
                                                                    data-bs-toggle="modal" title="Delete"
                                                                    data-bs-target="#deleteRecordModal"
                                                                    onclick="deleteData(<?= $Business1->Reference_id ?>);">
                                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                                    </a>
                                                                <?php else: ?>
                                                                    N/A
                                                                <?php endif; ?>
                                                            </td>
                                                           
                                                        </tr>
                                                        <?php $i++; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                           
                                        </div>
                                        <div class="d-flex justify-content-center mt-3">
                                      <?php echo e($Business->links()); ?>

                                        </div>
                                        <?php else: ?> 
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12  col-xs-12 col-sm-12 padding-5 bottom-border-verydark">
                                                    <div class="alert alert-info clearfix profile-information padding-all-10 margin-all-0 backgroundDark">
                                                        <h1 class="font-white text-center"> Connection Yet To Give </h1>
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
            </div>

            <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog " style="background-color: white;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Connection</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </button>
                        </div>
                        <form method="post" action="<?php echo e(route('Reference.update')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('post'); ?>
                            <div class="modal-body">

                                <input type="hidden" name="business_id" id="business_id" value="">

                                <div class="row">
                                    <div class="md-3">
                                        <label for="business_from_id"><span style="color:red;">*</span>Business
                                            Type</label>
                                        <select class="form-control" name="business_type" id="Editbusiness_type"
                                            value="<?php echo e(old('business_type')); ?>" required>
                                            <option value="1">Direct</option>
                                            <option value="2">Reference</option>
                                        </select>
                                    </div>
                                    <!-- <div class="md-3">
                                        <label for="business_from_id"><span style="color:red;">*</span>Given By</label>
                                        <select class="form-control" name="business_from" id="Editbusiness_from"
                                            required>
                                            <option value="" selected>Select Given By</option>
                                            <?php $__currentLoopData = $Data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($data->first_name); ?>"><?php echo e($data->first_name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div> -->

                                    
                              <!-- this same user name not select code start -->
                                    <div class="md-3">
                                        <label for="business_to_id"><span style="color:red;">*</span>Given To</label>
                                        <select class="form-control" name="business_to" id="Editbusiness_to" required>
                                            <option value="" disabled selected>Select Given By</option>
                                            <?php $__currentLoopData = $Data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($data->id !== $session->id): ?> 
                                                    <option value="<?php echo e($data->first_name); ?>"><?php echo e($data->first_name); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                              <!-- this same user name not select code end -->
                                
                                    <div class="md-3">
                                        <span style="color:red;">*</span>Amount
                                        <input type="number" class="form-control" name="Business_amount"
                                            id="EditBusiness_amount" placeholder="Enter Business_amount"
                                            value="<?php echo e(old('Business_amount')); ?>" required>
                                    </div>
                                    <div class="md-3">
                                        <span style="color:red;">*</span> Business date
                                        <input type="date" class="form-control" name="business_Date"
                                            id="Editbusiness_Date" placeholder="Enter business Date" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-success">

                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                </div>
                        </form>
                    </div>
                </div>
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
                        <form id="user-delete-form" method="POST" action="<?php echo e(route('Reference.delete')); ?>">
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
    

    

    <!-- Status Modal -->
    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel"
        aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Change Status and Add Rejected
                        Comments</h5>
                    <button type="button" class="btn btn-light" onclick="$('#statusModal').modal('hide')">
                        Close
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add a form for changing status and adding rejected comments -->
                    <form action="<?php echo e(route('Business.status')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" id="Businessid" value="">
                        <div class="form-group">
                            <label for="newStatus">Update Status:</label>
                            
                            <?php if(isset($Business1->isapproved_status)): ?>
                                <!-- <select class="form-control" name="newStatus">
                                        <option value="1" <?php echo e($Business1->isapproved_status == 1 ? 'selected' : ''); ?>>Approved
                                        </option>
                                        <option value="0" <?php echo e($Business1->isapproved_status == 0 ? 'selected' : ''); ?>>Rejected</option>
                                    </select> -->

                                <select class="form-control" name="newStatus" id="newStatus"
                                    onchange="toggleRejectedComments()">
                                    <option value="1" <?php echo e($Business1->isapproved_status == 1 ? 'selected' : ''); ?>>
                                        Approved</option>
                                    <option value="2" <?php echo e($Business1->isapproved_status == 2 ? 'selected' : ''); ?>>
                                        Rejected</option>
                                </select>
                            <?php else: ?>
                                <select class="form-control" name="newStatus">
                                    <option value="1">Approved</option>
                                    <option value="0">Pending</option>
                                </select>
                            <?php endif; ?>
                        </div>
                            <?php $__currentLoopData = $Business; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $business): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group rejectedComments"
                                style="display: <?php echo e($business->isapproved_status == 2 ? 'block' : 'none'); ?>">
                                <label for="rejectedComments">Rejected Comments:</label>
                                <textarea class="form-control" name="businesscomment"></textarea>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <!-- <div class="form-group">
                                <label for="rejectedComments">Rejected Comments:</label>
                                <textarea class="form-control" name="rejectedComments"></textarea>
                            </div> -->
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    


    <!-- add model start -->
    <div class="modal fade" id="EditModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " style="background-color: white;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Connection</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </button>
                        </div>
                        <form method="post" action="<?php echo e(route('Reference.create')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('post'); ?>
                            <div class="modal-body">
                                <input type="hidden" name="" id="" value="">
                                <div class="row">
                                    <div class="mb-3" >
                                        <label for="Reference_to"><span style="color:red;">*</span>Given To</label>
                                        <select class="form-control" data-choices name="Reference_to" id="choices-single-default">
                                            <option value="" disabled selected>Select Given To</option>
                                            <?php $__currentLoopData = $Data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($data->id !== $session->id): ?> 
                                                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->first_name); ?> - (<?php echo e($data->mobile_number); ?>)</option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="mb-3" >
                                        <span style="color:red;">*</span>Connection Name</label>
                                        <input class="form-control" id="Editname" name="Reference_Name" type="text"
                                            placeholder="Enter Connection Name" value="<?php echo e(old('Reference_Name')); ?>" required>
                                        </div><br>                                    
                                    </div>
                                    <div class="mb-3" >
                                        <span style="color:red;"></span>Company Name
                                        <input type="Text" class="form-control" name="Company_Name"
                                            id="Company_Name" placeholder="Enter Company Name " >
                                    </div>
                                    <div class="mb-3" >
                                        <span style="color:red;">*</span>Phone number
                                        <input type="phonenumber" class="form-control" name="phonenumber"
                                            id="phonenumber" placeholder="Enter phonenumber  " oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" onKeyPress="if(this.value.length==10) return false;" maxlength="10" minlength="10" value="<?php echo e(old('phonenumber')); ?>"required>
                                    </div>
                                    <div class="mb-3" >
                                        <span style="color:red;"></span>Email
                                        <input type="Text" class="form-control" name="Email"
                                            id="Email" placeholder="Enter Email  ">
                                    </div>
                                   
                                    <div class="mb-3" >
                                        <span style="color:red;"></span>Refer for message
                                        <input type="Text" class="form-control" name="Refer_for_message"
                                            id="Refer_for_message" placeholder="Enter Refer for message"maxlength="50" >
                                    </div>
                                    <!-- <div class="mb-3" >
                                        <span style="color:red;">*</span> Reference date
                                        <input type="date" class="form-control" name="Reference_Date"
                                            id="Reference_Date" placeholder="Enter Reference Date" required>
                                    </div> -->
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-success">

                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- add model end -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        function getEditData(id) {
            // alert(id);
            var url = "<?php echo e(route('Reference.edit', ':id')); ?>";
            url = url.replace(":id", id);
            if (id) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id,
                        id
                    },
                    success: function(data) {
                        // console.log(data);
                        var obj = JSON.parse(data);
                        $("#Editbusiness_type").val(obj.business_type);
                        $("#Editbusiness_from").val(obj.business_from);
                        $("#Editbusiness_to").val(obj.business_to);
                        $("#EditBusiness_amount").val(obj.Business_amount);
                        $("#Editbusiness_Date").val(obj.business_Date);
                        $('#business_id').val(id);
                    }
                });
            }
        }
    </script>
   <script>
    function referencegetData() {
        var url = "<?php echo e(route('Reference.storeview')); ?>";

        $.ajax({
            url: url,
            type: 'GET',
            success: function(data) {
                var obj = JSON.parse(data);
                $("#id").val(obj.id);
                $("#Editfirst_name").val(obj.first_name);
                $("#Editbusiness_to").val(obj.business_to);
                $("#EditBusiness_amount").val(obj.Business_amount);
                $("#Editbusiness_Date").val(obj.business_Date);
              
                $('#business_id').val(obj.id);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
</script>

    <script>
        function validateFile() {
            var allowedExtension = ['jpeg', 'jpg', 'png',
                'webp'
            ];
            var fileExtension = document.getElementById('photovalidate').value.split('.').pop().toLowerCase();
            var isValidFile = false;

            for (var index in allowedExtension) {

                if (fileExtension === allowedExtension[index]) {
                    isValidFile = true;
                    break;
                }
            }

            if (!isValidFile) {
                alert('Allowed Extensions are : *.' + allowedExtension.join(', *.'));
            }

            return isValidFile;
        }
    </script>

    <script>
        function EditvalidateFile() {
            //alert('hello');
            var allowedExtension = ['jpeg', 'jpg', 'png', 'webp'];
            var fileExtension = document.getElementById('Editphoto').value.split('.').pop().toLowerCase();
            var isValidFile = false;
            var image = document.getElementById('Editphoto').value;
            for (var index in allowedExtension) {
                if (fileExtension === allowedExtension[index]) {
                    isValidFile = true;
                    break;
                }
            }
            if (image != "") {
                if (!isValidFile) {
                    alert('Allowed Extensions are : *.' + allowedExtension.join(', *.'));
                }
                return isValidFile;
            }
            return true;
        }
    </script>

    
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#hello').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#photovalidate").change(function() {
            html =
                '<img src="' + readURL(this) +
                '"   id="hello" width="70px" height = "70px" > ';
            $('#viewimg').html(html);
        });
    </script>

    
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#hello').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#Editphoto").change(function() {
            html =
                '<img src="' + readURL(this) +
                '"   id="hello" width="70px" height = "70px" > ';
            $('#PHOTOID').html(html);
        });
    </script>
    <script>
        function deleteData(id) {
            // alert(id);
            $("#deleteid").val(id);
        }
    </script>


    <script>
        $(document).ready(function() {
            getEditData();
            // Initial state based on existing values
            if ($("#Editispaid").val() === "Yes") {
                $("#priceField").show();
            } else {
                $("#priceField").hide();
            }

            if ($("#Editlimitedset").val() === "Yes") {
                $("#setnumber").show();
            } else {
                $("#setnumber").hide();
            }

            // Trigger change event to apply initial state
            $("#Editispaid").trigger('change');
            $("#Editlimitedset").trigger('change');

            // Event listeners
            $("#Editispaid").on('change', function() {
                if ($(this).val() === "Yes") {
                    $("#priceField").show();
                } else {
                    $("#priceField").hide();
                }
            });

            $("#Editlimitedset").on('change', function() {
                if ($(this).val() === "Yes") {
                    $("#setnumber").show();
                } else {
                    $("#setnumber").hide();
                }
            });
        });
    </script>

    <script>
        function toggleRejectedComments() {
            var statusSelect = document.getElementById('newStatus');
            var rejectedComments = document.querySelector('.form-group.rejectedComments');

            if (statusSelect.value == 2) {
                rejectedComments.style.display = 'block';
            } else {
                rejectedComments.style.display = 'none';
            }
        }
    </script>
    <script>
        function getEditDatastatus(id) {
            // alert(id);
            var name = $('#Businessid').val(id);
        }
    </script>


<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script>

    
    $(function() {
        $("#startdatepicker").datepicker({
            dateFormat: 'd-m-yy',
            //minDate: 0
        });

        $("#enddatepicker").datepicker({
            dateFormat: 'd-m-yy',
            //minDate: 0
        });
    });
</script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/evolve_business_live/resources/views/Reference/index.blade.php ENDPATH**/ ?>