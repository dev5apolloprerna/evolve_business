@extends('layouts.app')
@section('title', 'One To One List')
@section('content')
    <?php $session = auth()->user(); ?>

    <div class="main-content ">
        <div class="page-content">
            <div class="container-fluid">

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <li class="mb-5" style="color:red">{{ $error }}</li>
                    @endforeach
                @endif

                {{-- Alert Messages --}}
                @include('common.alert')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0"> Add One To One</h5>
                            </div>
                            <div class="card-body">
                                <div class="live-preview">
                                    <!-- <form action="{{ route('OneToOne.create') }}" method="post"
                                                                                                                                                                                                                            enctype="multipart/form-data"> -->
                                    <form id="oneTooneForm" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row gy-3 mb-3">

                                            <!-- this same user name not select code start -->
                                            <div class="col-lg-4 col-md-6">
                                                <label for="oneToone_to"><span style="color:red;">*</span>Done With</label>
                                                <select class="form-control" data-choices name="oneToone_to"
                                                    id="choices-single-default">
                                                    <option value="" disabled selected>Select Done With</option>
                                                    @foreach ($Data as $data)
                                                        @if ($data->id !== $session->id)
                                                            <option value="{{ $data->id }}">{{ $data->first_name }} -
                                                                ({{ $data->mobile_number }})
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- this same user name not select code end -->
                                            <div class="col-lg-4 col-md-6">
                                                <label for="Place"><span style="color:red;">*</span>Place</label>
                                                <input type="text" class="form-control" name="place" id="place"
                                                    placeholder="Enter Place" value="{{ old('place') }}" required>
                                            </div>

                                            <div class="col-lg-4 col-md-6">
                                                <span style="color:red;">*</span> Comment
                                                <textarea class="form-control" name="comment" id="comment" placeholder="Enter Comment" required></textarea>
                                            </div>

                                            <div class="col-lg-4 col-md-6">
                                                <label for="photo"><span style="color:red;">*</span>photo</label>
                                                <input type="file" class="form-control" name="photo" id="photovalidate"
                                                    placeholder="Enter photo" value="{{ old('photo') }}" required>

                                                <div id="viewimg" style="margin-top:10px;"></div>

                                            </div>

                                            <div class="col-lg-4 col-md-6">
                                                <span style="color:red;">*</span>date
                                                <input type="text" class="form-control" name="Date"
                                                    id="startdatepicker" placeholder="Enter Date" required>
                                            </div>

                                            <div class="text-center">
                                                <button type="button" class="btn btn-success btn-user"
                                                    style="width: 85px; height: 40px;"
                                                    onclick="submitForm()">Submit</button>
                                                <button type="button" class="btn btn-danger btn-user" style="width: 85px;"
                                                    onclick="cancelForm()">Cancel</button>
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
@endsection

@section('scripts')
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
            var input = this;

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#viewimg').html(
                        '<img src="' + e.target.result +
                        '" width="100" height="100" style="border:1px solid #ccc; padding:5px;">'
                    );
                };

                reader.readAsDataURL(input.files[0]);
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
            $("#startdatepicker").datepicker({
                dateFormat: "yy-mm-dd",
                //minDate: 0
            });

            $("#enddatepicker").datepicker({
                dateFormat: "yy-mm-dd",
                //minDate: 0
            });
        });
    </script>

    <script>
        function submitForm() {
            if (confirm("Are you sure you want to submit the business?")) {
                var formData = new FormData(document.getElementById('oneTooneForm'));
                $.ajax({
                    url: "{{ route('OneToOne.create') }}",
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        alert('Business Created Successfully.');
                        window.location.href = "{{ route('OneToOne.index') }}";
                    },
                    error: function(xhr) {
                        alert('An error occurred while submitting the form.');
                        console.log(xhr.responseText);
                    }
                });
            }
        }
    </script>

@endsection
