<?php
// Start session
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_Tamayo";
// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM photo_highlights";
$result = $conn->query($sql);
?>

<?php

// Check if the user is logged in as an admin
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>

    <section class="top" id="top">
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
                <div class="top-text" id="top-text">
                    <h2> Hi, There!!</h2>
                    <h1> I am <span class="input"></span></h1>
                    <p>A 2nd Year Student pursuing Bachelor of Science in Information Technology
                        Major in Information Security at University of Southeastern Philippines - Obrero Campus. </p>
                    
                    <button class="edit-button" onclick="toggleEditMode('top')">Edit</button>


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

    <script>

function toggleEditMode(sectionId) {
    var sectionContent = document.getElementById(sectionId);
    var editButton = sectionContent.querySelector('.edit-button');
    var isEditMode = sectionContent.getAttribute('data-edit-mode') === 'true';
    var contentElement = sectionContent.querySelector('p');

    if (isEditMode) {
        // Save the edited content to the server using an AJAX request
        var editedText = document.getElementById('editedText').value; // Get the edited text content

        // Send the edited text to the server using an AJAX request
        $.ajax({
            url: 'save_edited_text.php',
            type: 'POST',
            data: {
                editedText: editedText
            },
            success: function (response) {
                // Update the section content with the edited text
                contentElement.textContent = response;

                // Update the edit button text and mode
                editButton.textContent = 'Edit';
                sectionContent.setAttribute('data-edit-mode', 'false');
            },
            error: function (xhr, status, error) {
                // Handle error
                console.log('Error:', error);
            }
        });

    } else {
        // Enable the edit mode
        var currentText = contentElement.textContent;
        contentElement.innerHTML = '<textarea id="editedText">' + currentText + '</textarea>';

        // Update the edit button text and mode
        editButton.textContent = 'Save';
        sectionContent.setAttribute('data-edit-mode', 'true');
    }
}
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

            <button class="edit-button" onclick="toggleEditMode('details')">Edit</button>

            <button type="button" class="download-button"><a href="cv.pdf">Download CV</a></button>
        </div>
        </div>
    </section>
    
<style>
    .edit-button {
        margin-bottom: 10px;
    }

    .download-button {
        margin-left: 10px;
    }
</style>

    <script>
    function toggleEditMode(sectionId) {
    var sectionContent = document.getElementById(sectionId);
    var editButton = sectionContent.querySelector('.edit-button');
    var isEditMode = sectionContent.getAttribute('data-edit-mode') === 'true';
    var contentElement = sectionContent.querySelector('p');

    if (isEditMode) {
        // Save the edited content to the server using an AJAX request
        var editedText = document.getElementById('editedText').value; // Get the edited text content

        // Send the edited text to the server using an AJAX request
        $.ajax({
            url: 'save_edited_text.php',
            type: 'POST',
            data: {
                editedText: editedText
            },
            success: function (response) {
                // Update the section content with the edited text
                contentElement.textContent = response;

                // Update the edit button text and mode
                editButton.textContent = 'Edit';
                sectionContent.setAttribute('data-edit-mode', 'false');
            },
            error: function (xhr, status, error) {
                // Handle error
                console.log('Error:', error);
            }
        });

    } else {
        // Enable the edit mode
        var currentText = contentElement.textContent;
        contentElement.innerHTML = '<textarea id="editedText">' + currentText + '</textarea>';

        // Update the edit button text and mode
        editButton.textContent = 'Save';
        sectionContent.setAttribute('data-edit-mode', 'true');
    }
}

</script>



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


            <?php

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    echo '<div class="box">';
                    echo "<img src='img/" . $row['filename'] . "'>";
                    echo '</div>';

                }
            }
            ?>
            <div class="form"  style="background-color: #f07878; padding: 10px 30px 10px 10px; border-radius: 10px; margin: 10% 3% 0 6%; display: flex;">
            <form class="upload-form" action="upload.php" method="POST" enctype="multipart/form-data"
                style="background-color: #f07878; padding: 10px;">
                <input type="file" name="photo" accept="image/*" style="">
                <input type="submit" value="Upload"
                    style="background-color: #1d1b1b; color: white; padding: 8px 12px; border: none; cursor: pointer;">
            </form>

            <form class="delete-form" action="delete.php" method="POST">
                <input type="hidden" name="delete" value="">
                <input type="submit" value="Delete"
                    style="background-color: #f44336; color: white; padding: 8px 12px; border: none; cursor: pointer; margin: 18% 0 0 8%;">
                
            </form>

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
    
    <section id="display">             
    <div class="displayButton" style="background-color: #f15d5d; padding: 1%; text-align: center;">
    <button type="button" class="display-button" style="background: rgb(46, 45, 45); color: black; padding: 1.5%;"><a href="display_msg.php" >Display Messages</a></button>
         </div>
</section>
    </div>
    </div>
</body>

</html>
