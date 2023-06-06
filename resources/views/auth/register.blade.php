@extends('layouts.app')

@section('style')
    <style>
        .text {
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }

        @media(max-width:991px) {
            .text {
                border-radius: 30px;
                margin-left: 30px;
            }
        }
    </style>
@endsection

@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="username"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        value="{{ old('username') }}" required autocomplete="name" autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container">
        <div class="row p-5 m-5 d-flex flex-wrap-reverse" style="min-height: 85vh;">
            <div
                class="text col-lg-5 bg-dark text-white d-flex flex-column justify-content-center align-items-center mt-5 pt-5">
                <h1>Welcome Back !</h1>
                <p class="lead mt-5 text-center">Already have an account? Log in to stay connected with us</p>
                <a href="/login" class="btn btn-primary btn-light rounded-pill mt-4 mb-5">
                    {{ __('Login') }}
                </a>

            </div>

            <div class="col-lg-7 d-flex flex-column justify-content-center align-items-center ps-5">
                <h1 class="fw-bold mb-1">Sign up to</h1>
                <img src="./M.A.R.S.png" alt="" class="img-fluid mb-3 ms-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                            </div>
                            <input id="name" type="text" placeholder="Name"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            </div>
                            <input id="email" type="email" placeholder="Email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            </div>
                            <input id="username" type="text" placeholder="Username"
                                class="form-control @error('username') is-invalid @enderror" name="username"
                                value="{{ old('username') }}" required autocomplete="username" autofocus>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            </div>
                            <input id="password" type="password" placeholder="Password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            </div>
                            <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="lower-area d-flex flex-column justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary rounded-pill">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>


            </div>


        </div>
    </div>
@endsection
