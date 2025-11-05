@include('layouts.navbar')
<style>
    body {
        background: linear-gradient(135deg, #fce4ec, #e0f7fa);
        font-family: 'Poppins', sans-serif;
    }
    .login-box {
        width: 420px;
        margin: 70px auto;
        background: #fff;
        padding: 35px;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }
    .login-box h2 {
        text-align: center;
        font-weight: 700;
        color: #007bff;
        margin-bottom: 25px;
    }
    .form-control { border-radius: 10px; }
    .btn-login {
        width: 100%;
        background: linear-gradient(90deg, #007bff, #00bcd4);
        border: none;
        border-radius: 10px;
        color: white;
        font-weight: 600;
        padding: 10px;
        transition: all 0.3s;
    }
    .btn-login:hover { transform: scale(1.03); }
    .footer-link { text-align: center; margin-top: 15px; }
    .footer-link a { color: #007bff; text-decoration: none; }
    .footer-link a:hover { text-decoration: underline; }
</style>

<div class="login-box">
    <h2>Registration</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus>
            @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required>
            @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" class="form-control" type="password" name="password" required>
            @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required>
            @error('password_confirmation') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" name="remember" id="remember">
            <label class="form-check-label" for="remember">Remember Me</label>
        </div>

        <button type="submit" class="btn btn-login">Register</button>

        <div class="footer-link">
            Already have an account? <a href="{{ route('login') }}">Login</a>
        </div>
    </form>
</div>
