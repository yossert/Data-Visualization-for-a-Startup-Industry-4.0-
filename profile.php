
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta charset="X-UI-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        

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
        

        
            <main>
                <h1>Admin Profile</h1>
                <div class="date">
                <input type="date" />
                </div>
            </main>  
            <?php include('changerpass.php'); ?>
            
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
</div>
            <script src="script.js"></script>
    
        
    </body>
    </html>