<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Contact Me | My Portfolio</title>
    <link rel="stylesheet" href="./css/styles.css">

    <!---Bootstap scripts-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,600&display=swap" rel="stylesheet">
</head>

<body>

    <?php
    //declare variables for form and errors
    $name = $email = $subject = $message = "";
    //check for post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //reset errors
        $nameErr = $emailErr = $subjectErr = $messageErr = "";

        if (empty($_POST["name"])) {
            $nameErr = "</br>^ Name is required";
        } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $nameErr = "</br>^ Only letters and white space allowed";
            }
        }

        if (empty($_POST['email'])) {
            $emailErr = "</br>^ E-mail is required";
        } else {

            //remove illegal characters from email
            $email = test_input($_POST["email"]);
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);

            //validate e-mail
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo ("</br>^ $email is not a valid email address");
            }
        }

        if (empty($_POST['message'])) {
            $messageErr = "</br>^ Message is required";
        } else {
            $message = test_input($_POST["message"]);
        }





        $recipient = "bibekadhikari2141@gmail.com";
        $subject = "My portfolio website";
        $formcontent = "From: $email \n Message: $message";
        $mailheader = "MIME-Version: 1.0" . "\r\n";
        $mailheader .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $mailheader .= "From: $email \r\n";

        if ($messageErr || $emailErr || $nameErr) {
            //do nothing
        } else {
            $mail_sent = mail($recipient, $subject, $formcontent, $mailheader);
            $name = $email = $subject = $message = "";
    ?>
    <script>
    window.location = 'https://bibektest.herokuapp.com/contact.php';
    </script>
    <?php
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>



    <header>
        <!--Navbar-->
        <div class="container">
            <nav>
                <div class="logo">
                    <img src="./images/Logo.svg" alt="logo" width="50" height="40" />
                </div>

                <div class="menu-icons open">
                    <i class="fas fa-bars fa-2x"></i>
                </div>

                <ul class="nav-links">
                    <div class="menu-icons close">
                        <i class="fas fa-times fa-2x"></i>
                    </div>
                    <li class="current nav-txt nav-item"><a id="navText" href="index.html">Home</a></li>
                    <li class="nav-txt end nav-item">
                        <a id="navText" href="./portfolio.html">Portfolio</a>
                    </li>
                    <li class="formBtn">
                        <form class="form-inline my-2 my-lg-25" action="#">
                            <button class="navBarBtn btn-outline-success btn-sm my-2 my-sm-0" type="submit">
                                Contact Me
                            </button>
                        </form>
                    </li>
                </ul>
                </li>
                </ul>
            </nav>
        </div>
    </header>


    <main class="contactMe">
        <h1>Thanks for reaching out to me. What's on your mind ?</h1>
        <form id="contact-form" method="post" action="contact.php">

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="contact-label" for="name">
                            <span class="required">
                                Name:
                            </span>
                        </label><br>
                        <input type="text" class="form-control" id="contact-name" name="name" value=""
                            placeholder="Your Name" required="required" tabindex="1">
                        <span class="contact-error">
                            <?php echo $nameErr; ?>
                        </span>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="contact-label" for="email">
                            <span class="required">Email:</span>
                        </label><br>
                        <input type="email" class="form-control" id="contact-email" name="email" value=""
                            placeholder="Your Email" tabindex="2" required="required">
                        <span class="contact-error">
                            <?php echo $emailErr; ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="row contact-bumpers">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="contact-label" for="message">
                            <span class="required">
                                Message:
                            </span>
                        </label><br>
                        <textarea id="contact-message" class="form-control" name="message"
                            placeholder="Please write your message here." tabindex="5" rows="6"
                            required="required"></textarea>
                        <span class="contact-error">
                            <?php echo $messageErr; ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="col-sm-12">
                    <div class="button-div">
                        <button name="submit" class="btn btn-primary" type="submit" id="contact-submit">Submit</button>
                    </div>
                </div>
            </div>

        </form>

    </main>


    <footer class="portfolio_footer">
        <div class="logoFooter">
            <img src="./images/Logo.svg" alt="logo" width="70" height="70" />
            <div class="icon ">
                <a href="https://www.linkedin.com/in/bibek-adhikari3/"><i class="fab fa-linkedin fa-2x social-media"
                        id="iconFooter"></i>
                </a>

                <a href="https://github.com/bibek2141"><i class="fab fa-github fa-2x social-media" id="iconFooter"></i>
                </a>

                <a href="mailto:bibekadhikari2141@gmail.com">
                    <i class="fas fa-envelope fa-2x social-media" id="iconFooter"></i>
                </a>

                <p class="copyright" id="copyrightFooter">
                    Copyright ⓒ
                    <script>
                    document.write(new Date().getFullYear());
                    </script>
                </p>
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="script.js"></script>

</body>

</html>