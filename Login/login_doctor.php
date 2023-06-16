<?php
if($_SERVER["REQUEST_METHOD"] == "POST" ){
    $password = $_POST['password'];
    $serviceNo = $_POST['serviceNo'];
   

    $dbBayu =  new mysqli('localhost','root','','bayu');
    $query = "SELECT * FROM doctor WHERE serviceNo = '$serviceNo' ";
    $result = $dbBayu -> query($query);
    $dbBayu -> close();
    $user = $result -> fetch_assoc();
   
    if($password == $user['password']){
        session_start();

        $_SESSION["doctorId"] = $user["doctorId"];
        $_SESSION["name"] = $user["name"];
        $_SESSION["email"] =  $user["email"];
        $_SESSION["password"] =  $user["password"];
        $_SESSION["serviceNo"] =  $user["serviceNo"];

        header('Location: doc_profile.php');
        exit;
    }
   
}

$content = <<<_END
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="D.css">`
        <title>Login | Bayu Dispensary</title>
    </head>
    <body>
        <section>
            <div class="doctors-box">
                <div class="form">
                    <form action="" method = "post" >
                        <h2>Bayu Dispensary</h2>
                        <div class="input-box">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                            <input type="text" name = "serviceNo" placeholder = "3022" required>
                            <label for="">ServiceNo</label>
                        </div>
                        <div class="input-box">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                            <input type="password" name = "password" required>
                            <label for="">Password</label>
                        </div>
                        <div>
                            <button type = "submit">Login</button>
                        </div>
                        <div class="register">
                            <p>Don't you have an account <a href="register_doctor.php" >Sign up</a> </p>
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
