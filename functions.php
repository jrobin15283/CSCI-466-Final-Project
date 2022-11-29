<?php
$dsn = "mysql:host=courses;dbname=z1934222";
$pdo = new PDO($dsn, $username, $password);

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

    echo "<td><button>Select This Item</button></td>";
    echo "<td>Qty: <input type='number' min='1' max='".$qty."'value='1'></td>";
    echo "<td><button id='".$id."'>Add To Cart</button></td>";
    echo "</tr>";
  }
}

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
      
      echo "<td><form method='post'>";
      echo "<button name='".$tracking."'>Fulfill Order</button>";
      echo "</form></td>";

      #echo "<td><form action='order_details_page' method='post'>";
      #echo "<button name='".$tracking."'>Order Details</button>";
      #echo "</form></td>";

      echo "</tr>";

      echo $_POST[$tracking];
    }

    
}

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
?>