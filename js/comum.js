function mostraImg(id) {
    $('#thumb').css("background-image", "url(img/1.jpg)");
    $('#thumb').css("visibility", "visible");
}
function escondeImg(id) {
    $('#thumb').css("visibility", "hidden");
}

function mostraRequisitados(id){
    alert(id);


    $.ajax({
        url: "AJAXFillRequisitados.php",
        type: "post",
        data: {
            txt: (id)
        },
        success: function (result) {
            $('#resultadosPesquisa').html(result);
        }
    });







    /*
     $.ajax({
        url: "AJAXFillLivros.php",
        type: "post",
        data: {
            txt: txt
++++++++++++++++++++++++++++++++++++++++ffffff





        },
        success: function (result) {
            $('#resultadosPesquisa').html(result);
        }
    });
     */




}
