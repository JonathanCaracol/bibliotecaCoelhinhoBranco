<?php
    include_once("common.php");
    include_once("admin/includes/body.inc.php");
    $idLivro = $_POST["livroId"];
    $idUtilizador = $_POST["userId"];

        $sql = "UPDATE 06hugo_livros SET livroEstado = 'requisitado' WHERE livroId = ".$idLivro;
        mysqli_query($con, $sql);

        $sql = "INSERT INTO 06hugo_requisicoes (requisicaoDataLeva, requisicaoUtilizadorId, requisicaoLivroId,requisicaoDataTraz) VALUES (NOW(), ".$idUtilizador.",".$idLivro.",NULL)";
        mysqli_query($con, $sql);
        $requisicaoId = mysqli_insert_id($con);
        echo $requisicaoId;
?>