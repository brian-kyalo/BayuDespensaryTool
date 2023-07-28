<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../finalStyle/home.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.min.css">
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <style>
        
    .bayu{
    text-decoration: none;
    margin-right: 5px;
    color: black;
    font-family: 'Pangolin', cursive;
    font-weight: 800;
    font-size: 1.6rem;
  }
      
  .bayu:hover{
    color: aliceblue;
    font-size: 2rem;
    text-decoration: none;
    
  }

  .dispensary{
    
    color: aliceblue;
    font-family: 'Pangolin', cursive;
    font-weight: 600;
    font-size: 1.4rem;
  }

  .dispensary:hover{
    color: rgb(223, 220, 220);
    font-size: 1.8rem;
    color: black;
    
  }
  .icon{
    position: absolute;
    font-size: 1.5rem;
    color: rgb(22, 22, 238);
    font-family: 'Pangolin', cursive;
    font-weight: 800;
    transition: .2s;
  }
  .icon:hover{
    text-decoration: wavy;
    font-size: 1.5rem;
  }

    </style>
</head>
<body>
    
    <header class="header">
            <h1>
            <span class="bayu">Bayu </span><span class="dispensary"> Dispensary</span>
            <span class="icon"><ion-icon name="pulse-outline"></ion-icon></span>
            </h1>

        <nav class="navbar">
            <a href="index.html">Home</a>
            <a href="#">About</a>
            <a href="account.php">Tables</a>
            <a href="conact.html">Contact</a>

        </nav>
       

        
            
            <img src="../images/menu.jpg" class="user-pic" onclick="toggleMenu()">
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="images/profilefr.png" alt="">
                        
                    </div>
                    <hr>

                    <a href="" class="sub-menu-link">
                    <ion-icon style="font-size: 1.5rem;" name="person"></ion-icon>
                    <p>Name: <?php echo $_SESSION["name"]; ?></p>
                    <ion-icon name="mail"></ion-icon>
                    <p>Email: <?php echo $_SESSION["email"]; ?></p>
                    <a href="logout.php" style="font-size: 1.6rem; font-weight: 1000; text-decoration: none; color: black; margin-left: 105px; margin-bottom: 10px;">LogOut</a>
                   
                   
</a>


                    </a>
                </div>
            </div>
 
           
        
    </header>
  

    <div class="background-image">
        <div class="background-content">
            <h1>Empowering Your Health, One Prescription at a Time<br> patient experience</h1>
            <p>At Bayu Drug Dispensary, we are dedicated to empowering your health journey <br>by providing personalized prescriptions and compassionate care.</p>
            <a href="#">Read more</a>
        </div>
    </div>
    <div class="selection">
        <div class="one1">
            <h2>View Appointmnets</h2>
        <a href="../tables/appointment.php" class="custom-button">Doctor</a>

        </div>
        <div class="two2">
        <h2>Book Appointmnet</h2>
        <a href="../tables/doctorTable.php" class="custom-button">Patient</a>

        </div>
        <div class="three3">
        <h2>Prescribe Drugs</h2>
        <a href="../tables/prescriptionTable.php" class="custom-button">Pharmasist</a>

        </div>
    </div>
    <div class="about">
        <div class="main-about">
            <div class="inner-about">
                <div class="about-content">
                    <h1>about us</h1>
                <p>Bayu Drug Dispensary: Your trusted source for quality medications, personalized care, and a healthier future. Experience excellence today!</p>
                <a href="#">Read more</a>
                </div>
                
            </div>
            <div class="inner-about">
                <div class="inner-about-image">
                    <img src="images/about.jpeg" alt="">
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
   <div class="slideshow">
        <div class="mySlides fade">
            <div class="numbertext">1/4</div>
            <img src="images/5.jpg" width="100%">
            <div class="text">Caption text</div>
        </div>
        <div class="mySlides fade">
            <div class="numbertext">2/4</div>
            <img src="images/2.jpg" width="100%">
            <div class="text">Caption two</div>
        </div><div class="mySlides fade">
            <div class="numbertext">3/4</div>
            <img src="images/3.jpg" width="100%">
            <div class="text">Caption three</div>
        </div><div class="mySlides fade">
            <div class="numbertext">4/4</div>
            <img src="images/4.jpg" width="100%">
            <div class="text">Caption four</div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
   </div>
   <br><br>
   <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    <span class="dot" onclick="currentSlide(4)"></span>

  </div>

   

    <div class="our-services">
        <div class="service-content">
            <div class="left-service-content">
                <h1>Our special services</h1>
                <p>Our Special Services at Bayu Drug Dispensary go beyond traditional pharmacy offerings. From medication management to health consultations,<br> we are committed to enhancing your well-being</p>

            </div>

            <div class="right-service-content">
                <div class="right-btn">
                    <a href="#">See all services</a>
                </div>
            </div>
        </div>

        <div class="main-services">
            <div class="inner-services-content">
                <div class="service-icon">
                    <i class="fas fa-notes-medical"></i>
                </div>
                <h2>Medication Management</h2>
                <p> Our experienced pharmacists provide comprehensive medication management services, ensuring proper dosage, drug interactions, and adherence to treatment plans for optimal health outcomes.</p>

            </div>

            <div class="inner-services-content">
                <div class="service-icon">
                    <i class="fas fa-hospital-user"></i>
                </div>
                <h2>Health Consultations</h2>
                <p>Our knowledgeable healthcare professionals offer personalized health consultations, addressing your concerns, providing guidance on medication usage, and promoting overall wellness.</p>
                
            </div>

            <div class="inner-services-content">
                <div class="service-icon">
                    <i class="fas fa-user-md"></i>
                </div>
                <h2>Prescription Delivery</h2>
                <p>We understand the importance of convenience, which is why we offer prescription delivery services, bringing your medications right to your doorstep, saving you time and ensuring uninterrupted access to vital treatments.</p>
                
            </div>
        </div>
    </div>

    <div class="why-choseus">
    <div class="main-chose">
        <div class="inner-chose">
            <img src="images/cute.jpg" alt="">
        </div>

        <div class="inner-chose">
            <h1>why chose us </h1>

            <div class="inner-chose-content">
                <div class="main-inner-chose">
                    <div class="chose-icon">
                        <i class="fas fa-notes-medical"></i>
                    </div>
                    <div class="icon-content">
                        <p>Ensure safe and accurate medication usage with our expert guidance and monitoring.</p>
                    </div>
                </div>

                <div class="main-inner-chose">
                    <div class="chose-icon">
                        <i class="fas fa-hospital-user"></i>
                        
                    </div>
                    <div class="icon-content">
                        <p>Personalized advice and support for your health concerns and medication needs.
                        </p>
                    </div>
                </div>

                <div class="main-inner-chose">
                    <div class="chose-icon">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <div class="icon-content">
                        <p>Conveniently receive your medications at your doorstep, saving time and ensuring access.</p>
                    </div>
                </div>
            </div>
            

        </div>
    </div>
</div>
<hr>
<h1>Select your option below:</h1>
<p>For patients, kindly select patient, doctors and pharmacists only are allowed to choose their corresponding buttons</p>
   
<div class="button-container">
    <a href="">
    <button class="button button-patient">Patient</button>
    </a>
    <a href="">
    <button class="button button-doctor">Doctor</button></a></a>

    <a href="">
    <button class="button button-pharmacist">Pharmacist</button></a>
</div>


<hr>





<div class="footer">
    <div class="main-footer">
        <div class="inner-footer">
            <img src="images/logo1.png" width="40%">
        </div>

        <div class="inner-footer">
            <h2>headings</h2>
            <a href="#">Contact Us</a>
            <a href="#">About Us</a>
            <a href="#">Services</a>
            <a href="#">FAQs</a>
            <a href="#">Privacy Policy</a>
        </div>

        <div class="inner-footer">
            <h2>Explore More</h2>
            <a href="#">Blog</a>
            <a href="#">Testimonials</a>
            <a href="#">Refill Prescription</a>
            <a href="#">Insurance and Billing</a>
            <a href="#">Health Resources</a>
        </div>

        <div class="inner-footer">
            <h2>Additional Services</h2>
            <a href="#">Wellness Programs</a>
            <a href="#">Prescription Transfers</a>
            <a href="#">Patient Feedback</a>
            <a href="#">Store Locator</a>
            <a href="#">Accessibility Statement</a>
        </div>
    </div>
</div>






<script>

let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}


</script>


<script>
    let subMenu = document.getElementById("subMenu");

    function toggleMenu(){
        subMenu.classList.toggle("open-menu");
    }
    
</script>







<script src="script.js"></script>
 <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
