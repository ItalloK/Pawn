<?php
  include('protect.php');
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HeadShot Server</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <header>
        <div class="container" id="nav-container">
          <?php
            include('navbar.php');
          ?>
        </div>
    </header>
    <main>
      <div class="container-fluid">
        <div class="container mt-4">
          <div class="row">
            <div class="col mt-12">
              <div class="card">
                <div class="card-header">
                  <?php
                    if (isset($_REQUEST["page"]) && !empty($_REQUEST["page"])) {
                      switch($_REQUEST["page"]) {
                        case "rankinglevel":
                          include('ranking/rankinglevel.php');
                          break;
                        case "rankinggrana":
                          include('ranking/rankinggrana.php');
                          break;
                        case "rankingcoins":
                          include('ranking/rankingcoins.php');
                          break;
                        case "rankingmatoumorreu":
                          include('ranking/rankingmatoumorreu.php');
                          break;
                        case "rankingtempovip":
                          include('ranking/rankingtempovip.php');
                          break;
                        case "casasliberadas":
                          include('casas/casasliberadas.php');
                          break;
                        case "casasvendidas":
                          include('casas/casasvendidas.php');
                          break;
                        case "minhaconta":
                          include('contas/perfil.php');
                          break;
                        case "conta":
                          include('contas/conta.php');
                          break;
                        case "basesavenda":
                          include('bases/basesavenda.php');
                          break;
                        case "basesvendidas":
                          include('bases/basesvendidas.php');
                          break;
                        case "base":
                          include('bases/base.php');
                          break;
                        case "index":
                          include("index.php");
                          break;
                      }
                    } else {
                      ?>
                      <div class="card-header">
                      <h4>Bem-vindo ao HeadShot Server</h4>
                      <link rel="stylesheet" href="css/loteria.css">
                        </div>
                        <div class="card-body">
                          <div class="caixa-loteria">
                              <img src="img/loteria.png" alt="Logo Dinheiro">
                              <div class="titulo-loteria">Loteria</div>
                              <div class="valor-acumulado" id="valor-acumulado"></div>
                          </div>
                          <div class="caixa-loteria">
                              <img src="img/imposto.png" alt="Logo Dinheiro">
                              <div class="titulo-loteria">Impostometro</div>
                              <div class="valor-acumulado" id="valor-acumulado-2"></div>
                          </div>
                      </div>
                      <?php
                        require_once 'conexao.php';
                        require_once 'funcoes.php';
                        $valorLoteria = formatMoney(ValorLoteria($conn));
                        $valorImpostometro = formatMoney(ValorImpostometro($conn));
                      ?>
                      <script>
                          document.getElementById('valor-acumulado').textContent = "<?php echo $valorLoteria; ?>";
                          document.getElementById('valor-acumulado-2').textContent = "<?php echo $valorImpostometro; ?>";
                      </script>

                      <?php
                    }
                  ?>
                </div>  
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- Rodapé -->
    <footer>
      <div id="copy-area">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <p>
                Desenvolvido por Italo Gabriel
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
