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
                        <li><a href="#">About Me</a></li>
                        <li><a href="#">Highlights</a></li>
                        <li><a href="#">Projects</a></li>
                        <li><a href="#contact">Contact Me</a></li>
                        <li class="btn"><a href="login.php" login>Login</a></li>

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
                    <button type="button"><a href="login.php">More About Me</a></button>
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
                <form id="contact-form" method="POST" action="home_submit.php">
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
            </div>

        </div>
    </section>
    <script>
    function handleSubmit() {
          document.getElementById('message-sent').style.display = 'block';
          document.getElementById('contact-form').style.display = 'none';
        }
  </script>
</body>

</html>