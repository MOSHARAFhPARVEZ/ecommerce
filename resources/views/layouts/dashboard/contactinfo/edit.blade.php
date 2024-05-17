@extends('layouts\dashboard\dashboardmaster')

@section('content')

{{-- pages tittle part --}}
<div class=" col-lg-12 page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Contact Info</a></li>
    </ol>
</div>
{{-- pages tittle part --}}



{{-- Edit Contact Info part --}}
<div class="col-xl-6 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Contact Info</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('contactinfo.update',$contactinfo->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Brance Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $contactinfo->bracnce_name }}" name="bracnce_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Location</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $contactinfo->location }}" name="location">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Open Time</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $contactinfo->open_time }}" name="open_time">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Close Time</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $contactinfo->close_time }}" name="close_time">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" value="{{ $contactinfo->email }}" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="tel" class="form-control"
                            value="{{ $contactinfo->phone }}" name="phone">
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
{{-- Edit Contact Info part --}}

@endsection

