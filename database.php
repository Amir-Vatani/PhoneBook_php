<?php
    $connection = mysqli_connect("localhost", "root", "", "phonebook");

    mysqli_query($connection, "SET CHARACTER SET utf8");

    if(mysqli_connect_errno() != 0)
        print(mysqli_connect_error());
?>