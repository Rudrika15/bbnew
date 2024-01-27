@extends('layouts.app')

<style>
    .cards {
        margin: 10px;
        padding: 10px;
        background-color: white;
        border-radius: 10px;
        border: 1px solid rgba(00, 00, 00, 0.2);
    }
</style>

@section('header', 'Influencer Detail')
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


    <div style="display: flex; justify-content: end;">
        <a href="{{ route('influencer.list') }}" class="btn btn-success btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
    </div>


    <div class="card-content">
        <div class="container-fluid">
            <div class="cards " style="width: 100%;">

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-3">

                            <div class="text-center">
                                @if ($profile->profile->profilePhoto)
                                    <img class="img-thumbnail" style="border-radius: 50%; height: 150px; width: 150px;" src="{{ asset('profile') }}/{{ $profile->profile->profilePhoto }}" alt="image">
                                @else
                                    <img class="img-thumbnail" style="border-radius: 50%; height: 150px; width: 150px;" src="{{ url('asset/img/defaultImage.jpg') }}" alt="image"><br> <br>
                                @endif

                                <h4 class="" style="padding-left: 20px; text-transform: uppercase">
                                    <b>{{ $profile->profile->name }}</b>
                                    @if ($profile->is_brandBeansVerified == 'on')
                                        <i class="menu-icon fa fa-check-circle text-white" style="margin-left: 5px;"></i>
                                    @endif

                                </h4>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="">
                                <h5 class="card-title"><b>Email : </b>{{ $profile->profile->email }}</h5>
                                <h6 class="card-subtitle mb-2 "><b>Contact Number : </b>{{ $profile->contactNo }}</h6>
                                <h6 class="card-subtitle mb-2 "><b>Category Name : </b><span id="category"></span></h6>
                                <h6 class="card-subtitle mb-2 "><b>Address : </b>{{ $profile->address }}</h6>
                                <h6 class="card-subtitle mb-2 "><b>Brand Beans Verified : </b>
                                    @if ($profile->is_brandBeansVerified == 'on')
                                        <i class="menu-icon fa fa-check-circle text-success"></i>
                                    @else
                                        <i class="menu-icon fa fa-close text-danger"></i>
                                    @endif
                                </h6>

                                <h6 class="card-subtitle mb-2 "><b>Trending : </b>
                                    @if ($profile->is_trending == 'on')
                                        <i class="menu-icon fa fa-check-circle text-success"></i>
                                    @else
                                        <i class="menu-icon fa fa-close text-danger"></i>
                                    @endif
                                </h6>

                                <h6 class="card-subtitle mb-2 "><b>Featured : </b>
                                    @if ($profile->is_featured == 'on')
                                        <i class="menu-icon fa fa-check-circle text-success"></i>
                                    @else
                                        <i class="menu-icon fa fa-close text-danger"></i>
                                    @endif
                                </h6>

                                <h6 class="card-subtitle mb-2 "><b>Status : </b>
                                    @if ($profile->status == 'Active')
                                        <span class="text-success">{{ $profile->status }}</span>
                                    @else
                                        <span class="text-danger">{{ $profile->status }}</span>
                                    @endif
                                </h6>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <script>
        const category = {!! $profile->categoryId !!};
        console.log(category);

        document.getElementById('category').innerHTML = category.join(', ');
    </script>
@endsection
