<?php

header("content-type:text/html; charset=UTF-8");

include_once("config.inc.php");

$con = mysqli_connect(C_HOST, C_USER, C_PASS, C_DB);

function drawTop($menu = true)

{ ?>    <!DOCTYPE html>

    <html lang="pt">

    <head>

        <meta charset="UTF-8">

        <title>Administração</title>

        <link rel="stylesheet" href="css/bootstrap.css">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

        <script src="js/jquery-3.3.1.min.js"></script>

        <script src="js/bootstrap.js"></script>

        <script>
            // Automatic Slideshow - change image every 3 seconds
            var myIndex = 0;

            function carousel() {
                var i;

                var x = document.getElementsByClassName("mySlides");


                for (i = 0; i < x.length; i++) {


                    x[i].style.display = "none";


                }


                myIndex++;


                if (myIndex > x.length) {


                    myIndex = 1


                }


                x[myIndex - 1].style.display = "block";


                setTimeout(carousel, 2000);


            }

            function filtraDadosUtilizadores(n, txt) {
                $.ajax({
                    url: "AJAXfillListaUtilizadores.php",
                    type: "post",
                    data: {
                        nLivros: n,
                        texto: txt
                    },
                    success: function(result) {
                        $('#listaLivros').html(result);
                    }
                });
            }





            function fillBook(id) {

                $.ajax({
                    url: "AJAXfillLivro.php",
                    type: "post",
                    data: {
                        livroId: id,
                        versao: 1
                    },
                    success: function(result) {
                        $('#verMais').html(result);
                        $('#verMais').modal('toggle');
                    }
                });
            }

            function fillResults(txt) {
                $.ajax({
                    url: "AJAXfillRequisicao.php",
                    type: "post",
                    data: {
                        txt: txt
                    },
                    success: function(result) {
                        $('#resultadosPrincipal').html(result);
                    }
                });
            }

            $('document').ready(function() {



                carousel();
                filtraDados(8, '');
                $("#searchTituloPrincipal").keyup(function() {

                    fillResults($(this).val());
                });
                $("#searchNome").keyup(function() {
                    alert();
                    //fillResults($(this).val());
                });



                $("#search").focusout(function() {
                    $(this).val('');
                    //filtraDados(8);
                })
            });
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