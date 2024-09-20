<?php
if (!isset($_SESSION)) {
    session_start();
}
include "admin.php";
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

// Déplacer la déclaration de $adminLogEmail après l'inclusion de admin.php
$adminLogEmail = isset($_SESSION['adminLogEmail']) ? $_SESSION['adminLogEmail'] : '';

$sql = "SELECT * FROM admin WHERE admin_email='$adminLogEmail'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $stuId = $row["admin_id"];
    $admin_name = $row["admin_name"];
$stuOcc = $row["admin_occ"];
$admin_photo = $row["admin_photo"];


if(isset($_REQUEST['updateStuNameBtn'])){
  if(($_REQUEST['admin_name'] == "")){
      //msg displayed if required filed missing
      $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
// Declarations of variables
$admin_name = isset($_REQUEST["admin_name"]) ? $_REQUEST["admin_name"] : '';
$stuOcc = isset($_REQUEST["stuOcc"]) ? $_REQUEST["stuOcc"] : '';
$stu_image = isset($_FILES["admin_photo"]["name"]) ? $_FILES["admin_photo"]["name"] : '';
$stu_image_temp = isset($_FILES['admin_photo']['tmp_name']) ? $_FILES['admin_photo']['tmp_name'] : '';
$img_folder = '../image/user/' . $stu_image;

// Assurez-vous que le répertoire de destination existe
if (!file_exists('../image/user/')) {
    mkdir('../image/user/', true);
}

// Check if a file has been uploaded
if (!empty($stu_image_temp)) {
    move_uploaded_file($stu_image_temp, $img_folder);
}

$sql = "UPDATE admin SET admin_name ='$admin_name', admin_occ='$stuOcc', admin_photo='$img_folder' WHERE admin_email='$adminLogEmail'";

if ($conn->query($sql) === TRUE) {
    // Message affiché en cas de succès
    $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully</div>';
} else {
    // Message affiché en cas d'échec
    $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update: ' . $conn->error . '</div>';
}
  }
}




}


$admins = getAllAdmins();
function getuserid()
{
    $conn = connect();
    $req = "SELECT f_content, stu_name, stu_occ, stu_img 
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <link rel="stylesheet" href="profile.css" />
    <link rel="stylesheet" href="css.css" />
  <link rel="stylesheet" href="bootstyle.css" />
    <title>Admin Dashboard</title>
    <style>
      body{
    width: 100vw;
    height: 100vh; 
    font-family: 'Poppins',sans-serif;
    font-size: 0.88rem;
    background: var(--clr-color-background);
    user-select: none;
    overflow-x: hidden;   
    color: var(--clr-dark);
}
      .right .recent_updates .updates .add-product{
    background: transparent;
    display: flex;
    align-items: center;
    justify-content: center;
}

.right .recent_updates .updates{
    background: var(--clr-white);
    padding: var(--card-padding);
    border-radius: var(--card-border-radius);
    box-shadow: var(--box-shadow);
    transition: all 300ms ease;
    border: 2px dashed var(--clr-primary);
}
.right .recent_updates .updates .add-product div{
  display: flex;
  align-items: center;
  gap: 0.6rem;
}
.right .recent_updates .updates .add-product div h3{
  font-weight: 600;
}
.right .recent_updates{
    margin-top: 3rem;
    margin-left: 20px;
    margin-right: 20px;
}
.sidebar a{
  text-decoration: none;
}
.top .logo{
  margin-left: 20px;
}
aside .logo img {
  width: 2rem;
  height: 2rem;
  border-radius: 50%; /* Pour créer un cercle */
  overflow: hidden; /* Assurez-vous que l'overflow est masqué pour éviter des problèmes d'affichage */
  
}

/* feedback css */
.right .recent_updatesfedback{
    margin-top: 2rem;
    margin-left: 20px;
    margin-right: 20px;
}
.right .recent_updatesfedback h2{
    margin-bottom: 0.8rem;
}
.right .recent_updatesfedback .updatesfedback{
    background: var(--clr-white);
    padding: var(--card-padding);
    border-radius: var(--card-border-radius);
    box-shadow: var(--box-shadow);
    transition: all 300ms ease;
}
.right .recent_updatesfedback .updatesfedback:hover{
    box-shadow: none;
}
.right .recent_updatesfedback .updatesfedback .updatefedback{
    display: grid;
    grid-template-columns: 2.6rem auto;
    gap: 1rem;
    margin-bottom: 1rem;
}
/* feedback css */
.right .recent_updatesfedback{
    margin-top: 2rem;
    margin-left: 20px;
    margin-right: 20px;
}
.right .recent_updatesfedback h2{
    margin-bottom: 0.8rem;
}
.right .recent_updatesfedback .updatesfedback{
    background: var(--clr-white);
    padding: var(--card-padding);
    border-radius: var(--card-border-radius);
    box-shadow: var(--box-shadow);
    transition: all 300ms ease;
}
.right .recent_updatesfedback .updatesfedback:hover{
    box-shadow: none;
}
.right .recent_updatesfedback .updatesfedback .updatefedback{
    display: grid;
    grid-template-columns: 2.6rem auto;
    gap: 1rem;
    margin-bottom: 1rem;
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
  .list img {
    margin-top: 10rem;
    margin-left: 20px;
  width: 100%; /* Set the width to 100% to make it responsive within the parent container */
  height: 20rem; /* Auto height to maintain the aspect ratio */
  max-width: 100%; /* Set a maximum width to prevent the image from exceeding its natural size */
  max-height: 100%; /* Set a maximum height to prevent the image from exceeding its natural size */
  border-radius: 20px; /* Set the border-radius for rounded corners */
}

  .list .card-title{
    margin-right: 10rem;
  }
  .custom {
    width: 30rem;
    margin-left: 2rem;
    margin-right: 2rem;
    margin-top: 2px;
    padding-bottom: 3px;
    border: 2px solid #ced4da; /* Couleur et largeur de la bordure */
   /* Ajoute de l'espace à l'intérieur de la bordure */
    border-radius: 10px; /* Ajoute un rayon de bordure pour un aspect plus arrondi */
    padding-right: 20px;
  }
  .recent_updatesfedback .updatesfedback .message{
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
            <a href="adminDashboard.php">
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
            <a href="profile.php" class="active">
              <span class="material-icons-sharp">person_outline</span>
              <h3>Profile</h3>
            </a>
            
            
            <a href="contacts.php">
            <span class="material-icons-sharp">phone</span>
              <h3>Contacts</h3>
            </a>
            <a href="#">
              <span class="material-icons-sharp">stacked_line_chart</span>
              <h3>Line Graph</h3>
            </a>
            <a href="#">
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
            <h1>Profile</h1>
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

            
            <div class="list">
            <div class="card mb-3  border-0 box" style="max-width: 1100px;">
  <div class="row g-0">
    <div class="col-md-4">
    <li class="nav-item mb-3">
      <img src="<?php echo $admin_photo ?>" alt="admin" class="img-thumbnail">
    </li>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h2 style="color: var(--clr-primary);"><i>Your Profile</i></h2>
        <div class="col-sm-6 mt-5 custom">
        <form class="mx-5" method="POST" enctype="multipart/form-data" >
            <div class="form-group">
            <span class="material-icons-sharp">key</span>
            <span style="font-weight: bold; margin-left: 5px;">Your ID</span>
                <input type="text" class="form-control" id="stuId" placeholder="id" name="stuId" value=" <?php if(isset($stuId)) {echo $stuId;}?>" readonly >
            </div>
            <div class="form-group">
            <span class="material-icons">email</span>
            <span style="font-weight: bold; margin-left: 5px;">Your Email</span>
            <input type="email" class="form-control" id="adminLogEmail" placeholder="Email" name="adminLogEmail" value=" <?php echo $adminLogEmail ?>" readonly >

            </div>
            <div class="form-group">
            <span class="material-icons-sharp">group</span>
            <span style="font-weight: bold; margin-left: 5px;">Your Name</span>
            <input type="text" class="form-control" id="admin_name" placeholder="Name" name="admin_name" value="<?php if(isset($admin_name)) {echo $admin_name;}?>">

            </div>
            <br>
            <div class="form-group">
            <span class="material-icons-sharp">work</span>
            <span style="font-weight: bold; margin-left: 5px;">Your Occupation</span>
                <input type="text" class="form-control" id="stuOcc"  name="stuOcc" value=" <?php if(isset($stuOcc)) {echo $stuOcc;}?>" placeholder="Occupation">
            </div>
            <br>
            <div class="form-group">
            <label for="stu">Upload Image</label>
                <input type="file" class="form-control-file" id="admin_photo" name="admin_photo">
            </div>
            
            <div class="text-end">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary" name="updateStuNameBtn" style="color: var(--clr-primary); border-color: var(--clr-primary)"><span style="color: black;"><b>Update</b></span></button> <?php if (isset($passmsg)){echo $passmsg;}?>
            <br>
        </form>
    </div>
      </div>
    </div>
  </div>
</div>


              
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
             
            </div> 
            <div class="recent_updatesfedback">
    <h2>Feedback</h2>
    <div class="updatesfedback">
        <?php foreach($idusers as $user){ ?>
            <div class="updatefedback"> 
                <div class="profile-photo">
                    <img src="<?php echo $user['stu_img']; ?>">
                </div>
                <div class="message">
                    <div>
                    <p><b><?php echo $user['stu_name']; ?></b>&nbsp;&nbsp;&nbsp;<?php echo $user['f_content']; ?></p>
                    <small class="text-muted">2 minutes ago</small></div>
                    <div><a href="" class="delete highlighted">
    <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
</a></div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

                  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="script.js"></script>
  
    
</body>
</html>