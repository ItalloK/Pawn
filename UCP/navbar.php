<?php 
    include('protect.php');
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="home.php">HeadShot Server</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Rankings
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="?page=rankinglevel">Top Level</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="?page=rankinggrana">Top Grana</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="?page=rankingcoins">Top Coins</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="?page=rankingmatoumorreu">Top K/D</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="?page=rankingtempovip">Top VIPs</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Casas
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="?page=casasliberadas">Casas a Venda</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="?page=casasvendidas">Casas Vendidas</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Bases
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="?page=basesavenda">Bases a Venda</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="?page=basesvendidas">Bases Vendidas</a>
                        </li>
                    </ul>
                </li>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Postos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="?page=valorescombustivel">Valores Combustivel</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="?page=postosavenda">Postos a Venda</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="?page=postosvendidos">Postos Vendidos</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?page=minhaconta">Minha Conta</a>
                </li>
                <li class="nav-item">
                    <b><a class="nav-link active" aria-current="page" href="logout.php" style="color: red;">Sair</a></b>
                </li>
            </ul>
        </div>
    </div>
</nav>