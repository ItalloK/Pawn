<?php 
    require ('conexao.php');
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
            <p class="fw-bold mb-1"><?php echo $row['Nick']; ?></p>
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

<?php
    function VerificarProfissao($idprofissao){
        if ($idprofissao == 0) return "Desempregado";
        if ($idprofissao == 1) return "Entregador de Jornal";
        if ($idprofissao == 2) return "Gari";
        if ($idprofissao == 3) return "Pizzaboy";
        if ($idprofissao == 4) return "Vendedor de Roupas";
        if ($idprofissao == 5) return "Vendedor de Comida";
        if ($idprofissao == 6) return "Minerador";
        if ($idprofissao == 7) return "Paramédico";
        if ($idprofissao == 8) return "Advogado";
        if ($idprofissao == 11) return "Transportador de Concreto";
        if ($idprofissao == 12) return "Motorista de Onibus";
        if ($idprofissao == 13) return "Entregador de Mercadorias";
        if ($idprofissao == 14) return "Taxista";
        if ($idprofissao == 15) return "Maquinista";
        if ($idprofissao == 16) return "Motorista de Carro Forte";
        if ($idprofissao == 17) return "Piloto";
        if ($idprofissao == 21) return "Bombeiro";
        if ($idprofissao == 22) return "Marinha";
        if ($idprofissao == 23) return "Exército";
        if ($idprofissao == 24) return "Aeronáutica";
        if ($idprofissao == 25) return "Corregedoria";
        if ($idprofissao == 31) return "Segurança de Carro Forte";
        if ($idprofissao == 32) return "Policial Civil";
        if ($idprofissao == 33) return "Polícia Militar";
        if ($idprofissao == 34) return "Delegado";
        if ($idprofissao == 35) return "Polícia Rodoviária Federal";
        if ($idprofissao == 36) return "Polícia Federal";
        if ($idprofissao == 41) return "Caçador";
        if ($idprofissao == 42) return "Pescador";
        if ($idprofissao == 43) return "Mecânico";
        if ($idprofissao == 50) return "Vendedor de Drogas";
        if ($idprofissao == 51) return "Vendedor de Armas";
        if ($idprofissao == 52) return "Sequestrador";
        if ($idprofissao == 53) return "Produtor de Drogas";
        if ($idprofissao == 54) return "Contrabandista Aéreo";
        if ($idprofissao == 55) return "Assaltante";
        if ($idprofissao == 56) return "Assassino";
        if ($idprofissao == 57) return "Terrorista";
        if ($idprofissao == 58) return "Chefe do Crime";
    }

    function ConvertDias($segundos) {
        $dias = floor($segundos / (60 * 60 * 24));
        $horas = floor(($segundos % (60 * 60 * 24)) / (60 * 60));
        return number_format($dias, 0, ',', '.') . " Dias e " . number_format($horas, 0, ',', '.') . " Horas";
    }
    
?>
