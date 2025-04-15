<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Gerenciador de Botões')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar topo -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
    <a class="navbar-brand" href="{{ route('dashboard.index') }}">Boleirada do Caju</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menuPrincipal">
        <ul class="navbar-nav ms-auto">
            @auth
                <li class="nav-item d-flex align-items-center text-white me-3">
                    👤 {{ Auth::user()->first_name }}
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('auth.logout') }}">Sair</a></li>
            @endauth
        </ul>
    </div>
</nav>

<!-- Layout com Sidebar e Conteúdo -->
<div class="container-fluid">
    <div class="row">
        @auth
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block bg-light sidebar py-4">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('dashboard.index') }}">🏠 Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">📅 Jogos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">⚙️ Configurações</a>
                        </li>
                    </ul>
                </div>
            </nav>
        @endauth

        <!-- Conteúdo -->
        <main class="col-md-10 ms-sm-auto col-lg-10 px-4 mt-3">
            @yield('content')
        </main>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')
</body>
</html>
