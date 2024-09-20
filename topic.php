<?php

include "../adminn/fonction.php";
include "../dbConnection.php";
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
    <title>Topic Page</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
.list #progress-container{
    margin-left: 20rem;
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
            <a href="../adminn/manage_team.php">
              <span class="material-icons-sharp">group</span>
              <h3>Team</h3>
            </a>
            <a href="../adminn/add_admin.php">
              <span class="material-icons-sharp">contacts</span>
              <h3>Add Admin</h3>
            </a>
            <a href="../adminn/profile.php">
              <span class="material-icons-sharp">person_outline</span>
              <h3>Profile</h3>
            </a>
            
            
            <a href="../adminn/contacts.php">
            <span class="material-icons-sharp">phone</span>
              <h3>Contacts</h3>
            </a>
            
            <a href="topic.php" class="active">
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
            <h1>Pie Chart</h1>
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
            
            </div>
            <!-- end insights-->
            <div class="list">
              <h2>Real-time Environmental Monitoring Dashboard</h2>
              <div id="progress-container">
        <div id="progress-circle" style="width: 100px; height: 100px; background-color: lightgray; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px;"></div>
    </div>
    <h1>Graphique en Temps Réel</h1>
    <div style="width: 80%;">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        function updateProgressCircle(value) {
            const progressCircle = document.getElementById("progress-circle");
            progressCircle.textContent = value + "%";
            const degrees = (360 * value) / 100;
            progressCircle.style.background = `conic-gradient(green ${degrees}deg, lightgray 0)`;
        }

        var ctx = document.getElementById('myChart').getContext('2d');

        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Données en temps réel',
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    data: [],
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: [{
                        type: 'linear',
                        position: 'bottom',
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    y: [{
                        type: 'linear',
                        position: 'left',
                        ticks: {
                            beginAtZero: true,
                            suggestedMax: 100
                        }
                    }]
                }
            }
        });

        function addData(chart, label, data) {
            chart.data.labels.push(label);
            chart.data.datasets[0].data.push(data);

            if (chart.data.labels.length > 10) {
                chart.data.labels.shift();
                chart.data.datasets[0].data.shift();
            }

            chart.update();
        }

        function fetchLatestHumidity() {
            $.ajax({
                url: 'get_lastest_humidity.php',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    const latestHumidity = parseFloat(data.humidity);
                    updateProgressCircle(latestHumidity);
                },
                error: function (xhr, status, error) {
                    console.log("Error in AJAX request: " + error);
                }
            });
        }

        function updateChart() {
            $.ajax({
                url: 'get_lastest_humidity.php',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    var label = new Date().toLocaleTimeString();
                    var value = parseFloat(data.humidity);
                    addData(myChart, label, value);
                },
                error: function (xhr, status, error) {
                    console.log("Error in AJAX request: " + error);
                }
            });
        }

        function updateCombined() {
            fetchLatestHumidity();
            updateChart();
        }

        // Mettez à jour la valeur initiale en chargeant la page
        fetchLatestHumidity();

        // Mettez à jour la valeur toutes les X millisecondes (par exemple, toutes les 5 secondes)
        setInterval(updateCombined, 5000);
    </script>
              

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
                    <div><a href="../adminn/deletefeedt.php?f_id=<?php echo $user['f_id']; ?>" class="delete highlighted">
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
       
  
    </div>
</body>
</html>