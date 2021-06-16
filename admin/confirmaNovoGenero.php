<?php
$nome=addslashes($_POST['nome']);
include_once ('includes/body.inc.php');
$sql="insert into 06hugo_generos values(0,'$nome')";
mysqli_query($con,$sql);
header("location:generos.php");
?>