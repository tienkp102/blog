@extends('Admin.layout.admin')
@section('title', 'Sửa Danh mục - Admin')
@section('content')

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <a  href="{{ route('category.index') }}"><button class="btn btn-primary">Quay lại</button> </a>
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

                        <form action="{{ route('category.update', ['id' => $category->id]) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {!! csrf_field() !!}
                            {{ method_field('PUT') }}
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên danh mục</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="title" placeholder="Nhập tên danh mục" class="form-control" value="{{ $category->title }}"><small class="form-text text-muted">Nhập tên danh mục</small></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Mô tả</label></div>
                                    <div class="col-12 col-md-9"><textarea name="description" id="textarea-input" rows="9" placeholder="Content..." class="form-control">{{ $category->description }}</textarea></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Chọn ảnh</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="hidden" name="image_old" value="{{ $category->image }}">
                                        <input type="file" id="file-input" name="image" value="" class="form-control-file">
                                        <img src="{{ asset('admin/upload/' . $category->image) }}" width="70" />
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="selectLg" class=" form-control-label">Danh mục</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="role" id="selectLg" class="form-control-lg form-control">
                                            <option value="1" {{ $category->role==1?'Selected':'' }}>Danh mục sản phẩm</option>
                                            <option value="2" {{ $category->role==2?'Selected':'' }}>Danh mục tin tức</option>
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