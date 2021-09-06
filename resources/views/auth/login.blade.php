<!-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection -->


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Login page</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
			
					<div class="cardx fat mt-5">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<form method="POST" class="my-login-validation" autocomplete="off" action="{{ route('login') }}">
                                @csrf
								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus placeholder="Enter email">
                                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
								</div>

								<div class="form-group">
									<label for="password">Password
										<a href="{{route('password.request')}}" class="float-right">
											Forgot Password?
										</a>
									</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye placeholder="Enter password">
                                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Remeber Me</label>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Login
									</button>
								</div>
								<div class="mt-4 text-center">
									Don't have an account? <a href="{{route('register')}}">Create One</a>
								</div>
							</form>
						</div>
					</div>
				
				</div>
			</div>
		</div>
	</section>


	<script src="bootstrap/js/popper.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="js/my-login.js"></script>
</body>
</html>