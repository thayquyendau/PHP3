@extends('client')
@section('title', 'Newpapers')
@section('content')

<section class="hero mt-5">
    <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $active = "active";
            foreach ($featuredNews as $item) {
                echo '<div class="carousel-item ' . $active . '">';
                echo '<img src="' . $item->img . '" class="d-block w-100" alt="' . $item->title . '" style="max-height: 400px; object-fit: cover;" loading="lazy">';
                echo '<div class="carousel-caption d-none d-md-block">';
                echo '<h2 class="fw-bold text-shadow">' . $item->title . '</h2>';
                echo '<p class="text-shadow">' . Str::limit($item->content, 100) . '</p>'; 
                echo '<a href="' . route('news.detail', $item->id) . '" class="btn btn-danger fw-bold">Xem ngay</a>';
                echo '</div>';
                echo '</div>';
                $active = "";
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next color-danger" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<section class="container my-5">
    <div class="row">
        <main class="col-md-8">
            <!-- Form tìm kiếm -->
            <div class="mb-4 d-flex justify-content-between align-items-center">
                <h2 class="mb-0 fw-bold text-danger">
                    <i class="fas fa-fire"></i> 
                    @if(request()->has('keyword'))
                        Kết quả tìm kiếm: "{{ request()->keyword }}"
                    @elseif(request()->has('category_id'))
                        Tin tức: {{ $categories->where('id', request()->category_id)->first()->name ?? 'Không xác định' }}
                    @else
                        Tin mới nhất
                    @endif
                </h2>
                <form class="d-flex ms-3" method="GET" action="{{ route('home') }}">
                    <input class="form-control me-2" type="search" name="keyword" placeholder="Tìm kiếm..." 
                           aria-label="Search" value="{{ request()->keyword ?? '' }}">
                    <button class="btn btn-danger" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>

            <!-- Tin mới -->
            <div class="row row-cols-1 row-cols-md-2 g-4">
                @forelse($news as $item)
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm hover-effect">
                            <img src="{{ $item->img }}" class="card-img-top" alt="{{ $item->title }}" style="height: 150px; object-fit: cover;" loading="lazy">
                            <div class="card-body">
                                <span class="text-muted small">Ngày đăng: <i class="fas fa-calendar-alt"></i> {{ $item->created_at }} </span>
                                <span class="text-muted small ms-3"><i class="fas fa-eye"></i> {{ $item->views }} lượt xem</span>
                                <h5 class="card-title fw-bold mt-2">{{ $item->title }}</h5>
                                {{-- Giới hạn nội dung --}}
                                <p class="card-text text-muted">{{ Str::limit($item->content, 100) }}</p>
                                <a href="{{ route('news.detail', $item->id) }}" class="btn btn-outline-primary stretched-link">Đọc thêm</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">
                        @if(request()->has('keyword'))
                            Không tìm thấy tin tức nào với từ khóa "{{ request()->keyword }}".
                        @elseif(request()->has('category_id'))
                            Không có tin tức nào trong danh mục này.
                        @else
                            Không có tin tức nào.
                        @endif
                    </p>
                @endforelse
            </div>

            <!-- Tin xem nhiều -->
            @if($popularNews->isNotEmpty())
                <div class="mt-5">
                    <h3 class="fw-bold text-danger mb-4"><i class="fas fa-eye me-2"></i>Tin xem nhiều</h3>
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        @foreach($popularNews as $item)
                            <div class="col">
                                <div class="card h-100 border-0 shadow-sm hover-effect">
                                    <img src="{{ $item->img }}" class="card-img-top" alt="{{ $item->title }}" style="height: 150px; object-fit: cover;" loading="lazy">
                                    <div class="card-body">
                                        <span class="text-muted small"><i class="fas fa-calendar-alt"></i> {{ $item->created_at }} </span>
                                        <span class="text-muted small ms-3"><i class="fas fa-eye"></i> {{ $item->views }} lượt xem</span>
                                        <h5 class="card-title fw-bold mt-2">{{ $item->title }}</h5>
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

        <!-- Sidebar danh mục -->
        <aside class="col-md-4">
            <div class="card border-0 shadow-sm sticky-top" style="top: 80px;">
                <div class="card-header bg-primary text-white fw-bold"><i class="fas fa-star"></i> Thể loại tin</div>
                <ul class="list-group list-group-flush">
                    @foreach($categories as $category)
                        <li class="list-group-item">
                            <a href="{{ route('home', ['category_id' => $category->id]) }}" 
                               class="text-decoration-none {{ request()->category_id == $category->id ? 'text-primary fw-bold' : 'text-dark' }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </aside>
    </div>
</section>

@endsection