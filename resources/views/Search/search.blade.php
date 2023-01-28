@extends('layouts.master')
@section('title')
    Search-news programme
@stop
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Search</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
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
        @if (count($results) > 0)
            @foreach ($results as $res)
                @if (class_basename($res) == 'post')
                    <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card card-primary">
                            <div class="card-header pb-0">
                                <h5 class="card-title mb-0 pb-0">{{ $res->title }}</h5>
                            </div>
                            <div class="card-body text-primary">
                                {{ $res->content }}
                            </div>
                            <div class="card-footer">
                                {{ $res->created_at }}
                            </div>
                        </div>
                    </div>
                @elseif(class_basename($res) == 'category')
                    <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card card-success">
                            <div class="card-header pb-0">
                                <h5 class="card-title mb-0 pb-0">Category Name</h5>
                            </div>
                            <div class="card-body text-success">
                                {{ $res->cate_name }}
                            </div>
                            <div class="card-footer">
                                {{-- Card footer --}}
                            </div>
                        </div>
                    </div>
                @elseif (class_basename($res) == 'tag')
                    <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card card-purple">
                            <div class="card-header pb-0">
                                <h5 class="card-title mb-0 pb-0">Tag Name</h5>
                            </div>
                            <div class="card-body text-purple">
                                {{ $res->tag_name }}
                            </div>
                            <div class="card-footer">
                                {{-- Card footer --}}
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
