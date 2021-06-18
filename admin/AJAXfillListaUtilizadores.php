<?php

ini_set("display_errors",true);

include_once ("includes/body.inc.php");
include_once ("../common.php");

$nUtilizadores=intval($_POST['nLivros']);
$txt=addslashes($_POST['texto']);

$sql="select * from 06hugo_utilizadores where utilizadorNome LIKE '%$txt%' ";
if($$nUtilizadores>0)
    $sql.=' order by livroId desc limit '.$nUtilizadores;

$res=mysqli_query($con,$sql);

while($dados=mysqli_fetch_array($res)) {

    $sql="select  utilizadorNome, utilizadorCategoria, utilizadorUtilizadorTipoId from 06hugo_utilizadores  where utilizadorId  = ".$dados['utilizadorId'];

    $resG=mysqli_query($con,$sql);

    $txt="";

    while($dadosG=mysqli_fetch_array($resG))

        $txt.=$dadosG['utilizadorUtilizadorTipoId'].'/';

    $txt=substr($txt,0,strlen($txt)-1);

    ?>





    <section><h1 style="font-family: 'Agency FB'" align="center">Autores</h1>
        <div class="table-responsive">
            <table class="table table-sm table-dark">

                <thead>
                <tr style="color: #ffc107">
                    <th width="20%" scope="col">#</th>
                    <th  width="40%" scope="col">Nome</th>
                    <th width="20%"  colspan="2" scope="col">
                        <a href="novoAutor.php" class="btn btn-success"><span class="fas fa-plus"></span> Adicionar </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql="select * from 06hugo_autores";
                $res=mysqli_query($con,$sql);
                while($dados=mysqli_fetch_array($res)){
                    echo"<tr>";
                    echo"<th scope=\"row\">".$dados['autorId']."</th>";
                    echo"<td>".$dados['autorNome']."</a></td>";
                    echo"<td><a href=\"editaAutor.php?id=".$dados['autorId']."\" class=\"btn btn-info\"><span class=\"fas fa-edit\"></span> <span>Editar </span></a>
        </td>";
                    echo"<td><a href=\"apagaAutor.php?id=".$dados['autorId']."\" class=\"btn btn-danger\"><span class=\"far fa-trash-alt\"></span> <span>Eliminar </span></a></td>";
                    echo"</tr>";
                }

                ?>

                </tbody>
            </table>
        </div>
    </section>








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