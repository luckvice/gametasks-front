<?php include 'template/header.php'; ?>
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Lista Jogos
        <small>GetJson</small>
      </h1>
      <div class="row">
      <div class="col-lg-4">
        <a id="salvar" class="btn btn-primary" href="novoJogo.php">Cadastrar novo</a>
      </div>
        </div>
	        <div class="row" id="listGames">
				<div class="col-lg-4 col-sm-6 portfolio-item">
				<table class="table">
				  <thead>
					<tr>
					  <th scope="col">#</th>
					  <th scope="col">Titulo</th>
					  <th scope="col">Desenvolvedora</th>
					  <th scope="col">Produtora</th>
					  <th scope="col">Nota</th>
					  <th scope="col">Ação</th>
					</tr>
				  </thead>
				  <tbody id="tableGames">
				  </tbody>
				</table>
				</div>
			</div>
<!--
      <div class="row">
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project One</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Two</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Three</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos quisquam, error quod sed cumque, odio distinctio velit nostrum temporibus necessitatibus et facere atque iure perspiciatis mollitia recusandae vero vel quam!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Four</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Five</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Six</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque earum nostrum suscipit ducimus nihil provident, perferendis rem illo, voluptate atque, sit eius in voluptates, nemo repellat fugiat excepturi! Nemo, esse.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

      <!-- Pagination -->
	  <!--
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
-->
    </div>
    <!-- /.container -->



	 <?php include 'template/footer.php'; ?>
   <script type="text/javascript">
carregaPagina();
setInterval(carregaPagina, 13000);

function carregaPagina(){

//carrega na pagina
$.getJSON( "http://localhost:8080/api/listaJogos", function( data ) {
  jQuery('#tableGames').html('');
  $.each( data, function( key, val ) {
	$("#tableGames").append("<tr><th scope='row'>"+val.id+"</th><td><a href='verGame.php?id="+val.id+"'> "+val.nome+" </a></td> <td>"+val.desenvolvedora+"</td> <td>"+val.produtora+"</td><td>"+val.meta_critic_rank+"</td><td><button type='button' class='btn btn-warning btn-sm editar' id='"+val.id+"'>Editar</button></td><td> <button type='button' class='btn btn-danger btn-sm deletar' id='"+val.id+"'>Remover</button> </td>");
	console.log(key, val);
  });

   $(".editar").on('click', function(){
    var id = $(this).attr('id');
    window.location = "http://localhost/gametasks-front/verGame.php?id="+id;

   });
  $(".deletar").on('click', function(){
            // send ajax
            var id = $(this).attr("id");
            var stringvar = 'id='+ id ;
            $.ajax({
                url: 'http://localhost:8080/api/deletaJogo/'+id, 
                type : "DELETE", 
                dataType : 'json', 
                data : stringvar, 
                success : function(result) {
					          alert(result);
                    console.log(result);
                    window.location = "http://localhost/gametasks-front/listaJogos.php";
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
