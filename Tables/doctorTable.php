<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bayu Dispensary | DoctorsTable</title>
    <style>
        /* Your existing CSS styles here */
        *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;

        }
        body{
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
        padding: .8rem 1rem;
        }
        .tbl_body{
        width: 95%;
        max-height: calc(90%-1rem);
        background-color: #fffb;
        margin: 1rem auto;
        border-radius: .6rem;
        overflow: auto;

        }

        .table__body::-webkit-scrollbar{
            width: 0.5rem;
            height: 0.5rem;
        }

        .table__body::-webkit-scrollbar-thumb{
            border-radius: .5rem;
            background-color: #0004;
            visibility: hidden;
        }

        .table__body:hover::-webkit-scrollbar-thumb{
            visibility: visible;
        }
        td img{
        width: 36px;
        height: 36px;
        margin-right: .5rem;
        border-radius: 50%;
        vertical-align: middle;
        }
        main.table{
        width: 70vw;
        height: 90vh;
        background-color: #fff5;
        backdrop-filter: blur(5px);
        box-shadow: 0 .4rem .8rem #0005;
        border-radius: .8rem;
        overflow: hidden;

        }
        table, th, td{
        text-align: left;
        border-collapse: collapse;
        padding: 1rem;
        }
        thead th{
        width: 49vw;
        position: sticky;
        top: 0;
        left: 0;
        background-color: #d5d1defe;
        }
        tbody tr:hover {
        background-color: #fff8;
        }
        @media (max-width: 1000px){
        td:not(:first-of-type){
            min-width: 12.1rem;
        }
        }    

        .inline {
            
            display: flex;
            position: center;
            float: right;
            margin: 20px 0px;
        }

        input,
        button {

            height: 34px;
        }

        .book-appointment {
            display: flex;
            margin-left: 10px;
            color: blue;
            cursor: pointer;
        }
    /* Dropdown menu styles */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        padding: 12px 16px;
        z-index: 1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Modal styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 400px;
    }

    
 .appointmentForm{
    position: relative;
    width: 250px;
    height: 300px;
    background:transparent;
    margin-left: 6px;
    border: 2px solid rgba(255, 255, 255, 0.895);
    border-radius: 20px;
    backdrop-filter: blur(15px);
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 30px;
 }

 .input-box{
    position: relative;
    margin-left: 5px;
    width: 220px;
    border-bottom: 2px solid #fff;
}
 h2{
    margin-top: 8px;
    font-size: 1.6em;
    font-family: Arial, Helvetica, sans-serif;
    font-style: normal;
    font-weight: 500;
    text-align: center;
    
}
.input-box label {
    font-size: .55rem;
    margin-top: 05px;
    position: absolute;

}
.input-box label:hover {
    font-size: .55rem;
    margin-top: 105px;
    position: absolute;

}


.input-box input {
    width: 100px;
    height: 50px;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1em;
    color: #fff;
}
.input-box textarea {
    background: transparent;
    border: none;
    outline: none;
    font-size: 1em;
    padding: ;
    color: #fff;
}
button{
    width: 100px;
    height: 30px;
    margin-left: 65px;
    margin-top: 8px;
    border-radius: 40px;
    background: #fff;
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1em;
    font-weight: 600;
    text-transform: capitalize;
    transition-duration: 0.5s;
    
}

button :hover{
    background-color: rgb(6, 155, 220);
    color: #fff;
}

 

    </style>
</head>
<body>
    <?php
    // Connecting to our database.
    require_once "connection.php";

    // Number of values displayed on one page = 4.
    $per_page_record = 3;

    // Declaring the first page to be displayed.
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        // Default page is the 1st page.
        $page = 1;
    }

    $start = ($page - 1) * $per_page_record;
    $query = "SELECT * FROM doctor LIMIT $start, $per_page_record";
    $result = mysqli_query($conn, $query);

    ?>
    <main class="table">
    <section class="tbl_header">
    <h1>Bayu Dispensary|Records</h1>
    <p>The table displays Patient Information</p>
    <div class="dropdown">
        <ion-icon name="ellipsis-vertical-outline" onclick="toggleAdminOptions()"></ion-icon>
        <div id="adminOptions" class="dropdown-content">
            <a href="update_patient.php">Update Patient</a>
            <a href="delete_patient.php">Delete Patient</a>
        </div>
    </div>
</section>


        <section class="tbl_body">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>ServiceNo</th>
                        <th>Email</th>
                        <th>Function</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row["doctorId"]; ?></td>
                            <td><img src="../images/name.jpg" alt=""></td>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["serviceNo"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>

                            <td>
                                <a href="DocUpdate.php?id=<?php echo $row["doctorId"]; ?>">Update</a>
                                <a href="deletedoc.php?id=<?php echo $row["doctorId"]; ?>">Delete</a>
                                <ion-icon name="calendar-outline" class="book-appointment" data-doctor-id="<?php echo $row["doctorId"]; ?>"></ion-icon>
                            </td>
                        </tr>
                        <?php
                    };
                    ?>
                </tbody>
            </table>
            <div class="pagination">
                <?php
                $query = "SELECT COUNT(*) FROM doctor";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_row($result);
                $total_records = $row[0];

                echo "<br>";
                // Number of pages required.
                $total_pages = ceil($total_records / $per_page_record);
                $pagLink = "";

                if ($page >= 2) {
                    echo "<a href='DoctorTable.php?page=" . ($page - 1) . "'> Prev </a>";
                }

                for ($i = 1; $i <= $total_pages; $i++) {
                    if ($i == $page) {
                        $pagLink .= "<a class='active' href='DoctorTable.php?page=" . $i . "'>" . $i . " </a>";
                    } else {
                        $pagLink .= "<a href='DoctorTable.php?page=" . $i . "'> " . $i . " </a>";
                    }
                };
                echo $pagLink;

                if ($page < $total_pages) {
                    echo "<a href='DoctorTable.php?page=" . ($page + 1) . "'> Next </a>";
                }
                ?>
            </div>
        </section>
    </main>

    <!-- Update Modal -->
<div id="updateModal" class="modal">
    <div class="modal-content">
        <!-- Update form and content here -->
        <h2>Update Patient</h2>
        <!-- Add your update form elements or content here -->
        <button onclick="closeUpdateModal()">Close</button>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <!-- Delete confirmation message and action here -->
        <h2>Delete Patient</h2>
        <!-- Add your delete confirmation message or content here -->
        <button onclick="closeDeleteModal()">Close</button>
    </div>
</div>


    <!-- Appointment booking form modal -->
    <div class="appointmentForm" id="appointment-modal" style="display: none;
    ">
        <h2>Book Appointment</h2>
        <form class="form" id="appointment-form" action="A.php" method="POST">
       
        <input type="hidden" name="doctorId" id="doctorId">
        
        <div class="input-box">
        <label for="patientId">Patient ID:</label>
            <input type="text" name="patientId" id="patientId" required>
        </div>
        <div class="input-box">
        <label for="appointmentDate">Appointment Date:</label>
            <input type="date" name="appointmentDate" id="appointmentDate" required>
        </div>
        <div class="input-box">
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>
        </div>     
        <button type="submit">Book</button>
        </form>
    </div>
    <script>
    function toggleAdminOptions() {
        var adminOptions = document.getElementById("adminOptions");
        adminOptions.style.display = (isAdmin()) ? "block" : "none";
    }

    function isAdmin() {
        // Assuming you have an authentication system to verify the admin's credentials
        // Retrieve the admin's access code and password from the database
        // Compare the provided access code and password with the stored values
        // Return true if the provided credentials match an admin record, otherwise return false

        // Example:
        var accessCode = "admin123";
        var password = "adminPassword";

        // Retrieve the entered access code and password
        var enteredAccessCode = prompt("Please enter your access code:");
        var enteredPassword = prompt("Please enter your password:");

        // Compare the entered credentials with the stored values
        if (enteredAccessCode === accessCode && enteredPassword === password) {
            return true;
        } else {
            return false;
        }
    }
</script>


    <script>
        const bookAppointmentIcons = document.getElementsByClassName('book-appointment');
        const appointmentModal = document.getElementById('appointment-modal');
        const appointmentForm = document.getElementById('appointment-form');
        const doctorIdField = document.getElementById('doctorId');

        Array.from(bookAppointmentIcons).forEach(icon => {
            icon.addEventListener('click', function () {
                const doctorId = this.getAttribute('data-doctor-id');
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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
