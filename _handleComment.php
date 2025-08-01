<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '_dbconnect.php';
    session_start();
    
    $thread_id = $_POST['threadid'];
    $comment = $_POST['comment'];
    $user_email = $_SESSION['useremail'];
    
    // Get user id from email
    $sql = "SELECT user_id FROM `users` WHERE user_email='$user_email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['user_id'];
    
    $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `created_at`) VALUES ('$comment', '$thread_id', '$user_id', current_timestamp())";   
    $result = mysqli_query($conn, $sql);
    
    if($result){
        header("Location: /thread.php?threadid=$thread_id&commentsuccess=true");
    }
    else{
        header("Location: /thread.php?threadid=$thread_id&commentsuccess=false");
    }
}
?>