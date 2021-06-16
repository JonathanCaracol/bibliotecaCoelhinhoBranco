<?php
$titulo = addslashes($_POST['titulo']);
$sinopse = addslashes($_POST['sinopse']);
$estado = addslashes($_POST['estado']);
$autor=intval($_POST['autores']);
$genero=intval($_POST['generos']);
include_once('includes/body.inc.php');
include_once('../common.php');

$file="";
$imagem=$_FILES['imagem']['tmp_name'];
$file=time().chr(rand(65,90)).'.jpg';
uploadFile($imagem,'../img/'.$file);

$sql = "insert into 06hugo_livros values(0,'$titulo','$sinopse','$estado','$file','0')";
mysqli_query($con, $sql);
$id1="SELECT MAX(livroId) FROM 06hugo_livros";
$id2= mysqli_query($con,$id1);
$id = (int)$id2;

$sql = "insert into 06hugo_livroautores values('$autor','$id')";
mysqli_query($con, $sql);

$sql = "insert into 06hugo_livrogeneros values('$id','$genero')";
mysqli_query($con, $sql);

header("location:livros.php");
?>