<?php

if(isset($_REQUEST['classe']) && isset($_REQUEST['acao'])){
    $classe = $_REQUEST['classe'];
    $metodo = $_REQUEST['acao'];
    
    $classe .= 'Controller';
    
    require_once 'controllers/'.$classe.'.php';

    $objeto = new $classe();
    $objeto->$metodo();
}else {
    require_once "view/home.php";
}

?>