<?php
if(!isset($_SESSION)){
    session_start();
}

include('../stuInclude/header.php');
include_once('../dbConnection.php');

if (!isset($_SESSION['is_login'])) {
    if (isset($_SESSION['stuLogEmail'])) {
        $stuLogEmail = $_SESSION['stuLogEmail'];
    } else {
        echo "La session n'est pas correctement définie.";
        exit();
    }
}



$sql = "SELECT * FROM student WHERE stu_email='$stuLogEmail'";

    $result = $conn -> query($sql);
    if($result->num_rows == 1){
        $row = $result ->fetch_assoc();
        $stuId=$row["stu_id"];
        $stuName=$row["stu_name"];
        $stuOcc=$row["stu_occ"];
        $stu_img=$row["stu_img"];
    }

    if(isset($_REQUEST['updateStuNameBtn'])){
        if(($_REQUEST['stuName'] == "")){
            //msg displayed if required filed missing
            $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
        } else {
            $stuName=$_REQUEST["stuName"];
            $stuOcc=$_REQUEST["stuOcc"];
            $stu_image=$_FILES["stu_img"]['name'];
            $stu_image_temp = $_FILES['stu_img']['tmp_name'];
            $img_folder ='../image/user/'.$stu_image;

            // Assurez-vous que le répertoire de destination existe
            if (!file_exists('../image/user/')) {
                mkdir('../image/user/', true);
            }
            $sql = "UPDATE student SET stu_name ='$stuName',stu_occ='$stuOcc',stu_img='$img_folder' WHERE stu_email='$stuLogEmail'";
            if($conn->query($sql) == TRUE){
                //bellow msg display on form submit success
                $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully</div>';
            } else {
                //below msg display on form submit failed
                $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update: ' . $conn->error . '</div>';
            }
        }
    }

    ?>

    <div class="col-sm-6 mt-5">
        <form class="mx-5" method="POST" enctype="multipart/form-data">
            <div class="form-group b">
                <label for="stuID"><span class="material-symbols-outlined">key</span>&nbsp;&nbsp;Student Id</label>
                <input type="text" class="form-control" id="stuId" name="stuId" value=" <?php if(isset($stuId)) {echo $stuId;}?>" readonly >
            </div>
            <div class="form-group b">
            <label for="stuLogEmail"><span class="material-symbols-outlined">mark_email_read</span>&nbsp;&nbsp;Email</label>
            <input type="email" class="form-control" id="stuLogEmail" name="stuLogEmail" value=" <?php echo $stuLogEmail ?>" readonly >

            </div>
            <div class="form-group b">
            <label for="stuName"><span class="material-symbols-outlined">badge</span>&nbsp;&nbsp;Name</label>
                <input type="text" class="form-control" id="stuName" name="stuName" value=" <?php if(isset($stuName)) {echo $stuName;}?>" >
            </div>
            <div class="form-group b">
            <label for="stuOcc"><span class="material-symbols-outlined">work</span>&nbsp;&nbsp;Occupation</label>
                <input type="text" class="form-control" id="stuOcc" name="stuOcc" value=" <?php if(isset($stuOcc)) {echo $stuOcc;}?>" >
            </div>
            <div class="form-group b">
            <label for="stu"><span class="material-symbols-outlined">add_photo_alternate</span>&nbsp;&nbsp;Upload Image</label>
                <input type="file" class="form-control-file" id="stu_img" name="stu_img">
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #97062a; border-color: #97062a" name="updateStuNameBtn">Update</button>

            <?php if (isset($passmsg)){echo $passmsg;}?>
        </form>
    </div> <!-- close row div from header file-->

    
</div>
</div>
<br><br><br>
    <?php
    include('../stuInclude/footer.php');?>

