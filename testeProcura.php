<?php

include_once ("admin/includes/body.inc.php");

include_once ("../common.php");

?>

<!DOCTYPE html>

<html lang="en">



<head>



    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Biblioteca Jardim de Inf?ncia da Boavista</title>



    <!-- Bootstrap core CSS -->

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">



    <!-- Custom fonts for this template -->

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">



    <!-- Plugin CSS

    <link rel="stylesheet" href="device-mockups/device-mockups.min.css">

      -->

    <!-- Custom styles for this template -->

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

            -webkit-transition-duration: 0.4s; /* Safari */

            transition-duration: 0.4s;

            cursor: pointer;

            /* border-radius: 50%; */



        }









        .button5:hover {

            background-color: #555555;



        }



        .modal-dialog{

            min-width: 800px;

        }



        mark{

            background-color: #2ecaff;

            padding: 0;

        }

        table {

            font-family: arial, sans-serif;

            border-collapse: collapse;

            width: 50%;

        }



        td, th {

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



        .active, .sinopse:hover {

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

    <!--  <a href="javascript:q=(document.location.href);void(open('http://example.com/submit.php?url='+escape(q),'_self','resizable,location,menubar,toolbar,scrollbars,status'));">click here</a>

-->

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

            if (myIndex > x.length) {myIndex = 1}

            x[myIndex-1].style.display = "block";

            setTimeout(carousel, 2000);

        };



        function filtraDados(n,txt) {

            $.ajax({

                url:"AJAXfillListaLivros.php",

                type:"post",

                data:{

                    nLivros:n,

                    texto:txt

                },

                success: function(result){

                    $('#listaLivros').html(result);

                }

            });

        };



        function fillBook(id) {

            alert(id);

            $('#sideModalTR').modal('toggle');

            $.ajax({

                url:"AJAXfillLivro.php",

                type:"post",

                data:{

                    livroId:id

                },

                success: function(result){

                    $('#verMais').html(result);

                    $('#verMais').modal('toggle');}

            });

        };



        function fillResults(txt) {

            $.ajax({

                url:"AJAXfillRequisicao.php",

                type:"post",

                data:{

                    txt:txt

                },

                success: function(result){

                    $('#resultados').html(result);

                }

            });

        };













        $('document').ready(function () {

            carousel();





            $("#searchTitulo").keyup(function(){

                fillResults($(this).val());



            });



            $("#search").focusout(function () {

                $(this).val('');

                //filtraDados(8);

            })



            filtraDados(8);

            /*

            $('#resultados').toggle();



            $('#nome').focusin(function () {

                $('#resultados').toggle();

            });

            $('#nome').focusout(function () {

                $('#resultados').toggle();

            });

*/



        });









    </script>







    <script>

        function myFunction() {

            document.getElementById("demo").innerHTML = "O principezinho";

        }

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

    <!--  <div class="container">

        <a class="navbar-brand js-scroll-trigger" href="#page-top">Produced by Hugo Ribeiro</a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

          Menu

          <i class="fas fa-bars"></i>

        </button>

      </div> -->

</nav>



<header class="masthead">

    <div class="container h-100">

        <div class="row h-100">

            <div class="col-lg-5 my-auto">

                <div class="header-content mx-auto">

                    <h1 class="mb-5" align="left">Bem-vindos ? Biblioteca do Jardim de Inf?ncia das Figueiras</h1>

                    <div class="button5 ">

                        <a class="btn"  href="#features">Vamos come?ar!</a>



                    </div>

                </div>

            </div>

            <div class="col-lg-7 my-auto">

                <div class="device-container">

                    <div class="device">

                        <div class="screen">

                            <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->

                            <section>

                                <img class="mySlides" src="img\kids3.png"

                                     style="width:100%">

                                <img class="mySlides" src="img\puto2.jpg"

                                     style="width:100%"  >

                                <img class="mySlides" src="img\kids.png"

                                     style="width:100%"  >

                                <img class="mySlides" src="img\kids2.png"

                                     style="width:100%"  >

                                <img class="mySlides" src="img\kids4.png"

                                     style="width:100%"  >



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

            <p class="text-muted">Vamos come?ar...</p>

            <hr>

        </div>

        <div class="row">

            <div class="column">

                <p><a onclick="filtraDados(8,'')" href="#listaNovidades"><img src="img/encomenda.png" class="img-fluid"  alt="" style="width:100%" ></a></p>

                <div align="center">

                    <h3> Novidades</h3>

                    Confere aqui os novos livros da biblioteca

                </div>

            </div>

            <div class="column">

                <p><a href="#" data-toggle="modal" data-target="#sideModalTR"  ><img src="img/BuyBooks_Icon.png" class="img-fluid"  alt=""  style="width:100%"  ></a></p>

                <div align="center">

                    <h3 > Requisi??es</h3>

                    Pede j? o teu livro!

                </div>

            </div>

            <div class="column">

                <p><a href="#" data-toggle="modal" data-target="#sideModalTRDev"><img src="img/requesitar.png" class="img-fluid"  alt="" style="width:100%" ></a></p>

                <div align="center">

                    <h3> Devolu??es</h3>

                    Entrega de livros!





                    <a href="javascript:void(0);"

                       NAME="My Window Name"  title=" My title here "

                       onClick=window.open("window-child.html","Ratting","width=550,height=170,0,status=0,");></a>

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

                    <div class="col-11"><input id="search" class="form-control" onkeyup="filtraDados(-1,$(this).val())"> </div>

                </div>



                <button onclick="filtraDados(-1,'')" class="float-right  btn btn-outline-dark">ver todos</button>

                <button onclick="filtraDados(8,'')" class="float-right  btn btn-outline-primary mr-1 ">?ltimas entradas</button>

            </div>



        </div>

        <!-- <div id="thumb"></div> -->

        <div class="row" id="listaLivros">





        </div>











    </div>



</section>













<!-- Ver mais modal-->



<div class="modal fade right" id="verMais" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"

     aria-hidden="true">





</div>



<!-- Requisista -->

<div class="modal fade right" id="sideModalTR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">



    <!-- Add class .modal-side and then add class .modal-top-right (or other classes from list above) to set a position to the modal -->

    <div class="modal-dialog modal-side modal-top-right" role="document">





        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title w-100" id="sideModalTR">Requisitar</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>



            <div class="modal-body" >

                <div class="modal-body">

                    <div class="row">

                        <div class="col-4">

                            <img class="card-img-top"  src="img/gen.jpg" alt="" >



                            <div class="col-xs-2">

                                <br> <input type="text" class="form-control" id="tituloId">

                                <button onclick="myFunction()" type="button" class="btn btn-outline-success">ok</button>

                                <span></span>

                            </div>

                        </div>

                        <div class="col-8">



                            <div class="form-group row mt-2">



                                <br><label for="nome" class="col-2 col-form-label">Titulo:</label>

                                <div class="col-10">

                                    <input type="text" class="form-control" id="searchTitulo">

                                </div><br><br>

                                <label for="nome" class="col-2 col-form-label">Nome:</label>

                                <div class="col-10">

                                    <input type="text" class="form-control" id="nome">

                                </div>

                            </div>



                            <div class="row w-100">

                                <div id="resultados" class="w-100">



                                </div>

                            </div>



                            <!-- Central Modal Small -->



                            <!-- Central Modal Small -->



                            <!--<div class="row w-100 bg-dark">

                                 <div id="historico" class="col-12">

                                     <div class="col-4">

                                         <img class="card-img-top"  src="img\princepe.jpg" alt="">

                                     </div>

                                     <div class="col-4">

                                         <img class="card-img-top"  src="img\princepe.jpg" alt="">

                                     </div>

                                     <div class="col-4">

                                         <img class="card-img-top"  src="img\princepe.jpg" alt="">

                                     </div>

                                 </div>

                             </div> -->

                        </div>

                    </div>

                </div>

            </div>

            <div class="modal-footer" align="left">



                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>

                <button type="button" class="btn btn-outline-success"data-toggle="modal" data-dismiss="modal" data-target="#reqFinal">Requisitar</button>



            </div>

        </div>

    </div>

</div>



<!-- Ultimo modal -->

<div class="modal fade" id="reqFinal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"

     aria-hidden="true">



    <!-- Change class .modal-sm to change the size of the modal -->

    <div class="modal-dialog modal-sm" role="document">





        <div class="modal-content" >

            <div class="modal-header">

                <h4 class="modal-title w-100" id="myModalLabel">Livro Requesitado</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>



            <div class="modal-footer">

                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Sair</button>

            </div>

        </div>

    </div>

</div>



<!-- Devolu??o Modal -->

<div class="modal fade right" id="sideModalTRDev" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">



    <div class="modal-dialog modal-side modal-top-right" role="document">





        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title w-100" id="sideModalTR">Devolu??es</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>



            <div class="modal-body" >

                <div class="modal-body">

                    <div class="row">

                        <div class="col-4">

                            <img class="card-img-top"  src="img/gen.jpg" alt="" >



                            <div class="col-xs-2">

                                <br> <input type="text" class="form-control" id="tituloId">

                                <button onclick="myFunction()" type="button" class="btn btn-outline-success">ok</button>

                                <span></span>

                            </div>

                        </div>

                        <div class="col-8">

                            <div class="row">

                                <div class="col-12 ">

                                    <button class="float-right  btn btn-outline-dark">Aluno</button>

                                    <button class="float-right  btn btn-outline-secondary mr-1">Professor</button>

                                </div>

                            </div>

                            <div class="form-group row mt-2">



                                <br><label for="nome" class="col-2 col-form-label">Titulo:</label>

                                <div class="col-10">

                                    <input type="text" class="form-control" id="nome"><br>

                                </div><br>

                                <label for="nome" class="col-2 col-form-label">Nome:</label>

                                <div class="col-10">

                                    <input type="text" class="form-control" id="nome">

                                </div>

                            </div>



                            <div class="row w-100">

                                <div id="resultados" class="w-100">



                                </div>

                            </div>



                            <!-- Central Modal Small -->



                            <!-- Central Modal Small -->



                            <!--<div class="row w-100 bg-dark">

                                 <div id="historico" class="col-12">

                                     <div class="col-4">

                                         <img class="card-img-top"  src="img\princepe.jpg" alt="">

                                     </div>

                                     <div class="col-4">

                                         <img class="card-img-top"  src="img\princepe.jpg" alt="">

                                     </div>

                                     <div class="col-4">

                                         <img class="card-img-top"  src="img\princepe.jpg" alt="">

                                     </div>

                                 </div>

                             </div> -->

                        </div>

                    </div>

                </div>

            </div>

            <div class="modal-footer" align="left">



                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>

                <button type="button" class="btn btn-outline-success"data-toggle="modal" data-dismiss="modal" data-target="#reqFinal">Devolver</button>



            </div>

        </div>

    </div>

</div>



<!-- Ultimo modal devolver -->

<div class="modal fade" id="DevFinal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"

     aria-hidden="true">



    <!-- Change class .modal-sm to change the size of the modal -->

    <div class="modal-dialog modal-sm" role="document">





        <div class="modal-content" >

            <div class="modal-header">

                <h4 class="modal-title w-100" id="myModalLabel">Livro Devolvido com Sucesso</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>



            <div class="modal-footer">

                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Sair</button>

            </div>

        </div>

    </div>

</div>





</body>



</html>

