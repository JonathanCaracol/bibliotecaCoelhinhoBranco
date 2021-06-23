<?php
include_once("admin/includes/body.inc.php");
$id = intval($_POST['id']);
$sql = "SELECT livroTitulo FROM 06hugo_livros where livroId=$id";
$result=mysqli_query($con,$sql);
$dados = mysqli_fetch_array($result);
echo $dados['livroTitulo'];
?>