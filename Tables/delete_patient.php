<?php
// Import the file where we defined the connection to Database.
require_once "connection.php";

if (isset($_GET["id"])) {
    $patientId = $_GET["id"];

    $query = "DELETE FROM patient WHERE patientId='$patientId'";
    if (mysqli_query($conn, $query)) {
        echo "Record deleted successfully!";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>
