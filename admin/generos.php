<?php
include_once ("includes/body.inc.php");
drawTop();
?>


<section><h1 style="font-family: 'Agency FB'" align="center">Géneros</h1>
    <div class="table-responsive">
        <table class="table table-sm table-dark">

            <thead>
            <tr style="color: #ffc107">
                <th width="10%" scope="col">#</th>
                <th  width="60%" scope="col">Nome</th>
                <th width="30%"  colspan="2" scope="col">
                    <a href="novoGenero.php" class="btn btn-success"><span class="fas fa-plus"></span> Adicionar </a>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql="select * from 06hugo_generos";
            $res=mysqli_query($con,$sql);
            while($dados=mysqli_fetch_array($res)){
                echo"<tr>";
                echo"<th scope=\"row\">".$dados['generoId']."</th>";
                echo"<td>".$dados['generoNome']."</a></td>";
                echo"<td><a href=\"editaGenero.php?id=".$dados['generoId']."\" class=\"btn btn-info\"><span class=\"fas fa-edit\"></span> <span>Editar </span></a>     </td>";
                echo"<td><a href=\"apagaGenero.php?id=".$dados['generoId']."\" class=\"btn btn-danger\"><span class=\"far fa-trash-alt\"></span> <span>Eliminar </span></a></td>";
                echo"</tr>";
            }

            ?>
            
            </tbody>
        </table>
    </div>
</section>





</body>
</html>