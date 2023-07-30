<?php

include("lib/conexao.php");

$id = intval($_GET['id']);


$sql_query = $mysqli->query("SELECT nome FROM usuarios WHERE id = '$id_usuario'");
$usuario_exclusao = $sql_query->fetch_array();


$sql_query = $mysqli->query("UPDATE estoque SET excluido = '1', data_exclusao = NOW(), usuario_exclusao = '$usuario_exclusao[0]' WHERE id = '$id'") or die($mysqli->error);
die("<script>location.href=\"index.php?p=estoque\";</script>");

