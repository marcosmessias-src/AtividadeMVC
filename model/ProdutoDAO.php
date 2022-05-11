<?php
require_once 'Database.php';
require_once 'Produto.php';

class ProdutoDAO{
    private $conexao;

    function __construct(){
        $Database = new Database;
        $this->conexao = $Database->getConexao();
    }

    function store(Produto $produto){
        $stmt = $this->conexao->prepare("INSERT INTO produtos (nome, descricao,	preco, caminho_imagem, categorias, quantidade, ncm) VALUES (:nome, :descricao, :preco, :caminho_imagem, :categorias, :quantidade, :ncm)");
        $stmt->bindValue(':nome', $produto->getNome());
        $stmt->bindValue(':descricao', $produto->getDescricao());
        $stmt->bindValue(':categorias', $produto->getCategorias());
        $stmt->bindValue(':preco', $produto->getPreco());
        $stmt->bindValue(':caminho_imagem', $produto->getCaminho_imagem());
        $stmt->bindValue(':ncm', $produto->getNcm());
        $stmt->bindValue(':quantidade', $produto->getQuantidade());
        return $stmt->execute();
    }

    function update(Produto $produto){
        $stmt = $this->conexao->prepare("UPDATE produtos SET nome = :nome, descricao = :descricao, preco = :preco, caminho_imagem = :caminho_imagem, categorias = :categorias, quantidade = :quantidade, ncm = :ncm WHERE id = :id");
        $stmt->bindValue(':nome', $produto->getNome());
        $stmt->bindValue(':descricao', $produto->getDescricao());
        $stmt->bindValue(':categorias', $produto->getCategorias());
        $stmt->bindValue(':preco', $produto->getPreco());
        $stmt->bindValue(':caminho_imagem', $produto->getCaminho_imagem());
        $stmt->bindValue(':ncm', $produto->getNcm());
        $stmt->bindValue(':quantidade', $produto->getQuantidade());
        $stmt->bindValue(':id', $produto->getId());
        return $stmt->execute();
    }

    function list(){
        $stmt = $this->conexao->prepare("SELECT * FROM produtos");
        
        if($stmt->execute()){
            return $stmt->fetchAll();
        }

        return false;
    }

    function delete($id){
        $stmt = $this->conexao->prepare("DELETE FROM produtos WHERE id = :id");
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
}