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
                        <a href="formCargo.php">Cargo</a>
                        <a href="formDepartamento.php">Departamento</a>
                        <a href="formFuncionario.php">Funcionário</a>
                        <a href="formLogin.php">Login</a>
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
    <main>
        <form method="POST" action="../../controller/create/recebeFuncionario.php" enctype="multipart/form-data">
          <section id="funcionario">
            <center>
                <div style="height: 8vh;"></div>
            <div class="centro" style="height: 700px; border: solid black 5px; width: 40%; padding: 35px 50px; border-radius: 20px;"> 
                <h1>Funcionário</h1>   
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Digite nome:</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="txtNomeFuncionario" 
          aria-describedby="emailHelp" style="border: solid black 1px; width: 70%; border-radius: 0%;" required maxlength="40"><br>

          <label for="exampleInputEmail1" class="form-label">Digite CPF:</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="txtCpf" 
          aria-describedby="emailHelp" style="border: solid black 1px; width: 70%; border-radius: 0%;" required maxlength="11" size= "11"><br>

          <label for="exampleInputEmail1" class="form-label">Digite telefone:</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="txtTelefone" 
          aria-describedby="emailHelp" style="border: solid black 1px; width: 70%; border-radius: 0%;" required maxlength="15" size="15"><br>

          <label for="exampleInputEmail1" class="form-label">Digite endereço:</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="txtEndereco" 
          aria-describedby="emailHelp" style="border: solid black 1px; width: 70%; border-radius: 0%;" required maxlength="70"><br>
          
          <label>SELECIONE O ARQUIVO</label>
        <input name="upload" type="file" accept="image/png, image/jpeg"  multiple><br><br>
        
          <select name="txtCargo">
            <?php
            require_once '../../model/classFuncionario.php';
            $func = new Funcionario();
                $id = $func->consultarCargo();
            ?>
            <option value="valor">Selecione um cargo:</option>
            <?php
               for($i = 0; $i < count($id); $i++){
            ?><option value = "<?php echo $id[$i]['codCargo'];?>">
                <?php echo $id[$i]['nomeCargo'];?>
            </option>
            <?php }  ?>
        </select>
        <br><br>

          <select name="txtDepartamento">
            <?php $id = $func->consultarDepartamento();?>
            <option value="valor">Selecione um departamento:</option>
            <?php
               for($i = 0; $i < count($id); $i++){
            ?>
            
          <option value = "<?php echo $id[$i]['codDepartamento'];?>">
                <?php echo $id[$i]['nomeDepartamento'];?>
            </option>
            <?php }  ?>
          </select><br><br>

          <label for="datetime">Data e Hora:</label>
          <input type="datetime-local" id="datetime" name="txtDataHora"><br><br>
         
          <button type="submit" class="btn btn-primary">Enviar</button>
        </div></center>
        
    </div></section>
      </form>
    </main><BR><BR><BR><BR>
    <footer>
            Gisele Araújo, Matheus Santos e Pedro Henrique.
    </footer>
    <script src="../js/script.js"></script>

</body>
</html>