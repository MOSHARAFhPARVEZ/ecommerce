@extends('layouts\dashboard\dashboardmaster')

@section('content')

{{-- pages tittle part --}}
<div class=" col-lg-12 page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Team</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Team</a></li>
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



{{-- Add Team part --}}
<div class="col-xl-6 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Team</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Team Member Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Team Member Name" name="member_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Team Member Position</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Team Member Position" name="member_position">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Team Member Photo</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="member_photo">
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
{{-- Add Team part --}}





@endsection


