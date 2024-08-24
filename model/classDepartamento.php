<?php 
require_once 'classConexao.php';
Class Departamento
{
    private $pdo;

    public function __construct(){
        $conexao = new Conexao();
        $this->pdo = $conexao->conectar();
    }

    public function insereDepartamento ($nomeDepartamento, $dataHora){
        $insere = $this->pdo->prepare("insert into departamento (nomeDepartamento, dataHora) values (:n, :dh)");
        $insere->bindValue(":n",$nomeDepartamento);
        $insere->bindValue(":dh",$dataHora);
        $insere->execute();
    }
    
    public function validaDepartamento($nomeDepartamento, $dataHora){
        $valida = $this->pdo->prepare("select codDepartamento from departamento where nomeDepartamento = :depto");
        $valida->bindValue(":depto", $nomeDepartamento);
        $valida -> execute();

        if ($valida->rowCount()>0){
            echo"<script>alert('Departamento ou data hora já cadastrado, verifique duplicidade')</script>";
        }
        else {
            $this->insereDepartamento($nomeDepartamento, $dataHora);
            echo "<script>alert('Cadastrado o novo departamento e data hora com sucesso!')</script>";
        }
    }

    public function validaExclusaoDepartamento($codDepartamento){
        $valida = $this->pdo->prepare("SELECT funcionario.codDepartamento from departamento 
        inner join funcionario on departamento.codDepartamento = funcionario.codDepartamento 
        where departamento.codDepartamento = :depto");
        $valida->bindValue(":depto", $codDepartamento);
        $valida -> execute();

        if ($valida->rowCount()>0){
            echo"<script>alert('Departamento associado a outra tabela, verificar relação')</script>";
            echo "<script>window.history.go(-1);</script>";
        }
        else {
            $this->excluirDepartamento($codDepartamento);
            echo"<script>alert('Departamento excluído com sucesso!')</script>";
            echo "<script>window.location.href = '../../view/read/consultaDepartamento.php';</script>";
        }
    }

    public function consultarDepartamento(){
        $retorna= array();
        $le = $this->pdo->query("select * from departamento order by nomeDepartamento");
        $retorna = $le-> fetchAll(PDO::FETCH_ASSOC);
        return $retorna;
    }

    public function excluirDepartamento($codDepartamento) {
        $comandosql = $this->pdo->prepare("DELETE FROM departamento WHERE codDepartamento = :codDepartamento");
        $comandosql->bindParam(':codDepartamento', $codDepartamento);

        if ($comandosql->execute()) {
            return true; 
        } else {
            return false; 
        }
    }

    public function alterarDepartamento($codDepartamento,$nomeDepartamento) {
        $retorna= array();
        $comandosql = $this->pdo->prepare("UPDATE departamento SET nomeDepartamento = :nome WHERE codDepartamento = :id");
        $comandosql->bindParam(':nome', $nomeDepartamento);
        $comandosql->bindParam(':id', $codDepartamento);
        
        if ($comandosql->execute()) {
            return $retorna;
        } else {
            return false;
        }
    }

    public function getDepartamento($codDepartamento) {
        $query = $this->pdo->prepare("SELECT * FROM departamento WHERE codDepartamento = :id");
        $query->bindParam(':id', $codDepartamento);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}
?>