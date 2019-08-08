@extends('Admin.layout.admin')
@section('title', 'Sửa thông tin - Admin')
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
                            <strong>Cập nhật</strong> thông tin
                        </div>

                        <form action="{!! route('updateInformation') !!}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {!! csrf_field() !!}
                            {{ method_field('POST') }}
                            <div class="card-body card-block">
                                @foreach($information as $id => $infor)
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">{{ $infor->title }}</label></div>
                                    <div class="col-12 col-md-9">
                                        @if($infor->type_input=='text')
                                            <input type="text" id="text-input" name="content[]" placeholder="Nhập Nội dung" class="form-control" value="{{ $infor->content }}">
                                        @elseif($infor->type_input=='textarea')
                                            <textarea name="content[]" id="textarea-input" rows="9" placeholder="Nhập Nội dung" class="form-control">{{ $infor->content }}</textarea>
                                        @elseif($infor->type_input=='editor')
                                            <textarea name="content[]" id="froala-editor" rows="9" placeholder="Nhập Nội dung" class="form-control">{{ $infor->content }}</textarea>
                                        @elseif($infor->type_input=='image')
                                            <input name="image_old[]" type="hidden" value="{{$infor->content}}"/>
                                            <input type="file" id="file-input" name="content[]" value="{{$infor->content}}" class="form-control-file">
                                            <img src="{{ asset('admin/upload/' . $infor->content) }}" width="70" />
                                        @endif
                                        <input type="hidden" name="slug" value="{{ $infor->slug }}">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Cập nhật
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