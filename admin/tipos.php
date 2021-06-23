<?php
include_once ("includes/body.inc.php");
drawTop();
?>


<section><h1 style="font-family: 'Agency FB'" align="center">Tipo de Utilizadores</h1>
    <div class="table-responsive">
        <table class="table table-sm table-dark">

            <thead>
            <tr style="color: #ffc107">
                <th width="10%" scope="col">#</th>
                <th  width="40%" scope="col">Nome</th>
                <th  width="20%" scope="col">Permissões</th>
                <th width="30%"  colspan="2" scope="col">
                    <a href="novoTipo.php" class="btn btn-success"><span class="fas fa-plus"></span> Adicionar </a>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql="select * from 06hugo_utilizadortipos";
            $res=mysqli_query($con,$sql);
            while($dados=mysqli_fetch_array($res)){
                echo"<tr>";
                echo"<th scope=\"row\">".$dados['utilizadorTipoId']."</th>";
                echo"<td>".$dados['utilizadorTipoNome']."</td>";
                echo"<td>".$dados['utilizadorTipoClassificacao']."</td>";
                echo"<td><a href=\"editaTipo.php?id=".$dados['utilizadorTipoId']."\" class=\"btn btn-info\"><span class=\"fas fa-edit\"></span> <span>Editar </span></a>
        </td>";
                echo"<td><a href=\"apagaTipo.php?id=".$dados['utilizadorTipoId']."\" class=\"btn btn-danger\"><span class=\"far fa-trash-alt\"></span> <span>Eliminar </span></a></td>";
                echo"</tr>";
            }

            ?>
            
            </tbody>
        </table>
    </div>
</section>





</body>
</html>