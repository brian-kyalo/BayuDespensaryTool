<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bayu Dispensary | Complete Appointments</title>
    <style>
        /* Your existing CSS styles here */
        /* Add any additional styles if needed */
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  }
  
  body {
    min-height: 100vh;
    background-image: url(../images/background.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  .tbl_header {
    text-align: center;
    width: 100%;
    height: 15%;
    background-color: #fff6;
    padding: 0.8rem 1rem;
  }
  
  .tbl_body {
    width: 95%;
    max-height: calc(90% - 1rem);
    background-color: #fffb;
    margin: 1rem auto;
    border-radius: 0.6rem;
    overflow: auto;
  }
  
  .tbl_body::-webkit-scrollbar {
    width: 0.5rem;
    height: 0.5rem;
  }
  
  .tbl_body::-webkit-scrollbar-thumb {
    border-radius: 0.5rem;
    background-color: #0004;
  }
  
  .tbl_body:hover::-webkit-scrollbar-thumb {
    visibility: visible;
  }
  
  td img {
    width: 36px;
    height: 36px;
    margin-right: 0.5rem;
    border-radius: 50%;
    vertical-align: middle;
  }
  
  main.table {
    width: 70vw;
    height: 90vh;
    background-color: #fff5;
    backdrop-filter: blur(5px);
    box-shadow: 0 0.4rem 0.8rem rgba(0, 0, 0, 0.5);
    border-radius: 0.8rem;
    overflow: hidden;
  }
  
  table,
  th,
  td {
    text-align: left;
    border-collapse: collapse;
    padding: 1rem;
  }
  
  thead th {
    position: sticky;
    top: 0;
    left: 0;
    background-color: #d5d1de;
  }
  
  tbody tr:hover {
    background-color: #fff8;
  }
  
  @media (max-width: 1000px) {
    td:not(:first-of-type) {
      min-width: 12.1rem;
    }
  }
  
  .inline {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
  }
  
  input,
  button {
    height: 34px;
  }
  
    </style>
</head>

<body>
    <?php
    // Connecting to the database
    require_once "connection.php";

    $per_page_record = 3;

    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }

    $start_from = ($page - 1) * $per_page_record;

    $query = "SELECT * FROM appointments LIMIT $start_from, $per_page_record";
    $result = mysqli_query($conn, $query);
    ?>
    <main class="table">
        <section class="tbl_header">
            <h1>Bayu Dispensary | Complete Appointments</h1>
            <p>The table displays Completed Patient Appointments</p>
        </section>
        <section class="tbl_body">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Profile</th>
                        <th>DoctorId</th>
                        <th>Profile</th>
                        <th>PatientId</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Function</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row["appointmentId"]; ?></td>
                            <td><img src="../images/name.jpg" alt=""></td>
                            <td><?php echo $row["doctorId"]; ?></td>
                            <td><img src="../images/name.jpg" alt=""></td>
                            <td><?php echo $row["patientId"]; ?></td>
                            <td><?php echo $row["appointmentDate"]; ?></td>
                            <td><?php echo $row["description"]; ?></td>
                            <td>
                                <a href="DocUpdate.php?id=<?php echo $row["doctorId"]; ?>">Update</a>
                                <a href="deletedoc.php?id=<?php echo $row["doctorId"]; ?>">Delete</a>
                                <ion-icon name="calendar-outline" class="conclude-appointment" data-doctor-id="<?php echo $row["doctorId"]; ?>"></ion-icon>
                            </td>
                        </tr>
                    <?php
                    };
                    ?>
                </tbody>
            </table>
            <div class="pagination">
                <?php
                // Counting the number of records in the database.
                $query = "SELECT COUNT(*) FROM appointments";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_row($result);
                $total_records = $row[0];

                // Number of pages required to hold the number of records.
                $total_pages = ceil($total_records / $per_page_record);
                $pagLink = "";

                if ($page >= 2) {
                    echo "<a href='appointment.php?page=" . ($page - 1) . "'>&lt;&lt; Prev</a>";
                }

                for ($i = 1; $i <= $total_pages; $i++) {
                    if ($i == $page) {
                        $pagLink .= "<a class='active' href='appointment.php?page=" . $i . "'>" . $i . "</a>";
                    } else {
                        $pagLink .= "<a href='appointment.php?page=" . $i . "'>" . $i . "</a>";
                    }
                }
                echo $pagLink;

                if ($page < $total_pages) {
                    echo "<a href='appointment.php?page=" . ($page + 1) . "'>Next &gt;&gt;</a>";
                }
                ?>
            </div>

            <div class="inline">
                <input id="page" type="number" min="1" max="<?php echo $total_pages ?>" placeholder="<?php echo $page . "/" . $total_pages; ?>" required>
                <button onclick="go2Page()">Go</button>
            </div>
        </section>
    </main>
    <div class="appointmentForm" id="appointment-modal" style="display: none;">
        <h2>Complete Appointment</h2>
        <form class="form" id="appointment-form" action="done.php" method="POST">

        <input type="hidden" name="appointmentId" id="completedappointmetId">

        <div class="input-box">

        <label for="doctorId">Doctor ID:</label>
        <input type="text" name="doctorId" id="doctorId" required>

        </div>

        <div class="input-box">

        <label for="patientId">Patient ID:</label>
        <input type="text" name="patientId" id="patientId" required>
        
        </div>
        <div class="input-box">

        <label for="completedDate">Completed Date:</label>
        <input type="date" name="completedDate" id="completedDate" required>

        </div>

        <div class="input-box">

        <label for="completedTime">Completed Time:</label>
        <input type="time" name="completedTime" id="completedTime" required>

        </div>  

        <div class="input-box">
            
        <label for="prescription">Prescription:</label>
        <textarea name="prescription" id="prescription" rows="4" required></textarea>
    
        </div>

        <button type="submit">Book</button>
        </form>
    </div>
    <script>
        const bookAppointmentIcons = document.getElementsByClassName('conclude-appointment');
        const appointmentModal = document.getElementById('appointment-modal');
        const appointmentForm = document.getElementById('appointment-form');
        const doctorIdField = document.getElementById('completedappointmetId');

        Array.from(bookAppointmentIcons).forEach(icon => {
            icon.addEventListener('click', function () {
                const doctorId = this.getAttribute('data-completedappointmetId');
                doctorIdField.value = doctorId;
                appointmentModal.style.display = 'block';
            });
        });

        appointmentForm.addEventListener('submit', function (e) {
            e.preventDefault();

            // Perform form validation if required

            // Submit the form using AJAX
            const formData = new FormData(this);
            fetch(this.action, {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    console.log('Success:', data);
                    // Handle success response if needed
                    appointmentModal.style.display = 'none';
                    appointmentForm.reset();
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Handle error if needed
                });
        });
    </script>
    <script src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
