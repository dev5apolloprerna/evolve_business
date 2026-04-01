<!-- ========== App Menu ========== -->
<?php $permission = Session::all(); ?>
<?php $subexpri = Session::all(); ?>

<style>
    [data-layout=horizontal] .navbar-menu .navbar-nav>.nav-item>.nav-link[data-bs-toggle=collapse]:after {
        right: 0;
        -webkit-transform: rotate(90deg) !important;
        transform: rotate(90deg) !important;
        color: white;
    }
</style>

<div class="app-menu navbar-menu">
    <?php $session = Auth::user(); ?>
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu"></span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link <?php if(request()->routeIs('home')): ?> <?php echo e('active'); ?> <?php endif; ?>"
                        href="<?php echo e(route('home')); ?>">
                        <i class="mdi mdi-speedometer"></i>
                        <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li>

                <li class="nav-item">
                    <?php if($session->role_id == 1 || $session->role_id == 3): ?>
                        <?php if(
                            $session->role_id == 1 ||
                                (isset($permission['city']) && $permission['city'] == 1) ||
                                (isset($permission['city_group']) && $permission['city_group'] == 1) ||
                                (isset($permission['categories']) && $permission['categories'] == 1) ||
                                (isset($permission['membershipplans']) && $permission['membershipplans'] == 1) ||
                                (isset($permission['overteem']) && $permission['overteem'] == 1) ||
                                (isset($permission['Banner']) && $permission['Banner'] == 1) ||
                                (isset($permission['Utility']) && $permission['Utility'] == 1) ||
                                (isset($permission['MasterEntry']) && $permission['MasterEntry'] == 1) ||
                                (isset($permission['BannerImage']) && $permission['BannerImage'] == 1) ||
                                (isset($permission['RegisterInquiry']) && $permission['RegisterInquiry'] == 1) ||
                                (isset($permission['ContactInquiry']) && $permission['ContactInquiry'] == 1) ||
                                (isset($permission['EventInquiry']) && $permission['EventInquiry'] == 1)): ?>

                            <?php if($session->role_id == 1 || $permission['MasterEntry'] == 1): ?>
                                <a class="nav-link menu-link <?php if(request()->routeIs('#')): ?> <?php echo e('active'); ?> <?php endif; ?>"
                                    href="#">
                                    <i class="fa-regular fa-rectangle-list"></i>
                                    <span data-key="t-dashboards">Master Entry</span>
                                </a>
                            <?php endif; ?>
                            <div class="collapse menu-dropdown" id="sidebarApps">
                                <ul class="nav nav-sm flex-column">
                                    <?php if($session->role_id == 1 || $permission['city'] == 1): ?>
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('serviceprovider.index')); ?>" class="nav-link"
                                                data-key="t-chat">
                                                <i class="fas fa-city"></i>City
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if($session->role_id == 1 || $permission['city_group'] == 1): ?>
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('serviceprovider.citygroupindex')); ?>" class="nav-link"
                                                data-key="t-chat">
                                                <i class="fas fa-building"></i>City Wise Circle
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if($session->role_id == 1 || $permission['categories'] == 1): ?>
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('categories.index')); ?>" class="nav-link"
                                                data-key="t-chat">
                                                <i class="fas fa-folder"></i> Category
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if($session->role_id == 1 || $permission['membershipplans'] == 1): ?>
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('membershipplans.index')); ?>" class="nav-link"
                                                data-key="t-chat">
                                                <i class="fas fa-credit-card"></i>Membership plan
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <li class="nav-item">
                                        <a href="<?php echo e(route('Points.index')); ?>" class="nav-link" data-key="t-chat">
                                            <i class="fas fa-credit-card"></i>Points
                                        </a>
                                    </li>


                                </ul>
                            </div>
                </li>
                <?php endif; ?>
                <?php endif; ?>

                <?php if($session->role_id == 1 || $session->role_id == 3): ?>
                    <?php if($session->role_id == 1 || $permission['members'] == 1): ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link <?php if(request()->routeIs('members.index')): ?> <?php echo e('active'); ?> <?php endif; ?>"
                                href="<?php echo e(route('members.index')); ?>">
                                <i class="fas fa-users"></i>
                                <span data-key="t-dashboards">Member</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarApps">
                                <ul class="nav nav-sm flex-column">


                                    <?php if($session->role_id == 1 || $session->role_id == 3): ?>
                                        <li class="nav-item">
                                            <a class="nav-link menu-link <?php if(request()->routeIs('Membermeeting.index')): ?> <?php echo e('active'); ?> <?php endif; ?>"
                                                href="<?php echo e(route('Membermeeting.index')); ?>">
                                                <i class="fas fa-users"></i>
                                                <span data-key="t-dashboards">Members Meeting</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>




                                </ul>
                            </div>
                        </li>

                    <?php endif; ?>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?php if(request()->routeIs('MemberProducts.Productindex')): ?> <?php echo e('active'); ?> <?php endif; ?>"
                            href="#sidebarProduct" data-bs-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="sidebarProduct">
                            <i class="fas fa-shopping-bag"></i>
                            <span data-key="t-dashboards">Product</span>
                            
                        </a>
                        <!-- Submenu -->
                        <div class="collapse menu-dropdown" id="sidebarProduct">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link menu-link <?php if(request()->routeIs('MemberProducts.Productindex')): ?> <?php echo e('active'); ?> <?php endif; ?>"
                                        href="<?php echo e(route('MemberProducts.Productindex')); ?>">
                                        <i class="fas fa-user-plus"></i>
                                        <span data-key="t-dashboards">Add Product</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-link <?php if(request()->routeIs('productInquirylist')): ?> <?php echo e('active'); ?> <?php endif; ?>"
                                        href="<?php echo e(route('productInquirylist')); ?>">
                                        <i class="fas fa-question-circle inquiry-icon"></i>
                                        <span data-key="t-dashboards">Product Inquiry</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                <?php endif; ?>


                <?php if($session->role_id == 1 || $session->role_id == 3): ?>
                    <?php if($session->role_id == 1 || $permission['Business'] == 1): ?>
                        <!-- <li class="nav-item">
                    <a class="nav-link menu-link <?php if(request()->routeIs('Business.index')): ?> <?php echo e('active'); ?> <?php endif; ?>"
                        href="<?php echo e(route('Business.index')); ?>">
                        <i class="fas fa-building"></i>
                        <span data-key="t-dashboards">Business</span>
                    </a>
                </li>   -->
                        <!-- new -->
                        <li class="nav-item">
                            <a class="nav-link menu-link <?php if(request()->routeIs()): ?> <?php echo e('active'); ?> <?php endif; ?>"
                                href="">
                                <i class="fas fa-chart-line"></i>
                                <span data-key="t-dashboards">Business Analysis</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarApps">
                                <ul class="nav nav-sm flex-column">

                                    <li class="nav-item">
                                        <a href="<?php echo e(route('Business.index')); ?>" class="nav-link" data-key="t-chat">
                                            <i class="fas fa-building"></i>Business
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo e(route('Admin-Reference.index')); ?>" class="nav-link"
                                            data-key="t-chat">
                                            <i class="fas fa-book"></i></i>Connection
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- new -->
                    <?php endif; ?>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?php if(request()->routeIs('MemberBusiness.index')): ?> <?php echo e('active'); ?> <?php endif; ?>"
                            href="#sidebarBusiness" data-bs-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="sidebarBusiness">
                            <i class="fas fa-building"></i>
                            <span data-key="t-dashboards">Business</span>

                        </a>
                        <div class="collapse menu-dropdown" id="sidebarBusiness">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="<?php echo e(route('MemberBusiness.index')); ?>" class="nav-link"
                                        data-key="t-chat">
                                        <i class="fas fa-handshake"></i>Business Given
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?php echo e(route('MemberBusiness.Received')); ?>" class="nav-link"
                                        data-key="t-chat">
                                        <i class="fas fa-check-circle"></i> Business Received
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <!-- new code 08-04-2024 -->
                <?php if($session->role_id == 2): ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?php if(request()->routeIs('Reference.index')): ?> <?php echo e('active'); ?> <?php endif; ?>"
                            href="#sidebarConnection" data-bs-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="sidebarConnection">
                            <i class="fas fa-book"></i>
                            <span data-key="t-dashboards">Connection</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarConnection">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="<?php echo e(route('Reference.index')); ?>" class="nav-link" data-key="t-chat">
                                        <i class="fas fa-handshake"></i>Connection Given
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?php echo e(route('Reference.ReceivedReference')); ?>" class="nav-link"
                                        data-key="t-chat">
                                        <i class="fas fa-check-circle"></i> Connection Received
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <!-- new code 08-04-2024 -->
                <?php if($session->role_id == 1 || $session->role_id == 3): ?>
                    <?php if($session->role_id == 1 || $permission['reports'] == 1): ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link <?php if(request()->routeIs('users.index')): ?> <?php echo e('active'); ?> <?php endif; ?> || <?php if(request()->routeIs('report.index')): ?> <?php echo e('active'); ?> <?php endif; ?>"
                                href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false"
                                aria-controls="sidebarApps">
                                <i class="fas fa-file"></i>
                                <span data-key="t-apps">Report</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarApps">
                                <ul class="nav nav-sm flex-column">

                                    <li class="nav-item">
                                        <a href="<?php echo e(route('reports.upcomingrenual')); ?>" class="nav-link"
                                            data-key="t-chat">
                                            <i class="far fa-calendar-alt"></i>Upcoming Report
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>


                
                <li class="nav-item">
                    <?php if($session->role_id == 1 || $session->role_id == 3): ?>
                        <?php if($session->role_id == 1 || $permission['Utility'] == 1): ?>
                            <a class="nav-link menu-link <?php if(request()->routeIs('users.index')): ?> <?php echo e('active'); ?> <?php endif; ?> || <?php if(request()->routeIs('report.index')): ?> <?php echo e('active'); ?> <?php endif; ?>"
                                href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false"
                                aria-controls="sidebarApps">
                                <i class="fas fa-tools"></i>
                                <span data-key="t-apps">Utility</span>
                            </a>
                        <?php endif; ?>
                    <?php else: ?>
                        <!-- <li class="nav-item">
                        <a class="nav-link menu-link <?php if(request()->routeIs('Usermember.blogindex')): ?> <?php echo e('active'); ?> <?php endif; ?>"
                            href="<?php echo e(route('Usermember.blogindex')); ?>">
                           
                            <i class="fa-solid fa-blog"></i>
                            <span data-key="t-dashboards">Artical</span>
                        </a>
                    </li> -->
                        <!-- user utility  -->


                    <?php endif; ?>
                    <!-- member subscription expried date code start -->
                    <?php if($session->role_id == 2): ?>
                        <?php $subexpri = App\Models\members::where('user_id', $session->id)->first(); ?>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-key="t-chat">
                        <b> <i class="fas fa-calendar-alt"></i> SUBSCRIPTION EXPIRIES ON :-
                            <?php echo e(isset($subexpri['SubscriptionExpiredDate']) ? date('d-m-Y', strtotime($subexpri['SubscriptionExpiredDate'])) : ''); ?></b>

                    </a>
                </li>
                <?php endif; ?>
                <!-- member subscription expried date code end -->

                <!-- user utility end -->
                <div class="collapse menu-dropdown" id="sidebarApps"
                    style="max-height: 500px; overflow-y: auto; overflow-x: hidden;">
                    <ul class="nav nav-sm flex-column">



                        <?php if($session->role_id == 1 || $session->role_id == 3): ?>
                            <?php if($session->role_id == 1 || $permission['gallery'] == 1): ?>
                                <li class="nav-item">
                                    <a class="nav-link menu-link <?php if(request()->routeIs('gallery.index')): ?> <?php echo e('active'); ?> <?php endif; ?>"
                                        href="<?php echo e(route('gallery.index')); ?>">
                                        <!-- <i class="fa-solid fa-box-open"></i> -->
                                        <i class="fa fa-image"></i>
                                        <span data-key="t-dashboards">Gallery</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if($session->role_id == 1 || $session->role_id == 3): ?>
                            <?php if($session->role_id == 1 || $permission['videogallery'] == 1): ?>
                                <li class="nav-item">
                                    <a class="nav-link menu-link <?php if(request()->routeIs('videogallery.index')): ?> <?php echo e('active'); ?> <?php endif; ?>"
                                        href="<?php echo e(route('videogallery.index')); ?>">
                                        <i class="fas fa-video"></i>
                                        <span data-key="t-dashboards">Video gallery</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if($session->role_id == 1 || $session->role_id == 3): ?>
                            <?php if($session->role_id == 1 || $permission['Event'] == 1): ?>
                                <li class="nav-item">
                                    <a class="nav-link menu-link <?php if(request()->routeIs('Event.index')): ?> <?php echo e('active'); ?> <?php endif; ?>"
                                        href="<?php echo e(route('Event.index')); ?>">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span data-key="t-dashboards">Events</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if($session->role_id == 1 || $session->role_id == 3): ?>
                        <?php endif; ?>

                        <?php if($session->role_id == 1 || $session->role_id == 3): ?>
                            <?php if($session->role_id == 1 || $permission['ContactInquiry'] == 1): ?>
                                <li class="nav-item">
                                    <a class="nav-link menu-link <?php if(request()->routeIs('Contactinquiry.index')): ?> <?php echo e('active'); ?> <?php endif; ?>"
                                        href="<?php echo e(route('Contactinquiry.index')); ?>">
                                        <i class="fas fa-envelope"></i>
                                        <span data-key="t-dashboards">Contact Inquiry</span>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a class="nav-link menu-link <?php if(request()->routeIs('Announcement.index')): ?> <?php echo e('active'); ?> <?php endif; ?>"
                                        href="<?php echo e(route('Announcement.index')); ?>">
                                        <i class="fas fa-info-circle"></i>
                                        <span data-key="t-dashboards">Announcement</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link menu-link <?php if(request()->routeIs('Activity.index')): ?> <?php echo e('active'); ?> <?php endif; ?>"
                                        href="<?php echo e(route('Activity.index')); ?>">
                                        <i class="text-white" data-feather="activity"></i>
                                        <span data-key="t-dashboards">Activity</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                </li>

                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
<?php /**PATH C:\xampp laravel11\htdocs\live_codes\Evolve Business\resources\views/common/sidebar.blade.php ENDPATH**/ ?>