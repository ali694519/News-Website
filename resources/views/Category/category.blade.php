@extends('layouts.master')
@section('title')
    Categories-news programme
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Settings</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ List
                    Category</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
            </div>

        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        {{-- -------------------------------------------------------- --}}
        {{-- Error  Validate --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- -------------------------------------------------------- --}}


        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">


                    <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20 mg-xl-t-0">
                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-newspaper"
                            data-toggle="modal" href="#modaldemo8">Add Category</a>
                    </div>



                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">CATEGORY NAME</th>
                                    <th class="border-bottom-0">DESCRIPTION</th>
                                    <th class="border-bottom-0">Processes</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 0;
                                ?>
                                @if (isset($category) && $category->count() > 0)

                                @foreach ($category as $cat)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $cat->cate_name }}</td>
                                        <td>{{ $cat->description }}</td>
                                        <td>
                                            {{-- Edit --}}
                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                data-toggle="modal" href="#exampleModal{{ $cat->id }}  "
                                                title="edit">
                                                <i class="las la-pen"></i>
                                            </a>
                                            {{-- Delete --}}
                                            <a class="modal-effect btn btn-sm btn-danger" data-toggle="modal"
                                                href="#modaldemo{{ $cat->id }}" title="delete">
                                                <i class="las la-trash">
                                                </i>
                                            </a>
                                        </td>

                                        <!-- edit -->
                                        <div class="modal fade" id="exampleModal{{ $cat->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Category
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form action="{{ route('Categories.update', 'test') }}"
                                                            method="POST" autocomplete="off">
                                                            {{ method_field('PUT') }}
                                                            {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <input type="hidden" name="id"
                                                                    value="{{ $cat->id }}">
                                                                <label for="recipient-name" class="col-form-label">Category
                                                                    Name</label>
                                                                <input class="form-control" value="{{ $cat->cate_name }}"
                                                                    name="cate_name" type="text">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="message-text"
                                                                    class="col-form-label">Description</label>
                                                                <textarea class="form-control" name="description">  {{ $cat->description }} </textarea>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Save</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- edit -->

                                        <!-- delete -->
                                        <div class="modal" id="modaldemo{{ $cat->id }}">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content modal-content-demo">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title">Delete Category</h6><button
                                                            aria-label="Close" class="close" data-dismiss="modal"
                                                            type="button"><span
                                                                aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <form action="{{ route('Categories.destroy', 'test') }}"
                                                        method="post">
                                                        {{ method_field('delete') }}
                                                        {{ csrf_field() }}
                                                        <div class="modal-body">
                                                            <p> ?Are you sure about the deletion process</p><br>
                                                            <input type="hidden" name="id"
                                                                value="{{ $cat->id }}">
                                                            <input class="form-control" value="{{ $cat->cate_name }}"
                                                                name="cate_name"type="text" readonly>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Save</button>
                                                        </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- delete -->


                                    </tr>
                                @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->




        <!-- Modal effects -->
        <div class="modal" id="modaldemo8">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Add category</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('Categories.store') }}" method="POST">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" class="form-control" id="section_name" name="cate_name">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>



                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Save changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Modal effects-->







    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>

@endsection
