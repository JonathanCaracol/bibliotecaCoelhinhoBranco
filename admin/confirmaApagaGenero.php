<?php
$id=intval($_POST['id']);


include_once ('includes/body.inc.php');
$sql="delete from 06hugo_generos where generoId =$id";
mysqli_query($con,$sql);
header("location:generos.php");
?>