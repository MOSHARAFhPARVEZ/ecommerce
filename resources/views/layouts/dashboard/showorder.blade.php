@extends('layouts\dashboard\dashboardmaster')

@section('content')

{{-- pages tittle part --}}
<div class=" col-lg-12 page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">View Order</a></li>
    </ol>
</div>
{{-- pages tittle part --}}

{{-- all success msg --}}
{{-- Product info success msg  --}}
<div class="col-lg-12">
    @if(session('successmsg'))
    <div class="alert alert-success solid alert-dismissible fade show">
        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
            stroke-linecap="round" stroke-linejoin="round" class="mr-2">
            <polyline points="9 11 12 14 22 4"></polyline>
            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
        </svg>
        <strong>Success!</strong> {{session('successmsg')}}
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                    class="mdi mdi-close"></i></span>
        </button>
    </div>
    @endif
</div>
{{-- Product info success msg  --}}
{{-- all success msg --}}


{{-- view product part  --}}
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Basic</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-responsive-sm">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Coustomer ID</th>
                            <th>Order Id</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Order Stutas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($show_orders as $show_order)

                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $show_order->coustomer_id }}</th>
                            <td>{{ $show_order->order_id }}</td>
                            <td>{{ $show_order->name }}</td>
                            <td>{{ $show_order->phone }}</td>
                            <td>{{ $show_order->address }}</td>
                            <td>{{ $show_order->created_at }}</td>
                            <td class="color-danger">{{ $show_order->total }}</td>
                            <td>
                                @if ($show_order->order_stutas == 0)
                                Placed
                                @elseif($show_order->order_stutas == 1)
                                Processing
                                @elseif($show_order->order_stutas == 2)
                                Shipped
                                @elseif($show_order->order_stutas == 3)
                                Deliverd
                                @elseif($show_order->order_stutas == 4)
                                Cancel
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('orderstutas',$show_order->id) }}" method="post">
                                    @csrf
                                    <div class="dropdown">
                                    <button type="button" class="btn  btn-outline-primary dropdown-toggle"
                                        data-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start"
                                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 42px, 0px);">
                                        <button type="submit" class="dropdown-item" name="order_stutas" value="0" >Placed</button>
                                        <button type="submit" class="dropdown-item" name="order_stutas" value="1" >Processing</button>
                                        <button type="submit" class="dropdown-item" name="order_stutas" value="2" >Shipped</button>
                                        <button type="submit" class="dropdown-item" name="order_stutas" value="3" >Deliverd</button>
                                        <button type="submit" class="dropdown-item" name="order_stutas" value="4" >Cancel</button>
                                    </div>
                                </div>
                                </form>
                            </td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- view product part  --}}

@endsection
