<?php 
session_start();
include '_dbconnect.php';
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">iDiscuss</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="categories.php">Categories</a>
                </li>
            </ul>
            <div class="d-flex gap-2">
                <?php
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                    echo '<p class="text-light my-auto mx-3">Welcome '.$_SESSION['useremail'].'</p>
                    <a href="partials/_logout.php" class="btn btn-outline-light">Logout</a>';
                } else {
                    echo '<button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>';
                }
                ?>
            </div>
        </div>
    </div>
</nav>

<?php
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true"){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Success!</strong> You can now login.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
if(isset($_GET['error']) && $_GET['error'] == "passwordsdontmatch"){
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
            <strong>Error!</strong> Passwords do not match.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
if(isset($_GET['error']) && $_GET['error'] == "userexists"){
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
            <strong>Error!</strong> User already exists.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
if(isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "true"){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Success!</strong> You are logged in.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
if(isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false"){
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
            <strong>Error!</strong> Invalid credentials.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
?>