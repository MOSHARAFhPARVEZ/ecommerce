@extends('layouts\dashboard\dashboardmaster')
@section('content')

{{-- pages tittle part --}}
<div class=" col-lg-12 page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Coupon</a></li>
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


{{-- coupon success msg  --}}
<div class="col-lg-12">
    @if(session('success'))
    <div class="alert alert-success solid alert-dismissible fade show">
        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
            stroke-linecap="round" stroke-linejoin="round" class="mr-2">
            <polyline points="9 11 12 14 22 4"></polyline>
            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
        </svg>
        <strong>Success!</strong> {{session('success')}}
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                    class="mdi mdi-close"></i></span>
        </button>
    </div>
    @endif
</div>
{{-- coupon success msg  --}}


{{-- Add Category part --}}
<div class="col-xl-6 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Coupon</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('couponinsert') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Coupon Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Coupon Name" name="coupon_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Coupon Type</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="coupon_type">
                                <option value="1">Solid</option>
                                <option value="2">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Coupon Discount</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" placeholder="Coupon Discount"
                                name="coupon_discount">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Coupon Date</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="coupon_date">
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
{{-- Add Category part --}}



{{-- view Inventory part  --}}
<div class="col-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Coupon</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="example3_wrapper" class="dataTables_wrapper no-footer">
                    <table id="example3" class="display min-w850 dataTable no-footer" role="grid"
                        aria-describedby="example3_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1"
                                    aria-label="Mobile: activate to sort column ascending" style="width: 71.7344px;">
                                    Coupon Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1"
                                    aria-label="Email: activate to sort column ascending" style="width: 118.031px;">
                                    Coupon Type
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1"
                                    aria-label="Email: activate to sort column ascending" style="width: 118.031px;">
                                    Coupon Discount
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1"
                                    aria-label="Email: activate to sort column ascending" style="width: 118.031px;">
                                    Coupon Date
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1"
                                    aria-label="Email: activate to sort column ascending" style="width: 118.031px;">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($coupons as $coupon)
                            <tr role="row" class="odd">
                                <td><a href="javascript:void(0);">
                                        <strong>{{ $coupon->coupon_name }}</strong>
                                    </a></td>
                                <td><a href="javascript:void(0);">
                                        <strong>{{ $coupon->coupon_type==1?'solid':'percentage' }}</strong>
                                    </a></td>
                                <td><a href="javascript:void(0);">
                                        <strong>{{ $coupon->coupon_discount }}</strong>
                                    </a></td>
                                <td><a href="javascript:void(0);">
                                        <strong>{{ $coupon->coupon_date }}</strong>
                                    </a></td>
                                <td>
                                    {{-- <form action="{{ route('product.destroy',$product->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger shadow btn-xs sharp"><i
                                                class="fa fa-trash"></i></button>
                                    </form> --}}
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- view Inventory part  --}}


@endsection
