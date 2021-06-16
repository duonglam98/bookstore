<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    {{-- <title>Nhà Sách Nhân Dân</title> --}}
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Book store | @yield('title')</title>

    <base href="{{ asset('') }}">
    <!-- Site Icons -->
    <link rel="shortcut icon" href="/bookstore/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="/bookstore/images/apple-touch-icon.png">

  

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond./bookstore/js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @include('partials.style')
</head>


<body>
    
    @include('partials.header')
  
    @yield('content')

    @include('partials.footer')

    @include('partials.script')
</body>

</html>
