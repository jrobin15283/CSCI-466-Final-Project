<?php

include("passwords.php");
include("functions.php");


echo "<form action='main_page.php'>";
echo "<input type='submit' value='Home'/>";
echo "</form><br>";

echo "<h1>Cart</h1><br>";

$dsn = "mysql:host=courses;dbname=z1934222";
$pdo = new PDO($dsn, $username, $password);

$rs = $pdo->query("SELECT * FROM Cart;");
$rows = $rs->fetchAll(PDO::FETCH_ASSOC);
draw_table($rows);

$dsn = "mysql:host=courses;dbname=z1934222";
$pdo = new PDO($dsn, $username, $password);

?>
