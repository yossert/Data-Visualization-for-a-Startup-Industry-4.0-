<?php

if (!isset($_SESSION)) {
    session_start();
}
include"admin.php";
include "fonction.php";
include "../dbConnection.php";

if (!isset($_SESSION['is_admin_login'])) {
  if (isset($_SESSION['adminLogEmail'])) {
    $adminLogEmail = $_SESSION['adminLogEmail'];
  } else {
      echo "La session n'est pas correctement définie.";
      exit();
  }
}

// Utilisation dans le code
$nbadmins = countAdmins();
$nbusers = countUsers();
$total = countUsers() + countAdmins();
$percentageadmin = calculatePercentage($nbadmins,$total);
$percentageuser = calculatePercentage($nbusers,$total);
$circumference = 2 * M_PI * 36; // Circonférence du cercle avec rayon 36

// Longueur de la circonférence pour le pourcentage donné
$progressLengthadmin = ($percentageadmin / 100) * $circumference;
$progressLengthuser = ($percentageuser / 100) * $circumference;
$users = getAllUsers();

function getuserid(){
  $conn = connect();
  $req = "SELECT f_id,f_content, stu_name, stu_occ, stu_img 
        FROM student s, feedback f 
        WHERE s.stu_id = f.stu_id 
        AND s.stu_id IN (SELECT f.stu_id FROM feedback f)";


  $resultat = $conn->query($req);
  $idusers = $resultat->fetchAll();
  return $idusers;
}

$idusers = getuserid();


      
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="style_admin.css" />
    <title>Admin Dashboard</title>
    <style>
      .top .logo{
  margin-left: 20px;
}
aside .logo img {
  width: 2rem;
  height: 2rem;
  border-radius: 50%; /* Pour créer un cercle */
  overflow: hidden; /* Assurez-vous que l'overflow est masqué pour éviter des problèmes d'affichage */
  
}
.profile img {
    width: 2.8rem;
    height: 2.8rem;
    border-radius: 50%;
    overflow: hidden;
    margin-left: 4rem;
  }

  .center-cell {
    text-align: center;
  }
  .recent_updates .updates .message{
    display: flex;
    justify-content: space-between; /* Ajout de cette ligne pour aligner les éléments à l'extrémité droite */
}

.delete-icon {
    cursor: pointer;
}
.delete i {
    color: #000000; /* Noir */
    cursor: pointer;
    font-size: 20px; /* Taille de l'icône */
}

.delete i:hover {
    color: var(--clr-primary); /* Couleur de l'icône au survol (une nuance plus foncée de noir) */
}

aside .sidebar a:last-child{
    position: absolute;
    bottom: 2rem;
    width: 100%;
}

  


    </style>
</head>
<body>
    <div class="container">
        <!-- aside section start -->
        <aside>
          <div class="top">
            <div class="logo">
              <img src="../image/user/logo.jpg" />
              <h2>4<span class="danger">IOT</span></h2>
            </div>
            <div class="close" id="close-btn">
              <span class="material-icons-sharp">close</span>
            </div>
          </div>
          <!-- end top -->
          <div class="sidebar">
            <a href="adminDashboard.php" class="active">
              <span class="material-icons-sharp">grid_view</span>
              <h3>Home</h3>
            </a>
            <a href="manage_team.php">
              <span class="material-icons-sharp">group</span>
              <h3>Team</h3>
            </a>
            <a href="add_admin.php">
              <span class="material-icons-sharp">contacts</span>
              <h3>Add Admin</h3>
            </a>
            <a href="profile.php">
              <span class="material-icons-sharp">person_outline</span>
              <h3>Profile</h3>
            </a>
            
            
            <a href="contacts.php">
            <span class="material-icons-sharp">phone</span>
              <h3>Contacts</h3>
            </a>
            
            <a href="../Admin/topic.php">
              <span class="material-icons-sharp">incomplete_circle</span>
              <h3>Pie Chart</h3>
            </a>
            <a href="../logout.php">
              <span class="material-icons-sharp">logout </span>
              <h3>Logout</h3>
            </a>
          </div>
        </aside>
        <!-- aside section end -->
        <main>
            <h1>Dashboard</h1>
            <div class="date">
    <input type="date" id="dateInput" />
</div>

<script>
    // Obtenez la référence de l'élément de champ de date
    var dateInput = document.getElementById('dateInput');

    // Obtenez la date actuelle au format AAAA-MM-JJ
    var currentDate = new Date().toISOString().split('T')[0];

    // Définissez la valeur du champ de date sur la date actuelle
    dateInput.value = currentDate;
</script>
            <div class="insights">
              <!-- xtart topics-->
              <div class="topics">
                <span class="material-icons-sharp">topic</span>
                <div class="middle">
                  <div class="left">
                    <h3>Total Topics</h3>
                    <h1>1</h1>
                  </div>
                  <div class="progress">
                    
                  </div>
                </div>
                <small class="text-muted">last 24h</small>
              </div>
              <!-- end topics-->
              <div class="admin">
                <!-- start admin-->
                <span class="material-icons-sharp">shield</span>
                <div class="middle">
        <div class="left">
            <h3>Totales Admins</h3>
            <h1><?php echo $nbadmins; ?></h1>
        </div>
        <div class="progress">
        <svg>
    <circle cx="38" cy="38" r="36" style="stroke-dasharray: <?php echo $circumference; ?>; stroke-dashoffset: <?php echo $circumference - $progressLengthadmin; ?>"></circle>
</svg>
            <div class="number">
                <p><?php echo $percentageadmin; ?>%</p>
            </div>
        </div>
    </div>
    <small class="text-muted">last 24h</small>
              </div>
              <!-- end admins-->
              <div class="users">
                <!-- start users-->
                <span class="material-icons-sharp">group </span>
                <div class="middle">
                  <div class="left">
                    <h3>Totales Utilisateurs</h3>
                    <h1><?php echo countUsers(); ?></h1>
                  </div>
                  <div class="progress">
                  <svg>
                  <circle cx="38" cy="38" r="36" style="stroke-dasharray: <?php echo $circumference; ?>; stroke-dashoffset: <?php echo $circumference - $progressLengthuser; ?>"></circle></svg>
                    <div class="number">
                      <p><?php echo $percentageuser; ?>%</p>
                    </div>
                  </div>
                </div>
                <small class="text-muted">last 24h</small>
              </div>
              <!-- end users-->
            </div>
            <!-- end insights-->
            <div class="list">
              <h2>List Of users</h2>
              
              <table>
  <thead>
    <tr>
      <th class="warning">Id Member</th>
      <th class="warning">Member Photo</th>
      <th class="warning">Member Name</th>
      <th class="warning">Email Address</th>
      <th class="warning">Occupation</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($users as $user){  
      print '<tr>
        <td>'.$user['stu_id'].'</td>
        <td class="center-cell">
          <div class="profile">
            <img src="'.$user['stu_img'].'">
          </div>
        </td>
        <td>'.$user['stu_name'].'</td>
        <td>'.$user['stu_email'].'</td>
        <td>'.$user['stu_occ'].'</td>
      </tr>';
    } ?> 
  </tbody>
</table>

            </div>
          </main>
          <div class="right">
            <div class="top">
              <button id="menu-btn">
                <span class="material-icons-sharp">menu</span>
              </button>
              <div class="theme-toggler">
                <span class="material-icons-sharp active">light_mode</span>
                <span class="material-icons-sharp">dark_mode</span>
              </div>
              <div class="profile">
                <div class="info">
                  <p><b>NOM</b></p>
                  <small class="text-muted">Admin</small>
                </div>
                <div class="profile-photo">
                  <img src="../image/user/logo.jpg">
                </div>
              </div>
            </div>
            <!-- top section end -->
            <!-- recent update start -->
            <div class="recent_updates">
    <h2>Feedback</h2>
    <div class="updates">
        <?php foreach($idusers as $user){ ?>
            <div class="update"> 
                <div class="profile-photo">
                    <img src="<?php echo $user['stu_img']; ?>">
                </div>
                <div class="message">
                    <div>
                    <p><b><?php echo $user['stu_name']; ?></b>&nbsp;&nbsp;&nbsp;<?php echo $user['f_content']; ?></p>
                    <small class="text-muted">2 minutes ago</small></div>
                    <div><a href="deletefeed.php?f_id=<?php echo $user['f_id']; ?>" class="delete highlighted">
    <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
</a></div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

                  </div>
        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.4/sweetalert2.min.js"></script>
  
    </div>
</body>
</html>