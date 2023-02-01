<?php 
$title="sing up";
$admin = "";
 session_start();
 

include "include/new_intl.php";
include "new_navigation.php";

// include "include/lang/arabic.php";

$error  =  array("name"=>"" , "pass" => "" , "email"=>"" ,"number" => "");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = filter_var($_POST["name"] , FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"] , FILTER_SANITIZE_EMAIL);
    $desc = filter_var($_POST["u_desc"] , FILTER_SANITIZE_STRING);
    $number = filter_var($_POST["number"] , FILTER_SANITIZE_NUMBER_INT);
    $number = filter_var($_POST["number"] , FILTER_SANITIZE_NUMBER_INT);
    $pass1 = filter_var($_POST["password1"] , FILTER_SANITIZE_STRING);
    $pass2= filter_var($_POST["password2"] , FILTER_SANITIZE_STRING);
    $shapass = password_hash($pass1 , PASSWORD_DEFAULT);
    
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
        $q = $con->prepare("INSERT INTO users (u_name , u_email ,u_pass  , u_des ,  u_number ,`data` , u_group  ) 
         VALUES (?,?,?,?,?,now(), 0)");
        $q->execute(array($name , $email , $shapass , $desc , $number  ));
        echo $massege. '<meta http-equiv="refresh" content="1; url=new_index.php?wellcom"> ';   

  
 }




}
?>
        <div class="container">
             <div class="form_container col-sm-12 <?php echo $algin;?> ">
                 <div class="text-center">
                 <img src="<?php echo $img?>profile.svg" alt="" class="login_profile sing_up">
                 </div>
             <h3 class="text-center"><?php la("join_us")?></h3>
             <form class="form-horizontal  " action=<?php echo $_SERVER["PHP_SELF"] ;?>  method="post">
       
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
                                <lable class="control-lable col-sm-2"><?php la("desc") ?>:</lable>
                            <div class=" input_container">
                                    <input type="text" placeholder="<?php la("desc_plac") ?> "
                                    class="form-control" name=u_desc>

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
                                    <input type="password" placeholder="<?php la("passwoerd_agin") ?>"
                                    class="form-control" name=password2>
                            </div>
                            <h6 class="error"><?php echo $error["pass"]?></h6>
                    </div>
        <div class="margin_bottom">

        <input type="submit" class="btn bg_main btn-login btn-sm m-2" name="send" value="<?php la("login") ?>">

        </div>


</form>
             </div>   
</div> 
<div class="m-5"></div> 

<?php


include "include/new_footer_section.php";
include "include/new_footer.php";


?>