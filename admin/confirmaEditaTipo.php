<?php
$id=intval($_POST['id']);
$nome=addslashes($_POST['nome']);
$tipo=addslashes($_POST['tipo']);


include_once ('includes/body.inc.php');
$sql="update 06hugo_utilizadortipos set utilizadorTipoNome='$nome', utilizadorTipoClassificacao='$tipo' where utilizadorTipoId =$id";
mysqli_query($con,$sql);
header("location:tipos.php");
?>