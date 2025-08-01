<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '_dbconnect.php';
    
    $email = $_POST['signupEmail'];
    $password = $_POST['signupPassword'];
    $cpassword = $_POST['signupConfirmPassword'];
    
    // Check if email exists
    $existSql = "SELECT * FROM `users` WHERE user_email = '$email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    
    if($numRows > 0){
        header("Location: /index.php?signupsuccess=false&error=userexists");
    }
    else{
        if($password == $cpassword){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_email`, `user_pass`, `created_at`) VALUES ('$email', '$hash', current_timestamp())";   
            $result = mysqli_query($conn, $sql);
            
            if($result){
                header("Location: /index.php?signupsuccess=true");
            }
        }
        else{
            header("Location: /index.php?signupsuccess=false&error=passwordsdontmatch");
        }
    }
}
?>