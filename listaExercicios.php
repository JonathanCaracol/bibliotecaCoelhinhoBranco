<?php
header("content-type:text/html; charset=ISO-8859-1");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once ("includes/body.inc.php");
drawTop();
?>


<section>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th width="10%" scope="col">#</th>
                <th  width="30%" scope="col">Nome</th>
                <th width="20%"  scope="col">Categoria</th>
                <th width="10%"  scope="col">Imagem</th>
                <th width="20%"  colspan="2" scope="col">
                    <button onclick="window.location='novoExercicio.php'" class="btn btn-success"><span class="fas fa-plus"></span> Adicionar </button>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql="select * from 16rui_utilizadores";
            $res=mysqli_query($con,$sql);
            while($dados=mysqli_fetch_array($res)){
              /*  echo"<tr>";
                echo"<th scope=\"row\">".$dados['utilizadorId']."</th>";
                echo"<td>".$dados['utilizadorNome']."</a></td>";
                echo"<td>".$dados['utilizadorEmail']."</td>";
                echo"<td>".$dados['utilizadorTipo']."</td>";
                echo"<td>".$dados['utilizadorEstado']."</td>";
                echo"<td><a href=\"editaUtilizador.php?id=".$dados['utilizadorId']."\" class=\"btn btn-info\"><span class=\"fas fa-edit\"></span> <span>Editar </span></a>
        </td>";
                echo"<td><a href=\"#\" onclick=\"confirmaElimina(".$dados['utilizadorId'].")\" class=\"btn btn-danger\"><span class=\"far fa-trash-alt\"></span> <span>Eliminar </span></a></td>";
                echo"</tr>";*/
            }

            ?>
            
            </tbody>
        </table>
    </div>
</section>





</body>
</html>