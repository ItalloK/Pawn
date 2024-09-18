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
                        case "projeto-listar":
                          include('projeto/projeto-listar.php');
                          break;
                        case "projeto-create":
                          include('projeto/projeto-create.php');
                          break;
                        case "projeto-editar":
                          include('projeto/projeto-editar.php');
                          break;
                        case "funcionario-listar":
                          include('funcionario/funcionario-listar.php');
                          break;
                        case "funcionario-create":
                          include('funcionario/funcionario-create.php');
                          break;
                        case "funcionario-editar":
                          include('funcionario/funcionario-edit.php');
                          break;
                        case "dependente-listar":
                          include('dependente/dependente-listar.php');
                          break;
                        case "dependente-create":
                          include('dependente/dependente-create.php');
                          break;
                        case "dependente-editar":
                          include('dependente/dependente-editar.php');
                          break;
                        case "departamento-listar":
                          include('departamento/departamento-listar.php');
                          break;
                        case "local_departamentos_listar":
                          include('local_departamentos/local_departamentos_listar.php');
                          break;
                        case "local_departamentos_create":
                          include('local_departamentos/local_departamentos_create.php');
                          break;
                        case "local_departamentos_editar":
                          include('local_departamentos/local_departamentos_editar.php');
                          break;
                        case "departamento-listartodos":
                          include('departamento/departamento-listartodos.php');
                          break;
                        case "departamento-create":
                          include('departamento/departamento-create.php');
                          break;
                        case "departamento-editar":
                          include('departamento/departamento-editar.php');
                          break;
                        case "trabalhaem-listar":
                          include("trabalhaem/trabalhaem-listar.php");
                          break;
                        case "trabalhaem-create":
                          include("trabalhaem/trabalhaem-create.php");
                          break;
                        case "trabalhaem-editar":
                          include("trabalhaem/trabalhaem-editar.php");
                          break;
                        case "trabalhaem-listartodos":
                          include("trabalhaem/trabalhaem-listartodos.php");
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
                Desenvolvido pelo Prof. Edilson Lima &copy; 2024 || Editado por Italo Gabriel e Jackson Garcês - 2024
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
