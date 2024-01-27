@extends('layouts.app')

@section('header', 'Influencer Profile')
@section('content')

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
    <div class="row">
        <div class="col-md-3" style="padding-top: 15px; padding-left: 50px;">
            @if ($profile->profile->profilePhoto)
                <img class="img-thumbnail" style="border-radius: 50%; height: 150px; width: 150px;" src="{{ asset('profile') }}/{{ $profile->profile->profilePhoto }}" alt="image"><br> <br>
            @else
                <img class="img-thumbnail" style="border-radius: 50%; height: 150px; width: 150px;" src="{{ url('asset/img/defaultImage.jpg') }}" alt="image"><br> <br>
            @endif
            <div style="padding-left: 20px;">
                <a class="btn btn-success btn-sm" href="{{ route('influencer.profile.edit') }}/{{ $profile->id }}" style="background-color: #002E6E; color:white; border-radius: 20px;">Edit Profile</a>
            </div>
        </div>
        <div class="col-md-7" style="padding-top: 20px; ">
            <div class="box-content card" style="border-radius: 10px; border-left: 2px solid;">

                <!-- /.dropdown js__dropdown -->
                <div class="card-content">
                    <div class="d-flex justify-content-center" style="margin-top: 15px;">
                        <h2>{{ $profile->profile->name }}</h2>
                        <h5>{{ $profile->profile->email }}</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <span>Address</span>
                            </div>
                            <div class="col-md-3">
                                <h5>{{ $profile->address }}</h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <span>Category</span>
                            </div>
                            <div class="col-md-3">
                                @if (isset($profile->category->name))
                                    <h5>{{ $profile->category->name }}</h5>
                                @else
                                    <h5>-</h5>
                                @endif
                            </div>
                        </div>
                        <hr>

                    </div>
                </div>
                <!-- /.card-content -->
            </div>
        </div>
    </div>



@endsection
