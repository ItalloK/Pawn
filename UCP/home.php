<?php
  include('protect.php');
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projetos - Empresa</title>
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
                        case "index":
                          include("index.php");
                          break;
                      }
                    } else {
                      ?>
                      <div class="card-header">
                        <h4>Projetos</h4>
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>Nome do Projeto</th>
                              <th>Quantidade de Funcionarios</th>
                              <th>Horas Trabalhadas</th>
                            </tr>
                          </thead>
                          <?php
                            $host = "localhost";
                            $user = "root";
                            $pass = "root";
                            $db = "dbempresa";
                            $connect = new mysqli($host, $user, $pass, $db);
                            $sql = "SELECT 
                                        p.Nome AS NomeProjeto,
                                        COUNT(te.fkCpf) AS QuantidadeFuncionarios,
                                        SUM(te.Horas) AS TotalHoras
                                    FROM 
                                        dbempresa.trabalha_em te
                                    JOIN 
                                        dbempresa.projeto p ON te.fkIdProjeto = p.idProjeto
                                    GROUP BY 
                                        p.Nome
                                    ORDER BY 
                                        TotalHoras DESC
                                    LIMIT 7;
                                    ";
                            $res = $connect->query($sql);
                            $qtd = $res->num_rows;
                            if($qtd > 0) {
                              while($row = $res->fetch_object()) {
                          ?>
                            <tr>
                              <td><?=$row->NomeProjeto?></td>
                              <td><?=$row->QuantidadeFuncionarios?></td>
                              <td><?=$row->TotalHoras?></td>
                            </tr>
                          <?php
                              }
                            } else {
                              echo "<tr><td colspan='4'>Nenhum registro encontrado.</td></tr>";
                            }
                          ?>
                        </table>
                      </div>
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
