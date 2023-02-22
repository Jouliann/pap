<?php
 include('login/sessao.php');
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
	  .image {
			height: 200px;
  }
   

	</style>
  </head>
  <body>
		  <nav class="navbar navbar-light navbar-expand-md bg-info justify-content-center fixed-top">
		 <a class="navbar-brand" href="/PAPoriginal/index_chefe.php">
          <img src="logo.png" alt="logo" style="width:60px;">
        </a>
 
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavDropdown3">
			<ul class="navbar-nav w-100 justify-content-center">
			 
			  <li class="nav-item">
				<a class="nav-link" href="consultas/lista_consultas.php">Consultas</a>
			  </li>
			   <li class="nav-item">
				<a class="nav-link" href="gestao_higiene/lista_gestao.php">Gestão Higiene</a>
			  </li>
			 
			   <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				 Utentes
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				  <a class="dropdown-item" href="" data-toggle="modal" data-target="#modalutentes">Inserir</a>
				  <a class="dropdown-item" href="lista_e_utentes/lista_utentes.php" >Ver inseridos</a>
				</div>
				<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Produtos
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				  <a class="dropdown-item" href="" data-toggle="modal" data-target="#modalprodutos">Inserir</a>
				  <a class="dropdown-item" href="listar_e_produtos/lista_produtos.php" >Ver inseridos</a>
				</div>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  Utilizadores
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				  <a class="dropdown-item" href="" data-toggle="modal" data-target="#modalutilizadores">Inserir</a>
				  <a class="dropdown-item" href="lista_e_utilizadores/lista_utilizadores.php">Ver Inseridos</a>
				  
				</div>
			  </li>
			</ul>
			<ul class="navbar-nav w-100 justify-content-end" >
	  <a class="nav-link" href=""></a>
      <div class="center">
	  <a class=" btn btn-danger" type="submit" href="login/sair.php">Terminar Sessão de: <?php echo $_SESSION['nome_utilizador']; ?></a> 
	  </div>	
	</ul>	
		  </div>
		  
		
		</nav>


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
						<form action="insere/insere_produtos.php" method="POST">
						  
						  <div class="form-group">
							<label for="nome" class="col-form-label">Nome:</label>
							<input type="text" class="form-control" id="nome" name="nome">
						  </div>
						  
			  
						   <div class="form-group">
							<label for="cod_postal" class="col-form-label">Quantidade:</label>
							<input type="text" class="form-control" id="quantidade" name="quantidade">
						  </div>

							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-primary">Gravar</button>

					</form>
				  </div>  
						<div class="modal-footer">

						</div>	  
				</div>
			  </div>
			</div>
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
							<input type="radio" name="acamado" id="nao" value="nao"> Não<br>
						  </div>	
						  
						  
						   <div class="form-group">
							<label for="email" class="col-form-label">Mobilidade:</label>
							<input type="text" class="form-control" id="mobilidade" name="mobilidade">
						  </div>	
						  
						  <div class="form-group">
							<label for="email" class="col-form-label">Restrição de alimentação(se tiver):</label>
							<input type="text" class="form-control" id="restricao" name="restricao">
						  </div>
						  
						  <div class="form-group">
							<label for="email" class="col-form-label">Contacto de emergência:</label>
							<input type="text" class="form-control" id="contactoemer" name="contactoemer">
						  </div>
						  <div class="form-group">
							<label for="email" class="col-form-label">Departamento</label><br>
							<input type="radio" name="departamento" id="A" value="A">A<br>
							<input type="radio" name="departamento" id="B" value="B">B<br>
							<input type="radio" name="departamento" id="C" value="C">C<br>
						  </div>
						  

							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-primary">Gravar</button>

					</form>
				  </div>  
						<div class="modal-footer">

						</div>	  
				</div>
			  </div>
			</div>
			<div class="container" style="margin-top:100px">
			<div class="row">
			<div class="col-sm-4">
			<h2>Sobre nós:</h2>
			<img src="logo3.jpg" class="img-thumbnail image" alt="logo">
			<h2 class="font-weight-bolder">Serviços:</h2>
			<p class="font-weight-bolder">O <mark>Centro de Dia</mark> assegura a prestação dos seguintes cuidados e serviços:</p>
			<ul class="list-group list-group-flush">
			<li class="list-group-item">Atividades socioculturais, lúdico-recreativas, de motricidade e de estimulação cognitiva  <span class="badge badge-pill badge-warning">Semanalmente</span></li>
			<li class="list-group-item">Nutrição e alimentação, nomeadamente o almoço e o lanche  <span class="badge badge-pill badge-success">Diariamente</span></li>
			<li class="list-group-item">Administração de medicamentos quando prescritos  <span class="badge badge-pill badge-success">Diariamente</span></li>
			<li class="list-group-item">Articulação com os serviços locais de saúde, quando necessário  <span class="badge badge-pill badge-primary">Sempre que necessário</span></li>
			<li class="list-group-item">Cuidados de higiene pessoal  <span class="badge badge-pill badge-success">Diariamente</span></li>	
			</ul>
			<br>
			<ul class="navbar-nav">
				<li class="nav-item">
				<a class="nav-link" href="mapa.html">Onde estamos?</a>
			</li>
			<!--Google map
			<div id="map-container-google-1" class="z-depth-1-half map-container">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2978.9927188521738!2d-8.82453358426626!3d41.699092884575904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd25b632e13da42f%3A0xb296304dd61b1a2d!2sEscola+Secund%C3%A1ria+de+Santa+Maria+Maior!5e0!3m2!1spt-PT!2spt!4v1557434184110!5m2!1spt-PT!2spt" width="350px" frameborder="0" style="border:0" height="200px" allowfullscreen></iframe>
			</div>
			<!--Google Maps-->
			<hr class="d-sm-none">
			</div>
			<div class="col-sm-8">
		  <h2>Tudo para o seu bem-estar!</h2>

		  <div id="demo" class="carousel slide" data-ride="carousel" height="200px" width="410px">

			  <!-- Indicators -->
			  <ul class="carousel-indicators">
				<li data-target="#demo" data-slide-to="0" class="active"></li>
				<li data-target="#demo" data-slide-to="1"></li>
				<li data-target="#demo" data-slide-to="2"></li>
				<li data-target="#demo" data-slide-to="3"></li>
				<li data-target="#demo" data-slide-to="4"></li>
			  </ul>

			  <!-- The slideshow -->
			  <div class="carousel-inner">
				<div class="carousel-item active">
				  <img src="/PAPoriginal/imagens/1.jpg">
				</div>
				<div class="carousel-item">
				  <img src="/PAPoriginal/imagens/2.jpg">
				</div>
				<div class="carousel-item">
				  <img src="/PAPoriginal/imagens/3.jpg">
			  </div>
			  	<div class="carousel-item">
				  <img src="/PAPoriginal/imagens/4.jpg">
			  </div>	
			  <div class="carousel-item">
				  <img src="/PAPoriginal/imagens/5.jpg">
			  </div>

			  <!-- Left and right controls -->
			  <a class="carousel-control-prev" href="#demo" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			  </a>
			  <a class="carousel-control-next" href="#demo" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			  </a>
			</div>
			</div>

		  <h2>Objetivos:</h2>
		  <p>- Melhorar a qualidade de vida das pessoas idosas e possibilitar a manutenção dos seus utentes, nos seus próprios domicílios.<br>
			 - Potencializar um conjunto de acções destinadas a promover a convivência, participação e integração dos indivíduos na vida social.</p>		</div>
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
							<input type="radio" name="tipo" id="chefe" value="chefe">Chefe<br>
						  </div>	
						  
						  
						   <div class="form-group">
							<label for="email" class="col-form-label">Email:</label>
							<input type="text" class="form-control" id="email" name="email">
						  </div>	
						  
						  <div class="form-group">
							<label for="email" class="col-form-label">Cartão de cidadão:</label>
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

							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-primary">Gravar</button>

					</form>
							
						
						<div class="modal-footer">

						</div>	  
				</div>
			  </div>
			</div>
				
		</body>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</html>
