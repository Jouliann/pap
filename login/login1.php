<?php
session_start();
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		try 
			{
			  $mysqli = new mysqli("localhost", "root", "", "idosos_pap");
			  $mysqli->set_charset("utf8mb4");
			  
			}
		catch(Exception $e) 
			{
			  error_log($e->getMessage());
			  exit('Error connecting to database'); //Should be a message a typical user could understand
			}
		  

		  if (isset($_POST["nomeutili"]) && isset($_POST["pass"])){
		
		$user = $_POST["nomeutili"];
		$password = $_POST["pass"];
		 
		$stmt = $mysqli->prepare("SELECT nomeutili, nome, pass,tipo,departamento,idutilizador FROM utilizador WHERE nomeutili=?");
     $stmt->bind_param('s', $user);
		$stmt->execute();
		$stmt->bind_result($username, $nome, $hashedPass, $tipo,$departamento,$idutilizador);
		  
				if ($stmt->fetch() && password_verify($password, $hashedPass))	{
					if ($tipo === 'Chefe') 
						{
							header("Location:../index_chefe.php");
							$_SESSION['nome_utilizador']=$nome;
							$_SESSION['id_utilizador']=$idutilizador;
						} 
			else if ($tipo === 'Auxiliar')
				{
					header("Location:../index_auxiliar.php");	
					$_SESSION['nome_utilizador']=$nome;
					$_SESSION['id_utilizador']=$idutilizador;
					$_SESSION['dep']=$departamento;
				}
				 else if($tipo == 'Medico')
				{
				 
					header("Location:../index_medico.php");
					$_SESSION['nome_utilizador']=$nome;
					$_SESSION['id_utilizador']=$idutilizador;
				}
				
				
		}
		 else 
				{
				 
					header("Location:../index.php");
					
				}			
					
	}


?>