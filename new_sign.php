<?php
$title="sing up";
 session_start();
 
 if(isset($_COOKIE["u_admin_id"])){
     header("location: home.php"); }

include "include/new_intl.php";
include "new_navigation.php";
$error  = array("name"=>"" , "pass" => "" , "email"=>"" ,"number" => "");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = filter_var($_POST["name"] , FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"] , FILTER_SANITIZE_EMAIL);
    $number = filter_var($_POST["number"] , FILTER_SANITIZE_NUMBER_INT);
    $pass1 = filter_var($_POST["password1"] , FILTER_SANITIZE_STRING);
    $pass2= filter_var($_POST["password2"] , FILTER_SANITIZE_STRING);
    $shapass = password_hash($pass , PASSWORD_DEFAULT);
    
    // $pass = filter_var($_POST["pass"] , FILTER_SANITIZE_STRING);
   
    // testing the inputs to system
        $checkemail = checkExist( "*" , "users" , " u_email = '$email'" );
        // check err on the input 
    if(empty($name)){
        $error["name"]= "name cant be empty";
    }elseif(strlen($name) < 8){
        $error["name"] = "this is less than request";
    }
    if(empty($email)){
        $error["email"]= "name cant be empty";
    }elseif(strlen($email) < 8){
        $error["email"] = "this is less than request";
    }elseif(! $checkemail == 0){

        $error["email"] = "this emial is exiest";
    }
    if(empty($number)){
        $error["number"]= "there is no email";
    }elseif(strlen($number) < 8){
        $error["number"] = "that email in not exiest ";
    }
    if(empty($pass1)){
        $error["pass"]= "name cant be empty";
    }
    elseif(strlen($pass1) < 8){
        $error["pass"] = "this is less than request";
    }elseif($pass1 !== $pass2){
        $error["pass"] = "there is no matched";
    }
    if(!array_filter($error)){
        $q = $con->prepare("INSERT INTO users (u_name , u_email ,u_pass  ,descriptions ,  u_number ,`data` , u_group  ) 
         VALUES (?,?,?,?,?,now(),1)");
        $q->execute(array($name , $email , $shapass , "" , $number  ));
        $massege = '<div class="alert alert-success">1 recored insert</div>' ;



     $fetchUserData = $con->prepare("SELECT * FROM users where u_name = ? and u_pass = ? and u_email = ? limit 1");
     $fetchUserData->execute(array($name ,$shapass , $email));
     $userData = $fetchUserData->fetch();
     $_SESSION["userData"] = $userData;
     setcookie("u_admin_id" ,   $usrDat["u_id"]   ,  time() + ( 200000 *10000 ) , "/");

    header("location: home.php?wellcom");

 }




}
?>
        <div class="container">
             <div class="form_container col-sm-12 <?php echo $algin;?> ">
                 <div class="text-center">
                 <img src="<?php echo $img?>profile.svg" alt="" class="login_profile sing_up">
                 </div>
             <h3 class="text-center">sing up </h3>
             <form class="form-horizontal  " action=<?php echo $_SERVER["PHP_SELF"] ;?>    method="post">
       
                <div class="form-group form-group-lg">
                        
                            <lable class="control-lable col-sm-2"><?php la("name") ?>:</lable>
                        <div class=" input_container">
                            <input type="text" placeholder="<?php la("placeholder_name") ?>" 
                            class=form-control name=name required>

                        </div>
                        <h6 class="error"><?php echo $error["name"]?></h6>


                </div>
                        
                        
                    <div class="form-group form-group-lg">
                                <lable class="control-lable col-sm-2"><?php la("email") ?>:</lable>
                            <div class=" input_container">
                                    <input type="text" placeholder="<?php la("placeholder_email") ?> "
                                    class="form-control" name=email>

                            </div>
                            <h6 class="error"><?php echo $error["number"]?></h6>

                    </div>
                    <div class="form-group form-group-lg">
                                <lable class="control-lable col-sm-2"><?php la("number") ?>:</lable>
                            <div class=" input_container">
                                    <input type="text" placeholder="<?php la("placeholder_number") ?>"
                                    class="form-control" name=number>

                            </div>
                            <h6 class="error"><?php echo $error["number"]?></h6>

                    </div>
                    <div class="form-group form-group-lg">
                                <lable class="control-lable col-sm-2"><?php la("password") ?>:</lable>
                            <div class=" input_container">
                                    <input type="password" placeholder="<?php la("placeholder_pass") ?>"
                                    class="form-control" name=password1>
                            </div>
                            <h6 class="error"><?php echo $error["pass"]?></h6>

                    </div>
                    <div class="form-group form-group-lg">
                                <lable class="control-lable col-sm-2"><?php la("passwoerd_agin") ?>:</lable>
                            <div class=" input_container">
                                    <input type="password" placeholder="<?php la("placeholder_pass") ?>"
                                    class="form-control" name=password2>
                            </div>
                            <h6 class="error"><?php echo $error["pass"]?></h6>
                    </div>
        <div class="margin_bottom">
        <input type="submit" class="btn btn-primaryy btn-login btn-sm " name="send" value="<?php la("login") ?>">

        </div>


        <h6><a href="login.php"><?php la("did_you_have_acount") ?> </a></h6>
        
</form>
             </div>   
</div>  

<?php


include "include/new_footer_section.php";
include "include/new_footer.php";
