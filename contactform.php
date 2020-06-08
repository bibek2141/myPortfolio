<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mailFrom = $_POST['email'];
    $message = $_POST['message'];

    /*My email address*/
    $mailTo = "bibekadhikari2141@gmail.com";
    $headers = "From:".$mailFrom;
    $txt = "You have received an e-mail from ".$name.".\n\n".$message;

    mail($mailTo, $mailFrom, $txt, $headers);

    header("Location: contact.html?mailsend");
}