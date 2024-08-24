<?php
/*comando para instanciar a classe conexao
  e passar os dados do por parâmetro do banco */
require_once 'conexao.php';
$envia = new Conexao("empresa0702","localhost","root","");

//verificar o arquivo para upload
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
    $pasta = "../../img/";
    $nomeArq = $arquivo['name'];
    $nomeCodigo = uniqid();
    $extensao = strtolower(pathinfo($nomeArq,PATHINFO_EXTENSION));
    //strtolower - transforma a extensão em minusculo

    //criar a variavel $path
    $path = $pasta.$nomeCodigo.".".$extensao;

    //verificar a extensão
    if($extensao != 'jpg' && $extensao !='png')
       die("arquivo invalido");
       
    //mover para pasta do projeto
    $arquivoUpload = move_uploaded_file($arquivo["tmp_name"]
    ,$path);

    //enviar os dados para função insere
   $envia->insere($nomeCodigo, $nomeArq, $path);
   echo"<script>alert('arquivo enviado com sucesso')</script>";
       
}
?>