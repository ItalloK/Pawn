<?php 
    require ('conexao.php');
    require ('funcoes.php');
    $sql = "SELECT * FROM houses WHERE HouseOwner = '-'";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;
?>
<table class="table table-striped align-middle mb-0 bg-white">
    <h4>Casas Liberadas</h4>
    <thead class="bg-light">
        <tr>
            <th>ID</th>
            <th>Local</th>
            <th>Upgrade</th>
            <th>Preço</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $res->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo PegarBairroCasa($row['HouseX'], $row['HouseY']); ?></td>
            <td><?php echo "1 / ".htmlspecialchars($row['HouseUpgrade']); ?></td>
            <td><?php echo formatMoney($row['HousePrice']); ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
