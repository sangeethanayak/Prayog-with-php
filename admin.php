<?php
    $con = new mysqli("localhost", "root", "", "auth_db");
    if ($con->connect_error) {
        die('Connection failed: '. $con->connect_error);
    }
    $query = "SELECT * FROM customer";
    $result = $con->query($query);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Items</th><th>Customer 1</th><th>Customer 2</th><th>Total</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['items'] . "</td>";
            echo "<td>" . sumQuantity($row['customer1_quantity']) . "</td>";
            echo "<td>" . sumQuantity($row['customer2_quantity']) . "</td>";
            echo "<td>" . sumQuantity($row['customer1_quantity'] + $row['customer2_quantity']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
     else {
        echo "No data found.";
    }
    $con->close();
} else {
    echo "You do not have access to view this data.";
}

function sumQuantity($quantity) {
    return $quantity; // Replace with your calculation logic
}
?>