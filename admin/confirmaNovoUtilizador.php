<?php
$nome=addslashes($_POST['nome']);
$tipo=intval($_POST['tipo']);
$cat=addslashes($_POST['categoria']);

include_once ('includes/body.inc.php');
$sql="insert into 06hugo_utilizadores values(0,'$nome',$tipo,'$cat','activo')";
mysqli_query($con,$sql);
echo mysqli_error($con);
header("location:utilizadores.php");
?>