function mostraImg(id) {
    $('#thumb').css("background-image", "url(img/1.jpg)");
    $('#thumb').css("visibility", "visible");
}
function escondeImg(id) {
    $('#thumb').css("visibility", "hidden");
}

function mostraRequisitados(id){


    $.ajax({
        url: "AJAXFillRequisitados.php",
        type: "post",
        data: {
            id:id
        },
        success: function (result) {
            $('#resultadosPesquisa').html(result);
        }
    });
}
function devolveNome(id){


    $.ajax({
        url: "AJAXGetName.php",
        type: "post",
        data: {
            id: id
        },
        success: function (result) {
            return(result);
        }
    });
}

