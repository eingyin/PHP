<?php
 include("confs/config.php");
 $name = $_POST['name'];
 $password = $_POST['password1'];

$select = mysqli_query($conn, "SELECT * FROM admins WHERE name = '".$_POST['name']."'");
if(mysqli_num_rows($select)) {
    $message = 'Admin name already exist!.Plase change name.';

    echo "<SCRIPT> //not showing me this
        alert('$message')
        window.location.replace('registration.php');
    </SCRIPT>";
}
else{
    $sql = "INSERT INTO admins (name, password) VALUES ('$name', '$password')";
    mysqli_query($conn, $sql);
    header("location: product-list.php");
}
?>
 

