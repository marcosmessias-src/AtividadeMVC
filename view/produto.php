<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Produtos</title>
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
                        Produto adicionado com sucesso!
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
                        Produto deletado com sucesso!
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
                        Produto atualizado com sucesso!
                    </div>
                </div>
            ");
        }
    ?>

    <a href="index.php" class="btn btn-primary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M10.78 19.03a.75.75 0 01-1.06 0l-6.25-6.25a.75.75 0 010-1.06l6.25-6.25a.75.75 0 111.06 1.06L5.81 11.5h14.44a.75.75 0 010 1.5H5.81l4.97 4.97a.75.75 0 010 1.06z"></path></svg> Voltar</a>
    <h1>Produtos <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#cadastrarProduto">Adicionar produto</button></h1>

    <br>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Nome</th>
            <th scope="col">Descricao</th>
            <th scope="col">Pre??o</th>
            <th scope="col">Caminho Imagem</th>
            <th scope="col">Categorias</th>
            <th scope="col">Quantidade</th>
            <th scope="col">NCM</th>
            <th scope="col">A????o</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(isset($_REQUEST['produtos'])){
                    foreach($_REQUEST['produtos'] as $produto){
                        echo("<tr>");
                        echo("<th scope='row'>{$produto['id']}</th>");
                        echo("<th scope='row'>{$produto['nome']}</th>");
                        echo("<th scope='row'>{$produto['descricao']}</th>");
                        echo("<th scope='row'>{$produto['preco']}</th>");
                        echo("<th scope='row'>{$produto['caminho_imagem']}</th>");
                        echo("<th scope='row'>{$produto['categorias']}</th>");
                        echo("<th scope='row'>{$produto['quantidade']}</th>");
                        echo("<th scope='row'>{$produto['ncm']}</th>");
                        echo("<th scope='row' class='row'>  <button class='btn btn-warning col-6' data-bs-toggle='modal' data-bs-target='#produto-{$produto['id']}'>Atualizar</button>");
                        echo("
                                <form action='index.php' method='post' class='col-6'>
                                    <input type='hidden' name='classe' value='Produtos'>
                                    <input type='hidden' name='acao' value='delete'>
                                    <input type='hidden' name='id' value='{$produto['id']}'>
                    
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
        if(isset($_REQUEST['produtos'])){
            foreach($_REQUEST['produtos'] as $produto){
                echo("
                <div class='modal' tabindex='-1' id='produto-{$produto['id']}'>
                    <div class='modal-dialog'>
                        <form action='index.php' method='POST'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title'>Atualizar o Produto - ID {$produto['id']}</h5>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>

                                <input type='hidden' name='classe' value='Produtos'>
                                <input type='hidden' name='acao' value='update'>
                                <input type='hidden' name='id' value='{$produto['id']}'>

                                    Nome: <input class='form-control' name='nome' value='{$produto['nome']}'></input><br>
                                    Descri????o: <input class='form-control' name='descricao' value='{$produto['descricao']}'></input><br>
                                    Categorias: <input class='form-control' name='categorias' value='{$produto['categorias']}'></input><br>
                                    Quantidade: <input class='form-control' name='quantidade' value='{$produto['quantidade']}'></input><br>
                                    Pre??o: <input class='form-control' name='preco' value='{$produto['preco']}'></input><br>
                                    NCM: <input class='form-control' name='ncm' value='{$produto['ncm']}'></input><br>
                                    Imagem: <input class='form-control' name='caminho_imagem' value='{$produto['caminho_imagem']}'></input><br>

                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                    <button type='submit' class='btn btn-primary'>Atualizar produto</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>");
            }
        }
    ?>
    
    <div class="modal" tabindex="-1" id="cadastrarProduto">
        <div class="modal-dialog">
            <form action="index.php" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cadastrar Produto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    <input type="hidden" name="classe" value="Produtos">
                    <input type="hidden" name="acao" value="store">

                        Nome: <input class="form-control" name="nome"></input><br>
                        Descri????o: <input class="form-control" name="descricao"></input><br>
                        Categorias: <input class="form-control" name="categorias"></input><br>
                        Quantidade: <input class="form-control" name="quantidade"></input><br>
                        Pre??o: <input class="form-control" name="preco"></input><br>
                        NCM: <input class="form-control" name="ncm"></input><br>
                        Imagem: <input class="form-control" name="caminho_imagem"></input><br>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Cadastrar produto</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>