<?php
session_start();

include("passwords.php");
include("functions.php");

$dsn = "mysql:host=courses;dbname=z1934222";
$pdo = new PDO($dsn, $username, $password);

// display inventory
$rs = $pdo->query("SELECT * FROM Inventory WHERE ITEM_QTY > 0;");
$rows = $rs->fetchAll(PDO::FETCH_ASSOC);
draw_product_table($rows);

// buttons to navigate to other pages
echo "<form action='track_orders_page.php'>";
echo "<input type='submit' value='Track My Orders'/>";
echo "</form>";

echo "<form action='order_info_page.php'>";
echo "<input type='submit' value='Outstanding Orders'/>";
echo "</form>";

echo "<form action='cart_page.php'>";
echo "<input type='submit' value='View Cart'/>";
echo "</form>";

echo "<form action='checkout_page.php'>";
echo "<input type='submit' value='Checkout Now'/>";
echo "</form>";

echo "</table>";
?>
