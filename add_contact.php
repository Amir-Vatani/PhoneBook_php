<?php
    include "database.php";

    $first_name = $_POST["firstname"];
    $last_name = $_POST["lastname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    mysqli_query($connection, "INSERT INTO contact(firstname, lastname, phone, email) VALUES('$first_name', '$last_name', '$phone', '$email')");

    header("Location: index.php");
?>