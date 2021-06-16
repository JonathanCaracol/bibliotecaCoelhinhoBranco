<?php
$con=mysqli_connect("localhost", "root", "", "dml12");
$sigla=addslashes($_POST['sigla']);
$nome=addslashes($_POST['nome']);
$sql="insert into clienteTipos values(0,'".$sigla."','".$nome."')";
mysqli_query($con,$sql);
header("location:titulos.php");
?>
<input type="button" value="Voltar ao Menu" onclick="javascript: location.href='index.php';" />