@extends('admin/layout')
@section('title', 'Quản Lý Danh Mục')
@section('content-admin')
    <div class="container mt-5">
        <h1 class="text-center mb-4 text-danger">Quản Lý Danh Mục</h1>
        <!-- Nút Thêm tin tức -->
        <div class="text-end mb-3">
            <a href="{{ route('admin.category.add') }}" class="btn btn-success btn-lg">
                Thêm Danh Mục
            </a>
        </div>

        <!-- Thông báo thành công -->
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Bảng tin tức -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-light shadow-sm">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th scope="col">ID</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Ngày sửa</th>
                        <th scope="col">Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($category->created_at)->timezone('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s') }}
                            <td>
                                @if (empty($category->updated_at))
                                    {{ null }}
                                @else
                                    {{ \Carbon\Carbon::parse($category->updated_at)->format('d:m:Y H:i:s') }}
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary">Sửa</a>
                                <a href="{{ route('admin.category.delete', $category->id) }}" class="btn btn-danger"
                                    onclick="return confirm('Bạn có muốn danh mục bao gồm tất cả bài viết trong danh mục?')">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
