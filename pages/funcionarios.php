<?php

include('lib/conexao.php');
include('lib/protect.php');
protect(1);


$sql_usuario = "SELECT * FROM usuarios ORDER BY id ASC";
$sql_query = $mysqli->query($sql_usuario) or die($mysqli->error);
$num_usuarios = $sql_query->num_rows;

$sql_desabilitado = "SELECT * FROM usuarios WHERE desabilitado = 1";

?>


<!--INICIO HTML-->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Gerenciar Funcionários</h4>
                    <span><a href="index.php?p=cadastrar_funcionario "><button type = "button" class="btn btn-sucess btn-round">Cadastrar Funcionário</button></a></span>
                </div>
            </div>
        </div>                    
    </div>
</div>


<div class="page-body">
    <div class="row">
        <!---->
        <div class="col-sm-12">
            <div class="card">
            <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Cargo</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if($num_usuarios == 0) { ?>

                    <tr> <td colspan="5">Nenhum usuário foi cadastrado</td> </tr>
                    
                    <?php } else { 
                        
                        while($usuario = $sql_query->fetch_assoc()) { 
                            ?>

                            <tr >
                                <th scope="row"> <?php echo $usuario ['id']; ?> </th>
                                <td><?php echo $usuario ['nome']; ?></td>
                                <td><?php echo $usuario ['email']; ?></td>
                                <td><?php echo $usuario ['cargo']; ?></td>
                                <td> 
                                    <a href="index.php?p=editar_funcionario&id=<?php echo $usuario ['id']; ?>">Editar</a>
                                </td>
                            </tr>

                            <?php 
                        } 
                    } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>