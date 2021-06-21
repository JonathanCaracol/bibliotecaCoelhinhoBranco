<?php

include_once("admin/includes/body.inc.php");

include_once("common.php");

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Biblioteca Jardim de Infância da Boavista e arredores...</title>


    <!-- Bootstrap core CSS -->


    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom fonts for this template -->


    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">


    <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">


    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">


    <link href="css/comum.css" rel="stylesheet">


    <link href="css/new-age.min.css" rel="stylesheet">


    <style>
        * {


            box-sizing: border-box;


        }


        .column {


            float: left;


            width: 33.33%;


            padding: 5px;


        }


        /* Clearfix (clear floats) */


        .row::after {


            content: "";


            clear: both;


            display: table;


        }


        .button5 {


            border: none;


            color: black;


            padding: 16px 32px;


            text-align: center;


            text-decoration: none;


            display: inline-block;


            font-size: 16px;


            margin: 4px 2px;


            -webkit-transition-duration: 0.4s;
            /* Safari */


            transition-duration: 0.4s;


            cursor: pointer;


            /* border-radius: 50%; */


        }


        .button5:hover {


            background-color: #555555;


        }


        .modal-dialog {


            min-width: 800px;


        }


        mark {


            background-color: #2ecaff;


            padding: 0;


        }


        table {


            font-family: arial, sans-serif;


            border-collapse: collapse;


            width: 50%;


        }


        td,
        th {


            border: 1px solid #dddddd;


            text-align: left;


            padding: 8px;


        }


        .sinopse {


            background-color: #777;


            color: white;


            cursor: pointer;


            padding: 18px;


            width: 100%;


            border: none;


            text-align: left;


            outline: none;


            font-size: 15px;


        }


        .active,
        .sinopse:hover {


            background-color: #555;


        }


        .content {


            padding: 0 18px;


            display: none;


            overflow: hidden;


            background-color: #f1f1f1;


        }
    </style>


    <!-- Bootstrap core JavaScript -->


    <script src="vendor/jquery/jquery.min.js"></script>


    <script src="js/comum.js"></script>


    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Plugin JavaScript -->


    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


    <!-- Custom scripts for this template -->


    <script src="js/new-age.min.js"></script>



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

        function filtraDados(n, txt) {
            $.ajax({
                url: "AJAXfillListaLivros.php",
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

        function requisitaLivro(id) {

            if ($('#searchNome').val() == null || $('#searchNome').val() == "") {
                $.ajax({
                    url: "AJAXfillLivro.php",
                    type: "post",
                    data: {
                        livroId: id,
                        versao: 0
                    },
                    success: function(result) {
                        $('#verMais').html(result);
                    }
                });
            } else {
                $.ajax({
                    url: "AJAXcriaRequisicao.php",
                    type: "post",
                    data: {
                        livroId: id,
                        userId: $('#searchNome').val()
                    },
                    success: function(result) {
                        if (parseInt(result) > 0) {

                        } else {
                            alert("Ocorreu um erro ao requisitar o livro!");
                        }
                    }
                });
            }
        }

        function confirmaRequisitaLivro(id) {
            $(function() {
                $('#modalRequisitaVerMais').modal('toggle')
            });
            alert('Confirma(3) ' + id);
            $.ajax({
                url: "AJAXpesquisaUtilizador.php",
                type: "post",
                data: {
                    livroId: id,
                    versao: 0
                },
                success: function(result) {
                    //$('#myModalLabelTitulo').html(result);
                    $('#modalRequisitaVerMais').html(result);
                    //alert('sucesso');

                }
            });
        }

        function devolve(){
            $.ajax({
                url: "AJAXdevolveLivro.php",
                type: "post",
                data: {
                    livroId: $('#devolverLivro').val()
                },
                success: function(result) {
                    if (parseInt(result) > 0) {
                        alert("Livro devolvido com sucesso!");
                    } else {
                        alert("Ocorreu um erro ao devolver o livro!");
                    }
                }
            });
        }

        function abreRequisitar(){
            var livroId = $('#livroRequisitar').val();
            fillBook(livroId);
        }

        function guardaRequisicao() {
            alert('ccc');
            $(function() {
                $('#modalRequisitaVerMais').modal('toggle')
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


    <script>
        //function myFunction() {


          //  document.getElementById("demo").innerHTML = "O principezinho";


        //}
    </script>


    <script>
        var coll = document.getElementsByClassName("sinopse");


        var i;


        for (i = 0; i < coll.length; i++) {


            coll[i].addEventListener("click", function() {


                this.classList.toggle("active");


                var content = this.nextElementSibling;


                if (content.style.display === "block") {


                    content.style.display = "none";


                } else {


                    content.style.display = "block";


                }


            });


        }
    </script>


</head>


<body id="page-top">


    <!-- Navigation -->


    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">


    </nav>


    <header class="masthead">


        <div class="container h-100">


            <div class="row h-100">


                <div class="col-lg-5 my-auto">


                    <div class="header-content mx-auto">


                        <h1 class="mb-5" align="left">Bem-vindos à Biblioteca do Jardim de Infância da Boavista</h1>


                        <div class=" ">


                            <a class="btn" href="#features">Vamos começar!</a>


                        </div>


                    </div>


                </div>


                <div class="col-lg-7 my-auto">


                    <div class="device-container">


                        <div class="device">


                            <div class="screen">


                                <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->


                                <section>


                                    <img class="mySlides" src="img\kids3.png" style="width:100%">


                                    <img class="mySlides" src="img\puto2.jpg" style="width:100%">


                                    <img class="mySlides" src="img\kids.png" style="width:100%">


                                    <img class="mySlides" src="img\kids2.png" style="width:100%">


                                    <img class="mySlides" src="img\kids4.png" style="width:100%">


                                </section>


                            </div>


                        </div>


                    </div>


                </div>


            </div>


        </div>


    </header>


    <section class="features" id="features">


        <div class="container">


            <div class="section-heading text-center">


                <p class="text-muted">Vamos começar...</p>


                <hr>


            </div>


            <div class="row">


                <div class="column">


                    <p><a onclick="filtraDados(8,'')" href="#listaNovidades"><img src="img/encomenda.png" class="img-fluid" alt="" style="width:100%"></a></p>


                    <div align="center">


                        <h3> Novidades</h3>


                        Confere aqui os novos livros da biblioteca


                    </div>


                </div>


                <div class="column">


                    <p><a href="#" data-toggle="modal" data-target="#requisitarLivro"><img src="img/BuyBooks_Icon.png" class="img-fluid" alt="" style="width:100%"></a></p>


                    <div align="center">


                        <h3> Requisições</h3>


                        Pede já o teu livro!


                    </div>


                </div>


                <div class="column">
                    <p><a href="#" data-toggle="modal" data-target="#devolverModal"><img src="img/requesitar.png" class="img-fluid" alt="" style="width:100%"></a></p>
                    <div align="center">
                        <h3> Devoluções</h3>
                        Entrega de livros!
                        <a href="javascript:void(0);" NAME="My Window Name" title=" My title here " onClick=window.open("window-child.html","Ratting","width=550,height=170,0,status=0,");></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="features bg-light" id="listaNovidades">


        <div class="container">


            <div class="section-heading text-center">


                <p class="text-muted display-4">Lista de novidades</p>


            </div>


            <div class="row mb-1">


                <div class="col-12 ">


                    <div class="row mb-2">


                        <div class="col-1">Pesquisa:</div>


                        <div class="col-11"><input id="search" class="form-control" onkeyup="filtraDados(-1,$(this).val())">


                        </div>


                    </div>


                    <button onclick="filtraDados(-1,'')" class="float-right  btn btn-outline-dark">ver todos</button>


                    <button onclick="filtraDados(8,'')" class="float-right  btn btn-outline-primary mr-1 ">Últimas entradas</button>


                </div>


            </div>


            <!-- <div id="thumb"></div> -->


            <div class="row" id="listaLivros">


            </div>


        </div>


    </section>


    <!-- Ver mais modal-->


    <div class="modal fade" id="verMais" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


    </div>

    <div class="modal fade" id="requisitarLivro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-side modal-top-right " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100">Requisitar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-4">
                                <img id="imagemLivro" class="card-img-top" src="img/gen.jpg" alt="">
                                <div class="col-xs-2">
                                    <!--
                                  <br> <input type="text" class="form-control" id="tituloId">
                                  <button onclick="myFunction()" type="button" class="btn btn-outline-success">ok</button>
                                -->
                                    <span></span>
                                </div>
                            </div>
                            <script>
                                $(".js-example-tokenizer").select2({
                                    tags: true,
                                    tokenSeparators: [',', ' ']
                                }) </script>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
                            <div class="col-8">
                                <div class="form-group row mt-2">
                                    <br><label for="nome" class="col-2 col-form-label">Livro:</label>
                                    <div class="col-10">
                                        <select class="form-control js-example-tags" id="livroRequisitar">
                                            <?php
                                            $query = "SELECT * FROM 06hugo_livros";
                                            $resultado = mysqli_query($con, $query);
                                            while ($livros = mysqli_fetch_array($resultado)) {
                                                ?>
                                                <option value="<?php echo $livros["livroId"];?>"><?php echo $livros['livroTitulo'] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row w-100">
                                    <div id="resultadosPrincipal" class="w-100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" align="left">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-outline-success" onclick="abreRequisitar()" data-toggle="modal" data-dismiss="modal" data-target="#requisitarLivro">Requisitar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="devolverModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-side modal-top-right " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100">Devolu��es</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-4">
                                <img id="imagemLivro" class="card-img-top" src="img/gen.jpg" alt="">
                                <div class="col-xs-2">
                                    <!--
                                  <br> <input type="text" class="form-control" id="tituloId">
                                  <button onclick="myFunction()" type="button" class="btn btn-outline-success">ok</button>
                                -->
                                    <span></span>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group row mt-2">
                                    <br><label for="nome" class="col-2 col-form-label">Livro:</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" id="devolverLivro" list="livros">
                                        <datalist id="livros">
                                            <?php
                                            $query = "SELECT * FROM 06hugo_livros inner join 06hugo_requisicoes on livroId=requisicaoLivroId where requisicaoDataTraz is null and livroEstado='requisitado'";
                                            $resultado = mysqli_query($con, $query);
                                            while ($livros = mysqli_fetch_array($resultado)){
                                                ?>
                                                    <option value="<?php echo $livros["livroTitulo"]; ?>"></option>
                                            <?php
                                            }
                                            ?>
                                        </datalist>
                                    </div>
                                </div>
                                <div class="row w-100">
                                    <div id="resultadosPrincipal" class="w-100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" align="left">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-outline-success" onclick="devolve()" data-toggle="modal" data-dismiss="modal" data-target="#devolverModal">Devolver</button>
                </div>
            </div>
        </div>
    </div>


    </div>



</body>


</html>