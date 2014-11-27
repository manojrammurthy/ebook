<?php
try {
$pdo = new PDO('localhost','ijdb','root','123');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec('SET NAMES "utf8"');
}

catch (PDOexception $e){
	$error = 'Unable to connect to the database server.';
include 'error.html.php';
exit();

}
?>