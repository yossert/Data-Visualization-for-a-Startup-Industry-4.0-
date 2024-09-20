<?php
if(!isset($_SESSION)){
    session_start();
}
include('../stuInclude/header_feedback.php');
include('../dbConnection.php');

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
    }
    if(isset($_REQUEST['submitFeedbackBtn'])){
        if(($_REQUEST['f_content'] == "")){
            //msg displayed if required field missing
            $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
        } else {
            $fcontent = $_REQUEST["f_content"];
            $sql= "INSERT INTO feedback (f_content, stu_id) VALUES ('$fcontent', '$stuId')";
            if($conn->query($sql) == TRUE){
                //bellow msg display on form submit success
                $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Submit Successfully</div>';
            } else {
                //below msg display on form submit failed
                $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Submit </div>';
            }
        }
    }
?>

<div class="col-sm-6 mt-5">
    <form  class="mx-5" method="POST" enctype="multipart/form-data">
        <div class="form-group b">
            <label for="stuId"><span class="material-symbols-outlined">key</span>&nbsp;&nbsp;ID</label>
            <input type="text" calss="form-control" id="stuId" name="stuId" value="<?php if(isset($stuId)) {echo $stuId;}?>" readonly>
        </div>
        <div class="form-group b">
            <label for="f_content"><span class="material-symbols-outlined">forum</span>&nbsp;&nbsp;Write Feedback</label>
            <textarea class="form-control" id="f_content" name="f_content" row=2></textarea>
        </div>
        <button type="submit" class="btn btn-primary" style="background-color: #97062a; border-color: #97062a" name="submitFeedbackBtn">Submit</button>
            <?php if (isset($passmsg)){echo $passmsg;}?>
        </form>
    </form>
</div>
</div> <!-- close row div from header file-->

    <?php
    include('../stuInclude/footer.php');?>

