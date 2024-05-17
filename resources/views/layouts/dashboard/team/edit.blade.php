@extends('layouts\dashboard\dashboardmaster')

@section('content')

{{-- pages tittle part --}}
<div class=" col-lg-12 page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Team Info</a></li>
    </ol>
</div>
{{-- pages tittle part --}}


{{-- edit Team part --}}
<div class="col-xl-6 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Team Info</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('team.update',$team->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <img src="{{ asset('uploads/member_photo') }}/{{ $team->member_photo }}" width="100"
                            class="img-fluid">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Team Member Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="member_name"
                                value="{{ $team->member_name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Team Member Position</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $team->member_position }}"
                                name="member_position">
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
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- edit Team part --}}

@endsection



