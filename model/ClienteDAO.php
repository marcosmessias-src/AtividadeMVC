<?php
require_once 'Database.php';

class ClienteDAO{
    private $conexao;

    function __construct(){
        $Database = new Database;
        $this->conexao = $Database->getConexao();
    }

    function store($cliente){
        $stmt = $this->conexao->prepare("INSERT INTO clientes (nome, email,	senha, cpf, endereco) VALUES (:nome, :email, :senha, :cpf, :endereco)");
        $stmt->bindValue(':nome', $cliente->getNome());
        $stmt->bindValue(':email', $cliente->getEmail());
        $stmt->bindValue(':senha', $cliente->getSenha());
        $stmt->bindValue(':cpf', $cliente->getCpf());
        $stmt->bindValue(':endereco', $cliente->getEndereco());
        return $stmt->execute();
    }

    function update($cliente){
        $stmt = $this->conexao->prepare("UPDATE clientes SET nome = :nome, email = :email, senha = :senha, cpf = :cpf, endereco = :endereco WHERE id = :id");
        $stmt->bindValue(':nome', $cliente->getNome());
        $stmt->bindValue(':email', $cliente->getEmail());
        $stmt->bindValue(':senha', $cliente->getSenha());
        $stmt->bindValue(':cpf', $cliente->getCpf());
        $stmt->bindValue(':endereco', $cliente->getEndereco());
        $stmt->bindValue(':id', $cliente->getId());
        return $stmt->execute();
    }

    function list(){
        $stmt = $this->conexao->prepare("SELECT * FROM clientes");
        if($stmt->execute()){
            return $stmt->fetchAll();
        }

        return false;
    }

    function delete($id){
        $stmt = $this->conexao->prepare("DELETE FROM clientes WHERE id = :id");
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
}