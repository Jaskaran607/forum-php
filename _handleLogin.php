<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '_dbconnect.php';
    
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];
    
    $sql = "SELECT * FROM `users` WHERE user_email='$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    
    if($numRows == 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['user_pass'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['useremail'] = $email;
            header("Location: /index.php?loginsuccess=true");
            exit();
        }
        else{
            header("Location: /index.php?loginsuccess=false");
        }
    }
    else{
        header("Location: /index.php?loginsuccess=false");
    }
}
?>