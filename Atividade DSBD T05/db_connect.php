<?php
class DBConnect {
    private $host = "localhost";
    private $dbname = "controle_tarefas";
    private $username = "root";
    private $password = "12345";
    private $connection;

    public function __construct($host, $dbname, $username, $password) {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect() {
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        } catch (PDOException $e) {
            echo 'Falha na conexão: ' . $e->getMessage();
            return null;
        }
    }

    public function close() {
        $this->connection = null;
    }
}
?>
