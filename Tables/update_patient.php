<?php
// Import the file where we defined the connection to Database.
require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patientId = $_POST["patientId"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "UPDATE patient SET name='$name', email='$email', password='$password' WHERE patientId='$patientId'";
    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully!";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

if (isset($_GET["id"])) {
    $patientId = $_GET["id"];

    $query = "SELECT * FROM patient WHERE patientId='$patientId'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $name = $row["name"];
    $email = $row["email"];
    $password = $row["password"];
?>

    <html>
    <head>
        <title>Update Patient</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            body{
                margin: 0;
                padding: 0;
                background-image: url(../images/background.jpg);
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
            }
            .container{
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                width: 100%;
            }
            button{
                width: 100px;
                height: 40px;
                margin-left: 100px;
                border-radius: 40px;
                background: #fff;
                border: none;
                outline: none;
                cursor: pointer;
                font-size: 1.5em;
                font-weight: 600;
            }
            .button :hover{
                background-color: rgb(6, 155, 220);
                color: #fff;

            }
            .form1{
                position: relative;
                width: 380px;
                height: 400px;
                background:transparent;
                margin-left: 60px;
                border: 2px solid rgba(255, 255, 255, 0.5);
                border-radius: 20px;
                backdrop-filter: blur(15px);
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .form-box{
                position: relative;
                 margin: 30px 0;
                 width: 310px;
                 border-bottom: 2px solid #fff;
            }
           
        </style>
    </head>
    <body>
        <div class="container">
            <div class="form1">
            <br>
            <h1 style="text-decoration: underline;  position: absolute; color: black; margin-bottom:350px;">Update Patient Info</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="patientId" value="<?php echo $patientId; ?>">

                <div class="form-box">
                    <label style="color: black; margin-top: 10px;" for="name">Name:</label>
                    <input style="color: black;" type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
                </div>
                <div class="form-box">
                    <label style="color: black;" for="email">Email:</label>
                    <input style="color: black;" type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="form-box">
                    <label style="color: black;" for="password">Password:</label>
                    <input style="color: black;" type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            </div>
        </div>
    </body>
    </html>

<?php
}
mysqli_close($conn);
?>
