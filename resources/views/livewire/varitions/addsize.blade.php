<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="row">
        {{-- pages tittle part --}}
        <div class=" col-lg-12 page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Varition</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Size</a></li>
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
        {{-- Add Varition part --}}
        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Varition</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <form wire:submit.prevent="size_insert">

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"> Size </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Size" wire:model="size">
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
        {{-- Add Varition part --}}


        {{-- view size part  --}}
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Size Datatable</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="example3_wrapper" class="dataTables_wrapper no-footer">
                            <table id="example3" class="display min-w850 dataTable no-footer" role="grid"
                                aria-describedby="example3_info">
                                <thead>
                                    <tr role="row">

                                        <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                            colspan="1" aria-label="Mobile: activate to sort column ascending"
                                            style="width: 71.7344px;">
                                            SL
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                            colspan="1" aria-label="Email: activate to sort column ascending"
                                            style="width: 118.031px;">
                                            Size
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                            colspan="1" aria-label="Email: activate to sort column ascending"
                                            style="width: 118.031px;">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($size as $siz)

                                    @endforeach --}}
                                    @forelse ($sizes as $size)

                                    <tr>
                                        <td><a href="javascript:void(0);"><strong>{{ $loop->iteration }}</strong></a>
                                        </td>
                                        <td><a href="javascript:void(0);"><strong>{{ $size->size }}</strong></a></td>
                                        <td>
                                            <div class="d-flex">
                                                {{-- <a href="{{ route('category.edit',$category->id) }}"
                                                class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                    class="fa fa-pencil"></i></a> --}}

                                                <button type="submit" class="btn btn-danger shadow btn-xs sharp"
                                                    wire:click="delete({{ $size->id }})"
                                                    wire:confirm="Are you sure you want to delete this post?">
                                                    <i class="fa fa-trash"></i>
                                                </button>
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
        {{-- view size part  --}}
    </div>

</div>
