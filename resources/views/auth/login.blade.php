@extends('layouts.app')

@section('content')

    <section class="login-clean">
        <form method="POST" action="{{ route('login') }}" style="box-shadow: 5px 5px 5px rgba(80,94,108,0.49);">
        @csrf
            <h2 class="visually-hidden">Login Form</h2>
            <div class="illustration"><img src="{{asset('welcome_assets/img/bisubal_ttg.png')}}" style="width: 200px;"></div>
            <div class="mb-3">
                <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <button class="btn btn-primary d-block w-100" type="submit" style="background: var(--bs-orange);">Log In</button>
            </div>
            
            @if (Route::has('password.request'))
            <a class="forgot" href="{{ route('password.request') }}">Forgot your email or password?</a>
            @endif
        </form>
    </section>
    <section id="about" class="features-blue"></section>
@endsection
