<?php include 'template/header.php'; ?>
<!-- Page Content -->
<div class="container">
    <!-- Page Heading -->
    <h1 class="my-4">Nova Plataforma
        <small>novo</small>
    </h1>
    <div class="row" id="novaplataforma">
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <form id="plataformaForm" class='plataformaForm'>
                <div class="form-group">
                    <label for="titulo">Nome da plataforma</label>
                    <input required type="text" class="form-control" id="pl_name" placeholder="Digite o titulo" name="pl_name">
                    <small id="titulohelp" class="form-text text-muted"></small>
                </div>

                <a id="salvar" class="btn btn-primary">Cadastrar</a>
            </form>
        </div>
    </div>
</div>
<!-- /.container -->

<?php include 'template/footer.php'; ?>
<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
<script type="text/javascript">
    $("#plataformaForm").validate({
        rules: {
            pl_name: {
                required: true
                // minlength:3
            }
        },
        messages: {
            pl_name: {
                required: "Insira o nome da plataforma"
                // minlength:"O nome deve ter pelo menos 3 caracteres"
            }
        }
    });


    $("#salvar").on('click', function() {
        if ($("#plataformaForm").valid()) {
            // send ajax
            $.ajax({
                url: 'http://localhost:8080/api/novaPlataforma',
                type: "POST",
                dataType: 'json',
                data: $("#plataformaForm").serialize(),
                success: function(result) {
                    alert(result);
                    console.log(result);
                    window.location = "http://localhost/gametasks-front/listaPlataformas.php";
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            });
        } else {
            console.log("Nao valido");
        }

    });
</script>
</body>

</html>