<?php 
    include('conexao.php');
    require('funcoes.php');

    if(isset($_GET['id'])) {
        $nick = $_GET['id'];
    } else {
        echo "<script>alert('Posto não informado!'); window.location.href='home.php?page=home';</script>";
    }

    $sql = "SELECT * FROM postos WHERE ID = ".$conn->real_escape_string($nick)."";
    $result = $conn->query($sql);

    $defaultImagePath = "img/postos/min1.png";
    $imagePath = $defaultImagePath;

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $postoID = $row['ID'];
        $local = $row['Local'];
        $valor = $row['Valor'];
        $producao = $row['Producao'];
        $valorGasolina = $row['ValorGasolina'];
        $valorDiesel = $row['ValorDiesel'];
        $valorAlcool = $row['ValorAlcool'];
        $estoqueGasolina = $row['Gasolina'];
        $estoqueDiesel = $row['Diesel'];
        $estoqueAlcool = $row['Alcool'];


        $imagePath = "img/postos/" . $postoID . ".png";
        if (!file_exists($imagePath)) {
            $imagePath = $defaultImagePath;
        }
    } else {
        echo "<script>alert('Posto não encontrado!'); window.location.href='home.php?page=home';</script>";
        exit;
    }
?>


<section style="background-color: #eee;">
  <div class="row">
    <div class="col-lg-4">
      <div class="card mb-4">
        <div class="card-body text-center">
          <img src="<?php echo $imagePath; ?>" alt="avatar" class="img-fluid" style="width: 400px; border-radius: 10px;">
          <h5 class="my-3"><?php echo "Posto de ".$local; ?></h5>
          <span>Dono: </span>
          <?php if ($row['Dono'] !== 'Ninguem') { ?>
              <a href="?page=conta&nick=<?php echo urlencode($row['Dono']); ?>" class="text-decoration-none" style="color: black; font-weight: bold;">
                <?php echo htmlspecialchars($row['Dono']); ?>
              </a>
          <?php } else { ?>
              <?php echo htmlspecialchars($row['Dono']); ?>
          <?php } ?>
        </div>
      </div>
      <div class="card mb-4 mb-lg-0">
        <div class="card-body p-0">
          <ul class="list-group list-group-flush rounded-3">
            <li class="list-group-item d-flex align-items-center p-3">
              <i class="fas fa-globe fa-lg text-warning"></i>
              <p class="mb-0">Local: <?php echo $local;?></p>
            </li>
            <li class="list-group-item d-flex align-items-center p-3">
              <i class="fas fa-globe fa-lg text-warning"></i>
              <p class="mb-0">Producao: <?php echo $producao;?></p>
            </li>
            <li class="list-group-item d-flex align-items-center p-3">
              <i class="fas fa-globe fa-lg text-warning"></i>
              <p class="mb-0">Valor: <?php echo formatMoney($valor);?></p>
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
              <p class="mb-0">ID do Posto:</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?php echo $postoID?></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Valor Gasolina:</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?php echo formatMoney($valorGasolina);?></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Valor Diesel:</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?php echo formatMoney($valorDiesel);?></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Valor Alcool:</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?php echo formatMoney($valorAlcool);?></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Estoque Gasolina:</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?php echo $estoqueGasolina."L";?></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Estoque Diesel:</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?php echo $estoqueDiesel."L";?></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Estoque Alcool:</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?php echo $estoqueAlcool."L";?></p>
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