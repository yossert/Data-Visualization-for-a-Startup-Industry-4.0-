<?php 
    if(!isset($_SESSION)){
    session_start();
    }
    include('../stuInclude/header_changpass.php');
    include('../dbConnection.php');
    
    if(isset($_SESSION['is_login'])){
        $stuEmail = $_SESSION['stuLogEmail'];
    }
    else{
        echo"<script> location.href='../index.php';</script>";
    }
    $stuEmail =$_SESSION['stuLogEmail'];
    if(isset($_REQUEST['stuPassUpdatebtn'])){
        if(($_REQUEST['stuNewPass'] == "")){
        // msg displayed if required field missing
        $passmsg='<div class="alert alert-warning col-sm-6 ml-5 mt-2"
        role="alert"> fill all fileds </div>';
        }
        else{
            $sql="SELECT * FROM student WHERE stu_email='$stuEmail'";
            $result = $conn ->query($sql);
            if($result->num_rows == 1){
                $stuPass = $_REQUEST['stuNewPass'];
                $sql="UPDATE student SET stu_pass='$stuPass' WHERE stu_email='$stuEmail'";
                $result=$conn->query($sql);
                if($conn->query($sql)==TRUE){
                    //BELOW MSG display on form submit success
                    $passmsg='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';
                }
                else{
                    //BELOW MSG display on form submit success
                    $passmsg='<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to update</div>';
                }
                }
            }
        }
    
?>

<div class="col-sm-9 mt-5">
    <div class="row">
        <div class="col-sm-6">
            <form class="mt5 mx-5" method="POST">
                <div class="form-group b">
                    <label for="inputEmail"><span class="material-symbols-outlined">mail</span>&nbsp;&nbsp;Email</label>
                    <input type="email" class="form-control" id="inputEmail" value="<?php echo $stuEmail ?>" readonly>
                </div>
                <div class="form-group b">
                    <label for="inputnewpassword"> <span class="material-symbols-outlined">autorenew</span>&nbsp;&nbsp;New Password</label>
                    <input type="password" class="form-control" id="inputnewpassword" placeholder="New Password" name="stuNewPass">
                </div>
                <button type="submit" class="btn btn-danger mr-4 mt-4" style="background-color: #97062a; border-color: #97062a" name="stuPassUpdatebtn">Update</button>
                <button type="reset" class="btn btn-secondary mt-4">Reset</button>
                <?php 
                    if(isset($passmsg)) {echo $passmsg;}
                ?>
            </form>
        </div>
    </div>
</div>

<?php
include('../stuInclude/footer.php');
?>