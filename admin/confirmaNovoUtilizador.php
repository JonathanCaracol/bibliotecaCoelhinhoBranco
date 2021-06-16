<?php
$nome=addslashes($_POST['nome']);
$tipo=intval($_POST['tipo']);
$cat=addslashes($_POST['categoria']);

include_once ('includes/body.inc.php');
$sql="insert into 06hugo_utilizadores values(0,'$nome',$tipo,'$cat')";
mysqli_query($con,$sql);
header("location:utilizadores.php");
?>