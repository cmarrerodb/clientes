<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CLIENTES ZLOGISTIK</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" /> --}}
</head>
<body>
    <div class="card">
        <div class="card-header">
            {{ config('lenguages.'.app()->getLocale().'.APP_LANGUAGE') }} {{ app()->getLocale()=='en' ? 'English' : 'Español' }}
        </div>
    </div>
  <div class="container">
    @yield('content')
  </div>
  {{-- <script src="{{ asset('js/app.js') }}" type="text/js"></script> --}}
</body>
</html>
