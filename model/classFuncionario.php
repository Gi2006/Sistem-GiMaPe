<?php 
require_once 'classConexao.php';
Class Funcionario
{
    private $pdo;

    public function __construct(){
        $conexao = new Conexao();
        $this->pdo = $conexao->conectar();
    }

    public function insereFuncionario ($cpf, $nome, $telefone, $endereco, $codDepartamento, $codCargo, $dataHora, $caminho){
        $insere = $this->pdo->prepare("insert into funcionario (cpf, nome, telefone, endereco, codDepartamento, codCargo, dataHora, caminho) 
        values (:c,:n,:t,:e,:co,:coc, :dh,:ca)");

        $insere->bindValue(":c",$cpf);
        $insere->bindValue(":n",$nome);        
        $insere->bindValue(":t",$telefone);
        $insere->bindValue(":e",$endereco);
        $insere->bindValue(":co",$codDepartamento);
        $insere->bindValue(":coc",$codCargo);
        $insere->bindValue(":dh",$dataHora);
        $insere->bindValue(":ca", $caminho);
        $insere->execute();
    }


    public function validaFuncionario($cpf, $nome, $telefone, $endereco, $codDepartamento, $codCargo, $dataHora, $caminho) {
        $valida = $this->pdo->prepare("select cpf from funcionario where cpf = :cpf");
        $valida->bindValue(":cpf", $cpf);
        $valida -> execute();
    
        if ($valida->rowCount()>0){
            echo"<script>alert('Funcionario ou data hora já cadastrado, verifique duplicidade')</script>";
        }
        else {
            $this->insereFuncionario($cpf, $nome, $telefone, $endereco, $codDepartamento, $codCargo, $dataHora, $caminho);
            echo "<script>alert('Cadastrado o novo Funcionario e data hora com sucesso!')</script>";
        }
    }

    public function consultarFuncionarios() {
        $consulta = $this->pdo->query("SELECT f.*, d.nomeDepartamento, c.nomeCargo FROM 
        funcionario f INNER JOIN departamento d ON f.codDepartamento = d.codDepartamento 
        INNER JOIN cargo c ON f.codCargo = c.codCargo");
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function excluirFuncionario($funcional) {
        $comandosql = $this->pdo->prepare("DELETE FROM funcionario WHERE funcional = :funcional");
        $comandosql->bindParam(':funcional', $funcional);
        return $comandosql->execute();
    }

    public function consultarCargo() {
        $consulta = $this->pdo->query("SELECT * FROM cargo");
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function consultarDepartamento() {
        $consulta = $this->pdo->query("SELECT * FROM departamento");
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function alterarFuncionario($funcional, $cpf, $nome, $telefone, $endereco, $codDepartamento, $codCargo, $dataHora){
        $retorna = array();
        $comandosql = $this->pdo->prepare("UPDATE funcionario SET cpf = :cpf, nome = :nome, telefone = :telefone,
         endereco = :endereco, codDepartamento = :codDepartamento, codCargo = :codCargo, dataHora = :dataHora WHERE funcional = :funcional");
        $comandosql->bindParam(':funcional', $funcional);
        $comandosql->bindParam(':cpf', $cpf);
        $comandosql->bindParam(':nome', $nome);
        $comandosql->bindParam(':telefone', $telefone);
        $comandosql->bindParam(':endereco', $endereco);
        $comandosql->bindParam(':codDepartamento', $codDepartamento);
        $comandosql->bindParam(':codCargo', $codCargo);
        $comandosql->bindParam(':dataHora', $dataHora);
        
        if ($comandosql->execute()) {
            return $retorna;
        } else {
            return false;
        }
    }

    public function getFuncionario($funcional) {
        $comandosql = $this->pdo->prepare("SELECT funcionario.*, departamento.nomeDepartamento AS nome_departamento, cargo.nomeCargo AS nome_cargo
        FROM funcionario
        INNER JOIN departamento ON funcionario.codDepartamento = departamento.codDepartamento
        INNER JOIN cargo ON funcionario.codCargo = cargo.codCargo
        WHERE funcional = :funcional");
        $comandosql->bindParam(':funcional', $funcional);
        $comandosql->execute();
        return $comandosql->fetch(PDO::FETCH_ASSOC);

        echo $comandosql;
    }
    
    
    
}
?>