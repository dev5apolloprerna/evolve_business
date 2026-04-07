@extends('layouts.app')
@section('title', 'One To One List')
@section('content')
    <?php $session = auth()->user(); ?>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                {{-- Alert Messages --}}
                @include('common.alert')
                {{-- start search  --}}
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <form method="post" id="form" action="{{ route('OneToOne.index') }}">
                                @csrf
                                <div class="row align-items-center">

                                    <div class="col-md-2 mb-2">
                                        <div class="d-flex align-items-center">
                                            <select class="form-control" name="business_type" id="business_type">
                                                <option value="">Select Status</option>
                                                <option value="0" {{ $businesstype == '0' ? 'selected' : '' }}>Pending
                                                </option>
                                                <option value="1" {{ $businesstype == '1' ? 'selected' : '' }}>Approved
                                                </option>
                                                <option value="2" {{ $businesstype == '2' ? 'selected' : '' }}>Rejected
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2 mb-2">
                                        <div class="d-flex align-items-center">
                                            <input placeholder="Enter From Date" type="text" class="form-control"
                                                id="startdatepicker" name="fromdate" autocomplete="off"
                                                value="<?= isset($FromDate) ? $FromDate : '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <div class="d-flex align-items-center">
                                            <input placeholder="Enter To Date" type="text" class="form-control "
                                                name="todate" autocomplete="off" id="enddatepicker"
                                                value="<?= isset($ToDate) ? $ToDate : '' ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <div class="d-flex align-items-center ">
                                            <div class="input-group d-flex ">
                                                <input type="submit" id="search" class="btn btn-success mx-2"
                                                    name="search" title="Search" value="Search">
                                                <button type="button" onclick="clearData();"
                                                    class="btn btn-success">Cancel</button>
                                            </div>
                                            <!-- <button class="btn btn-success" type="button" onclick="exportExcel();">
                                                                                                                                                                                                                                                                    <i class="fa-solid fa-file-excel fa-xl"></i>
                                                                                                                                                                                                                                                                </button> -->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- end search --}}
                <div class="col-md-12 mt-3">
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title mb-0" data-anchor="data-anchor">One To One Given
                                    </h5>
                                </div>
                                <div>
                                    <!-- <a href="{{ route('OneToOne.OneToOneReceived') }}" class="btn btn-success">Received Business</a> -->
                                    <a href="{{ route('OneToOne.storeview') }}" class="btn btn-success">Give New
                                        One To One</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane preview-tab-pane active" role="tabpanel"
                                    aria-labelledby="tab-dom-dcc399ed-d1d3-44f8-99e0-31c1d0b7b540"
                                    id="dom-dcc399ed-d1d3-44f8-99e0-31c1d0b7b540">
                                    <div id="tableExample" data-list='{"valueNames":["name","email","age"]}'>
                                        @if ($Count > 0)
                                            <div class="table-responsive scrollbar">
                                                <table class="table table-bordered table-striped fs--1 mb-0">
                                                    <thead class="bg-200 text-900">
                                                        <tr>
                                                            <th width="2%" data-sort="Title">No</th>
                                                            <th width="5%" data-sort="Date">Given To</th>
                                                            <th width="5%" data-sort="Date">Place</th>
                                                            <th width="5%" data-sort="Date">Business date
                                                            </th>
                                                            <th width="5%" data-sort="Date">Comment
                                                            </th>
                                                            <th width="5%" data-sort="Date">Photo
                                                            </th>
                                                            <th width="5%" data-sort="Date">Rejected Comment</th>
                                                            <th width="5%" data-sort="Date">Status</th>
                                                            <th width="5%" data-sort="Action">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="list">
                                                        <?php $i = 1;
                                                        
                                                        ?>
                                                        @foreach ($Business as $Business1)
                                                            <tr>
                                                                <td class="text-center">
                                                                    {{ $i + $Business->perPage() * ($Business->currentPage() - 1) }}
                                                                </td>

                                                                <td class="text-center">{{ $Business1->to }}</td>
                                                                <td class="text-center">{{ $Business1->place }}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ \Carbon\Carbon::parse($Business1->date)->format('d-m-Y') }}
                                                                </td>

                                                                <td class="text-center">
                                                                    {{ $Business1->comment !== null ? $Business1->comment : 'N/A' }}
                                                                </td>
                                                                <td class="text-center">
                                                                    @if (empty($Business1->photo))
                                                                        <img src="{{ asset('assets/images/noimage.png') }}"
                                                                            style="width:50px;height:50px;">
                                                                    @else
                                                                        <img src="{{ asset('OneToOne/' . $Business1->photo) }}"
                                                                            style="width:50px;height:50px;">
                                                                    @endif
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $Business1->reject_comment !== null ? $Business1->reject_comment : 'N/A' }}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $Business1->isapproved_status == 0 ? 'Pending' : ($Business1->isapproved_status == 1 ? 'Approved' : 'Rejected') }}
                                                                </td>

                                                                <td class="text-center">
                                                                    @if ($Business1->isapproved_status == 0)
                                                                        <!-- Check if status is pending -->
                                                                        <a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#EditModal"
                                                                            onclick="getEditData(<?= $Business1->id ?>)"
                                                                            class="" title="Edit">
                                                                            <span class="text-500 fas fa-edit"></span>
                                                                        </a>
                                                                        <a class="" href="#"
                                                                            data-bs-toggle="modal" title="Delete"
                                                                            data-bs-target="#deleteRecordModal"
                                                                            onclick="deleteData(<?= $Business1->id ?>);">
                                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                                        </a>
                                                                    @else
                                                                        N/A
                                                                    @endif
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    </tbody>


                                                </table>

                                            </div>
                                            <div class="d-flex justify-content-center mt-3">
                                                {{ $Business->links() }}
                                            </div>
                                        @else
                                            <div class="row">
                                                <div
                                                    class="col-lg-12 col-md-12  col-xs-12 col-sm-12 padding-5 bottom-border-verydark">
                                                    <div
                                                        class="alert alert-info clearfix profile-information padding-all-10 margin-all-0 backgroundgreen">
                                                        <h1 class="font-white text-center">One To One Yet To Give </h1>
                                                    </div>
                                                </div>
                                            </div>

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="EditModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Edit One To One</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <form method="post" action="{{ route('OneToOne.update') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="modal-body">

                                <input type="hidden" name="id" id="edit_id">

                                <div class="mb-2">
                                    <label>Given To</label>
                                    <select class="form-control" name="oneToone_to" id="edit_to">
                                        @foreach ($Data as $data)
                                            @if ($data->id !== $session->id)
                                                <option value="{{ $data->id }}">
                                                    {{ $data->first_name }} - ({{ $data->mobile_number }})
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-2">
                                    <label>Place</label>
                                    <input type="text" class="form-control" name="place" id="edit_place"
                                        value="">
                                </div>

                                <div class="mb-2">
                                    <label>Comment</label>
                                    <textarea class="form-control" name="comment" id="edit_comment"></textarea>
                                </div>

                                <div class="mb-2">
                                    <label>Date</label>
                                    <input type="date" class="form-control" name="Date" id="edit_date">
                                </div>

                                <div class="mb-2">
                                    <label>Photo</label>
                                    <input type="file" id="photovalidate" class="form-control" name="photo">
                                    <div id="edit_img" style="margin-top:10px;"></div>
                                    <input type="hidden" id="hiddenPhoto" name="hiddenPhoto">
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Update</button>
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
                        <form id="user-delete-form" method="POST" action="{{ route('OneToOne.delete') }}">
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

@endsection

@section('scripts')
    <script>
        function getEditData(id) {

            var url = "{{ route('OneToOne.edit', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'GET',
                success: function(res) {

                    $('#edit_id').val(res.id);
                    $('#edit_place').val(res.place);
                    $('#edit_comment').val(res.comment);
                    $('#edit_date').val(res.date);
                    $('#edit_to').val(res.to_id);
                    $('#hiddenPhoto').val(res.photo);

                    // image show
                    if (res.photo) {
                        $('#edit_img').html(
                            '<img src="/OneToOne/' + res.photo + '" width="80">'
                        );
                    }

                    $('#EditModal').modal('show');
                }
            });
        }
    </script>

    <script>
        function validateFile() {
            var allowedExtension = ['jpeg', 'jpg', 'png',
                'webp'
            ];
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
    {{-- Add photo --}}
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

    {{-- Edit photo --}}
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
    <script>
        function deleteData(id) {
            // alert(id);
            $("#deleteid").val(id);
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
    <script>
        function clearData() {
            window.location.href = "{{ route('OneToOne.index') }}";
        }
    </script>

    <script>
        $(function() {
            $("#Editbusiness_Date").datepicker({
                dateFormat: "yy-mm-dd",
                //minDate: 0
            });
        });
    </script>
@endsection
