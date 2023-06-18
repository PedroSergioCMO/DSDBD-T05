<?php
require_once 'TaskController.php';

$taskController = new TaskController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sigla = $_POST['sigla'];
    $descricao = $_POST['descricao'];
    $dataInicio = $_POST['dataInicio'];
    $dataEncerramento = $_POST['dataEncerramento'];

    $taskController->saveTask($sigla, $descricao, $dataInicio, $dataEncerramento);

    header('Location: index.php');
    exit();
}
?>
