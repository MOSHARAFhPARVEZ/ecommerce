@extends('layouts\dashboard\dashboardmaster')

@section('content')

{{-- pages tittle part --}}
<div class=" col-lg-12 page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Product</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Inventory</a></li>
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


{{-- view Inventory part  --}}
<div class="col-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Inventory Datatable oF {{ $products->product_name }}</h4>
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
                                    Size
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1"
                                    aria-label="Email: activate to sort column ascending" style="width: 118.031px;">
                                    Size Quantity
                                </th>
                            </tr>
                        </thead>
                        <tbody>


                            <tr role="row" class="odd">
                                <td><a href="javascript:void(0);"><strong>m</strong></a></td>
                                <td><a href="javascript:void(0);"><strong>10</strong></a></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- view Inventory part  --}}



{{-- Add inventory part --}}
<div class="col-xl-6 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Inventory</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('inventory.store') }}" method="POST" >
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="size" name="category_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Quantity" name="category_slug">
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
{{-- Add inventory part --}}





@endsection
