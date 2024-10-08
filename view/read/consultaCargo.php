<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href=".././style.css">
    <style>
        table { border: 1px solid black; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        .container { display: grid; grid-template-columns: repeat(2, 1fr); grid-gap: 100px; }
    </style>
</head>
<body class="fundo">
<header>
    <nav class="nav-header">
          <ul>
              <li><a href="../../index.html">Home</a></li>
              <li>
                  <div class="dropdown">
                      <button onclick="myFunction()" class="dropbtn">Cadastro</button>
                      <div id="myDropdown" class="dropdown-content">
                        <a href="../create/formCargo.php">Cargo</a>
                        <a href="../create/formDepartamento.php">Departamento</a>
                        <a href="../create/formFuncionario.php">Funcionário</a>
                        <a href="../create/formLogin.php">Login</a>
                      </div>
                    </div>
                    </li>  
                <li><div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn">Consulta</button>
                  <div id="myDropdown" class="dropdown-content">
                    <a href="consultaCargo.php">Cargo</a>
                    <a href="consultaDepartamento.php">Departamento</a>
                    <a href="consultaFuncionario.php">Funcionário</a>
                  </div>
                </div>
                </li>
          </ul>
      </nav>
</header>
<hr>
<main>
    <center>
    <div>
        <h2>Cargo</h2>
        <table>
            <tr>
                <th>Salário</th>
                <th>Data e hora</th>
                <th>Nome</th>
                <th>Cod Cargo</th>
                <th>Alteração</th>
                <th>Exclusão</th>
            </tr>
            <?php
            require_once '../../controller/read/consultaCargo.php';
            $controller = new consultaCargo();
            $cargos = $controller->consultarCargo();

            foreach ($cargos as $row) {
                echo "<tr>";
                echo "<td>".$row['salario']."</td>";
                echo "<td>".$row['dataHora']."</td>";
                echo "<td>".$row['nomeCargo']."</td>";
                echo "<td>".$row['codCargo']."</td>";
                

                echo '<td><button class="btn btn-primary" onclick="window.location.href=\'../update/alteracaoCargo.php?id='.$row['codCargo'].'\'">Alterar</button></td>';
                echo '<td>
                        <form method="POST" action="../../controller/delete/excluiCargo.php" style="display:inline;">
                            <input type="hidden" name="codCargo" value="'.$row['codCargo'].'">
                            <button type="submit" name="delete_cargo" class="btn btn-danger">Excluir</button>
                            
                        </form>
                      </td>';
                echo "</tr>";
            }
            ?>
        </table>
    </div>
    </center>
</main>
<footer>
    Gisele Araújo, Matheus Santos e Pedro Henrique.
</footer>
</body>
</html>
