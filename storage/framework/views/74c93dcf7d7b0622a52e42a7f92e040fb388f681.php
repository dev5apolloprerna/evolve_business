<?php $__env->startSection('title', 'Member Products-Service edit'); ?>
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
                                <h5 class="card-title mb-0">Edit Product-Service</h5>
                            </div>
                            <div class="card-body">
                                <div class="live-preview">
                                    <form method="POST" onsubmit="return EditvalidateFile()"
                                        action="<?php echo e(route('MemberProducts.update')); ?>" autocomplete="off"
                                        enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" id="getid"
                                            value="<?php echo e($data->memberservices_id); ?>">
                                        <input type="hidden" name="member_id" id="memberid"
                                            value="<?php echo e($data->member_id); ?>">


                                        <div class="modal-body">

                                            <div class="row gy-3 mb-3">
                                                <div class="col-lg-4 col-md-6">
                                                    <span style="color:red;">*</span>Product Name
                                                    <input type="text" class="form-control" name="product_name"
                                                        value="<?php echo e($data->product_name); ?>" id="editproductname"
                                                        placeholder="Enter Product Name" maxlength="100" autocomplete="off"
                                                        required>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <span style="color:red;"></span> Photo
                                                    <input type="file" class="form-control" name="photo" id="editphoto"
                                                        value="<?php echo e($data->photo); ?>" placeholder="Enter Image">
                                                    <p class="help-block">Please upload a photo for your profile.</p>
                                                    <input type="hidden" name="hiddenPhoto" class="form-control"
                                                        value="<?php echo e(old('photo') ? old('photo') : $data->photo); ?>"
                                                        id="hiddenPhoto">
                                                </div>
                                                <div class="col-lg-4">
                                                    <div id="viewimg">
                                                    <?php if($data->photo): ?>
                                                        <img src="<?php echo e(asset('productimage') . '/' . $data->photo); ?>" alt="" height="70" width="70">
                                                    <?php else: ?>
                                                        <img src="https://groath.in/assets/images/noimage.png" alt="No Image" height="70" width="70">
                                                    <?php endif; ?>
                                                            <!-- <img src="<?php echo e(asset('productimage') . '/' . $data->photo); ?>" alt=""
                                                             height="70" width="70"> -->
                                                    </div>
                                                </div>  
                                            </div>
                                            <?php if($data->price_type == null): ?>
                                            <div class="row gy-3">
                                                <div class="col-lg-4 col-md-6">
                                                    <span style="color:red;"></span> Price Type
                                                    <select class="form-control" name="edit_price_type" id="edit_price_type">
                                                    <option value="">Select Price Type</option>
                                                        <option value="fixed"
                                                            <?php echo e($data->price_type === 'fixed' ? 'selected' : ''); ?>>Fixed
                                                        </option>
                                                        <option value="ranged"
                                                            <?php echo e($data->price_type === 'ranged' ? 'selected' : ''); ?>>Ranged
                                                        </option>
                                                    </select>
                                                </div>
                                                <?php else: ?> 
                                                <div class="row gy-3">
                                                <div class="col-lg-4 col-md-6">
                                                    <span style="color:red;"></span> Price Type
                                                    <select class="form-control" name="edit_price_type" id="edit_price_type"
                                                        >
                                                        <option value="fixed"
                                                            <?php echo e($data->price_type === 'fixed' ? 'selected' : ''); ?>>Fixed
                                                        </option>
                                                        <option value="ranged"
                                                            <?php echo e($data->price_type === 'ranged' ? 'selected' : ''); ?>>Ranged
                                                        </option>
                                                    </select>
                                                </div>
                                                <?php endif; ?>
                                            
                                                    <div class="col-lg-4 col-md-6" id="edit_fixed_price_input"
                                                        style="display: none;">
                                                        <span style="color:red;"></span> Price
                                                        <input type="number" class="form-control" name="edit_fixed_price"
                                                            id="edit_fixed_price" placeholder="Enter price"
                                                            value="<?php echo e($data->price); ?>">
                                                    </div>

                                                    <div class="col-lg-4 col-md-6" id="edit_ranged_price_input"
                                                        style="display: none;">
                                                        <span style="color:red;"></span> Price Range
                                                        <div class="row gy-3">
                                                            <div class="col-lg-4 col-md-6">
                                                                <input type="number" class="form-control"
                                                                    name="edit_min_price" id="edit_min_price"
                                                                    placeholder="Min price" value="<?php echo e($data->min_price); ?>">
                                                            </div>
                                                            <div class="col-lg-4 col-md-6">
                                                                <input type="number" class="form-control"
                                                                    name="edit_max_price" id="edit_max_price"
                                                                    placeholder="Max price"
                                                                    value="<?php echo e($data->max_price); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                

                                                <!-- new -->

                                               
                                            </div>

                                            <div class="row">
                                                <!-- new code 14-05-2024 -->
                                                <div>
                                                    <label for="multiline_description">
                                                        <span style="color:red;"></span>Search Keyword
                                                    </label>
                                                    <textarea class="form-control" name="multiline_description" id="" placeholder="Enter Search Keyword with coma sepreted" rows="4" maxlength="500" autocomplete="off"><?php echo e($data->Hash_Tag); ?></textarea>
                                                </div>
                                                 <!-- new code 14-05-2024 -->
                                                <div>
                                                    <label for="description">
                                                        <span style="color:red;">*</span>Description
                                                    </label>
                                                    <textarea class="form-control" name="description" id="editdescription" placeholder="Enter Description" rows="4" maxlength="500" autocomplete="off" required><?php echo e($data->description); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="submit" class="btn btn-success m-1"
                                                        id="add-btn">Update</button>
                                                        <button type="button" class="btn btn-danger btn-user" onclick="cancelForm()">Cancel</button>
                                                   
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


        <script>
            function getEditData(id) {
                var url = "<?php echo e(route('MemberProducts.productedit', ':id')); ?>";
                url = url.replace(":id", id);

                if (id) {
                    $.ajax({
                        url: url,
                        type: 'GET',
                        data: {
                            id: id
                        },
                        success: function(data) {
                            var obj = JSON.parse(data);

                            $("#editproductname").val(obj.product_name);
                            $("#editdescription").val(obj.description);
                            $('#getid').val(obj.memberservices_id);
                            $('#memberid').val(obj.member_id);
                            $("#edit_price_type").val(obj.price_type);
                            if (obj.price_type === 'fixed') {
                                $("#edit_fixed_price_input").show();
                                $("#edit_ranged_price_input").hide();
                                $("#edit_fixed_price").val(obj.price);
                            } else if (obj.price_type === 'ranged') {
                                $("#edit_fixed_price_input").hide();
                                $("#edit_ranged_price_input").show();
                                $("#edit_min_price").val(obj.min_price);
                                $("#edit_max_price").val(obj.max_price);
                            }
                        }
                    });
                }
            }
            $("#edit_price_type").on("change", function() {
                var selectedValue = $(this).val();
                if (selectedValue === 'fixed') {
                    $("#edit_fixed_price_input").show();
                    $("#edit_ranged_price_input").hide();
                } else if (selectedValue === 'ranged') {
                    $("#edit_fixed_price_input").hide();
                    $("#edit_ranged_price_input").show();
                }
            });
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
            document.addEventListener("DOMContentLoaded", function() {
                var editPriceTypeSelect = document.getElementById("edit_price_type");
                var editFixedPriceInput = document.getElementById("edit_fixed_price_input");
                var editRangedPriceInput = document.getElementById("edit_ranged_price_input");

                // Set initial display state based on the default value of Price Type
                if (editPriceTypeSelect.value === "fixed") {
                    editFixedPriceInput.style.display = "block";
                    editRangedPriceInput.style.display = "none";
                } else if (editPriceTypeSelect.value === "ranged") {
                    editFixedPriceInput.style.display = "none";
                    editRangedPriceInput.style.display = "block";
                }

                editPriceTypeSelect.addEventListener("change", function() {
                    if (editPriceTypeSelect.value === "fixed") {
                        editFixedPriceInput.style.display = "block";
                        editRangedPriceInput.style.display = "none";
                    } else if (editPriceTypeSelect.value === "ranged") {
                        editFixedPriceInput.style.display = "none";
                        editRangedPriceInput.style.display = "block";
                    }
                });
            });
        </script>
<script>
        $(window).on('load', function() {
            $('#editdescription').ckeditor();
        });
    </script>
<script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script>
    <script type="text/javascript">
        // Initialize NicEdit for specific textareas by their IDs
        bkLib.onDomLoaded(function() {
            new nicEditor({fullPanel: true}).panelInstance('description'); // For description textarea
        });
    </script>
<script>
     function cancelForm() {
         window.location.reload(); 
     }
 </script>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/evolve_business_live/resources/views/MemberProducts/productedit.blade.php ENDPATH**/ ?>