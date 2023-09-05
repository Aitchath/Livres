<?php

require 'connecte.php';

error_reporting(0);

session_start();
$_SESSION['username'] = $_POST['username'];

if (isset($_SESSION['username'])){
    header("location: vue.php");
}
$message = null;

if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username ='$username' AND password ='$password' "; 
    $result = mysqli_query($con, $sql);
    if($result->num_rows > 0){
        header("location: vue.php");
    } else{
        $message = "nom d'utilisateur ou mot de passe incorrect";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Bibliothèque</title>
</head>
<body>
  <?php
       include 'navbar.php';
  ?>


<div class="container">
        <div class="row pt-4">
    <form action="" method="POST" class="form-horizontal col-md-6 pt-4">
                     <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Nom d'utilisateur</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control">
                            </div>
                    </div>

                      <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Mot de passe</label>
                            <div class="col-sm-10">
                                <input type="text" name="password" class="form-control">
                            </div>
                      </div>
                      <div class="pt-4">
                        <input type="submit" name="submit" class="btn btn-primary m-3">
                      </div>
                    </form>
        </div>
</div>
</body>
</html>