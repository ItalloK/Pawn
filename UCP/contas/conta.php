<?php 
    include('conexao.php');
    require 'funcoes.php';

    if(isset($_GET['nick'])) {
        $nick = $_GET['nick'];
    } else {
        echo "<script>alert('Nick não informado!'); window.location.href='home.php?page=casasvendidas';</script>";
    }

    $sql = "SELECT Nick, Level, Skin, Profissao, Sexo, Procurado, Coins, Matou, Morreu, Luta, 
            PlanoDeSaude, Vacinas, KitsMedico, Aposentado, Logado
            FROM jogadores WHERE Nick = '".$conn->real_escape_string($nick)."'";
    $result = $conn->query($sql);

    $defaultImagePath = "img/skins/0.png";
    $imagePath = $defaultImagePath;

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $skinID = $row['Skin'];
        $nick = $row['Nick'];
        $profissao = $row['Profissao'];
        $level = $row['Level'];
        $logado = $row['Logado'];
        $sexo = $row['Sexo'];
        $procurado = $row['Procurado'];
        $coins = $row['Coins'];
        $matou = $row['Matou'];
        $morreu = $row['Morreu'];
        $luta = $row['Luta'];
        $planoDeSaude = $row['PlanoDeSaude'];
        $vacinas = $row['Vacinas'];
        $kitsMedico = $row['KitsMedico'];
        $aposentado = $row['Aposentado'];

        $imagePath = "img/skins/" . $skinID . ".png";
        if (!file_exists($imagePath)) {
            $imagePath = $defaultImagePath;
        }
    } else {
        echo "<script>alert('Nick não encontrado!'); window.location.href='home.php?page=casasvendidas';</script>";
        exit;
    }
?>


<section style="background-color: #eee;">
  <div class="row">
    <div class="col-lg-4">
      <div class="card mb-4">
        <div class="card-body text-center">
          <img src="<?php echo $imagePath; ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
          <h5 class="my-3"><?php echo $nick; ?></h5>
          <p class="text-muted mb-1">Profissão: <?php echo VerificarProfissao($profissao);?></p>
          <p class="text-muted mb-4">Level: <?php echo $level;?></p>
          <p class="text-muted mb-1">Status: <?php echo VerificarLogin($logado);?></p>
        </div>
      </div>
      <div class="card mb-4 mb-lg-0">
        <div class="card-body p-0">
          <ul class="list-group list-group-flush rounded-3">
            <li class="list-group-item d-flex align-items-center p-3">
              <i class="fas fa-globe fa-lg text-warning"></i>
              <p class="mb-0">Casa: <?php echo VerificarCasa($conn, $nick);?></p>
            </li>
            <li class="list-group-item d-flex align-items-center p-3">
              <i class="fas fa-globe fa-lg text-warning"></i>
              <p class="mb-0">Empresa: <?php echo VerificarEmpresa($conn, $nick);?></p>
            </li>
            <li class="list-group-item d-flex align-items-center p-3">
              <i class="fas fa-globe fa-lg text-warning"></i>
              <p class="mb-0">Base: <?php echo VerificarBase($conn, $nick);?></p>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="col-lg-8">
      <div class="card mb-4">
        <div class="card-body">
          <div class="row">
          </div>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Sexo:</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?php echo VerificaSexo($sexo)?></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Coins:</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?php echo formatMoney($coins);?></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Procurado:</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?php echo $procurado . " estrelas";?></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Matou/Morreu:</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?php echo $matou." / ".$morreu?></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Estilo de Luta:</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?php echo VerificaEstiloDeLuta($luta);?></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Plano de Saude:</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?php echo VerificaPlanoDeSaude($planoDeSaude); ?></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Vacinas:</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?php echo $vacinas." vacinas";?></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Kits Médico:</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?php echo $kitsMedico." kits";?></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Aposentado:</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?php echo VerificaAposentadoria($aposentado);?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php 
  $conn->close();
?>