<?php
$id=intval($_POST['id']);
$nome=addslashes($_POST['nome']);


include_once ('includes/body.inc.php');
$sql="update 06hugo_generos set generoNome='$nome' where generoId =$id";
mysqli_query($con,$sql);
header("location:generos.php");
?>