@extends('admin/layout')
@section('title', 'Sửa Tin Tức')
@section('content-admin')

    <div class="container mt-4">
        <h2 class="mb-4">📝 Sửa Tin Tức</h2>

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

        <form action="{{ route('admin.news.update', $new->id) }}" method="POST" enctype="multipart/form-data"
            class="border p-4 rounded shadow-sm bg-light">
            @csrf
            @method('PUT')

            <!-- Danh mục -->
            <div class="mb-3">
                <label for="id_category" class="form-label">Danh mục</label>
                <select name="id_category" id="id_category" class="form-select" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $new->id_category == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tiêu đề -->
            <div class="mb-3">
                <label for="title" class="form-label">Tiêu đề</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $new->title }}"
                    required>
            </div>

            <!-- Nội dung -->
            <div class="mb-3">
                <label for="content" class="form-label">Nội dung</label>
                <textarea name="content" id="content" class="form-control" rows="5" required>{{ $new->content }}</textarea>
            </div>

            <!-- Tác giả -->
            <div class="mb-3">
                <label for="author" class="form-label">Tác giả</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ $new->author }}">
            </div>

            <!-- Lượt xem -->
            <div class="mb-3">
                <label for="views" class="form-label">Lượt xem</label>
                <input type="number" name="views" id="views" class="form-control" value="{{ $new->views }}">
            </div>

            <!-- Trạng thái -->
            <div class="mb-3">
                <label for="status" class="form-label">Trạng thái</label>
                <select name="status" id="status" class="form-select">
                    <option value="draft" {{ old('status', $new->status ?? '') == 'draft' ? 'selected' : '' }}>Thư nháp
                    </option>
                    <option value="published" {{ old('status', $new->status ?? '') == 'published' ? 'selected' : '' }}>Đã
                        xuất bản</option>
                </select>
            </div>

            <!-- Hình ảnh -->
            <div class="mb-3">
                <label for="image" class="form-label">Hình ảnh</label>
                <input type="file" name="img" id="image" class="form-control">

                @if (!empty($new->img))
                    <div class="mt-2">
                        <span class="d-block">Hình ảnh hiện tại:</span>
                        <img src="{{ asset($new->img) }}" alt="Hình ảnh" class="img-thumbnail mt-1"
                            style="max-width: 200px;">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">💾 Lưu</button>
        </form>
    </div>

@endsection
