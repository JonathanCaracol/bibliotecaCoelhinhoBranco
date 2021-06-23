<?php
    include_once("common.php");
    include_once("admin/includes/body.inc.php");
    $idLivro = $_POST["livroId"];


        $sql = "UPDATE 06hugo_livros SET livroEstado = 'disponivel' WHERE livroId = ".$idLivro;
        mysqli_query($con, $sql);

        //Sql para devolver o livro, (colocar a data de devolução)
        $sql = "UPDATE 06hugo_requisicoes SET requisicaoDataTraz = NOW() WHERE requisicaoLivroId = ".$idLivro;
        mysqli_query($con, $sql);
       // echo $requisicaoId = mysqli_affected_rows($con);

?>