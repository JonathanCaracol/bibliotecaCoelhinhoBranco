<?php



header("content-type:text/html;charset=ISO-8859-1");
header("location:index.php");


include_once ("includes/body.inc.php");
include_once ("../common.php");

$id=intval($_GET['id']);


$sql="update 06hugo_livros set livroEstado='disponivel' where livroId=".$id;


mysqli_query($con,$sql);


return true;


?>

