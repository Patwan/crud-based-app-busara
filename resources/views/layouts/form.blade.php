<!DOCTYPE html>
<html>
<head>
<title> @yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Smooth Sliding Forms" />
<meta name="author" content="Martin Njogu Ndungu">

<!-- Custom Theme files -->
 <link href="{{ asset('css/Formstyle/style.css') }}" rel="stylesheet">

<!-- Link to Parsley.css -->
 <link href="{{ asset('css/parsley.css') }}" rel="stylesheet">

<!-- font-awesome icons -->
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<!-- //font-awesome icons -->
<link href="{{ asset('css/popup-box.css') }}" rel="stylesheet" type="text/css">

<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Cormorant+Unicase:300,400,500,600,700" rel="stylesheet"><!--web font-->
<!-- //web font -->
</head>
<body>
@yield('content')

@include('partials._footer')

</body>
</html>