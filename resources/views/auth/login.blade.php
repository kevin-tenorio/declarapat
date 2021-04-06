<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Declarapat - Declaración Patrimonial</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
  <link href="./css/style.css" rel="stylesheet">
</head>

<body class="h-100">
	<div class="authincation h-100">
		<div class="container h-100">
			<div class="row justify-content-center h-100 align-items-center">
				<div class="col-md-6">
					<div class="authincation-content">
						<div class="row no-gutters">
							<div class="col-xl-12">
								<div class="auth-form">
									<h4 class="text-center mb-4">Ingresa a tu cuenta:</h4>
									<form method="POST" action="{{ route('login') }}">
										@csrf
										<div class="form-group">
											<label for="rfc" class="mb-1"><strong>RFC:</strong></label>
											<input id="rfc" type="text" class="form-control @error('rfc') is-invalid @enderror" name="rfc" value="{{ old('rfc') }}" required autocomplete="off" autofocus>
											@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
										<div class="form-group">
											<label for="pass" class="mb-1"><strong>Contraseña:</strong></label>
											<input id="pass" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
											@error('password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
										<div class="form-row d-flex justify-content-between mt-4 mb-2">
											<div class="form-group">
												@if(Route::has('password.request'))
												<a class="btn btn-link" href="{{ route('password.request') }}">
													{{ __('¿Olvidaste tu contraseña?') }}
												</a>
												@endif
											</div>
										</div>
										<div class="text-center">
											<button type="submit" class="btn btn-primary btn-block">{{ __('Ingresar') }}</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="./vendor/global/global.min.js"></script>
	<script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="./js/custom.min.js"></script>
	<script src="./js/deznav-init.js"></script>
</body>
</html>
