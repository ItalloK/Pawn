<?php 
    require ('conexao.php');
    require ('funcoes.php');
    $sql = "SELECT * FROM postos WHERE Dono != 'Ninguem'";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;
?>
<table class="table align-middle mb-0 bg-white">
    <h4>Postos Vendidos</h4>
  <thead class="bg-light">
    <tr>
      <th>Posto</th>
      <th>Dono</th>
      <th>Local</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $res->fetch_assoc()): ?>
    <tr>
      <td>
        <div class="d-flex align-items-center">
            <img
                src="img/bases/<?php echo "min".$row['ID']; ?>.png"
                alt="Imagem do jogador"
                style="max-width: 45px; max-height: 45px; width: auto; height: auto;"
                class="rounded-circle"
                onerror="this.onerror=null; this.src='img/skins/default.jpg';"
            />
          <div class="ms-3">
            <p class="fw-bold mb-1">
              <a href="?page=posto&id=<?php echo urlencode($row['ID']); ?>" class="text-decoration-none" style="color: black;">
                  <?php echo "Posto de ".htmlspecialchars($row['Local']); ?>
              </a>
            </p>
            <p class="text-muted mb-0"><?php echo "Producao: ".$row['Producao']; ?></p>
          </div>
        </div>
      </td>
      <td>
        <a href="?page=conta&nick=<?php echo urlencode($row['Dono']); ?>" class="text-decoration-none" style="color: black; font-weight: bold;">
          <?php echo htmlspecialchars($row['Dono']); ?>
        </a>
        <p class="text-muted mb-0"></p>
      </td>
      <td>
        <p class="fw-normal mb-1"><?php echo ($row['Local']); ?></p>
        <p class="text-muted mb-0"></p>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
