<?php
    if (isset($_POST["submit"])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $from = 'Website Contact Form'; 
        $to = 'hornung.james@gmail.com'; 
        $subject = 'Message from Web Visitor ';
        
        $body ="From: $name\n E-Mail: $email\n Message:\n $message";

        // Check if name has been entered
        if (!$_POST['name']) {
            $errName = 'Please enter your name';
        }
        
        // Check if email has been entered and is valid
        if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Please enter a valid email address';
        }
        
        //Check if message has been entered
        if (!$_POST['message']) {
            $errMessage = 'Please enter your message';
        }
        

// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage) {
    if (mail ($to, $subject, $body, $from)) {
        $result='<div class="alert alert-success">Thank You! I will be in touch</div>';
    } else {
        $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
    }
}
    }
?>



<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body class="grey darken-4">
<div class="container white">

    <!--NAVBAR -->
    <div class="row">
        <div class="col l6 hide-on-med-and-down mainPageHeaderDiv">
            <div>
                <img src="assets/images/logo.jpg" alt="The Woodhouse Group" class="woodhouseLogo">
            </div>
        </div>
        <div class="col l6 s12">
            <ul class="right">
                <a class="btn waves-effect waves-light blue darken-3 navButton" href="index">Main</a>
                <a class="btn waves-effect waves-light blue darken-3 navButton" href="about">About</a>
                <a class="btn waves-effect waves-light blue darken-3 navButton" href="testimonials">Testimonials</a>
                <a class="btn waves-effect waves-light blue darken-3 navButton" href="clients">Clients</a>
                <a class="btn waves-effect waves-light blue darken-3 navButton" href="contact">Contact</a>
            </ul>
            <ul class="side-nav right" id="mobile-demo">
                <li><a href="index">Main</a></li>
                <li><a href="about">About</a></li>
                <li><a href="testimonials">Testimonials</a></li>
                <li><a href="clients">Clients</a></li>
                <li><a href="contact">Contact</a></li>
            </ul>
        </div>
    </div>


        <div class="row">
            <form role="form" method="post" action="contact.php">
                <h2>Contact Us</h2>
                <div class="input-field col s6 offset-s3">
                    <input type="text" name="name" placeholder="Name" class="validate" value="<?php echo htmlspecialchars($_POST['name']); ?>">
                    <?php echo "<p class='red-text center'>$errName</p>";?>
                </div>
                <div class="input-field col s6 offset-s3">
                    <input type="email" name="email" placeholder="e-mail" class="validate" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                    <?php echo "<p class='red-text center'>$errEmail</p>";?>
                </div>
                <div class="input-field col s6 offset-s3">
                    <textarea class="materialize-textarea" placeholder="Message" name="message" value="<?php echo htmlspecialchars($_POST['message']); ?>"></textarea>
                    <?php echo "<p class='red-text center'>$errMessage</p>";?>
                </div>
                <div class="input-field col s6 offset-s3">
                    <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
                </div>
                <div class="input-field col s6 offset-s3">
                    <?php echo $result; ?>
                </div>
            </form>
        </div>

 <!-- container end?  -->  
</div>

<!-- FOOTER -->
    <div class="footerDiv">
        <footer class="page-footer grey darken-4">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <h5 class="deep-orange-text text-accent-3">The Woodhouse Group</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col s4">
                        <p class="cyan-text text-lighten-3">305 West 13th Street<br>
                        Austin, TX 78701<br>
                        Phone: (512) 478-9937</p>
                    </div>
                    <div class="col s4">
                    </div>
                    <div class="col s4">
                        <ul class="right">
                          <li><a class="footerLinks" href="index">Main</a></li>
                          <li><a class="footerLinks" href="about">About</a></li>
                          <li><a class="footerLinks" href="testimonials">Testimonals</a></li>
                          <li><a class="footerLinks" href="clients">Clients</a></li>
                          <li><a class="footerLinks" href="contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <p class="center copywrightText">© 2016 Steve Holzheauser. All rights reserved. |  Web Design: James Hornung</p>
                </div>
            </div>
        </footer>
    </div>


<!-- Javascript Files -->
    <script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
</body>

</html>