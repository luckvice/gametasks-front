<?php include 'template/header.php'; ?>
<!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <h1 class="my-4">Ver Genero
        <small>GetJson</small>
    </h1>
    <div class="row" id="verGenero">
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <form id="generoForm" class='generoForm'>
                <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input type="text" class="form-control" id="gnr_name" placeholder="Digite o Genero" name="gnr_name">
                    <small id="titulohelp" class="form-text text-muted"></small>
                </div>

                <a id="salvar" class="btn btn-primary">Salvar</a>
            </form>
        </div>
    </div>

</div>
<!-- /.container -->

<?php include 'template/footer.php'; ?>
<script src="vendor/jquery-validation/jquery.validate.min.js"></script>

<script type="text/javascript">
    var baseUrl = (window.location).href; //pega url
    var id = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);

    $("#generoForm").validate({

        rules: {
            gnr_name: {
                required: true
                // minlength:3
            }

        },
        messages: {
            gnr_name: {
                required: "Insira o genero"
                // minlength:"O nome deve ter pelo menos 3 caracteres"
            }
        }
    });
    $("#salvar").on('click', function() {

        if ($("#generoForm").valid()) {
            // send ajax
            $.ajax({
                url: 'http://localhost:8080/api/atualizaGenero/' + id,
                type: "PUT",
                dataType: 'json',
                data: $("#generoForm").serialize(),
                success: function(result) {
                    alert(result);
                    console.log(result);
                    window.location = "http://localhost/gametasks-front/listaGeneros.php";
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            })

        } else {
            consolog.log("Não valido!");
        }
    });


    $.getJSON("http://localhost:8080/api/verGenero/" + id, function(data) {
        console.log(data) //debug
        $("#gnr_name").val(data[0].gnr_name);
    });
</script>
</body>

</html>