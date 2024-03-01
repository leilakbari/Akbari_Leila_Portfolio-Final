<!DOCTYPE html>
<html lang="en">
<?php
require_once('includes/connect.php');
$stmt = $connection->prepare('SELECT * FROM projects ORDER BY title ASC');
$stmt->execute();
?>

<head>
    <meta charset="UTF-8">
    <!-- in mobile set initial zoom level of page to 100%, set site size to equal device width not a larger canvas that is shrunk down-->
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <title>Leila Akbari Portfolio</title>
    <script src="https://kit.fontawesome.com/aaac3ee71e.js" crossorigin="anonymous"></script>
    <!-- Link to reset or normalize before main.css
    only choose one -->
    <link href="css/grid.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!-- JS -->
    <!-- <script src="js/vanilla-tilt.js"></script> -->
    <script defer type="module" src="js/main.js"></script>
</head>

<body class="wrapper">

        <header class="mainHeaderContainer" id="main-header">
            <div class="headerLogo">
                <a href="#home"
                  ><img src="images/Akbari_Leila_Logo.svg" id="logo"
                /></a>
              </div>
            <nav class="nav xl-col-start-6 l-col-start-6 m-col-start-2 m-col-end-8 col-start-2 col-end-5">
                <ul>
                    <li class="nav-item"><a href="#home">Home</a></li>
                    <li class="nav-item"><a href="#about-me">About Me</a></li>
                    <li class="nav-item"><a href="#projects">Projects</a></li>
                    <li class="nav-item"><a href="#contact-me">Contact Me</a></li>
                </ul>
            </nav>
        </header>

    <div class="homeWrapper">

        <div class="homeContainer col-span-full" id="home">
            <div class="homeCard" data-tilt>    
                <div class="heroImage">
                    <img src="images/HeroIMG1920.png" alt="hero-img">
                    </div>

                <div class="text-hero">
 
                    

                    <div class="titleBox">
                    <h1></h1>
                    <h2>I'm <span id="typing"></span>
                        <span id="cursor">I</span>
                    </h2>
                    <p></p>

                
                </div>
            </div>
                <!-- <div class="social-icons col-span-full xl-col-start-2 l-col-start-1 m-col-start-2">
                    <i class="fab fa-linkedin"></i> 
                    <i class="fab fa-dribbble"></i> 
                    <i class="fab fa-instagram"></i> 
                </div>  -->
            </div>
        </div>
        
        <div class="homeContainer col-span-full" id="about-me">
            <div class="homeCard aboutCard col-start-1 col-end-5 l-col-start-2 xl-col-start-2" data-tilt>    
                
                <!-- <div class="heroImage aboutImage">
                <img class="col-span-full col-start-1 m-col-start-1 l-col-start-1" src="images/AboutMe-ProfilePicture-web1920.png" alt="about-img">
                <a href="contact.html" class="btn2">Contact Me</a>

                </div> -->

                                <div class="heroImage">
                    <img src="images/HeroIMG1920.png" alt="hero-img">
                    </div>

                <div id="text-about" class="text-hero col-start-1 m-col-start-1 m-col-end-13 l-col-start-3 l-col-end-13">

                    <div class="titleBox">
                    <h1></h1>
                    <h2></h2>
                    <p></p>

                    </div>

            </div>
            </div>
        </div>


    <div class="homeContainer" id="projects">

    <div class="homeCard sliderCard" >
    <h2 class="wideTitle">Projects</h2>

                <div class="buttons">
                    <a class=" prev col-start-1">
                    <svg fill="#000000" viewBox="-8.5 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>back</title> <path d="M15.281 7.188v17.594l-15.281-8.781z"></path> </g></svg>                   
                   </a>
                    <a class=" next col-start-5">
                    <svg fill="#000000" viewBox="-8.5 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>next</title> <path d="M0 24.781v-17.594l15.281 8.813z"></path> </g></svg>                   
                  </a>
                </div>

                <div class="scroll-images">


<?php

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

  echo  '
  <section class="slider-projects" id="project-slider">
  <a href="project_detail.php?id='.$row['id'].'">
  <div class="child">
  <img data-tilt src="images/'.$row['image_url'].'" alt="Project Thumbnail">
  <h2>'.$row['title'].'</h2>
  </a> 
  </div>
  </section>';

}

$stmt = null;

?>
</div>
</div></div>


        <div class="homeContainer col-span-full" id="contact-me">
            <div class="homeCard contactCard" data-tilt>
            <h2 class="wideTitle">Contact Leila</h2>

                <div class="heroImage aboutImage">
                <img src="images/AboutMe-ProfilePicture-web1920.png" alt="about-img">
                <h2>Leila Akbari</h2>
                <h3>Leila@itsLeila.com</h3>
                <h3>London, On</h3>
                </div>
    
                <form class="form" method="post" id="mail-form" action="includes/sendmail.php">

<label for="firstname">First Name</label>
<input type="text" id="firstname" name="firstname" placeholder="First name here...">

<label for="lastname">Last Name</label>
<input type="text" id="lastname" name="lastname" placeholder="Last name here...">

<label for="email">Email</label>
<input type="text" id="email" name="email" placeholder="Email here...">

<label for="message">Message</label>
<textarea id="message" name="message" placeholder="Write your message here..." style="height:200px"></textarea>

<button class="formButton" type="submit" value="SEND">Send Message</button>
</form>

            </div>
        </div>

    </div>

</div>
</div>

</body>

    <!-- main library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <!-- ScrollTrigger plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <!-- ScrollTo plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollToPlugin.min.js"></script>
    <!-- our main js file -->
    <script src="js/vanilla-tilt.js"></script>
    <!-- <script src="js/main.js"></script> -->
</html>

 <!--
<p>'.$row['description'].'</p>
-->