<?php
require_once 'model/Funcionario.php';
require_once 'model/FuncionarioDAO.php';

class FuncionariosController{
    private $funcionario;
    private $funcionarioDao;

    function __construct()
    {
        $this->funcionarioDao = new FuncionarioDAO();
    }

    public function index(){
        $_REQUEST['funcionarios'] = $this->funcionarioDao->list();
        
        require_once 'view/funcionario.php';
    }

    public function store(){        
        $this->funcionario = new Funcionario();
        $this->funcionario->setNome($_REQUEST['nome']);
        $this->funcionario->setEmail($_REQUEST['email']);
        $this->funcionario->setSenha($_REQUEST['senha']);
        $this->funcionario->setCpf($_REQUEST['cpf']);
        $this->funcionario->setCargo($_REQUEST['cargo']);
        
        if($this->funcionarioDao->store($this->funcionario)){
            $_REQUEST['store'] = true;
        }else{
            $_REQUEST['store'] = false;
        }

        $this->index();
    }

    public function update(){
        $this->funcionario = new Funcionario();
        $this->funcionario->setId($_REQUEST['id']);
        $this->funcionario->setNome($_REQUEST['nome']);
        $this->funcionario->setEmail($_REQUEST['email']);
        $this->funcionario->setSenha($_REQUEST['senha']);
        $this->funcionario->setCpf($_REQUEST['cpf']);
        $this->funcionario->setCargo($_REQUEST['cargo']);

        if($this->funcionarioDao->update($this->funcionario)){
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

        if($this->funcionarioDao->delete($_REQUEST['id'])){
            $_REQUEST['delete'] = true;
        }else{
            $_REQUEST['delete'] = false;
        }

        $this->index();
    }
}