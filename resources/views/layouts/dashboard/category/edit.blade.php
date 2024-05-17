@extends('layouts\dashboard\dashboardmaster')

@section('content')

{{-- pages tittle part --}}
<div class=" col-lg-12 page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Category</a></li>
    </ol>
</div>
{{-- pages tittle part --}}


{{-- edit Category part --}}
<div class="col-xl-6 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Category</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <img src="{{ asset('uploads/category_photo') }}/{{ $category->category_photo }}" width="100"
                            class="img-fluid rounded-circle">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="category_name"
                                value="{{ $category->category_name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category slug</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $category->category_slug }}"
                                name="category_slug">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Category Photo</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="category_photo">
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- edit Category part --}}

@endsection
