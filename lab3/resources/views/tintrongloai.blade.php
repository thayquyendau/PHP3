@extends('layout')
@section('title', 'Loai tin')
@section('content'): 

    <!-- Main Content -->
    <div class="container news-container mt-5 pt-4">
        <h1 class="text-center mb-4 category-header">Tin theo loại {{ $idLoai }}</h1>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($data as $tin)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $tin->tieude }}</h5>
                            <p class="card-text">{{ $tin->tomTat }}</p>
                            <a href=" {{ route('tin.id', $tin->id) }} " class="btn btn-danger">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center text-muted">Không có tin tức nào trong loại này.</p>
                </div>
            @endforelse
        </div>
    </div> 

@endsection;