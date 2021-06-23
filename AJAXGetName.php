<?php
include_once("admin/includes/body.inc.php");
$id = intval($_GET['id']);
$sql = "SELECT utilizadorNome FROM 06hugo_utilizadores where utilizadorId=$id";
$result=mysqli_query($con,$sql);
$dados = mysqli_fetch_array($result);
echo $dados['utilizadorNome'];
?>