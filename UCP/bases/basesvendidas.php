<?php 
    require ('conexao.php');
    require ('funcoes.php');
    $sql = "SELECT * FROM clans WHERE Dono != '-'";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;
?>
<table class="table align-middle mb-0 bg-white">
    <h4>Bases Vendidas</h4>
  <thead class="bg-light">
    <tr>
      <th>Base</th>
      <th>Líder</th>
      <th>Membros</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $res->fetch_assoc()): ?>
    <tr>
      <td>
        <div class="d-flex align-items-center">
            <img
                src="img/bases/<?php echo $row['ID']; ?>.png"
                alt="Imagem do jogador"
                style="max-width: 45px; max-height: 45px; width: auto; height: auto;"
                class="rounded-circle"
                onerror="this.onerror=null; this.src='img/skins/default.jpg';"
            />
          <div class="ms-3">
            <p class="fw-bold mb-1"><?php echo $row['ClanNome']; ?></p>
            <p class="text-muted mb-0"><?php echo "TAG: ".$row['ClanTag']; ?></p>
          </div>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1"><?php echo ($row['Dono']); ?></p>
        <p class="text-muted mb-0"></p>
      </td>
      <td>
        <p class="fw-normal mb-1"><?php echo ($row['Membros']); ?></p>
        <p class="text-muted mb-0"></p>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>