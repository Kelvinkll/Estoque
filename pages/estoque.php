<?php

include('lib/conexao.php');

$sql_itens = "SELECT * FROM estoque WHERE excluido <> 1 ORDER BY id ASC";
$sql_query = $mysqli->query($sql_itens) or die($mysqli->error);
$num_itens = $sql_query->num_rows;

?>


<!--INICIO HTML-->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Itens no Estoque</h4>
                    <span><a href="index.php?p=cadastrar_item "><button type = "button" class="btn btn-sucess btn-round">Cadastrar Item</button></a></span>
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
                        <th>Posição</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Gerenciar</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if($num_itens == 0) { ?>

                    <tr> <td colspan="5">Nenhum item foi cadastrado</td> </tr>
                    
                    <?php } else { 
                        
                        while($item = $sql_query->fetch_assoc()) { 
                            ?>

                            <tr>
                                <th scope="row"> <?php echo $item ['id']; ?> </th>
                                <td><?php echo $item ['nome']; ?></td>
                                <td><?php echo $item ['posicao']; ?></td>
                                <td><?php echo $item ['quantidade']; ?></td>
                                <td>R$ <?php echo number_format ($item ['preco'], 2,',', '.'); ?></td>
                                <td> 
                                    <a href="index.php?p=editar_item&id=<?php echo $item ['id']; ?>">Editar</a> | 
                                    <a href="index.php?p=deletar_item&id=<?php echo $item ['id']; ?>">Deletar</a> 
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