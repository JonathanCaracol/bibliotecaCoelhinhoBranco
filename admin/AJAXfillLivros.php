<?php
include_once ("includes/body.inc.php");
include_once ("../common.php");
?>
    <table class="table table-sm table-dark">

        <thead>
        <tr style="color: #ffc107">
            <th width="5%" scope="col">#</th>
            <th width="5%" scope="col">Capa</th>
            <th  width="20%" scope="col">titulo</th>
            <th  width="40%" scope="col">Sinopse</th>
            <th  width="10%" scope="col">Estado</th>
            <th class="text-right" width="20%"  colspan="2" scope="col">
                <a href="novoLivro.php" class="btn btn-success"><span class="fas fa-plus"></span> Adicionar </a>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql="select * from 06hugo_livros";
        $res=mysqli_query($con,$sql);
        while($dados=mysqli_fetch_array($res)){
            echo"<tr>";
            echo"<th scope=\"row\">".$dados['livroId']."</th>";
            echo"<td><img src=\"../".GLOBALPATH.$dados['livroCapaURL']."\" width=\"60\"> </td>";
            echo"<td>".$dados['livroTitulo']."</td>";
            echo"<td>".substrNew($dados['livroSinopse'],223)."(...)</td>";
            echo"<td>".$dados['livroEstado']."</td>";
            echo"<td><a href=\"editaLivro.php?id=".$dados['livroId']."\" class=\"btn btn-info\"><span class=\"fas fa-edit\"></span> <span>Editar </span></a>
        </td>";
            echo"<td><a href=\"apagaLivro.php?id=".$dados['livroId']."\" class=\"btn btn-danger\"><span class=\"far fa-trash-alt\"></span> <span>Eliminar </span></a></td>";
            echo"</tr>";
        }

        ?>

        </tbody>
    </table>
