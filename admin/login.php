<?php
session_start();
include("confs/config.php");
if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];


    $result = mysqli_query($conn, "SELECT * FROM admins WHERE name='$name'");


    $row  = mysqli_fetch_array($result);
    // var_dump($row['password']);
    if (is_array($row)) {
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {

            $_SESSION['auth'] = true;
            header("location: welcome.php");
        }

        else{
            echo "<script type='text/javascript'>alert(\"Wrong  Password\")</script>";
            include("index.php");
        }
    } else {
        echo "<script type='text/javascript'>alert(\"Wrong Username or Password\")</script>";
      
        include("index.php");
      
   

        
    }
}
