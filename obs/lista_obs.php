<?php
 include('../login/sessao.php');
 
?>
<!doctype html>
<html lang="en">
  <head>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">-->
	

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
          <img src="../logo.png" alt="logo" style="width:60px;">
        </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
			 
			  <li class="nav-item">
				<a class="nav-link" href="../index_auxiliar.php">Gestão</a>
			  </li>
			  
			</ul>
		  </div>
		 <ul class="navbar-nav w-100 justify-content-end" >
	  <a class="nav-link" href="sair.php"></a>
      <a class=" btn btn-danger" type="submit" href="../login/sair.php">Terminar Sessão de: <?php echo $_SESSION['nome_utilizador']; ?></a> 
    </ul>
		</nav>
		
			<div class="container">
			<div class="table-responsive">
			<div style="margin-top:120px">
			<table class="table table-hover table-bordered table-striped text-center" id="result">   
		  <thead>
			<tr>
			<th scope="col"><form class="form-inline" >
					<input class="form-control mr-sm-2" id="opesqu" type="search" onkeyup="pesquisa()" placeholder="Nome do utente" id="nome" name="nome" aria-label="Search">
					
			</form>ID</th>
			
			  <th scope="col">Nome de utente</th>
			  <th scope="col">Nome de utilizador</th>
			  <th scope="col">Observaçao</th>
			  <th scope="col">Data e Hora</th>
			
			</tr>
		  </thead>
		<tbody>
<?php
				mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
				try {
				  $mysqli = new mysqli("localhost", "root", "", "idosos_pap");
				  $mysqli->set_charset("utf8mb4");
				  
				} catch(Exception $e) {
				  error_log($e->getMessage());
				  exit('Error connecting to database'); //Should be a message a typical user could understand
				}
		
	
				
				$stmt = $mysqli->prepare('SELECT idobs,obs,datahora,utilizador.nome as nome_utili,utentes.nome as nome_ute FROM observacao INNER JOIN utilizador ON utilizador.idutilizador = observacao.idutilizador INNER JOIN utentes ON utentes.idutentes = observacao.idutente   '); 
		
				$stmt->execute();
				$result = $stmt->get_result();
				//if($result->num_rows === 0) exit('No rows');
				while($row = $result->fetch_assoc()) {
					  echo"<tr>";
						  echo"<td>".$row['idobs']."</td>";
						  echo"<td>".$row['nome_ute']."</td>";
						  echo"<td>".$row['nome_utili']."</td>";
						  echo"<td>".$row['obs']."</td>";
						  echo"<td>".$row['datahora']."</td>";
						  
						  
						  
					  
					  
					  echo"</tr>";
				}
				
				
				 
				 $stmt->close();

				
			?>
			
		</tbody>	
</div>
</div>
</div>



	
</body>

	
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
			
<script type="text/javascript">
			$('#modadetalhe').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) 
		  var id_pri = button.data('idpri')
		  var id_nome = button.data('nome')
		  
		  var modal = $(this)
		  modal.find('.modal-title').text(id_nome)
		 
		  modal.find('#val_id').val(id_pri)
		})
		</script>
	
<script>
function pesquisa() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("opesqu");
  filter = input.value.toUpperCase();
  table = document.getElementById("result");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

		




    
    
</html>