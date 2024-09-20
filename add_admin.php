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
        <link rel="stylesheet" href="style_admin.css" />
        <title>Admin Dashboard</title>
    </head>
    <body>
        <div class="container">
            <!-- aside section start -->
            <aside>
            <div class="top">
                <div class="logo">
                <img src="images/logo.jpeg" />
                <h2>4<span class="danger">IOT</span></h2>
                </div>
                <div class="close" id="close-btn">
                <span class="material-icons-sharp">close</span>
                </div>
            </div>
            <!-- end top -->
            <div class="sidebar">
                <a href="index.php">
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
                
                
                <a href="#">
                <span class="material-icons-sharp">calendar_month</span>
                <h3>Calendar</h3>
                </a>
                <a href="#">
                <span class="material-icons-sharp">stacked_line_chart</span>
                <h3>Line Graph</h3>
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
                <h1>List Users</h1>
                <div class="date">
                <input type="date" />
                </div>
                
                <div class="list">
                
                <table>
                    <thead>
                    <tr>
                    <th class="warning">Id Admin</th>
                        <th class="warning">Photo Admin</th>
                        <th class="warning">Member Name</th>
                        <th class="warning">Email Address</th>
                        <th class="warning">occupation</th>
                        <th class="warning">Topic</th>
                        <th class="warning">Action</th>
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
                        <td></td>
                        <td></td>
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
                    <h2>Recent Updates</h2>
                    <div class="update">
                        <div class="profile-photo">
                        <img src="images/logo.jpeg" alt="">
                    </div>
                <div class="message">
                    <p><b>NOM</b> noticed that....</p>
                </div>
                </div>
                <div class="update">
                <div class="profile-photo">
                    <img src="images/logo.jpeg" alt="">
                </div>
                <div class="message">
                    <p><b>NOM</b> noticed that....</p>
                </div>
                </div>
                <div class="update">
                <div class="profile-photo">
                    <img src="images/logo.jpeg" alt="">
                </div>
                <div class="message">
                    <p><b>NOM</b> noticed that....</p>
                </div>
                </div>
            </div>
            </div>
            <!-- recent update end -->
            </div>
            <!-- right section end -->
            
            </div>
            <script src="script.js"></script>
    
        
    </body>
    </html>