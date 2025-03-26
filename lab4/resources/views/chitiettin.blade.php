@extends('layout')
@section('title', 'Chi tiet tin')
@section('content'): 

    <!-- Main Content -->
    <div class="container mt-5 pt-4">
        <div class="content-container">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{-- {{ route('tin.xemnhieu') }} --}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chi tiết tin</li>
                </ol>
            </nav>

            <h1 class="title">{{ $tin->tieude }}</h1>
            <h3 class="summary">{{ $tin->tomTat }}</h3>
            <div id="noidung" class="noidung">{!! $tin->noiDung !!}</div>

            <!-- Back Button -->
            <div class="mt-4 text-end">
                <a href="{{ route('tin.moi') }}" class="back-btn">Quay lại</a>
            </div>
        </div>
    </div>

@endsection;


