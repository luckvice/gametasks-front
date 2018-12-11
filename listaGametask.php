<?php include 'template/header.php'; ?>
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Suas game Tasks
        <small>GetJson</small>
      </h1>
      <div class="row">
      <div class="col-lg-4">
        <a id="nova" class="btn btn-primary" href="#">Nova Game Task</a>
      </div>
        </div>
	        <div class="row" id="listGametask">
				<div class="col-lg-4 col-sm-6 portfolio-item">
				<table class="table">
				  <thead>
					<tr>
					  <th scope="col">#</th>
					  <th scope="col">Jogo</th>
            <th scope="col">Plataforma</th>
            <th scope="col">Status</th>
            <th scope="col">Tempo de jogo</th>
            <th scope="col">Prioridade</th>
            <th scope="col">Completo</th>
            <th scope="col">Ação</th>
					</tr>
				  </thead>
				  <tbody id="tableGametask">
				  </tbody>
				</table>
				</div>
			</div>
    </div>
    <!-- /.container -->

	 <?php include 'template/footer.php'; ?>
   <script type="text/javascript">
   			var baseUrl = (window.location).href; //pega url
      var id = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);

      document.getElementById('nova').href = "novaGametask.php?id="+id;

carregaPagina();
setInterval(carregaPagina, 13000);



function carregaPagina(){
var status = "";
//carrega na pagina
$.getJSON( "http://localhost:8080/api/listaGameTasksUser/"+id, function( data ) {

  jQuery('#tableGametask').html('');
  $.each( data, function( key, val ) {
  if(val.jogando == "S"){
    status = "Jogando";
  }else if(val.parado == "S"){
    status = "Dando um tempo";
  }else if(val.rejogando == "S"){
    status = "Jogando novamente";
  }

	$("#tableGametask").append("<tr><th scope='row'>"+val.id_gt+"</th><td><a href='verGametask.php?id="+val.id+"'> "+val.nome+" </a></td> <td>"+val.pl_name+"</td> <td> "+status+"</td><td>"+val.current_progress_time+" </td> <td> "+val.priority+"</td> <td> <div class='progress'>  <div class='progress-bar w-"+val.percent_complete+"' role='progressbar' style='width: "+val.percent_complete+"%' aria-valuenow='"+val.percent_complete+"' aria-valuemin='0' aria-valuemax='"+val.percent_complete+"'></div></div></td> <td><button type='button' class='btn btn-warning btn-sm editar' id='"+val.id_gt+"'>Editar</button></td><td> <button type='button' class='btn btn-danger btn-sm deletar' id='"+val.id_gt+"'>Remover</button> </td>");
	console.log(key, val);
  });

   $(".editar").on('click', function(){
    var id = $(this).attr('id');
    window.location = "http://localhost/gametasks-front/verGametask.php?id="+id;

   });
  $(".deletar").on('click', function(){
            // send ajax
            var id_task = $(this).attr("id");
            var stringvar = 'id_task='+ id_task ;
           
            $.ajax({
                url: 'http://localhost:8080/api/deletaGameTaskUser/'+id_task+'/'+id, // url where to submit the request
                type : "DELETE", // type of action POST || GET
                dataType : 'json', // data type
                data : stringvar, // post data || get data
                success : function(result) {
                    // you can see the result from the console
                    // tab of the developer tools
					          alert(result);
                    console.log(result);
                    window.location = "http://localhost/gametasks-front/listaGametask.php?id="+id;
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
