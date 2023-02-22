<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
  $mysqli = new mysqli("localhost", "root", "", "idosos_pap");
  $mysqli->set_charset("utf8mb4");
} catch(Exception $e) {
  error_log($e->getMessage());
  exit('Error connecting to database'); //Should be a message a typical user could understand
}

if (isset($_POST["nome"]) && isset($_POST["datanascimento"]) && isset($_POST["morada"]) && isset($_POST["contacto"]) && isset($_POST["email"])&& isset($_POST["morada"])&& isset($_POST["tipo"])&& isset($_POST["cc"])&& isset($_POST["departamento"])&& isset($_POST["nomeutili"])&& isset($_POST["pass"])){

    $user = $_POST["nomeutili"];
    $nome = $_POST["nome"];
    $password = $_POST["pass"];
    $datanascimento = $_POST["datanascimento"];
	$morada = $_POST["morada"];
	$tipo = $_POST["tipo"];
	$cc = $_POST["cc"];
	$departamento = $_POST["departamento"];
	$contacto = $_POST["contacto"];
	$email = $_POST["email"];

    // validações
    if ( (strlen($user)>=3) && (strlen($nome)>=3)) {  // faz inserção

      $password = password_hash($password, PASSWORD_DEFAULT);/*método trocado por método com salt */

  		/* já está registado esse username?? */
  		$stmt = $mysqli->prepare("SELECT nomeutili FROM utilizador WHERE nomeutili=?");
  		$stmt->bind_param('s', $user);
  		$stmt->execute();
  		$stmt->bind_result($u);
			
  		if (!$stmt->fetch()) {/* Ainda não existe utilizador com esse user registado */
  			$stmt = $mysqli->prepare("SELECT email FROM utilizador WHERE email=?");
				$stmt->bind_param('s', $email);
				$stmt->execute();
				$stmt->bind_result($e);

				if (!$stmt->fetch()) {/* Ainda não existe utilizador com esse email registado */
					$stmt->free_result();
					$stmt = $mysqli->prepare("INSERT INTO utilizador (nome,datanascimento,contacto,email,morada,tipo,cc,departamento,nomeutili,pass) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
					/* retirar espaços, maiúscula e carateres epeciais do user */
					$user = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '', $user)));
					$stmt->bind_param('ssssssssss', $nome,$datanascimento,$contacto,$email,$morada,$tipo,$cc,$departamento,$user, $password);
					$stmt->execute();


				}
		}

	}
}
if($stmt == true){
 echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Foi inserido com sucesso!')
window.location.href='../index_chefe.php';
</SCRIPT>");
} else {
  echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Não foi inserido com sucesso!')
window.location.href='../index_chefe.php';
</SCRIPT>");
}

?>
