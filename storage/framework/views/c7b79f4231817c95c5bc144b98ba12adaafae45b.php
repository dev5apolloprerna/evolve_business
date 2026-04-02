<?php $__env->startSection('title', 'Announcement Add'); ?>
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
                                <h5 class="card-title mb-0">Add Announcement</h5>
                            </div>
                            <div class="card-body">
                                <div class="live-preview">
                                    <form action="<?php echo e(route('MemberAnnouncement.store')); ?>" method="post"
                                        enctype="multipart/form-data">

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
                        // alert($data);
                        var obj = JSON.parse(data);
                        $("#Editname").val(obj.companyname);
                        $("#Editphonenumber").val(obj.phonenumber);
                        $("#Editemail").val(obj.email);
                        $("#Editpassword").val(obj.password);
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
            var priceTypeSelect = document.getElementById("price_type");
            var fixedPriceInput = document.getElementById("fixed_price_input");
            var rangedPriceInput = document.getElementById("ranged_price_input");

            // Set initial display state based on the default value of Price Type
            if (priceTypeSelect.value === "fixed") {
                fixedPriceInput.style.display = "block";
                rangedPriceInput.style.display = "none";
            } else if (priceTypeSelect.value === "ranged") {
                fixedPriceInput.style.display = "none";
                rangedPriceInput.style.display = "block";
            }

            priceTypeSelect.addEventListener("change", function() {
                if (priceTypeSelect.value === "fixed") {
                    fixedPriceInput.style.display = "block";
                    rangedPriceInput.style.display = "none";
                } else if (priceTypeSelect.value === "ranged") {
                    fixedPriceInput.style.display = "none";
                    rangedPriceInput.style.display = "block";
                }
            });
        });
    </script>
    <script>
        $(window).on('load', function() {
            $('#description').ckeditor();
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/evolve_business_live/resources/views/MemberAnnouncement/create.blade.php ENDPATH**/ ?>