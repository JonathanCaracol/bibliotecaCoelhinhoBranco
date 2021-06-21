<?php
include_once("common.php");

include_once("admin/includes/body.inc.php");


$id = $_POST['id'];

 $sql = "SELECT * FROM 06hugo_utilizadores inner join 06hugo_requisicoes ON requisicaoUtilizadorId = utilizadorId where id='$id'" or die (" Erro na consulta " . mysqli_error());

$result=mysqli_query($con,$sql);



?>


    <section><h1 style="font-family: 'Agency FB'" align="center">Requisições</h1>
        <div class="table-responsive">
            <table class="table table-sm table-dark">

                <thead>
                <tr style="color: #ffc107">
                    <th width="20%" scope="col">#</th>
                    <th  width="40%" scope="col">Nome</th>
                    <th  width="40%" scope="col">Requisição</th>
                    <th width="20%"  colspan="2" scope="col">
                        <a href="novoAutor.php" class="btn btn-success"><span class="fas fa-plus"></span> Adicionar </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php

                while($pessoa = mysqli_fetch_array($result)){
                    echo"<tr>";
                    echo"<th scope=\"row\">".$pessoa['utilizadorId']."</th>";
                    echo"<td>".$pessoa['requisicaoLivroId']."</a></td>";




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