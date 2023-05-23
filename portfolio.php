<?php
session_start();

// Check if the user is logged in as a user
if (!isset($_SESSION['user']) || $_SESSION['user'] !== true) {
    // Redirect the user to the login page
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> My Portfolio </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css"
        integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">

</head>

<body>

    <section class="top">
        <div class="main-width">
            <header>
                <div class="logo">
                    <i class="fa-solid fa-k"></i>
                </div>

                <nav>
                    <div class="hamb">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <ul class="nav-list">
                        <li><a href="#">Home</a></li>
                        <li><a href="#details">About Me</a></li>
                        <li><a href="#portfolio">Highlights</a></li>
                        <li><a href="#projects">Projects</a></li>
                        <li><a href="#contact">Contact Me</a></li>
                        <li class="btn"><a href="logout.php" logout>Logout</a></li>

                    </ul>
                </nav>
            </header>


            <div class="container">
                <div class="top-text">
                    <h2> Hi, There!!</h2>
                    <h1> I am <span class="input"></span></h1>
                    <p>A 2nd Year Student pursuing Bachelor of Science in Information Technology
                        Major in Information Security at University of Southeastern Philippines - Obrero Campus. </p>

                    <div class="social">
                        <a href="https://web.facebook.com/inalynkim.tamayo"><i
                                class="fa-brands fa-facebook-square"></i></a>
                        <a href="https://www.instagram.com/eyeykiiina_/?hl=en"><i
                                class="fa-brands fa-instagram"></i></a>
                        <a href="https://twitter.com/kmkm907"><i class="fa-brands fa-twitter"></i></a>
                        <a href="https://mail.google.com/"><i class="fa-regular fa-envelope"></i></i></a>
                        <a href="https://github.com/Kyiinaaa"><i class="fa fa-code-fork" aria-hidden="true"></i></a>
                    </div>
                    <button type="button"><a href="#details">More About Me</a></button>
                </div>


                <div class="footer">
                    <p>@(2023) Inalyn Kim Tamayo - All Rights Reserved.</p>
                </div>
            </div>
        </div>
        </div>
    </section>

    <script type="text/javascript" src="script.js"></script>

    <script src="https://unpkg.com/typed.js@2.0.15/dist/typed.umd.js"></script>

    <script>
        var typed = new Typed(".input", {
            strings: ["Inalyn Kim P. Tamayo."],
            typeSpeed: 70,
            backSpeed: 60,
            loop: true
        });

    </script>

    <section class="about" id="details">
        <div class="about-img">
            <img src="img/me.png" alt="">
        </div>

        <div class="about-text">
            <h3><span>About</span> Me</h3>
            <p>I'm Inalyn Kim Tamayo, an Information Technology student.
                I enjoy learning about new technologies and learning how they work,
                with the intention of specializing in them in the near future.
                I enjoy reading novels of all kinds, but my preference is more on science fiction.
                Despite the fact that I am an IT student, I am not a video game enthusiast.
                I have some coding experiences and am still learning about it so that I can use new concepts
                that will help me improve my problem-solving abilities.</p>
            <br>

            <p>“Failure is simply the opportunity to begin again, this time more intelligently.” — Henry Ford</p>

            <button type="button"><a href="cv.pdf">Download CV</a></button>
        </div>
        </div>
    </section>

    <section class="portfolio" id="portfolio">
        <h4 class="heading">Photo<span> Highlights</span></h4>
        <p>"Every picture tells a story, and every story holds a memory." - Unknown</p>

        <div class="box-container">
            <div class="box">
                <img src="img/1.jpg" alt="">
            </div>
            <div class="box">
                <img src="img/2.jpg" alt="">
            </div>
            <div class="box">
                <img src="img/3.jpg" alt="">
            </div>
            <div class="box">
                <img src="img/4.jpg" alt="">
            </div>
            <div class="box">
                <img src="img/5.jpg" alt="">
            </div>
            <div class="box">
                <img src="img/6.jpg" alt="">
            </div>
    </section>

    <section class="projects" id="projects">
        <h4 class="heading"><span>Recent </span>Projects</h4>
    </div>
        <div class="proj-section">
                <div class="proj-box">
                    <img src="img/1st_proj.png" alt="">
                    <div class="proj-head">
                        <h6>LihokApp</h6>
                        <p> The LihokApp is a To-Do List for students to keep
                            them organized and helps them get through each tasks 
                            rather than just create a list.                            
                        </p>
                    </div>
                </div>
                
                <div class="proj-box">
                    <img src="img/2nd_proj.png" alt="">
                    <div class="proj-head">
                        <h6>Meal Plan System</h6>
                        <p> The Meal Plan System is a system that benefits people who aim to plan and 
                            keep track of their meals for the week.</p>
                    </div>
                </div>
                <div class="proj-box">
                    <img src="img/3rd_proj.png" alt="">
                    <div class="proj-head">
                        <h6>Reservation System</h6>
                        <p> The reservation system for resorts is created to give conveniency to those people
                        who wanted to find a resort where they can easily book a schedule for their vacations 
                        or stay in Island Garden City of Samal.                       
                    </p>
                    </div>
                </div>
            
        </div>
    </section>


    <section id="contact">
        <div class="content">
            <h3> Connect With Me </h3>
            <p>If you have some queries, feel free to get in touch by sending a message to the form below. </p>
        </div>
        <div class="info">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                    <div class="text">
                        <h5>Name:</h5>
                        <p>Inalyn Kim P. Tamayo</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                    <div class="text">
                        <h5>Email:</h5>
                        <p>ikptamayo03223@usep.edu.ph</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-phone-square" aria-hidden="true"></i></div>
                    <div class="text">
                        <h5> Phone:</h5>
                        <p>+63-993-962-4009</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                    <div class="text">
                        <h5> Address:</h5>
                        <p>Blk 19 L1, NHA Buhangin, Davao City, Philippines</p>
                    </div>
                </div>
            </div>
            <div class="contactForm">
                    <form id="contact-form" method="POST" action="submit.php">
                    
                    <h3>Send Your Request</h3>
                    <div class="inputBox">
                        <input type="text" name="name" required="required">
                        <span>Full Name</span>
                    </div>
                    <div class="inputBox">
                        <input type="email" name="email" required="required">
                        <span>Email</span>
                    </div>
                    <div class="inputBox">
                        <textarea name="message" required="required"></textarea>
                        <span>Message</span>
                    </div>
                    <div class="inputBox">
                        <input type="submit" name="" value="Send">

                    </div>
    </form>

      </main>
      </section>
      <script>
    function handleSubmit() {
          document.getElementById('message-sent').style.display = 'block';
          document.getElementById('contact-form').style.display = 'none';
        }
  </script>
            </div>
        </div>
</body>

</html>


