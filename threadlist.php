<?php
include 'partials/_header.php';
include 'partials/_dbconnect.php';

$cat_id = $_GET['catid'];
$sql = "SELECT * FROM `categories` WHERE category_id=$cat_id"; 
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$cat_name = $row['category_name'];
$cat_desc = $row['category_description'];
?>

<div class="container my-4">
    <div class="jumbotron">
        <h1 class="display-4">Welcome to <?php echo $cat_name; ?> Forum</h1>
        <p class="lead"><?php echo $cat_desc; ?></p>
        <hr class="my-4">
        <p>No Spam / Advertising / Self-promote in the forums. Don't post copyright-infringing material.</p>
        <a class="btn btn-success btn-lg" href="#" data-bs-toggle="modal" data-bs-target="#askModal">Ask Question</a>
    </div>

    <div class="container">
        <h2 class="py-2">Browse Questions</h2>
        
        <?php
        $thread_sql = "SELECT * FROM `threads` WHERE thread_cat_id=$cat_id"; 
        $thread_result = mysqli_query($conn, $thread_sql);
        $noResult = true;
        
        while($thread_row = mysqli_fetch_assoc($thread_result)){
            $noResult = false;
            $thread_id = $thread_row['thread_id'];
            $thread_title = $thread_row['thread_title'];
            $thread_desc = $thread_row['thread_desc'];
            
            echo '<div class="media my-3">
                <div class="media-body">
                    <h5 class="mt-0"><a href="thread.php?threadid='.$thread_id.'">'.$thread_title.'</a></h5>
                    '.$thread_desc.'
                </div>
            </div>';
        }
        
        if($noResult){
            echo '<div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">No Questions Found</h1>
                    <p class="lead">Be the first person to ask a question</p>
                </div>
            </div>';
        }
        ?>
    </div>
</div>

<?php include 'partials/_footer.php'; ?>