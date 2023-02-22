<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
  $mysqli = new mysqli("localhost", "root", "", "idosos_pap");
  $mysqli->set_charset("utf8mb4");
} catch(Exception $e) {
  error_log($e->getMessage());
  exit('Error connecting to database'); //Should be a message a typical user could understand
}

$stmt = $mysqli->prepare("insert into stock(nome,quantidade) values(?,?)");
$stmt->bind_param("ss", $_POST['nome'], $_POST['quantidade']);
$stmt->execute();


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
