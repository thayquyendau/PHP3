@extends('client')
@section('title', 'Gửi mail')
@section('content')


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

@endsection
