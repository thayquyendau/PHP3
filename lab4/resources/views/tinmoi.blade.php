<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Tin mới</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f1f3f5;
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .news-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .card {
            border: none;
            border-radius: 12px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: #ffffff;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: #34495e;
        }
        .card-text {
            font-size: 0.95rem;
            color: #7f8c8d;
        }
        .date-text {
            font-size: 0.9rem;
            color: #95a5a6;
        }
        .header-title {
            color: #2c3e50;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 30px;
        }
        .btn-custom {
            background-color: #2ecc71;
            color: white;
            border-radius: 5px;
            padding: 6px 12px;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #27ae60;
        }
        @media (max-width: 768px) {
            .card {
                margin-bottom: 20px;
            }
            .header-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">News Portal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tin.moi')}}">Tin </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Liên hệ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container news-container mt-5 pt-4">
        <h1 class="text-center header-title">Tin Tuc</h1>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($data as $tin)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $tin->tieude }}</h5>
                            <p class="card-text">{{ $tin->tomTat }}</p>
                            <p class="date-text">Ngày đăng: {{ \Carbon\Carbon::parse($tin->ngayDang)->format('d/m/Y') }}</p>
                            <a href="{{ route('tin.id', $tin->id) }}" class="btn btn-custom mt-2">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center text-muted">Không có tin tức mới nào.</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>