<?php


$con = mysqli_connect('localhost' , 'root', '');

    if(!$con) {

            die("database connection failed" . mysqli_error($con));
        }
        
        $select_db = mysqli_select_db($con, 'Bibliothèque');
        if (!$select_db){
            die("database connection failed" . mysqli_error($con));   
        }

?>