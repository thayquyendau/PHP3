@extends('admin/layout')
@section('title', 'Thêm Danh Mục')
@section('content-admin')

    <div class="container mt-5">
        <h1 class="text-center mb-4">Thêm Danh mục</h1>

        <!-- Hiển thị lỗi validation -->
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form thêm sản phẩm -->
        <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên danh mục:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>

            <button type="submit" class="btn btn-primary w-100">Lưu</button>
        </form>
    </div>


@endsection
