
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>


    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <?php $session = Auth::user(); ?>
  <style>
      .cust-over
    {
        height: 553px;
        overflow: auto;
    }
  </style>
    <div class="main-content">

    
        
        
        

        <div class="page-content">
            <!-- new code start -->
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-6 mt-3">
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title mb-0" data-anchor="data-anchor">Top 3 Giver Of The Month - <?php echo e($monthname); ?>

                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--Business Reciver And Giver -->
                                <div class="row">
                                    <div class="col-xl-12">
                               <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Direct Business</h4>                                  
                                </div><!-- end card header -->
                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                                            <thead class="table-light">
                                                <tr class="text-muted">
                                                    <th scope="col">Sr.No</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Company Name</th>
                                                    <th scope="col">Amount</th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $topDirect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index =>$receiver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <tr>
                                                    <td><?php echo e($index + 1); ?></td>
                                                    <td><?php echo e($receiver->business_from); ?></td>
                                                    <td><?php echo e($receiver->companyname); ?></td>
                                                    <td><?php echo e($receiver->total_amount); ?></td>
                                                   
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody><!-- end tbody -->
                                        </table><!-- end table -->
                                    </div><!-- end table responsive -->
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div>
                        
                        
                        
                        
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Reference Business</h4>                                    
                                </div><!-- end card header -->
                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                                            <thead class="table-light">
                                                <tr class="text-muted">
                                                    <th scope="col">Sr.No</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Company Name</th>
                                                    <th scope="col">Amount</th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $topReference; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index =>$Giver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                    <td><?php echo e($index + 1); ?></td>
                                                    <td><?php echo e($Giver->business_from); ?></td>
                                                    <td><?php echo e($Giver->companyname); ?></td>
                                                    <td><?php echo e($Giver->total_amount); ?></td>                                                   
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                                                             
                                            </tbody><!-- end tbody -->
                                        </table><!-- end table -->
                                    </div><!-- end table responsive -->
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div>
                        
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Connection Given</h4>                                    
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="table-responsive table-card">
                                        <?php if($TopReferenceGivers > 0): ?>
                                            <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                                                <thead class="table-light">
                                                    <tr class="text-muted">
                                                        <th scope="col">Sr.No</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Company Name</th>
                                                        <th scope="col">Total references</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $__currentLoopData = $Top_Reference_Givers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index =>$Giver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                        <td><?php echo e($index + 1); ?></td>
                                                        <td><?php echo e($Giver->Contact_person); ?></td>
                                                        <td><?php echo e($Giver->companyname); ?></td>
                                                        <td><?php echo e($Giver->total_references); ?></td>                                                   
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                                                             
                                                </tbody><!-- end tbody -->
                                            </table><!-- end table -->
                                            <?php else: ?> 
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12  col-xs-12 col-sm-12 padding-5 bottom-border-verydark">
                                                    <div class="alert alert-info clearfix profile-information padding-all-10 margin-all-0 backgroundDark">
                                                        <h1 class="font-white text-center"> No Data Found ! </h1>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </div><!-- end table responsive -->
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div>
                         

                    </div>
                        
                        <!--Business Reciver And Giver -->                             
      
                        </div>
                    </div>
                </div>
                
                                            <div class="col-lg-6 mt-3">
                                            <div class="card">
                                                <div class="card-header align-items-center d-flex">
                                                    <h4 class="card-title mb-0 flex-grow-1"> Meeting</h4>
                                                    <div class="flex-shrink-0">
                                                        <!--<div class="dropdown card-header-dropdown">-->
                                                        <!--    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                                                        <!--        <span class="text-muted fs-18"><i class="mdi mdi-dots-vertical"></i></span>-->
                                                        <!--    </a>-->
                                                        <!--    <div class="dropdown-menu dropdown-menu-end">-->
                                                        <!--        <a class="dropdown-item" href="#">Edit</a>-->
                                                        <!--        <a class="dropdown-item" href="#">Remove</a>-->
                                                        <!--    </div>-->
                                                        <!--</div>-->
                                                    </div>
                                                </div>
                                     
                                                <div class="card-body cust-over pt-0">
                                                    <ul class="list-group list-group-flush border-dashed">
                                                        <?php $__currentLoopData = $meetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                                      
                                                        <li class="list-group-item ps-0">
                                                                <div class="row align-items-center g-3">
                                                                    <div class="col-auto">
                                                                        <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                                            <div class="text-center">
                                                                                <h5 class="mb-0"><?php echo e(Carbon\Carbon::createFromFormat('d.m.y H:i', $meeting->start_date)->format('d')); ?></h5>
                                                                                <div class="text-muted"><?php echo e(Carbon\Carbon::createFromFormat('d.m.y H:i', $meeting->start_date)->format('D')); ?></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <h5 class="text-muted mt-0 mb-1 fs-14"><?php echo e(Carbon\Carbon::createFromFormat('d.m.y H:i', $meeting->start_date)->format('d.m.y H:i')); ?> To <?php echo e(Carbon\Carbon::createFromFormat('d.m.y H:i', $meeting->End_date)->format('d.m.y H:i')); ?></h5>
                                                                    <div class="d-flex justify-content-between">
                                                                    <a href="#" class="text-reset fs-15 mb-0"><?php echo e($meeting->Meeting_title); ?></a>
                                                                        <!-- <span class="badge bg-primary rounded-pill"><?php echo e($meeting->member_count); ?> Members</span> -->
                                                                        <a href="<?php echo e(route('Membermeeting.Memberindex',$meeting->id)); ?>"
                                                                         class="btn btn-success btn-sm rounded-pill"><?php echo e($meeting->member_count); ?> Members</a>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                    <div class="align-items-center justify-content-center mt-2 row g-3 text-center text-sm-start">
                                                        <div class="col-sm-auto">
                                                       
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
            </div>
            </div>
            
            <!-- new code end  -->
            <div class="container-fluid">

                <div class="row mt-3">
                    <div class="col-lg-12">
<div class="card">
                                                <div class="card-header align-items-center d-flex mb-3">
                                                    <h4 class="card-title mb-0 flex-grow-1">Business Analysis</h4>
                                                    <div class="flex-shrink-0">
                                                        
                                                    </div>
                                                      </div>
                                                      
                                                
                                                
                        <div class="h-100 p-3">
                            
                           
                            <!--end row-->

                            <div class="row">

                               
                                
                                
                                <div class="col-xl-3 col-md-3">
                                    <!-- card -->
                                    <div class="card card-animate" style="background: #00abc8;">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="text-uppercase fw-bold text-white-50 text-truncate mb-0">
                                                        Business Pending</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                <h4 class="fs-22 fw-bold ff-secondary text-white mb-8">
                                                     <span class="counter-value" data-target="<?php echo e($pending); ?>"><?php echo e($pending); ?></span>/<span class="counter-value" data-target="<?php echo e($totalpendingamount); ?>"><?php echo e($totalpendingamount); ?></span>
                                                </h4>
                                                    <?php if($session->role_id == 1): ?>
                                                    <a href="<?php echo e(route('Business.index')); ?>"
                                                        class="text-decoration-underline text-white-50">View Detail
                                                       
                                                    </a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-soft-light rounded fs-3">
                                                        <i class="fas fa-hourglass-half"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                                

                                  
                                  <div class="col-xl-3 col-md-3">
                                    <!-- card -->
                                    <div class="card card-animate" style="background: #00abc8;">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="text-uppercase fw-bold text-white-50 text-truncate mb-0">
                                                        Business Approve</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-22 fw-bold ff-secondary text-white mb-4">
                                                    <span class="counter-value" data-target="<?php echo e($approvecount); ?>">0</span>/<span class="counter-value" data-target="<?php echo e($totalapproveamount); ?>">0</span>
                                                    </h4>
                                                    <?php if($session->role_id == 1): ?>
                                                    <a href="<?php echo e(route('Business.approve_list')); ?>"
                                                        class="text-decoration-underline text-white-50">View Detail
                                                     
                                                    </a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-soft-light rounded fs-3">
                                                        <i class="fas fa-check-circle"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                                

                                    
                                    <div class="col-xl-3 col-md-3">
                                        <!-- card -->
                                        <div class="card card-animate" style="background: #00abc8;">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-bold text-white-50 text-truncate mb-0">
                                                            Business Rejected</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-bold ff-secondary text-white mb-4">
                                                            <span class="counter-value"
                                                                data-target="<?php echo e($rejectedcount); ?>">0</span>/
                                                                <span class="counter-value"
                                                                data-target="<?php echo e($totalrejectedamount); ?>">0</span>
                                                        </h4>
                                                        <?php if($session->role_id == 1): ?>
                                                        <a href="<?php echo e(route('Business.rejected_list')); ?>"
                                                            class="text-decoration-underline text-white-50">View Detail
                                                        
                                                        </a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-soft-light rounded fs-3">
                                                            <i class="fas fa-times-circle"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                    

                                    
                                <div class="col-xl-3 col-md-3">
                                    <!-- card -->
                                    <div class="card card-animate" style="background: #00abc8;">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="text-uppercase fw-bold text-white-50 text-truncate mb-0">
                                                        Total Active Member</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-22 fw-bold ff-secondary text-white mb-4"><span
                                                            class="counter-value" data-target="<?php echo e($active); ?>">0</span>
                                                    </h4>
                                                    <?php if($session->role_id == 1): ?>
                                                    <a href="<?php echo e(route('members.index')); ?>"
                                                        class="text-decoration-underline text-white-50">View Detail
                                                    </a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-soft-light rounded fs-3">
                                                        <i class="fas fa-users"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                                 <!-- Chart Section  start-->
                              
                            
                                 <!-- Chart Section end -->
                            </div>
                        </div>
                        </div>
                    </div>
                    
                
                </div>
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © <?php echo e(env('APP_NAME')); ?>.
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->


<?php $__env->stopSection(); ?>
<!-- col chart -->
<?php $__env->startSection('scripts'); ?>

<!-- New code start -->
<style>
    a.canvasjs-chart-credit {
    display: none;
}
</style>
   
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

     <script>
            window.onload = function () {
                var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    title: {
                        text: "",
                        fontSize: 16
                    },
                    axisY: {
                        title: "Total",
                        titleFontColor: "#4F81BC",
                        lineColor: "#4F81BC",
                        labelFontColor: "#4F81BC",
                        tickColor: "#4F81BC",
                        lineThickness: 2 
                    },
                    toolTip: {
                        shared: true
                    },
                    legend: {
                        cursor: "pointer",
                        itemclick: toggleDataSeries
                    },
                    data: [{
                        type: "column",
                        name: "Total Direct Business",
                        legendText: "Total Direct Business",
                        showInLegend: true,
                        color: "#6fbd59", 
                        dataPoints: [
                            <?php $__currentLoopData = $formatted_combined_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                { label: "<?php echo e(substr($data['month'], 0, 3) ?? "Unknown"); ?>-<?php echo e(substr($data['year'], -2) ?? "Unknown"); ?>", y: <?php echo e($data['total_given'] ?? 0); ?> },
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ]
                    },
                    {
                        type: "column",
                        name: "Total Reference Business",
                        legendText: "Total Reference Business",
                        showInLegend: true,
                        color: "#59bda4", 
                        dataPoints: [
                            <?php $__currentLoopData = $formatted_combined_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                { label: "<?php echo e(substr($data['month'], 0, 3) ?? "Unknown"); ?>-<?php echo e(substr($data['year'], -2) ?? "Unknown"); ?>", y: <?php echo e($data['total_received'] ?? 0); ?> },
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ]
                    }]
                });
    chart.render();

    function toggleDataSeries(e) {
        if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        } else {
            e.dataSeries.visible = true;
        }
        chart.render();
    }
}
</script> 

    
<?php $__env->stopSection(); ?>
<!-- col chart -->


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp laravel11\htdocs\live_codes\Evolve Business\resources\views/home.blade.php ENDPATH**/ ?>