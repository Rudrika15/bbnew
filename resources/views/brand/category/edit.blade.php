@extends('layouts.app')

@section('header', 'Brand Category')
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
                <h4 class="">Influencer Category</h4>
            </div>
            <div class="">
                <a href="{{ route('brand.category.index') }}" class="btn btn-success btn-sm" style="background-color: #002E6E; color:white;">Add</a>
            </div>
        </div>
        <!-- /.dropdown js__dropdown -->
        <div class="card-content">

            <div class="table-responsive">

                <div class="table-responsive" style="margin-top: 15px;">

                    <form action="{{ route('brand.category.update') }}" method="post">
                        @csrf
                        <input type="hidden" name="brandCategoryId" value="{{ $brandCategory->id }}">
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" value="{{ $brandCategory->categoryName }}" name="categoryName" id="categoryName" aria-describedby="helpId" placeholder="" />
                            @if ($errors->has('categoryName'))
                                <span class="text-danger">{{ $errors->first('categoryName') }}</span>
                            @endif
                        </div>

                        <div style="padding-top: 10px; display: flex; justify-content: center;">
                            <button type="submit" class="btn btn-sm" style="background-color: #002E6E; color:white;">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
