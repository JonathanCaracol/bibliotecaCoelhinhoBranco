function mostraImg(id) {
    $('#thumb').css("background-image", "url(img/1.jpg)");
    $('#thumb').css("visibility", "visible");
}
function escondeImg(id) {
    $('#thumb').css("visibility", "hidden");
}

function mostraRequisitados(id){
    alert(id);



    /*
     $.ajax({
        url: "AJAXFillLivros.php",
        type: "post",
        data: {
            txt: txt
        },
        success: function (result) {
            $('#resultadosPesquisa').html(result);
        }
    });
     */
}