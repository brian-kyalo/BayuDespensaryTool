<?php
// Connecting to our database.
require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $doctorId = $_POST["doctorId"];
    $patientId = $_POST["patientId"];
    $appointmentDate = $_POST["appointmentDate"];
    $description = $_POST['description'];

    // Perform necessary validations and database operations to book the appointment
    // Insert the appointment data into the database
    $query = "INSERT INTO appointments (doctorId, patientId, appointmentDate,description) VALUES ('$doctorId', '$patientId', '$appointmentDate','$description')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Appointment booked successfully
        $response = [
            'success' => true,
            'message' => 'Appointment booked successfully.'
        ];
    } else {
        // Error occurred while booking the appointment
        $response = [
            'success' => false,
            'message' => 'Error occurred while booking the appointment.'
        ];
    }

    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
