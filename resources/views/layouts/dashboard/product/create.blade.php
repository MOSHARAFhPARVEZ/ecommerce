@extends('layouts\dashboard\dashboardmaster')

@section('content')


{{-- pages tittle part --}}
<div class=" col-lg-12 page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Product</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Product</a></li>
    </ol>
</div>
{{-- pages tittle part --}}


{{-- all error part --}}
@if($errors->all())
<div class="col-lg-12">
    <div class="alert alert-danger solid alert-dismissible fade show">
        @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
        @endforeach
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                    class="mdi mdi-close"></i></span>
        </button>
    </div>
</div>
@endif
{{-- all error part --}}



{{-- Add Product part --}}
<div class="col-xl-6 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Product</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Product Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Product Name" name="product_name" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Product Category</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="product_category">
                                <option value="">Select One Category</option>

                                @foreach ($categories as $category )
                                <option value="{{ $category->id }}"> {{ $category->category_name }} </option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Purchase Price</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Purchase Price" name="purchase_price" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Regular Price</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Regular Price" name="regular_price" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Discount Price</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Discount Price" name="discount_price" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Description" name="description" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Long Description</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Long Description" name="long_description" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Additional Information</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Additional Information" name="addi_info" >
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Thamnail</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="photo">
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Gallery Photo</span>
                        </div>
                        <div class="custom-file">
                            <input multiple type="file" class="custom-file-input"
                            name="product_gallary[]">
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
{{-- Add Product part --}}



@endsection
