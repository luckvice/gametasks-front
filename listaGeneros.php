<?php include 'template/header.php'; ?>
<!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <h1 class="my-4">Lista Generos
        <small>GetJson</small>
    </h1>
    <div class="row">
        <div class="col-lg-4">
            <a id="salvar" class="btn btn-primary" href="novoGenero.php">Cadastrar novo</a>
        </div>
    </div>
    <div class="row" id="listGeneros">
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Genero</th>
                    </tr>
                </thead>
                <tbody id="tableGeneros">
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container -->

<?php include 'template/footer.php'; ?>
<script type="text/javascript">
    carregaPagina();
    setInterval(carregaPagina, 13000);

    function carregaPagina() {

        //carrega na pagina
        $.getJSON("http://localhost:8080/api/listaGeneros", function(data) {
            jQuery('#tableGeneros').html('');
            $.each(data, function(key, val) {
                $("#tableGeneros").append("<tr><th scope='row'>" + val.id + "</th><td><a href='verGenero.php?id=" + val.id + "'> " + val.gnr_name + " </a></td> <td><button type='button' class='btn btn-warning btn-sm editar' id='" + val.id + "'>Editar</button></td><td> <button type='button' class='btn btn-danger btn-sm deletar' id='" + val.id + "'>Remover</button> </td>");
                console.log(key, val);
            });

            $(".editar").on('click', function() {
                var id = $(this).attr('id');
                window.location = "http://localhost/gametasks-front/verGenero.php?id=" + id;

            });
            $(".deletar").on('click', function() {
                // send ajax
                var id = $(this).attr("id");
                var stringvar = 'id=' + id;
                $.ajax({
                    url: 'http://localhost:8080/api/deletaGenero/' + id,
                    type: "DELETE",
                    dataType: 'json',
                    data: stringvar,
                    success: function(result) {
                        alert(result);
                        console.log(result);
                        window.location = "http://localhost/gametasks-front/listaGeneros.php";
                    },
                    error: function(xhr, resp, text) {
                        alert(JSON.stringify(xhr));
                        console.log(xhr, resp, text);
                    }
                })
            });
        });

    }
</script>
</body>

</html>