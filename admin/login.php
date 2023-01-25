<?php
 session_start();
 include("confs/config.php");
if(isset($_POST['login']))
{
$name = $_POST['name'];
 $password = $_POST['password'];

  
    $result = mysqli_query($conn, "SELECT * FROM admins WHERE name='$name'AND password='$password'");

    $row  = mysqli_fetch_array($result);
    if(is_array($row))
    {
        $_SESSION['auth'] = true;
        header("location: product-list.php");
    }
    else
    {   
        
        header("location: index.php");
    }
}
?>
