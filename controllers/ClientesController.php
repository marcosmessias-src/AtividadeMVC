<?php
require_once 'model/Cliente.php';
require_once 'model/ClienteDAO.php';

class ClientesController{
    private $cliente;
    private $clienteDao;

    function __construct()
    {
        $this->clienteDao = new ClienteDAO();
    }

    public function index(){
        $_REQUEST['clientes'] = $this->clienteDao->list();
        
        require_once 'view/cliente.php';
    }

    public function store(){        
        $this->cliente = new Cliente();
        $this->cliente->setNome($_REQUEST['nome']);
        $this->cliente->setEmail($_REQUEST['email']);
        $this->cliente->setSenha($_REQUEST['senha']);
        $this->cliente->setCpf($_REQUEST['cpf']);
        $this->cliente->setEndereco($_REQUEST['endereco']);
        
        if($this->clienteDao->store($this->cliente)){
            $_REQUEST['store'] = true;
        }else{
            $_REQUEST['store'] = false;
        }

        $this->index();
    }

    public function update(){
        $this->cliente = new Cliente();
        $this->cliente->setId($_REQUEST['id']);
        $this->cliente->setNome($_REQUEST['nome']);
        $this->cliente->setEmail($_REQUEST['email']);
        $this->cliente->setSenha($_REQUEST['senha']);
        $this->cliente->setCpf($_REQUEST['cpf']);
        $this->cliente->setEndereco($_REQUEST['endereco']);

        if($this->clienteDao->update($this->cliente)){
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

        if($this->clienteDao->delete($_REQUEST['id'])){
            $_REQUEST['delete'] = true;
        }else{
            $_REQUEST['delete'] = false;
        }

        $this->index();
    }
}