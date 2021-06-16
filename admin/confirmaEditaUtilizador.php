<?php
$id=intval($_POST['id']);
$nome=addslashes($_POST['nome']);
$tipo=intval($_POST['tipo']);
$cat=addslashes($_POST['categoria']);


include_once ('includes/body.inc.php');
$sql="update 06hugo_utilizadores set utilizadorNome='$nome', utilizadorUtilizadorTipoId=$tipo , utilizadorCategoria='$cat' where utilizadorId =$id";
mysqli_query($con,$sql);
header("location:utilizadores.php");
?>