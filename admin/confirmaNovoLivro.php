<?php
include_once('includes/body.inc.php');
include_once('../common.php');
$titulo = addslashes($_POST['titulo']);
$sinopse = addslashes($_POST['sinopse']);
$estado = addslashes($_POST['estado']);
$autor=intval($_POST['autores']);
$genero=intval($_POST['generos']);


$file="";
$imagem=$_FILES['imagem']['tmp_name'];
$file='Imagens/'.time().chr(rand(65,90)).'.jpg';
uploadFile($imagem,'../'.$file);

$sql = "insert into 06hugo_livros values(0,'$titulo','$sinopse','$estado','$file','0')";
mysqli_query($con, $sql);

$id = mysqli_insert_id($con);// ultimo id gerado
$sql = "update 06hugo_livros set livroNumero=livroId where livroId=$id";
mysqli_query($con, $sql);


$sql = "insert into 06hugo_livroautores values('$id','$autor')";
mysqli_query($con, $sql);

$sql = "insert into 06hugo_livrogeneros values('$id','$genero')";
mysqli_query($con, $sql);

header("location:livros.php");
?>

