<?php

include('lib/conexao.php');
include('lib/protect.php');
protect(1);

if(isset($_POST['enviar'])) {

    $nome = $mysqli->escape_string ($_POST['nome']);
    $email = $mysqli->escape_string ($_POST['email']);
    $telefone = $mysqli->escape_string ($_POST['telefone']);
    $cargo = $mysqli->escape_string ($_POST['cargo']);
    $senha = $mysqli->escape_string ($_POST['senha']);
    $rsenha = $mysqli->escape_string ($_POST['rsenha']);
    $desabilitado = $mysqli->escape_string ($_POST['desabilitado']);
    $admin = $mysqli->escape_string($_POST['admin']);

    $erro = array();
    if(empty($nome)){
        $erro[] = "Preencha um nome válido!";
    }

    if(empty($email)){
        $erro[] = "Preencha um e-mail válido!";
    }

    if(empty($telefone)){
        $erro[] = "Preencha um telefone válido!";
    }

    if(empty($cargo)){
        $erro[] = "Preencha um cargo válido!";
    }

    if(empty($senha)){
        $erro[] = "Preencha uma senha válida!";
    }

    if($rsenha != $senha){
        $erro[] = "As senhas não correspondem!";
    }
   
    if(count($erro) == 0) {


        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $mysqli->query("INSERT INTO usuarios (nome, email, telefone, cargo, senha, desabilitado, admin) VALUES(
            '$nome', 
            '$email', 
            '$telefone',
            '$cargo',
            '$senha',
            '$desabilitado',
            '$admin'
        )");
        die("<script>location.href=\"index.php?p=funcionarios\";</script>");

    }
}

?>


<!--INICIO HTML-->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Cadastrar Funcionario</h4>
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
                    <h5>Perfil de cadastro</h5>
                                                        
                </div>
                <div class="card-block">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Nome</label>
                                    <input type="text" name = 'nome' class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name = 'email'class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Telefone</label>
                                    <input type="text" name = 'telefone'class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Cargo</label>
                                    <input type="text" name = 'cargo'class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Senha</label>
                                    <input type="text" name = 'senha'class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Repita a senha</label>
                                    <input type="text" name = 'rsenha'class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Desabilitado</label>
                                    <select name="desabilitado" class="form-control">
                                        <option value="0">Não</option>
                                        <option value="1">Sim</option>
                                    </select>
                                    
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Tipo</label>
                                    <select name="admin" class="form-control">
                                        <option value="0">Usuário</option>
                                        <option value="1">Admin</option>
                                    </select>
                                    
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <span style="padding: 5px;"><button type = "submit" name = "enviar" values = "1" class="btn btn-sucess btn-round" >Cadastrar</button></span>
                                <span style="padding: 5px;"><button type = "reset" class="btn btn-sucess btn-round">Cancelar</button></span>
                                <span style="padding: 5px;"><a href="index.php?p=funcionarios"><button type = "button" class="btn btn-sucess btn-round">Voltar</button><a></span>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>