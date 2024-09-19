<?php 
    require ('conexao.php');
    $sql = "SELECT Nick, Dinheiro, SaldoBanco, (Dinheiro + SaldoBanco) AS Money 
            FROM jogadores ORDER BY Money DESC LIMIT 10";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;
?>
<div class="card-header">
    <h4>Lista de Jogadores com mais Dinheiro</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nick</th>
                <th>Dinheiro</th>
            </tr>
        </thead>
        <?php
            if($qtd > 0){
                while($row = $res->fetch_object()){
        ?>
            <tr>
                <td><?=$row->Nick?></td>
                <td><?=formatMoney($row->Money)?></td>
            </tr>
        <?php
                }
            } else {
                echo "<tr><td colspan='4'>Nenhum jogador encontrado.</td></tr>";
            }
        ?>
    </table>
</div>


<?php 
    function formatMoney($valor) {
        $formatted = strval($valor);
        
        $result = '';
        $len = strlen($formatted);
        $j = 0;

        for ($i = $len - 1; $i >= 0; $i--) {
            $result .= $formatted[$i];
            if (($len - $i) % 3 == 0 && $i != 0) {
                $result .= '.'; 
            }
        }

        $result = strrev($result);

        return "$ ".$result;
    }
?>