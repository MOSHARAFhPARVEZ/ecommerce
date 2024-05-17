@extends('layouts\dashboard\dashboardmaster')

@section('content')


{{-- pages tittle part --}}
<div class=" col-lg-12 page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">About</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">View Banner</a></li>
    </ol>
</div>
{{-- pages tittle part --}}

{{-- all success msg --}}
{{-- banner info success msg  --}}
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
{{-- banner info success msg  --}}
{{-- all success msg --}}


{{-- view Banner part  --}}
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Banner Datatable</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="example3_wrapper" class="dataTables_wrapper no-footer">
                    <table id="example3" class="display min-w850 dataTable no-footer" role="grid"
                        aria-describedby="example3_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example3" rowspan="1" colspan="1"
                                    aria-sort="ascending" aria-label=": activate to sort column descending"
                                    style="width: 25px;">
                                    Banner Photo
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1"
                                    aria-label="Mobile: activate to sort column ascending" style="width: 71.7344px;">
                                    Tittle
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1"
                                    aria-label="Email: activate to sort column ascending" style="width: 118.031px;">
                                    Description
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1"
                                    aria-label="Joining Date: activate to sort column ascending"
                                    style="width: 84.0156px;">
                                    Experience Number
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1"
                                    aria-label="Joining Date: activate to sort column ascending"
                                    style="width: 84.0156px;">
                                    Satisfaction Percentage
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1"
                                    aria-label="Joining Date: activate to sort column ascending"
                                    style="width: 84.0156px;">
                                    Happy Customers
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1"
                                    aria-label="Action: activate to sort column ascending" style="width: 46.0156px;">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($abouts as $about)
                            <tr role="row" class="odd">
                                <td class="sorting_1"><img width="100"
                                        src="{{ asset('uploads/banner_photo') }}/{{$about->banner_photo}}" alt="">
                                    </td>
                                <td>
                                    <a href="javascript:void(0);">
                                        <strong>{{ $about->tittle }}</strong>
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);">
                                        <strong>{{ $about->description }}</strong>
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);">
                                        <strong>{{ $about->experience_number }}</strong>
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);">
                                        <strong>{{ $about->satisfaction_per }}</strong>
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);">
                                        <strong>{{ $about->happy_customer }}</strong>
                                    </a>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('aboutpart.edit',$about->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                class="fa fa-pencil"></i></a>
                                        <form action="{{ route('aboutpart.destroy',$about->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
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
</div>
{{-- view Banner part  --}}

@endsection


