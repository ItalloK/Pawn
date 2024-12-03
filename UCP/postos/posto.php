<?php 
    include('conexao.php');
    require('funcoes.php');

    if(isset($_GET['id'])) {
        $nick = $_GET['id'];
    } else {
        echo "<script>alert('Base não informada!'); window.location.href='home.php?page=home';</script>";
    }

    $sql = "SELECT * FROM clans WHERE ID = ".$conn->real_escape_string($nick)."";
    $result = $conn->query($sql);

    $defaultImagePath = "img/bases/min1.png";
    $imagePath = $defaultImagePath;

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $baseID = $row['ID'];
        $clanNome = $row['ClanNome'];
        $qntMembros = $row['Membros'];
        $clanTag = $row['ClanTag']; 
        $clanX = $row['ClanX'];
        $clanY = $row['ClanY'];
        $clanUpgrade = $row['Upgrade'];
        $clanDono = $row['Dono'];
        $kitArmas = $row['KitArmas'];
        $dmLiberado = $row['DMLiberado'];
        $invasaoLiberada = $row['InvasaoLiberada'];

        $imagePath = "img/bases/" . $baseID . ".png";
        if (!file_exists($imagePath)) {
            $imagePath = $defaultImagePath;
        }
    } else {
        echo "<script>alert('Base não encontrada!'); window.location.href='home.php?page=home';</script>";
        exit;
    }

    $sql2 = "SELECT 
                jogadores.ID AS jID, 
                jogadores.Nick AS jNick, 
                jogadores.Profissao, 
                jogadores.Logado, 
                jogadores.Skin,
                membros.TipoMembro
            FROM 
                jogadores
            INNER JOIN 
                membros 
            ON 
                jogadores.Nick = membros.Nick
            WHERE 
                membros.ClanID = ".$conn->real_escape_string($nick)."
            ORDER BY 
                FIELD(membros.TipoMembro, 3, 2, 1)";
    $result2 = $conn->query($sql2);

?>


<section style="background-color: #eee;">
  <div class="row">
    <div class="col-lg-4">
      <div class="card mb-4">
        <div class="card-body text-center">
          <img src="<?php echo $imagePath; ?>" alt="avatar" class="img-fluid" style="width: 400px; border-radius: 10px;">
          <h5 class="my-3"><?php echo $clanNome; ?></h5>
          <p class="text-muted mb-1">TAG: <?php echo $clanTag;?></p>
          <span>Líder: </span>
          <?php if ($row['Dono'] !== '-') { ?>
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
              <p class="mb-0">Local: <?php echo PegarBairroCasa($clanX, $clanY);?></p>
            </li>
            <li class="list-group-item d-flex align-items-center p-3">
              <i class="fas fa-globe fa-lg text-warning"></i>
              <p class="mb-0">Upgrade: <?php echo $clanUpgrade." / 5";?></p>
            </li>
            <li class="list-group-item d-flex align-items-center p-3">
              <i class="fas fa-globe fa-lg text-warning"></i>
              <p class="mb-0">Membros: <?php echo $qntMembros;?></p>
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
              <p class="mb-0">ID da Base:</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?php echo $baseID?></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Kit de Armas:</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?php echo $kitArmas;?></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">DM Liberado:</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?php echo VerificarSimOuNao($dmLiberado);?></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Invasão Liberada:</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?php echo VerificarSimOuNao($invasaoLiberada);?></p>
            </div>
          </div>
          <hr>
            <div class="row mt-4">
                <div class="col-12">
                    <table class="table align-middle mb-0 bg-white">
                        <h5>Membros</h5>
                        <thead class="bg-light">
                            <tr>
                                <th>Jogador</th>
                                <th>Tipo</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result2->fetch_assoc()): ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img
                                            src="img/skins/<?php echo $row['Skin']; ?>.png"
                                            alt="Imagem do jogador"
                                            style="max-width: 45px; max-height: 45px; width: auto; height: auto;"
                                            class="rounded-circle"
                                            onerror="this.onerror=null; this.src='img/skins/default.jpg';"
                                        />
                                        <div class="ms-3">
                                            <p class="fw-bold mb-1"><?php echo $row['jNick']; ?></p>
                                            <p class="text-muted mb-0"><?php echo VerificarProfissao($row['Profissao']); ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1"><?php echo VerificarTipoMembro($row['TipoMembro']); ?></p>
                                    <p class="text-muted mb-0"></p>
                                </td>
                                <td>
                                    <?php echo VerificarLoginBase($row['Logado'])?>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
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