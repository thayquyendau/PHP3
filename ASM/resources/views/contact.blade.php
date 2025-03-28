@extends('client')
@section('title', 'Liên hệ')
@section('content')

<section class="container my-5">
    <h1 class="fw-bold text-danger mb-4">Liên hệ với chúng tôi</h1>
    <div class="row">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm p-4">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Tin nhắn</label>
                        <textarea class="form-control" id="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection