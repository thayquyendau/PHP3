@extends('admin/layout')
@section('title', 'Sửa Danh Mục')
@section('content-admin')

    <div class="container mt-4">
        <h2 class="mb-4">📝 Sửa Danh Mục</h2>

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

        <form action="{{ route('admin.category.update', $category->id) }}" method="POST" enctype="multipart/form-data"
            class="border p-4 rounded shadow-sm bg-light">
            @csrf
            @method('PUT')

            <!-- Tên danh mục -->
            <div class="mb-3">
                <label for="name" class="form-label">Tên danh mục</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}"
                    required>

                <button type="submit" class="btn btn-primary">💾 Lưu</button>
        </form>
    </div>

@endsection
