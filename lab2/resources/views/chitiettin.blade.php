<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Chi tiết tin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .content-container {
            max-width: 900px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .title {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .summary {
            color: #6c757d;
            font-size: 1.1rem;
            margin-bottom: 20px;
        }
        #noidung {
            color: #333;
            line-height: 1.8;
            font-size: 1rem;
        }
        .noidung p {
            margin-bottom: 15px;
        }
        .breadcrumb-item a {
            color: #007bff;
            text-decoration: none;
        }
        .breadcrumb-item a:hover {
            color: #0056b3;
        }
        .back-btn {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .back-btn:hover {
            background-color: #5a6268;
            color: white;
        }
        @media (max-width: 768px) {
            .content-container {
                padding: 15px;
                margin: 0 10px;
            }
            .title {
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
                        <a class="nav-link" href="{{ route('tin.moi')}}">Tin moi nhat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Liên hệ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5 pt-4">
        <div class="content-container">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('tin.xemnhieu') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chi tiết tin</li>
                </ol>
            </nav>

            <h1 class="title">{{ $tin->tieude }}</h1>
            <h3 class="summary">{{ $tin->tomTat }}</h3>
            <div id="noidung" class="noidung">{!! $tin->noiDung !!}</div>

            <!-- Back Button -->
            <div class="mt-4 text-end">
                <a href="{{ route('tin.xemnhieu') }}" class="back-btn">Quay lại</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>