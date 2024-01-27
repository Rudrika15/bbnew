@extends('layouts.app')

@section('header', 'Brand Category')
@section('content')



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

                    <form action="{{ route('brand.category.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" value="{{ old('categoryName') }}" name="categoryName" id="categoryName" aria-describedby="helpId" placeholder="" />
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
