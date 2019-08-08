@extends('Admin.layout.admin')
@section('title', 'Thêm mới trường thông tin - Admin')
@section('content')

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <a  href="{{ route('information.index') }}"><button class="btn btn-primary">Quay lại</button> </a>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Forms</a></li>
                        <li class="active">Advanced</li>
                    </ol>
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
                            <strong>Thêm mới</strong> trường thông tin
                        </div>
                        <form method="POST" action="{{ route('information.store') }}" enctype="multipart/form-data" class="form-horizontal">
                            {!! csrf_field() !!}
                            {{ method_field('POST') }}
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tiêu đề</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="title" placeholder="Nhập tiêu đề" class="form-control"><small class="form-text text-muted">Nhập tiêu đề</small></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="selectLg" class=" form-control-label">Kiểu</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="type" id="selectLg" class="form-control-lg form-control">
                                            <option value="text">Một dòng</option>
                                            <option value="textarea">Nhiều dòng</option>
                                            <option value="editor">Editor</option>
                                            <option value="image">Hình ảnh</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Thêm
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