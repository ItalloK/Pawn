<?php 
    require ('conexao.php');
    require ('funcoes.php');
    $sql = "SELECT ID, Nick, Level, TempoVip, Profissao, Skin, TemVip, TempoVip FROM jogadores WHERE TemVip = 1 ORDER BY TempoVip DESC LIMIT 10";
    $result = $conn->query($sql);
?>

<table class="table align-middle mb-0 bg-white">
    <h4>Ranking jogadores com mais tempo de VIP</h4>
  <thead class="bg-light">
    <tr>
      <th>Jogador</th>
      <th>Profissao</th>
      <th>Tempo de VIP</th>
      <th>Status VIP</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
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
            <a href="?page=conta&nick=<?php echo urlencode($row['Nick']); ?>" class="text-decoration-none" style="color: black; font-weight: bold;">
                <?php echo htmlspecialchars($row['Nick']); ?>
            </a>
            <p class="text-muted mb-0"><?php echo "Level: ".$row['Level']; ?></p>
          </div>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1"><?php echo VerificarProfissao($row['Profissao']); ?></p>
        <p class="text-muted mb-0"></p>
      </td>
      <td><?php echo ConvertDias($row['TempoVip']); ?></td>
      <td>
        <?php if ($row['TemVip'] == '1'): ?>
            <span class="badge bg-warning rounded-pill d-inline">VIP</span>
        <?php else: ?>
            <span class="badge bg-secondary rounded-pill d-inline">Jogador</span>
        <?php endif; ?>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
