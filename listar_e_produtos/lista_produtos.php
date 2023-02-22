<?php
 include('../login/sessao.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>OldCare</title>
	<style>
	  .navbar-nav {
		width: 100%;
		text-align: center;
		> li {
		float: none;
		display: inline-block;
    }
  
	</style>
  </head>
  <body>
		  <nav class="navbar navbar-light navbar-expand-md bg-info justify-content-center fixed-top">
		 <a class="navbar-brand" href="/PAPoriginal/index_chefe.php">
          <img src="../logo.png" alt="logo" style="width:60px;">
        </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav w-100 justify-content-center">
			 
			  <li class="nav-item">
				<a class="nav-link" href="../consultas/lista_consultas.php">Consultas</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="../gestao_higiene/lista_gestao.php">Gestão Higiene</a>
			  </li>
			   <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				 Utentes
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				  <a class="dropdown-item" href="" data-toggle="modal" data-target="#modalutentes">Inserir</a>
				  <a class="dropdown-item" href="../lista_e_utentes/lista_utentes.php" >Ver inseridos</a>
				</div>
				<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Produtos
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				  <a class="dropdown-item" href="" data-toggle="modal" data-target="#modalprodutos">Inserir</a>
				  <a class="dropdown-item" href="lista_produtos.php" >Ver inseridos</a>
				</div>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  Utilizadores
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				  <a class="dropdown-item" href="" data-toggle="modal" data-target="#modalutilizadores">Inserir</a>
				  <a class="dropdown-item" href="../lista_e_utilizadores/lista_utilizadores.php" >Ver Inseridos</a>
				  
				</div>
			  </li>
			</ul>
			<ul class="navbar-nav w-100 justify-content-end" >
	  <a class="nav-link" href=""></a>
      <a class=" btn btn-danger" type="submit" href="../login/sair.php">Terminar Sessão de: <?php echo $_SESSION['nome_utilizador']; ?></a> 
    </ul>	
		  </div>
		</nav>
		<div class="container">
		<div class="table-responsive">
		<div style="margin-top:120px">
		<table class="table table-hover table-bordered table-striped text-center">  
		  <thead>
			<tr>
			  <th scope="col">Id</th>
			  <th scope="col">Nome</th>
			  <th scope="col">Quantidade</th>
			</tr>
		  </thead>
		  <tbody>
		  </div>
		  </div>
		  </div>
			<?php
				mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
				try {
				  $mysqli = new mysqli("localhost", "root", "", "idosos_pap");
				  $mysqli->set_charset("utf8mb4");
				  
				} catch(Exception $e) {
				  error_log($e->getMessage());
				  exit('Error connecting to database'); //Should be a message a typical user could understand
				}
				$stmt = $mysqli->prepare("select * from stock");
				$stmt->execute();
				$result = $stmt->get_result();
				// if($result->num_rows === 0) exit('No rows');
				while($row = $result->fetch_assoc()) {
					  echo"<tr>";
						  echo"<td>".$row['idproduto']."</td>";
						  echo"<td>".$row['nome']."</td>";
						  echo"<td>".$row['quantidade']."</td>";
						  echo '<td> 
						 <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addmodal"
							 
							 data-idpri='.$row['idproduto'].'
							  data-idnome='.$row['nome'].'
							  data-idquant='.$row['quantidade'].'
							  
							  >Reposição</button> </td>';
					  echo"</tr>";
				}
				
				
				 
				 $stmt->close();

				
			?>
			
		  </tbody>
		</table>
		
			<div class="modal fade" id="modalutentes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Utentes</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
					  <div class="modal-body">
						<form action="insere/insere_utentes.php" method="POST">
						  
						  <div class="form-group">
							<label for="nome" class="col-form-label">Nome:</label>
							<input type="text" class="form-control" id="nome" name="nome">
						  </div>
						  
			  
						   <div class="form-group">
							<label for="cod_postal" class="col-form-label">Data de Nascimento:</label>
							<input type="date" class="form-control" id="datanascimento" name="datanascimento">
						  </div>
						  
						   <div class="form-group">
							<label for="contacto" class="col-form-label">Morada:</label>
							<input type="text" class="form-control" id="morada" name="morada">
						  </div>

						   <div class="form-group">
							<label for="email" class="col-form-label">Contacto:</label>
							<input type="text" class="form-control" id="contacto" name="contacto">
						  </div>		
						  
						   <div class="form-group">
							<label for="email" class="col-form-label">Acamado?</label><br>
							<input type="radio" name="acamado" id="sim" value="sim"> Sim<br>
							<input type="radio" name="acamado" id="nao" value="nao"> Nao<br>
						  </div>	
						  
						  
						   <div class="form-group">
							<label for="email" class="col-form-label">Mobilidade:</label>
							<input type="text" class="form-control" id="mobilidade" name="mobilidade">
						  </div>	
						  
						 
						  
						  <div class="form-group">
							<label for="email" class="col-form-label">Contacto de emergencia:</label>
							<input type="text" class="form-control" id="contactoemer" name="contactoemer">
						  </div>
						   <div class="form-group">
							<label for="email" class="col-form-label">Departamento</label><br>
							<input type="radio" name="departamento" id="A" value="A">A<br>
							<input type="radio" name="departamento" id="B" value="B">B<br>
							<input type="radio" name="departamento" id="C" value="C">C<br>
						  </div>
						  

							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-primary">Gravar</button>

					</form>
				  </div>  
						<div class="modal-footer">

						</div>	  
				</div>
			  </div>
			</div>
			
			<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Adicionar dados do aluno...</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<form action="add_produtos.php" method="POST">
					<div class="invisible">  
					<div class="form-group">
						
						<input type="text" class="form-control" id="val_id" name="val_id">
					  </div>
					  </div>
					  <div class="form-group">
						<label for="recipient-name" class="col-form-label">Quantidade</label>
						<input type="text" class="form-control" id="val_quant" name="val_quant">
					  </div>
					  <div class="invisible"> 
					 <div class="form-group">
						
						<input type="text" class="form-control" id="val_nome" name="val_nome">
					  </div>
					  </div>
											  
					  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					  <button type="submit" class="btn btn-primary">Adicionar</button>
					</form>
				  </div>
				  <div class="modal-footer">
			        
				  </div>
				</div>
			  </div>
			</div>
			<div class="modal fade" id="modalutilizadores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Utilizadores</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
					  <div class="modal-body">
						<form action="insere/insere_utilizadores.php" method="POST">
						  
						  <div class="form-group">
							<label for="nome" class="col-form-label">Nome:</label>
							<input type="text" class="form-control" id="nome" name="nome">
						  </div>
						  
			  
						   <div class="form-group">
							<label for="cod_postal" class="col-form-label">Data de Nascimento:</label>
							<input type="date" class="form-control" id="datanascimento" name="datanascimento">
						  </div>
						  
						   <div class="form-group">
							<label for="contacto" class="col-form-label">Morada:</label>
							<input type="text" class="form-control" id="morada" name="morada">
						  </div>

						   <div class="form-group">
							<label for="email" class="col-form-label">Contacto:</label>
							<input type="text" class="form-control" id="contacto" name="contacto">
						  </div>		
						  
						   <div class="form-group">
							<label for="email" class="col-form-label">Tipo de utilizador</label><br>
							<input type="radio" name="tipo" id="medico" value="medico">Medico<br>
							<input type="radio" name="tipo" id="auxiliar" value="auxiliar">Auxiliar<br>
						  </div>	
						  
						  
						   <div class="form-group">
							<label for="email" class="col-form-label">Email:</label>
							<input type="text" class="form-control" id="email" name="email">
						  </div>	
						  
						  <div class="form-group">
							<label for="email" class="col-form-label">Cartao de cidadao:</label>
							<input type="text" class="form-control" id="cc" name="cc">
						  </div>
						  
						   <div class="form-group">
							<label for="email" class="col-form-label">Departamento</label><br>
							<input type="radio" name="departamento" id="A" value="A">A<br>
							<input type="radio" name="departamento" id="B" value="B">B<br>
							<input type="radio" name="departamento" id="C" value="C">C<br>
						  </div>
						  
						  <div class="form-group">
							<label for="email" class="col-form-label">Nome Utilizador:</label>
							<input type="text" class="form-control" id="nomeutili" name="nomeutili">
						  </div>
						  
						  
						  <div class="form-group">
							<label for="email" class="col-form-label">Palavra Passe:</label>
							<input type="password" class="form-control" id="pass" name="pass">
						  </div>

							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-primary">Gravar</button>

					</form>
				  </div>  
						<div class="modal-footer">

						</div>	  
				</div>
			  </div>
			</div>
			<div class="modal fade" id="modalprodutos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Produtos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
					  <div class="modal-body">
						<form action="../insere/insere_produtos.php" method="POST">
						  
						  <div class="form-group">
							<label for="nome" class="col-form-label">Nome:</label>
							<input type="text" class="form-control" id="nome" name="nome">
						  </div>
						  
			  
						   <div class="form-group">
							<label for="cod_postal" class="col-form-label">Quantidade:</label>
							<input type="text" class="form-control" id="quantidade" name="quantidade">
						  </div>

							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-primary">Gravar</button>

					</form>
				  </div>  
						<div class="modal-footer">

						</div>	  
				</div>
			  </div>
			</div>
			
			
			



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	
		<script type="text/javascript">
			$('#addmodal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) 
		   var id_nome = button.data('idnome')
		   
		    var id_pri = button.data('idpri')
		 
		  
		  var modal = $(this)
		  modal.find('.modal-title').text('Adicionar ' + id_nome)
		  modal.find('#val_nome').val(id_nome)
		
		 modal.find('#val_id').val(id_pri)
		})
		</script>
		
</html>
