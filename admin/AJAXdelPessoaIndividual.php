<?php header("content-type:text/html;charset=ISO-8859-1")?>
<?php
$idPessoa=intval($_POST['pessoaId']);

$con=mysqli_connect("localhost","root","","livros");
$sql="delete from pessoas where pessoaId=".$idPessoa;
mysqli_query($con,$sql);
?>