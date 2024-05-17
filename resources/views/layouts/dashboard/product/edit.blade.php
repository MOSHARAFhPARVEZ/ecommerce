@extends('layouts\dashboard\dashboardmaster')

@section('content')

{{-- pages tittle part --}}
<div class=" col-lg-12 page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Product</a></li>
    </ol>
</div>
{{-- pages tittle part --}}


{{-- edit Product part --}}
<div class="col-xl-6 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Product</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <img src="{{ asset('uploads/product_photo') }}/{{ $product->photo }}" width="100"
                            class="img-fluid rounded-circle">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Product Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="product_name"
                                value="{{ $product->product_name }}">
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
                            <input type="text" class="form-control" name="purchase_price"
                                value="{{ $product->purchase_price }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Regular Price</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="regular_price"
                                value="{{ $product->regular_price }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Discount Price</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="discount_price"
                                value="{{ $product->discount_price }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="description"
                                value="{{ $product->description }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Long Description</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="long_description"
                                value="{{ $product->long_description }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Additional Information</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="addi_info"
                                value="{{ $product->addi_info }}">
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Product Photo</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="photo">
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
{{-- edit Product part --}}

@endsection
