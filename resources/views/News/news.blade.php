@extends('layouts.master')
@section('title')
    News-news programme
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
                <h4 class="content-title mb-0 my-auto">News</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ News
                    List</span>
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
        {{--   Error validate   --}}
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
                    {{-- Add Category Button --}}
                    <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20 mg-xl-t-0">
                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-newspaper"
                            data-toggle="modal" href="#modaldemo8">Add News</a>
                    </div>

                    {{-- Searcg With Three Elements --}}
                    <div class="card-body pb-0">
                        <form action="{{ route('Filter_Classes') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="input-group mb-2">
                                <input type="text" name="search"class="form-control" placeholder="Searching.....">
                                <span class="input-group-append">
                                    <button type="submit" class="btn ripple btn-primary" type="button">Search</button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">TITLE</th>
                                    <th class="border-bottom-0">CONTENT</th>
                                    <th class="border-bottom-0">CATEGORY</th>
                                    <th class="border-bottom-0">Tags</th>
                                    <th class="border-bottom-0">DATE OF PUBLICATION</th>
                                    {{-- <th class="border-bottom-0">Processes</th> --}}
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $i = 0;
                                @endphp
                                @if (isset($news) && $news->count() > 0)
                                    @foreach ($news as $ne)
                                        @php $i++;  @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $ne->title }}</td>
                                            <td>{{ $ne->content }}</td>
                                            <td>{{ $ne->category['cate_name'] }}</td>
                                            <td>
                                                @foreach ($ne->tags as $tag)
                                                    <span class="tag tag-purple">{{ $tag['tag_name'] }}</span>
                                                @endforeach
                                            </td>
                                            <td>{{ $ne->created_at }}</td>
                                            <td>
                                                {{-- Edit --}}
                                                <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                    data-toggle="modal" href="#exampleModal{{ $ne->id }}  "
                                                    title="edit">
                                                    <i class="las la-pen"></i>
                                                </a>
                                                {{-- Delete --}}
                                                <a class="modal-effect btn btn-sm btn-danger" data-toggle="modal"
                                                    href="#modaldemo{{ $ne->id }}" title="delete">
                                                    <i class="las la-trash">
                                                    </i>
                                                </a>


                                            </td>
                                            <!-- edit -->
                                            <div class="modal fade" id="exampleModal{{ $ne->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit News
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <form action="{{ route('News.update', 'test') }}"
                                                                method="POST" autocomplete="off">
                                                                {{ method_field('PUT') }}
                                                                {{ csrf_field() }}
                                                                <div class="form-group">
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $ne->id }}">
                                                                    <label for="recipient-name"
                                                                        class="col-form-label">News
                                                                        Name</label>
                                                                    <input class="form-control"
                                                                        value="{{ $ne->title }}" name="title"
                                                                        type="text">

                                                                    <label for="recipient-name" class="col-form-label">
                                                                        Content</label>
                                                                    <input class="form-control"
                                                                        value="{{ $ne->content }}" name="content"
                                                                        type="text">
                                                                </div>


                                                                <div class="col">
                                                                    <label for="inputName" class="control-label">Category
                                                                        name</label>
                                                                    <select name="category_id" class="custom-select">
                                                                        <!--placeholder-->
                                                                        <option value="{{ $ne->id }}">
                                                                            {{ $ne->category['cate_name'] }}
                                                                        </option>
                                                                        @foreach ($category as $categ)
                                                                            <option value="{{ $categ->id }}">
                                                                                {{ $categ->cate_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <br>

                                                                <div class="col">
                                                                    <label for="inputName"
                                                                        class="control-label">Tags</label>
                                                                    <select multiple name="tag_id[]" class="form-control"
                                                                        id="exampleFormControlSelect2">
                                                                        @foreach ($ne->tags as $tag)
                                                                            <option selected value="{{ $tag['id'] }}">
                                                                                {{ $tag['tag_name'] }}
                                                                            </option>
                                                                        @endforeach

                                                                        @foreach ($tags as $tagee)
                                                                            <option value="{{ $tagee->id }}">
                                                                                {{ $tagee->tag_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
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
                                            <div class="modal" id="modaldemo{{ $ne->id }}">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content modal-content-demo">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title">Delete News</h6><button
                                                                aria-label="Close" class="close" data-dismiss="modal"
                                                                type="button"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <form action="{{ route('News.destroy', 'test') }}"
                                                            method="post">
                                                            {{ method_field('delete') }}
                                                            {{ csrf_field() }}
                                                            <div class="modal-body">
                                                                <p> ?Are you sure about the deletion process</p><br>
                                                                <input type="hidden" name="id"
                                                                    value="{{ $ne->id }}">
                                                                <input class="form-control" value="{{ $ne->title }}"
                                                                    name="cate_name"type="text" readonly>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Save</button>
                                                            </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- delete -->
                                        </tr>
                                    @endforeach
                                @endif
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
                        <h6 class="modal-title">Add News</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('News.store') }}" method="POST">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="exampleInputEmail1">News Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Content</label>
                                <textarea class="form-control" name="content" rows="3"></textarea>
                            </div>
                            <br>

                            <select name="category" class="form-control SlectBox">
                                <!--placeholder-->
                                <option value="" selected disabled>Check Category</option>
                                @foreach ($category as $categ)
                                    <option value="{{ $categ->id }}"> {{ $categ->cate_name }}</option>
                                @endforeach
                            </select>
                            <br>
                            <br>

                            <div class="col">
                                <label for="inputName" class="control-label">Check Tags</label>
                                <select multiple name="tag_id[]" class="form-control" id="exampleFormControlSelect2">
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <br>

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
