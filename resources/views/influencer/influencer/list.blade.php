@extends('layouts.app')
@section('header', 'Influencer')
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


    <div class="box-content card danger">
        <!-- /.box-title -->
        <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #01B9F1; color:white;">
            <div class="">
                <h4 class="">Influencer</h4>
            </div>
            <div class="">
                {{-- <a href="{{ route('offer.create') }}" class="btn btn-success btn-sm" style="background-color: #002E6E; color:white;">ADD</a> --}}
                <!-- /.sub-menu -->
            </div>
        </div>
        <!-- /.dropdown js__dropdown -->
        <div class="card-content">

            <div class="table-responsive">

                <div class="table-responsive" style="margin-top: 15px;">

                    <table id="example" class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th> Name</th>
                                <th> Email</th>
                                <th> Mobile Number</th>
                                <th> Featured</th>
                                <th> Trending</th>
                                <th> BrandBeans Verified</th>

                                <th width="280px"> Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($influencer as $influencer)
                                <tr>
                                    <td>{{ $influencer->name }}</td>
                                    <td>{{ $influencer->email }}</td>
                                    <td>{{ $influencer->mobileno }}</td>
                                    <td>
                                        @if ($influencer->influencer->is_featured == 'yes')
                                            <i class="bi bi-check text-success h2"></i>
                                        @else
                                            <i class="bi bi-x text-danger h2"></i>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($influencer->influencer->is_trending == 'yes')
                                            <i class="bi bi-check text-success h2"></i>
                                        @else
                                            <i class="bi bi-x text-danger h2"></i>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($influencer->influencer->is_brandBeansVerified == 'yes')
                                            <i class="bi bi-check text-success h2"></i>
                                        @else
                                            <i class="bi bi-x text-danger h2"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('influencer.singleView') }}/{{ $influencer->id }}" class="btn btn-primary btn-sm">View Details</a>
                                        <a href="{{ route('influencer.statusEdit') }}/{{ $influencer->id }}" class="btn btn-info btn-sm">Edit</a>

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
