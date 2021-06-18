<?php

include_once('includes/body.inc.php');
include_once('../common.php');
$titulo = addslashes($_POST['titulo']);
$sinopse = addslashes($_POST['sinopse']);
$estado = addslashes($_POST['estado']);
$id=intval($_POST['id']);
$autorId=intval($_POST['autor']);
$generoId=intval($_POST['genero']);
$texto="";
if(($_FILES['imagem']['name']!=''))
{
    $imagem=$_FILES['imagem']['tmp_name'];
    $file='Imagens/.jpg';
    uploadFile($imagem,'../'.GLOBALPATH.$file);
    $texto=", livroCapaURL='$file'";
}
$sql = "update 06hugo_livros set livroTitulo='$titulo', livroSinopse='$sinopse' , livroEstado='$estado' ".$texto." where livroId =$id";
mysqli_query($con, $sql);

if($autorId != -1){

    // alterar o autor
    $sql = "SELECT * FROM 06hugo_livroautores WHERE livroAutorLivroId = $id";
    $result = mysqli_query($con, $sql);
    $dados = mysqli_fetch_array($result);
    $num = $dados[0];
    if($num != "" && $num != null){
        $sql = "UPDATE 06hugo_livroautores SET livroAutorAutorId=$autorId WHERE livroAutorLivroId =$id";
        mysqli_query($con, $sql);
    }
    else{
        $sql = "INSERT 06hugo_livroautores VALUES ($autorId, $id)";
        mysqli_query($con, $sql);
    }

}

if($generoId != -1){

    // alterar o genero
    $sql = "SELECT * FROM 06hugo_livrogeneros WHERE livroGeneroLivroId = $id";
    $result = mysqli_query($con, $sql);
    $dados = mysqli_fetch_array($result);
    $num = $dados[0];
    if($num != "" && $num != null){
        $sql = "UPDATE 06hugo_livrogeneros SET livroGeneroGeneroId=$generoId WHERE livroGeneroLivroId =$id";
        mysqli_query($con, $sql);
    }
    else{
        $sql = "INSERT 06hugo_livrogeneros VALUES ($id, $generoId)";
        mysqli_query($con, $sql);
    }
}

header("location:livros.php");
?>