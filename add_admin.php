<?php
include "fonction.php";
$admins = getAllAdmins();
$conn = connect();
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
if(!empty($_POST['search'])){
  $res = searcha($_POST['search']);
}else{
  $res = getAllAdmins();
}


    $passmsg = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitFeedbackBtn'])) {
if (empty($_REQUEST['nom']) || empty($_REQUEST['mail']) || empty($_REQUEST['mdp']) || empty($_REQUEST['occ'])) {
  // Message affiché si l'un des champs requis est manquant
  $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
} else {
$nom = $_POST['nom'];
$mail = $_POST['mail'];
$mdp = $_POST['mdp'];
$occ = $_POST['occ'];
$sql = "INSERT INTO admin (admin_name,admin_email,admin_pass,admin_occ) VALUES ('$nom','$mail','$mdp','$occ')";
if ($conn->query($sql) == TRUE) {
  //bellow msg display on form submit success
  $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Submit Successfully</div>';
} else {
  //below msg display on form submit failed
  $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Submit: ' . $conn->error . '</div>';
  echo "MySQL Error: " . $conn->error; // Message de débogage
}}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <link rel="stylesheet" href="css.css" />
  <link rel="stylesheet" href="bootstyle.css" />
  <link rel="stylesheet" href="style_admin.css" />
    <title>Admin Dashboard</title>
    <style>
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
.search-container {
    text-align: center;
}

form {
    display: inline-block;
    position: relative; /* Ajout pour positionner l'icône par rapport au formulaire */
}

input[type="text"] {
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-right: 4px;
    border-color: #000; /* Ajout pour la bordure noire */
    width: 400px; /* Ajout pour définir la largeur du champ de recherche */
}

#searchIcon {
    position: absolute;
    top: 50%;
    right: 8px;
    transform: translateY(-50%);
    cursor: pointer;
}

button {
    padding: 8px 16px;
    font-size: 16px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}
.custom-modal {
    
    margin-right: 35%; /* Ajustez la valeur selon vos besoins */
}
.sidebar a:last-child {
    margin-top: auto;
}

    </style>
</head>
<body>
    <div class="container">
        <!-- aside section start -->
        <aside>
          <div class="top">
            <div class="logo">
              <img src="images/logo.jpg" />
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
            <a href="add_admin.php" class="active">
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
            <h1><b>Our Admins</b></h1>
            <div class="date">
    <input type="date" id="dateInput" />
</div>
<div class="search-container">
        <form id="searchForm" action="add_admin.php" method="POST">
            <input type="text" name="search" id="search" placeholder="Search..." area-label="Search"  name="search">
            <span id="searchIcon" type="submit" class="material-icons">search</span>
        </form>
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
              <h2><i>List Of Admins</i></h2>
              
              <table>
                <thead>
                  <tr>
                  <th class="warning">Id Admin</th>
                    <th class="warning">Photo Admin</th>
                    <th class="warning">Admin Name</th>
                    <th class="warning">Email Address</th>
                    <th class="warning">occupation</th>
                    <th class="warning">Action</th>

          
                  </tr>
                </thead>
                <tbody>

                <?php foreach($res as $admin){
                      print '<tr>
                      <td>'.$admin['admin_id'].'</td>
                      <td class="center-cell">
          <div class="profile">
            <img src="'.$admin['admin_photo'].'">
          </div>
        </td>
                      <td>'.$admin['admin_name'].'</td>
                      <td>'.$admin['admin_email'].'</td>
                      <td>'.$admin['admin_occ'].'</td>
                      <td>
                <div class="actions">
                    <a data-bs-toggle="modal" data-bs-target="#editModal'.$admin['admin_id'].'">
                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                    </a>
                   
            </td>
            <td>
            <a href="ajout_user.php?ida='.$admin['admin_id'].'" class="ajout" data-toggle="modal">
    <i class="material-icons" data-bs-toggle="tooltip" title="Add User">person_add</i>
</a>
            </td>
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
                  <img src="images/logo.jpg">
                </div>
              </div>
            </div>
            <!-- top section end -->
            <!-- recent update start -->
          <div class="recent_updates">
                <div class="updates">
                <div class="add-product">
                  <div>
              <span class="material-icons-sharp">add</span>
             <a data-bs-toggle="modal" data-bs-target="#exampleModal"> <h3>Add New Admin</h3></a>
              </div>
        </div>
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
                    <div><a href="Deletefeeda.php?f_id=<?php echo $user['f_id']; ?>" class="delete highlighted">
    <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
</a></div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

                  </div>
             <!-- Modal Ajout user-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered custom-modal">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-center align-items-center" style="margin-bottom: 0;">
        <h5 class="modal-title fs-4 custom-modal-title"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add New Admin</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
          <span class="material-icons-sharp">group</span>
          <span style="font-weight: bold; margin-left: 5px;">Name</span>
            <input type="text" name="nom" class="form-control" placeholder="Enter Admin name">
          </div>
          <br>
          <div class="form-group">
          <span class="material-icons">email</span>
          <span style="font-weight: bold; margin-left: 5px;">Email</span>
            <input type="email" name="mail" class="form-control" placeholder="Enter Admin Email">
          </div>
          <br>
          <div class="form-group">
          <span class="material-icons-sharp">key</span>
          <span style="font-weight: bold; margin-left: 5px;">Password</span>
            <input type="password" name="mdp" class="form-control" placeholder="Enter Admin password">
          </div>
          <br>
          <div class="form-group">
          <span class="material-icons-sharp">work</span>
          <span style="font-weight: bold; margin-left: 5px;">Occupation</span>
            <input type="text" name="occ" class="form-control" placeholder="Enter Admin occupation">
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="submitFeedbackBtn" class="btn btn-primary" style="background-color: #97062a; border-color: #97062a">Add Admin</button>
        <?php echo  $passmsg; ?>
      </div> 
    </form>
    </div>
  </div>
</div>


        
        <?php
 foreach($admins as $index => $admin){ ?>
     <!-- Modal Modification-->
     <div class="modal fade" id="editModal<?php echo $admin['admin_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered custom-modal">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-center align-items-center" style="margin-bottom: 0;">
        <h5 class="modal-title fs-4"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit User</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="Editadmin.php" method="post">
          <input type="hidden" value="<?php echo $admin['admin_id'];?>" name="ida">
          <div class="form-group">
          <span class="material-icons">email</span>
          <span style="font-weight: bold; margin-left: 5px;">Email</span>
            <input type="text" name="mail" class="form-control" value="<?php echo $admin['admin_email']; ?>" >
          </div>
          <br>
          <div class="form-group">
          <span class="material-icons-sharp">work</span>
          <span style="font-weight: bold; margin-left: 5px;">Occupation</span>
            <input type="text" name="occ" class="form-control" value="<?php echo $admin['admin_occ']; ?>" >
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" style="background-color: #97062a; border-color: #97062a">Edit Admin</button>
      </div> 
    </form>
    </div>
  </div>
</div>

<?php
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="script.js"></script>
  
    
</body>
</html>