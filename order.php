<?php
$con = new mysqli("localhost", "root", "", "auth_db");
if ($con->connect_error) {
  die('Connection failed: ' . $con->connect_error);
}

$order_date = $_POST['order_date'];
$company = $_POST['company'];
$owner = $_POST['owner'];
$item = $_POST['item'];
$quantity = $_POST['quantity'];
$weight = $_POST['weight'];
$shipment_request = $_POST['shipment_request'];
$tracking_id = $_POST['tracking_id'];
$shipment_size = $_POST['shipment_size'];
$box_count = $_POST['box_count'];
$specification = $_POST['specification'];
$checklist_quantity = $_POST['checklist_quantity'];

$stmt = $con->prepare("INSERT INTO customer (order_date, company, owner, item, quantity, weight, shipment_request, tracking_id, shipment_size, box_count, specification, checklist_quantity) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssdssssss", $order_date, $company, $owner, $item, $quantity, $weight, $shipment_request, $tracking_id, $shipment_size, $box_count, $specification, $checklist_quantity);
$stmt->execute();

$stmt->close();
$con->close();

echo "Order details submitted successfully!";
?>