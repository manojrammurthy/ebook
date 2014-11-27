<!DOCTYPE html>
<?php echo $_SERVER['DOCUMENT_ROOT'] . '/work/ebook/includes/db.inc.php'; 


include_once $_SERVER['DOCUMENT_ROOT'] .
'/work/ebook/includes/magicquotes.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/work/ebook/includes/access.inc.php';
if (!userIsLoggedIn())
{
include 'login.html.php';
exit();
}
if (!userHasRole('Content Editor'))
{
$error = 'Only Content Editors may access this page.';
include '../accessdenied.html.php';
exit();
}
?>



<html lang="en">
<head>
<meta charset="utf-8">
<title>Joke CMS</title>
</head>
<body>
<h1>Joke Management System</h1>
<ul>
<li><a href="jokes/">Manage Jokes</a></li>
<li><a href="authors/">Manage Authors</a></li>
<li><a href="categories/">Manage Joke Categories</a></li>
</ul>
</body>
</html>
