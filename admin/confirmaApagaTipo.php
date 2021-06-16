<?php
$id=intval($_POST['id']);


include_once ('includes/body.inc.php');
$sql="delete from 06hugo_utilizadortipos where utilizadorTipoId =$id";
mysqli_query($con,$sql);
header("location:tipos.php");
?>