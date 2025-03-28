<!DOCTYPE html>
<html>
<head>
    <title>Quên mật khẩu</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 50px auto; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
    <h1>Quên mật khẩu</h1>
    @if (session('status'))
        <div class="success">{{ session('status') }}</div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div>
            <label for="email">Email:</label><br>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <button type="submit">Gửi liên kết đặt lại mật khẩu</button>
    </form>
</body>
</html>