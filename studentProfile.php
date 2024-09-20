<?php
if(!isset($_SESSION)){
    session_start();
}

include('../stuInclude/header.php');
include_once('../dbConnection.php');

if(!isset($_SESSION['is_login'])){
    if (isset($_SESSION['stuLogEmail'])) {
        // Accédez à $_SESSION['stuLogEmail'] en toute sécurité ici
        $stuLogEmail = $_SESSION['stuLogEmail'];
        // Le reste de votre code...
    } else {
        // La clé n'est pas définie, gestion d'erreur ou redirection
        echo "La session n'est pas correctement définie.";
        // Redirection vers la page de connexion par exemple
        // header("Location: login.php");
        exit();
    }
} else {
    echo"<script> location.href='../index.php'; </script>";
}

$sql="SELECT * FROM student WHERE stu_email='$stuEmail'"; 
    $result = $conn -> query($sql);
    if($result->num_rows == 1){
        $row = $result ->fetch_assoc();
        $stuId=$row["stu_id"];
        $stuName=$row["stu_name"];
        $stuOcc=$row["stu_occ"];
        $stu=$row["stu"];
    }

    if(isset($_REQUEST['updateStuNameBtn'])){
        if(($_REQUEST['stuName'] == "")){
            //msg displayed if required filed missing
            $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
        } else {
            $stuName=$_REQUEST["stuName"];
            $stuOcc=$_REQUEST["stuOcc"];
            $stu=$_REQUEST["stu"]['name'];
            $stu_image_temp = $_Files['stu']['tmp_name'];
            $img_folder ='../image/user/'.$stu_image;
            move_uploaded_file($stu_image_temp, $img_folder);
            $sql = "UPDATE student SET ntu_name ='$stuName',stu_occ='$stuOcc',stu_img='$img_folder' WHERE stu_email='$stuEmail'";
            if($conn->query($sql) == TRUE){
                //bellow msg display on form submit success
                $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully</div>';
            } else {
                //below msg display on form submit failed
                $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Updated</div>';
            }
        }
    }

    ?>

    <div class="col-sm-6 mt-5">
        <form class="mx-5" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="stuID">Student Id</label>
                <input type="text" claass="form-control" id="stuId" name="stuId" value=" <?php if(isset($stuId)) {echo $stuId;}?>" readonly >
            </div>
            <div class="form-group">
            <label for="stuEmail">Email</label>
                <input type="email" claass="form-control" id="stuEmail" name="stuEmail" value=" <?php echo $stuEmail ?>" readonly >
            </div>
            <div class="form-group">
            <label for="stuName">Name</label>
                <input type="text" class="form-control" id="stuName" name="stuName" value=" <?php if(isset($stuName)) {echo $stuName;}?>" >
            </div>
            <div class="form-group">
            <label for="stuOcc">Occupation</label>
                <input type="text" claass="form-control" id="stuOcc" name="stuOcc" value=" <?php if(isset($stuOcc)) {echo $stuOcc;}?>" >
            </div>
            <div class="form-group">
            <label for="stu">Upload Image</label>
                <input type="file" claass="form-control-file" id="stu" name="stu">
            </div>
            <button type="submit" class="btn btn-primary" name="updateStuNameBtn">Update</button>
            <?php if (isset($passmsg)){echo $passmsg;}?>
        </form>
    </div> <!-- close row div from header file-->

    

