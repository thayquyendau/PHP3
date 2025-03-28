@extends('client')
@section('title', 'Thông tin tài khoản')
@section('content')

<section class="container my-5">
    <h1 class="fw-bold text-danger mb-4">Thông tin tài khoản</h1>
    <div class="row">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm p-4">
                <p><strong>Họ và tên:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Vai trò:</strong> {{ $user->role == 'Admin' ? 'Quản trị Viên' : 'Người dùng';}}</p>
            </div>
        </div>
    </div>
</section>

@endsection