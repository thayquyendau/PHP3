@extends('admin/layout')
@section('title', 'Add News')
@section('content-admin')

    <div class="container mt-5">
        <h1 class="text-center mb-4">THÊM TIN TỨC</h1>

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
        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <select name="id_category" id="">
                <option value="">Chọn danh mục</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <div class="mb-3">
                <label for="title" class="form-label">Tên tiêu đề:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Nội dung:</label>
                <textarea type="text" name="content" id="content" class="form-control" value="{{ old('content') }}">
                </textarea>
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Tác giả:</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Trạng thái</label>
                <select name="status" class="form-control">
                    <option value="">Chọn trạng thái:</option>
                    <option value="draft">Thư nháp</option>
                    <option value="published">Đã xuất bản</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Them hinh anh:</label>
                <input type="file" name="img" id="image" class="form-control" value="{{ old('img') }}">
            </div>

            <button type="submit" class="btn btn-primary w-100">Lưu</button>
        </form>
    </div>


@endsection
