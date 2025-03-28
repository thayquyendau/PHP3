@extends('client')
@section('title', 'Đăng nhập')
@section('content')

<section class="container my-5">
    <h1 class="fw-bold text-danger mb-4">Đăng nhập</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4">
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
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
                    <div class=" d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                        <a class="mt-3" href="{{ route('password.request')}}">Quên mật khẩu?</a>
                    <p class="mt-3 ">Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký ngay</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection