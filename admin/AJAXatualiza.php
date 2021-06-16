<?php header("content-type:text/html;charset=ISO-8859-1");

$id=intval($_POST['id']);
$pais=intval($_POST['autor']);
$nome=urldecode(addslashes($_POST['nome']));
$dn=addslashes($_POST['dn']);



$con=mysqli_connect("localhost","root","","livros");
$sql="update pessoas set ";
$sql.="pessoaNome='".$nome."', pessoaDataNascimento='".$dn."', ";
$sql.="pessoaPaisId=".$pais." where pessoaId=".$id;
mysqli_query($con,$sql);
?>