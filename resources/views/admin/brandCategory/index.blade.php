@extends('extra.master')
@section('title', 'Brand beans | Brand Category')
@section('content')
    <div class='container'>
        <div class='row pt-5'>
            <div class='col-md-12'>
                <div class="d-flex justify-content-between mb-3">
                    <div class="p-2">
                        <h3> Brand Category</h3>
                    </div>
                    <div class="p-2">
                        <a href="{{ route('brand.category.create') }}" class="btn btn-primary btn-sm">Add Brand Category</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <table id="example" class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th> Name</th>
                                    <th> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brandCategory as $data)
                                    <tr>
                                        <td>{{ $data->categoryName }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{ route('brand.category.edit') }}/{{ $data->id }}">Edit</a>
                                            <a class="btn btn-danger btn-sm" href="{{ route('brand.category.delete') }}/{{ $data->id }}">Delete</a>
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
