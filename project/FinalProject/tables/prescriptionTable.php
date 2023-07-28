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
    width: 98%;
    max-height: calc(90% - 2rem);
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
    width: 80vw;
    height: 95vh;
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
    padding: .8rem;
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

    $per_page_record = 2;

    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }

    $start_from = ($page - 1) * $per_page_record;

    $query = "SELECT * FROM completedappointments LIMIT $start_from, $per_page_record";
    $result = mysqli_query($conn, $query);
    ?>
    <main class="table">
        <section class="tbl_header">
            <h1>Bayu Dispensary | Concluded Appointments</h1>
            <p>The table displays fulfiled Patient Appointments</p>
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
                        <th>Time</th>
                        <th>Prescription</th>
                        <th class="func">Function</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row["completedappointmetId"]; ?></td>
                            <td><img src="../images/name.jpg" alt=""></td>
                            <td><?php echo $row["doctorId"]; ?></td>
                            <td><img src="../images/name.jpg"></td>
                            <td><?php echo $row["patientId"]; ?></td>
                            <td><?php echo $row["completedDate"]; ?></td>
                            <td><?php echo $row["completedTime"]; ?></td>
                            <td><?php echo $row["prescription"]; ?></td>
                            <td>
                               
                            <ion-icon name="bookmarks-sharp" class="book-appointment" data-doctor-id="<?php echo $row["doctorId"]; ?>"></ion-icon>
                            </td>
                        </tr>
                    <?php
                    };
                    ?>
                </tbody>
            </table>
            <div class="pagination" style="margin-left: 300px;">
                <?php
                // Counting the number of records in the database.
                $query = "SELECT COUNT(*) FROM completedappointments";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_row($result);
                $total_records = $row[0];

                // Number of pages required to hold the number of records.
                $total_pages = ceil($total_records / $per_page_record);
                $pagLink = "";

                if ($page >= 2) {
                    echo "<a href='prescriptionTable.php?page=" . ($page - 1) . "'>&lt;&lt; Prev</a>";
                }

                for ($i = 1; $i <= $total_pages; $i++) {
                    if ($i == $page) {
                        $pagLink .= "<a class='active' href='prescriptionTable.php?page=" . $i . "'>" . $i . "</a>";
                    } else {
                        $pagLink .= "<a href='prescriptionTable.php?page=" . $i . "'>" . $i . "</a>";
                    }
                }
                echo $pagLink;

                if ($page < $total_pages) {
                    echo "<a href='prescriptionTable.php?page=" . ($page + 1) . "'>Next &gt;&gt;</a>";
                }
                ?>
            </div>
        </section>
    </main>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription Form</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription Form</title>
</head>
<body>
   
    <div class="appointmentForm" id="appointment-modal" style="display: none;
    ">
        <h2>Book Appointment</h2>
        <form id="prescription-form" action="insertDataToDose.php" method="POST">
        <input type="hidden" id="drugId" name="drugId">


        <div clas="input-box">

        <label for="patientId">Patient ID:</label>
        <input type="text" id="patientId" name="patientId" required>

        </div>
        
        <div clas="input-box">
          <label for="doctorId">Doctor ID:</label>
        <input type="text" id="doctorId" name="doctorId" required>
        </div>
      
      <div clas="input-box">
          
        <label for="drugName">Select Drug:</label>
        <select id="drugName" name="drugName" required>
            <option value="">Select a drug</option>
            <!-- Drug options will be populated dynamically using JavaScript -->
        </select>
      

      </div>

        <div clas="input-box">
        <label for="quantity">Quantity (grams):</label>
        <input type="number" id="quantity" name="quantity" min="1" step="1" required>
        </div>

       <div clas="input-box">
       <label for="price">Price per gram (KES):</label>
        <input type="number" id="price" name="price" step="0.01" required >

       </div>

        <div clas="input-box">
        <label for="totalPrice">Total Price (KES):</label>
        <input type="number" id="totalPrice" name="totalPrice" step="0.01" required>


        </div>

        <button type="submit">Prescribe</button>
       
        </form>
    </div>

    



  
    

















    <script>
        const bookAppointmentIcons = document.getElementsByClassName('book-appointment');
        const appointmentModal = document.getElementById('appointment-modal');
        const appointmentForm = document.getElementById('prescription-form');
        const doctorIdField = document.getElementById('doctorId');

        Array.from(bookAppointmentIcons).forEach(icon => {
            icon.addEventListener('click', function () {
                const doctorId = this.getAttribute('data-doctor-id');
                doctorIdField.value = doctorId;
                appointmentModal.style.display = 'block';
            });
        });

       
    </script>
    <script>
     document.getElementById('prescription-form').addEventListener('submit', function(e) {
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
            window.location.href = 'p.php';
        })
        .catch(error => {
            console.error('Error:', error);
            // Handle error if needed
        });
});

// Function to calculate total price
function calculateTotalPrice() {
    const quantity = parseFloat(document.getElementById('quantity').value);
    const price = parseFloat(document.getElementById('price').value);
    const totalPrice = (isNaN(quantity) || isNaN(price)) ? 0 : (quantity * price);
    document.getElementById('totalPrice').value = totalPrice.toFixed(2);
}

// Call the calculateTotalPrice function whenever quantity or price changes
document.getElementById('quantity').addEventListener('input', calculateTotalPrice);
document.getElementById('price').addEventListener('input', calculateTotalPrice);

// Fetch all drugs with their price range from the inventory table
fetch('getDrugPrices.php')
    .then(response => response.json())
    .then(data => {
        const drugNameSelect = document.getElementById('drugName');
        data.forEach(drug => {
            const option = document.createElement('option');
            option.value = drug.drugName;
            option.textContent = `${drug.drugName} (KES ${drug.minPrice} - KES ${drug.maxPrice})`;
            drugNameSelect.appendChild(option);
        });
    })
    .catch(error => {
        console.error('Error:', error);
        // Handle error if needed
    });

    </script>
    <script>
      
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>

