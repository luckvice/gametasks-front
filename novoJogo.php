<?php include 'template/header.php'; ?>
    <!-- Page Content -->
    <div class="container">
      <!-- Page Heading -->
      <h1 class="my-4">Novo Jogo
        <small>novo</small>
      </h1>
	        <div class="row" id="novojogo">
				<div class="col-lg-4 col-sm-6 portfolio-item">
				<form id="gameForm" class='gameForm'>
				  <div class="form-group">
					<label for="titulo">Titulo</label>
					<input required type="text" class="form-control" id="nome" value='testando' placeholder="Digite o titulo" name="nome">
					<small id="titulohelp" class="form-text text-muted">Teste</small>
				  </div>
				  <div class="form-group">
					<label for="desenvolvedora">Desenvolvedora</label>
					<input type="" class="form-control" id="desenvolvedora" placeholder="Digite a desenvolvedora" name="desenvolvedora">
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
				  <button id="salvar" class="btn btn-primary">Cadastrar</button>
				</form>
				</div>
			</div>
    </div>
    <!-- /.container -->

  <?php include 'template/footer.php'; ?>

    <script type="text/javascript">
	   $("#salvar").on('click', function(){
            // send ajax
            $.ajax({
                url: 'http://localhost:8080/api/novoJogo', // url where to submit the request
                type : "POST", // type of action POST || GET
                dataType : 'json', // data type
                data : $("#gameForm").serialize(), // post data || get data
                success : function(result) {
                    // you can see the result from the console
                    // tab of the developer tools
					          alert(result);
                    console.log(result);
                    window.location = "http://localhost/gametasks-front/listaJogos.php";
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            })
        
        });

    </script>
  </body>

</html>
