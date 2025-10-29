<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dashboard</title>
</head>
<body>
	<h1>Dashboard</h1>

	<div>
		@if(session('admin'))
			<p>Welcome, <strong>{{ session('admin.name') ?? session('admin.email') }}</strong></p>

			<form method="POST" action="{{ route('auth.logout') }}">
				@csrf
				<button type="submit">Logout</button>
			</form>
		@else
			<p>Welcome, Guest</p>
			<p><a href="{{ route('halaman-login') }}">Admin login</a></p>
		@endif
	</div>

	<!-- ...existing dashboard content... -->
</body>
</html>
