<?php
require_once 'db_connect.php';
require_once 'Task.php';

class TaskController {
    private $db;

    public function __construct() {
        $this->db = new DBConnect('localhost', 'controle_tarefas', 'root', '12345');
    }

    public function saveTask($sigla, $descricao, $dataInicio, $dataEncerramento) {
        try {
            $connection = $this->db->connect();

            $stmt = $connection->prepare('INSERT INTO tarefas (sigla, descricao, data_inicio, data_encerramento) VALUES (?, ?, ?, ?)');
            $stmt->execute([$sigla, $descricao, $dataInicio, $dataEncerramento]);

            $taskId = $connection->lastInsertId();

            $task = new Task($sigla, $descricao, $dataInicio, $dataEncerramento);
            $task->setId($taskId);

            $this->db->close();

            return $task;
        } catch (PDOException $e) {
            echo 'Error saving task: ' . $e->getMessage();
            return null;
        }
    }

    public function getAllTasks() {
        try {
            $connection = $this->db->connect();

            $stmt = $connection->prepare('SELECT * FROM tarefas');
            $stmt->execute();

            $tasks = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $task = new Task($row['sigla'], $row['descricao'], $row['data_inicio'], $row['data_encerramento']);
                $task->setId($row['id']);
                $tasks[] = $task;
            }

            $this->db->close();

            return $tasks;
        } catch (PDOException $e) {
            echo 'Erro ao retornar as tarefas: ' . $e->getMessage();
            return [];
        }
    }
}
?>
