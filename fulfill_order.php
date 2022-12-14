<?php
$tracking = key($_POST);

include("passwords.php");
include("functions.php");

$dsn = "mysql:host=courses;dbname=z1934222";
$pdo = new PDO($dsn, $username, $password);

// set order status to fulfilled
$fulfill = $pdo->prepare("UPDATE Orders SET ORDER_STATUS = 'FULFILLED' WHERE TRACKING_NUM = ?;");
$fulfill->execute(array($tracking));

$rs = $pdo->query("SELECT * FROM Orders;");
$rows = $rs->fetchAll(PDO::FETCH_ASSOC);
draw_order_table($rows);

echo "<form action='main_page.php'>";
echo "<input type='submit' value='Home'/>";
echo "</form>";
?>