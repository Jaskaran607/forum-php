<?php
include 'partials/_header.php';
include 'partials/_dbconnect.php';

$thread_id = $_GET['threadid'];
$sql = "SELECT * FROM `threads` WHERE thread_id=$thread_id"; 
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<div class="container my-4">
    <div class="jumbotron">
        <h1 class="display-4"><?php echo $row['thread_title']; ?></h1>
        <p class="lead"><?php echo $row['thread_desc']; ?></p>
        <hr class="my-4">
        <p>Posted by: <?php echo $row['thread_user_id']; ?> on <?php echo $row['created_at']; ?></p>
    </div>
</div>

<div class="container">
    <h2 class="py-2">Post a Comment</h2>
    
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        echo '<form action="partials/_handleComment.php" method="post">
            <input type="hidden" name="threadid" value="'.$thread_id.'">
            <div class="form-group">
                <label for="comment">Type your comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success my-2">Post Comment</button>
        </form>';
    }
    else{
        echo '<p class="lead">You need to be logged in to post a comment</p>';
    }
    ?>
    
    <h2 class="py-2">Discussion</h2>
    
    <?php
    $comment_sql = "SELECT * FROM `comments` WHERE thread_id=$thread_id"; 
    $comment_result = mysqli_query($conn, $comment_sql);
    $noComment = true;
    
    while($comment_row = mysqli_fetch_assoc($comment_result)){
        $noComment = false;
        $comment_content = $comment_row['comment_content'];
        $comment_time = $comment_row['created_at'];
        
        echo '<div class="media my-3">
            <div class="media-body">
                <p>'.$comment_content.'</p>
                <small>Posted at '.$comment_time.'</small>
            </div>
        </div>';
    }
    
    if($noComment){
        echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
                <p class="lead">No Comments Yet. Be the first to comment</p>
            </div>
        </div>';
    }
    ?>
</div>

<?php include 'partials/_footer.php'; ?>