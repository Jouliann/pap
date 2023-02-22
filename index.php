<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>Old Care</title>

  </head>
  <body>
		 <nav class="navbar navbar-light navbar-expand-md bg-info justify-content-center fixed-top">
		 <a class="navbar-brand" href="/PAPoriginal/index.php">
          <img src="logo.png" alt="logo" style="width:60px;">
        </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
			  <div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav w-100 justify-content-center">
					  <li class="nav-item">
						<a class="nav-link" href="" data-toggle="modal" data-target="#loginModal">Login</a>
					  </li>
					</ul>
			  </div>
		</nav>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
		  <div class="modal-body">
			<form action="login/login1.php" method="POST">
			  
			  <div class="form-group">
				<label for="nome" class="col-form-label">Nome de Utilizador:</label>
				<input type="text" class="form-control" id="nomeutili" name="nomeutili">
			  </div>
			  
  
			   <div class="form-group">
				<label for="cod_postal" class="col-form-label">Password:</label>
				<input type="password" class="form-control" id="pass" name="pass">
			  </div>
		  

				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-primary">Login</button>

        </form>
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
			<br>
			<br>

		  <h2>Objetivos:</h2>
		  <p>- Melhorar a qualidade de vida das pessoas idosas e possibilitar a manutenção dos seus utentes.<br>
			 - Potencializar um conjunto de acções destinadas a promover a convivência, participação e integração dos indivíduos na vida social.</p>
		</div>
		</div>
	  </div>		
			
			<div class="container">
			<div class="center">
			<div class="modal-footer">
			<div class="row text-center">		
						<div class="col-md-4">
						  <a class="image" ><img src="world.png" class="rounded" width="70" height="70"></i></a>
						  <p>Viana do Castelo, R. Manuel Fiúza Júnior 65</p>
						  <p>Portugal</p>
						</div>

						<div class="col-md-4">
						  <a class="image" ><img src="phone.png" class="rounded" width="70" height="70"></i></a>
						  <p>96565623</p>
						  <p>Seg - Sexta, 8:00-22:00</p>
						</div>

						<div class="col-md-4">
						  <a class="image" ><img src="@.png" class="rounded" width="70" height="70"></i></a>
						  <p>oldcare12@gmail.com</p>
						</div>
			</div>	  
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