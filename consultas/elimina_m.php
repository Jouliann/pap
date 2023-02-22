<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
  $mysqli = new mysqli("localhost", "root", "", "idosos_pap");
  $mysqli->set_charset("utf8mb4");
} catch(Exception $e) {
  error_log($e->getMessage());
  exit('Error connecting to database'); //Should be a message a typical user could understand
}

$stmt = $mysqli->prepare("delete from detalhesconsuta where iddetalhe=? ");
$stmt->bind_param("s",$_POST['val_id']);
$stmt->execute();
$stmt->close();

header('location:lista_medicamentos.php')
?>
