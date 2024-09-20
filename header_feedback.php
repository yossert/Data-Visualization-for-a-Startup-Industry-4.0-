
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
    $sql = "SELECT stu_img From student WHERE stu_email = '$stuLogEmail'";
    $result = $conn -> query($sql);
    $row = $result->fetch_assoc();
    $stu_img = $row['stu_img'];
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

<!--icone material -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">

<!-- Bootstrap core CSS -->
<link href="bootstrap.min.css" rel="stylesheet">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<!-- Custom styles for this template -->
<link href="dashboard.css" rel="stylesheet">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/material-icons-symbol@1.3.0/outlined/material-icons-symbol-outlined.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">

<!-- key-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

        <style>
            footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    background-color: #343a40; /* Couleur de fond du footer, à ajuster selon votre thème */
    color: white; /* Couleur du texte du footer, à ajuster selon votre thème */
    padding: 10px 0;
    text-align: center;
    
}

 /* Ajoutez ces classes à votre fichier CSS */
        .dark-mode {
            background-color: #1a1a1a;
            color: #727171;
        }

        .light-mode {
            background-color: #ffffff;
            color: #000000;
        }

        .a{
            font-family: 'Oswald', sans-serif;
            font-size: 17px;
        }

        .nav-link:hover {
            transform: translateX(10px); /* Ajustez la valeur selon votre préférence de décalage */   
            font-size: 1.8em;
        }
        .nav-link{
            transition: transform 0.3s ease;
        }

        .b {
    font-family: 'Noto Sans', sans-serif;
    font-size: 16px; /* Ajustez la taille de la police selon vos besoins */
    font-weight: bold; /* Ajoutez cette ligne pour rendre le texte en gras */
}
    </style>
    </head>

    <body>
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
            <a class="nav-link" href="../logout.php">Sign out</a>
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
                    <img src="<?php echo $stu_img ?>" alt="user" class="img-thumbnail rounded-circle">
                </li>
                <li class="nav-item">
                    <a class="nav-link a" href="studentProfile.php">
                        <span class="material-symbols-outlined">user_attributes</span>
                        Profile <span class="sr-only">(current)</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link a" href="../visitor/topicc.php">
                    <span class="material-symbols-outlined">monitoring</span>
                    Topic
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link a active" href="stufeedback.php">
                    <span class="material-symbols-outlined">chat</span>
                    Feedback
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link a" href="studentChangePass.php">
                    <span class="material-symbols-outlined">manage_accounts</span>
                    Change Password
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link a" href="../index.php">
                    <span class="material-symbols-outlined">grid_view</span>Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link a" href="../logout.php">
                    <span class="material-symbols-outlined">logout</span>
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
                        <button class="btn btn-sm btn-outline-secondary">
                            <span class="material-icons-sharp active" id="lightModeIcon">light_mode</span>
                        </button>
                        <button class="btn btn-sm btn-outline-secondary">
                            <span class="material-icons-sharp" id="darkModeIcon">dark_mode
                            </span>
                        </button>
                    </div>
                    <div class="date">
                        <input type="date" id="currentDate" />
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <script>
            $(document).ready(function() {
                // Obtenez la date actuelle
                var currentDate = new Date();

                // Formattez la date au format "YYYY-MM-DD"
                var formattedDate = currentDate.toISOString().split('T')[0];

                // Définissez la date formatée comme valeur par défaut du champ de date
                $('#currentDate').val(formattedDate);

                // Appliquez le style CSS pour mettre la date en gras
                $('#currentDate').css('font-weight', 'bold');
            });
            </script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Gestionnaire d'événements pour le bouton de mode sombre
            $('#darkModeIcon').on('click', function() {
                $('body').removeClass('light-mode').addClass('dark-mode');
            });

            // Gestionnaire d'événements pour le bouton de mode clair
            $('#lightModeIcon').on('click', function() {
                $('body').removeClass('dark-mode').addClass('light-mode');
            });
        });
    </script>
    </body>
    </html>