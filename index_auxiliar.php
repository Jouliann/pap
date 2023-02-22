<?php
 include('login/sessao.php');
 include('conexao.php');
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
		 <a class="navbar-brand" href="/PAPoriginal/index_chefe.html">
          <img src="logo.png" alt="logo" style="width:60px;">
        </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
			 
			  <li class="nav-item">
				<a class="nav-link" href="gestao_higiene/lista_a_gestao.php">Gestões</a>
			  </li>
			    <li class="nav-item">
				<a class="nav-link" href="gestao_higiene/ver_med.php">Medicações</a>
			  </li>
			   </li>
			    <li class="nav-item">
				<a class="nav-link" href="obs/lista_obs.php">Obeservações</a>
			  </li>
			  
			</ul></div>
			<ul class="nav navbar-nav navbar-right">
	  <a class="nav-link" href="sair.php"></a>
      <a class=" btn btn-danger" type="submit" href="login/sair.php">Terminar Sessão de: <?php echo $_SESSION['nome_utilizador']; ?></a>
    </ul>
		  
		</nav>
		
			<div class="container">
			<div class="table-responsive">
			<div style="margin-top:120px">
			<table class="table table-hover table-bordered table-striped text-center" id="result">   
		  <thead>
			<tr>
			
			 <th scope="col">Id</th>
			  <th scope="col">Nome</th>
			  <th scope="col">Data Nascimento</th>
			  <th scope="col">Acamado</th>
			  <th scope="col">Mobilidade</th>
			  <th scope="col">
			  <form class="form-inline" >
					<input class="form-control mr-sm-2" id="opesqu" type="search" onkeyup="pesquisa()" placeholder="Nome do utente" id="nome" name="nome" aria-label="Search">
					
			</form>
			</th>
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
		
	$dep = $_SESSION['dep'];
				
				$stmt = $mysqli->prepare('SELECT * FROM utentes where departamento="'.$dep.'" '); 
		
				$stmt->execute();
				$result = $stmt->get_result();
				//if($result->num_rows === 0) exit('No rows');
				while($row = $result->fetch_assoc()) {
					  echo"<tr>";
						  echo"<td>".$row['idutentes']."</td>";
						  echo"<td>".$row['nome']."</td>";
						  echo"<td>".$row['datanascimento']."</td>";
						  echo"<td>".$row['acamado']."</td>";
						  echo"<td>".$row['mobilidade']."</td>";
						  echo'<td><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modagestao"
							  
							  data-idpri='.$row['idutentes'].'
							  data-nome='.$row['nome'].'
							 
							  
							  >Gestão</button> 
						  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modaobs"
							  
							  data-idpri='.$row['idutentes'].'
							  data-nome='.$row['nome'].'
							 
							  
							  >Obeservaçao</button> 
							 </td>';
					  
					  
					  echo"</tr>";
				}
				
				
				 
				 $stmt->close();

				
			?>
			
		</tbody>	
</div>
</div>
</div>


<div class="modal fade" id="modagestao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Higiene</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
				  </div>
					  <div class="modal-body">
						<form action="gestao_higiene/add_gestao.php" method="POST">
						
					
						<div class="invisible">
						   <div class="form-group">
							<label for="cod_postal" class="col-form-label">Id de Utilizador:</label>
							<input type="nome" class="form-control" id="idutilizador" value="<?php echo $_SESSION['id_utilizador'];?>" name="idutilizador">
						  </div>
						  </div>
						  <div class="form-group">
						  <label for="email" class="col-form-label">Produtos:</label>
						  </div>
							<div class="modal-content ">
							  
							 
								<input list="brow" placeholder="Escolha o produto..." name="idprod" id="idprod">
									<datalist id="brow">
 

						       <?php
									$result = "SELECT idproduto,nome FROM stock";
									$resultado = mysqli_query($conn,$result);
									while($row = mysqli_fetch_assoc($resultado)){ ?>
										<option  id="<?php echo $row['idproduto'];?>" value="<?php echo $row['idproduto'];?>" name="<?php echo $row['idproduto'];?>"> <?php echo $row['nome'];?> </option> <?php
									}
								?>
								</datalist>
							
						  </div>
						

						   <div class="form-group">
							<label for="email" class="col-form-label">Quantidade:</label>
							<input type="text" class="form-control" id="quantidade" name="quantidade">
						  </div>	
					<div class="invisible">
						  <div class="form-group">
						<label for="recipient-name" class="col-form-label">ID do utente</label>
						<input type="text" class="form-control" id="val_id" name="val_id">
					  </div>
					  </div>
							<button type="submit" class="btn btn-primary">Adicionar</button>

					</form>
				  </div>    
				</div>
			  </div>
			</div>
	<div class="modal fade" id="modaobs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Higiene</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
				  </div>
					  <div class="modal-body">
						<form action="obs/add_obs.php" method="POST">
						
					
			 <div class="invisible">
						   <div class="form-group">
							<label for="cod_postal" class="col-form-label">Id de Utilizador:</label>
							<input type="nome" class="form-control" id="idutilizador" value="<?php echo $_SESSION['id_utilizador'];?>" name="idutilizador">
						  </div>
							</div>
						   <div class="form-group">
							<label for="email" class="col-form-label">Observação:</label>
							<textarea type="text" class="form-control" id="obs" name="obs"></textarea>
						  </div>	
					<div class="invisible">
						  <div class="form-group">
						<label for="recipient-name" class="col-form-label">ID do utente</label>
						<input type="text" class="form-control" id="val_id" name="val_id">
					  </div>
					  </div>
							<button type="submit" class="btn btn-primary">Adicionar</button>

					</form>
				  </div>    
				</div>
			  </div>
			</div>

</body>

	
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
			
<script type="text/javascript">
			$('#modagestao').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) 
		  var id_pri = button.data('idpri')
		  var id_nome = button.data('nome')
		  
		  var modal = $(this)
		  modal.find('.modal-title').text(id_nome)
		 
		  modal.find('#val_id').val(id_pri)
		})
		</script>
	<script type="text/javascript">
			$('#modaobs').on('show.bs.modal', function (event) {
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