<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>



    <!--icone material -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
    <!-- bootstrap -->
    <link rel="stylesheet" href ="../css/bootstrap.min.css">

    <!-- front awesome css-->
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@1,700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- lien avec css-->
    <link rel="stylesheet" href="../css/adminstyle.css">

</head>

<style >
    /* Style pour les icônes */
.nav-link i {
    color: #32383d; /* Remplacez cette valeur par la couleur que vous souhaitez */
}

/* Style pour les mots du menu */
.nav-link {
    color: #32383d; /* Remplacez cette valeur par la couleur que vous souhaitez */
    transition: transform 0.3s ease;
    font-family: 'Poppins', sans-serif;
}

.nav-link:hover {
    transform: translateX(10px); /* Ajustez la valeur selon votre préférence de décalage */
    color: #550418;
    font-size: 1.1em;
}
.date input[type='date'] {
    background: transparent;
    color: var(--clr-dark);
    border: none; /* Éliminer le cadre */
    outline: none;
    background: #dfdbdb;
    border-radius: 5px;
    padding: 5px;
    font-weight: 600;
    
}

.date {
    display: inline-block;
    background: var(--clr-light);
    border-radius: var(--border-radius-1);
    margin-top: 1rem;
    padding: 0.5rem 1.6rem;
    
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


.theme-toggler {
    background-color: #f8f9fa; /* Couleur de fond pour le div theme-toggler */
    padding: 10px; /* Espace intérieur autour du contenu */
    border: 1px solid #dee2e6; /* Bordure fine */
    border-radius: 3px; /* Bord arrondi */
    height: 40px; /* Hauteur du div theme-toggler */
}



</style>
<body>

    <!-- top navbar -->
    <nav class="navbar navbar-dark fixed-top p-0 shadow" style="background-color: #225470;">
    
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="adminDashboard.php"> 4IOT
        <small class="text-white">Admin Area</small>
    </a>
    </nav>

    <!-- side bar-->
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <nav class="col-sm-3 col-md-2 bg-light slider py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="adminDashboard.php" class="active">
                            <i class="fa-brands fa-windows"></i> &nbsp;&nbsp; Dashboard
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <i class="fa-solid fa-people-group"></i> &nbsp;&nbsp; Team
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <i class="fa-solid fa-user-plus"></i> &nbsp;&nbsp;  Add Admin
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="topic.php">
                            <i class="fa-solid fa-chart-line"></i>  &nbsp;&nbsp; Topic
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <i class="fas fa-comment"></i> &nbsp;&nbsp; Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <i class="fa-regular fa-address-card"></i>&nbsp;&nbsp;  Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <i class="fas fa-right-from-bracket"></i> &nbsp;&nbsp; Lougout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            
        <div class="col-sm-9 mt-5">
            <div class="row mx-5 text-center">

                <div class="date">
                    <input type="date" id="currentDate" />
                </div>
                <div class="theme-toggler">
                    <span class="material-icons-sharp active" id="lightModeIcon">light_mode</span>
                    <span class="material-icons-sharp" id="darkModeIcon">dark_mode</span>
                </div>

                <div class="col-sm-4 mt-5">
                    <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                        <div class="card-header">Topic</div>
                            <div class="card-body">
                                <h4 class="card-title">5</h4>
                                <a class="btn text-white" href="#">View</a>
                            </div>
                    </div>
                </div>
                <div class="col-sm-4 mt-5">
                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                        <div class="card-header">Users</div>
                            <div class="card-body">
                                <h4 class="card-title">3</h4>
                                <a class="btn text-white" href="#">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-5">
                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                        <div class="card-header">Users</div>
                            <div class="card-body">
                                <h4 class="card-title">3</h4>
                                <a class="btn text-white" href="#">View</a>
                            </div>
                        </div>
                    </div>
                
                </div>
                
                <br><br>
                <div class="mx-5 mt text-center">
                    <!-- table-->
                    <p class="bg-dark text-white p-2">List of Users</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">User ID</th>
                                <th scope="col">User Name</th>
                                <th scope="col">User Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">22</th>
                                <td>ali</th>
                                <td>ali@gmail.com</th>
                                <td><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div><!-- div row close from header -->
    </div><!-- div container-fluid close from header -->

    <!-- jquery and bootstrap js-->

    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>

    <!-- font awesome js -->
    <script type="text/javascript" src="../js/all.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Obtenez la date actuelle
            var currentDate = new Date();

            // Formattez la date au format "YYYY-MM-DD"
            var formattedDate = currentDate.toISOString().split('T')[0];

            // Définissez la date formatée comme valeur par défaut du champ de date
            $('#currentDate').val(formattedDate);
        });
    </script>



 <!-- Bootstrap JS et Popper.js -->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Vos scripts JavaScript ici -->
    <script src="scripte.js"></script>

    <h1>Welcome to Dashbord</h1>
    <a href ="../logout.php">Logout Button</a>
</body>
</html>