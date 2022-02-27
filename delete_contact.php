<?php
    include "database.php";

    $de = $_POST["delete"];
    

    mysqli_query($connection, "DELETE FROM contact");

    header("Location: index.php");
?>