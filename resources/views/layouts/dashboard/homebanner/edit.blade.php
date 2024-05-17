@extends('layouts\dashboard\dashboardmaster')

@section('content')

{{-- pages tittle part --}}
<div class=" col-lg-12 page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Home Banner Info</a></li>
    </ol>
</div>
{{-- pages tittle part --}}


{{-- edit home banner part --}}
<div class="col-xl-6 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Home Banner</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('homebanner.update',$homebanner->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <img src="{{ asset('uploads/homebanner_photo') }}/{{ $homebanner->homebanner_photo }}" width="100"
                            class="img-fluid">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="category"
                                value="{{ $homebanner->category }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Product Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $homebanner->product_name }}"
                                name="product_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $homebanner->description }}"
                                name="description">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Regular Price</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $homebanner->regular_price }}"
                                name="regular_price">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Discount Price</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $homebanner->discount_price }}"
                                name="discount_price">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Home Banner Photo</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="homebanner_photo">
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- edit home banner part --}}

@endsection
