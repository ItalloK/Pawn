<?php 
    require ('conexao.php');
    require ('funcoes.php');
    $sql = "SELECT ID, Nick, Skin, TemVip,Profissao, Coins 
            FROM jogadores ORDER BY Coins DESC LIMIT 10";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;
?>
<table class="table align-middle mb-0 bg-white">
    <h4>Ranking jogadores com mais Coins</h4>
  <thead class="bg-light">
    <tr>
      <th>Jogador</th>
      <th>Coins</th>
      <th>Status VIP</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $res->fetch_assoc()): ?>
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
            <p class="fw-bold mb-1"><?php echo $row['Nick']; ?></p>
            <p class="text-muted mb-0"><?php echo VerificarProfissao($row['Profissao']); ?></p>
          </div>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1"><?php echo formatMoney($row['Coins']); ?></p>
        <p class="text-muted mb-0"></p>
      </td>
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
