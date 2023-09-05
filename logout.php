<?php


        session_start();
        $_SESSION['username'] = $_POST['username'];

        session_destroy();

        header("location: connection.php");
?>