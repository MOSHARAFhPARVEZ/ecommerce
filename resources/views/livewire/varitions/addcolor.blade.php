<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

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
        {{-- Add Color part --}}
        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Color</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">

                        <form wire:submit.prevent="color_insert">
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"> Color </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Color" wire:model="color">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"> Color Code </label>
                                <div class="col-sm-9">
                                    <input type="color" class="form-control" wire:model="color_code">
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
        {{-- Add Color part --}}


        {{-- view Color part  --}}
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Color Datatable</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="example3_wrapper" class="dataTables_wrapper no-footer">
                            <table id="example3" class="display  dataTable no-footer" role="grid"
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
                                            Color
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                            colspan="1" aria-label="Email: activate to sort column ascending"
                                            style="width: 118.031px;">
                                            Color Code
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
                                    @forelse ($colors as $color)

                                    <tr>
                                        <td>
                                            <a href="javascript:void(0);"><strong>{{ $loop->iteration }}</strong></a>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);"><strong>{{ $color->color }}</strong></a>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);"><strong>{{ $color->color_code }}</strong></a>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                {{-- delete part --}}
                                                <button type="submit" class="btn btn-danger shadow btn-xs sharp"
                                                    wire:click="delete({{ $color->id }})"
                                                    wire:confirm="Are you sure you want to delete this post?">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                {{-- delete part --}}


                                                <button type="submit" class="btn btn-danger shadow btn-xs sharp"
                                                    wire:click="edit({{ $color->id }})" data-toggle="modal"
                                                    data-target="#editcolor{{ $color->id }}">
                                                    <i class="fa fa-pencil"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div wire:ignore.self class="modal fade" id="editcolor{{ $color->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Modal
                                                                    title</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="col-xl-12 col-lg-12">
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                            <h4 class="card-title">Edit Color</h4>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="basic-form">

                                                                                <form
                                                                                    wire:submit.prevent="color_update({{ $color->id }})">
                                                                                    @if (session('successm'))
                                                                                    <div class="alert alert-success">
                                                                                        {{ session('successm') }}
                                                                                    </div>
                                                                                    @endif
                                                                                    <div class="form-group row">
                                                                                        <label
                                                                                            class="col-sm-3 col-form-label">
                                                                                            Color </label>
                                                                                        <div class="col-sm-9">
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                placeholder="Color"
                                                                                                wire:model="color">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <label
                                                                                            class="col-sm-3 col-form-label">
                                                                                            Color Code </label>
                                                                                        <div class="col-sm-9">
                                                                                            <input type="color"
                                                                                                class="form-control"
                                                                                                wire:model="color_code">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <div class="col-sm-10">
                                                                                            <button type="submit"
                                                                                                class="btn btn-primary">Edit</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">
                                                                    Close
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
        {{-- view Color part  --}}
    </div>

</div>
