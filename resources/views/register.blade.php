<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Register</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="{{asset('img/user.png')}}" alt="bootstrap 4 login page">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title text-center">Register</h4>
							<form method="POST" class="my-login-validation" novalidate="">
								<div class="form-group col-md-12 mx-auto">
									<label for="name">Name</label>
									<input id="name" type="text" class="form-control" name="name" required autofocus>
									<div class="invalid-feedback">
										What's your name?
									</div>
								</div>

								<div class="form-group col-md-12 mx-auto">
									<label for="institution">Institution</label>
									<input id="institution" type="text" class="form-control" name="institution" required autofocus>
									<div class="invalid-feedback">
										What's your institution?
									</div>
								</div>

								<div class="form-group col-md-6 d-inline-block">
									<label for="address">Address</label>
									<input id="address" type="text" class="form-control" name="address" required autofocus>
									<div class="invalid-feedback">
										What's your address?
									</div>
								</div><div class="form-group col-md-6 d-inline-block">
									<label for="city">City / Town</label>
									<input id="city" type="text" class="form-control" name="city" required autofocus>
									<div class="invalid-feedback">
										What's your city?
									</div>
								</div>

								<div class="form-group col-md-4 d-inline-block">
									<label for="state">State</label>
									<input id="state" type="text" class="form-control" name="state" required autofocus>
									<div class="invalid-feedback">
										What's your state?
									</div>
								</div><div class="form-group col-md-4 d-inline-block">
									<label for="country">Country</label>
									<input id="country" type="text" class="form-control" name="country" required autofocus>
									<div class="invalid-feedback">
										What's your country?
									</div>
								</div><div class="form-group col-md-4 d-inline-block">
									<label for="zipcode">Zip Code</label>
									<input id="zipcode" type="text" class="form-control" name="zipcode" required autofocus>
									<div class="invalid-feedback">
										What's your Zip code?
									</div>
								</div>

								<div class="form-group col-md-12">
									<label for="position">Position</label>
									<input id="position" type="text" class="form-control" name="position" required autofocus>
									<div class="invalid-feedback">
										What's your position?
									</div>
								</div>

								<div class="form-group col-md-12">
									<label for="phone">Phone number</label>
									<input id="phone" type="text" class="form-control" name="phone" required autofocus>
									<div class="invalid-feedback">
										What's your phone number?
									</div>
								</div>

								<div class="form-group col-md-12">
									<label for="link">CV/Linked/Research gate profile</label>
									<input id="link" type="text" class="form-control" name="link" required autofocus>
									<div class="invalid-feedback">
										What's your Zip code?
									</div>
								</div>

								<div class="form-group col-md-12">
									<label for="email">E-mail</label>
									<input id="email" type="email" class="form-control" name="email" required>
									<div class="invalid-feedback">
										Your email is invalid
									</div>
								</div>

								<div class="form-group col-md-12">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
									<div class="invalid-feedback">
										Password is required
									</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="agree" id="agree" class="custom-control-input" required="">
										<label for="agree" class="custom-control-label">I agree to the <a href="#">Terms and Conditions</a></label>
										<div class="invalid-feedback">
											You must agree with our Terms and Conditions
										</div>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Register
									</button>
								</div>
								<div class="mt-4 text-center">
									Already have an account? <a href="login">Login</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2019
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="{{asset('js/my-login.js')}}"></script>
</body>
</html>