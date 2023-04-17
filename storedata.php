<?php

$con = mysqli_connect('localhost', 'root', '', 'formdb');

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact VALUES ('$firstname', '$lastname', '$email', '$message')";

    $rs = mysqli_query($con, $sql);

    if ($rs)
    {
        echo "Saved";
    } else {
        echo "error";
    }



?>