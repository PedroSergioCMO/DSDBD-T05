<?php
require_once 'TaskController.php';

$taskController = new TaskController();
$tasks = $taskController->getAllTasks();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Controle de Tarefas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Controle de Tarefas</h1>

        <h2>Lista de Tarefas</h2>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Sigla</th>
                    <th>Descrição</th>
                    <th>Data de Início</th>
                    <th>Data de Encerramento</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task) { ?>
                    <tr>
                        <td><?php echo $task->getId(); ?></td>
                        <td><?php echo $task->getSigla(); ?></td>
                        <td><?php echo $task->getDescricao(); ?></td>
                        <td><?php echo $task->getDataInicio(); ?></td>
                        <td><?php echo $task->getDataEncerramento(); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <h2>Nova Tarefa</h2>
        <form method="POST" action="create_task.php">
            <div class="form-group">
                <label for="sigla">Sigla:</label>
                <input type="text" class="form-control" id="sigla" name="sigla" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea class="form-control" id="descricao" name="descricao" required></textarea>
            </div>

            <div class="form-group">
                <label for="dataInicio">Data de Início:</label>
                <input type="date" class="form-control" id="dataInicio" name="dataInicio" required>
            </div>

            <div class="form-group">
                <label for="dataEncerramento">Data de Encerramento:</label>
                <input type="date" class="form-control" id="dataEncerramento" name="dataEncerramento" required>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
