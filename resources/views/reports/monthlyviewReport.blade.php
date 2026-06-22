@extends('layouts.app')

@section('title', 'Monthly View Report')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                {{-- Alert Messages --}}
                @include('common.alert')
                <div class="row">
                    <div class="col-12">

                    </div>
                </div>


                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Monthly View Report</h5>
                            </div>
                            <div class="card-body">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>City Group</th>
                                            <th>Member Of The Month</th>
                                            <th>Total Points</th>
                                            <th>Highest Direct Business</th>
                                            <th>Direct Amount</th>
                                            <th>Highest Reference Business</th>
                                            <th>Reference Amount</th>
                                            <th>Top One To One</th>
                                            <th>Total Meetings</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reportData as $row)
                                            <tr>
                                                <td>{{ $row['city_group'] }}</td>

                                                <td>
                                                    {{ $row['member_of_the_month']->Contact_person ?? '-' }}
                                                    <br>
                                                    <small>{{ $row['member_of_the_month']->companyname ?? '' }}</small>
                                                </td>

                                                <td>
                                                    {{ $row['member_of_the_month']->total_points ?? 0 }}
                                                </td>

                                                <td>
                                                    {{ $row['top_direct_business']->member_name ?? '-' }}
                                                </td>

                                                <td>
                                                    ₹{{ number_format($row['top_direct_business']->total_amount ?? 0, 2) }}
                                                </td>

                                                <td>
                                                    {{ $row['top_reference_business']->member_name ?? '-' }}
                                                </td>

                                                <td>
                                                    ₹{{ number_format($row['top_reference_business']->total_amount ?? 0, 2) }}
                                                </td>

                                                <td>
                                                    {{ $row['top_one_to_one']->member_name ?? '-' }}
                                                </td>

                                                <td>
                                                    {{ $row['top_one_to_one']->total_meetings ?? 0 }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{-- <div class="d-flex justify-content-center mt-3">
                                    {{ $reportData->links() }}
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
            @section('scripts')
            @endsection
