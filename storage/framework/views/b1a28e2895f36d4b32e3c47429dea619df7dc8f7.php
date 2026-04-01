<?php $__env->startSection('title', 'Visitor edit'); ?>
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
                                <h5 class="card-title mb-0">Edit Visitor</h5>
                            </div>
                            <div class="card-body">
                                <div class="live-preview">
                                    <form method="POST" onsubmit="return EditvalidateFile()"
                                        action="<?php echo e(route('Visitor.update')); ?>" autocomplete="off"
                                        enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" id="getid" value="<?php echo e($data->id); ?>">
                                        <input type="hidden" name="member_id" id="memberid"
                                            value="<?php echo e($data->member_id); ?>">


                                        <div class="modal-body">

                                            <div class="row gy-3 mb-3">
                                                <div class="col-lg-3 col-md-6">
                                                    <span style="color:red;">*</span>Name
                                                    <input type="text" class="form-control" name="name"
                                                        id="visitorname" placeholder="Enter Name" maxlength="100"
                                                        autocomplete="off" value="<?php echo e($data->name); ?>" required>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <span style="color:red;">*</span>Phone
                                                    <input type="text" class="form-control" name="phone" id="phone"
                                                        placeholder="Enter Phone"
                                                        oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                                        autocomplete="off" value="<?php echo e($data->phone); ?>" required>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <span style="color:red;">*</span>Email
                                                    <input type="text" class="form-control" name="email" id="email"
                                                        placeholder="Enter Email" value="<?php echo e($data->email); ?>" maxlength="70"
                                                        autocomplete="off" required>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    Business Category
                                                    <select class="form-select select2" id="business_category_id"
                                                        name="business_category_id" data-choices name="name">
                                                        <option value="">SelectCategory</option>
                                                        <?php
                                                            $search = \App\Models\Categories::select(
                                                                'categories.id',
                                                                'categories.name',
                                                            )
                                                                ->where(['iStatus' => 1, 'isDelete' => 0])
                                                                ->orderBy('categories.name', 'asc')
                                                                ->get();
                                                        ?>
                                                        <?php $__currentLoopData = $search; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($categori->id); ?>"
                                                                <?php echo e(isset($data->business_catgory) && $categori->id == $data->business_catgory ? 'selected' : ''); ?>>
                                                                <?php echo e($categori->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <span style="color:red;">*</span>Business Name
                                                    <input type="text" class="form-control" name="business_name"
                                                        id="business_name" placeholder="Enter Business Name" maxlength="70"
                                                        autocomplete="off" value="<?php echo e($data->business_name); ?>" required>
                                                </div>


                                            </div>

                                            <div class="modal-footer">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="submit" class="btn btn-success m-1"
                                                        id="add-btn">Update</button>
                                                    <button type="button" class="btn btn-danger btn-user"
                                                        onclick="cancelForm()">Cancel</button>

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/evolve_business_live/resources/views/Visitor/edit.blade.php ENDPATH**/ ?>