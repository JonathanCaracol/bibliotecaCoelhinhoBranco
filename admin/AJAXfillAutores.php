<?php
include_once ("includes/body.inc.php");
include_once ("../common.php");
$txt=addslashes($_POST['txt']);
?>
<table class="table table-sm table-dark">

    <thead>
    <tr style="color: #ffc107">
        <th width="20%" scope="col">#</th>
        <th  width="40%" scope="col">Nome</th>
        <th width="20%"  colspan="2" scope="col">
            <a href="novoAutor.php" class="btn btn-success"><span class="fas fa-plus"></span> Adicionar </a>
        </th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sql="select * from 06hugo_autores where autorNome LIKE '%".$txt."%'";
    $res=mysqli_query($con,$sql);
    while($dados=mysqli_fetch_array($res)){
        echo"<tr>";
        echo"<th scope=\"row\">".$dados['autorId']."</th>";
        echo"<td>".$dados['autorNome']."</a></td>";
        echo"<td><a href=\"editaAutor.php?id=".$dados['autorId']."\" class=\"btn btn-info\"><span class=\"fas fa-edit\"></span> <span>Editar </span></a>
        </td>";
        echo"<td><a href=\"apagaAutor.php?id=".$dados['autorId']."\" class=\"btn btn-danger\"><span class=\"far fa-trash-alt\"></span> <span>Eliminar </span></a></td>";
        echo"</tr>";
    }

    ?>

    </tbody>
</table>
