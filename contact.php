
<?php
include('./dbConnection.php');
        if (empty($_REQUEST['name']) || empty($_REQUEST['subject']) || empty($_REQUEST['email']) || empty($_REQUEST['message'])) {
            // Message affiché si l'un des champs requis est manquant
            $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
        } else {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $sql= "INSERT INTO contact (contact_name,contact_email,subject,msg) VALUES ('$name', '$email', '$subject', '$message')";
        if ($conn->query($sql) == TRUE) {
            //bellow msg display on form submit success
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Submit Successfully</div>';
        } else {
            //below msg display on form submit failed
            $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Submit: ' . $conn->error . '</div>';
            echo "MySQL Error: " . $conn->error; // Message de débogage
        }}
        


?>


<!--start contact us -->
<div class="container mt-4" id="contact-us">
    <!--start contact us container-->
    <h1 class="text-center mb4 tit">Contact Us</h1><br>
    <!--contact us heading-->
    <div class="row">
        <!--start contact us row-->
        <div class="col-md-8">
            <!--start contact us 1st column-->
            <form action="" method="post">
                <input type="text" class="form-control" name="name" placeholder="Name"><br>
                <input type="text" class="form-control" name="subject" placeholder="Subject"><br>
                <input type="email" class="form-control" name="email" placeholder="E-mail"><br>
                <textarea class="form-control" name="message" placeholder="How can we help you?" style="height:150px;"></textarea><br>
                <input class="btn btn-primary btn-pink btn-lg" type="submit" value="Send" name="submit"> <?php echo  $passmsg; ?>
            </form>
        </div>
        <!--end contact us 1st column-->
        <div class="col-md-4 stripe text-white text-center">
            <!--start contact us 2nd column-->
            <h4>4IOT</h4>
            <p>4IOT,
                Near Police Camp II , Bokaro,
                Jharkhand - 834005<br/>
                Phone: +00000000<br/>
                www.4IOT.com
            </p>
        </div>
        <!--end contact us 2nd column-->
    </div> <!--end contact us row-->
</div><!--end contact us container-->

<!--end contact us -->