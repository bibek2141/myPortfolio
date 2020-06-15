<?php



$to = "bibekadhikari2141@gmail.com";

$subject = "Contact Form Submission Enquirey";




function check_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


$name = check_input($_POST['name']);
$email = check_input($_POST['email']);
$message = check_input($_POST['message']);
$txt = "
			<table border=0 style='width:600px;'>
			<tr><td style='width:50%'>Name</td><td style='width:50%'>$name</td></tr>
			<tr><td style='width:50%'>Email</td><td style='width:50%'>$email</td></tr>
			<tr><td style='width:50%'>Message</td><td style='width:50%'>$message</td></tr>
			</table>";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From:' . $name . '<contact@bibekadhikari3.com>' . "\r\n";
$headers .=  "Reply-To: $email" . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if (mail($to, $subject, $txt, $headers)) {
    header("Location: https://bibekadhikari3.com/sent.html");
} else {
    echo "Unexpected Error";
}