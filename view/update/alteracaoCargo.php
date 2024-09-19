<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
     crossorigin="anonymous"></script>
     <link rel="stylesheet" href="../style.css">
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
                    <a href="../read/consultaCargo.php">Cargo</a>
                    <a href="../read/consultaDepartamento.php">Departamento</a>
                    <a href="../read/consultaFuncionario.php">Funcionário</a>
                  </div>
                </div>
                </li>
          </ul>
      </nav>
  </header>
  <hr>
    <div class="container">
        <h2>Alterar Cargo</h2>
        <?php
            require_once '../../controller/update/alteraCargo.php';

            $controller = new alteraCargo();

            if (isset($_GET['id'])) {
                $codCargo = $_GET['id'];
                $cargo = $controller->getCargo($codCargo);

                if ($cargo) {
                    echo '
                    <form method="POST" action="alteracaoCargo.php">
                    <input type="hidden" class="form-control"  name="codCargo" value="'.$cargo['codCargo'].'" required>
                    <div class="mb-3">
                        <label for="nomeCargo" class="form-label">Nome do Cargo</label>
                        <input type="text" class="form-control"  name="nomeCargo" value="'.$cargo['nomeCargo'].'" required><br><br>

                        <label for="datetime">Data e Hora:</label><br>
                        <input type="datetime-local" id="datetime" name="dataHora" value="'.$cargo['dataHora'].'" required><br><br>

                        <br><br>
                        <label for="exampleInputEmail1" class="form-label">Salário:</label>
                        <input type="decimal" name="salario" value="'.$cargo['salario'].'" required><br><br>
                        </div>
                    <button type="submit" class="btn btn-primary" name="update_cargo">Salvar Alterações</button>
                    </form>';
                } else {
                    echo "Cargo não encontrado.";
                }
            }
         
        ?>
        <a href="../read/consultaCargo.php" class="btn btn-secondary">Voltar</a>
    </div>
    <footer>
            Gisele Araújo, Matheus Santos e Pedro Henrique.
    </footer>
</body>
</html>
