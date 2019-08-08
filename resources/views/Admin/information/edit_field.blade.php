@extends('Admin.layout.admin')
@section('title', 'Sửa trường thông tin - Admin')
@section('content')

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <a  href="{{ route('information.index') }}"><button class="btn btn-primary">Quay lại</button> </a>
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
                            <strong>Sửa</strong> trường thông tin
                        </div>

                        <form action="{{ route('information.update', ['id' => $information->id]) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {!! csrf_field() !!}
                            {{ method_field('PUT') }}
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tiêu đề</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="title" placeholder="Nhập tiêu đề" class="form-control" value="{{ $information->title }}"><small class="form-text text-muted">Nhập tiêu đề</small></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="selectLg" class=" form-control-label">Kiểu</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="type" id="selectLg" class="form-control-lg form-control">
                                            <option value="text" {{ $information->type_input=='text'?'Selected':'' }}>Một dòng</option>
                                            <option value="textarea" {{ $information->type_input=='textarea'?'Selected':'' }}>Nhiều dòng</option>
                                            <option value="editor" {{ $information->type_input=='editor'?'Selected':'' }}>Editor</option>
                                            <option value="image" {{ $information->type_input=='image'?'Selected':'' }}>Hình ảnh</option>
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