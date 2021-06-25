<?php
include_once("admin/includes/body.inc.php");


$id = intval($_POST['id']);


$con = mysqli_connect(C_HOST, C_USER, C_PASS, C_DB);

 $sql = "SELECT * FROM 06hugo_utilizadores
inner join 06hugo_requisicoes ON requisicaoUtilizadorId = utilizadorId
inner join 06hugo_livros on livroId = requisicaoLivroId where
  requisicaoDataTraz IS NULL AND utilizadorId=".$id." order by requisicaoDataLeva ASC";

$result1=mysqli_query($con,$sql );
if(mysqli_affected_rows($con)){


?>

<div style="margin-top: 10px">
    <h4 class="modal-title text-muted " align="left"><strong>Livros ainda requisitados:</strong></h4>
        <div class="container-fluid">


                <?php




                while($pessoa = mysqli_fetch_array($result1)){

                    $data_inicio = new DateTime($pessoa['requisicaoDataLeva']);
                $data_fim = new DateTime($pessoa['requisicaoDataTraz']);

                // Resgata diferença entre as datas
                $dateInterval = $data_inicio->diff($data_fim);






                    echo"<span class='align-middle -vertical, text-left'><small><strong>".$pessoa['requisicaoDataLeva'];
                    echo "</strong></small> - </span>";
                    if($pessoa){



                     echo"<small><span class='align-middle -vertical, text-left'>".$pessoa['livroTitulo']."</span><span class='text-danger'> ".$dateInterval->days. 'dias'."</span></small> ";
                    }
                    echo"<br>";


                }

                ?>

        </div>
</div>
    <?php
}
    ?>



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