@extends('layouts\dashboard\dashboardmaster')

@section('content')

{{-- pages tittle part --}}
<div class=" col-lg-12 page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Policy</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Policy</a></li>
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
            <h4 class="card-title">Edit Policy</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('policy.update',$policy->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Policy Tittle</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Policy Tittle" value="{{ $policy->policy_tittle }}" name="policy_tittle">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Policy Sub Tittle</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Policy Sub Tittle" value="{{ $policy->policy_sub_tittle }}" name="policy_sub_tittle">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Policy Icon</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Policy Icon" value="{{ $policy->policy_icon }}" name="policy_icon">
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
{{-- Add Policy part --}}

@endsection




