<?php 
    require ('conexao.php');
    $sql = "SELECT Nick, Level FROM jogadores ORDER BY Level DESC LIMIT 10";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;
?>
<div class="card-header">
    <h4>Lista de Jogadores com mais Level</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nick</th>
                <th>Level</th>
            </tr>
        </thead>
        <?php
            if($qtd > 0){
                while($row = $res->fetch_object()){
        ?>
            <tr>
                <td><?=$row->Nick?></td>
                <td><?=formatLevel($row->Level)?></td>
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
    function formatLevel($valor) {
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

        return $result;
    }
?>