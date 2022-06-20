<?php
    session_start();
    $connection=mysqli_connect("localhost","root","","ass");

    $email= $_POST['email'];
    $pasword = $_POST['pasword'];

    $sql = "SELECT * FROM assignment WHERE email='$email' AND pasword='$pasword'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $_SESSION['email'] = $row['email'];
        header('Location: finalall.php');
		
   }
    } else {
     echo"no access" ;
    }