 <?php
	session_start();
	include('../lib/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Contato</title>
	<head>
	<body>
		<?php
		
		$arquivo = 'LogExclusao.xls';
		
		
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="5">Itens Excluidos</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Item</b></td>';
		$html .= '<td><b>Valor</b></td>';
		$html .= '<td><b>Data de Exclusão</b></td>';
		$html .= '<td><b>Usuário de Exclusão</b></td>';
		$html .= '</tr>';
		
		
		$result_itens = "SELECT * FROM estoque WHERE excluido = 1";
		$resultado_itens = mysqli_query($mysqli , $result_itens);
		
		while($row_itens = mysqli_fetch_assoc($resultado_itens)){
			$html .= '<tr>';
			$html .= '<td>'.$row_itens["id"].'</td>';
			$html .= '<td>'.$row_itens["nome"].'</td>';
			$html .= '<td>'.$row_itens["preco"].'</td>';
            $data = date('d/m/Y H:i:s',strtotime($row_itens["data_exclusao"]));
			$html .= '<td>'.$data.'</td>';			
            $html .= '<td>'.$row_itens["usuario_exclusao"].'</td>';			
			$html .= '</tr>';
			;
		}
		
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		
		echo $html;
		exit; ?>
	</body>
</html>