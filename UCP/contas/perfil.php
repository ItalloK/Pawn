<?php 
    include('conexao.php');
    require 'funcoes.php';

    $sql = "SELECT Nick, Level, Skin, Profissao, Vida, Colete, Fome, Sede, Sono, UltimoLogin, Sexo,
              Procurado, Dinheiro, SaldoBanco, Coins, Matou, Morreu, Luta, PlanoDeSaude, Vacinas, KitsMedico, Aposentado,
              MultaCar, MultaMot, MultaCam, MultaHeli, MultaAvi, MultaOni, Logado
            FROM jogadores WHERE id =".$_SESSION['ID']; // Adjust 'jogadores' and 'id' if needed
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
                <p class="mb-0">Kits Medico:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $kitsMedico." kits"; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Aposentadoria:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo VerificaAposentadoria($aposentado); ?></p>
              </div>
            </div>           
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1"></span> Hud Status
                </p>
                <p class="mb-1" style="font-size: .77rem;">Vida</p>
                <div class="progress rounded" style="height: 5px;">
                <div class="progress-bar" role="progressbar" style="width: <?php echo $statusVida; ?>%; background-color: #610B0B;" 
                    aria-valuenow="<?php echo $statusVida; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <p class="mt-4 mb-1" style="font-size: .77rem;">Colete</p>
                <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $statusColete; ?>%; background-color: #58D3F7;" 
                    aria-valuenow="<?php echo $statusColete;?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Fome</p>
                <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $statusFome; ?>%; background-color: #FF0000;" 
                    aria-valuenow="<?php echo $statusFome;?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Sede</p>
                <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $statusSede; ?>%; background-color: #2EFE2E;" 
                    aria-valuenow="<?php echo $statusSede;?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Sono</p>
                <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $statusSono; ?>%; background-color: #0174DF;" 
                    aria-valuenow="<?php echo $statusSono;?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0" style="height: 300px;">
              <div class="card-body">
                <p class="mb-3"><span class="text-primary font-italic me-1"></span> Multas</p>
                <p class="mb-1" style="font-size: .7rem;">Carro: <?php echo $multaCar . " / " . 21; ?></p>
                <div class="progress rounded" style="height: 4px;">
                  <div class="progress-bar" role="progressbar" 
                      style="width: calc(<?php echo $multaCar; ?> / <?php echo 21; ?> * 100%); background-color: #247798;" 
                      aria-valuenow="<?php echo $multaCar; ?>" 
                      aria-valuemin="0" 
                      aria-valuemax="<?php echo 21; ?>">
                  </div>
                </div>    
                <p class="mt-3 mb-1" style="font-size: .7rem;">Moto: <?php echo $multaMot . " / " . 21; ?></p>
                <div class="progress rounded" style="height: 4px;">
                  <div class="progress-bar" role="progressbar" 
                      style="width: calc(<?php echo $multaMot; ?> / 21 * 100%); background-color: #247798;" 
                      aria-valuenow="<?php echo $multaMot; ?>" 
                      aria-valuemin="0" 
                      aria-valuemax="21">
                  </div>
                </div>
                <p class="mt-3 mb-1" style="font-size: .7rem;">Caminhão: <?php echo $multaCam . " / " . 21; ?></p>
                <div class="progress rounded" style="height: 4px;">
                  <div class="progress-bar" role="progressbar" 
                      style="width: calc(<?php echo $multaCam; ?> / 21 * 100%); background-color: #247798;" 
                      aria-valuenow="<?php echo $multaCam; ?>" 
                      aria-valuemin="0" 
                      aria-valuemax="21">
                  </div>
                </div>
                <p class="mt-3 mb-1" style="font-size: .7rem;">Ônibus: <?php echo $multaOni . " / " . 21; ?></p>
                <div class="progress rounded" style="height: 4px;">
                  <div class="progress-bar" role="progressbar" 
                      style="width: calc(<?php echo $multaOni; ?> / 21 * 100%); background-color: #247798;" 
                      aria-valuenow="<?php echo $multaOni; ?>" 
                      aria-valuemin="0" 
                      aria-valuemax="21">
                  </div>
                </div>
                <p class="mt-3 mb-1" style="font-size: .7rem;">Helicóptero: <?php echo $multaHeli . " / " . 21; ?></p>
                <div class="progress rounded" style="height: 4px;">
                  <div class="progress-bar" role="progressbar" 
                      style="width: calc(<?php echo $multaHeli; ?> / 21 * 100%); background-color: #247798;" 
                      aria-valuenow="<?php echo $multaHeli; ?>" 
                      aria-valuemin="0" 
                      aria-valuemax="21">
                  </div>
                </div>
                <p class="mt-3 mb-1" style="font-size: .7rem;">Avião: <?php echo $multaAvi . " / " . 21; ?></p>
                <div class="progress rounded" style="height: 4px;">
                  <div class="progress-bar" role="progressbar" 
                      style="width: calc(<?php echo $multaAvi; ?> / 21 * 100%); background-color: #247798;" 
                      aria-valuenow="<?php echo $multaAvi; ?>" 
                      aria-valuemin="0" 
                      aria-valuemax="21">
                  </div>
                </div>
              </div>
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