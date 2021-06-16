<?php
include_once ("includes/body.inc.php");
include_once ("../common.php");
drawTop();
?>


<section>
    <div class="table-responsive">

    </div>
</section>

<section><h1 style="font-family: 'Agency FB'" align="center">Requisições/Devoluções</h1>
    <div class="table-responsive">
        <table class="table table-sm table-dark">

            <thead>
            <tr style="color: #ffc107">
                <th  width="5%" scope="col">#</th>
                <th width="5%" scope="col">Capa</th>
                <th  width="20%" scope="col">titulo</th>
                <th  width="10%" scope="col">Nome</th>
                <th  width="10%" scope="col">Dia de Requisição</th>
                <th  width="10%" scope="col">Estado</th>
                <th class="text-right" width="10%"  colspan="2" scope="col">
                   
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
             $sql="select *, datediff(curdate(),requisicaoDataLeva) as dias from 06hugo_livros 
		 INNER JOIN 06hugo_requisicoes on livroId=requisicaoLivroId    INNER JOIN 06hugo_utilizadores on requisicaoUtilizadorId= utilizadorId where requisicaoDataTraz is null and livroEstado='requisitado'";
            $res=mysqli_query($con,$sql);
            while($dados=mysqli_fetch_array($res)){
                echo"<tr>";
                echo"<th scope=\"row\">".$dados['livroId']."</th>";
                echo"<td><img src=\"../".GLOBALPATH.$dados['livroCapaURL']."\" width=\"60\"> </td>";
                echo"<td>".$dados['livroTitulo']."</td>";
                echo"<td>".$dados['utilizadorNome']."</td>";
                echo"<td>".$dados['requisicaoDataLeva'].'<br>('.$dados['dias'].")</td>";
                echo"<td>".$dados['livroEstado']."</td>";
                echo"<td><a style='color: #ffc107;' href=\"AJAXdevolve.php?id=".$dados['livroId']."\" class=\"btn \"><span class=\"fas fa-edit\" ></span> <span>Devolver </span></a>
        </td>";

                echo"</tr>";
            }

            ?>

            </tbody>
        </table>
    </div>
</section>





</body>
</html>

