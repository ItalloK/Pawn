<?php 
    include('conexao.php');
    $sql = "SELECT Nick, Skin, Profissao, Level FROM jogadores WHERE id =".$_SESSION['ID']; // Adjust 'jogadores' and 'id' if needed
    $result = $conn->query($sql);

    $defaultImagePath = "img/skins/0.png";
    $imagePath = $defaultImagePath;

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $skinID = $row['Skin'];
        $nick = $row['Nick'];
        $profissao = $row['Profissao'];
        $level = $row['Level'];
        $imagePath = "img/skins/" . $skinID . ".png";
        if (!file_exists($imagePath)) {
            $imagePath = $defaultImagePath;
        }
    }
    $conn->close();
?>
<section style="background-color: #eee;">
<div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="<?php echo $imagePath; ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?php echo $nick; ?></h5>
            <p class="text-muted mb-1">Profissão: <?php echo VerificarProfissao($profissao);?></p>
            <p class="text-muted mb-4">Level: <?php echo $level;?></p>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0">https://mdbootstrap.com</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-github fa-lg text-body"></i>
                <p class="mb-0">mdbootstrap</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                <p class="mb-0">@mdbootstrap</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                <p class="mb-0">mdbootstrap</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                <p class="mb-0">mdbootstrap</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">Johnatan Smith</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">example@example.com</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">(097) 234-5678</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">(098) 765-4321</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                </p>
                <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                <div class="progress rounded mb-2" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                </p>
                <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                <div class="progress rounded mb-2" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



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

?>