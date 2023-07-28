<?php
if($_SERVER["REQUEST_METHOD"] == "POST" ){
    $password = $_POST['password'];
    $email = $_POST['email'];
   

    $dbBayu =  new mysqli('localhost','root','','bayu');
    $query = "SELECT * FROM patient WHERE email = '$email' ";
    $result = $dbBayu -> query($query);
    $dbBayu -> close();
    $user = $result -> fetch_assoc();
   
    if($password == $user['password']){
        session_start();

        $_SESSION["patientId"] = $user["patientId"];
        $_SESSION["name"] = $user["name"];
        $_SESSION["email"] =  $user["email"];
        $_SESSION["password"] =  $user["password"];

        header('Location:home.php');
        exit;
    }
   
}




$content = <<<_END
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../finalStyle/loginPatient.css">`
        <title>Login Patient | Bayu Dispensary</title>
        <style> 
        .logo {
            display: inline-block;
            width: 30px;
            height: 35px;
            background-image: url('../images/bayulogo.png');
            background-size: cover;
            margin-right: 10px;
        }

        </style>
    </head>
    <body>
        <section>
            <div class="form-box">
                <div class="form">
                    <form action="" method = "post" >
                        <h2>Patient</h2>
                        <div class="input-box">
                            <ion-icon name="mail-outline"></ion-icon>
                            <input type="text" name = "email" placeholder = "3022" autocomplete = "new-password" readonly onclick="this.removeAttribute('readOnly')"; required>
                            <label for="">Email</label>
                        </div>
                        <div class="input-box">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                            <input type="password" name = "password"  autocomplete = "off" readonly onclick="this.removeAttribute('readOnly')"; required>
                            <label for="">Password</label>
                        </div>
                        <div>
                            <button type = "submit">Login</button>
                        </div>
                        <div class="register">
                            <p>Don't you have an account <a href="register_patient.php" >Sign up</a> </p>
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
