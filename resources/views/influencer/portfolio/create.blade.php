@extends('layouts.app')
@section('header', 'Influencer Portfolio')
@section('content')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('warning'))
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong><i class="fa fa-warning ico"></i> {{ $message }}</strong>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Oh snap!</strong> {{ __('There were some problems with your input') }}.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="box-content card">
        <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
            <div class="">
                <h4 class="">Add Influencer Portfolio</h4>
            </div>
            <div class="">
                <a href="{{ route('influencer.portfolio.index') }}" class="btn btn-success btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
            </div>
        </div>
        <div class="card-content">

            <form class="form" id="imageform" method="post" action="{{ route('image.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">

                    <label for="formFile" class="fs-4 form-label">Type :</label>
                    <select class="fs-4 py-1 form-control " id="mediatype" name="type">
                        <option selected disabled>--select Your Option--</option>
                        <option value="Photo">Photo</option>
                        <option value="Video">Video</option>
                    </select>
                    <div class="py-2" style='display:none;' id='Photo'>
                        <label for="formFile" class="fs-4 form-label">Photo :</label>
                        <input type="file" class="fs-4 py-1 form-control" accept="image/*" id="image" name="image1">
                    </div>
                    <div style='display:none;' id='Video'>
                        <label for="formFile" class="fs-4 form-label">Upload Your Video Url :</label>
                        <input type="text" class="fs-4 py-1 form-control" id="image" name="video">
                    </div>
                    <br>
                    <button type="submit" style="background-color: #002e6e; color: white;" class="btn fs-4 my-2" id="submitimage" name="submitimage">Upload</button>
                </div>
            </form>

        </div>
        <!-- /.card-content -->
    </div>
    <script>
        function readURL(input, tgt) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector(tgt).setAttribute("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


    <script>
        $(document).ready(function() {
            $('#mediatype').on('change', function() {
                if (this.value == 'Photo') {
                    $("#Photo").show();
                } else {
                    $("#Photo").hide();
                }
                if (this.value == 'Video') {
                    $("#Video").show();
                } else {
                    $("#Video").hide();
                }
            });
        });
    </script>

@endsection
