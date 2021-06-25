<?php

header("content-type:text/html; charset=UTF-8");

include_once("config.inc.php");

$con = mysqli_connect(C_HOST, C_USER, C_PASS, C_DB);

function drawTop($menu = MENUON, $opt=HOME)

{ ?>    <!DOCTYPE html>

    <html lang="pt">

    <head>

        <meta charset="UTF-8">

        <title>Administração</title>

        <link rel="stylesheet" href="css/bootstrap.css">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

        <script src="js/jquery-3.3.1.min.js"></script>

        <script src="js/bootstrap.js"></script>
        <script  src="js/common.js"></script>
        <script  src="js/comum.js"></script>

        <script>
            $('document').ready(function () {
                ;
                <?php
                if ($opt == LIVROS){
                ?>
                    $('#search').keyup(function () {
                        fillTableLivros(this.value);
                    });
                    fillTableLivros();
                <?php
                }
                ?>
                <?php
                if ($opt == AUTORES){
                ?>
                    $('#search').keyup(function () {
                        fillTableAutores(this.value);
                    });
                    fillTableAutores();
                <?php
                }
                ?>
                <?php
                if ($opt == AUTORES2){
                ?>
                $('#search').keyup(function () {
                    fillAutores(this.value);
                });
                fillAutores();
                <?php
                }
                ?>
                <?php
                if ($opt == UTILIZADORES){
                ?>
                    $('#search').keyup(function () {
                        fillTableUtilizadores(this.value);
                    });
                    fillTableUtilizadores();
                <?php
                }
                ?>
            })
        </script>


    </head>

<body>    <?php if ($menu) { ?>

    <section>

        <div class="row">

            <div class="col-12 mx-auto bg-dark text-center" style="min-height: 40px;">


                <a href="index.php"><button type="button" class="btn btn-outline-warning ">Requisições/Devoluções</button></a>

                <a href="tipos.php"><button type="button" class="btn btn-outline-warning ">Tipo de utilizadores</button></a>

                <a href="utilizadores.php"><button type="button" class="btn btn-outline-warning ">Utilizadores</button></a>

                <a href="autores.php"><button type="button" class="btn btn-outline-warning ">Autores</button></a>

                <a href="generos.php"><button type="button" class="btn btn-outline-warning ">Géneros</button></a>

                <a href="livros.php"><button type="button" class="btn btn-outline-warning ">Livros</button></a>


            </div>

        </div>

    </section>

<?php

        }

}

?>
