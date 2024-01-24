<!-- for header part -->
<header>

    <nav class="navbar navbar-expand-lg bg-light fixed-top shadow ">
        <div class="container-fluid">
            <!-- Logo no lado esquerdo -->
            <div>
                <button class="btn" id="menuicn"><i class="bi bi-list fs-4"></i></button>
                <a class="navbar-brand" href="#">
                    <img src="/public/assets/images/logo.png" alt="Logo" height="40">
                </a>
            </div>

            <!-- Botão de toggle para dispositivos menores -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <!-- Dropdown no lado direito -->
            <div class="navbar-nav">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-4"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/ata">Perfil</a></li>
                        <li><a class="dropdown-item" href="#">Configurações</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sair</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>


<div id="verticalNav" class="list-group bg-light list-group-flush">
    <a href="/" class="list-group-item list-group-item-action"><i class="bi bi-speedometer2 fs-4"></i> Dashboard</a>
    <a href="/ata" class="list-group-item list-group-item-action"><i class="bi bi-pencil-square fs-4"></i>Ata</a>
</div>