<?php


try
{
$pdo = new PDO('localhost','ijdb', 'root',
'123');
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//$pdo->exec('SET NAMES "utf8"');
echo"connection established";
}

catch(PDOException $e)
{
	$output = 'Unable to connect to the database server.';
echo "$output" 
include 'output.html.php';
//exit();

}
?>