<?php
session_start();

$content = <<<_END
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            body{
                height: 100vh;
                display: flex;
                justify-content: center;
                background-color: rgb(0, 0, 0);
                background-image: url(../../images/background.jpg);
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
                align-items: center;
            }
            .container{
                margin-left: 65px;
                width: 21em;
                background-color:rgb(255, 255, 255);;
                overflow: hidden;
                border-radius: 1em;
                text-align: center;
                font-family: 'Open Sans Condensed', sans-serif;
                font-weight: 300;
                font-size: 1em;
            }
            .user-image{
                padding: 3em 0;
                background-image: linear-gradient(70deg, #3c7cb8, #074a88);
            }
            .content {
                color: #0a0808;
                padding: 2.2em;
            }
            .name{
                font-size: 1.5em;
                margin-bottom: 20px;
                
            }
            .email {
                font-size: 1em;
                color: #0f0404;
                margin-bottom:10px;
                
                
            }

            a {
            text-decoration: none;
            color: #565656;
            transition: all 0.3s;
            font-size: 2em;
            margin-right: 1.2em;
            }
            
            a:last-child {
            margin: 0;
            }
            
            .insta:hover {
            color: rgb(255, 70, 101);
            transform: scale(2, 2);
            }
            
            .twitter:hover {
            color: rgb(5, 160, 243);
            transform: scale(2, 2);
            }
            
            .fac:hover {
            color: rgba(4, 0, 253, 0.842);
            transform: scale(2, 2);
            }
            
            .details {
            margin-bottom: 1.8em;
            }
            .effect {
            text-align: center;
            display: inline-block;
            position: relative;
            text-decoration: none;
            color: rgb(48, 41, 41);
            text-transform: capitalize;
            width: 100%;
            background-image: linear-gradient(60deg, #0083FD, #61A1DD);
            font-size: 1.2em;
            padding: 1em 3em;
            border-radius: 5em;
            overflow: hidden;
            }
            .effect.effect-4:before {
            font-family: FontAwesome;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            text-align: center;
            font-size: 1.8em;
            transform: scale(0, 1);
            }
            
            .effect.effect-4:hover {
            text-indent: -999px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="user-image">
                <ion-icon style="
                width: 5em;
                height: 5em;
                border-radius: 50%;
                box-shadow: 0 0.6em 1.8em;
                object-fit: cover;
                font-size: 1.5em;"
                name="person-circle-outline"></ion-icon>  
            </div>
            <div class="content">
                <h3 class="name">{$_SESSION["name"]}</h3>
                <p class="email"><b>Email:{$_SESSION["email"]}</b></p>
                <div class="links">

                    <a class="insta" href="https://www.instagram.com/" target="_blank" title="GFG_instagram"> 
                        <ion-icon  name="logo-instagram"></ion-icon>
                    </a>
                    <a class="twitter" href="https://www.twitter.com/" target="_blank" title="GFG_twitter"> 
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                    <a class="fac" href="https://www.facebook.com/" target="_blank" title="GFG_facebook"> 
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>

                </div>
                <p class="details">
                    You are logged in as a patient at Bayu Dispensary 
                </p>
                <a   class="effect effect-4" href="logout1.php">
                    LogOut
                </a>
            </div>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
_END;
echo $content;
?>