<?php
include_once ("includes/body.inc.php");
include_once ("../common.php");
$txt=addslashes($_POST['txt']);
?>
<table class="table table-sm table-dark">

    <thead>
    <tr style="color: #ffc107">
        <th width="10%" scope="col">#</th>
        <th  width="30%" scope="col">Nome</th>
        <th  width="20%" scope="col">Categoria</th>
        <th  width="20%" scope="col">Tipo</th>
        <th width="20%"  colspan="2" scope="col">
            <a href="novoUtilizador.php" class="btn btn-success"><span class="fas fa-plus"></span> Adicionar </a>
        </th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sql="select * from 06hugo_utilizadores inner join 06hugo_utilizadortipos on utilizadorTipoId=utilizadorUtilizadorTipoId where utilizadorNome like '%".$txt."%'";
    $res=mysqli_query($con,$sql);
    while($dados=mysqli_fetch_array($res)){
        echo"<tr>";
        echo"<th scope=\"row\">".$dados['utilizadorId']."</th>";
        echo"<td><a href=\"perfilUtilizador.php?id=".$dados['utilizadorId']."\">".$dados['utilizadorNome']."</a></td>";
        echo"<td>".$dados['utilizadorCategoria']."</td>";
        echo"<td>".$dados['utilizadorTipoNome']."</td>";
        echo"<td><a href=\"editaUtilizador.php?id=".$dados['utilizadorId']."\" class=\"btn btn-info\"><span class=\"fas fa-edit\"></span> <span>Editar </span></a>
        </td>";
        echo"<td><a href=\"apagaUtilizador.php?id=".$dados['utilizadorId']."\" class=\"btn btn-danger\"><span class=\"far fa-trash-alt\"></span> <span>Eliminar </span></a></td>";
        echo"</tr>";
    }

    ?>

    </tbody>
</table>
