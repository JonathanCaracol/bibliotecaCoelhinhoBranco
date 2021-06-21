<?php
    include_once("../common.php");
    include_once("admin/includes/body.inc.php");

    if(isset($_POST["livroId"]) && isset($_POST["userId"])){
        $sql = "UPDATE 06hugo_livros SET livroEstado = 'requisitado' WHERE livroId = ".intval($_POST["livroId"]);
        mysqli_query($con, $sql);

        $sql = "INSERT INTO 06hugo_requisicoes (requisicaoDataLeva, requisicaoUtilizadorId, requisicaoLivroId) VALUES (NOW(), ".addslashes($_POST["userId"]).", ".intval($_POST["livroId"]).")";
        mysqli_query($con, $sql);
        echo $requisicaoId = mysqli_insert_id($con);;
    }

?>