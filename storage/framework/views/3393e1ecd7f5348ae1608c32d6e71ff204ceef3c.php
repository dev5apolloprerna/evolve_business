<?php $__env->startSection('title', 'Members List'); ?>
<?php $__env->startSection('content'); ?>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- <?php if($errors->any()): ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="mb-5" style="color:red"><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?> -->

                
                <?php echo $__env->make('common.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Add Members</h5>
                            </div>
                            <div class="card-body">
                                <div class="live-preview">
                                    <form action="<?php echo e(route('members.store')); ?>" method="post"
                                        enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="row gy-3 mb-3">
                                            
                                            <div class="col-lg-4 col-md-6">
                                                <span style="color: red;"></span> Brand Name
                                                <span style="color: red;" class="error-message"><?php echo e($errors->first('companyname')); ?></span> 
                                                <input type="text" class="form-control" name="companyname" id="companyname" placeholder="Enter Brand Name" maxlength="100" autocomplete="off" value="<?php echo e(old('companyname')); ?>">
                                            </div>

                                            <div class="col-lg-4 col-md-6">
                                                <span style="color: red;">*</span>Branch Establish Year                        
                                                <span style="color:red;" class="error-message"><?php echo e($errors->first('brand_establish_year')); ?></span> 
                                                <input type="text" class="form-control" name="brand_establish_year" id="brand_establish_year"
                                                    placeholder="Enter Brand Establish Year" value="<?php echo e(old('brand_establish_year')); ?>"  onKeyPress="if(this.value.length==6) return false;" required>
                                            </div>

                                            
                                            <div class="col-lg-4 col-md-6">
                                                GST Number
                                                <input type="text" class="form-control" name="gstnumber" id="gstnumber"
                                                    placeholder="Enter GST Number" value="<?php echo e(old('gstnumber')); ?>" >
                                            </div>
                                        </div>
                                        <div class="row gy-3" style="align-items: end;">
                                          

                                            <div class="col-lg-4 col-md-6">
                                                <span style="color: red;">*</span>Member Name                                        
                                                <span style="color:red;" class="error-message"><?php echo e($errors->first('first_name')); ?></span> 
                                                <input type="text" class="form-control" name="first_name" id="first_name"
                                                    placeholder="Enter Member Name" maxlength="100" autocomplete="off" value="<?php echo e(old('first_name')); ?>"
                                                    required>
                                            </div>

                                            <div class="col-lg-4 col-md-6"> 
                                                 <span style="color: red;">*</span>Phone Number                                    
                                                <span style="color:red;" class="error-message"><?php echo e($errors->first('phonenumber')); ?></span> 
                                                <input type="text" class="form-control" name="phonenumber"
                                                    id="phonenumber" placeholder="Enter Phone Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" onKeyPress="if(this.value.length==10) return false;" maxlength="10" minlength="10" value="<?php echo e(old('phonenumber')); ?>" required>
                                            </div>

                                            <div class="col-lg-4 col-md-6">
                                                <span style="color: red;">*</span>Email
                                                <span style="color:red;" class="error-message"><?php echo e($errors->first('email')); ?></span> 
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value="<?php echo e(old('email')); ?>" required>
                                            </div>

                                            <div class="col-lg-4 col-md-6">
                                                 <span style="color: red;">*</span>Date of Birth
                                                <span style="color:red;" class="error-message"><?php echo e($errors->first('date_of_birth')); ?></span> 
                                                <input type="date" class="form-control" name="date_of_birth"
                                                    id="date_of_birth" placeholder="Enter Date Of Birth"  value="<?php echo e(old('date_of_birth')); ?>" required>
                                            </div>


                                            <div class="col-lg-4 col-md-6">
                                                <span style="color: red;">*</span>Residential Address 
                                            <span style="color:red;" class="error-message"><?php echo e($errors->first('address')); ?></span> 
                                                <input type="text" class="form-control" name="address" id="address"
                                                    placeholder="Enter Address" value="<?php echo e(old('address')); ?>"  required>
                                            </div>

                                            <div class="col-lg-4 col-md-6">
                                                <label for="city_id"><span style="color:red;">*</span> City Name</label>
                                                <select class="form-control" name="city_id" id="city_id" required onchange="updateCityGroups()">
                                                    <option value="" selected>Select City Name</option>
                                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($city->id); ?>" <?php echo e(old('city_id') == $city->id ? 'selected' : ''); ?>>
                                                            <?php echo e($city->city_name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            
                                            <div class="col-lg-4 col-md-6">
                                                <span style="color: red;">*</span>Pincode                        
                                                <span style="color:red;" class="error-message"><?php echo e($errors->first('pincode')); ?></span> 
                                                <input type="text" class="form-control" name="pincode" id="pincode"
                                                    placeholder="Enter Pincode" value="<?php echo e(old('pincode')); ?>"  onKeyPress="if(this.value.length==6) return false;" required>
                                            </div>

                                            <div class="row gy-2 mb-3">

                                           
                                            <div class="col-lg-4 col-md-6">
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
                                            <div class="col-lg-4 col-md-6">
                                                <label for="category_id"><span style="color:red;">*</span> Category Name</label>
                                                <select class="form-control" name="category_id" id="category_id" required onchange="updatesubcategories()">
                                                    <option value="" <?php echo e(old('category_id') == '' ? 'selected' : ''); ?>>Select category Name</option>
                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>>
                                                            <?php echo e($category->name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            </div>                                          
                                            <div class="col-lg-4 col-md-6">
                                                <label for="plan_id"><span style="color:red;">*</span> Plan Name</label>
                                                <select class="form-control" name="plan_id" id="plan_id">
                                                    <option value="" selected>Select Plan Name</option>
                                                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                       
                                                        <option value="<?php echo e($plan->id); ?>" <?php echo e(old('plan_id') == $plan->id ? 'selected' : ''); ?>>
                                                        <?php echo e($plan->plan_name); ?>

                                                    </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                 <span style="color: red;">*</span>Joining Date
                                                <span style="color:red;" class="error-message"><?php echo e($errors->first('renewal_date')); ?></span> 
                                                <input type="text" class="form-control" name="renewal_date"
                                                    id="renewal_date" placeholder="Enter Membership Date"  value="<?php echo e(old('renewal_date')); ?>" required>
                                            </div>
                                           

                                            <!-- new payment ref number start -->
                                            <div class="col-lg-4 col-md-6">PaymentRefNo                                        
                                                <span style="color:red;" class="error-message"><?php echo e($errors->first('PaymentRefNo')); ?></span> 
                                                <input type="text" class="form-control" name="PaymentRefNo" id="PaymentRefNo" placeholder="Enter PaymentRefNo" value="<?php echo e(old('PaymentRefNo')); ?>" oninput="this.value = this.value.replace(/[^0-9_()-]/g, '');">
                                            </div>
                                            <!-- new payment ref number End -->

                                            <div class="col-lg-4 col-md-6">
                                                <span style="color: red;">*</span>Password                                                
                                                <span style="color:red;" class="error-message"><?php echo e($errors->first('password')); ?></span> 
                                                <input type="password" class="form-control" name="password" id="password"
                                                    placeholder="Enter Password" value="<?php echo e(old('password')); ?>" required>
                                            </div>
                                            
                                            
                                            

                                           
                                            <div class="text-center">
                                               
                                                    <button type="submit" class="btn btn-success btn-user style="width:
                                                        100px; height: 40px;"">Submit</button>
                                                    <button type="button" class="btn btn-danger btn-user float-right" onclick="cancelForm()">Cancel</button>
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
        var inputField = document.getElementById("Book_Your_Podcast");
        
        // Function to check if the selected date is Tuesday or Friday
        function isTuesdayOrFriday(date) {
            var day = new Date(date).getDay();
            return (day === 2 || day === 5); // Tuesday is 2, Friday is 5
        }

        // Event listener to restrict selection to Tuesdays and Fridays
        inputField.addEventListener("input", function() {
            if (!isTuesdayOrFriday(this.value)) {
                alert("Please select a Tuesday or Friday.");
                this.value = ""; // Clear the input field
            }
        });
    });
</script>

<script>
    // Get the input field
    var input = document.getElementById("Book_Your_Member_of_the_week");

    // Disable dates that are not Monday
    input.addEventListener("input", function() {
        var selectedDate = new Date(this.value);
        var dayOfWeek = selectedDate.getDay(); // Sunday - Saturday : 0 - 6
        if (dayOfWeek !== 1) { // Monday is represented by 1
            this.value = ''; // Reset the value if not Monday
            alert('Please select only Monday.');
        }
    });
</script>

<script>
        function cancelForm() {
            window.location.reload(); 
        }
    </script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $(function() {
        $("#renewal_date").datepicker({
            dateFormat: "yy-mm-dd",
            //minDate: 0
        });      
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/evolve_business_live/resources/views/members/storeview.blade.php ENDPATH**/ ?>