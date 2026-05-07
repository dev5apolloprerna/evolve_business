@extends('layouts.app')
@section('title', 'Pending List')
@section('content')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                {{-- Alert Messages --}}
                @include('common.alert')
                @if ($Business->count() > 0)
                    <div class="col-md-12 mt-3">
                        <div class="card mb-3">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title mb-0" data-anchor="data-anchor">Pending Business List
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane preview-tab-pane active" role="tabpanel"
                                        aria-labelledby="tab-dom-dcc399ed-d1d3-44f8-99e0-31c1d0b7b540"
                                        id="dom-dcc399ed-d1d3-44f8-99e0-31c1d0b7b540">
                                        <div id="tableExample" data-list='{"valueNames":["name","email","age"]}'>

                                            <table class="table table-bordered table-striped fs--1 mb-0">
                                                <thead class="bg-200 text-900">
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scop="col">Business Type</th>
                                                        <th scop="col">Given By</th>
                                                        <!-- <th width="5%" class="sort" data-sort="Date">Given To</th> -->
                                                        <th scop="col">Amount</th>
                                                        <th scop="col">Business date
                                                        </th>
                                                        <th scop="col">Status</th>
                                                        <!-- <th width="5%" class="sort" data-sort="Date">Available seats
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </th> -->
                                                        <th w scop="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    <?php $i = 1; ?>
                                                    @foreach ($Business as $Business1)
                                                        <tr>
                                                            <td class="text-center">
                                                                {{ $i + $Business->perPage() * ($Business->currentPage() - 1) }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ $Business1->business_type == 1 ? 'Direct' : 'Reference' }}
                                                            </td>
                                                            <td class="text-center">{{ $Business1->business_from }}</td>
                                                            <!-- <td class="text-center">{{ $Business1->business_to }}</td> -->
                                                            <td class="text-center">{{ $Business1->Business_amount }}</td>
                                                            <td class="text-center">
                                                                {{ \Carbon\Carbon::parse($Business1->business_Date)->format('d-m-Y') }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ $Business1->isapproved_status == 0 ? 'Pending' : '' }}
                                                            </td>

                                                            <td>
                                                                <!-- <a href="#" data-bs-toggle="modal"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    data-bs-target="#EditModal"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    onclick="getEditData(<?= $Business1->business_id ?>)"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    class="btn btn-link p-0" title="Edit">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <span class="text-500 fas fa-edit"></span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <a class="btn btn-link p-0" href="#"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    data-bs-toggle="modal" title="Delete"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    data-bs-target="#deleteRecordModal"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    onclick="deleteData(<?= $Business1->business_id ?>);">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </a> -->
                                                                <a class="" href="#" data-bs-toggle="modal"
                                                                    title="Status Changed" data-bs-target="#statusModal"
                                                                    onclick="getEditDatastatus(<?= $Business1->business_id ?>);">
                                                                    <i class="fas fa-plus-square" aria-hidden="true"></i>
                                                                </a>

                                                            </td>
                                                        </tr>
                                                        <?php $i++; ?>
                                                    @endforeach
                                                </tbody>

                                            </table>

                                            <div class="d-flex justify-content-center mt-3">
                                                {{ $Business->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- one to one  --}}
                @if ($OneToOne->count() > 0)
                    <div class="col-md-12 mt-3">
                        <div class="card mb-3">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title mb-0" data-anchor="data-anchor">Pending One To One List
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane preview-tab-pane active" role="tabpanel"
                                        aria-labelledby="tab-dom-dcc399ed-d1d3-44f8-99e0-31c1d0b7b540"
                                        id="dom-dcc399ed-d1d3-44f8-99e0-31c1d0b7b540">
                                        <div id="tableExample" data-list='{"valueNames":["name","email","age"]}'>

                                            <table class="table table-bordered table-striped fs--1 mb-0">
                                                <thead class="bg-200 text-900">
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scop="col">Given By</th>
                                                        <th scop="col">date</th>
                                                        <th scop="col">Status</th>
                                                        <th w scop="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    <?php $i = 1; ?>
                                                    @foreach ($OneToOne as $One)
                                                        <tr>
                                                            <td class="text-center">
                                                                {{ $i + $OneToOne->perPage() * ($OneToOne->currentPage() - 1) }}
                                                            </td>
                                                            <td class="text-center">{{ $One->from }}</td>


                                                            <td class="text-center">
                                                                {{ \Carbon\Carbon::parse($One->date)->format('d-m-Y') }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ $One->isapproved_status == 0 ? 'Pending' : '' }}
                                                            </td>

                                                            <td>
                                                                <a class="" href="#" data-bs-toggle="modal"
                                                                    title="Status Changed"
                                                                    data-bs-target="#OneToOnestatusModal"
                                                                    onclick="getEditOneDatastatus(<?= $One->id ?>);">
                                                                    <i class="fas fa-plus-square" aria-hidden="true"></i>
                                                                </a>

                                                            </td>
                                                        </tr>
                                                        <?php $i++; ?>
                                                    @endforeach
                                                </tbody>

                                            </table>

                                            <div class="d-flex justify-content-center mt-3">
                                                {{ $OneToOne->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Event list --}}
                @if ($Events->count() > 0)
                    <div class="col-md-12 mt-3">
                        <div class="card mb-3">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title mb-0" data-anchor="data-anchor">Event List
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane preview-tab-pane active" role="tabpanel"
                                        aria-labelledby="tab-dom-dcc399ed-d1d3-44f8-99e0-31c1d0b7b540"
                                        id="dom-dcc399ed-d1d3-44f8-99e0-31c1d0b7b540">
                                        <div id="tableExample" data-list='{"valueNames":["name","email","age"]}'>

                                            <table class="table table-bordered table-striped fs--1 mb-0">
                                                <thead class="bg-200 text-900">
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scop="col">Events Name</th>
                                                        <th scop="col">Events Date</th>
                                                        <th scop="col">Events Start Time</th>
                                                        <th scop="col">Events End Time</th>
                                                        <th scop="col">Events Type</th>
                                                        <th w scop="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    <?php $i = 1; ?>
                                                    @foreach ($Events as $Event)
                                                        <tr>
                                                            <td class="text-center">
                                                                {{ $i + $Events->perPage() * ($Events->currentPage() - 1) }}
                                                            </td>
                                                            <td class="text-center">{{ $Event->name }}</td>
                                                            <td class="text-center">
                                                                {{ \Carbon\Carbon::parse($Event->eventstart_date)->format('d-m-Y') }}
                                                            </td>
                                                            <td class="text-center">{{ $Event->eventstart_time }}</td>
                                                            <td class="text-center">{{ $Event->eventend_time }}</td>
                                                            <td class="text-center">
                                                                {{ $Event->event_type == 1 ? 'ESP' : 'Training' }}
                                                            </td>

                                                            <td>
                                                                <a class="" href="#" data-bs-toggle="modal"
                                                                    title="Status Changed"
                                                                    data-bs-target="#EventstatusModal"
                                                                    onclick="getEventstatus(<?= $Event->event_id ?>);">
                                                                    <i class="fas fa-plus-square" aria-hidden="true"></i>
                                                                </a>

                                                            </td>
                                                        </tr>
                                                        <?php $i++; ?>
                                                    @endforeach
                                                </tbody>

                                            </table>

                                            <div class="d-flex justify-content-center mt-3">
                                                {{ $Events->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($Member_metting->count() > 0)
                    <div class="col-md-12 mt-3">
                        <div class="card mb-3">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title mb-0" data-anchor="data-anchor">Member Brand Show Case List
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane preview-tab-pane active" role="tabpanel"
                                        aria-labelledby="tab-dom-dcc399ed-d1d3-44f8-99e0-31c1d0b7b540"
                                        id="dom-dcc399ed-d1d3-44f8-99e0-31c1d0b7b540">
                                        <div id="tableExample" data-list='{"valueNames":["name","email","age"]}'>

                                            <table class="table table-bordered table-striped fs--1 mb-0">
                                                <thead class="bg-200 text-900">
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scop="col">Member Name</th>
                                                        <th scop="col">BrandShowCase Amount 1</th>
                                                        <th scop="col">BrandShowCase Amount 2</th>
                                                        <th w scop="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    <?php $i = 1; ?>
                                                    @foreach ($Member_metting as $Member_met)
                                                        <tr>
                                                            <td class="text-center">
                                                                {{ $i + $Member_metting->perPage() * ($Member_metting->currentPage() - 1) }}
                                                            </td>
                                                            <td class="text-center">{{ $Member_met->name }}</td>

                                                            <td class="text-center">
                                                                {{ $Member_met->brand_showcase_1_amount }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ $Member_met->brand_showcase_2_amount }}</td>

                                                            <td>
                                                                <a class="" href="#" data-bs-toggle="modal"
                                                                    title="Status Changed"
                                                                    data-bs-target="#BrandShowcasestatusModal"
                                                                    onclick="getBrandShowcasestatus(<?= $Member_met->id ?>);">
                                                                    <i class="fas fa-plus-square" aria-hidden="true"></i>
                                                                </a>

                                                            </td>
                                                        </tr>
                                                        <?php $i++; ?>
                                                    @endforeach
                                                </tbody>

                                            </table>

                                            <div class="d-flex justify-content-center mt-3">
                                                {{ $Events->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>

            <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog " style="background-color: white;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Business</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </button>
                        </div>
                        <form method="post" action="{{ route('Business.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="modal-body">

                                <input type="hidden" name="business_id" id="business_id" value="">

                                <div class="row">
                                    <div class="md-3">
                                        <label for="business_from_id"><span style="color:red;">*</span>Business
                                            Type</label>
                                        <select class="form-control" name="business_type" id="Editbusiness_type"
                                            value="{{ old('business_type') }}" required>
                                            <option value="1">Direct</option>
                                            <option value="2">Reference</option>
                                        </select>
                                    </div>
                                    <div class="md-3">
                                        <label for="business_from_id"><span style="color:red;">*</span>Given By</label>
                                        <select class="form-control" name="business_from" id="Editbusiness_from"
                                            required>
                                            <option value="" selected>Select Given By</option>
                                            @foreach ($Data as $data)
                                                <option value="{{ $data->first_name }}">{{ $data->first_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="md-3">
                                        <label for="business_to_id"><span style="color:red;">*</span>Given To</label>
                                        <select class="form-control" name="business_to" id="Editbusiness_to" required>
                                            <option value="" disabled selected>Select Given By</option>
                                            @foreach ($Data as $data)
                                                <option value="{{ $data->first_name }}">{{ $data->first_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="md-3">
                                        <span style="color:red;">*</span>Amount
                                        <input type="number" class="form-control" name="Business_amount"
                                            id="EditBusiness_amount" placeholder="Enter Business_amount"
                                            value="{{ old('Business_amount') }}" required>
                                    </div>
                                    <div class="md-3">
                                        <span style="color:red;">*</span> Business date
                                        <input type="date" class="form-control" name="business_Date"
                                            id="Editbusiness_Date" placeholder="Enter business Date" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-success">

                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
                        <a class="btn btn-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('user-delete-form').submit();">
                            Yes,
                            Delete It!
                        </a>
                        <form id="user-delete-form" method="POST" action="{{ route('Business.delete') }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" id="deleteid" value="">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Delete modal End -->
    {{-- @endforeach --}}

    {{-- model rejectedcomments --}}

    <!-- Status Modal -->
    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel"
        aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Change Status
                        Comments</h5>
                    <button type="button" class="btn btn-light" onclick="$('#statusModal').modal('hide')">
                        Close
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add a form for changing status and adding rejected comments -->
                    <form action="{{ route('pendinglogincheck.statuspendinglogin') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="Businessid" value="">
                        <div class="form-group">
                            <label for="newStatus">Update Status:</label>
                            {{-- {{dd($data)}} --}}
                            @if (isset($Business1->isapproved_status))
                                <!-- <select class="form-control" name="newStatus">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <option value="1" {{ $Business1->isapproved_status == 1 ? 'selected' : '' }}>Approved
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <option value="0" {{ $Business1->isapproved_status == 0 ? 'selected' : '' }}>Rejected</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </select> -->

                                <select class="form-control" name="newStatus" id="newStatus"
                                    onchange="toggleRejectedComments()">
                                    <option value="1" {{ $Business1->isapproved_status == 1 ? 'selected' : '' }}>
                                        Approved</option>
                                    <option value="2" {{ $Business1->isapproved_status == 2 ? 'selected' : '' }}>
                                        Rejected</option>
                                </select>
                            @else
                                <select class="form-control" name="newStatus">
                                    <option value="1">Approved</option>
                                    <option value="0">Pending</option>
                                </select>
                            @endif
                        </div>
                        <div class="form-group rejectedComments" id="rejectedComments" style="display : none;">
                            <label for="rejectedComments">Rejected Comments:</label>
                            <textarea class="form-control" name="businesscomment"></textarea>
                        </div>


                        <button type="submit" class="btn btn-success" style="margin-top: 20px;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- One To One Status Modal -->
    <div class="modal fade" id="OneToOnestatusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel"
        aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Change Status
                        Comments</h5>
                    <button type="button" class="btn btn-light" onclick="$('#OneToOnestatusModal').modal('hide')">
                        Close
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add a form for changing status and adding rejected comments -->
                    <form action="{{ route('pendinglogincheck.onestatuspendinglogin') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="OneToOneid" value="">
                        <div class="form-group">
                            <label for="newStatus">Update Status:</label>
                            @if (isset($One->isapproved_status))
                                <select class="form-control" name="newStatus" id="oneToOnenewStatus"
                                    onchange="toggleoneRejectedComments()">
                                    <option value="1" {{ $One->isapproved_status == 1 ? 'selected' : '' }}>
                                        Approved</option>
                                    <option value="2" {{ $One->isapproved_status == 2 ? 'selected' : '' }}>
                                        Rejected</option>
                                </select>
                            @else
                                <select class="form-control" name="newStatus">
                                    <option value="1">Approved</option>
                                    <option value="0">Pending</option>
                                </select>
                            @endif
                        </div>
                        <div class="form-group rejectedoneComments" id="rejectedoneComments" style="display : none;">
                            <label for="rejectedComments">Rejected Comments:</label>
                            <textarea class="form-control" name="businesscomment"></textarea>
                        </div>


                        <button type="submit" class="btn btn-success" style="margin-top: 20px;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Event join -->
    <div class="modal fade" id="EventstatusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel"
        aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Change Event Status
                    </h5>
                    <button type="button" class="btn btn-light" onclick="$('#EventstatusModal').modal('hide')">
                        Close
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add a form for changing status and adding rejected comments -->
                    <form action="{{ route('pendinglogincheck.Eventpendinglogin') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="Eventid" value="">
                        <div class="form-group">
                            <label for="newStatus">Update Status:</label>
                            @if (isset($Event->isapproved_status))
                                <select class="form-control" name="newStatus" id="EventenewStatus">
                                    <option value="1" {{ $Event->isapproved_status == 1 ? 'selected' : '' }}>
                                        Join</option>
                                    <option value="2" {{ $Event->isapproved_status == 2 ? 'selected' : '' }}>
                                        Not Join</option>
                                </select>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-success" style="margin-top: 20px;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- mode end rejectedcomments --}}

    <!-- BrandShowcase join -->
    <div class="modal fade" id="BrandShowcasestatusModal" tabindex="-1" role="dialog"
        aria-labelledby="statusModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Change Brand Show Case Status
                    </h5>
                    <button type="button" class="btn btn-light" onclick="$('#BrandShowcasestatusModal').modal('hide')">
                        Close
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add a form for changing status and adding rejected comments -->
                    <form action="{{ route('pendinglogincheck.Brandshowcaselogincheck') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="BrandShowcaseid" value="">
                        <div class="form-group">
                            <label for="newStatus">Update Status:</label>
                            @if (isset($Member_met->is_approve))
                                <select class="form-control" name="newStatus" id="BrandShowcasenewStatus">
                                    <option value="1" {{ $Member_met->is_approve == 1 ? 'selected' : '' }}>
                                        Approve</option>
                                    <option value="2" {{ $Member_met->is_approve == 2 ? 'selected' : '' }}>
                                        Reject</option>
                                </select>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-success" style="margin-top: 20px;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        function toggleRejectedComments() {
            let newStatus = $("#newStatus").val();
            if (newStatus == 2) {
                $("#rejectedComments").show();
            } else {
                $("#rejectedComments").hide();
            }

            var statusSelect = document.getElementById('newStatus');
            var rejectedComments = document.querySelector('.form-group.rejectedComments');

            // Hide rejectedComments by default
            rejectedComments.style.display = 'none';

            if (statusSelect.value == 2) {
                rejectedComments.style.display = 'block';
            }
        }
    </script>

    <script>
        function toggleoneRejectedComments() {
            let newStatus = $("#oneToOnenewStatus").val();
            if (newStatus == 2) {
                $("#rejectedoneComments").show();
            } else {
                $("#rejectedoneComments").hide();
            }

            var statusSelect = document.getElementById('oneToOnenewStatus');
            var rejectedComments = document.querySelector('.form-group.rejectedoneComments');

            // Hide rejectedComments by default
            rejectedComments.style.display = 'none';

            if (statusSelect.value == 2) {
                rejectedComments.style.display = 'block';
            }
        }
    </script>

    <script>
        function getEditDatastatus(id) {
            // alert(id);
            var url = "{{ route('Business.statusget', ':id') }}";
            url = url.replace(":id", id);
            if (id) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id,
                        id
                    },
                    success: function(data) {
                        console.log(data);
                        var obj = JSON.parse(data);
                        $('#business_id').val(id);
                        $("#isapproved_status").val(obj.isapproved_status);
                        // $("#Editbusiness_from").val(obj.business_from);
                        // $("#Editbusiness_to").val(obj.business_to);
                        // $("#EditBusiness_amount").val(obj.Business_amount);
                        // $("#Editbusiness_Date").val(obj.business_Date);
                    }
                });
            }
            var name = $('#Businessid').val(id);

        }
    </script>

    <script>
        function getEditOneDatastatus(id) {
            // alert(id);
            var url = "{{ route('Business.statusonetooneget', ':id') }}";
            url = url.replace(":id", id);
            if (id) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id,
                        id
                    },
                    success: function(data) {
                        console.log(data);
                        var obj = JSON.parse(data);
                        $('#OneToOneid').val(id);
                        $("#isapproved_status").val(obj.isapproved_status);
                    }
                });
            }
            var name = $('#OneToOneid').val(id);

        }
    </script>

    <script>
        function getEventstatus(id) {
            // alert(id);
            var url = "{{ route('Business.statusEventget', ':id') }}";
            url = url.replace(":id", id);
            if (id) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id,
                        id
                    },
                    success: function(data) {
                        console.log(data);
                        var obj = JSON.parse(data);
                        $('#Eventid').val(id);
                        $("#EventenewStatus").val(obj.isapproved_status);
                    }
                });
            }
            var name = $('#Eventid').val(id);

        }
    </script>

    <script>
        function getBrandShowcasestatus(id) {
            // alert(id);
            var url = "{{ route('Business.statusBrandshowcase', ':id') }}";
            url = url.replace(":id", id);
            if (id) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id,
                        id
                    },
                    success: function(data) {
                        console.log(data);
                        var obj = JSON.parse(data);
                        $('#BrandShowcaseid').val(id);
                        $("#BrandShowcasenewStatus").val(obj.is_approve);
                    }
                });
            }
            var name = $('#BrandShowcaseid').val(id);

        }
    </script>

    <script>
        function exportExcel() {
            // alert('hello');
            var fromdate = $("#startdatepicker").val();
            var todate = $("#enddatepicker").val();
            // var first_name = $("#first_name").val();

            var strURL = "{{ route('Business.exportbusiness') }}";
            strURL += "/" + fromdate + "/" + todate;

            window.location.href = strURL;
        }
    </script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
        $(function() {
            $("#startdatepicker").datepicker({
                dateFormat: 'd-m-yy',
                //minDate: 0
            });

            $("#enddatepicker").datepicker({
                dateFormat: 'd-m-yy',
                //minDate: 0
            });
        });
    </script>
@endsection
