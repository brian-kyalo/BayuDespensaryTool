<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['doctor_submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $serviceNo = $_POST['serviceNo'];
        $name = $_POST['name'];

        $dbBayu = new mysqli('localhost', 'root', '', 'bayu');
        $query = "INSERT INTO doctor (name, serviceNo, email, password) VALUES (?, ?, ?, ?)";
        $statement = $dbBayu->prepare($query);
        $statement->bind_param('siss', $name, $serviceNo, $email, $password);
        $statement->execute();
        $statement->close();
        $dbBayu->close();

        header('Location: loginDoc.php');

        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <title>SignUp | Bayu Dispensary</title>
        <link rel="stylesheet" href="../finalStyle/register.css">
        <link rel="stylesheet" href="../finalStyle/signup.css" />
        <style>
                        .doctors-box {
                        position: relative;
                        width: 380px;
                        height: 498px;
                        background:transparent;
                        margin-left: 320px;
                        margin-top: 25px;
                        border: 2px solid rgba(255, 255, 255, 0.895);
                        border-radius: 20px;
                        backdrop-filter: blur(15px);
                        display: flex;
                        justify-content: center;
                        align-items: center;

                    }

                    .patient-box {
                    position: relative;
                    width: 380px;
                    height: 480px;
                    background:transparent;
                    margin-left: 320px;
                    margin-top: 60px;
                    border: 2px solid rgba(255, 255, 255, 0.895);
                    border-radius: 20px;
                    backdrop-filter: blur(15px);
                    display: flex;
                    justify-content: center;
                    align-items: center;

                    }

                    h2{
                    margin-top: 12px;
                    font-size: 2em;
                    font-family: Arial, Helvetica, sans-serif;
                    font-style: normal;
                    text-decoration: underline;
                    font-weight: 50;
                    color: black;
                    text-align: center;
                    text-decoration: wavy;
                }

                .input-box{
                    position: relative;
                    
                    margin: 30px 0;
                    width: 310px;
                    border-bottom: 2px solid #fff;
                }

                .input-box label {
                    position: absolute;
                    top: 50%;
                    left: 5px;
                    transform: translateY(-50%);
                    color: #fff;
                    font-size: 1em;
                    pointer-events: none;
                    transition: .5s;
                }

                input:focus ~ label,
                input:valid ~ label{
                 top: -5px;
                }

                .input-box input {
                    width: 100%;
                    height: 50px;
                    background: transparent;
                    border: none;
                    outline: none;
                    font-size: 1em;
                    padding: 0 35px 0 5px;
                    color: #fff;
                }

                .input-box ion-icon {
                    position: absolute;
                    right: 8px;
                    color: #fff;
                    font-size: 1.2em;
                    top: 20px;
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
                    font-size: 1em;
                    font-weight: 600;
                    text-transform: capitalize;
                    transition-duration: 0.5s;
                    
                }

                button :hover{
                    background-color: rgb(6, 155, 220);
                    color: #fff;
                }

                .register{
                    margin-bottom:80px;
                    align-items: center;
                    font-size: .9em;
                    color: #fff;
                    text-align: center;
                    margin: 25px 0 10px;
                }
                .register p a{
                    margin-bottom: 80px;
                    text-decoration: none;
                    color: #fff;
                    font-weight: 600;
                }

                .register p a:hover{
                    text-decoration: underline;
                    color: rgb(3, 3, 61);
                }

                .footer {
                    background-color: rgb(0, 0, 0);
                    background-size: cover;
                    background-position: center;
                    background-attachment: fixed;
                }

                .footer .container {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(25rem, 1fr));
                    gap: 2.5rem;
                    
                    
                }

                .footer .container .box h3{
                    text-decoration: underline;
                    color: white;
                    font-size: 2.2rem;
                    padding-bottom: 2rem;
                }

                .footer .container .box a{
                    margin-bottom: 5pxpx;
                    color: rgb(255, 255, 255);
                    font-size: 1.5rem;
                    padding-bottom: 1rem;
                    display: block;
                    
                }
                .footer .container .box a i{
                    color: rgb(214, 213, 213);
                    padding-right: .5rem;
                    transition: .2s linear;

                }

                .footer .container .box a:hover i{
                    padding-right: 1.5rem;
                }

                .footer .credit {
                    background-color: black;
                    text-align: center;
                    padding-top: 3rem;
                    margin-bottom: 20px;
                    border-top: .1rem soli white;
                    font-size: 2rem;
                    color: white;
                    


                }
                </style>


    </head>
    <body>
    <nav>
        <a href="home.php">
            <h1>
                <span class="bayu">Bayu </span><span class="dispensary"> Dispensary</span>
                <span class="icon"><ion-icon name="pulse-outline"></ion-icon></span>
            </h1>
        </a>
        <ul>
        <li class="nav-item">
          <a href="loginDoc.php" class="nav-link" id="nav-link">Specialist</a>
        </li>
        <li class="nav-item">
          <a href="admin.php" class="nav-link" id="nav-link">Pharmacy</a>
        </li>
        <li class="nav-item">
          <a href="loginPatient.php" class="nav-link" id="nav-link"
            >Patient</a>
        </li>
        <li class="nav-item">
          <a href="about.php" class="nav-link" id="nav-link">About</a>
        </li>
        </ul>
    
        
        <div class="menu">
        
            <span class="profile"><ion-icon name="person-circle-outline" onclick="toggleMenu()"></ion-icon></span>
            <span class="settings"><ion-icon name="ellipsis-vertical" onclick="toggleMenu()"></ion-icon></span>
        
        </div>

        <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
                <div class="user-info">
                <ion-icon name="people"></ion-icon>
                <h2><a href="admin.php">Click Me<button>Login</button></a>As Admin</h2>
            </div>
            <hr>
            <a href="#" class="sub-menu-link">
            <ion-icon name="logo-wechat"></ion-icon>
            <p>Chat with As</p>
            <span></span>
            </a>
            <a href="#" class="sub-menu-link">
            <ion-icon name="help-circle-outline"></ion-icon>
            <p>Help & support</p>
            <span></span>
            </a>
            <a href="#" class="sub-menu-link">
            <ion-icon name="information-circle-outline"></ion-icon>
            <p>About Us</p>
            <span></span>
            </a>
        </div>
    </nav>
            <div class = 'open'>
                <h1><span class="one1">Welcome Admin</span> </h1>
                <h3>What You working on today</h3>
            </div>
       

        <section>
            <div class="patient-box">
                <div class="form">
                    <form action="" method="post">
                        <h2>Bayu Dispensary</h2>
                        <div class="input-box">
                            <ion-icon name="person-outline"></ion-icon>
                            <input type="text" name="name" autocomplete="off" readonly onclick="this.removeAttribute('readOnly')"; required>
                            <label for="">Name</label>
                        </div>
                        <div class="input-box">
                            <ion-icon name="mail-outline"></ion-icon>
                            <input type="email" name="email" autocomplete="off" readonly onclick="this.removeAttribute('readOnly')"; required>
                            <label for="">Email</label>
                        </div>
                        <div class="input-box">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                            <input type="password" name="password" autocomplete="off" readonly onclick="this.removeAttribute('readOnly')"; required>
                            <label for="">Password</label>
                        </div>
                        <div>
                            <button type="submit" name="patient_submit">SignUp as Patient</button>
                        </div>
                        <div class="register">
                            <p>If you have an account <a href="login_patient.php">Sign in</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
     

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
