<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
@include('front.layouts.header_css')
</head>
<body class="">

@include('front.layouts.header')

@yield('content')

@include('front.layouts.footer')

@include('front.layouts.footer_js')
</body>
</html>