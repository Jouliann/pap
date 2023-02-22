<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
  $mysqli = new mysqli("localhost", "root", "", "idosos_pap");
  $mysqli->set_charset("utf8mb4");
} catch(Exception $e) {
  error_log($e->getMessage());
  exit('Error connecting to database'); //Should be a message a typical user could understand
}

$stmt = $mysqli->prepare("update utilizador set nome=?,datanascimento=?,contacto=?,email=?,morada=?,tipo=?,cc=?,departamento=?,nomeutili=?,pass=? where idutilizador=? ");
$stmt->bind_param("sssssssssss",$_POST['val_nome'],$_POST['val_data'],$_POST['val_cont'],$_POST['val_email'],$_POST['val_morada'],$_POST['val_tipo'],$_POST['val_cc'],$_POST['val_dep'],$_POST['val_nutili'],$_POST['val_pass'], $_POST['val_id']);
$stmt->execute();
$stmt->close();

if($stmt == true){
 echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Foi alterado com sucesso!')
window.location.href='../index_chefe.php';
</SCRIPT>");
} else {
  echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Não foi alterado com sucesso!')
window.location.href='../index_chefe.php';
</SCRIPT>");
}

?>
