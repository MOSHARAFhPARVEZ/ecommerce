@extends('layouts\dashboard\dashboardmaster')

@section('content')

{{-- pages tittle part --}}
<div class=" col-lg-12 page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Banner</a></li>
    </ol>
</div>
{{-- pages tittle part --}}


{{-- edit Banner part --}}
<div class="col-xl-6 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Banner</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('aboutpart.update',$about->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <img src="{{ asset('uploads/banner_photo') }}/{{ $about->banner_photo }}" width="100"
                            class="img-fluid">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tittle</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="tittle"
                                value="{{ $about->tittle }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $about->description }}"
                                name="description">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Experience Number</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" value="{{ $about->experience_number }}"
                                name="experience_number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Satisfaction Percentage</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" value="{{ $about->satisfaction_per }}"
                                name="satisfaction_per">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Happy Customers</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" value="{{ $about->happy_customer }}"
                                name="happy_customer">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Banner Photo</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="banner_photo">
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
{{-- edit Banner part --}}

@endsection



