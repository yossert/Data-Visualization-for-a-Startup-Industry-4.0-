$(document).ready(function(){
    //ajax call form already exist email verification
    $("#stuemail").on("keypress blur", function(){
        var reg= /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var stuemail =$("#stuemail").val();
        $.ajax({
            url:'visitor/addvisitor.php',
            method:'POST',
            data:{
                checkemail: "checkmail",
                stuemail:stuemail,
            },
            success:function(data){
                //console.log(data);
                if(data !=0){
                    $("#statusMsg2").html('<small style="color:red;">Email Already Used !</small>');
                    $("#signup").attr("disabled", true);
                } else if(data ==0 &&reg.test(stuemail)){
                    $("#statusMsg2").html('<small style="color:green;">There You Go !</small>');
                    $("#signup").attr("disabled", false);
                } else if(!reg.test(stuemail)){
                    $("#statusMsg2").html('<small style="color:red;">Please Enter vlaid Email ! e.g example@gmail.com</small>');
                    $("#signup").attr("disabled", false);
                }
                if(stuemail == ""){
                    $("#statusMsg2").html('<small style="color:red;">Please Enter Email !</small>');  
                }
            },
        });
    });
});

function addStu(){
    var reg= /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var stuname= $("#stuname").val();
    var stuemail= $("#stuemail").val();
    var stupass= $("#stupass").val();
    

    //checking form fields on form submission

    if(stuname.trim() == ""){
        $("#statusMsg1").html('<small style="color:red;">Please Enter Name !</small>');
        $("#stuname").focus();
        return false;
    } else if(stuemail.trim() == ""){
        $("#statusMsg2").html('<small style="color:red;">Please Enter Email !</small>');
        $("#stuemail").focus();
        return false;
    }
    else if(stuemail.trim()!= "" && !reg.test(stuemail)){
        $("#statusMsg2").html('<small style="color:red;">Please Enter vlaid Email ! e.g example@gmail.com</small>');
        $("#stuemail").focus();
        return false;
    }
    else if(stupass.trim() == ""){
        $("#statusMsg3").html('<small style="color:red;">Please Enter Password !</small>');
        $("#stupass").focus();
        return false;
    }
    else{

        $.ajax({
            url:'visitor/addvisitor.php',
            method:'POST',
            dataType:"json",
            data:{
                stusignup :"stusignup",
                stuname: stuname,
                stuemail: stuemail,
                stupass: stupass,
            },
            success:function(data){
                console.log(data)
                if(data == "OK"){
                    $('#successMsg').html("<span class='alert alert-success'>Registration Successful !</span>");
                    clearstuRegField();
                }
                
                else if(data =="Failed"){
                    $('#successMsg').html("<span  class='alert alert-danger'>Unable to Register !</span>");
                }
            },
    
        });
    }

    }

    //empty all fields
    function clearstuRegField(){
        $("#stuRegForm").trigger("reset");
        $("#statusMsg1").html("");
        $("#statusMsg2").html("");
        $("#statusMsg3").html("");

    }


    //ajax call for login verification
    function checkStuLogin(){
        // console.log("login clicked");
        var stuLogEmail =$("#stuLogemail").val();
        var stuLogPass =$("#stuLogpass").val();
        $.ajax({
            url:'visitor/addvisitor.php',
            method : "POST",
            data:{
                checkLogemail: "checklogmail",
                stuLogEmail: stuLogEmail,
                stuLogPass: stuLogPass,
            },
            success:function(data){
            //console.log(data);
            if(data == 0){
                $("#statusLogMsg").html("<span  class='alert alert-danger'>Invalid Email or Password !</small>");
            } else if(data == 1){
                $("#statusLogMsg").html("<div class='spinner-border text-success' role='status'></div>");
                setTimeout(()=>{
                    window.location.href ="index.php";
                },1000);
            }
            },
        });
    }