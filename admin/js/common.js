function fillTableLivros(txt='') {
    $.ajax({
        url: "AJAXFillLivros.php",
        type: "post",
        data: {
            txt: txt
        },
        success: function (result) {
            $('#tableContent').html(result);
        }
    });
}
function fillTableAutores(txt='') {
    $.ajax({
        url: "AJAXFillAutores.php",
        type: "post",
        data: {
            txt: txt
        },
        success: function (result) {
            $('#tableContent').html(result);
        }
    });
}
function fillTableUtilizadores(txt='') {
    $.ajax({
        url: "AJAXFillUtilizadores.php",
        type: "post",
        data: {
            txt: txt
        },
        success: function (result) {
            $('#tableContent').html(result);
        }
    });
}
function fillAutores(txt='') {
    $.ajax({
        url: "AJAXAutores.php",
        type: "post",
        data: {
            txt: txt
        },
        success: function (result) {
            $('#tableContent').html(result);
        }
    });
}

function fillAutoresEdita(txt='',id=-1) {
    $.ajax({
        url: "AJAXAutoresEdita.php",
        type: "post",
        data: {
            txt: txt,
            id: id
        },
        success: function (result) {
            $('#tableContent').html(result);
        }
    });
}