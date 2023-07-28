<?php
require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctorId = $_POST['doctorId'];
    $patientId = $_POST['patientId'];
    $completedDate = $_POST['completedDate'];
    $completedTime = $_POST['completedTime'];
    $prescription = $_POST['prescription'];

    // Use prepared statements to avoid SQL injection
    $query = "INSERT INTO completedAppointments (doctorId, patientId, completedDate, completedTime, prescription) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "iisss", $doctorId, $patientId, $completedDate, $completedTime, $prescription);

    $result = mysqli_stmt_execute($stmt);
    if ($result) {
        // Appointment booked successfully
        $response = [
            'success' => true,
            'message' => 'Appointment completed successfully.'
        ];

        // Redirect to a certain page after successful appointment completion
        header("Location: success_page.php");
        exit(); // Make sure to exit after redirection to prevent further execution
    } else {
        // Error occurred while booking the appointment
        $response = [
            'success' => false,
            'message' => 'Error occurred while completing the appointment.'
        ];
    }

    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
