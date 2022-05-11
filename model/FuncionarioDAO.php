<?php
require_once 'Database.php';

class FuncionarioDAO{
    private $conexao;

    function __construct(){
        $Database = new Database;
        $this->conexao = $Database->getConexao();
    }

    function store($funcionario){
        $stmt = $this->conexao->prepare("INSERT INTO funcionarios (nome, email,	senha, cpf, cargo) VALUES (:nome, :email, :senha, :cpf, :cargo)");
        $stmt->bindValue(':nome', $funcionario->getNome());
        $stmt->bindValue(':email', $funcionario->getEmail());
        $stmt->bindValue(':senha', $funcionario->getSenha());
        $stmt->bindValue(':cpf', $funcionario->getCpf());
        $stmt->bindValue(':cargo', $funcionario->getCargo());
        return $stmt->execute();
    }

    function update($funcionario){
        $stmt = $this->conexao->prepare("UPDATE funcionarios SET nome = :nome, email = :email, senha = :senha, cpf = :cpf, cargo = :cargo WHERE id = :id");
        $stmt->bindValue(':nome', $funcionario->getNome());
        $stmt->bindValue(':email', $funcionario->getEmail());
        $stmt->bindValue(':senha', $funcionario->getSenha());
        $stmt->bindValue(':cpf', $funcionario->getCpf());
        $stmt->bindValue(':cargo', $funcionario->getCargo());
        $stmt->bindValue(':id', $funcionario->getId());
        return $stmt->execute();
    }

    function list(){
        $stmt = $this->conexao->prepare("SELECT * FROM funcionarios");
        if($stmt->execute()){
            return $stmt->fetchAll();
        }

        return false;
    }

    function delete($id){
        $stmt = $this->conexao->prepare("DELETE FROM funcionarios WHERE id = :id");
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
}