<?php
$id=intval($_GET['id']);
include_once ("includes/body.inc.php");
drawTop(MENUOFF);
$sql="select * from 06hugo_utilizadortipos where utilizadorTipoId=".$id;
$res=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($res);
?>





<section>

    <a href="index.php" top="12px" class="btn btn-info">Voltar ao menu </a>
    <div class="row">

        <div class="col-6 mx-auto">
            <span style=" font-family:'Agency FB';font-size: 60px;right: 30%; " class="display-8">Edita Requisições e Devoluções</span><br><br><br>
            <div class="container-fluid">
                <form action="confirmaEditaTipo.php" method="post">
                    <div class="form-group">
                        <button style="height: 165px;width: 393px;position: absolute;top: 122%;right: 50%;  border: 5px solid ;font-family: 'Agency FB';font-size: 40px;"type="button" class="btn btn-outline-warning" >Devolver à Base de Dados </button>

                    </div>


                    <input type="hidden" name="id" value="<?php echo $dados['utilizadorTipoId']?>">
                </form>
            </div>

        </div>
    </div>

</section>





</body>
</html>