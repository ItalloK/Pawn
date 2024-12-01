<?php 
    function VerificarCasa($conn, $nick) {
        $sql = "SELECT * FROM Houses WHERE HouseOwner = '".$conn->real_escape_string($nick)."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $casa = $row['ID'];
          $posX = $row['HouseX'];
          $posY = $row['HouseY'];
          $endereco = PegarBairroCasa($posX, $posY);
          return $casa." - ".$endereco;
        } else {
          return "Não tem casa";
        }
    }
    function VerificarBase($conn, $nick){
        $sql = "SELECT clans.* FROM membros INNER JOIN clans ON membros.ClanID = clans.ID WHERE membros.Nick = '".$conn->real_escape_string($nick)."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $ClanID = $row['ID'];
          $NomeClan = $row['ClanNome'];
          return $ClanID." - ".$NomeClan;
        } else {
          return "Não tem Base";
        }
    }

    function VerificarEmpresa($conn, $nick){
        return "Não tem Empresa";
    }

    function VerificaEstiloDeLuta($valor){
        if($valor == 1) return "Luta com as Mãos";
        if($valor == 2) return "Boxing";
        if($valor == 3) return "Agarrar e chutar";
        if($valor == 4) return "Briga de rua";
        if($valor == 5) return "Kung-Fu";
        if($valor == 6) return "Normal";
    }
    
    function VerificaPlanoDeSaude($valor){
        if($valor == 0) return "Não Possui";
        if($valor == 1) return "Possui";
    }
    
    function VerificaAposentadoria($valor){
        if($valor == 0) return "Não";
        if($valor == 1) return "Sim";
    }
    
    function VerificarLogin($status) {
        if ($status == "Online") {
            return '<span style="color: green;"><strong>Online</strong></span>';
        } else if ($status == "Offline") {
            return '<span style="color: red;"><strong>Offline</strong></span>';
        }
    }

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

    function VerificaSexo($sexo){
        if($sexo == 1) return "Masculino";
        if($sexo == 2) return "Feminino";
    }

    function PegarBairroCasa($x, $y) {
        $areas = [
            //["name" => "San Fierro", "xMin" => -2997.47, "xMax" => -242.99, "yMin" => -1213.91, "yMax" => -1115.58],
            ["name" => "Tierra Robada", "xMin" => -2997.47, "xMax" => -242.99, "yMin" => -480.54, "yMax" => 1659.68],
            ["name" => "Whetstone", "xMin" => -2997.47, "xMax" => -242.99, "yMin" => -2892.97, "yMax" => -1115.58],
            ["name" => "Tierra Robada", "xMin" => -1213.91, "xMax" => -480.54, "yMin" => 596.35, "yMax" => 1659.68],
            //["name" => "Red County", "xMin" => -1213.91, "xMax" => 2997.06, "yMin" => -768.03, "yMax" => 596.35],
            ["name" => "Flint County", "xMin" => -1213.91, "xMax" => 44.61, "yMin" => -2892.97, "yMax" => -768.03],
            ["name" => "Bone County", "xMin" => -480.54, "xMax" => 869.46, "yMin" => 596.35, "yMax" => 2993.87],
            //["name" => "Los Santos", "xMin" => 44.61, "xMax" => 2997.06, "yMin" => -2892.97, "yMax" => -768.03],
            //["name" => "Las Venturas", "xMin" => 869.46, "xMax" => 2997.06, "yMin" => 596.35, "yMax" => 2993.87],
            ["name" => "Mount Chiliad", "xMin" => -2997.47, "xMax" => -2178.69, "yMin" => -1115.58, "yMax" => -971.91],
            ["name" => "Ocean Flats", "xMin" => -2994.49, "xMax" => -2831.89, "yMin" => -430.28, "yMax" => -222.59],
            ["name" => "Ocean Flats", "xMin" => -2994.49, "xMax" => -2593.44, "yMin" => -222.59, "yMax" => 277.41],
            ["name" => "Mount Chiliad", "xMin" => -2994.49, "xMax" => -2178.69, "yMin" => -2189.91, "yMax" => -1115.58],
            ["name" => "Missionary Hill", "xMin" => -2994.49, "xMax" => -2178.69, "yMin" => -811.28, "yMax" => -430.28],
            ["name" => "Palisades", "xMin" => -2994.49, "xMax" => -2741.07, "yMin" => 458.41, "yMax" => 1339.61],
            ["name" => "Ocean Flats", "xMin" => -2994.49, "xMax" => -2867.85, "yMin" => 277.41, "yMax" => 458.41],
            ["name" => "City Hall", "xMin" => -2867.85, "xMax" => -2593.44, "yMin" => 277.41, "yMax" => 458.41],
            ["name" => "Avispa Country Club", "xMin" => -2831.89, "xMax" => -2646.40, "yMin" => -430.28, "yMax" => -222.59],
            ["name" => "Gant Bridge", "xMin" => -2741.45, "xMax" => -2616.40, "yMin" => 1659.68, "yMax" => 2175.15],
            ["name" => "Gant Bridge", "xMin" => -2741.07, "xMax" => -2616.40, "yMin" => 1490.47, "yMax" => 1659.68],
            ["name" => "Bayside", "xMin" => -2741.07, "xMax" => -2353.17, "yMin" => 2175.15, "yMax" => 2722.79],
            ["name" => "Battery Point", "xMin" => -2741.07, "xMax" => -2533.04, "yMin" => 1268.41, "yMax" => 1490.47],
            ["name" => "Paradiso", "xMin" => -2741.07, "xMax" => -2533.04, "yMin" => 793.41, "yMax" => 1268.41],
            ["name" => "Santa Flora", "xMin" => -2741.07, "xMax" => -2533.04, "yMin" => 458.41, "yMax" => 793.41],
            ["name" => "Avispa Country Club", "xMin" => -2667.81, "xMax" => -2646.40, "yMin" => -302.14, "yMax" => -262.32],
            ["name" => "Avispa Country Club", "xMin" => -2646.40, "xMax" => -2270.04, "yMin" => -355.49, "yMax" => -222.59],
            ["name" => "San Fierro Bay", "xMin" => -2616.40, "xMax" => -1996.66, "yMin" => 1501.21, "yMax" => 1659.68],
            ["name" => "San Fierro Bay", "xMin" => -2616.40, "xMax" => -1996.66, "yMin" => 1659.68, "yMax" => 2175.15],
            ["name" => "Queens", "xMin" => -2593.44, "xMax" => -2411.22, "yMin" => 54.72, "yMax" => 458.41],
            ["name" => "Hashbury", "xMin" => -2593.44, "xMax" => -2411.22, "yMin" => -222.59, "yMax" => 54.72],
            ["name" => "Avispa Country Club", "xMin" => -2550.04, "xMax" => -2470.04, "yMin" => -355.49, "yMax" => -318.49],
            ["name" => "Queens", "xMin" => -2533.04, "xMax" => -2329.31, "yMin" => 458.41, "yMax" => 578.40],
            ["name" => "Juniper Hollow", "xMin" => -2533.04, "xMax" => -2274.17, "yMin" => 968.37, "yMax" => 1358.90],
            ["name" => "Juniper Hill", "xMin" => -2533.04, "xMax" => -2274.17, "yMin" => 578.40, "yMax" => 968.37],
            ["name" => "Esplanade North", "xMin" => -2533.04, "xMax" => -1996.66, "yMin" => 1358.90, "yMax" => 1501.21],
            ["name" => "Avispa Country Club", "xMin" => -2470.04, "xMax" => -2270.04, "yMin" => -355.49, "yMax" => -318.49],
            ["name" => "Queens", "xMin" => -2411.22, "xMax" => -2253.54, "yMin" => 373.54, "yMax" => 458.41],
            ["name" => "Kings", "xMin" => -2411.22, "xMax" => -1993.28, "yMin" => 265.24, "yMax" => 373.54],
            ["name" => "Garcia", "xMin" => -2411.22, "xMax" => -2173.04, "yMin" => -222.59, "yMax" => 265.24],
            ["name" => "Garcia", "xMin" => -2395.14, "xMax" => -2354.09, "yMin" => -222.59, "yMax" => -204.79],
            ["name" => "Avispa Country Club", "xMin" => -2361.51, "xMax" => -2270.04, "yMin" => -417.20, "yMax" => -355.49],
            ["name" => "Bayside Marina", "xMin" => -2353.17, "xMax" => -2153.17, "yMin" => 2275.79, "yMax" => 2475.79],
            ["name" => "Kings", "xMin" => -2329.31, "xMax" => -1993.28, "yMin" => 458.41, "yMax" => 578.40],
            ["name" => "Angel Pine", "xMin" => -2324.94, "xMax" => -1964.22, "yMin" => -2584.29, "yMax" => -2212.11],
            ["name" => "Bayside Tunnel", "xMin" => -2290.19, "xMax" => -1950.19, "yMin" => 2548.29, "yMax" => 2723.29],
            ["name" => "Chinatown", "xMin" => -2274.17, "xMax" => -2078.67, "yMin" => 578.40, "yMax" => 744.17],
            ["name" => "Calton Heights", "xMin" => -2274.17, "xMax" => -1982.32, "yMin" => 744.17, "yMax" => 1358.90],
            ["name" => "Doherty", "xMin" => -2270.04, "xMax" => -1794.92, "yMin" => -324.11, "yMax" => -222.59],
            ["name" => "Foster Valley", "xMin" => -2270.04, "xMax" => -2178.69, "yMin" => -430.28, "yMax" => -324.11],
            ["name" => "Kings", "xMin" => -2253.54, "xMax" => -1993.28, "yMin" => 373.54, "yMax" => 458.41],
            ["name" => "Mount Chiliad", "xMin" => -2178.69, "xMax" => -2030.12, "yMin" => -2189.91, "yMax" => -1771.66],
            ["name" => "Mount Chiliad", "xMin" => -2178.69, "xMax" => -1936.12, "yMin" => -1771.66, "yMax" => -1250.97],
            ["name" => "Foster Valley", "xMin" => -2178.69, "xMax" => -1794.92, "yMin" => -1250.97, "yMax" => -1115.58],
            ["name" => "Foster Valley", "xMin" => -2178.69, "xMax" => -1794.92, "yMin" => -1115.58, "yMax" => -599.88],
            ["name" => "Foster Valley", "xMin" => -2178.69, "xMax" => -1794.92, "yMin" => -599.88, "yMax" => -324.11],
            ["name" => "Doherty", "xMin" => -2173.04, "xMax" => -1794.92, "yMin" => -222.59, "yMax" => 265.24],
            ["name" => "Downtown", "xMin" => -2078.67, "xMax" => -1499.89, "yMin" => 578.40, "yMax" => 744.27],
            ["name" => "Shade Creeks", "xMin" => -2030.12, "xMax" => -1820.64, "yMin" => -2174.89, "yMax" => -1771.66],
            ["name" => "Cranberry Station", "xMin" => -2007.83, "xMax" => -1922.00, "yMin" => 56.31, "yMax" => 224.78],
            ["name" => "Esplanade North", "xMin" => -1996.66, "xMax" => -1524.24, "yMin" => 1358.90, "yMax" => 1592.51],
            ["name" => "Downtown", "xMin" => -1993.28, "xMax" => -1794.92, "yMin" => 265.24, "yMax" => 578.40],
            ["name" => "Esplanade North", "xMin" => -1982.32, "xMax" => -1524.24, "yMin" => 1274.26, "yMax" => 1358.90],
            ["name" => "Downtown", "xMin" => -1982.32, "xMax" => -1871.72, "yMin" => 744.17, "yMax" => 1274.26],
            ["name" => "Financial", "xMin" => -1871.72, "xMax" => -1701.30, "yMin" => 744.17, "yMax" => 1176.42],
            ["name" => "Downtown", "xMin" => -1871.72, "xMax" => -1620.30, "yMin" => 1176.42, "yMax" => 1274.26],
            ["name" => "Shade Creeks", "xMin" => -1820.64, "xMax" => -1226.78, "yMin" => -2643.68, "yMax" => -1771.66],
            ["name" => "Easter Basin", "xMin" => -1794.92, "xMax" => -1499.89, "yMin" => -50.10, "yMax" => 249.90],
            ["name" => "Easter Basin", "xMin" => -1794.92, "xMax" => -1242.98, "yMin" => 249.90, "yMax" => 578.40],
            ["name" => "Easter Bay Airport", "xMin" => -1794.92, "xMax" => -1213.91, "yMin" => -730.12, "yMax" => -50.10],
            ["name" => "Easter Tunnel", "xMin" => -1709.71, "xMax" => -1446.01, "yMin" => -833.03, "yMax" => -730.12],
            ["name" => "Downtown", "xMin" => -1700.01, "xMax" => -1580.01, "yMin" => 744.27, "yMax" => 1176.52],
            ["name" => "El Quebrados", "xMin" => -1645.23, "xMax" => -1372.14, "yMin" => 2498.52, "yMax" => 2777.85],
            ["name" => "Shady Cabin", "xMin" => -1632.83, "xMax" => -1601.33, "yMin" => -2263.44, "yMax" => -2231.79],
            ["name" => "Esplanade East", "xMin" => -1620.30, "xMax" => -1580.01, "yMin" => 1176.52, "yMax" => 1274.26],
            ["name" => "Esplanade East", "xMin" => -1580.01, "xMax" => -1499.89, "yMin" => 1025.98, "yMax" => 1274.26],
            ["name" => "Downtown", "xMin" => -1580.01, "xMax" => -1499.89, "yMin" => 744.27, "yMax" => 1025.98],
            ["name" => "Esplanade East", "xMin" => -1499.89, "xMax" => -1339.89, "yMin" => 578.40, "yMax" => 1274.26],
            ["name" => "Easter Bay Airport", "xMin" => -1499.89, "xMax" => -1242.98, "yMin" => -50.10, "yMax" => 249.90],
            ["name" => "Garver Bridge", "xMin" => -1499.89, "xMax" => -1339.89, "yMin" => 696.44, "yMax" => 925.35],
            ["name" => "Easter Bay Airport", "xMin" => -1490.33, "xMax" => -1264.40, "yMin" => -209.54, "yMax" => -148.39],
            ["name" => "Aldeia Malvada", "xMin" => -1372.14, "xMax" => -1277.59, "yMin" => 2498.52, "yMax" => 2615.35],
            ["name" => "Easter Bay Airport", "xMin" => -1354.39, "xMax" => -1315.42, "yMin" => -287.40, "yMax" => -209.54],
            ["name" => "Kincaid Bridge", "xMin" => -1339.89, "xMax" => -1213.91, "yMin" => 599.22, "yMax" => 828.13],
            ["name" => "Garver Bridge", "xMin" => -1339.89, "xMax" => -1213.91, "yMin" => 828.13, "yMax" => 1057.04],
            ["name" => "Easter Bay Airport", "xMin" => -1315.42, "xMax" => -1264.40, "yMin" => -405.39, "yMax" => -209.54],
            ["name" => "Easter Bay Airport", "xMin" => -1242.98, "xMax" => -1213.91, "yMin" => -50.10, "yMax" => 578.40],
            ["name" => "Garver Bridge", "xMin" => -1213.91, "xMax" => -1087.93, "yMin" => 950.02, "yMax" => 1178.93],
            ["name" => "Easter Bay Airport", "xMin" => -1213.91, "xMax" => -1132.82, "yMin" => -730.12, "yMax" => -50.10],
            ["name" => "Kincaid Bridge", "xMin" => -1213.91, "xMax" => -1087.93, "yMin" => 721.11, "yMax" => 950.02],
            ["name" => "Easter Bay Airport", "xMin" => -1213.91, "xMax" => -947.98, "yMin" => -50.10, "yMax" => 578.40],
            ["name" => "The Farm", "xMin" => -1209.67, "xMax" => -908.16, "yMin" => -1317.10, "yMax" => -787.39],
            ["name" => "Leafy Hollow", "xMin" => -1166.97, "xMax" => -815.62, "yMin" => -1856.03, "yMax" => -1602.07],
            ["name" => "Back O Beyond", "xMin" => -1166.97, "xMax" => -321.74, "yMin" => -2641.19, "yMax" => -1856.03],
            ["name" => "Easter Bay Chemicals", "xMin" => -1132.82, "xMax" => -956.48, "yMin" => -768.03, "yMax" => -578.12],
            ["name" => "Easter Bay Chemicals", "xMin" => -1132.82, "xMax" => -956.48, "yMin" => -787.39, "yMax" => -768.03],
            ["name" => "Robada Intersection", "xMin" => -1119.01, "xMax" => -862.03, "yMin" => 1178.93, "yMax" => 1351.45],
            ["name" => "Kincaid Bridge", "xMin" => -1087.93, "xMax" => -961.95, "yMin" => 855.37, "yMax" => 986.28],
            ["name" => "The Sherman Dam", "xMin" => -968.77, "xMax" => -481.13, "yMin" => 1929.41, "yMax" => 2155.26],
            ["name" => "The Panopticon", "xMin" => -947.98, "xMax" => -319.68, "yMin" => -304.32, "yMax" => 327.07],
            ["name" => "Valle Ocultado", "xMin" => -936.67, "xMax" => -715.96, "yMin" => 2611.44, "yMax" => 2847.90],
            ["name" => "Las Barrancas", "xMin" => -926.13, "xMax" => -719.23, "yMin" => 1398.73, "yMax" => 1634.69],
            ["name" => "Arco Del Oeste", "xMin" => -901.13, "xMax" => -592.09, "yMin" => 2221.86, "yMax" => 2571.97],
            ["name" => "Fallen Tree", "xMin" => -792.25, "xMax" => -452.40, "yMin" => -698.55, "yMax" => -380.04],
            ["name" => "Sherman Reservoir", "xMin" => -789.74, "xMax" => -599.51, "yMin" => 1659.68, "yMax" => 1929.41],
            ["name" => "Flint Range", "xMin" => -594.19, "xMax" => -187.70, "yMin" => -1648.55, "yMax" => -1276.60],
            ["name" => "El Castillo Del Diablo", "xMin" => -464.52, "xMax" => -208.57, "yMin" => 2217.68, "yMax" => 2580.36],
            ["name" => "The Big Ear", "xMin" => -410.02, "xMax" => -137.97, "yMin" => 1403.34, "yMax" => 1681.23],
            ["name" => "Regular Tom", "xMin" => -405.77, "xMax" => -276.72, "yMin" => 1712.86, "yMax" => 1892.75],
            ["name" => "Beacon Hill", "xMin" => -399.63, "xMax" => -319.03, "yMin" => -1075.52, "yMax" => -977.52],
            ["name" => "Fort Carson", "xMin" => -376.23, "xMax" => 123.72, "yMin" => 826.33, "yMax" => 1220.44],
            ["name" => "Las Brujas", "xMin" => -365.17, "xMax" => -208.57, "yMin" => 2123.01, "yMax" => 2217.68],
            ["name" => "Las Payasadas", "xMin" => -354.33, "xMax" => -133.63, "yMin" => 2580.36, "yMax" => 2816.82],
            ["name" => "Los Santos Inlet", "xMin" => -321.74, "xMax" => 44.61, "yMin" => -2224.43, "yMax" => -1724.43],
            ["name" => "Blueberry Acres", "xMin" => -319.68, "xMax" => 104.53, "yMin" => -220.14, "yMax" => 293.32],
            ["name" => "Flint Water", "xMin" => -314.43, "xMax" => -106.34, "yMin" => -753.87, "yMax" => -463.07],
            ["name" => "Martin Bridge", "xMin" => -222.18, "xMax" => -122.13, "yMin" => 293.32, "yMax" => 476.46],
            ["name" => "El Castillo Del Diablo", "xMin" => -208.57, "xMax" => 8.43, "yMin" => 2337.18, "yMax" => 2487.18],
            ["name" => "El Castillo Del Diablo", "xMin" => -208.57, "xMax" => 114.03, "yMin" => 2123.01, "yMax" => 2337.18],
            ["name" => "Flint Intersection", "xMin" => -187.70, "xMax" => 17.06, "yMin" => -1596.76, "yMax" => -1276.60],
            ["name" => "Restricted Area", "xMin" => -91.59, "xMax" => 421.23, "yMin" => 1655.05, "yMax" => 2123.01],
            ["name" => "Lil Probe Inn", "xMin" => -90.22, "xMax" => 153.86, "yMin" => 1286.85, "yMax" => 1554.12],
            ["name" => "Blueberry", "xMin" => 19.61, "xMax" => 349.61, "yMin" => -404.14, "yMax" => -220.14],
            ["name" => "Verdant Meadows", "xMin" => 37.03, "xMax" => 435.99, "yMin" => 2337.18, "yMax" => 2677.90],
            ["name" => "Rodeo", "xMin" => 72.65, "xMax" => 225.16, "yMin" => -1544.17, "yMax" => -1404.97],
            ["name" => "Richman", "xMin" => 72.65, "xMax" => 321.36, "yMin" => -1235.07, "yMax" => -1008.15],
            ["name" => "Richman", "xMin" => 72.65, "xMax" => 225.16, "yMin" => -1404.97, "yMax" => -1235.07],
            ["name" => "Rodeo", "xMin" => 72.65, "xMax" => 225.16, "yMin" => -1684.65, "yMax" => -1544.17],
            ["name" => "Santa Maria Beach", "xMin" => 72.65, "xMax" => 342.65, "yMin" => -2173.29, "yMax" => -1684.65],
            ["name" => "Blueberry", "xMin" => 104.53, "xMax" => 349.61, "yMin" => -220.14, "yMax" => 152.24],
            ["name" => "Green Palms", "xMin" => 176.58, "xMax" => 338.66, "yMin" => 1305.45, "yMax" => 1520.72],
            ["name" => "Richman", "xMin" => 225.16, "xMax" => 334.50, "yMin" => -1369.62, "yMax" => -1292.07],
            ["name" => "Rodeo", "xMin" => 225.16, "xMax" => 312.80, "yMin" => -1684.65, "yMax" => -1501.95],
            ["name" => "Richman", "xMin" => 225.16, "xMax" => 466.22, "yMin" => -1292.07, "yMax" => -1235.07],
            ["name" => "Rodeo", "xMin" => 225.16, "xMax" => 334.50, "yMin" => -1501.95, "yMax" => -1369.62],
            ["name" => "Rodeo", "xMin" => 312.80, "xMax" => 422.68, "yMin" => -1684.65, "yMax" => -1501.95],
            ["name" => "Richman", "xMin" => 321.36, "xMax" => 700.79, "yMin" => -768.03, "yMax" => -674.89],
            ["name" => "Richman", "xMin" => 321.36, "xMax" => 647.52, "yMin" => -1235.07, "yMax" => -1044.07],
            ["name" => "Richman", "xMin" => 321.36, "xMax" => 647.56, "yMin" => -1044.07, "yMax" => -860.62],
            ["name" => "Richman", "xMin" => 321.36, "xMax" => 687.80, "yMin" => -860.62, "yMax" => -768.03],
            ["name" => "Rodeo", "xMin" => 334.50, "xMax" => 422.68, "yMin" => -1501.95, "yMax" => -1406.05],
            ["name" => "Rodeo", "xMin" => 334.50, "xMax" => 466.22, "yMin" => -1406.05, "yMax" => -1292.07],
            ["name" => "Hunter Quarry", "xMin" => 337.24, "xMax" => 860.55, "yMin" => 710.84, "yMax" => 1031.71],
            ["name" => "Octane Springs", "xMin" => 338.66, "xMax" => 664.31, "yMin" => 1228.51, "yMax" => 1655.05],
            ["name" => "Santa Maria Beach", "xMin" => 342.65, "xMax" => 647.71, "yMin" => -2173.29, "yMax" => -1684.65],
            ["name" => "Rodeo", "xMin" => 422.68, "xMax" => 466.22, "yMin" => -1570.20, "yMax" => -1406.05],
            ["name" => "Rodeo", "xMin" => 422.68, "xMax" => 558.10, "yMin" => -1684.65, "yMax" => -1570.20],
            ["name" => "Fallow Bridge", "xMin" => 434.34, "xMax" => 603.03, "yMin" => 366.57, "yMax" => 555.68],
            ["name" => "Rodeo", "xMin" => 466.22, "xMax" => 647.52, "yMin" => -1385.07, "yMax" => -1235.07],
            ["name" => "Rodeo", "xMin" => 466.22, "xMax" => 558.10, "yMin" => -1570.20, "yMax" => -1385.07],
            ["name" => "Fern Ridge", "xMin" => 508.19, "xMax" => 1306.66, "yMin" => -139.26, "yMax" => 119.53],
            ["name" => "Rodeo", "xMin" => 558.10, "xMax" => 647.52, "yMin" => -1684.65, "yMax" => -1384.93],
            ["name" => "Dillimore", "xMin" => 580.79, "xMax" => 861.09, "yMin" => -674.89, "yMax" => -404.79],
            ["name" => "Hampton Barns", "xMin" => 603.03, "xMax" => 761.99, "yMin" => 264.31, "yMax" => 366.57],
            ["name" => "Richman", "xMin" => 647.56, "xMax" => 768.69, "yMin" => -954.66, "yMax" => -860.62],
            ["name" => "Richman", "xMin" => 647.56, "xMax" => 787.46, "yMin" => -1118.28, "yMax" => -954.66],
            ["name" => "Vinewood", "xMin" => 647.56, "xMax" => 787.46, "yMin" => -1227.28, "yMax" => -1118.28],
            ["name" => "Marina", "xMin" => 647.71, "xMax" => 807.92, "yMin" => -1577.59, "yMax" => -1416.25],
            ["name" => "Verona Beach", "xMin" => 647.71, "xMax" => 930.22, "yMin" => -2173.29, "yMax" => -1804.21],
            ["name" => "Marina", "xMin" => 647.71, "xMax" => 851.45, "yMin" => -1804.21, "yMax" => -1577.59],
            ["name" => "Vinewood", "xMin" => 647.71, "xMax" => 787.46, "yMin" => -1416.25, "yMax" => -1227.28],
            ["name" => "Mulholland", "xMin" => 687.80, "xMax" => 911.80, "yMin" => -860.62, "yMax" => -768.03],
            ["name" => "Mulholland", "xMin" => 737.57, "xMax" => 1142.29, "yMin" => -768.03, "yMax" => -674.89],
            ["name" => "Mulholland", "xMin" => 768.69, "xMax" => 952.60, "yMin" => -954.66, "yMax" => -860.62],
            ["name" => "Market", "xMin" => 787.46, "xMax" => 1072.66, "yMin" => -1416.25, "yMax" => -1310.21],
            ["name" => "Market Station", "xMin" => 787.46, "xMax" => 866.01, "yMin" => -1410.93, "yMax" => -1310.21],
            ["name" => "Vinewood", "xMin" => 787.46, "xMax" => 952.66, "yMin" => -1310.21, "yMax" => -1130.84],
            ["name" => "Vinewood", "xMin" => 787.46, "xMax" => 952.60, "yMin" => -1130.84, "yMax" => -954.66],
            ["name" => "Marina", "xMin" => 807.92, "xMax" => 926.92, "yMin" => -1577.59, "yMax" => -1416.25],
            ["name" => "Verona Beach", "xMin" => 851.45, "xMax" => 1046.15, "yMin" => -1804.21, "yMax" => -1577.59],
            ["name" => "Mulholland", "xMin" => 861.09, "xMax" => 1156.55, "yMin" => -674.89, "yMax" => -600.90],
            ["name" => "Whitewood Estates", "xMin" => 883.31, "xMax" => 1098.31, "yMin" => 1726.22, "yMax" => 2507.23],
            ["name" => "Mulholland", "xMin" => 911.80, "xMax" => 1096.47, "yMin" => -860.62, "yMax" => -768.03],
            ["name" => "Market", "xMin" => 926.92, "xMax" => 1370.85, "yMin" => -1577.59, "yMax" => -1416.25],
            ["name" => "Verona Beach", "xMin" => 930.22, "xMax" => 1073.22, "yMin" => -2006.78, "yMax" => -1804.21],
            ["name" => "Verdant Bluffs", "xMin" => 930.22, "xMax" => 1249.62, "yMin" => -2488.42, "yMax" => -2006.78],
            ["name" => "Mulholland", "xMin" => 952.60, "xMax" => 1096.47, "yMin" => -937.18, "yMax" => -860.62],
            ["name" => "Market", "xMin" => 952.66, "xMax" => 1072.66, "yMin" => -1310.21, "yMax" => -1130.85],
            ["name" => "Temple", "xMin" => 952.66, "xMax" => 1096.47, "yMin" => -1130.84, "yMax" => -937.18],
            ["name" => "Greenglass College", "xMin" => 964.39, "xMax" => 1166.53, "yMin" => 930.89, "yMax" => 1044.69],
            ["name" => "Greenglass College", "xMin" => 964.39, "xMax" => 1197.39, "yMin" => 1044.69, "yMax" => 1203.22],
            ["name" => "Blackfield", "xMin" => 964.39, "xMax" => 1197.39, "yMin" => 1203.22, "yMax" => 1403.22],
            ["name" => "Blackfield", "xMin" => 964.39, "xMax" => 1197.39, "yMin" => 1403.22, "yMax" => 1726.22],
            ["name" => "Hilltop Farm", "xMin" => 967.38, "xMax" => 1176.78, "yMin" => -450.39, "yMax" => -217.90],
            ["name" => "Conference Center", "xMin" => 1046.15, "xMax" => 1323.90, "yMin" => -1804.21, "yMax" => -1722.26],
            ["name" => "Verona Beach", "xMin" => 1046.15, "xMax" => 1161.52, "yMin" => -1722.26, "yMax" => -1577.59],
            ["name" => "Market", "xMin" => 1072.66, "xMax" => 1370.85, "yMin" => -1416.25, "yMax" => -1130.85],
            ["name" => "Conference Center", "xMin" => 1073.22, "xMax" => 1323.90, "yMin" => -1842.27, "yMax" => -1804.21],
            ["name" => "Verdant Bluffs", "xMin" => 1073.22, "xMax" => 1249.62, "yMin" => -2006.78, "yMax" => -1842.27],
            ["name" => "Mulholland", "xMin" => 1096.47, "xMax" => 1169.13, "yMin" => -910.17, "yMax" => -768.03],
            ["name" => "Temple", "xMin" => 1096.47, "xMax" => 1252.33, "yMin" => -1130.84, "yMax" => -1026.33],
            ["name" => "Temple", "xMin" => 1096.47, "xMax" => 1252.33, "yMin" => -1026.33, "yMax" => -910.17],
            ["name" => "Whitewood Estates", "xMin" => 1098.31, "xMax" => 1197.39, "yMin" => 1726.22, "yMax" => 2243.23],
            ["name" => "Pilson Intersection", "xMin" => 1098.39, "xMax" => 1377.39, "yMin" => 2243.23, "yMax" => 2507.23],
            ["name" => "Prickle Pine", "xMin" => 1117.40, "xMax" => 1534.56, "yMin" => 2507.23, "yMax" => 2723.23],
            ["name" => "Yellow Bell Golf Course", "xMin" => 1117.40, "xMax" => 1457.46, "yMin" => 2723.23, "yMax" => 2863.23],
            ["name" => "Montgomery", "xMin" => 1119.51, "xMax" => 1451.40, "yMin" => 119.53, "yMax" => 493.32],
            ["name" => "Verona Beach", "xMin" => 1161.52, "xMax" => 1323.90, "yMin" => -1722.26, "yMax" => -1577.59],
            ["name" => "Blackfield Intersection", "xMin" => 1166.53, "xMax" => 1375.60, "yMin" => 795.01, "yMax" => 1044.69],
            ["name" => "Mulholland", "xMin" => 1169.13, "xMax" => 1318.13, "yMin" => -910.17, "yMax" => -768.03],
            ["name" => "Julius Thruway West", "xMin" => 1197.39, "xMax" => 1236.63, "yMin" => 1163.39, "yMax" => 2243.23],
            ["name" => "Blackfield Intersection", "xMin" => 1197.39, "xMax" => 1277.05, "yMin" => 1044.69, "yMax" => 1163.39],
            ["name" => "Redsands West", "xMin" => 1236.63, "xMax" => 1777.39, "yMin" => 1883.11, "yMax" => 2142.86],
            ["name" => "Las Venturas Airport", "xMin" => 1236.63, "xMax" => 1457.37, "yMin" => 1203.28, "yMax" => 1883.11],
            ["name" => "Julius Thruway West", "xMin" => 1236.63, "xMax" => 1297.47, "yMin" => 2142.86, "yMax" => 2243.23],
            ["name" => "LVA Freight Depot", "xMin" => 1236.63, "xMax" => 1277.05, "yMin" => 1163.41, "yMax" => 1203.28],
            ["name" => "Los Santos International", "xMin" => 1249.62, "xMax" => 1852.00, "yMin" => -2394.33, "yMax" => -2179.25],
            ["name" => "Verdant Bluffs", "xMin" => 1249.62, "xMax" => 1692.62, "yMin" => -2179.25, "yMax" => -1842.27],
            ["name" => "Temple", "xMin" => 1252.33, "xMax" => 1378.33, "yMin" => -1130.85, "yMax" => -1026.33],
            ["name" => "Temple", "xMin" => 1252.33, "xMax" => 1357.00, "yMin" => -926.99, "yMax" => -910.17],
            ["name" => "Temple", "xMin" => 1252.33, "xMax" => 1391.05, "yMin" => -1026.33, "yMax" => -926.99],
            ["name" => "Mulholland", "xMin" => 1269.13, "xMax" => 1414.07, "yMin" => -768.03, "yMax" => -452.42],
            ["name" => "Blackfield Intersection", "xMin" => 1277.05, "xMax" => 1315.35, "yMin" => 1044.69, "yMax" => 1087.63],
            ["name" => "LVA Freight Depot", "xMin" => 1277.05, "xMax" => 1375.60, "yMin" => 1087.63, "yMax" => 1203.28],
            ["name" => "Mulholland", "xMin" => 1281.13, "xMax" => 1641.13, "yMin" => -452.42, "yMax" => -290.91],
            ["name" => "Redsands West", "xMin" => 1297.47, "xMax" => 1777.39, "yMin" => 2142.86, "yMax" => 2243.23],
            ["name" => "LVA Freight Depot", "xMin" => 1315.35, "xMax" => 1375.60, "yMin" => 1044.69, "yMax" => 1087.63],
            ["name" => "Mulholland", "xMin" => 1318.13, "xMax" => 1357.00, "yMin" => -910.17, "yMax" => -768.03],
            ["name" => "Commerce", "xMin" => 1323.90, "xMax" => 1440.90, "yMin" => -1722.26, "yMax" => -1577.59],
            ["name" => "Commerce", "xMin" => 1323.90, "xMax" => 1701.90, "yMin" => -1842.27, "yMax" => -1722.26],
            ["name" => "Blackfield Chapel", "xMin" => 1325.60, "xMax" => 1375.60, "yMin" => 596.35, "yMax" => 795.01],
            ["name" => "Mulholland", "xMin" => 1357.00, "xMax" => 1463.90, "yMin" => -926.99, "yMax" => -768.03],
            ["name" => "Commerce", "xMin" => 1370.85, "xMax" => 1463.90, "yMin" => -1577.59, "yMax" => -1384.95],
            ["name" => "Downtown Los Santos", "xMin" => 1370.85, "xMax" => 1463.90, "yMin" => -1170.87, "yMax" => -1130.85],
            ["name" => "Downtown Los Santos", "xMin" => 1370.85, "xMax" => 1463.90, "yMin" => -1170.87, "yMax" => -1130.85],
            ["name" => "Blackfield Chapel", "xMin" => 1375.60, "xMax" => 1558.09, "yMin" => 596.35, "yMax" => 823.23],
            ["name" => "LVA Freight Depot", "xMin" => 1375.60, "xMax" => 1457.37, "yMin" => 919.45, "yMax" => 1203.28],
            ["name" => "Blackfield Intersection", "xMin" => 1375.60, "xMax" => 1457.39, "yMin" => 823.23, "yMax" => 919.45],
            ["name" => "Redsands West", "xMin" => 1377.39, "xMax" => 1704.59, "yMin" => 2243.23, "yMax" => 2433.23],
            ["name" => "Julius Thruway North", "xMin" => 1377.39, "xMax" => 1534.56, "yMin" => 2433.23, "yMax" => 2507.23],
            ["name" => "Yellow Bell Station", "xMin" => 1377.48, "xMax" => 1492.45, "yMin" => 2600.43, "yMax" => 2687.36],
            ["name" => "Downtown Los Santos", "xMin" => 1378.33, "xMax" => 1463.90, "yMin" => -1130.85, "yMax" => -1026.33],
            ["name" => "Los Santos International", "xMin" => 1382.73, "xMax" => 2201.82, "yMin" => -2730.88, "yMax" => -2394.33],
            ["name" => "Downtown Los Santos", "xMin" => 1391.05, "xMax" => 1463.90, "yMin" => -1026.33, "yMax" => -927.00],
            ["name" => "Los Santos International", "xMin" => 1400.97, "xMax" => 2189.82, "yMin" => -2669.26, "yMax" => -2597.26],
            ["name" => "Mulholland", "xMin" => 1414.07, "xMax" => 1667.61, "yMin" => -768.03, "yMax" => -452.42],
            ["name" => "Pershing Square", "xMin" => 1440.90, "xMax" => 1583.50, "yMin" => -1722.26, "yMax" => -1577.59],
            ["name" => "Montgomery", "xMin" => 1451.40, "xMax" => 1582.44, "yMin" => 347.46, "yMax" => 420.80],
            ["name" => "Las Venturas Airport", "xMin" => 1457.37, "xMax" => 1777.39, "yMin" => 1203.28, "yMax" => 1883.11],
            ["name" => "Las Venturas Airport", "xMin" => 1457.37, "xMax" => 1777.40, "yMin" => 1143.21, "yMax" => 1203.28],
            ["name" => "Julius Thruway South", "xMin" => 1457.39, "xMax" => 2377.39, "yMin" => 823.23, "yMax" => 863.23],
            ["name" => "LVA Freight Depot", "xMin" => 1457.39, "xMax" => 1777.40, "yMin" => 863.23, "yMax" => 1143.21],
            ["name" => "Yellow Bell Golf Course", "xMin" => 1457.46, "xMax" => 1534.56, "yMin" => 2723.23, "yMax" => 2863.23],
            ["name" => "Downtown Los Santos", "xMin" => 1463.90, "xMax" => 1724.76, "yMin" => -1430.87, "yMax" => -1290.87],
            ["name" => "Mulholland Intersection", "xMin" => 1463.90, "xMax" => 1812.62, "yMin" => -1150.87, "yMax" => -768.03],
            ["name" => "Commerce", "xMin" => 1463.90, "xMax" => 1667.96, "yMin" => -1577.59, "yMax" => -1430.87],
            ["name" => "Downtown Los Santos", "xMin" => 1463.90, "xMax" => 1724.76, "yMin" => -1290.87, "yMax" => -1150.87],
            ["name" => "Downtown Los Santos", "xMin" => 1507.51, "xMax" => 1582.55, "yMin" => -1385.21, "yMax" => -1325.31],
            ["name" => "Las Venturas Airport", "xMin" => 1515.81, "xMax" => 1729.95, "yMin" => 1586.40, "yMax" => 1714.56],
            ["name" => "Julius Thruway North", "xMin" => 1534.56, "xMax" => 1848.40, "yMin" => 2433.23, "yMax" => 2583.23],
            ["name" => "Prickle Pine", "xMin" => 1534.56, "xMax" => 1848.40, "yMin" => 2583.23, "yMax" => 2863.23],
            ["name" => "Montgomery Intersection", "xMin" => 1546.65, "xMax" => 1745.83, "yMin" => 208.16, "yMax" => 347.46],
            ["name" => "Randolph Industrial Estate", "xMin" => 1558.09, "xMax" => 1823.08, "yMin" => 596.35, "yMax" => 823.23],
            ["name" => "Montgomery Intersection", "xMin" => 1582.44, "xMax" => 1664.62, "yMin" => 347.46, "yMax" => 401.75],
            ["name" => "Commerce", "xMin" => 1583.50, "xMax" => 1758.90, "yMin" => -1722.26, "yMax" => -1577.59],
            ["name" => "The Mako Span", "xMin" => 1664.62, "xMax" => 1785.14, "yMin" => 401.75, "yMax" => 567.20],
            ["name" => "Commerce", "xMin" => 1667.96, "xMax" => 1812.62, "yMin" => -1577.59, "yMax" => -1430.87],
            ["name" => "Unity Station", "xMin" => 1692.62, "xMax" => 1812.62, "yMin" => -1971.80, "yMax" => -1932.80],
            ["name" => "El Corona", "xMin" => 1692.62, "xMax" => 1812.62, "yMin" => -2179.25, "yMax" => -1842.27],
            ["name" => "Little Mexico", "xMin" => 1701.90, "xMax" => 1822.90, "yMin" => -2472.36, "yMax" => -2230.70],
            ["name" => "Idlewood", "xMin" => 1812.62, "xMax" => 1951.66, "yMin" => -1742.31, "yMax" => -1602.31],
            ["name" => "Idlewood", "xMin" => 1812.62, "xMax" => 1971.66, "yMin" => -1852.87, "yMax" => -1742.31],
            ["name" => "Glen Park", "xMin" => 1812.62, "xMax" => 1994.33, "yMin" => -1100.82, "yMax" => -973.38],
            ["name" => "The Visage", "xMin" => 1817.39, "xMax" => 2027.40, "yMin" => 1703.23, "yMax" => 1863.23],
            ["name" => "The Visage", "xMin" => 1817.39, "xMax" => 2106.70, "yMin" => 1863.23, "yMax" => 2011.83],
            ["name" => "Pirates in Mens Pants", "xMin" => 1817.39, "xMax" => 2027.40, "yMin" => 1469.23, "yMax" => 1703.23],
            ["name" => "The High Roller", "xMin" => 1817.39, "xMax" => 2027.39, "yMin" => 1283.23, "yMax" => 1469.23],
            ["name" => "Redsands East", "xMin" => 1817.39, "xMax" => 2106.70, "yMin" => 2011.83, "yMax" => 2202.76],
            ["name" => "Redsands East", "xMin" => 1817.39, "xMax" => 2011.94, "yMin" => 2202.76, "yMax" => 2342.83],
            ["name" => "The Pink Swan", "xMin" => 1817.39, "xMax" => 2027.39, "yMin" => 1083.23, "yMax" => 1283.23],
            ["name" => "The Four Dragons Casino", "xMin" => 1817.39, "xMax" => 2027.39, "yMin" => 863.23, "yMax" => 1083.23],
            ["name" => "Last Dime Motel", "xMin" => 1823.08, "xMax" => 1997.22, "yMin" => 596.35, "yMax" => 823.23],
            ["name" => "Prickle Pine", "xMin" => 1848.40, "xMax" => 1938.80, "yMin" => 2553.49, "yMax" => 2863.23],
            ["name" => "Julius Thruway North", "xMin" => 1848.40, "xMax" => 1938.80, "yMin" => 2478.49, "yMax" => 2553.49],
            ["name" => "Redsands East", "xMin" => 1848.40, "xMax" => 2011.94, "yMin" => 2342.83, "yMax" => 2478.49],
            ["name" => "Los Santos International", "xMin" => 1852.00, "xMax" => 2089.00, "yMin" => -2394.33, "yMax" => -2179.25],
            ["name" => "Fishers Lagoon", "xMin" => 1916.99, "xMax" => 2131.72, "yMin" => -233.32, "yMax" => 13.80],
            ["name" => "Julius Thruway North", "xMin" => 1938.80, "xMax" => 2121.40, "yMin" => 2508.23, "yMax" => 2624.23],
            ["name" => "Prickle Pine", "xMin" => 1938.80, "xMax" => 2121.40, "yMin" => 2624.23, "yMax" => 2861.55],
            ["name" => "Idlewood", "xMin" => 1951.66, "xMax" => 2124.66, "yMin" => -1742.31, "yMax" => -1602.31],
            ["name" => "Willowfield", "xMin" => 1970.62, "xMax" => 2089.00, "yMin" => -2179.25, "yMax" => -1852.87],
            ["name" => "Idlewood", "xMin" => 1971.66, "xMax" => 2222.56, "yMin" => -1852.87, "yMax" => -1742.31],
            ["name" => "Los Santos International", "xMin" => 1974.63, "xMax" => 2089.00, "yMin" => -2394.33, "yMax" => -2256.59],
            ["name" => "Las Colinas", "xMin" => 1994.33, "xMax" => 2056.86, "yMin" => -1100.82, "yMax" => -920.82],
            ["name" => "Jefferson", "xMin" => 1996.91, "xMax" => 2056.86, "yMin" => -1449.67, "yMax" => -1350.72],
            ["name" => "Rockshore West", "xMin" => 1997.22, "xMax" => 2377.39, "yMin" => 596.35, "yMax" => 823.23],
            ["name" => "The Emerald Isle", "xMin" => 2011.94, "xMax" => 2237.40, "yMin" => 2202.76, "yMax" => 2508.23],
            ["name" => "The Strip", "xMin" => 2027.40, "xMax" => 2137.40, "yMin" => 1703.23, "yMax" => 1783.23],
            ["name" => "The Strip", "xMin" => 2027.40, "xMax" => 2087.39, "yMin" => 863.23, "yMax" => 1703.23],
            ["name" => "The Strip", "xMin" => 2027.40, "xMax" => 2162.39, "yMin" => 1783.23, "yMax" => 1863.23],
            ["name" => "Los Santos International", "xMin" => 2051.63, "xMax" => 2152.45, "yMin" => -2597.26, "yMax" => -2394.33],
            ["name" => "Jefferson", "xMin" => 2056.86, "xMax" => 2281.45, "yMin" => -1372.04, "yMax" => -1210.74],
            ["name" => "Jefferson", "xMin" => 2056.86, "xMax" => 2185.33, "yMin" => -1210.74, "yMax" => -1126.32],
            ["name" => "Jefferson", "xMin" => 2056.86, "xMax" => 2266.21, "yMin" => -1449.67, "yMax" => -1372.04],
            ["name" => "Las Colinas", "xMin" => 2056.86, "xMax" => 2126.86, "yMin" => -1126.32, "yMax" => -920.82],
            ["name" => "Caligula's Palace", "xMin" => 2087.39, "xMax" => 2437.39, "yMin" => 1543.23, "yMax" => 1703.23],
            ["name" => "The Camels Toe", "xMin" => 2087.39, "xMax" => 2640.40, "yMin" => 1203.23, "yMax" => 1383.23],
            ["name" => "Comealot", "xMin" => 2087.39, "xMax" => 2623.18, "yMin" => 943.23, "yMax" => 1203.23],
            ["name" => "Royal Casino", "xMin" => 2087.39, "xMax" => 2437.39, "yMin" => 1383.23, "yMax" => 1543.23],
            ["name" => "Ocean Docks", "xMin" => 2089.00, "xMax" => 2201.82, "yMin" => -2394.33, "yMax" => -2235.84],
            ["name" => "Willowfield", "xMin" => 2089.00, "xMax" => 2201.82, "yMin" => -2235.84, "yMax" => -1989.90],
            ["name" => "Willowfield", "xMin" => 2089.00, "xMax" => 2324.00, "yMin" => -1989.90, "yMax" => -1852.87],
            ["name" => "The Strip", "xMin" => 2106.70, "xMax" => 2162.39, "yMin" => 1863.23, "yMax" => 2202.76],
            ["name" => "Julius Thruway North", "xMin" => 2121.40, "xMax" => 2237.40, "yMin" => 2508.23, "yMax" => 2663.17],
            ["name" => "Spinybed", "xMin" => 2121.40, "xMax" => 2498.21, "yMin" => 2663.17, "yMax" => 2861.55],
            ["name" => "Idlewood", "xMin" => 2124.66, "xMax" => 2222.56, "yMin" => -1742.31, "yMax" => -1494.03],
            ["name" => "Jefferson", "xMin" => 2124.66, "xMax" => 2266.21, "yMin" => -1494.03, "yMax" => -1449.67],
            ["name" => "Las Colinas", "xMin" => 2126.86, "xMax" => 2185.33, "yMin" => -1126.32, "yMax" => -934.49],
            ["name" => "Caligula's Palace", "xMin" => 2137.40, "xMax" => 2437.39, "yMin" => 1703.23, "yMax" => 1783.23],
            ["name" => "Palomino Creek", "xMin" => 2160.22, "xMax" => 2576.92, "yMin" => -149.00, "yMax" => 228.32],
            ["name" => "The Clowns Pocket", "xMin" => 2162.39, "xMax" => 2437.39, "yMin" => 1783.23, "yMax" => 1883.23],
            ["name" => "Old Venturas Strip", "xMin" => 2162.39, "xMax" => 2685.16, "yMin" => 2012.18, "yMax" => 2202.76],
            ["name" => "Starfish Casino", "xMin" => 2162.39, "xMax" => 2437.39, "yMin" => 1883.23, "yMax" => 2012.18],
            ["name" => "Jefferson", "xMin" => 2185.33, "xMax" => 2281.45, "yMin" => -1210.74, "yMax" => -1154.59],
            ["name" => "Las Colinas", "xMin" => 2185.33, "xMax" => 2281.45, "yMin" => -1154.59, "yMax" => -934.49],
            ["name" => "Willowfield", "xMin" => 2201.82, "xMax" => 2324.00, "yMin" => -2095.00, "yMax" => -1989.90],
            ["name" => "Ocean Docks", "xMin" => 2201.82, "xMax" => 2324.00, "yMin" => -2730.88, "yMax" => -2418.33],
            ["name" => "Ocean Docks", "xMin" => 2201.82, "xMax" => 2324.00, "yMin" => -2418.33, "yMax" => -2095.00],
            ["name" => "East Los Santos", "xMin" => 2222.56, "xMax" => 2421.03, "yMin" => -1628.53, "yMax" => -1494.03],
            ["name" => "Ganton", "xMin" => 2222.56, "xMax" => 2632.83, "yMin" => -1722.33, "yMax" => -1628.53],
            ["name" => "Ganton", "xMin" => 2222.56, "xMax" => 2632.83, "yMin" => -1852.87, "yMax" => -1722.33],
            ["name" => "Julius Thruway North", "xMin" => 2237.40, "xMax" => 2498.21, "yMin" => 2542.55, "yMax" => 2663.17],
            ["name" => "Roca Escalante", "xMin" => 2237.40, "xMax" => 2536.43, "yMin" => 2202.76, "yMax" => 2542.55],
            ["name" => "East Los Santos", "xMin" => 2266.26, "xMax" => 2381.68, "yMin" => -1494.03, "yMax" => -1372.04],
            ["name" => "East Los Santos", "xMin" => 2281.45, "xMax" => 2381.68, "yMin" => -1372.04, "yMax" => -1135.04],
            ["name" => "Las Colinas", "xMin" => 2281.45, "xMax" => 2632.74, "yMin" => -1135.04, "yMax" => -945.03],
            ["name" => "North Rock", "xMin" => 2285.37, "xMax" => 2770.59, "yMin" => -768.03, "yMax" => -269.74],
            ["name" => "Ocean Docks", "xMin" => 2324.00, "xMax" => 2703.58, "yMin" => -2145.10, "yMax" => -2059.23],
            ["name" => "Willowfield", "xMin" => 2324.00, "xMax" => 2541.70, "yMin" => -2059.23, "yMax" => -1852.87],
            ["name" => "Ocean Docks", "xMin" => 2324.00, "xMax" => 2703.58, "yMin" => -2302.33, "yMax" => -2145.10],
            ["name" => "Ocean Docks", "xMin" => 2373.77, "xMax" => 2809.22, "yMin" => -2697.09, "yMax" => -2330.46],
            ["name" => "Julius Thruway South", "xMin" => 2377.39, "xMax" => 2537.39, "yMin" => 788.89, "yMax" => 897.90],
            ["name" => "Rockshore West", "xMin" => 2377.39, "xMax" => 2537.39, "yMin" => 596.35, "yMax" => 788.89],
            ["name" => "East Los Santos", "xMin" => 2381.68, "xMax" => 2462.13, "yMin" => -1454.35, "yMax" => -1135.04],
            ["name" => "East Los Santos", "xMin" => 2381.68, "xMax" => 2421.03, "yMin" => -1494.03, "yMax" => -1454.35],
            ["name" => "East Los Santos", "xMin" => 2421.03, "xMax" => 2632.83, "yMin" => -1628.53, "yMax" => -1454.35],
            ["name" => "Pilgrim", "xMin" => 2437.39, "xMax" => 2624.40, "yMin" => 1383.23, "yMax" => 1783.23],
            ["name" => "Starfish Casino", "xMin" => 2437.39, "xMax" => 2685.16, "yMin" => 1783.23, "yMax" => 2012.18],
            ["name" => "Starfish Casino", "xMin" => 2437.39, "xMax" => 2495.09, "yMin" => 1858.10, "yMax" => 1970.85],
            ["name" => "San Andreas Sound", "xMin" => 2450.39, "xMax" => 2759.25, "yMin" => 385.50, "yMax" => 562.35],
            ["name" => "East Los Santos", "xMin" => 2462.13, "xMax" => 2581.73, "yMin" => -1454.35, "yMax" => -1135.04],
            ["name" => "KACC Military Fuels", "xMin" => 2498.21, "xMax" => 2749.90, "yMin" => 2626.55, "yMax" => 2861.55],
            ["name" => "Julius Thruway North", "xMin" => 2498.21, "xMax" => 2685.16, "yMin" => 2542.55, "yMax" => 2626.55],
            ["name" => "Roca Escalante", "xMin" => 2536.43, "xMax" => 2625.16, "yMin" => 2202.76, "yMax" => 2442.55],
            ["name" => "Julius Thruway East", "xMin" => 2536.43, "xMax" => 2685.16, "yMin" => 2442.55, "yMax" => 2542.55],
            ["name" => "Rockshore East", "xMin" => 2537.39, "xMax" => 2902.35, "yMin" => 676.55, "yMax" => 943.23],
            ["name" => "Willowfield", "xMin" => 2541.70, "xMax" => 2703.58, "yMin" => -1941.40, "yMax" => -1852.87],
            ["name" => "Willowfield", "xMin" => 2541.70, "xMax" => 2703.58, "yMin" => -2059.23, "yMax" => -1941.40],
            ["name" => "Hankypanky Point", "xMin" => 2576.92, "xMax" => 2759.25, "yMin" => 62.16, "yMax" => 385.50],
            ["name" => "Los Flores", "xMin" => 2581.73, "xMax" => 2632.83, "yMin" => -1454.35, "yMax" => -1393.42],
            ["name" => "Los Flores", "xMin" => 2581.73, "xMax" => 2747.74, "yMin" => -1393.42, "yMax" => -1135.04],
            ["name" => "Julius Thruway East", "xMin" => 2623.18, "xMax" => 2749.90, "yMin" => 943.23, "yMax" => 1055.96],
            ["name" => "Pilgrim", "xMin" => 2624.40, "xMax" => 2685.16, "yMin" => 1383.23, "yMax" => 1783.23],
            ["name" => "Julius Thruway East", "xMin" => 2625.16, "xMax" => 2685.16, "yMin" => 2202.76, "yMax" => 2442.55],
            ["name" => "Las Colinas", "xMin" => 2632.74, "xMax" => 2747.74, "yMin" => -1135.04, "yMax" => -945.03],
            ["name" => "East Beach", "xMin" => 2632.83, "xMax" => 2959.35, "yMin" => -1852.87, "yMax" => -1668.13],
            ["name" => "East Beach", "xMin" => 2632.83, "xMax" => 2747.74, "yMin" => -1668.13, "yMax" => -1393.42],
            ["name" => "Julius Thruway East", "xMin" => 2685.16, "xMax" => 2749.90, "yMin" => 1055.96, "yMax" => 2626.55],
            ["name" => "Ocean Docks", "xMin" => 2703.58, "xMax" => 2959.35, "yMin" => -2302.33, "yMax" => -2126.90],
            ["name" => "Playa del Seville", "xMin" => 2703.58, "xMax" => 2959.35, "yMin" => -2126.90, "yMax" => -1852.87],
            ["name" => "Las Colinas", "xMin" => 2747.74, "xMax" => 2959.35, "yMin" => -1120.04, "yMax" => -945.03],
            ["name" => "East Beach", "xMin" => 2747.74, "xMax" => 2959.35, "yMin" => -1498.62, "yMax" => -1120.04],
            ["name" => "East Beach", "xMin" => 2747.74, "xMax" => 2959.35, "yMin" => -1668.13, "yMax" => -1498.62],
            ["name" => "Linden Station", "xMin" => 2749.90, "xMax" => 2923.39, "yMin" => 1198.99, "yMax" => 1548.99],
            ["name" => "Linden Side", "xMin" => 2749.90, "xMax" => 2923.39, "yMin" => 943.23, "yMax" => 1198.99],
            ["name" => "Sobell Rail Yards", "xMin" => 2749.90, "xMax" => 2923.39, "yMin" => 1548.99, "yMax" => 1937.25],
            ["name" => "Creek", "xMin" => 2749.90, "xMax" => 2921.62, "yMin" => 1937.25, "yMax" => 2669.79],
            ["name" => "Frederick Bridge", "xMin" => 2759.25, "xMax" => 2774.25, "yMin" => 296.50, "yMax" => 594.76],
            ["name" => "Linden Station", "xMin" => 2811.25, "xMax" => 2861.25, "yMin" => 1229.59, "yMax" => 1407.59]
        ];
    
        foreach ($areas as $area) {
            if (
                $x >= $area["xMin"] && $x <= $area["xMax"] &&
                $y >= $area["yMin"] && $y <= $area["yMax"]
            ) {
                return $area["name"];
            }
        }
        return "Localização desconhecida";
    }
    
?>