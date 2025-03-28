<header class="bg-gradient-dark text-white py-3 shadow-lg fixed-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3">
                <a href="{{ route('home') }}" class="text-white text-decoration-none">
                    <h1 class="h3 mb-0 fw-bold"><i class="fas fa-newspaper"></i> Tin Tức 24h</h1>
                </a>
            </div>
            <div class="col-md-9">
                <nav class="navbar navbar-expand-md navbar-dark">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link fw-bold {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Trang chủ</a>
                            </li>
                            @foreach($categories as $category)
                                <li class="nav-item">
                                    <a class="nav-link fw-bold {{ request()->category_id == $category->id ? 'active' : '' }}" 
                                       href="{{ route('home', ['category_id' => $category->id]) }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                            <li class="nav-item">
                                <a class="nav-link fw-bold {{ request()->routeIs('review') ? 'active' : '' }}" href="{{ route('review') }}">Giới thiệu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Liên hệ</a>
                            </li>
                        </ul>

                        <!-- Phần đăng nhập -->
                        @if (session('user'))
                            <div class="dropdown ms-3">
                                <button class="btn btn-outline-light dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user"></i> {{ session('user')['name'] }}
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    @if (session('user')['role'] == 'admin')
                                        <li><a class="dropdown-item" href="{{ route('profile', session('user')['id']) }}">Thông tin tài khoản</a></li>
                                        <li><a class="dropdown-item" href="{{ route('admin.news.list') }}">Quản lý tin tức</a></li>
                                    @else
                                        <li><a class="dropdown-item" href="{{ route('profile', session('user')['id']) }}">Thông tin tài khoản</a></li>
                                    @endif
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="{{ route('logout') }}">Đăng xuất</a></li>
                                </ul>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-light ms-3"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
                        @endif
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>