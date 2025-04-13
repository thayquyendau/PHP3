<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
    <title>Gửi mail</title>
</head>
<body>
    
    <div class="container shadow rounded ">
        <h1 class="text-center">Trang gửi mail</h1>
        <form action="{{ route('send.email') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="" class="form-label">Mail người nhận</label>
                <input type="text" class="form-control" name="to_email">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Tiêu đề</label>
                <input type="text" name="subject">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Nội dung</label>
                <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Hình ảnh</label>
                <input type="file" name="image" id="">
            </div>
            <button class="btn btn-primary">Gửi mail</button>
        </form>
    </div>



</body>
</html>