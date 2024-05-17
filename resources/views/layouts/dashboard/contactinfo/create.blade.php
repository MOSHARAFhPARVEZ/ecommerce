@extends('layouts\dashboard\dashboardmaster')

@section('content')

{{-- pages tittle part --}}
<div class=" col-lg-12 page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Contact</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Contact Info</a></li>
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



{{-- Add Policy part --}}
<div class="col-xl-6 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Contact Info</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('contactinfo.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Brance Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Brance Name" name="bracnce_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Location</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Location" name="location">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Open Time</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Open Time" name="open_time">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Close Time</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Close Time" name="close_time">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="tel" class="form-control" placeholder="Phone" name="phone">
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
{{-- Add Policy part --}}

@endsection

