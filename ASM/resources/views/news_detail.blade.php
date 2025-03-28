@extends('client')
@section('title', 'Chi tiết tin tức')
@section('content')

<!-- Breadcrumb -->
<section class="container my-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('home', ['category_id' => $news->id_category]) }}">{{ $category->name ?? 'Danh mục' }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($news->title, 30) }}</li>
        </ol>
    </nav>
</section>

<!-- Main Content -->
<section class="container my-5">
    <div class="row">
        <!-- Nội dung chính -->
        <main class="col-md-8">
            <article class="card border-0 shadow-sm">
                @if($news->img)
                    <img src="{{ $news->img }}" class="card-img-top rounded-top" alt="{{ $news->title }}" style="max-height: 400px; object-fit: cover;">
                @endif
                <div class="card-body p-4">
                    <h1 class="card-title fw-bold mb-3">{{ $news->title }}</h1>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <span class="text-muted small">Ngày đăng: <i class="fas fa-calendar-alt me-1"></i>{{ $news->created_at }}</span>
                            <span class="text-muted small ms-3">Tác giả: <i class="fas fa-user me-1"></i>{{ $news->author ?? 'Ẩn danh' }}</span>
                            <span class="text-muted small ms-3"><i class="fas fa-eye me-1"></i>{{ $news->views }} lượt xem</span>
                            <span class="text-muted small ms-3"><i class="fas fa-folder me-1"></i>
                                <a href="{{ route('home', ['category_id' => $news->id_category]) }}" class="text-primary">{{ $category->name ?? 'Không xác định' }}</a>
                            </span>
                        </div>
                        <div>
                            <span class="badge bg-{{ $news->status == 'published' ? 'success' : 'warning' }}">{{ $news->status == 'published' ? 'Đã xuất bản' : 'Bản nháp' }}</span>
                        </div>
                    </div>
                    <hr>
                    <div class="card-text">
                        {!! nl2br(e($news->content)) !!}
                    </div>
                </div>
                <div class="card-footer bg-light p-3">
                    <h6 class="fw-bold mb-3">Chia sẻ bài viết:</h6>
                    <div class="d-flex gap-2">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="btn btn-primary btn-sm">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($news->title) }}" target="_blank" class="btn btn-info btn-sm">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($news->title) }}" target="_blank" class="btn btn-secondary btn-sm">
                            <i class="fab fa-linkedin-in"></i> LinkedIn
                        </a>
                    </div>
                </div>
            </article>

            <!-- Bình luận -->
            <div class="mt-5">
                <h3 class="fw-bold text-danger mb-4"><i class="fas fa-comments me-2"></i>Bình luận</h3>
                @forelse($comments as $comment)
                    <div class="card mb-3 border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <!-- Lấy tên người dùng từ bảng users dựa trên user_id -->
                                <!-- Sử dụng DB::table để truy vấn bảng users -->
                                @php
                                    $user = DB::table('users')->where('id', $comment->user_id)->first();
                                    $userName = $user ? $user->name : 'Ẩn danh';
                                @endphp
                                <h6 class="fw-bold">{{ $userName }}</h6>
                                <span class="text-muted small">{{ $comment->created_at }}</span>
                            </div>
                            <p class="mt-2">{{ $comment->content }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Chưa có bình luận nào.</p>
                @endforelse

                <!-- Form thêm bình luận -->
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Để lại bình luận</h5>
                        @if(session('user'))
                            <!-- Nếu người dùng đã đăng nhập, hiển thị form bình luận -->
                            <form method="POST" action="{{ route('news.comment', $news->id) }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="content" class="form-label">Nội dung bình luận</label>
                                    <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Gửi bình luận</button>
                            </form>
                        @else
                            <!-- Nếu người dùng chưa đăng nhập, hiển thị thông báo và nút mở popup -->
                            <p class="text-muted">Vui lòng <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">đăng nhập</a> để bình luận.</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Tin tức liên quan -->
            @if($relatedNews->isNotEmpty())
                <div class="mt-5">
                    <h3 class="fw-bold text-danger mb-4"><i class="fas fa-newspaper me-2"></i>Tin tức liên quan</h3>
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        @foreach($relatedNews as $item)
                            <div class="col">
                                <div class="card h-100 border-0 shadow-sm hover-effect">
                                    <img src="{{ $item->img }}" class="card-img-top" alt="{{ $item->title }}" style="height: 150px; object-fit: cover;">
                                    <div class="card-body">
                                        <span class="text-muted small"><i class="fas fa-calendar-alt"></i> {{ $item->created_at }}</span>
                                        <span class="text-muted small ms-3"><i class="fas fa-eye"></i> {{ $item->views }} lượt xem</span>
                                        <h5 class="card-title fw-bold mt-2">{{ Str::limit($item->title, 50) }}</h5>
                                        <p class="card-text text-muted">{{ Str::limit($item->content, 100) }}</p>
                                        <a href="{{ route('news.detail', $item->id) }}" class="btn btn-outline-primary stretched-link">Đọc thêm</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </main>

        <!-- Sidebar -->
        <aside class="col-md-4">
            <div class="card border-0 shadow-sm sticky-top" style="top: 80px;">
                <div class="card-header bg-primary text-white fw-bold"><i class="fas fa-star me-2"></i>Thể loại tin</div>
                <ul class="list-group list-group-flush">
                    @foreach($categories as $category)
                        <li class="list-group-item">
                            <a href="{{ route('home', ['category_id' => $category->id]) }}" 
                               class="text-decoration-none {{ $news->id_category == $category->id ? 'text-primary fw-bold' : 'text-dark' }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </aside>
    </div>
</section>

<!-- Popup đăng nhập -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Đăng nhập</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
                </form>
                <p class="mt-3 text-center">
                    Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký ngay</a>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript để tự động mở popup nếu cần đăng nhập -->
<script>
    @if(session('login_required'))
        // Nếu có session('login_required'), tự động mở popup đăng nhập
        document.addEventListener('DOMContentLoaded', function() {
            var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
            loginModal.show();
        });
    @endif
</script>

@endsection