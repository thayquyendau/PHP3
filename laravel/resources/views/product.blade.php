    @extends('client')
    @section('title', 'Manager Products')
    @section('content')
        <div class="container mt-5">
            <h1 class="text-center mb-4 text-danger">Quản Lý Danh Muc Sản Phẩm</h1>
            <!-- Nút Thêm Sản Phẩm -->
            <div class="text-end mb-3">
                <a href="{{ route('product.add') }}" class="btn btn-success btn-lg shadow-sm">
                    <i class="bi bi-plus-circle"></i> Thêm Sản Phẩm
                </a>
            </div>

            <!-- Thông báo thành công -->
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Bảng sản phẩm -->

    {{-- <img width="100" src="{{ asset('images/z5466592084200_862b8f1aff8d79bf0c9435f68daef384.jpg')}}"> --}}
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-light shadow-sm">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Ten Danh muc</th>
                            <th scope="col">Tên Sản Phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số Lượng</th>
                            <th scope="col">Mô Tả</th>
                            <th scope="col">Hinh Anh</th>
                            <th scope="col">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <!--Lay Sản phẩm không phải của loại IPhone -->
                            {{-- @php
                            if ($product->category_name != 'IPhone'):
                            @endphp --}}
                            <tr>
                                <td>{{ $product->id }}</td>
                                {{-- <td>{{ $product->category->name}}</td> lay theo cach dung with thiet lap quan he --}}           
                                <td>{{ $product->category_name}}</td> 
                                <td>{{ $product->name }}</td>
                                <td>{{ number_format($product->price, 0, ',', '.') }} VNĐ</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->description }}</td>
                                <td><img src="{{ asset($product->image) }}" width="100" alt="{{ $product->name }}"></td>
                                <td>
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-primary me-1">Sửa</a>
                                    <a href="{{ route('product.delete', $product->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                                </td>
                            </tr>
                            {{-- @php
                            endif; 
                            @endphp --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    @endsection