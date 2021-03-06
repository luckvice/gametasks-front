<?php include 'template/header.php'; ?>
<!-- Page Content -->
<div class="container">
    <!-- Page Heading -->
    <h1 class="my-4">Nova Gametask
        <small>novo</small>
    </h1>
    <div class="row" id="novaGametask">
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <form id="GametaskForm" name="GametaskForm" class='GametaskForm'>
                <div class="form-group">
                    <input type="hidden" value="N" id="id_usuario" name="id_usuario" />
                    <label for="jogo">Selecione um jogo</label>
                    <select name="id_jogo_task" id="id_jogo_task" required placeholder="Selecione um jogo">
                        <option>Selecione</option>
                    </select>
                    <small id="jogohelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="platafomra">Selecione uma Plataforma</label>
                    <br>
                    <select id="id_plataforma_task" name="id_plataforma_task" required>
                        <option>Selecione</option>
                    </select>
                    <small id="plataformahelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="titulo">Status do jogo</label>
                    <br>
                    <select id="status">
                        <option value="-1">Selecione</option>
                        <option value="0">Jogando</option>
                        <option value="1">Dando um tempo</option>
                        <option value="2">Rejogando</option>
                        <option value="3">Finalizado</option>
                    </select>
                    <input type="hidden" value="N" id="jogando" name="jogando" />
                    <input type="hidden" value="N" id="finalizado" name="finalizado" />
                    <input type="hidden" value="N" id="parado" name="parado" />
                    <input type="hidden" value="N" id="rejogando" name="rejogando" />
                    <input type="hidden" value="0" id="priority" name="priority" />
                    <small id="statushelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="titulo">Tempo de jogo</label>
                    <input required type="text" class="form-control" id="current_progress_time" placeholder="Digite o tempo de jogo" name="current_progress_time">
                    <small id="titulohelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="titulo">Progresso</label>
                    <input required type="text" min="0" max="100" class="form-control" id="percent_complete" placeholder="Digite a porcentagem estimada de jogo" name="percent_complete">
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
    var baseUrl = (window.location).href; //pega url
    var id = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);
    $("#id_usuario").val(id);
    $('#status').change(function() {

        if ($("#status").val() == "0") {
            $("#jogando").val("S");
            $("#parado").val("N");
            $("#rejogando").val("N");
            $("#finalizado").val("N");
        } else if ($("#status").val() == "1") {
            $("#jogando").val("N");
            $("#parado").val("S");
            $("#rejogando").val("N");
            $("#finalizado").val("N");
        } else if ($("#status").val() == "2") {
            $("#jogando").val("N");
            $("#parado").val("N");
            $("#rejogando").val("S");
            $("#finalizado").val("N");
        } else if ($("#status").val() == "3") {
            $("#jogando").val("N");
            $("#parado").val("N");
            $("#rejogando").val("N");
            $("#finalizado").val("S");
        }
    });
    $.getJSON("http://localhost:8080/api/listaJogos", function(data) {


        $.each(data, function(key, val) {
            $('#id_jogo_task').append('<option value=' + val.id + '>' + val.nome + '</option>');
            console.log(key, val);
        });

    });

    $.getJSON("http://localhost:8080/api/listaPlataformas", function(data) {

        $.each(data, function(key, val) {
            $('#id_plataforma_task').append('<option value=' + val.id + '>' + val.pl_name + '</option>');
            console.log(key, val);
        });

    });
    $("#GametaskForm").validate({
        rules: {
            id_jogo_task: {
                required: true
                // minlength:3
            }
        },
        messages: {
            id_plataforma_task: {
                required: "Selecione um jogo"
                // minlength:"O nome deve ter pelo menos 3 caracteres"
            }
        }
    });


    $("#salvar").on('click', function() {
        if ($("#GametaskForm").valid()) {
            // send ajax
            $.ajax({
                url: 'http://localhost:8080/api/novaGameTask',
                type: "POST",
                dataType: 'json',
                data: $("#GametaskForm").serialize(),
                success: function(result) {
                    console.log(result);
                    window.location = "http://localhost/gametasks-front/listaGametask.php?id=" + id;
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