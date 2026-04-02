<?php $__env->startSection('title', 'Add Announcement '); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
            <script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script>
                <link href="<?php echo e(asset('vendors/choices/choices.min.css')); ?>" rel="stylesheet" />
                <?php echo $__env->make('common.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-3 mb-3">
                            <div class="card-header">
                                <div class="row flex-between-end">
                                    <div class="col-auto align-self-center">
                                        <h5 class="card-title mb-0">Add Announcement</h5>
                                    </div>
                                </div>
                            </div>
                         
                            <div class="card-body bg-light">
                                <div class="tab-content">
                                    <div class="tab-pane preview-tab-pane active" role="tabpanel"
                                        aria-labelledby="tab-dom-160a4566-7e94-45a2-bf04-b36ef49d954f"
                                        id="dom-160a4566-7e94-45a2-bf04-b36ef49d954f">
                                        <form  method="post" action="<?php echo e(route('Announcement.Announcementcreate')); ?>"
                                            enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('post'); ?>
                                            <div class="row">
                                                
                                                <div class="col-md-4 mt-2">
                                                    <span style="color:red;">*</span>Title</label>
                                                    <input class="form-control" id="basic-form-name" name="Title"
                                                        type="text" placeholder="Enter Title"
                                                        value="" required>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                        <span style="color:red;">
                                                            *</span>Photo</label>
                                                        <input class="form-control" type="file" name="photo" id="photovalidate"
                                                            value="">                                                       
                                                    </div>
                                                  

                                                <div class="col-md-12 mt-2">
                                                    <span style="color:red;">*</span>Description</label>
                                                    <textarea class="form-control" id="description" name="description"></textarea>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div style="margin-top: 10px;text-align: right;">
                                                    <button 
                                                        type="submit" class="btn btn-success btn-user float-right">Submit</button>
                                                        <button type="button" class="btn btn-danger btn-user float-right" onclick="cancelForm()">Cancel</button>
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
        </div>
    </div>

            <?php $__env->stopSection(); ?>

            <?php $__env->startSection('scripts'); ?>
                <script src="<?php echo e(asset('vendors/choices/choices.min.js')); ?>"></script>

                <script>
                    $(window).on('load', function() {
                        $('#description').ckeditor();
                    });
                </script>

                <script>
                    function validateFile() {
                        var allowedExtension = ['jpeg', 'jpg', 'png', 'webp'];
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

            <script type="text/javascript">
            
                bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
            </script>
<script>
        function cancelForm() {
            window.location.reload(); 
        }
    </script>
            <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/evolve_business_live/resources/views/Announcement/storeview.blade.php ENDPATH**/ ?>