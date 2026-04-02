<?php $__env->startSection('title', 'Award edit'); ?>
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
                                <h5 class="card-title mb-0">Edit Award</h5>
                            </div>
                            <div class="card-body">
                                <div class="live-preview">
                                    <form action="<?php echo e(route('Award.update')); ?>" method="post" enctype="multipart/form-data">

                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name ="memberid" value="<?php echo e($memberid); ?>">
                                        <input type="hidden" name ="awardid" value="<?php echo e($data->id); ?>">
                                        <div class="row gy-3 mb-3">
                                            <div class="col-lg-3 col-md-6">
                                                <span style="color:red;">*</span>Title
                                                <input type="text" class="form-control" name="title" id="title"
                                                    placeholder="Enter Title" value="<?php echo e($data->title); ?>" maxlength="100"
                                                    autocomplete="off" required>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <span style="color:red;"></span> Photo
                                                <input type="file" class="form-control" name="photo" id="editphoto"
                                                    value="<?php echo e($data->photo); ?>" placeholder="Enter Image">
                                                
                                                <input type="hidden" name="hiddenPhoto" class="form-control"
                                                    value="<?php echo e(old('photo') ? old('photo') : $data->photos); ?>"
                                                    id="hiddenPhoto">
                                            </div>
                                            <div class="col-lg-4">
                                                <div id="viewimg">
                                                    <?php if($data->photos): ?>
                                                        <img src="<?php echo e(asset('Award') . '/' . $data->photos); ?>" alt=""
                                                            height="70" width="70">
                                                    <?php else: ?>
                                                        <img src="https://groath.in/assets/images/noimage.png"
                                                            alt="No Image" height="70" width="70">
                                                    <?php endif; ?>
                                                    <!-- <img src="<?php echo e(asset('Award') . '/' . $data->photos); ?>" alt=""
                                                                                                     height="70" width="70"> -->
                                                </div>
                                            </div>

                                        </div>

                                        <div>
                                            <div>
                                                <label for="description">
                                                    <span style="color:red;">*</span>Description
                                                </label>
                                                <textarea class="form-control" name="description" id="description" placeholder="Enter Description" rows="4"
                                                    maxlength="500" autocomplete="off"><?php echo e($data->description); ?></textarea>
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
                new nicEditor({
                    fullPanel: true
                }).panelInstance('description'); // For description textarea
            });
        </script>
        <script>
            function cancelForm() {
                window.location.reload();
            }
        </script>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/evolve_business_live/resources/views/Award/edit.blade.php ENDPATH**/ ?>