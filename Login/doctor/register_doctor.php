<?php
if($_SERVER["REQUEST_METHOD"] == "POST" ){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $serviceNo = $_POST['serviceNo'];
    $name = $_POST['name'];

    $dbBayu =  new mysqli('localhost','root','','bayu');
    $query = "INSERT INTO doctor (name,serviceNo,email,password) VALUES(?,?,?,?)";
    $statment = $dbBayu -> prepare($query);
    $statment -> bind_param('siss',$name,$serviceNo,$email,$password);
    $statment -> execute();
    $statment -> close();
    $dbBayu -> close();

    header('Location: login_doctor.php');
    exit;
}

$content = <<<_END
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../../forms/D.css">`
        <title>SignUp Doctor| Bayu Dispensary</title>
    </head>
    <body>
        <section>
            <div class="doctors-box">
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
                            <input type="text" name = "serviceNo" placeholder = "3022" 
                            autocomplete = "off" readonly onclick="this.removeAttribute('readOnly')"; required>
                            <label for="">ServiceNo</label>
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
                            <p>If you have an account <a href="login_doctor.php" >Sign in</a> </p>
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
