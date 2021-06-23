<?php
include_once("admin/includes/body.inc.php");


$id = intval($_POST['id']);


$con = mysqli_connect(C_HOST, C_USER, C_PASS, C_DB);

 $sql = "SELECT * FROM 06hugo_utilizadores
inner join 06hugo_requisicoes ON requisicaoUtilizadorId = utilizadorId
inner join 06hugo_livros on livroId = requisicaoLivroId where
  requisicaoDataTraz IS NULL AND utilizadorId=".$id;

$result1=mysqli_query($con,$sql );



?>

<div style="margin-top: 10px">
    <h4 class="modal-title w-100" align="center">Lista de livros requisitados</h4>
        <div class="table-responsive">
            <table class="table table-sm table-white">

                <thead>
                <tr style="color: #000000">
                    <th style="text-align: center" width="40%"  scope="col">Data da requisição</th>
                    <th style="vertical-align: middle; text-align: center " width="40%"  scope="col">Livro</th>



                    </th>
                </tr>
                </thead>
                <tbody>
                <?php

                while($pessoa = mysqli_fetch_array($result1)){
                    echo"<tr>";

                    echo"<td class='align-middle -vertical, text-center'>".$pessoa['requisicaoDataLeva']."</a></td>";
                    echo"<td class='align-middle -vertical, text-center'>".$pessoa['livroTitulo']."</a></td>";




                }

                ?>

                </tbody>
            </table>
        </div>
</div>





















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