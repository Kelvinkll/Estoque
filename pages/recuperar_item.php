<?php

include("lib/conexao.php");


$id = intval($_GET['id']);

$sql_query = $mysqli->query("UPDATE estoque SET excluido = '0', data_exclusao = null, usuario_exclusao = null WHERE id = '$id'") or die($mysqli->error);
die("<script>location.href=\"index.php?p=relatorio\";</script>");

