<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Admin</title>
</head>
<body>
	<h1>Admin Login</h1>

	@if($errors->any())
		<ul style="color:#b00020;">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif

	<form method="POST" action="{{ url('/auth/proses-login') }}">
		@csrf
		<div>
			<label>Email</label>
			<input type="email" name="email" value="{{ old('email') }}" required autofocus>
		</div>

		<div>
			<label>Password</label>
			<input type="password" name="password" required>
		</div>

		<div>
			<button type="submit">Login</button>
		</div>
	</form>
</body>
</html>
