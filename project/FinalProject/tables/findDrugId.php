<?php
// Assuming you already have a database connection established.
require_once "connection.php";

// Get the drug name from the request
$drugName = $_POST['drugName'];

// Query the inventory table to get the drug ID for the selected drug name
$query = "SELECT drug_id FROM inventory WHERE drug_name = '$drugName'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $drugId = $row['drug_id'];

    // Send the drug ID as JSON response
    header('Content-Type: application/json');
    echo json_encode(['drugId' => $drugId]);
} else {
    // Drug not found in the inventory
    // Send an error JSON response
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Drug not found in the inventory.']);
}
?>
