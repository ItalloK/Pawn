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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" onclick="return false;">
                        Ranking
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="?page=rankinglevel">Ranking Level</a></li>
                        <li><a class="dropdown-item" href="?page=rankinggrana">Ranking Grana</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?page=funcionario-listar">Funcionários</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?page=departamento-listartodos">Departamentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?page=local_departamentos_listar">Local Departamentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?page=trabalhaem-listartodos">Trabalha Em</a>
                </li>
                <li class="nav-item">
                    <b><a class="nav-link active" aria-current="page" href="logout.php" style="color: red;">Sair</a></b>
                </li>
            </ul>
        </div>
    </div>
</nav>