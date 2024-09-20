<?php 
    if(!isset($_SESSION)){
    session_start();
    }
    include('../dbConnection.php');
    if(isset($_SESSION['is_admin_login'])){
        $adminEmail = $_SESSION['adminLogEmail'];
    }
    else{
        echo"<script> location.href='../index.php';</script>";
    }
    $adminEmail =$_SESSION['adminLogEmail'];
    if(isset($_REQUEST['adminPassUpdatebtn'])){
        if(($_REQUEST['adminPass'] == "")){
        // msg displayed if required field missing
        $passmsg='<div class="alert alert-warning col-sm-6 ml-5 mt-2"
        role="alert"> fill all fileds </div>';
        }
        else{
            $sql="SELECT * FROM admin WHERE admin_email='$adminEmail'";
            $result = $conn ->query($sql);
            if($result->num_rows == 1){
                $adminPass = $_REQUEST['adminPass'];
                $sql="UPDATE admin SET admin_pass='$adminPass' WHERE admin_email='$adminEmail'";
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

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta charset="X-UI-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" integrity="sha384-Tw0WjL/U9/J97t6ZATLZlZm9/GEdC6FU9K5rfaFV6S4Ems/T4Fo9TCzF36Jw5" crossorigin="anonymous">
<link rel="stylesheet" href="style_admin.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
    <body>

<div class="col-sm-9 mt-5">
                    <div class="row">
                        <div class="col-sm-6">
                            <form class="mt5 mx-5">
                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" class="form-control" id="inputEmail" value="<?php echo $adminEmail ?>" readonly>
                                </div>
                                <div class="form-group">
                                <label for="inputnewpassword">New Password</label>
                                    <input type="text" class="form-control" id="inputnewpassword" placeholder="New Password" name="adminPass">
                                </div>
                                <button type="submit" class="btn btn-danger mr-4 mt-4" name="adminPassUpdatebtn">Update</button>
                                <button type="reset" class="btn btn-secondary mt-4">Reset</button>
                                <?php 
                                if(isset($passmsg)) {echo $passmsg;}
                                ?>
                            </form>
                        </div>
                    </div>
                
                
                
                
                </div>
        </body>
</html>