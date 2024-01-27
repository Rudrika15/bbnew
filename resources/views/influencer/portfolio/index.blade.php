@extends('layouts.app')

@section('header', 'Influencer Portfolio')
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
                <h4 class="">Influencer Portfolio</h4>
            </div>
            <div class="">
                <a href="{{ route('influencer.portfolio.create') }}" class="btn btn-success btn-sm" style="background-color: #002E6E; color:white;">Add</a>
            </div>
        </div>
        <!-- /.dropdown js__dropdown -->
        <div class="card-content">

            <div class="table-responsive">

                <div class="table-responsive" style="margin-top: 15px;">

                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th> Photo</th>
                                {{-- <th> Type</th> --}}
                                {{-- <th> Details</th> --}}
                                <th> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($portfolio as $portfolio)
                                <tr>
                                    <td>
                                        @if ($portfolio->type == 'Photo')
                                            <img src="{{ asset('cardimage') }}/{{ $portfolio->image }}" title="{{ $portfolio->title }}" alt="image" style="height: 300px; width: 300px;">
                                        @endif
                                        @if ($portfolio->type == 'Video')
                                            <iframe width="300" height="300" src="https://www.youtube.com/embed/{{ $portfolio->image }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        @endif
                                    </td>
                                    {{-- <td>{{ $portfolio->type }}</td>
                                    <td>{{ $portfolio->details }}</td> --}}
                                    <td>
                                        {{-- <a class="btn btn-primary btn-sm"
                                            href="{{ route('influencer.portfolio.edit') }}/{{ $portfolio->id }}">Edit</a> --}}
                                        <a class="btn btn-danger btn-sm" href="{{ route('influencer.portfolio.delete') }}/{{ $portfolio->id }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>

            </div>

        </div>
        <!-- /.card-content -->
    </div>


@endsection
