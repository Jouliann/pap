<?php
 include('../login/sessao.php');
 include('../conexao.php')
 
?>
<!doctype html>
<html lang="en">
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
	<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

		<title>Hello, world!</title>

			<head>
			<body>
		  <nav class="navbar navbar-light navbar-expand-md bg-info justify-content-center fixed-top">
		 <a class="navbar-brand" href="/PAPoriginal/index_chefe.php">
          <img src="logo.png" alt="logo" style="width:60px;">
        </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
			 
			  <li class="nav-item">
				<a class="nav-link" href="../index_auxiliar.php">Gestões</a>
			  </li>
			   <li class="nav-item">
			   <a class="nav-link" href="">
				<?php 
				echo $_SESSION['nome_utilizador'];
				echo $_SESSION['dep'];
				?>
				</a>
			  </li>
			</ul>
		  </div>
		</nav>
		
			<div class="container">
			<div class="table-responsive">
			<div style="margin-top:80px">
			<table class="table table-hover table-bordered table-striped text-center" id="result">   
		  <thead>
			<tr>
			
			 <th scope="col">Id de Utente</th>
			  <th scope="col">Id de utilizador</th>
			  <th scope="col">Id de produto</th>
			 <th scope="col">Quantidade</th>
			
			</tr>
		  </thead>
		<tbody>

			
		</tbody>	
		<div class="modal fade" id="modalconsulta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Consulta</h5>
					
				  </div>
					  <div class="modal-body">
						<form action="insere/insere_consultas.php" method="POST">
						
						<div class="form-group">
						<label for="recipient-name" class="col-form-label">ID do utente</label>
						<input type="text" class="form-control" value="" id="val_id" name="val_id">
					  </div>
			  
						   <div class="form-group">
							<label for="cod_postal" class="col-form-label">Id de Utilizador:</label>
							<input type="nome" class="form-control" id="idutilizador" value="<?php echo $_SESSION['id_utilizador'];?>" name="idutilizador">
						  </div>
						   
							
							  
							  <select class="chosen">
								
															
								<?php
									$result_niveis_acessos = "SELECT * FROM stock";
									$resultado_niveis_acesso = mysqli_query($conn,$result_niveis_acessos);
									while($row_niveis_acessos = mysqli_fetch_assoc($resultado_niveis_acesso)){ ?>
										<option name="<?php echo $row_niveis_acessos['idproduto']; ?>" value="<?php echo $row_niveis_acessos['nome']; ?>"><?php echo $row_niveis_acessos['nome']; ?></option> <?php
									}
								?>
							</select>
						  

						   <div class="form-group">
							<label for="email" class="col-form-label">Quantidade:</label>
							<input type="text" class="form-control" id="dosagem" name="contacto">
						  </div>	
							<button type="submit" class="btn btn-primary">Adicionar</button>

					</form>
				  </div>    
				</div>
			  </div>
			</div>
		
</body>

<script type="text/javascript">
			$('.chosen').chosen();
		
		</script>
			
<script type="text/javascript">
			$('#modalconsulta').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) 
		   var id_ut = button.data('idut')
		
		 
		  
		  var modal = $(this)
		  modal.find('.modal-title').text('Adicionar dados do aluno  ' + id_nome)
		  modal.find('#val_id').val(id_ut)
		
		})
		</script>

<script>
$('input[data-list]').each(function () {
  var availableTags = $('#' + $(this).attr("data-list")).find('option').map(function () {
    return this.value;
  }).get();

  $(this).autocomplete({
    source: availableTags
  }).on('focus', function () {
    $(this).autocomplete('search', ' ');
  }).on('search', function () {
    if ($(this).val() === '') {
      $(this).autocomplete('search', ' ');
    }
  });
});
</script>
<script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, option, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  option = div.getElementsByTagName("option");
  for (i = 0; i < option.length; i++) {
    txtValue = option[i].textContent || option[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      option[i].style.display = "";
    } else {
      option[i].style.display = "none";
    }
  }
}
</script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</html>