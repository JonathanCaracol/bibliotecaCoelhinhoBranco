<?php
$nome=addslashes($_POST['nome']);
$tipo=addslashes($_POST['tipo']);
include_once ('includes/body.inc.php');
$sql="insert into 06hugo_utilizadortipos values(0,'$nome','$tipo')";
mysqli_query($con,$sql);
header("location:tipos.php");
?>