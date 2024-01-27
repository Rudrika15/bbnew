@extends('layouts.app')

@section('header', 'Influencer Package')
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


    <div class="box-content card ">
        <!-- /.box-title -->
        <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
            <div class="">
                <h4 class="">Influencer Package</h4>
            </div>
            {{-- <div class="">
                <a href="{{ route('influencer.package.create') }}" class="btn btn-success btn-sm" style="background-color: #002E6E; color:white;">Add</a>
            </div> --}}
        </div>
        <!-- /.dropdown js__dropdown -->
        <div class="card-content">

            <div class="table-responsive">

                <div class="table-responsive" style="margin-top: 15px;">

                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th> Influencer</th>
                                <th> Title</th>
                                <th> Price</th>
                                <th> Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($influencerPackages as $data)
                                <tr>

                                    <td>
                                        @foreach ($data->user as $user)
                                            {{ $user->name }}
                                        @endforeach
                                    </td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->price }}</td>
                                    <td>{!! $data->description !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
