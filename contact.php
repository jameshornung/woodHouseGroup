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
    <div class="container grey lighten-4">
        <nav>
            <div class="nav-wrapper blue-grey">
                <a href="#" class="brand-logo">Woodhouse</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="#">Meet Us</a></li>
                    <li><a href="#">Our Vision</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
        </nav>
        <div class="row">
            <form role="form" method="post" action="contact.php">
                <h2>Contact Us</h2>
                <div class="input-field col s6 offset-s3">
                    <input type="text" name="name" placeholder="Name" class="validate" value="<?php echo htmlspecialchars($_POST['name']); ?>">
                    <?php echo "<p class='text-danger'>$errName</p>";?>
                </div>
                <div class="input-field col s6 offset-s3">
                    <input type="email" name="email" placeholder="e-mail" class="validate" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                    <?php echo "<p class='text-danger'>$errEmail</p>";?>
                </div>
                <div class="input-field col s6 offset-s3">
                    <textarea class="materialize-textarea" placeholder="Message" name="message" value="<?php echo htmlspecialchars($_POST['message']); ?>"></textarea>
                    <?php echo "<p class='text-danger'>$errMessage</p>";?>
                </div>
                <div class="input-field col s6 offset-s3">
                    <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
                </div>
                <div class="input-field col s6 offset-s3">
                    <?php echo $result; ?>
                </div>
            </form>
            
        </div>
    </div>
    <script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
</body>

</html>