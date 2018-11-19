<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">




    
    
    <title>3 Col Portfolio - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/3-col-portfolio.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">GameTasks API Front End</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Lista Jogos
        <small>GetJson</small>
      </h1>
	        <div class="row" id="verGame">
				<div class="col-lg-4 col-sm-6 portfolio-item">
				<form id="gameForm" class='gameForm'>
				  <div class="form-group">
					<label for="titulo">Titulo</label>
					<input type="text" class="form-control" id="nome" value='testando' placeholder="Digite o titulo" name="nome">
					<small id="titulohelp" class="form-text text-muted">Teste</small>
				  </div>
				  <div class="form-group">
					<label for="desenvovedora">Desenvolvedora</label>
					<input type="" class="form-control" id="desenvovedora" placeholder="Digite a desenvolvedora" name="desenvolvedora">
				  </div>
				  <div class="form-group">
					<label for="produtora">Produtora</label>
					<input type="" class="form-control" id="produtora" placeholder="Digite a produtora" name="produtora">
				  </div>
				  <div class="form-group">
					<label for="metacritic">Nota metacritic</label>
					<input type="" class="form-control" id="meta_critic_rank" placeholder="Digite a nota metacritic" name="meta_critic_rank">
				  </div>
				  <div class="form-group">
					<label for="image_url">Url da imagem do jogo</label>
					<input type="" class="form-control" id="image_url" placeholder="Informe a URL remota da imagem" name="image_url">
				  </div>				  
				  <div class="form-group">
					<label for="sinopse">Sinopse do jogo</label>
					<input type="" class="form-control" id="sinopse" placeholder="Sinopse do jogo" name="sinopse">
				  </div>				  
				  				  
				  
				  <div class="form-check">
					<input type="checkbox" class="form-check-input" id="ativo">
					<label class="form-check-label" for="ativo">Ativo</label>
				  </div>
				  <a id="salvar" class="btn btn-primary">Salvar</a>
				</form>
				</div>
			</div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
	var baseUrl = (window.location).href; // You can also use document.URL
	var id = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);


	   $("#salvar").on('click', function(){
            // send ajax
            $.ajax({
                url: 'http://localhost:8080/api/atualizaJogo/'+id, // url where to submit the request
                type : "PUT", // type of action POST || GET
                dataType : 'json', // data type
                data : $("#gameForm").serialize(), // post data || get data
                success : function(result) {
                    // you can see the result from the console
                    // tab of the developer tools
					Alert(result);
                    console.log(result);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            })
        });


$.getJSON( "http://localhost:8080/api/verJogo/"+id, function( data ) {
console.log(data)

  	$("#nome").val(data[0].nome);
  	$("#desenvolvedora").val(data[0].desenvolvedora);
  	$("#produtora").val(data[0].produtora);
	$("#meta_critic_rank").val(data[0].meta_critic_rank);
  	$("#image_url").val(data[0].image_url);
  	$("#sinopse").val(data[0].sinopse);

});

    </script>
  </body>

</html>
