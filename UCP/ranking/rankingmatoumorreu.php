<?php 
    require ('conexao.php');
    $sql = "SELECT Nick, Matou, Morreu FROM jogadores ORDER BY Matou DESC LIMIT 10";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;
?>
<div class="card-header">
    <h4>Lista de Jogadores com mais K/D</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nick</th>
                <th>Matou</th>
                <th>Morreu</th>
            </tr>
        </thead>
        <?php
            if($qtd > 0){
                while($row = $res->fetch_object()){
        ?>
            <tr>
                <td><?=$row->Nick?></td>
                <td><?=$row->Matou?></td>
                <td><?=$row->Morreu?></td>
            </tr>
        <?php
                }
            } else {
                echo "<tr><td colspan='4'>Nenhum jogador encontrado.</td></tr>";
            }
        ?>
    </table>
</div>