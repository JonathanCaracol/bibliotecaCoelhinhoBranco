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