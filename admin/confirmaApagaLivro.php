<?php
$id = intval($_POST['id']);
include_once('includes/body.inc.php');

$sql = "delete from 06hugo_livrogeneros where livroGeneroLivroId =$id";
mysqli_query($con, $sql);
$sql = "delete from 06hugo_livroautores where livroAutorLivroId =$id";
mysqli_query($con, $sql);


$sql = "delete from 06hugo_livros where livroId =$id";
mysqli_query($con, $sql);
header("location:livros.php");
?>