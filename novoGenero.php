<?php include 'template/header.php'; ?>
    <!-- Page Content -->
    <div class="container">
      <!-- Page Heading -->
      <h1 class="my-4">Novo Genero
        <small>novo</small>
      </h1>
	        <div class="row" id="novogenero">
				<div class="col-lg-4 col-sm-6 portfolio-item">
				<form id="generoForm" class='generoForm'>
				  <div class="form-group">
					<label for="titulo">Nome do genero</label>
					<input required type="text" class="form-control" id="gnr_name" placeholder="Digite o titulo" name="gnr_name">
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

		$("#generoForm").validate({

       rules : {
             gnr_name:{
                    required:true
                   // minlength:3
             }     

       },
       messages:{
             gnr_name:{
                    required:"Insira o nome do genero"
                   // minlength:"O nome deve ter pelo menos 3 caracteres"
             }
       }
});


	   $("#salvar").on('click', function(){
			if($("#generoForm").valid()){  
            // send ajax
            $.ajax({
                url: 'http://localhost:8080/api/novoGenero', // url where to submit the request
                type : "POST", // type of action POST || GET
                dataType : 'json', // data type
                data : $("#generoForm").serialize(), // post data || get data
                success : function(result) {
                    // you can see the result from the console
                    // tab of the developer tools
					          alert(result);
                    console.log(result);
                    window.location = "http://localhost/gametasks-front/listaGeneros.php";
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
