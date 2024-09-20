<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,
initial-scale=1.0">

<!-- bootstrap -->
<link rel="stylesheet" href ="css/bootstrap.min.css">

<!-- front awesome css-->
<link rel="stylesheet" href="css/all.min.css">

<!-- testimonial owl slider css-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="css/owl.testyslider.css">

<!-- google font -->
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@1,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@1&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@1,700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- lien avec css-->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style.css">

<title>4IOT</title>
</head>
<style>
    .bottom-banner{
    color: #fff;
    padding: 10px;
}

.testimonial {
        max-width: 300px; /* Ajuster la largeur maximale des témoignages selon vos besoins */
        margin: 0 10px; /* Marge entre les témoignages */
    }
    #testimonial-slider {
        display: flex; /* Utiliser un conteneur flexible (flexbox) */
        flex-direction: row; /* Aligner les témoignages horizontalement */
        justify-content: space-around; /* Espacement équitable entre les témoignages */
        align-items: center; /* Aligner les témoignages verticalement au centre */
    }

    .pic img {
        width: 80px; /* Ajustez la largeur selon vos besoins */
        height: 80px; /* Ajustez la hauteur selon vos besoins */
        border-radius: 50%; /* Cela crée un cadre en cercle */
        object-fit: cover; /* Pour s'assurer que l'image est bien ajustée dans le cadre */
        margin: 0 auto; /* Pour centrer l'image */
    }

    .testimonial-prof {
        margin-top: 10px; /* Espacement entre le texte du témoignage et l'image */
    }

    .bg-dark .social-hover {
        text-decoration: none;
    }



</style>
<body>
    <!--start navigation -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark pl-5 fixed-top">
        <a class="navbar-brand" href="index.php">4IOT</a>
        <span class="navbar-text">Contrôle Connecté Innovant</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav custom-nav pl-5">
                <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item custom-nav-item"><a href="aboutus.php" class="nav-link">About Us</a></li>
                <?php 
                    session_start();
                    if(isset($_SESSION['is_login'])){
                        echo'
                        <li class="nav-item custom-nav-item"><a href="visitor/studentProfile.php" class="nav-link">My Profile</a></li>
                        <li class="nav-item custom-nav-item"><a href="visitor/topicc.php" class="nav-link">Topic</a></li>
                        <li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
                        ';
                    }else{
                        echo '
                        <li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#stuRegModalCenter">Signup</a></li>
                        <li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#stuLoginModalCenter">Login</a></li>
                        ';
                    }
                ?>
                
                
                <li class="nav-item custom-nav-item"><a href="#contact-us" class="nav-link">Contact</a></li>

                <li class="nav-item custom-nav-item"><a href="#testimonial" class="nav-link">Feedback</a></li>
            </ul>
        </div>
    </nav>

    <!--end navigation -->
