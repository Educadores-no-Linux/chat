<?php
include("bd_conect.php");
$sql = $pdo->query("SELECT * FROM cha1");
foreach ($sql->fetchAll() as $key) {
	echo "<div class='shadow-sm bg-light ml-4 rounded m-auto' width='80%'>";
	echo "<h5>".$key['nome']."</h5>";
	echo "<p>".$key['mensagem']."</p>";
	echo "</div>";
}



?>