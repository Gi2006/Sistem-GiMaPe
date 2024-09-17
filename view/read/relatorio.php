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
        <h2>Relatório</h2>
        <?php
    require_once '../../controller/read/consultaFuncionario.php';
    $controller = new consultaFuncionario();
    $funcionarios = $controller->consultarFuncionarios();
    foreach ($funcionarios as $row) {
            
            }
            ?>
        
    </div>
    
    <div class="centro" style="height: 40%; border: solid black 5px; width: 40%; padding: 35px 50px; border-radius: 20px;"> 

  <b>Foto de perfil:</b>
  <?php   echo "<img src='".$row['caminho']."' width='100px' height='100px' alt='Imagem'/>";?><br><br>
  
  <b>Data e hora:</b>
  <?php echo $row['dataHora'];?><br><br>
  
  <b>Funcional:</b>
  <?php  echo $row['funcional'];?><br><br>
  
  <b>CPF:</b>
  <?php  echo $row['cpf'];?><br><br>

  <b>Nome:</b>
  <?php  echo $row['nome'];?><br><br>

  <b>Telefone:</b>
  <?php  echo $row['telefone'];?><br><br>
  
  <b>Endereço:</b>
  <?php  echo $row['endereco'];?><br><br>

  <b>Departamento:</b>
  <?php  echo $row['nomeDepartamento'];?><br><br>
  
  <b>Cargo:</b>
  <?php  echo $row['nomeCargo'];?><br><br>
  <form method="POST" action="../../controller/create/recebeFuncionario.php" enctype="multipart/form-data">

  <label>Escolha a foto:</label>
  <input name="upload" type="file" accept="image/png, image/jpeg"  multiple><br><br>
  <button type="submit" class="btn btn-primary">Alterar foto</button>
  </form>
    </div>
</center>
</main>
<br><br>
<footer>
    Gisele Araújo, Matheus Santos e Pedro Henrique.
</footer>
</body>
</html>
