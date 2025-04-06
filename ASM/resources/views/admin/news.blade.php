    @extends('admin/layout')
    @section('title', 'Quản Lý Tin Tức')
    @section('content-admin')
        <div class="container mt-5">
            <h1 class="text-center mb-4 text-danger">Quản Lý Tin tức</h1>
            <!-- Nút Thêm tin tức -->
            <div class="text-end mb-3">
                <a href="{{ route('admin.news.add') }}" class="btn btn-success btn-lg">
                    Thêm Tin tức
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
                            <th scope="col">Danh mục</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Tác giả</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Lượt xem</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Ngày tạo tin</th>
                            <th scope="col">Ngày sửa tin</th>
                            <th scope="col">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as $new)   
                            <tr>
                                <td>{{ $new->id }}</td>
                                {{-- <td>{{ $new->category->name}}</td> lay theo cach dung with thiet lap quan he --}}
                                <td>{{ $new->category_name }}</td>
                                <td>{{ $new->title }}</td>
                                <td>{{ $new->content }} </td>
                                <td>{{ $new->author }}</td>
                                <td>{{ $new->status }}</td>
                                <td>{{ $new->views }}</td>
                                <td><img src="{{ asset($new->img) }}" width="100" alt="{{ $new->title }}"></td>
                                {{-- <td>{{ date('d-m-Y H:m:s', strtotime($new->created_at)) }}</td>  ko dùng đc timezone--}} 
                                <td>{{ \Carbon\Carbon::parse($new->created_at)->timezone('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s') }}

                                <td>
                                    @if (empty($new->updated_at))
                                        {{ null }}
                                    @else
                                        {{ \Carbon\Carbon::parse($new->updated_at)->format('d-m-Y H:i:s') }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.news.edit', $new->id) }}" class="btn btn-primary">Sửa</a>
                                    <a href="{{ route('admin.news.delete', $new->id) }}" class="btn btn-danger"
                                        onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    @endsection
