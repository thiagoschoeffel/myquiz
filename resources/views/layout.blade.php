<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MyQuiz</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

    <style>
        body {
            padding-top: calc(73px + 3rem);
        }

        .table {
            white-space: nowrap
        }

        .table tr th,
        .table tr td {
            vertical-align: middle;
        }

    </style>
</head>

<body>
    @auth()
    <header class="navbar py-3 fixed-top navbar-expand-md navbar-light bg-light border-bottom shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="bi bi-filter-right"></i>
                MyQuiz
            </a>

            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mainNavBar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavBar">
                <nav class="navbar-nav me-auto">
                    <span class="nav-item my-2 my-md-0">
                        <a href="{{ route('quiz') }}" class="nav-link">Questionários</a>
                    </span>
                </nav>

                <nav class="navbar-nav">
                    <span class="navbar-text me-3">
                        Olá, <strong>{{ Auth::user()->name }}</strong>
                    </span>

                    <span class="nav-item mt-2 mt-md-0">
                        <a href="{{ route('logout') }}" class="nav-link text-danger text-decoration-none">
                            <i class="bi bi-box-arrow-left"></i>
                            Sair
                        </a>
                    </span>
                </nav>
            </div>
        </div>
    </header>
    @endauth

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>

</html>
