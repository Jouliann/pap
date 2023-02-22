<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
  $mysqli = new mysqli("localhost", "root", "", "idosos_pap");
  $mysqli->set_charset("utf8mb4");
} catch(Exception $e) {
  error_log($e->getMessage());
  exit('Error connecting to database'); //Should be a message a typical user could understand
}

$stmt = $mysqli->prepare("insert into detalhesconsuta(idutente,idutilizador,dosagem,precriçao) values(?,?,?,?)");
$stmt->bind_param("ssss", $_POST['val_id'], $_POST['idutilizador'], $_POST['dosagem'], $_POST['prescricao']);
$stmt->execute();
$stmt->close();

header('location:../index_medico.php')
?>