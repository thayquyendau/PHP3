<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
    <title>Thêm Sản Phẩm</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Thêm Sản Phẩm</h1>

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
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <select name="id_category" id=""> 
                    <option value="">Chon Danh muc</option> 
                @foreach($categories as $category)
                    <option value="{{$category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" >
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Giá:</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ old('price') }}" >
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Số lượng:</label>
                <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock') }}" >
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Them hinh anh:</label>
                <input type="file" name="image" id="image" class="form-control" value="{{ old('image') }}" >
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Mô tả:</label>
                <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100">Lưu</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>