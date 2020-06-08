<?php
if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["message"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $header = "from: $name <$email>";
    $to = "bibekadhikari2141@gmail.com";

    if (mail($to, $message, $header)) {
        header("Location: contact.html");
    } else {
        echo("Error");
    }
}