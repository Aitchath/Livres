<?php
error_reporting(0);

session_start();

if (isset($_SESSION['nom'])){
    header("location: connection.php");
}
$message = null;

if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username ='$username' AND password ='$password' "; 
    $result = mysqli_query($con, $sql);
    if($result->num_rows > 0){
        header("location: index.php");
    } else{
        $message = "nom d'utilisateur ou mot de passe incorrect";
    }
}

?>