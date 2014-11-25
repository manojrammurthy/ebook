<?php
try {
	$pdo = new PDO('mysql:host=localhost;dbname=ijdb', 'root',
'123');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = 'UPDATE joke SET jokedate="2012-04-01"
WHERE joketext LIKE "%chicken%"';
$affectedRows = $pdo->exec($sql);

}
catch (PDOexception $e){
	$output = 'Error performing update: ' . $e->getMessage();
include 'output.html.php';
exit();
}
$output = "Updated $affectedRows rows.";
include 'output.html.php';

?>