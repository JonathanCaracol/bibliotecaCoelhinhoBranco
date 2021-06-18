<?php
include_once ("includes/body.inc.php");
drawTop();
?>


<section><h1 style="font-family: 'Agency FB'" align="center">Utilizadores</h1>

    <div align="center" class="col-9 ">


        <div class="row mb-2">


            <div class="col-1" align="right">Pesquisa:</div>


            <div class="col-5"><input id="search" class="form-control" onkeyup="filtraDadosUtilizadores(-1,$(this).val())">


            </div>


        </div>





    </div>

    <div class="table-responsive">
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
            $sql="select * from 06hugo_utilizadores inner join 06hugo_utilizadortipos on utilizadorTipoId=utilizadorUtilizadorTipoId";
            $res=mysqli_query($con,$sql);
            while($dados=mysqli_fetch_array($res)){
                echo"<tr>";
                echo"<th scope=\"row\">".$dados['utilizadorId']."</th>";
                echo"<td>".$dados['utilizadorNome']."</td>";
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
    </div>
</section>





</body>
</html>