@extends('Admin.layout.admin')
@section('title', 'Sửa tin tức - Admin')
@section('content')

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <a  href="{{ route('news.index') }}"><button class="btn btn-primary">Quay lại</button> </a>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Sửa</strong> Danh mục
                        </div>

                        <form action="{{ route('news.update', ['id' => $news->id]) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {!! csrf_field() !!}
                            {{ method_field('PUT') }}
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tiêu đề</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="title" placeholder="Nhập tiêu đề" class="form-control" value="{{ $news->title }}"><small class="form-text text-muted">Nhập tên danh mục</small></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Mô tả</label></div>
                                    <div class="col-12 col-md-9"><textarea name="description" id="textarea-input" rows="9" placeholder="Content..." class="form-control">{{ $news->description }}</textarea></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nội dung</label></div>
                                    <div class="col-12 col-md-9"><textarea name="content" id="froala-editor" rows="9" placeholder="Content..." class="form-control">{{ $news->content }}</textarea></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="selectLg" class=" form-control-label">Danh mục</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="category" id="selectLg" class="form-control-lg form-control">
                                            @foreach($category as $id => $cate)
                                            <option value="{{ $cate->id }}" {{ $cate->id==$news->category_id?'Selected':'' }}>{{ $cate->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Sửa
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div><!-- .animated -->
    </div>

@endsection