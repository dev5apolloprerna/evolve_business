<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>



    <style>
        marquee {

            background: black;

            color: white;

            padding: 6px;

            font-weight: 700;

            background: linear-gradient(to right, #78c046, #26a9cd) !important;

            font-size: 18px;

        }



        .cust-over {

            height: 564px;

            overflow: auto;

        }
    </style>

    <!-- ============================================================== -->

    <!-- Start right Content here -->

    <!-- ============================================================== -->

    <div class="main-content">

        

        

        



        <div class="page-content">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-12">

                        <?php if($Announcement): ?>
                            <marquee>

                                <ul class=

                         "mb-0">

                                    <li><a href="<?php echo e(route('AnnouncementDetail', $Announcement->Announcement_slug)); ?>"
                                            class="text-white"><?php echo e($Announcement->Title); ?></a></li>

                                </ul>

                            </marquee>
                        <?php endif; ?>

                    </div>





                    <div class="col-lg-6 mt-3">





                        <div class="card">

                            <div class="card-header align-items-center d-flex mb-3">

                                <h4 class="card-title mb-0 flex-grow-1">Business Analysis</h4>



                            </div>









                            <div class="h-100 p-3">



                                <!--end row-->







                                <div class="row">



                                    

                                    <div class="col-xl-6 col-md-6">

                                        <!-- card -->

                                        <div class="card card-animate" style="background: #6fbd59;">

                                            <div class="card-body">

                                                <div class="d-flex align-items-center">

                                                    <div class="flex-grow-1 overflow-hidden">

                                                        <p class="text-uppercase fw-bold text-white-50 text-truncate mb-0">

                                                            Business Given</p>

                                                    </div>

                                                </div>

                                                <div class="d-flex align-items-end justify-content-between mt-4">

                                                    <div>

                                                        <h4 class="fs-22 fw-bold ff-secondary text-white mb-4">

                                                            <span class="counter-value"
                                                                data-target="<?php echo e($approvecount); ?>">0</span>

                                                        </h4>

                                                        <a href="<?php echo e(route('MemberBusiness.index')); ?>"
                                                            class="text-decoration-underline text-white-50">View

                                                            Detail</a>

                                                    </div>

                                                    <div class="avatar-sm flex-shrink-0">

                                                        <span class="avatar-title bg-soft-light rounded fs-3">

                                                            <i class="fas fa-check-circle"></i>

                                                        </span>

                                                    </div>

                                                </div>

                                            </div><!-- end card body -->

                                        </div><!-- end card -->

                                    </div>

                                    



                                    

                                    <div class="col-xl-6 col-md-6">



                                        <div class="card card-animate" style="background: #59bda4;">

                                            <div class="card-body">

                                                <div class="d-flex align-items-center">

                                                    <div class="flex-grow-1 overflow-hidden">

                                                        <p class="text-uppercase fw-bold text-white-50 text-truncate mb-0">

                                                            Business RECEIVED</p>

                                                    </div>

                                                </div>

                                                <div class="d-flex align-items-end justify-content-between mt-4">

                                                    <div>

                                                        <h4 class="fs-22 fw-bold ff-secondary text-white mb-4">

                                                            <span class="counter-value"
                                                                data-target="<?php echo e($Received_bussiness); ?>">0</span>

                                                        </h4>

                                                        <a href="<?php echo e(route('MemberBusiness.Received')); ?>"
                                                            class="text-decoration-underline text-white-50">View Detail

                                                        </a>

                                                    </div>

                                                    <div class="avatar-sm flex-shrink-0">

                                                        <span class="avatar-title bg-soft-light rounded fs-3">

                                                            <i class="fas fa-times-circle"></i>

                                                        </span>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    







                                    

                                    <div class="col-xl-6 col-md-6">

                                        <!-- card -->

                                        <div class="card card-animate" style="background: #59bda4;">

                                            <div class="card-body">

                                                <div class="d-flex align-items-center">

                                                    <div class="flex-grow-1 overflow-hidden">

                                                        <p class="text-uppercase fw-bold text-white-50 text-truncate mb-0">

                                                            Connection Given</p>

                                                    </div>

                                                </div>

                                                <div class="d-flex align-items-end justify-content-between mt-4">

                                                    <div>

                                                        <h4 class="fs-22 fw-bold ff-secondary text-white mb-4">

                                                            <span class="counter-value"
                                                                data-target="<?php echo e($Reference_Given); ?>">0</span>

                                                        </h4>

                                                        <a href="<?php echo e(route('Reference.index')); ?>"
                                                            class="text-decoration-underline text-white-50">View Detail

                                                        </a>

                                                    </div>

                                                    <div class="avatar-sm flex-shrink-0">

                                                        <span class="avatar-title bg-soft-light rounded fs-3">

                                                            <i class="fas fa-times-circle"></i>

                                                        </span>

                                                    </div>

                                                </div>

                                            </div><!-- end card body -->

                                        </div><!-- end card -->

                                    </div>

                                    











                                    

                                    <div class="col-xl-6 col-md-6">

                                        <!-- card -->

                                        <div class="card card-animate" style="background: #6fbd59;">

                                            <div class="card-body">

                                                <div class="d-flex align-items-center">

                                                    <div class="flex-grow-1 overflow-hidden">

                                                        <p class="text-uppercase fw-bold text-white-50 text-truncate mb-0">

                                                            Connection Received</p>

                                                    </div>

                                                </div>

                                                <div class="d-flex align-items-end justify-content-between mt-4">

                                                    <div>

                                                        <h4 class="fs-22 fw-bold ff-secondary text-white mb-4">

                                                            <span class="counter-value"
                                                                data-target="<?php echo e($Reference_Received); ?>">0</span>

                                                        </h4>

                                                        <a href="<?php echo e(route('Reference.ReceivedReference')); ?>"
                                                            class="text-decoration-underline text-white-50">View Detail

                                                        </a>

                                                    </div>

                                                    <div class="avatar-sm flex-shrink-0">

                                                        <span class="avatar-title bg-soft-light rounded fs-3">

                                                            <i class="fas fa-times-circle"></i>

                                                        </span>

                                                    </div>

                                                </div>

                                            </div><!-- end card body -->

                                        </div><!-- end card -->

                                    </div>



                                    

                                    <div class="col-xl-6 col-md-6">

                                        <!-- card -->

                                        <div class="card card-animate" style="background: #6fbd59;">

                                            <div class="card-body">

                                                <div class="d-flex align-items-center">

                                                    <div class="flex-grow-1 overflow-hidden">

                                                        <p class="text-uppercase fw-bold text-white-50 text-truncate mb-0">

                                                            BUSINESS Pending</p>

                                                    </div>

                                                </div>

                                                <div class="d-flex align-items-end justify-content-between mt-4">

                                                    <div>

                                                        <h4 class="fs-22 fw-bold ff-secondary text-white mb-4">

                                                            <span class="counter-value"
                                                                data-target="<?php echo e($pending); ?>">0</span>

                                                        </h4>

                                                        <a href="<?php echo e(route('MemberBusiness.index')); ?>"
                                                            class="text-decoration-underline text-white-50">View

                                                            Detail </a>

                                                    </div>

                                                    <div class="avatar-sm flex-shrink-0">

                                                        <span class="avatar-title bg-soft-light rounded fs-3">

                                                            <i class="fas fa-hourglass-half"></i>

                                                        </span>

                                                    </div>

                                                </div>

                                            </div><!-- end card body -->

                                        </div><!-- end card -->

                                    </div>

                                    







                                </div>

                                
                               <!-- Chart Section  start-->
                                <!-- new code  -->
                               <!-- new code ravi end  -->
                                <!-- Chart Section end -->
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6" style="height: 500px">

                        <div class="card" style="height: 300px">

                            <div class="card-header align-items-center d-flex">

                                <h4 class="card-title mb-0 flex-grow-1">Your Upcoming Meeting</h4>



                            </div>

                            <?php if($meetingscount > 0): ?>

                                <div class="card-body cust-over pt-0">

                                    <ul class="list-group list-group-flush border-dashed">

                                        <?php $__currentLoopData = $meetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="list-group-item ps-0">

                                                <div class="row align-items-center g-3">

                                                    <div class="col-auto">

                                                        <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">

                                                            <div class="text-center">

                                                                <h5 class="mb-0">

                                                                    <?php echo e(Carbon\Carbon::createFromFormat('d.m.y H:i', $meeting->start_date)->format('d')); ?>


                                                                </h5>

                                                                <div class="text-muted">

                                                                    <?php echo e(Carbon\Carbon::createFromFormat('d.m.y H:i', $meeting->start_date)->format('D')); ?>


                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="col">

                                                        <h5 class="text-muted mt-0 mb-1 fs-14">

                                                            <?php echo e(Carbon\Carbon::createFromFormat('d.m.y H:i', $meeting->start_date)->format('d.m.y H:i')); ?>


                                                            To

                                                            <?php echo e(Carbon\Carbon::createFromFormat('d.m.y H:i', $meeting->End_date)->format('d.m.y H:i')); ?>


                                                        </h5>

                                                        <a href="#"
                                                            class="text-reset fs-15 mb-0"><?php echo e($meeting->Meeting_title); ?></a>

                                                    </div>

                                                </div>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </ul>

                                    <div
                                        class="align-items-center justify-content-center mt-2 row g-3 text-center text-sm-start">

                                        <div class="col-sm-auto">



                                        </div>

                                    </div>
                                <?php else: ?>
                                    <div class="row">

                                        <div
                                            class="col-lg-12 col-md-12  col-xs-12 col-sm-12 padding-5 bottom-border-verydark">

                                            <div
                                                class="alert alert-info clearfix profile-information padding-all-10 margin-all-0 backgroundDark">

                                                <h1 class="font-white text-center"> No Data Found ! </h1>

                                            </div>

                                        </div>

                                    </div>
                                <?php endif; ?>
                            </div>

                        </div>
                        <div class="col-lg-12" style="height: 300px">
                        <!--new-->

                            <div class="card" style="height: 300px">

                                <div class="card-header align-items-center d-flex">

                                    <h4 class="card-title mb-0 flex-grow-1">Previous Meeting</h4>

                                </div>



                                <div class="card-body cust-over pt-0">

                                    <ul class="list-group list-group-flush border-dashed">

                                        <?php $__currentLoopData = $previousMeetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="list-group-item ps-0">

                                                <div class="row align-items-center g-3">

                                                    <div class="col-auto">

                                                        <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">

                                                            <div class="text-center">

                                                                <h5 class="mb-0">

                                                                    <?php echo e(Carbon\Carbon::createFromFormat('d.m.y H:i', $meeting->start_date)->format('d')); ?>


                                                                </h5>

                                                                <div class="text-muted">

                                                                    <?php echo e(Carbon\Carbon::createFromFormat('d.m.y H:i', $meeting->start_date)->format('D')); ?>


                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="col">

                                                        <h5 class="text-muted mt-0 mb-1 fs-14">

                                                            <?php echo e(Carbon\Carbon::createFromFormat('d.m.y H:i', $meeting->start_date)->format('d.m.y H:i')); ?>


                                                            To

                                                            <?php echo e(Carbon\Carbon::createFromFormat('d.m.y H:i', $meeting->End_date)->format('d.m.y H:i')); ?>


                                                        </h5>

                                                        <div class="d-flex justify-content-between">

                                                            <a href="#"
                                                                class="text-reset fs-15 mb-0"><?php echo e($meeting->Meeting_title); ?></a>

                                                            <!-- <span class="badge bg-primary rounded-pill"><?php echo e($meeting->member_count); ?> Members</span> -->

                                                            <a href="<?php echo e(route('MemberBusiness.Memberlist', $meeting->id)); ?>"
                                                                class="btn btn-success btn-sm rounded-pill">

                                                                Members

                                                            </a>

                                                        </div>

                                                    </div>

                                                </div>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </ul>

                                    <div
                                        class="align-items-center justify-content-center mt-2 row g-3 text-center text-sm-start">

                                        <div class="col-sm-auto">



                                        </div>

                                    </div>

                                </div>

                            </div>

                        <!--new -->

                    </div>







                </div>

            </div>



        </div>

    </div>













    <div class="container-fluid">

        <div class="row mt-4">





            <div class="col-lg-6">

                <div class="card mb-3">

                    <div class="card-header">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h5 class="card-title mb-0" data-anchor="data-anchor">Top 3 Giver Of The Month -

                                    <?php echo e($monthname); ?>


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

                                        <h4 class="card-title mb-0 flex-grow-1"> Direct Business</h4>

                                    </div><!-- end card header -->

                                    <div class="card-body">

                                        <div class="table-responsive table-card">

                                            <?php if($topDirectcount > 0): ?>

                                                <table
                                                    class="table table-borderless table-hover table-nowrap align-middle mb-0">

                                                    <thead class="table-light">

                                                        <tr class="text-muted">

                                                            <th scope="col">Sr.No</th>

                                                            <th scope="col">Name</th>

                                                            <th scope="col">Company Name</th>

                                                            <th scope="col">Amount</th>



                                                        </tr>

                                                    </thead>

                                                    <tbody>



                                                        <?php $__currentLoopData = $topDirect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $receiver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>

                                                                <td><?php echo e($index + 1); ?></td>

                                                                <td><?php echo e($receiver->business_from); ?></td>

                                                                <td><?php echo e($receiver->companyname); ?></td>

                                                                <td><?php echo e($receiver->total_amount); ?></td>



                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    </tbody><!-- end tbody -->

                                                </table><!-- end table -->
                                            <?php else: ?>
                                                <div class="row">

                                                    <div
                                                        class="col-lg-12 col-md-12  col-xs-12 col-sm-12 padding-5 bottom-border-verydark">

                                                        <div
                                                            class="alert alert-info clearfix profile-information padding-all-10 margin-all-0 backgroundDark">

                                                            <h1 class="font-white text-center"> No Data Found ! </h1>

                                                        </div>

                                                    </div>

                                                </div>



                                            <?php endif; ?>

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

                                            <?php if($topReferencecount > 0): ?>

                                                <table
                                                    class="table table-borderless table-hover table-nowrap align-middle mb-0">

                                                    <thead class="table-light">

                                                        <tr class="text-muted">

                                                            <th scope="col">Sr.No</th>

                                                            <th scope="col">Name</th>

                                                            <th scope="col">Company Name</th>

                                                            <th scope="col">Amount</th>

                                                        </tr>

                                                    </thead>

                                                    <tbody>

                                                        <?php $__currentLoopData = $topReference; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $Giver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>

                                                                <td><?php echo e($index + 1); ?></td>

                                                                <td><?php echo e($Giver->business_from); ?></td>

                                                                <td><?php echo e($Giver->companyname); ?></td>

                                                                <td><?php echo e($Giver->total_amount); ?></td>

                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    </tbody><!-- end tbody -->

                                                </table><!-- end table -->
                                            <?php else: ?>
                                                <div class="row">

                                                    <div
                                                        class="col-lg-12 col-md-12  col-xs-12 col-sm-12 padding-5 bottom-border-verydark">

                                                        <div
                                                            class="alert alert-info clearfix profile-information padding-all-10 margin-all-0 backgroundDark">

                                                            <h1 class="font-white text-center"> No Data Found ! </h1>

                                                        </div>

                                                    </div>

                                                </div>

                                            <?php endif; ?>

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

                                                <table
                                                    class="table table-borderless table-hover table-nowrap align-middle mb-0">

                                                    <thead class="table-light">

                                                        <tr class="text-muted">

                                                            <th scope="col">Sr.No</th>

                                                            <th scope="col">Name</th>

                                                            <th scope="col">Company Name</th>

                                                            <th scope="col">Total references</th>

                                                        </tr>

                                                    </thead>

                                                    <tbody>

                                                        <?php $__currentLoopData = $Top_Reference_Givers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $Giver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

                                                    <div
                                                        class="col-lg-12 col-md-12  col-xs-12 col-sm-12 padding-5 bottom-border-verydark">

                                                        <div
                                                            class="alert alert-info clearfix profile-information padding-all-10 margin-all-0 backgroundDark">

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



<?php $__env->startSection('scripts'); ?>

    <style>
        a.canvasjs-chart-credit {

            display: none;

        }
    </style>



    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>



    <script>
        window.onload = function() {

            var chart1 = new CanvasJS.Chart("chartContainer", {

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

                    itemclick: toggleDataSeries1

                },

                data: [{

                        type: "column",

                        name: "Total Given Direct Business",

                        legendText: "Total Given Direct Business",

                        showInLegend: true,

                        color: "#6fbd59",

                        dataPoints: [

                            <?php $__currentLoopData = $formatted_combined_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                {

                                    label: "<?php echo e($data['month'] ?? 'Unknown'); ?>",

                                    y: <?php echo e($data['total_given'] ?? 0); ?>


                                },
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        ]

                    },

                    {

                        type: "column",

                        name: "Total Given Reference Business",

                        legendText: "Total Given Reference Business",

                        showInLegend: true,

                        color: "#59bda4",

                        dataPoints: [

                            <?php $__currentLoopData = $formatted_combined_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                {

                                    label: "<?php echo e($data['month'] ?? 'Unknown'); ?>",

                                    y: <?php echo e($data['total_received'] ?? 0); ?>


                                },
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        ]

                    }

                ]

            });

            chart1.render();



            function toggleDataSeries1(e) {

                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {

                    e.dataSeries.visible = false;

                } else {

                    e.dataSeries.visible = true;

                }

                chart1.render();

            }



            // Second Chart

            var chart2 = new CanvasJS.Chart("TochartContainer", {

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

                    itemclick: toggleDataSeries2

                },

                data: [{

                        type: "column",

                        name: "Total Received Direct Business",

                        legendText: "Total Received Direct Business",

                        showInLegend: true,

                        color: "#6fbd59",

                        dataPoints: [

                            <?php $__currentLoopData = $to_formatted_combined_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                {

                                    label: "<?php echo e($data['month'] ?? 'Unknown'); ?>",

                                    y: <?php echo e($data['total_given'] ?? 0); ?>


                                },
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        ]

                    },

                    {

                        type: "column",

                        name: "Total Received Reference Business",

                        legendText: "Total Received Reference Business",

                        showInLegend: true,

                        color: "#59bda4",

                        dataPoints: [

                            <?php $__currentLoopData = $to_formatted_combined_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                {

                                    label: "<?php echo e($data['month'] ?? 'Unknown'); ?>",

                                    y: <?php echo e($data['total_received'] ?? 0); ?>


                                },
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        ]

                    }

                ]

            });

            chart2.render();



            function toggleDataSeries2(e) {

                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {

                    e.dataSeries.visible = false;

                } else {

                    e.dataSeries.visible = true;

                }

                chart2.render();

            }

        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/evolve_business_live/resources/views/Memberhome.blade.php ENDPATH**/ ?>