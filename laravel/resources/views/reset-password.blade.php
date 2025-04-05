<!DOCTYPE html>
<html>
<head>
    <title>Đặt lại mật khẩu</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 50px auto; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
    <h1>Đặt lại mật khẩu</h1>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div>
            <label for="email">Email:</label><br>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="password">Mật khẩu mới:</label><br>
            <input id="password" type="password" name="password" required>
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="password_confirmation">Xác nhận mật khẩu:</label><br>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>
        <br>
        <button type="submit">Đặt lại mật khẩu</button>
    </form>
</body>
</html>