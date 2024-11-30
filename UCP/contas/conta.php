<?php 
    include('conexao.php');
    if(isset($_GET['nick'])) {
        $nick = $_GET['nick'];
    } else {
        echo "<script>alert('Nick não informado!'); window.location.href='home.php?page=casasvendidas';</script>";
    }

    $sql = "SELECT Nick, Level, Skin, Profissao, Vida, Colete, Fome, Sede, Sono, UltimoLogin, Sexo,
              Procurado, Dinheiro, SaldoBanco, Coins, Matou, Morreu, Luta, PlanoDeSaude, Vacinas, KitsMedico, Aposentado,
              MultaCar, MultaMot, MultaCam, MultaHeli, MultaAvi, MultaOni, Logado
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
        $statusVida = $row['Vida'];
        $statusColete = $row['Colete'];
        $statusFome = $row['Fome'];
        $statusSede = $row['Sede'];
        $statusSono = $row['Sono'];
        $ultimoLogin = $row['UltimoLogin'];
        $sexo = $row['Sexo'];
        $procurado = $row['Procurado'];
        $dinheiro = $row['Dinheiro'];
        $saldoBancario = $row['SaldoBanco'];
        $coins = $row['Coins'];
        $matou = $row['Matou'];
        $morreu = $row['Morreu'];
        $luta = $row['Luta'];
        $planoDeSaude = $row['PlanoDeSaude'];
        $vacinas = $row['Vacinas'];
        $kitsMedico = $row['KitsMedico'];
        $aposentado = $row['Aposentado'];
        $multaCar = $row['MultaCar'];
        $multaMot = $row['MultaMot'];
        $multaCam = $row['MultaCam'];
        $multaHeli = $row['MultaHeli'];
        $multaAvi = $row['MultaAvi'];
        $multaOni = $row['MultaOni'];

        $imagePath = "img/skins/" . $skinID . ".png";
        if (!file_exists($imagePath)) {
            $imagePath = $defaultImagePath;
        }
    } else {
        echo "<script>alert('Nick não encontrado!'); window.location.href='home.php?page=casasvendidas';</script>";
        exit;
    }

    $conn->close();
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
              <p class="mb-0">Multas Carro: <?php echo $multaCar;?></p>
            </li>
            <li class="list-group-item d-flex align-items-center p-3">
              <i class="fas fa-globe fa-lg text-warning"></i>
              <p class="mb-0">Multas Moto: <?php echo $multaMot;?></p>
            </li>
            <li class="list-group-item d-flex align-items-center p-3">
              <i class="fas fa-globe fa-lg text-warning"></i>
              <p class="mb-0">Multas Caminhão: <?php echo $multaCam;?></p>
            </li>
            <li class="list-group-item d-flex align-items-center p-3">
              <i class="fas fa-globe fa-lg text-warning"></i>
              <p class="mb-0">Multas Onibus: <?php echo $multaOni;?></p>
            </li>
            <li class="list-group-item d-flex align-items-center p-3">
              <i class="fas fa-globe fa-lg text-warning"></i>
              <p class="mb-0">Multas Helicoptero: <?php echo $multaHeli;?></p>
            </li>
            <li class="list-group-item d-flex align-items-center p-3">
              <i class="fas fa-globe fa-lg text-warning"></i>
              <p class="mb-0">Multas Avião: <?php echo $multaAvi;?></p>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="col-lg-8">
      <div class="card mb-4">
        <div class="card-body">
          <!-- Information Rows -->
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Ultimo Login:</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?php echo $ultimoLogin;?></p>
            </div>
          </div>
          <hr>
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
              <p class="mb-0">Dinheiro:</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?php echo formatMoney($dinheiro);?></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Saldo Bancário:</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?php echo formatMoney($saldoBancario);?></p>
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
    function VerificarProfissao($idprofissao){
        if ($idprofissao == 0) return "Desempregado";
        if ($idprofissao == 1) return "Entregador de Jornal";
        if ($idprofissao == 2) return "Gari";
        if ($idprofissao == 3) return "Pizzaboy";
        if ($idprofissao == 4) return "Vendedor de Roupas";
        if ($idprofissao == 5) return "Vendedor de Comida";
        if ($idprofissao == 6) return "Minerador";
        if ($idprofissao == 7) return "Paramédico";
        if ($idprofissao == 8) return "Advogado";
        if ($idprofissao == 11) return "Transportador de Concreto";
        if ($idprofissao == 12) return "Motorista de Onibus";
        if ($idprofissao == 13) return "Entregador de Mercadorias";
        if ($idprofissao == 14) return "Taxista";
        if ($idprofissao == 15) return "Maquinista";
        if ($idprofissao == 16) return "Motorista de Carro Forte";
        if ($idprofissao == 17) return "Piloto";
        if ($idprofissao == 21) return "Bombeiro";
        if ($idprofissao == 22) return "Marinha";
        if ($idprofissao == 23) return "Exército";
        if ($idprofissao == 24) return "Aeronáutica";
        if ($idprofissao == 25) return "Corregedoria";
        if ($idprofissao == 31) return "Segurança de Carro Forte";
        if ($idprofissao == 32) return "Policial Civil";
        if ($idprofissao == 33) return "Polícia Militar";
        if ($idprofissao == 34) return "Delegado";
        if ($idprofissao == 35) return "Polícia Rodoviária Federal";
        if ($idprofissao == 36) return "Polícia Federal";
        if ($idprofissao == 41) return "Caçador";
        if ($idprofissao == 42) return "Pescador";
        if ($idprofissao == 43) return "Mecânico";
        if ($idprofissao == 50) return "Vendedor de Drogas";
        if ($idprofissao == 51) return "Vendedor de Armas";
        if ($idprofissao == 52) return "Sequestrador";
        if ($idprofissao == 53) return "Produtor de Drogas";
        if ($idprofissao == 54) return "Contrabandista Aéreo";
        if ($idprofissao == 55) return "Assaltante";
        if ($idprofissao == 56) return "Assassino";
        if ($idprofissao == 57) return "Terrorista";
        if ($idprofissao == 58) return "Chefe do Crime";
    }

    function VerificaSexo($sexo){
        if($sexo == 1) return "Masculino";
        if($sexo == 2) return "Feminino";
    }

    function formatMoney($valor) {
      $formatted = strval($valor);
      
      $result = '';
      $len = strlen($formatted);
      $j = 0;
  
      for ($i = $len - 1; $i >= 0; $i--) {
          $result .= $formatted[$i];
          if (($len - $i) % 3 == 0 && $i != 0) {
              $result .= '.'; 
          }
      }
  
      $result = strrev($result);
  
      return "$ ".$result;
    }

  function VerificaEstiloDeLuta($valor){
    if($valor == 1) return "Luta com as Mãos";
    if($valor == 2) return "Boxing";
    if($valor == 3) return "Agarrar e chutar";
    if($valor == 4) return "Briga de rua";
    if($valor == 5) return "Kung-Fu";
    if($valor == 6) return "Normal";
  }

  function VerificaPlanoDeSaude($valor){
    if($valor == 0) return "Não Possui";
    if($valor == 1) return "Possui";
  }

  function VerificaAposentadoria($valor){
    if($valor == 0) return "Não";
    if($valor == 1) return "Sim";
  }

  function VerificarLogin($status) {
    if ($status == "Online") {
        return '<span style="color: green;"><strong>Online</strong></span>';
    } else if ($status == "Offline") {
        return '<span style="color: red;"><strong>Offline</strong></span>';
    }
  }
?>