<?php
// Display author list
include_once $_SERVER['DOCUMENT_ROOT'] .
'/work/ebook/includes/magicquotes.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/work/ebook/includes/access.inc.php';
if (!userIsLoggedIn())
{
include '../login.html.php';
exit();
}
if (!userHasRole('Account Administrator'))
{
$error = 'Only Account Administrators may access this page.';
include '../accessdenied.html.php';
exit();
}


if (isset($_POST['action']) and $_POST['action'] == 'Delete')
{
include $_SERVER['DOCUMENT_ROOT'] . '/work/ebook/includes/db.inc.php'; 
// Get jokes belonging to author
try
{
$sql = 'SELECT id FROM joke WHERE authorid = :id';
$s = $pdo->prepare($sql);
$s->bindValue(':id', $_POST['id']);
$s->execute();
}
catch (PDOException $e)
{
$error = 'Error getting list of jokes to delete.';
include 'error.html.php';
exit();
}
$result = $s->fetchAll();
// Delete joke category entries
try
{
$sql = 'DELETE FROM jokecategory WHERE jokeid = :id';
$s = $pdo->prepare($sql);
// For each joke
foreach ($result as $row)
{
$jokeId = $row['id'];
$s->bindValue(':id', $jokeId);
$s->execute();
}
}
catch (PDOException $e)
{
$error = 'Error deleting category entries for joke.';
include 'error.html.php';
exit();
}
// Delete jokes belonging to author
try
{
$sql = 'DELETE FROM joke WHERE authorid = :id';
$s = $pdo->prepare($sql);
$s->bindValue(':id', $_POST['id']);
$s->execute();
}
catch (PDOException $e)
{
$error = 'Error deleting jokes for author.';
include 'error.html.php';
exit();
}
try
{
$sql = 'DELETE FROM author WHERE id = :id';
$s = $pdo->prepare($sql);
$s->bindValue(':id', $_POST['id']);
$s->execute();
}
catch (PDOException $e)
{
$error = 'Error deleting author.';
include 'error.html.php';
exit();
}
header('Location: .');
exit();
}
include 'authors.html.php';
?>