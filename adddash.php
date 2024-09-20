    <?php
    function getAllUsers()
    {
        $servername = "localhost";
        $DBuser = "root";
        $password = "";
        $DBname = "miniprojet";
        $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req = "select * from student";
        $resultat = $conn->query($req);
        $users = $resultat->fetchAll();
        return $users;
    }
    $users = getAllUsers();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta charset="X-UI-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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


        <link rel="stylesheet" href="style_admin.css" />
        <title>Admin Dashboard</title>
    </head>
    
    <body>
        <div class="container">
            <!-- aside section start -->
            <aside>
            <div class="top">
                <div class="logo">
                <img src="../image/logo (2).jpg" />
                <h2>4<span class="danger">IOT</span></h2>
                </div>
                <div class="close" id="close-btn">
                <span class="material-icons-sharp">close</span>
                </div>
            </div>
            <!-- end top -->
            <div class="sidebar">
                <a href="adddash.php" class="active">
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
                
                
                <a href="#">
                <span class="material-icons-sharp">calendar_month</span>
                <h3>Calendar</h3>
                </a>
                <a href="./changerpass.php">
                <span class="material-symbols-outlined">lock</span>
                <h3>Change Password</h3>
                </a>
                <a href="#">
                <span class="material-icons-sharp">incomplete_circle</span>
                <h3>Pie Chart</h3>
                </a>
                <a href="#">
                <span class="material-icons-sharp">logout </span>
                <h3>Logout</h3>
                </a>
            </div>
            </aside>
            <!-- aside section end -->
            <main>
                <h1>Dashboard</h1>
                <div class="date">
                <input type="date" />
                </div>
                <div class="insights">
                <!-- xtart topics-->
                <div class="topics">
                    <span class="material-icons-sharp">topic</span>
                    <div class="middle">
                    <div class="left">
                        <h3>Total Topics</h3>
                        <h1>$25.024</h1>
                    </div>
                    <div class="progress">
                        <svg>
                        <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="number"><p>81%</p></div>
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
                        <h1>$25.024</h1>
                    </div>
                    <div class="progress">
                        <svg>
                        <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="number">
                        <p>81%</p>
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
                        <h1>$25.024</h1>
                    </div>
                    <div class="progress">
                        <svg>
                        <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="number">
                        <p>81%</p>
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
                        <th class="warning">occupation</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($users as $user){  
                        print '<tr>
                        <td>'.$user['stu_id'].'</td>
                        <td>'.$user['stu'].'</td>
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
                    <img src="images/logo.jpeg">
                    </div>
                </div>
                </div>
                <!-- top section end -->
                <!-- recent update start -->
            <div class="recent_updates">
                <h2>Recent Updates</h2>
        <div class="updates">
            
        </div>
            <script src="script.js"></script>
    
        
    </body>
    </html>