<?php
if (isset($_POST['ITEM_ID'], $_POST['ITEM_QTY']) && is_numeric($_POST['ITEM_ID']) && is_numeric($_POST['ITEM_QTY'])) {
    echo "<h2>Cart</h2><br>";

    $id = (int)$_POST['ITEM_ID'];
    $qty = (int)$_POST['ITEM_QTY'];

    $stmt = $pdo->prepare('SELECT * FROM Cart WHERE id = ?');
    $stmt->execute([$_POST['id']]);

    $item = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($item && $qty > 0) {
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($id, $_SESSION['cart'])) {
                $_SESSION['cart'][$id] += $qty;
            } else {
                $_SESSION['cart'][$id] = $qty;
            }
        } else {
            $_SESSION['cart'] = array($id => $qty);
        }
    }
    header('location: index.php?page=cart');

    echo "<form action='checkout_page.php'>";
    echo "<input type='submit' value='Checkout'/>";
    echo "</form>";
    exit;
}
?>
