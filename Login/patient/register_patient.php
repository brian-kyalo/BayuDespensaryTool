<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
 //Retriving the values submitted through the form.
 $name = $_POST['name'];
 $email = $_POST['email'];
 $password = $_POST['password'];

 //establishing my database connection.
$dbbayu = new mysqli('localhost', 'root','','bayu');
$query = "INSERT INTO patient (name,email,password) VALUES(?,?,?)";
$statment = $dbbayu -> prepare($query);
$statment -> bind_param('sss' ,$name,$email,$password);
$statment -> execute();
$statment ->close();
$dbbayu -> close();

header('Location: login_patient.php');
exit;
}

$content = <<<_END
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../../forms/P.css">`
        <title>SignUp Patient| Bayu Dispensary</title>
    </head>
    <body>
        <section>
            <div class="patient-box">
                <div class="form">
                    <form action="" method = "post" >
                        <h2>Bayu Dispensary</h2>
                        <div class="input-box">
                            <ion-icon  name="person-outline"></ion-icon>
                            <input type="text" name = "name"
                            autocomplete = "off" readonly onclick="this.removeAttribute('readOnly')"; required>
                            <label for="">Name</label>
                        </div>
                        <div class="input-box"> 
                            <ion-icon name="mail-outline"></ion-icon>
                            <input type="email" name = "email" 
                            autocomplete = "off" readonly onclick="this.removeAttribute('readOnly')"; required>
                            <label for="">Email</label>
                        </div>
                        <div class="input-box">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                            <input type="password" name = "password"
                             autocomplete = "off" readonly onclick="this.removeAttribute('readOnly')"; required>
                            <label for="">Password</label>
                        </div>
                        <div>
                            <button type = "submit">SignUp</button>
                        </div>
                        <div class="register">
                            <p>If you have an account <a href="login_patient.php" >Sign in</a> </p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
_END;
echo $content;
?>