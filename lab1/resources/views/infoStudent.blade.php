<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Giới Thiệu Sinh Viên</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome cho icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        .profile-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 40px;
            margin: 50px auto;
            max-width: 900px;
            overflow: hidden;
            position: relative;
        }
        .profile-img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #fff;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            transition: transform 0.3s ease;
        }
        .profile-img:hover {
            transform: scale(1.05);
        }
        .social-links a {
            color: #2c3e50;
            margin: 0 10px;
            font-size: 1.5rem;
            transition: color 0.3s ease;
        }
        .social-links a:hover {
            color: #007bff;
        }
        .skill-badge {
            background: #007bff;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            margin: 5px;
            display: inline-block;
        }
        .section-title {
            color: #2c3e50;
            border-bottom: 3px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .btn-contact {
            background: #007bff;
            border: none;
            padding: 10px 30px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        .btn-contact:hover {
            background: #0056b3;
            transform: translateY(-2px);
        }
        @media (max-width: 768px) {
            .profile-card {
                padding: 20px;
            }
            .profile-img {
                width: 150px;
                height: 150px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile-card">
            <div class="row align-items-center">
                <!-- Ảnh đại diện -->
                <div class="col-md-4 text-center">
                    <img src="lab1\resources\image\z5466592084200_862b8f1aff8d79bf0c9435f68daef384.jpg" class="profile-img" alt="Ảnh sinh viên">
                    <h3 class="mt-3">Dau Van Quyen</h3>
                    <p class="text-muted">Sinh viên Công nghệ Thông tin</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <!-- Thông tin chi tiết -->
                <div class="col-md-8">
                    <h2 class="section-title">Giới Thiệu Bản Thân</h2>
                    <p>
                        Xin chào! Tôi là Dau Van Quyen, hiện đang là sinh viên năm 3 chuyên ngành Công nghệ Thông tin tại Trường Đại học XYZ. 
                        Với niềm đam mê mãnh liệt dành cho lập trình, tôi luôn nỗ lực học hỏi và phát triển bản thân qua các dự án thực tế.
                    </p>
                    
                    <h4 class="section-title">Thông Tin Cá Nhân</h4>
                    <ul class="list-unstyled">
                        <li><strong>Mã SV:</strong> PA00242</li>
                        <li><strong>Email:</strong> quyendau1603@gmail.com</li>
                        <li><strong>Ngày sinh:</strong> 16/03/2005</li>
                        <li><strong>Địa chỉ:</strong> Dien Chau, Nghe An</li>
                    </ul>

                    <h4 class="section-title">Kỹ Năng</h4>
                    <div>
                        <span class="skill-badge">HTML/CSS</span>
                        <span class="skill-badge">JavaScript</span>
                        <span class="skill-badge">PHP</span>
                        <span class="skill-badge">Bootstrap</span>
                    </div>

                    <div class="mt-4 text-center">
                        <button class="btn btn-contact">Liên Hệ Với Tôi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>