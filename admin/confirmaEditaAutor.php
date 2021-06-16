<?php
$id=intval($_POST['id']);
$nome=addslashes($_POST['nome']);


include_once ('includes/body.inc.php');
$sql="update 06hugo_autores set autorNome='$nome' where autorId =$id";
mysqli_query($con,$sql);
header("location:autores.php");
?>