<?php $__env->startSection('title', 'Member Products Service '); ?>
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
                <div class="d-flex justify-content-end mb-3">
                    <!-- <a href="<?php echo e(route('MemberProducts.ProductStoreview', $id)); ?>" class="btn btn-success">Add Products
                        Service</a> -->
                    
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title mb-0" data-anchor="data-anchor">Products Service List
                                    </h5>
                                </div>
                                <div>    
                                    <a href="<?php echo e(route('MemberProducts.ProductStoreview', $id)); ?>" class="btn btn-success">Add Products
                            Service</a>  
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
                                        
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price / Price Ranged</th>
                                        <th scope="col">Photo</th> 
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                               
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>

                                            <td class="text-center">
                                                <?php echo e($i + $datas->perPage() * ($datas->currentPage() - 1)); ?></td>
                                            

                                            
                                            <td class="text-center"><?php echo e($data->product_name); ?></td>
                                            <!-- <td class="text-center"><?php echo e($data->price); ?></td> -->
                                            <td class="text-center">
                                                <?php if($data->price_type === 'fixed'): ?>
                                                    <?php echo e($data->price ?? '-'); ?>

                                                <?php elseif($data->price_type === 'ranged'): ?>
                                                    <?php echo e($data->min_price ?? '-'); ?> - <?php echo e($data->max_price ?? '-'); ?>

                                                <?php else: ?>
                                                    N/A
                                                <?php endif; ?>
                                            </td>   
                                            <!-- <td class="text-center">
                                                <img src="<?php echo e(asset('productimage') . '/' . $data->photo); ?>"
                                                    style="width: 50px;height: 50px;">
                                            </td>  -->
                                            <td class="text-center">
                                              <?php if($data->photo == null): ?>
                                              <img src="https://groath.in/assets/images/noimage.png"
                                                    style="width: 50px;height: 50px;">
                                                <?php else: ?>
                                                <img src="<?php echo e(asset('productimage') . '/' . $data->photo); ?>"
                                                    style="width: 50px;height: 50px;">
                                                <?php endif; ?>    
                                            </td>  
                                           
                                            <td>
                                                <div  class="d-flex gap-2 justify-content-center">
                                                    

                                                    <div class="d-flex gap-2">
                                                        
                                                        <a href="<?php echo e(route('MemberProducts.productedit',$data->memberservices_id)); ?>">
                                                            <i class="far fa-edit"></i>
                                                        </a>                                        
                                                        <a class="" href="#" data-bs-toggle="modal"
                                                            title="Delete" data-bs-target="#deleteRecordModal"
                                                            onclick="deleteData(<?= $data->memberservices_id ?>);">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <?php else: ?>
                                <div class="row">
                                                <div class="col-lg-12 col-md-12  col-xs-12 col-sm-12 padding-5 bottom-border-verydark">
                                                    <div class="alert alert-info clearfix profile-information padding-all-10 margin-all-0 backgroundgreen">
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
            </div>



            <!--Edit Modal Start-->

            
            <!--Edit Modal End -->      

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
                        <form id="user-delete-form" method="POST"
                            action="<?php echo e(route('MemberProducts.delete')); ?>">
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
                data: { id: id },
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


    <!-- <script>
        function getEditData(id) {
            // alert(id);
            var url = "<?php echo e(route('Products_service.edit', ':id')); ?>";
            url = url.replace(":id", id);
            if (id) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        // alert(data);
                        var obj = JSON.parse(data);
                        $("#editproductname").val(obj.product_name);
                        $("#editprice").val(obj.price);
                        $("#editdescription").val(obj.description);
                        $('#getid').val(obj.memberservices_id);
                        $('#memberid').val(obj.member_id);
                        $("#editphoto").val(obj.photo);
                        // alert(obj.description);
                        // $('#getid').val(obj.memberservices_id);

                    }
                });
            }
        }
    </script> -->


    <script>
        function deleteData(id) {
            // alert(id);
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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/evolve_business_live/resources/views/MemberProducts/Productindex.blade.php ENDPATH**/ ?>