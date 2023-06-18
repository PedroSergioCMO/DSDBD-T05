<?php
class Task {
    private $id;
    private $sigla;
    private $descricao;
    private $dataInicio;
    private $dataEncerramento;

    public function __construct($sigla, $descricao, $dataInicio, $dataEncerramento) {
        $this->sigla = $sigla;
        $this->descricao = $descricao;
        $this->dataInicio = $dataInicio;
        $this->dataEncerramento = $dataEncerramento;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getSigla() {
        return $this->sigla;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getDataInicio() {
        return $this->dataInicio;
    }

    public function getDataEncerramento() {
        return $this->dataEncerramento;
    }
}
?>
