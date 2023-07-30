<?php

include('lib/conexao.php');
include('lib/protect.php');
protect(0);



$sql_relatorios = "SELECT*FROM estoque WHERE excluido = 1 ORDER BY id ASC";
$sql_query = $mysqli->query($sql_relatorios) or die($mysqli->error);
$num_relatorios = $sql_query->num_rows;

?>


<!--INICIO HTML-->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Itens excluidos</h4>
                    <span><a href="pages/gerar_relatorio.php "><button type = "button" class="btn btn-sucess btn-round">Gerar Excel</button></a></span>
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
                        <th>Item</th>
                        <th>Valor</th>
                        <th>Data da exclusão</th>
                        <th>Usuário Exclusão</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if($num_relatorios == 0) { ?>

                    <tr> <td colspan="5">Nenhum item foi excluído</td> </tr>
                    
                    <?php } else { 
                        
                        while($relatorio = $sql_query->fetch_assoc()) { 
                            ?>

                            <tr>
                                <th scope="row"> <?php echo $relatorio ['id']; ?> </th>
                                <td><?php echo $relatorio ['nome']; ?></td>
                                <td>R$ <?php echo number_format($relatorio['preco'], 2, ',', '.'); ?></td>
                                <td><?php echo date("d/m/y H:i", strtotime ($relatorio ['data_exclusao'])); ?></td>
                                <td><?php  echo $relatorio ['usuario_exclusao']; ?></td>
                                <td> 
                                    <a href="index.php?p=recuperar_item&id=<?php echo $relatorio ['id']; ?>">Recuperar</a>
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