<?php
require_once '../../model/classDepartamento.php';

class alteraDepartamento {
    private $model;

    public function __construct() {
        $this->model = new departamento();
    }

    public function getDepartamento($codDepartamento) {
        return $this->model->getDepartamento($codDepartamento);
    }
    public function alterarDepartamento($codDepartamento, $nomeDepartamento, $dataHora) {
        return $this->model->alterarDepartamento($codDepartamento, $nomeDepartamento, $dataHora);
    }

}

$controller = new alteraDepartamento();

if (isset($_GET['id'])) {
    $codDepartamento = $_GET['id'];
    $departamento = $controller->getDepartamento($codDepartamento);
}

if (isset($_POST['update_departamento'])) {
    $codDepartamento = $_POST['codDepartamento'];
    $nomeDepartamento = $_POST['nomeDepartamento'];
    $dataHora = $_POST['dataHora'];

    $controller->alterarDepartamento($codDepartamento, $nomeDepartamento, $dataHora);
    if ($controller->alterarDepartamento($codDepartamento, $nomeDepartamento, $dataHora)) {
        echo '<div class="alert alert-success" role="alert">Departamento atualizado com sucesso!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Erro ao atualizar departamento.</div>';
    }
    header('Location: ../../view/read/consultaDepartamento.php');

}

?>