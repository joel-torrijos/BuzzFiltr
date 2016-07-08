<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF=8">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	@yield('header')
</head>

<body>
	@yield('content')

	@yield('footer')
</body>
</html>