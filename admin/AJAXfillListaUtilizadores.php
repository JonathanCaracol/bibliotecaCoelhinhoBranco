<?php

ini_set("display_errors",true);

include_once ("admin/includes/body.inc.php");
include_once ("../common.php");

$nLivros=intval($_POST['nLivros']);
$txt=addslashes($_POST['texto']);

$sql="select * from 06hugo_livros where livroTitulo LIKE '%$txt%' ";
if($nLivros>0)
    $sql.=' order by livroId desc limit '.$nLivros;

$res=mysqli_query($con,$sql);

while($dados=mysqli_fetch_array($res)) {

    $sql="select generoNome from 06hugo_generos inner join 06hugo_livrogeneros 

                            on generoId = livroGeneroGeneroId where livroGeneroLivroId = ".$dados['livroId'];

    $resG=mysqli_query($con,$sql);

    $txt="";

    while($dadosG=mysqli_fetch_array($resG))

        $txt.=$dadosG['generoNome'].'/';

    $txt=substr($txt,0,strlen($txt)-1);

    ?>





    <div class="col-md-6 col-lg-3 col-sm-6 col-xs-6">

        <div class="card"style="width: 18rem;">
>

            <img class="card-img-top" src="<?php echo GLOBALPATH.$dados['livroCapaURL']?>" alt="">

            <div class="card-body">

                <h5 class="card-title"><?php echo $dados['livroTitulo']?></h5>

                <p class="card-text"><?php echo $txt?></p>

                <a onclick="fillBook(<?php echo $dados['livroId']?>)" href="#" class="btn btn-outline-primary" data-toggle="modal"

                >Ver+</a>

            </div>

        </div>

    </div>

    <?php } ?>