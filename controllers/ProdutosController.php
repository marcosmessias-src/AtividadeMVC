<?php
require_once 'model/Produto.php';
require_once 'model/ProdutoDAO.php';

class ProdutosController{
    private $produto;
    private $produtoDao;

    function __construct()
    {
        $this->produtoDao = new ProdutoDAO();
    }

    public function index(){
        $_REQUEST['produtos'] = $this->produtoDao->list();
        
        require_once 'view/produto.php';
    }

    public function store(){        
        $this->produto = new Produto();
        $this->produto->setNome($_REQUEST['nome']);
        $this->produto->setCaminho_imagem($_REQUEST['caminho_imagem']);
        $this->produto->setDescricao($_REQUEST['descricao']);
        $this->produto->setQuantidade($_REQUEST['quantidade']);
        $this->produto->setPreco($_REQUEST['preco']);
        $this->produto->setCategorias($_REQUEST['categorias']);
        $this->produto->setNcm($_REQUEST['ncm']);
        
        if($this->produtoDao->store($this->produto)){
            $_REQUEST['store'] = true;
        }else{
            $_REQUEST['store'] = false;
        }

        $this->index();
    }

    public function update(){
        $this->produto = new Produto();
        $this->produto->setId($_REQUEST['id']);
        $this->produto->setNome($_REQUEST['nome']);
        $this->produto->setCaminho_imagem($_REQUEST['caminho_imagem']);
        $this->produto->setDescricao($_REQUEST['descricao']);
        $this->produto->setQuantidade($_REQUEST['quantidade']);
        $this->produto->setPreco($_REQUEST['preco']);
        $this->produto->setCategorias($_REQUEST['categorias']);
        $this->produto->setNcm($_REQUEST['ncm']);

        if($this->produtoDao->update($this->produto)){
            $_REQUEST['update'] = true;
        }else{
            $_REQUEST['update'] = false;
        }

        $this->index();        
    }

    public function delete(){
        if(!$_REQUEST['id']){
            return false;  
        }

        if($this->produtoDao->delete($_REQUEST['id'])){
            $_REQUEST['delete'] = true;
        }else{
            $_REQUEST['delete'] = false;
        }

        $this->index();
    }
}