<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionário</title>
    <link rel="stylesheet" href="../../view/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
     crossorigin="anonymous"></script>
</head>
<body>    
<header>  
  <nav class="nav-header">
          <ul>
              <li><a href="../../index.html">Home</a></li>
              <li>
                  <div class="dropdown">
                      <button onclick="myFunction()" class="dropbtn">Cadastro</button>
                      <div id="myDropdown" class="dropdown-content">
                        <a href="../../view/create/formCargo.php">Cargo</a>
                        <a href="../../view/create/formDepartamento.php">Departamento</a>
                        <a href="../../view/create/formFuncionario.php">Funcionário</a>
                      </div>
                    </div>
                    </li>  
                <li><div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn">Consulta</button>
                  <div id="myDropdown" class="dropdown-content">
                    <a href="../../view/read/consultaCargo.php">Cargo</a>
                    <a href="../../view/read/consultaDepartamento.php">Departamento</a>
                    <a href="../../view/read/consultaFuncionario.php">Funcionário</a>
                  </div>
                </div>
                </li>
          </ul>
      </nav>
  </header>
 <center>
<?php

require_once '../../model/classFuncionario.php';

$func = new Funcionario();

$cpf = addslashes($_POST['txtCpf']);
$nome = addslashes($_POST['txtNomeFuncionario']);
$telefone = addslashes($_POST['txtTelefone']);
$endereco = addslashes($_POST['txtEndereco']);
$codDepartamento = addslashes($_POST['txtDepartamento']);
$codCargo = addslashes($_POST['txtCargo']);
$dataHora = addslashes($_POST['txtDataHora']);
$NovoUpload = addslashes($_POST['upload']);

if(isset($_FILES['upload']))
{
    //receber o arquivo na variavel 
    $arquivo = $_FILES['upload'];
    //tratar erro de envio
    if($arquivo['error'])
    die("falha ao carregar");

    //delimitar tamanho do arquivo
    if($arquivo['size']>10485760)
    die("arquivo excedeu o limite, maximo 10MB");

    //ver o conteudo
    echo "<pre>";
    print_r($arquivo);
    echo "</pre>";

    //converter para variaveis as partes do arquivo
    $pasta = "../../view/img/";
    $pasta2 = "view/img/";
    $nomeArquivo = $arquivo['name'];
    $nomeCodigo = uniqid();
    $extensao = strtolower(pathinfo($nomeArquivo,PATHINFO_EXTENSION));
    //strtolower - transforma a extensão em minusculo

    //criar a variavel $path
    $caminho= $pasta.$nomeCodigo.".".$extensao;
    $caminho2= $pasta2.$nomeCodigo.".".$extensao;

    //verificar a extensão
    if($extensao != 'jpg' && $extensao !='png')
       die("arquivo invalido");
       
    //mover para pasta do projeto
    $arquivoUpload = move_uploaded_file($arquivo["tmp_name"],$caminho);
    $func->validaFuncionario($cpf, $nome, $telefone,
    $endereco, $codDepartamento, $codCargo,
     $dataHora,$caminho,$NovoUpload);

       
}





header('Location: ../../view/read/consultaFuncionario.php');
?>

</center>   
    <footer>
            Gisele Araújo, Matheus Santos e Pedro Henrique.
    </footer>
</body>
</html>
