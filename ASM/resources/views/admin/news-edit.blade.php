


@extends('admin/layout')
@section('title', 'Manager News')
@section('content-admin')

<h1>Sua san pham</h1>
@if (Session::has('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endif
<!-- Form thêm sản phẩm -->
<form action="{{ route('admin.news.update', $new->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Thêm dòng này để giả lập PUT -->
    {{-- bao ve du lieu nhap vao --}}
    <select name="id_category" id="">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <div class="form-group">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $new->name }}" required>
    </div>

    <div class="form-group">
        <label for="price">Giá:</label>
        <input type="number" name="price" id="price" class="form-control" value="{{ $new->price }}"
            step="0.01" required>
    </div>

    <div class="form-group">
        <label for="stock">So luong</label>
        <input type="number" name="stock" id="stock" class="form-control" value="{{ $new->stock }}">
    </div>

    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea name="description" id="description" class="form-control">{{ $new->description }}</textarea>
    </div>

    <button>Luu</button>
</form>


@endsection