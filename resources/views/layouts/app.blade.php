<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Styles -->
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <style>
    body {
      padding-bottom: 100px;
    }

    .level {
      display: flex;
      align-items: center;
    }

    .flex {
      flex: 1;
    }

    .mr-1 {
      margin-right: 1em;
    }

    [v-cloak] {
      display: none;
    }
  </style>

  <!-- Scripts -->
  <script>
    window.App = {!! json_encode([
            'csrfToken' => csrf_token(),
            'signedIn' => auth()->check(),
            'user' => auth()->user()
        ]) !!}
  </script>
</head>
<body style="padding-bottom: 100px">
<div id="app">
  @include('layouts._nav')
  @yield('content')

  <flash message="{{ session('flash') }}"></flash>
</div>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
