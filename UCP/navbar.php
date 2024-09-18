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
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?page=rankinglevel">Top Level</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?page=rankinggrana">Top Grana</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?page=casasliberadas">Casas</a>
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