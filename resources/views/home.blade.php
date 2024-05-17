@extends('layouts.dashboard.dashboardmaster')

@section('content')

{{-- pages tittle part --}}
<div class="page-titles">
    <ol class="breadcrumb">
        {{-- <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li> --}}
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
    </ol>
</div>
{{-- pages tittle part --}}


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
