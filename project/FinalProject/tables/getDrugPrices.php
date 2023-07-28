<?php
// Assuming you already have a database connection established.
require_once "connection.php";

// Query the inventory table to get the drug names with their price range
$query = "SELECT drug_name, MIN(price) AS minPrice, MAX(price) AS maxPrice FROM inventory GROUP BY drug_name";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $drugs = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $drugs[] = [
            'drugName' => $row['drug_name'],
            'minPrice' => $row['minPrice'],
            'maxPrice' => $row['maxPrice']
        ];
    }

    // Send the drug data as JSON response
    header('Content-Type: application/json');
    echo json_encode($drugs);
} else {
    // No drugs found in the inventory
    // Send an error JSON response
    header('Content-Type: application/json');
    echo json_encode(['error' => 'No drugs found in the inventory.']);
}
?>
