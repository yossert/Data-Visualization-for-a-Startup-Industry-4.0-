//ajax call for login verification
function checkAdminLogin(){
    console.log("button clicked");
    var adminLogEmail =$("#adminLogemail").val();
    var adminLogPass =$("#adminLogpass").val();
    console.log("Email:", adminLogEmail);
    console.log("Password:", adminLogPass);
    $.ajax({
        url: 'Admin/adminDashboard.php',
        method : "POST",
        data:{
            checkLogemail: "checklogmail",
            adminLogEmail: adminLogEmail,
            adminLogPass: adminLogPass,
        },
        success:function(data){
        //console.log(data);
        if(data == 0){
            $("#statusAdminLogMsg").html("<span  class='alert alert-danger'>Invalid Email or Password !</small>");
        } else if(data == 1){
            $("#statusAdminLogMsg").html("<span  class='alert alert-success'>Success Loading ...</small>");
            setTimeout(()=>{
                window.location.href ="Admin/adminDashboard.php";
            },1000);
        }
        },
    });
}