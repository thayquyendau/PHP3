@extends('client')
@section('title', 'Đặt lại mật khẩu')
@section('content')

<section class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-lg p-4" style="border-radius: 15px;">
                <div class="card-body">
                    <h1 class="fw-bold text-danger mb-4 text-center">
                        <i class="fas fa-lock me-2"></i> Đặt lại mật khẩu
                    </h1>
                    @if(session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold">Email của bạn</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-envelope"></i></span>
                                <input id="email" type="email" class="form-control form-control-lg" name="email" value="{{ old('email') }}" required placeholder="Nhập email của bạn">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold">Mật khẩu mới</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-lock"></i></span>
                                <input id="password" type="password" class="form-control form-control-lg" name="password" required placeholder="Nhập mật khẩu mới">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-bold">Xác nhận mật khẩu</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-lock"></i></span>
                                <input id="password_confirmation" type="password" class="form-control form-control-lg" name="password_confirmation" required placeholder="Xác nhận mật khẩu">
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger btn-lg fw-bold">Đặt lại mật khẩu</button>
                        </div>
                        <p class="mt-3 text-center">
                            Quay lại <a href="{{ route('login') }}" class="text-primary fw-bold">Đăng nhập</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection