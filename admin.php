<?php
$con = new mysqli("localhost", "root", "", "auth_db");
if ($con->connect_error) {
  die('Connection failed: ' . $con->connect_error);
}

// Fetch data from the customer table
$query = "SELECT * FROM customer";
$result = $con->query($query);

// Initialize variables for customer data and totals
$customer1Quantity = 0;
$customer1Weight = 0;
$customer1BoxCount = 0;
$customer2Quantity = 0;
$customer2Weight = 0;
$customer2BoxCount = 0;

// Process the result and calculate totals
while ($row = $result->fetch_assoc()) {
  $quantity = $row['quantity'];
  $weight = $row['weight'];
  $boxCount = $row['box_count'];

  // Calculate totals for individual customers
  if ($row['id'] == 1) {
    $customer1Quantity += $quantity;
    $customer1Weight += $weight;
    $customer1BoxCount += $boxCount;
  } elseif ($row['id'] == 2) {
    $customer2Quantity += $quantity;
    $customer2Weight += $weight;
    $customer2BoxCount += $boxCount;
  }
}

// Calculate total quantity, weight, and box count
$totalQuantity = $customer1Quantity + $customer2Quantity;
$totalWeight = $customer1Weight + $customer2Weight;
$totalBoxCount = $customer1BoxCount + $customer2BoxCount;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="table-container">
<table>
  <tr>
    <th>Items</th>
    <th>Customer 1</th>
    <th>Customer 2</th>
    <th>Total</th>
  </tr>
  <tr>
    <td>Quantity</td>
    <td><?php echo $customer1Quantity; ?></td>
    <td><?php echo $customer2Quantity; ?></td>
    <td><?php echo $totalQuantity; ?></td>
  </tr>
  <tr>
    <td>Weight</td>
    <td><?php echo $customer1Weight; ?></td>
    <td><?php echo $customer2Weight; ?></td>
    <td><?php echo $totalWeight; ?></td>
  </tr>
  <tr>
    <td>Box Count</td>
    <td><?php echo $customer1BoxCount; ?></td>
    <td><?php echo $customer2BoxCount; ?></td>
    <td><?php echo $totalBoxCount; ?></td>
  </tr>
</table>
</div>
</body>
</html>
<?php
$con->close();
?>