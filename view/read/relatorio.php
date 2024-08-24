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
<body>
<header class="fundo">
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
        <h2>Funcionário</h2>
        <table>
            <tr>
                <th>Data e hora</th>
                <th>Funcional</th>
                <th>Cpf</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Departamento</th>
                <th>Cargo</th>
                <th>Alteração</th>
                <th>Exclusão</th>
                <th>Consultar</th>

            </tr>
<?php

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
