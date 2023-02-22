<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
  $mysqli = new mysqli("localhost", "root", "", "idosos_pap");
  $mysqli->set_charset("utf8mb4");
} catch(Exception $e) {
  error_log($e->getMessage());
  exit('Error connecting to database'); //Should be a message a typical user could understand
}



$sql="SELECT * FROM `utentes` where nome='utenome'";

$result = mysql_query($sql);

echo 
"<table border='1'>
<tr>
<th>ID</th>
<th>NOME</th>
<th>Data Nascimento</th>
<th>Acamado</th>
<th>Mobilidade</th>
</tr>";

while($row = mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['nome'] . "</td>";
echo "<td>" . $row['datanascimento'] . "</td>"
echo "<td>" . $row['datanascimento'] . "</td>"
echo "</tr>";
}
echo "</table>";
}
?>