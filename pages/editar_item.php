<?php
include('lib/conexao.php');

$id = intval($_GET['id']);

if(isset($_POST['enviar'])) {

    $nome = $mysqli->escape_string ($_POST['nome']);
    $descricao = $mysqli->escape_string ($_POST['descricao']);
    $preco = $mysqli->escape_string ($_POST['preco']);
    $quantidade = $mysqli->escape_string ($_POST['quantidade']);
    $posicao = $mysqli->escape_string ($_POST['posicao']);

    $erro = array();
    if(empty($nome)){
        $erro[] = "Preencha um nome válido!";
    }
    if(empty($descricao)){
        $erro[] = "Preencha uma descrição válida!";
    }
    if(empty($preco)){
        $erro[] = "Preencha um preço válido!";
    }
    if(empty($quantidade)){
        $erro[] = "Preencha uma quantidade válida!";
    }
    if(empty($posicao)){
        $erro[] = "Preencha uma posição válida!";}

        if(count($erro) == 0) {

            if($posicao !== false) {
    
                $sql_code = "UPDATE estoque SET
                    nome = '$nome',
                    descricao = '$descricao',
                    preco = '$preco',
                    quantidade = '$quantidade',
                    posicao = '$posicao'
                    WHERE id = '$id'
                ";
                $inserido = $mysqli->query($sql_code);
                if(!$inserido)
                    $erro[] = "Falha ao inserir no banco de dados: " . $mysqli->error;
                else {
                    die("<script>location.href=\"index.php?p=estoque\";</script>");
                }
    
            } else 
                $erro[] = "Falha";
    
        }
}


$sql_query = $mysqli->query ("SELECT * FROM estoque WHERE id = '$id'") or die  ($mysqli->error);
$item = $sql_query->fetch_assoc();

?>


<!--INICIO HTML-->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Alterar Item</h4>
                    <span>Preencha as informações para alterar</span>
                </div>
            </div>
        </div>
                                            
    </div>
</div>


<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <?php if(isset($erro) && count($erro) > 0 ) {
                ?>
                    <div class="alert alert-danger" role="alert">
                    <?php foreach($erro as $e) { echo "$e<br>";} ?>
                    </div>
                <?php 
            } ?>
            <div class="card">
                <div class="card-header">
                    <h5>Alteração de item</h5>
                                                        
                </div>
                <div class="card-block">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Nome</label>
                                    <input type="text" value="<?php echo $item['nome']; ?>"  name = 'nome' class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="">Descrição</label>
                                    <input type="text" value="<?php echo $item['descricao']; ?>" name = 'descricao'class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Preço</label>
                                    <input type="text" value="<?php echo $item['preco']; ?>" name = 'preco'class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Quantidade</label>
                                    <input type="text" value="<?php echo $item['quantidade']; ?>" name = 'quantidade'class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Posição</label>
                                    <input type="text" value="<?php echo $item['posicao']; ?>" name = 'posicao'class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <span style="padding: 5px;"><button type = "submit" name = "enviar" values = "1" class="btn btn-sucess btn-round" >Alterar</button></span>
                                <span style="padding: 5px;"><button type = "reset" class="btn btn-sucess btn-round">Cancelar</button></span>
                                <span style="padding: 5px;"><a href="index.php?p=estoque"><button type = "button" class="btn btn-sucess btn-round">Voltar</button><a></span>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>