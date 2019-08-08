@extends('Admin.layout.admin')
@section('title', 'Danh sách sản phẩm - Admin')
@section('content')

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <a  href="{{ route('product.create') }}"><button class="btn btn-primary">Thêm mới</button> </a>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Danh sách sản phẩm</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Mô tả</th>
                                    <th>Hình ảnh</th>
                                    <th>Giá</th>
                                    <th>Nội dung</th>
                                    <th>Danh mục</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td><img src="{{ asset('admin/upload/' . $product->image) }}" alt="{{ $product->image }}" width="70"></td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->content }}</td>
                                    <td>{{ $product->title }}</td>
                                    <td>
                                        <a href="{{ route('product.edit', ['id' => $product->id]) }}">
                                            <button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                        </a>
                                        <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#staticModal{{ $product->id }}">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
{{--                                        modal delete--}}
                                        <div class="modal fade" id="staticModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                            <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticModalLabel">Thông báo</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>
                                                            Bạn có chắc muốn xóa ?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>

                                                        <form action="{{ route('product.destroy', ['id' => $product->id]) }}" method="post" >
                                                            {!! csrf_field() !!}
                                                            {{ method_field('DELETE') }}
                                                            <button type="submit" class="btn btn-primary">Xóa</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
{{--                                        end modal delete--}}
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div>


@endsection