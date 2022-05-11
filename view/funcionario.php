<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Funcionários</title>
</head>
<body>

    <?php
        if(isset($_REQUEST['store']) && $_REQUEST['store']){
            echo("
                <div class='alert alert-success d-flex align-items-center' role='alert'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img' aria-label='Warning:'>
                        <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
                    </svg>
                    <div>
                        Funcionário adicionado com sucesso!
                    </div>
                </div>
            ");
        }

        if(isset($_REQUEST['delete']) && $_REQUEST['delete']){
            echo("
                <div class='alert alert-danger d-flex align-items-center' role='alert'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img' aria-label='Warning:'>
                        <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
                    </svg>
                    <div>
                        Funcionário deletado com sucesso!
                    </div>
                </div>
            ");
        }

        if(isset($_REQUEST['update']) && $_REQUEST['update']){
            echo("
                <div class='alert alert-warning d-flex align-items-center' role='alert'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img' aria-label='Warning:'>
                        <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
                    </svg>
                    <div>
                        Funcionário atualizado com sucesso!
                    </div>
                </div>
            ");
        }
    ?>

    <a href="index.php" class="btn btn-primary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M10.78 19.03a.75.75 0 01-1.06 0l-6.25-6.25a.75.75 0 010-1.06l6.25-6.25a.75.75 0 111.06 1.06L5.81 11.5h14.44a.75.75 0 010 1.5H5.81l4.97 4.97a.75.75 0 010 1.06z"></path></svg> Voltar</a>
    <h1>Funcionários <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#cadastrarFuncionario">Adicionar funcionário</button></h1>

    <br>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Senha</th>
            <th scope="col">CPF</th>
            <th scope="col">Cargo</th>
            <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(isset($_REQUEST['funcionarios'])){
                    foreach($_REQUEST['funcionarios'] as $funcionario){
                        echo("<tr>");
                        echo("<th scope='row'>{$funcionario['id']}</th>");
                        echo("<th scope='row'>{$funcionario['nome']}</th>");
                        echo("<th scope='row'>{$funcionario['email']}</th>");
                        echo("<th scope='row'>{$funcionario['senha']}</th>");
                        echo("<th scope='row'>{$funcionario['cpf']}</th>");
                        echo("<th scope='row'>{$funcionario['cargo']}</th>");
                        echo("<th scope='row' class='row'>  <button class='btn btn-warning col-6' data-bs-toggle='modal' data-bs-target='#funcionario-{$funcionario['id']}'>Atualizar</button>");
                        echo("
                                <form action='index.php' method='post' class='col-6'>
                                    <input type='hidden' name='classe' value='Funcionarios'>
                                    <input type='hidden' name='acao' value='delete'>
                                    <input type='hidden' name='id' value='{$funcionario['id']}'>
                    
                                    <button class='btn btn-danger' type='submit'>Deletar</button>
                                </form>
                            </th>"
                        );
                        echo("</tr>");
                    }
                }
            ?>
        </tbody>
    </table>

    <?php
        if(isset($_REQUEST['funcionarios'])){
            foreach($_REQUEST['funcionarios'] as $funcionario){
                echo("
                <div class='modal' tabindex='-1' id='funcionario-{$funcionario['id']}'>
                    <div class='modal-dialog'>
                        <form action='index.php' method='POST'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title'>Atualizar o Funcionário - ID {$funcionario['id']}</h5>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>

                                <input type='hidden' name='classe' value='Funcionarios'>
                                <input type='hidden' name='acao' value='update'>
                                <input type='hidden' name='id' value='{$funcionario['id']}'>

                                    Nome: <input class='form-control' name='nome' value='{$funcionario['nome']}'></input><br>
                                    Email: <input class='form-control' name='email' value='{$funcionario['email']}'></input><br>
                                    Senha: <input class='form-control' name='senha' value='{$funcionario['senha']}'></input><br>
                                    CPF: <input class='form-control' name='cpf' value='{$funcionario['cpf']}'></input><br>
                                    Cargo: <input class='form-control' name='cargo' value='{$funcionario['cargo']}'></input><br>

                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                    <button type='submit' class='btn btn-primary'>Atualizar funcionário</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>");
            }
        }
    ?>
    
    <div class="modal" tabindex="-1" id="cadastrarFuncionario">
        <div class="modal-dialog">
            <form action="index.php" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cadastrar Funcionário</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    <input type="hidden" name="classe" value="Funcionarios">
                    <input type="hidden" name="acao" value="store">

                        Nome: <input class="form-control" name="nome"></input><br>
                        Email: <input class="form-control" name="email"></input><br>
                        Senha: <input class="form-control" name="senha"></input><br>
                        CPF: <input class="form-control" name="cpf"></input><br>
                        Cargo: <input class="form-control" name="cargo"></input><br>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Cadastrar funcionário</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>