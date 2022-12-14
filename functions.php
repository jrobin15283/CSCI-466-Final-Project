<?php
$dsn = "mysql:host=courses;dbname=z1934222";
$pdo = new PDO($dsn, $username, $password);

// display products in inventory
function draw_product_table($rows) {
  echo "<table border=1 cellspacing=1>";
  echo "<tr>";

  foreach($rows[0] as $key => $item) {
    echo "<th>$key</th>";
  }

  foreach($rows as $row) {
    echo "<tr>";
    foreach($row as $item) {
      echo "<td>$item</td>";
    }
    $id = $row['ITEM_ID'];
    $qty = $row['ITEM_QTY'];
      
    echo "<td><form action='select_item_page.php' method='post'>";
    echo "<input type='submit' name='".$id."' value='Select This Item'>";
    echo "</form></td>";
  
    echo "<td>Qty: <input type='number' min='1' max='".$qty."'value='1'></td>";
    echo "<td><button id='".$id."'>Add To Cart</button></td>";
    echo "</tr>";
  }
}

// display orders
function draw_order_table($rows) {
    echo "<table border=1 cellspacing=1>";
    echo "<tr>";
  
    foreach($rows[0] as $key => $item) {
      echo "<th>$key</th>";
    }

    foreach($rows as $row) {
      echo "<tr>";
      foreach($row as $item) {
        echo "<td>$item</td>";
      }
      $tracking = $row['TRACKING_NUM'];
      
      echo "<td><form action='fulfill_order.php' method='post'>";
      echo "<input type='submit' name='".$tracking."' value='Fulfill Order'>";
      echo "</form></td>";

      echo "<td><form action='order_details.php' method='post'>";
      echo "<input type='submit' name='".$tracking."' value='Order Details'>";
      echo "</form></td>";
      
      echo "</tr>";
    }

    
}

// generic table display
function draw_table($rows) {
    echo "<table border=1 cellspacing=1>";
    echo "<tr>";

    foreach($rows[0] as $key => $item) {
        echo "<th>$key</th>";
    }

    foreach($rows as $row) {
        echo "<tr>";
        foreach($row as $item) {
        echo "<td>$item</td>";
        }
    }
}

// display item from inventory
function draw_item($rows) {
    echo "<table border=1 cellspacing=1>";
    echo "<tr>";
  
    foreach($rows[0] as $key => $item) {
      echo "<th>$key</th>";
    }

    foreach($rows as $row) {
      echo "<tr>";
      foreach($row as $item) {
        echo "<td>$item</td>";
      }
      $id = $row['ITEM_ID'];
      $qty = $row['ITEM_QTY'];
    
      echo "<td>Qty: <input type='number' min='1' max='".$qty."'value='1'></td>";
      echo "<td><button id='".$id."'>Add To Cart</button></td>";
      echo "</tr>";
    }
}
?>
