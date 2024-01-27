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

@section('header', 'Brands')
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
            <div class="cards " style="width: 30%;">

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12">
                            <form action="{{ route('influencer.statusEditCode') }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ $profile->userId }}" name="influencerId" id="" placeholder="">

                                <h2>{{ $profile->profile->username }}</h2>
                                <div class="form-check">
                                    <label>
                                        Is Featured
                                        @if ($profile->is_featured == 'on')
                                            <input class="form-check-input" type="checkbox" name="is_featured" value="{{ $profile->is_featured }}" id="" checked>
                                        @else
                                            <input class="form-check-input" type="checkbox" name="is_featured" value="on" id="">
                                        @endif
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label>
                                        Is Trending
                                        @if ($profile->is_trending == 'on')
                                            <input class="form-check-input" type="checkbox" name="is_trending" value="{{ $profile->is_trending }}" id="" checked>
                                        @else
                                            <input class="form-check-input" type="checkbox" name="is_trending" value="on" id="">
                                        @endif
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label>
                                        Is BrandBeans Verified
                                        @if ($profile->is_brandBeansVerified == 'on')
                                            <input class="form-check-input" name="is_brandBeansVerified" type="checkbox" value="{{ $profile->is_brandBeansVerified }}" id="" checked>
                                        @else
                                            <input class="form-check-input" name="is_brandBeansVerified" type="checkbox" value="on" id="">
                                        @endif
                                    </label>

                                </div>

                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>


@endsection
