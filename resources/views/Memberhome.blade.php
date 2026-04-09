@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')



    <style>
        marquee {

            background: black;

            color: white;

            padding: 6px;

            font-weight: 700;

            background: #61a143 !important;

            font-size: 18px;

        }

        .cust-over {

            height: 564px;

            overflow: auto;

        }

        .user-main-box {
            display: flex;
            align-items: center;
        }

        .user-left {
            width: 180px;
        }

        .user-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #78c046;
        }

        .user-name {
            font-size: 18px;
            font-weight: 600;
        }

        .user-name small {
            font-size: 13px;
            color: #777;
        }

        .user-right {
            flex: 1;
        }

        .info-item {
            font-size: 16px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-item i {
            background: #78c046;
            color: #fff;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .site-social-icons a {
            height: 40px;
            width: 40px;
            margin-right: 8px;
            display: inline-flex;
            border-radius: 50%;
            background: #78c046;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .stf {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .cmp-lg {
            width: 50px;
            border-radius: 50%;
            height: 50px;
        }

        .member-title {
            font-size: 20px;
            font-weight: 700;
            color: #78c046;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: underline;
        }
    </style>

    <!-- ============================================================== -->

    <!-- Start right Content here -->

    <!-- ============================================================== -->

    <div class="main-content">

        {{--  <div style="background-image: url(assets/images/banner1.jpg);height: 550px;">  --}}

        {{--  <img src="{{ asset('assets/images/banner1.jpg') }}" alt="">  --}}

        {{--  </div>  --}}

        <div class="page-content">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-12">

                        @if ($Announcement)
                            <marquee>

                                <ul class=

                         "mb-0">

                                    <li><a href="{{ route('AnnouncementDetail', $Announcement->Announcement_slug) }}"
                                            class="text-white">{{ $Announcement->Title }}</a></li>

                                </ul>

                            </marquee>
                        @endif

                    </div>
                    <div class="col-lg-12">

                        @if ($meetings)
                            <marquee>
                                <ul class="mb-0">
                                    <li>
                                        <a href="#" class="text-white">
                                            {{ \Carbon\Carbon::createFromFormat('d.m.y H:i', $meetings->start_date)->format('d.m.y H:i') }}
                                            To
                                            {{ \Carbon\Carbon::createFromFormat('d.m.y H:i', $meetings->End_date)->format('d.m.y H:i') }}
                                            {{ $meetings->Meeting_title }}
                                        </a>
                                    </li>
                                </ul>
                            </marquee>
                        @endif

                    </div>
                    <div class="col-lg-6 mt-3">

                        <div class="card">

                            <div class="card-header align-items-center d-flex mb-3">

                                <h4 class="card-title mb-0 flex-grow-1">Business Analysis</h4>

                            </div>

                            <div class="h-100 p-3">



                                <!--end row-->

                                <div class="row">

                                    {{-- start given business --}}

                                    <div class="col-xl-6 col-md-6">

                                        <!-- card -->

                                        <div class="card card-animate" style="background: #61a143;">

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
                                                                data-target="{{ $approvecount }}">0</span>

                                                        </h4>

                                                        <a href="{{ route('MemberBusiness.index') }}"
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

                                    {{-- end given business --}}



                                    {{-- start RECEIVED business --}}

                                    <div class="col-xl-6 col-md-6">



                                        <div class="card card-animate" style="background: #61a143;">

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
                                                                data-target="{{ $Received_bussiness }}">0</span>

                                                        </h4>

                                                        <a href="{{ route('MemberBusiness.Received') }}"
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

                                    {{-- end rejected business --}}







                                    {{-- start business refrence --}}

                                    <div class="col-xl-6 col-md-6">

                                        <!-- card -->

                                        <div class="card card-animate" style="background: #61a143;">

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
                                                                data-target="{{ $Reference_Given }}">0</span>

                                                        </h4>

                                                        <a href="{{ route('Reference.index') }}"
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

                                    {{-- end business refrence --}}

                                    {{-- start business refrence Received --}}

                                    <div class="col-xl-6 col-md-6">

                                        <!-- card -->

                                        <div class="card card-animate" style="background: #61a143;">

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
                                                                data-target="{{ $Reference_Received }}">0</span>

                                                        </h4>

                                                        <a href="{{ route('Reference.ReceivedReference') }}"
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



                                    {{-- start pending business --}}

                                    <div class="col-xl-6 col-md-6">

                                        <!-- card -->

                                        <div class="card card-animate" style="background: #61a143;">

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
                                                                data-target="{{ $pending }}">0</span>

                                                        </h4>

                                                        <a href="{{ route('MemberBusiness.index') }}"
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

                                    {{-- end pending business --}}


                                    {{-- One To One Recieve start --}}

                                    {{-- <div class="col-xl-6 col-md-6">

                                        <div class="card card-animate" style="background: #61a143;">

                                            <div class="card-body">

                                                <div class="d-flex align-items-center">

                                                    <div class="flex-grow-1 overflow-hidden">

                                                        <p class="text-uppercase fw-bold text-white-50 text-truncate mb-0">

                                                            One To One Received</p>

                                                    </div>

                                                </div>

                                                <div class="d-flex align-items-end justify-content-between mt-4">

                                                    <div>

                                                        <h4 class="fs-22 fw-bold ff-secondary text-white mb-4">

                                                            <span class="counter-value"
                                                                data-target="{{ $oneTooneReceive }}">0</span>

                                                        </h4>

                                                        <a href="{{ route('MemberOneToOne.index') }}"
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

                                    </div> --}}

                                    {{-- One To One Recieve end --}}

                                    {{-- One To One Given start --}}

                                    <div class="col-xl-6 col-md-6">

                                        <!-- card -->

                                        <div class="card card-animate" style="background: #61a143;">

                                            <div class="card-body">

                                                <div class="d-flex align-items-center">

                                                    <div class="flex-grow-1 overflow-hidden">

                                                        <p class="text-uppercase fw-bold text-white-50 text-truncate mb-0">

                                                            One To One</p>

                                                    </div>

                                                </div>

                                                <div class="d-flex align-items-end justify-content-between mt-4">

                                                    <div>

                                                        <h4 class="fs-22 fw-bold ff-secondary text-white mb-4">

                                                            <span class="counter-value"
                                                                data-target="{{ $oneTooneGiven }}">0</span>

                                                        </h4>

                                                        <a href="{{ route('OneToOne.index') }}"
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

                                    {{-- One To One Given end --}}

                                    {{-- Visitor start --}}

                                    <div class="col-xl-6 col-md-6">

                                        <!-- card -->

                                        <div class="card card-animate" style="background: #61a143;">

                                            <div class="card-body">

                                                <div class="d-flex align-items-center">

                                                    <div class="flex-grow-1 overflow-hidden">

                                                        <p class="text-uppercase fw-bold text-white-50 text-truncate mb-0">

                                                            Visitor</p>

                                                    </div>

                                                </div>

                                                <div class="d-flex align-items-end justify-content-between mt-4">

                                                    <div>

                                                        <h4 class="fs-22 fw-bold ff-secondary text-white mb-4">

                                                            <span class="counter-value"
                                                                data-target="{{ $VisitorCount }}">0</span>

                                                        </h4>

                                                        <a href="{{ route('Visitor.index') }}"
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

                                    {{-- Visitor end --}}


                                </div>

                                {{-- end business refrence Received --}}
                                <!-- Chart Section  start-->
                                <!-- new code  -->
                                <!-- new code ravi end  -->
                                <!-- Chart Section end -->
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6 mt-3" style="height: 1100px">

                        <div class="row" style="height: 300px">
                            <div class="col-12 col-md-6 col-lg-12">
                                <div class="card">
                                    @if ($manOfTheMonth)
                                        <div class="member-title text-center mb-2">
                                            Member of the Last Month
                                        </div>
                                        <div class="card-header stf">
                                            @if ($manOfTheMonth->Company_logo == null)
                                                <img class="cmp-lg" src="https://groath.in/assets/images/users/user1.png"
                                                    alt="No image" class="company-logo">
                                            @else
                                                <img class="cmp-lg"
                                                    src="{{ asset('Company_logo') . '/' . $manOfTheMonth->Company_logo }}"
                                                    alt="No image" class="company-logo">
                                            @endif
                                            <div>
                                                <h6 class="cmp-name text-white text-center mb-0">
                                                    {{ $manOfTheMonth->companyname }}
                                                </h6>
                                                <p class="cmp-name text-white text-center mb-0" style="font-size: 13px;">
                                                    {{ $manOfTheMonth->categories_name ?? '' }}</p>
                                            </div>
                                        </div>

                                        <div class="card-body br1 p-4 mb-2">
                                            <div class="d-flex align-items-center user-main-box">

                                                <!-- LEFT SIDE -->
                                                <div class="user-left text-center">
                                                    @if ($manOfTheMonth->profile_photo == null)
                                                        <img class="user-img"
                                                            src="https://groath.in/assets/images/users/undraw_profile.webp"
                                                            alt="No image">
                                                    @else
                                                        <img class="user-img"
                                                            src="{{ asset('profile_photo') . '/' . $manOfTheMonth->profile_photo }}"
                                                            alt="No image">
                                                    @endif

                                                    <div class="user-name mt-2">
                                                        {{ $manOfTheMonth->Contact_person }} <br>
                                                        <small>{{ $manOfTheMonth->group_name ?? 'No group name' }}</small>
                                                    </div>
                                                </div>

                                                <!-- RIGHT SIDE -->
                                                <div class="user-right ms-4">

                                                    <div class="info-item">
                                                        <i class="fa fa-envelope"></i>
                                                        {{ $manOfTheMonth->email }}
                                                    </div>

                                                    <div class="info-item">
                                                        <i class="fa fa-phone"></i>
                                                        {{ $manOfTheMonth->phonenumber }}
                                                    </div>

                                                    <div class="site-social-icons mt-3">
                                                        @if (isset($manOfTheMonth->phonenumber))
                                                            <a href="https://wa.me/91{{ $manOfTheMonth->phonenumber }}"
                                                                target="_blank">
                                                                <i class="fa-brands fa-whatsapp"></i>
                                                            </a>
                                                        @endif

                                                        @if (isset($manOfTheMonth->facebook_link))
                                                            <a target="_blank"
                                                                href="{{ $manOfTheMonth->facebook_link }}">
                                                                <i class="fa-brands fa-facebook-f"></i>
                                                            </a>
                                                        @endif

                                                        @if (isset($manOfTheMonth->instagram_link))
                                                            <a target="_blank"
                                                                href="{{ $manOfTheMonth->instagram_link }}">
                                                                <i class="fa-brands fa-instagram"></i>
                                                            </a>
                                                        @endif

                                                        @if (isset($manOfTheMonth->youtube_link))
                                                            <a target="_blank" href="{{ $manOfTheMonth->youtube_link }}">
                                                                <i class="fa-brands fa-youtube"></i>
                                                            </a>
                                                        @endif

                                                        @if (isset($manOfTheMonth->linkedin_link))
                                                            <a target="_blank"
                                                                href="{{ $manOfTheMonth->linkedin_link }}">
                                                                <i class="fa-brands fa-linkedin"></i>
                                                            </a>
                                                        @endif

                                                        @if (!empty($manOfTheMonth->google_link) && $manOfTheMonth->google_link !== '-')
                                                            <a target="_blank" href="{{ $manOfTheMonth->google_link }}">
                                                                <i class="fa-brands fa-google-plus-g"></i>
                                                            </a>
                                                        @endif
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    @else
                                        <div class="card-header stf text-center text-white">
                                            No Man of the Month Found
                                        </div>
                                    @endif

                                    {{-- <div class="card" style="height: 300px">

                                            <div class="card-header align-items-center d-flex">

                                                <h4 class="card-title mb-0 flex-grow-1">Your Upcoming Meeting</h4>

                                            </div>

                                            @if ($meetingscount > 0)

                                                <div class="card-body cust-over " style="padding-bottom: 50px !important">

                                                    <ul class="list-group list-group-flush border-dashed">

                                                        @foreach ($meetings as $meeting)
                                                            <li class="list-group-item ps-0">

                                                                <div class="row align-items-center g-3">

                                                                    <div class="col-auto">

                                                                        <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">

                                                                            <div class="text-center">

                                                                                <h5 class="mb-0">

                                                                                    {{ Carbon\Carbon::createFromFormat('d.m.y H:i', $meeting->start_date)->format('d') }}

                                                                                </h5>

                                                                                <div class="text-muted">

                                                                                    {{ Carbon\Carbon::createFromFormat('d.m.y H:i', $meeting->start_date)->format('D') }}

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="col">

                                                                        <h5 class="text-muted mt-0 mb-1 fs-14">

                                                                            {{ Carbon\Carbon::createFromFormat('d.m.y H:i', $meeting->start_date)->format('d.m.y H:i') }}

                                                                            To

                                                                            {{ Carbon\Carbon::createFromFormat('d.m.y H:i', $meeting->End_date)->format('d.m.y H:i') }}

                                                                        </h5>

                                                                        <a href="#"
                                                                            class="text-reset fs-15 mb-0">{{ $meeting->Meeting_title }}</a>

                                                                    </div>

                                                                </div>

                                                            </li>
                                                        @endforeach

                                                    </ul>

                                                    <div
                                                        class="align-items-center justify-content-center mt-2 row g-3 text-center text-sm-start">

                                                        <div class="col-sm-auto">

                                                        </div>

                                                    </div>
                                                @else
                                                    <div class="row">

                                                        <div
                                                            class="col-lg-12 col-md-12  col-xs-12 col-sm-12 padding-5 bottom-border-verydark">

                                                            <div
                                                                class="alert alert-info clearfix profile-information padding-all-10 margin-all-0 backgroundDark">

                                                                <h1 class="font-white text-center"> No Data Found ! </h1>

                                                            </div>

                                                        </div>

                                                    </div>
                                            @endif
                                        </div> --}}



                                </div>

                                <div class="card mb-3" style="height: 600px">

                                    <div class="card-header">

                                        <div class="d-flex justify-content-between align-items-center">

                                            <div>

                                                <h5 class="card-title mb-0" data-anchor="data-anchor">Top 3 Giver Of
                                                    The Month -

                                                    {{ $monthname }}

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

                                                            @if ($topDirectcount > 0)

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



                                                                        @foreach ($topDirect as $index => $receiver)
                                                                            <tr>

                                                                                <td>{{ $index + 1 }}</td>

                                                                                <td>{{ $receiver->business_from }}</td>

                                                                                <td>{{ $receiver->companyname }}</td>

                                                                                <td>{{ $receiver->total_amount }}</td>



                                                                            </tr>
                                                                        @endforeach

                                                                    </tbody><!-- end tbody -->

                                                                </table><!-- end table -->
                                                            @else
                                                                <div class="row">

                                                                    <div
                                                                        class="col-lg-12 col-md-12  col-xs-12 col-sm-12 padding-5 bottom-border-verydark">

                                                                        <div
                                                                            class="alert alert-info clearfix profile-information padding-all-10 margin-all-0 backgroundDark">

                                                                            <h1 class="font-white text-center"> No Data
                                                                                Found !
                                                                            </h1>

                                                                        </div>

                                                                    </div>

                                                                </div>



                                                            @endif

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

                                                            @if ($topReferencecount > 0)

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

                                                                        @foreach ($topReference as $index => $Giver)
                                                                            <tr>

                                                                                <td>{{ $index + 1 }}</td>

                                                                                <td>{{ $Giver->business_from }}</td>

                                                                                <td>{{ $Giver->companyname }}</td>

                                                                                <td>{{ $Giver->total_amount }}</td>

                                                                            </tr>
                                                                        @endforeach

                                                                    </tbody><!-- end tbody -->

                                                                </table><!-- end table -->
                                                            @else
                                                                <div class="row">

                                                                    <div
                                                                        class="col-lg-12 col-md-12  col-xs-12 col-sm-12 padding-5 bottom-border-verydark">

                                                                        <div
                                                                            class="alert alert-info clearfix profile-information padding-all-10 margin-all-0 backgroundDark">

                                                                            <h1 class="font-white text-center"> No Data
                                                                                Found !
                                                                            </h1>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            @endif

                                                        </div><!-- end table responsive -->

                                                    </div><!-- end card body -->

                                                </div><!-- end card -->

                                            </div>

                                            {{-- connection given start --}}

                                            <div class="col-xl-12">

                                                <div class="card">

                                                    <div class="card-header align-items-center d-flex">

                                                        <h4 class="card-title mb-0 flex-grow-1">Connection Given</h4>

                                                    </div><!-- end card header -->

                                                    <div class="card-body">

                                                        <div class="table-responsive table-card">

                                                            @if ($TopReferenceGivers > 0)

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

                                                                        @foreach ($Top_Reference_Givers as $index => $Giver)
                                                                            <tr>

                                                                                <td>{{ $index + 1 }}</td>

                                                                                <td>{{ $Giver->Contact_person }}</td>

                                                                                <td>{{ $Giver->companyname }}</td>

                                                                                <td>{{ $Giver->total_references }}</td>

                                                                            </tr>
                                                                        @endforeach

                                                                    </tbody><!-- end tbody -->

                                                                </table><!-- end table -->
                                                            @else
                                                                <div class="row">

                                                                    <div
                                                                        class="col-lg-12 col-md-12  col-xs-12 col-sm-12 padding-5 bottom-border-verydark">

                                                                        <div
                                                                            class="alert alert-info clearfix profile-information padding-all-10 margin-all-0 backgroundDark">

                                                                            <h1 class="font-white text-center"> No Data
                                                                                Found !
                                                                            </h1>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            @endif

                                                        </div><!-- end table responsive -->

                                                    </div><!-- end card body -->

                                                </div><!-- end card -->

                                            </div>

                                            {{-- connection given end --}}



                                        </div>



                                        <!--Business Reciver And Giver -->

                                    </div>

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
                        </script> © {{ env('APP_NAME') }}.

                    </div>





                </div>

            </div>

        </footer>

    </div>

    <!-- end main content-->





@endsection



@section('scripts')

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

                        color: "#61a143",

                        dataPoints: [

                            @foreach ($formatted_combined_data as $data)

                                {

                                    label: "{{ $data['month'] ?? 'Unknown' }}",

                                    y: {{ $data['total_given'] ?? 0 }}

                                },
                            @endforeach

                        ]

                    },

                    {

                        type: "column",

                        name: "Total Given Reference Business",

                        legendText: "Total Given Reference Business",

                        showInLegend: true,

                        color: "#59bda4",

                        dataPoints: [

                            @foreach ($formatted_combined_data as $data)

                                {

                                    label: "{{ $data['month'] ?? 'Unknown' }}",

                                    y: {{ $data['total_received'] ?? 0 }}

                                },
                            @endforeach

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

                        color: "#61a143",

                        dataPoints: [

                            @foreach ($to_formatted_combined_data as $data)

                                {

                                    label: "{{ $data['month'] ?? 'Unknown' }}",

                                    y: {{ $data['total_given'] ?? 0 }}

                                },
                            @endforeach

                        ]

                    },

                    {

                        type: "column",

                        name: "Total Received Reference Business",

                        legendText: "Total Received Reference Business",

                        showInLegend: true,

                        color: "#59bda4",

                        dataPoints: [

                            @foreach ($to_formatted_combined_data as $data)

                                {

                                    label: "{{ $data['month'] ?? 'Unknown' }}",

                                    y: {{ $data['total_received'] ?? 0 }}

                                },
                            @endforeach

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
@endsection
