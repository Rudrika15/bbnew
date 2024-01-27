@extends('layouts.app')

@section('header', 'Activity')
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

        <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
            <div class="">
                <h4 class="">Brand Package Activity</h4>
            </div>
            <div class="">
                <a href="{{ route('admin.brand.activity.create') }}" class="btn btn-success btn-sm" style="background-color: #002E6E; color:white;">ADD</a>
            </div>
        </div>
        <div class="card-content">
            <div class="table-responsive">


                <table id="" class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th> title</th>
                            <th> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $data)
                            <tr>
                                <td>
                                    {{ $data->title }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.brand.activity.edit') }}/{{ $data->id }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ route('admin.brand.activity.delete') }}/{{ $data->id }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>


@endsection
