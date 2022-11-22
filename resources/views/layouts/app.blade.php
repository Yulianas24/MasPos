<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>{{ $title }}</title>
</head>
<body>
  @include('layouts.navbar')
  <div class="mt-5">
    @yield('content')
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  @include('scripts.script')
</body>
</html>