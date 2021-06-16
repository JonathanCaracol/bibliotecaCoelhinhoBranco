<script src="vendor/jquery/jquery.min.js"></script>

<script>
    $('document').ready(function () {
        $('#nome').keyup(function () {
            txt=$('#nome').val();
            $.ajax({
                url:"AJAXteste.html",
                type:"post",
                success: function (response) {
                    $('#nome').val(txt + response)
                }



            })
        });
    });


</script>

<span id="nome">escreve aqui</span>