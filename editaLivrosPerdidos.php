<?php

$id= intval($_GET ['id']);
$con =mysqli_connect("localhost", "root", "", "paphugo");
$sql="select * from titulos ".$id;
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);

?>

<h1>Novo tipo cliente</h1>
<input type="button" value="Voltar ao Menu" onclick="javascript: location.href='index.php';" />
<form name="f1"  action="confirmaEditaTipoCliente.php" method="post">
    <strong>Sigla</strong>
    <input type="text" name="sigla" value="<?php echo $dados['clienteTipoSigla']?>"><br>
    <strong>Nome</strong>
    <input type="text" name="nome" value="<?php echo $dados['clienteTipoNome']?>"><br>
    <input type="submit" name="botao" value="confirma">
    <input  type="hidden" name="id" value="<?php echo $id?>">
</form>
