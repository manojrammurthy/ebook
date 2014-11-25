<?php
try {
	$pdo = new PDO('mysql:host=localhost;dbname=ijdb', 'root',
'123');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = 'CREATE TABLE joke (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
joketext TEXT,
jokedate DATE NOT NULL
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB';
$pdo->exec($sql);

}
catch (PDOexception $e){
	$output = 'Error creating joke table: ' . $e->getMessage();
//include 'output.html.php';
exit();
}

$output = 'Joke table successfully created.';
//include 'output.html.php';

?>