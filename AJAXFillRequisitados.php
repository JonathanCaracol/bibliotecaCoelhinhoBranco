<?php
include_once("common.php");

include_once("admin/includes/body.inc.php");


$id = intval($_POST['id']);


$con = mysqli_connect(C_HOST, C_USER, C_PASS, C_DB);

 $sql = "SELECT * FROM 06hugo_utilizadores inner join 06hugo_requisicoes ON requisicaoUtilizadorId = utilizadorId inner join 06hugo_livros on livroId = requisicaoLivroId where utilizadorId=".$id;

$result1=mysqli_query($con,$sql455);



?>


    <section><h1 style="font-family: 'Agency FB'" align="center">Requisições</h1>
        <div class="table-responsive">
            <table class="table table-sm table-dark">

                <thead>
                <tr style="color: #ffc107">
                    <th  width="40%" scope="col">Nome</th>
                    <th  width="40%" scope="col">Requisição</th>
                    <th width="20%"  colspan="2" scope="col">

                    </th>
                </tr>
                </thead>
                <tbody>
                <?php

                while($pessoa = mysqli_fetch_array($result1)){
                    echo"<tr>";
                    echo"<th scope=\"row\">".$pessoa['utilizadorNome']."</th>";
                    echo"<td>".$pessoa['livroTitulo']."</a></td>";




                }

                ?>

                </tbody>
            </table>
        </div>
    </section>





















<?php
/*
    include_once("../common.php");
    include_once("admin/includes/body.inc.php");

    if(isset($_POST["livroId"]) && isset($_POST["userId"])){
        $sql = "UPDATE 06hugo_livros SET livroEstado = 'requisitado' WHERE livroId = ".intval($_POST["livroId"]);
        mysqli_query($con, $sql);

        $sql = "INSERT INTO 06hugo_requisicoes (requisicaoDataLeva, requisicaoUtilizadorId, requisicaoLivroId) VALUES (NOW(), ".addslashes($_POST["userId"]).", ".intval($_POST["livroId"]).")";
        mysqli_query($con, $sql);
        echo $requisicaoId = mysqli_insert_id($con);;
    }
*/
?>