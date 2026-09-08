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
                                <h5 class="card-title mb-0">One To One</h5>
                            </div>
                            <div class="card-body">
                                <div class="live-preview">
                                    <!-- <form action="{{ route('OneToOne.create') }}" method="post"
                                                                                                                                                                                                                                                                                                                                                                                                                                enctype="multipart/form-data"> -->
                                    <form id="oneTooneForm" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row gy-3 mb-3">
                                            <div class="col-lg-4 col-md-6">Glimpscs about Personal and Business
                                                Background
                                                <textarea class="form-control" name="to_question_1" id="to_question_1"></textarea>
                                            </div>

                                            <div class="col-lg-4 col-md-6">Best Products and/or Service
                                                <textarea class="form-control" name="to_question_2" id="to_question_2"></textarea>
                                            </div>

                                            <div class="col-lg-4 col-md-6">Top 5 Clients
                                                <textarea class="form-control" name="to_question_3" id="to_question_3"></textarea>
                                            </div>

                                            <div class="col-lg-4 col-md-6">Looking to Connect with
                                                <textarea class="form-control" name="to_question_4" id="to_question_4"></textarea>
                                            </div>

                                            <div class="col-lg-4 col-md-6">Best Testimonial Received till date
                                                <textarea class="form-control" name="to_question_5" id="to_question_5"></textarea>
                                            </div>

                                            <div class="col-lg-4 col-md-6">My Dream Client
                                                <textarea class="form-control" name="to_question_6" id="to_question_6"></textarea>
                                            </div>
                                            <div class="col-lg-4 col-md-6">Future Plans
                                                <textarea class="form-control" name="to_question_7" id="to_question_7"></textarea>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                            </div>
                                            <p>My commitment to help you and your business</p>
                                            <div class="col-lg-4 col-md-6">I can help you with
                                                <textarea class="form-control" name="to_question_8" id="to_question_8"></textarea>
                                            </div>
                                            <div class="col-lg-4 col-md-6">I will connect you with
                                                <textarea class="form-control" name="to_question_9" id="to_question_9"></textarea>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <label class="form-label d-block">
                                                    I will give business to you, worth
                                                    <input type="text" name="to_business_worth"
                                                        class="border-0 border-bottom mx-2" style="width:120px;">

                                                    till

                                                    <input type="text" name="to_business_till"
                                                        class="border-0 border-bottom mx-2" style="width:180px;">
                                                </label>
                                            </div>

                                            {{-- <div class="col-lg-4 col-md-6">
                                                <label for="photo"><span style="color:red;">*</span>photo</label>
                                                <input type="file" class="form-control" name="photo" id="photovalidate"
                                                    placeholder="Enter photo" value="{{ old('photo') }}" required>
                                                <div id="viewimg" style="margin-top:10px;"></div>
                                            </div> --}}

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
            if (confirm("Are you sure you want to submit the OneToOne?")) {
                var formData = new FormData(document.getElementById('oneTooneForm'));
                $.ajax({
                    url: "{{ route('OneToOne.Tocreate') }}",
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        alert('Question Add Successfully.');
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
