@extends('Admin.layout.admin')
@section('title', 'Sửa thông tin liên hệ - Admin')
@section('content')

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
{{--                    <a  href="{{ route('contact.index') }}"><button class="btn btn-primary">Quay lại</button> </a>--}}
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
                            <strong>Sửa</strong> thông tin liên hệ
                        </div>

                        <form action="{{ route('contact.update', ['id' => $contact->id]) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {!! csrf_field() !!}
                            {{ method_field('PUT') }}
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="Nhập tên" value="{{ $contact->name }}" class="form-control"><small class="form-text text-muted">Nhập tên</small></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Điện thoại</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="phone" placeholder="Nhập SĐT" value="{{ $contact->phone }}" class="form-control"><small class="form-text text-muted">Nhập SĐT</small></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                                    <div class="col-12 col-md-9"><input type="email" id="text-input" name="email" placeholder="Nhập Email" value="{{ $contact->email }}" class="form-control"><small class="form-text text-muted">Nhập Email</small></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Điạ chỉ</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="address" placeholder="Nhập Địa chỉ" value="{{ $contact->address }}" class="form-control"><small class="form-text text-muted">Nhập địa chỉ</small></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nội dung</label></div>
                                    <div class="col-12 col-md-9"><textarea name="content" id="froala-editor" rows="9" placeholder="Content..." class="form-control">{{ $contact->content }}</textarea></div>
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