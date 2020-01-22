<?php 
    
    $role = $_SESSION['role'];
    $email = $_SESSION['email'];
    switch($role){
        case 1:
            $sql = mysqli_query($conn, "SELECT * from admin WHERE email='$email'");
            $auth = mysqli_fetch_array($sql);
        break;
        case 2:
            $sql = mysqli_query($conn, "SELECT * from technician WHERE email='$email'");
            $auth = mysqli_fetch_array($sql);
        break;
        case 3:
            $sql = mysqli_query($conn, "SELECT * from lead_technician WHERE email='$email'");
            $auth = mysqli_fetch_array($sql);
        break;
    }

?>


