<?php
include "fonction.php";
$contacts = getAllContacts();
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- front awesome css-->
<link rel="stylesheet" href="all.min.css">
  
    <link rel="stylesheet" href="css.css" />
  <link rel="stylesheet" href="bootstyle.css" />
  <link rel="stylesheet" href="style_admin.css" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.4/sweetalert2.min.css"> 
    <style>
      .actions {
    display: flex; /* Aligne les éléments horizontalement */
    gap: 0px; /* Ajoute de l'espace entre les éléments */
}

.actions a {
    text-decoration: none; /* Supprime le soulignement des liens */
    color: #007bff; /* Couleur du texte pour les liens */
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
/* Ajoutez ces styles à votre fichier CSS ou dans une balise <style> dans l'en-tête de votre document */
.custom-modal {
    
    margin-right: 35%; /* Ajustez la valeur selon vos besoins */
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


    </style>
</head>
<body>
    <div class="container">
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
            <a href="add_admin.php">
              <span class="material-icons-sharp">contacts</span>
              <h3>Add Admin</h3>
            </a>
            <a href="profile.php">
              <span class="material-icons-sharp">person_outline</span>
              <h3>Profile</h3>
            </a>
            
            
            <a href="contacts.php" class="active">
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
            <h1>Contacts</h1>
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
            <div class="main-content">
            
            
            <!-- end insights-->
            <div class="list">
              <h2>List Of Contacts</h2>
              <table>
                <thead>
                  <tr>
                    <th class="warning">Id Contact</th>
                    <th class="warning">Contact Name</th>
                    <th class="warning">Email Address</th>
                    <th class="warning">Subject</th>
                    <th class="warning">Message</th>
                    <th class="warning">Action</th>
                    <th></th>
                    
                  </tr>
                </thead>
                <tbody>
                <?php foreach($contacts as $contact){  
        print '<tr>
            <td>'.$contact['contact_id'].'</td>
            <td>'.$contact['contact_name'].'</td>
            <td>'.$contact['contact_email'].'</td>
            <td>'.$contact['subject'].'</td>
            <td>'.$contact['msg'].'</td>
            <td>
                <div class="actions">
                    
                    <a href="Deletecontact.php?idcontact='.$contact['contact_id'].'" class="delete" data-toggle="modal">
                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                    </a>
                </div>
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
                  <img src="../image/user/logo.jpg">
                </div>
              </div>
            </div>
            <!-- recent update start -->
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
                    <div><a href="Deletefeedc.php?f_id=<?php echo $user['f_id']; ?>" class="delete highlighted">
    <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
</a></div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

                  </div>
        <script src="script.js"></script>
  
    </div>
</body>
<script src="script.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.4/sweetalert2.min.js"></script> 
       
</html>