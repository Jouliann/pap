<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
  $mysqli = new mysqli("localhost", "root", "", "idosos_pap");
  $mysqli->set_charset("utf8mb4");
} catch(Exception $e) {
  error_log($e->getMessage());
  exit('Error connecting to database'); //Should be a message a typical user could understand
}
$startTime = date("Y-m-d H:i:s");

$data = date('Y-m-d H:i:s',strtotime('+1 hour',strtotime($startTime)));
$stmt = $mysqli->prepare("insert into observacao(idutente,idutilizador,obs,datahora) values(?,?,?,'$data')");
$stmt->bind_param("sss", $_POST['val_id'], $_POST['idutilizador'], $_POST['obs']);
 
$result = $stmt->get_result();
$stmt->execute();
						if($stmt == true){
 echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Foi inserido com sucesso!')
window.location.href='../index_auxiliar.php';
</SCRIPT>");
} else {
  echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Não foi inserido com sucesso!')
window.location.href='../index_auxiliar.php';
</SCRIPT>");
}
                       
?>