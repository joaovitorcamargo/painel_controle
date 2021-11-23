<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="painel-height d-flex align-items-center justify-content-center">
    <div class="row painel-width-layout">
        <div class="mb-5 col-md-3 painel-menu d-flex flex-column align-items-center justify-content-center">
            <a href="{{route('painel.home')}}" class="painel-menu-link">Home</a>
            @if (Auth::user()->is_admin == 1)
                <a href="{{route('painel.register')}}" class="painel-menu-link">Adicionar Herois</a>
            @endif
            <a class="btn btn-warning mt-3" href="{{route('painel.logout')}}">Logout</a>
        </div>
        <div class="col-md-9">
            @yield('content')
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
