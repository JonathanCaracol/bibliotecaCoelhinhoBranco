<?php
include_once ("includes/body.inc.php");
drawTop(MENUOFF);
?>

<style>   input[type=radio] {
        margin-top: 2%;
    }
    div.a{
        font-size: 20px;
    }</style>



<section>
    <div class="row">

        <div class="col-6 mx-auto">
            <span class="display-4">Novo utilizador</span>
            <div class="container-fluid">
                <form action="confirmaNovoUtilizador.php" method="post">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do utilizador">
                    </div >
                    <div class="form-group">
                        <label for="nome">Tipo de utilizador</label>
                        <select class="form-control" name="tipo">
                            <?php
                            $sql="select * from 06hugo_utilizadortipos";
                            $res=mysqli_query($con,$sql);
                            while($dados=mysqli_fetch_array($res)){
                                echo '<option value="'.$dados['utilizadorTipoId'].'">'.$dados['utilizadorTipoNome'].'</option>';
                            }
                            ?>
                        </select>
                    </div >
                    <div class="a">
                        <label for="categoria">Tipo</label><br>
                        <input type="radio"  id="categoria" name="categoria" value="professor"> Professor<br>
                        <input type="radio"  id="categoria" name="categoria" value="funcionario"> Funcionário<br>
                        <input type="radio"  id="categoria" name="categoria" value="aluno" checked> Aluno

                    </div>

                    <button type="submit" class="btn btn-primary">Adiciona</button>
                    <button type="button" onclick="voltaPaginaAtras()" class="btn btn-danger">cancelar</button>
                </form>
            </div>

        </div>
    </div>

</section>


<script>
    function voltaPaginaAtras(){
        window.location.href = "utilizadores.php"
    }
</script>


</body>
</html>