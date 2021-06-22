<?php
include_once("js/comum.php");

include_once("admin/includes/body.inc.php");

$id = $_POST['id'];

$sql = "SELECT utilizadorNome FROM 06hugo_utilizadores where utilizadorId='$id'" or die (" Erro na consulta " . mysqli_error());

$result=mysqli_query($con,$sql);

$dados = mysqli_query($result);
return $dados['utilizadorNome'];
?>