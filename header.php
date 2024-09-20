
<?php
include_once('../dbConnection.php');

if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['is_login'])){
    $stuLogEmail = $_SESSION['stuLogEmail'];
}
//else {
 //   echo"<script> location.href='../index.php'; </script>";}

if(isset($stuLogEmail)){
    $sql = "SELECT stu From student WHERE stu_email = '$stuLogEmail'";
    $result = $conn -> query($sql);
    $row = $result->fetch_assoc();
    $stu = $row['stu'];
}
?>
    
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

        <title>User Dashboard Template</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

        <!-- Bootstrap core CSS -->
        <link href="bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">


        <!-- Custom styles for this template -->
        <link href="dashboard.css" rel="stylesheet">
    </head>

    <body>
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
            <a class="nav-link" href="#">Sign out</a>
            </li>
        </ul>
        </nav>
        <!-- side bar -->
        <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                <li class="nav-item mb-3">
                    <img src="<?php echo $stu ?>" alt="user" class="img-thumbnail rounded-circle">
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="studentProfile.php">
                    <span data-feather="home"></span>
                    Profile <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Admin/topic.php">
                    <span data-feather="file"></span>
                    Topic
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="stufeedback.php">
                    <span data-feather="shopping-cart"></span>
                    Feedback
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="studentChangePass.php">
                    <span data-feather="users"></span>
                    Change Password
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">
                    <span data-feather="bar-chart-2"></span>
                    Logout
                    </a>
                </li>
                
            </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button class="btn btn-sm btn-outline-secondary">Share</button>
                    <button class="btn btn-sm btn-outline-secondary">Export</button>
                </div>
                <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    This week
                </button>
                </div>
            </div>