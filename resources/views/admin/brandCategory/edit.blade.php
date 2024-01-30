@extends('extra.master')
@section('title', 'Brand beans | Edit Brand Category')
@section('content')
    <div class='container'>
        <div class='row pt-5'>
            <div class='col-md-12'>
                <div class="d-flex justify-content-between mb-3">
                    <div class="p-2">
                        <h3>Edit Brand Category</h3>
                    </div>
                    <div class="p-2">
                        <a href="{{ route('brand.category.index') }}" class="btn btn-primary btn-sm">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

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
                                <button type="submit" class="btn btn-success btn-sm">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
