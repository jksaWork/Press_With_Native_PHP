
<?php 
    session_start();

    $title ="mange users";
    if(isset($_COOKIE["u_admin_name"])){
        include "include/intl.php";
        include "include/check_member.php";
        include "include/new_navigation.php";
        $id =$_COOKIE["u_admin_id"];
        $group = $_COOKIE["u_admin_group"];
        $admin =  is_admin($group) ? "show" : "hidden";  
      
      

    }else{
        header("location: index.php");
    }
            $do = isset($_GET["do"]) ? $_GET["do"]: "file";
           

              if($do == "file") { 
             

                    if(isset($_GET["mange"])){
                        if($_GET["mange"] == "unactive"){
                            $where = "WHERE u_group = 0";
                            $unactive = "";
                        }elseif ($_GET["mange"]) {
                          $where = "WHERE u_group  != 0";
                          $active = "";
                            
                        }
                    }else{
                        $where = "";
                        $all="";
                    }

                $q =$con->prepare("SELECT  *   FROM `users`  $where  order by u_id DESC  limit 10 ");
                $q->execute();
                $posts = $q->fetchAll();
              
            //    $src= $_SERVER["DOCUMENT_ROOT"];
             
                  ?>
              <div class="container">
                 <h2 class="text-center"><?php la("mange_users")?></h2>  
    <div class="fack_title right mt-5 mb-3 margin_top_bottom"> <h5><?php la("mange_users")?><span><i class="fa fa-chevron-left"></i></span> <?php la("users")?> <span><i class="fa fa-chevron-left"></i></span> <?php la("cp")?> </h4></div>
          
    <section class="data_container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link <?php if(isset($all)){echo "active" ;}?>" href="new_users.php"><?php la("all")?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link activeate <?php if(isset($active)){echo "active" ;}?>" href="?mange=active" ><?php la("active")?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link unactiveate <?php if(isset($unactive)){echo "active" ;}?>"  href="?mange=unactive" ><?php la("un_active")?></a>
  </li>
</ul>
<div class="tab-content">
<?php foreach ( $posts as $user ): 
    
    ?>

       <div>      
     
  
          <div class="min_size_view list_veiw">
              <div class="img_post_min_size">
                    <?php if(empty($user["u_profile"])){?>
                      <img src="<?php echo $img ?>alwifaq.png" alt="not found " class="circal">
                    <?php }else{?>
                    <img src="<?php echo $user["u_profile"]; ?>" alt="not fund " >

                       <?php }?>
               </div>
               <div class="head_post_min_size right">
                          <h4> <?php echo $user["u_name"]?></h4>
                          </div>
               <div class="col-md-2">
               <ul class="langague  custom_option left_30">
                        <div class=" custom_options_div">
                            <div class="point">
                              <span></span>
                              <span></span>
                              <span></span>
                           </div>
                           <ul class="list_of_langaue large_width post_shape">
                                <li class=""> <a href="show.php?do=users&id=<?php echo $user["u_id"]; ?>&&name=<?php echo $user["u_name"]?>>" > <?php la("info")?></a></li>
                                <li class="<?php echo $admin ; ?>"> <a href="new_users.php?do=active&id=<?php echo $user["u_id"]?> "><?php la("add")?></a></li>
                                <li  class="<?php echo $admin ; ?>"> <a  href="new_users.php?do=delete&id=<?php echo $user["u_id"]?> " ><?php la("delete")?></a></li>
                                <li  class="<?php echo $admin ; ?>"> <a  href="new_users.php?do=edit&id=<?php echo $user["u_id"]?> " ><?php la("edit")?></a></li>
                                <li  class="<?php echo $admin ; ?>"> <a  href="new_users.php?do=improve&id=<?php echo $user["u_id"]?> " ><?php la("improve")?></a></li>
                                                  
                            </ul>   
                       </div>
                </ul>
               </div>

                </div>
                    
                
           
                    <?php endforeach ;?>
                    <div class="more_post">
                    <div class="container">
                        <span class="btn btn-primaryy mt-4 bg_main" onclick="get_post(1 ,<?php echo $posts[0]['u_id'];?> , 'users' )"><?php la("show_more")?> <span><i class="fa fa-eye ml-1 mr-1"></i></span> </span>                
                        <script>
     function get_post(  page_pram , num_pram , where_pram ){

            
                $.ajax({
                        method : "POST",
                        url: "ajax_method users.php" , 
                        data: { page : page_pram, num: num_pram , where : where_pram },
                         success:function(response){
                         
                                 $(".more_post").html( response);
                         },
                         error:function () {
                            
                         }
                });
        }
        </script>                </div>
                        </div>
                    
                    <?php if(count($posts) == 0){ ?>

              <div class="alert alert-sucsess">thre is no users to show </div>

                    <?php }?>
                    </div>

                        </div>
                        </div>

                        </div>
                        <div class="container">
                        <div class="<?php echo $algin?>">
                        <a href="?do=add" class="btn btn-primaryy mt-4 bg_main"><?php la('add_new_user')?><span><i class="fa fa-plus ml-2 mr-2"></i></span> </a>
                        </div>
                        </div>
                    </section>
               

                        
                        </div>

                        </div>



                        </div>


            <?php } elseif ($do == "add") {

                ?>
                <div class="new_container">
                <div class="container ">
    <div class="fack_title right mt-5 mb-3 margin_top_bottom"> <h5> <?php la("add_users")?>  <span><i class="fa fa-chevron-left"></i></span> <?php la("member")?> <span><i class="fa fa-chevron-left"></i></span> <?php la("cp")?> </h4></div>

                <div class="form_container col-sm-12 <?php echo $algin?>">
                <form class="form-horizontal <?php echo $algin?> " action='<?php echo $_SERVER["PHP_SELF"] ;?>?do=insert'    method="post" enctype="multipart/form-data">
          
                   <div class="form-group form-group-lg ">
                           
                               <lable class="control-lable col-sm-2"><?php la("name")?>:</lable>
                           <div class=" input_container">
                               <input type="text" placeholder="<?php la("placeholder_name")?>" 
                               class=form-control name=name required>
                           </div>
   
                   </div>
                   <div class="form-group form-group-lg">
                           
                           <lable class="control-lable col-sm-2"><?php la("des");?>:</lable>
                       <div class=" input_container">
                           <input type="text" placeholder="<?php la("des_pl"); ?>" 
                           class=form-control name=discriptions >
                       </div>

               </div>
                           
                           
                       <div class="form-group form-group-lg">
                                   <lable class="control-lable col-sm-2"><?php la("password")?>:</lable>
                               <div class=" input_container">
                                       <input type="text" placeholder="<?php la("placeholder_pass")?>"
                                       class="form-control" name=pass>
                               </div>
                       </div>
                       <div class="form-group form-group-lg">
                                   <lable class="control-lable col-sm-2"><?php la("phone")?>:</lable>
                               <div class=" input_container">
                                       <input type="text" placeholder="249+"
                                       class="form-control" name=phone>
                               </div>
                       </div>
                       <div class="form-group form-group-lg">
                                   <lable class="control-lable col-sm-2"> <?php la("email")?> :</lable>
                               <div class=" input_container">
                                       <input type="email" placeholder="<?php la("placeholder_email")?> "
                                       class="form-control" name=email>
                               </div>
                       </div>
                
                 
           
                        <input type="submit" class="btn bg_main btn-sm" name="send" value="<?php la("save")?>">
                </form>
                                </div>   
                </div> 

                    <?php
            }elseif ($do == "insert"){
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $addName = filter_var($_POST["name"] , FILTER_SANITIZE_STRING);
                    $desc = filter_var($_POST["discriptions"] ,FILTER_SANITIZE_STRING);
                    $pass = filter_var($_POST["pass"] ,FILTER_SANITIZE_STRING);
                    $email = filter_var($_POST["email"] ,FILTER_SANITIZE_STRING);
                    $hashed = password_hash($pass , PASSWORD_DEFAULT);

                
                    $erro = array();
                    if(empty($addName)){
                        $erro[] = '<div class="alert alert-danger">name cant be empty</div>' ;
                    }
                    if(empty($desc)){
                        $erro[] = '<div class="alert alert-danger">password cant be empty</div>' ;

                    }
                    if(empty($pass)){
                        $erro[] = '<div class="alert alert-danger">description cant be empty</div>' ;

                    }
                    
                    foreach($erro as $err){
                        echo $err;
                   
                    }
                    if(count($erro) == 0){
                       $add = $_COOKIE["u_admin_id"];
                       $q = $con->prepare("INSERT INTO users (u_name , u_pass  ,u_des , u_email ,`data` , u_group , howadd)  VALUES (?,?,?,?,now(),?,?)");
                       $q->execute(array($addName ,$hashed,  $desc ,$email , 0  , $add));
                       $massege = '<div class="alert alert-success">1 recored insert</div>' ;
                       echo $massege. '<meta http-equiv="refresh" content="3; url=new_users.php"> ';   

                    }else{
                        $masq = '<div class="alert alert-danger">this is not exist</div>'; 
                        redir($masq ,"back");
                    }
                 

                  
                  

                }
                else{
                    $masseg = '<div class="alert alert-danger">you cant use this page directly </div>'; 
                    redir($masseg);
                }




            }elseif ($do == "edit"){
                $id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : "undefined ";  
                $check = checkExist( "u_id" ,"users" , "u_id = $id " );
                $user_Date = checkExist( "*" ,"users" , "u_id =  $id" , true);
              
                 if($check > 0){ 
                     ?>
                 
                    <div class="container">
                    <div class="fack_title right mt-5 mb-3 margin_top_bottom"> <h5> <?php la("edit_user")?> <span><i class="fa fa-chevron-left"></i></span> <?php la("member")?> <span><i class="fa fa-chevron-left"></i></span> <?php la("cp")?> </h5></div>

    <div class="form_container col-sm-12 <?php echo $algin?>">
                <form class="form-horizontal <?php echo $algin?> " action='<?php echo $_SERVER["PHP_SELF"] ;?>?do=update'    method="POST" >
                <input type="hidden" value=<?php echo $user_Date[0]["u_id"]?> name="id">
                    
                   <div class="form-group form-group-lg ">
                           
                               <lable class="control-lable col-sm-2"><?php la("name")?>:</lable>
                           <div class=" input_container">
                               <input type="text" placeholder="type user name" 
                               class=form-control name=name required value=<?php echo $user_Date[0]["u_name"];?>>
                           </div>
   
                   </div>
                   <div class="form-group form-group-lg">
                           
                           <lable class="control-lable col-sm-2"><?php la("des")?>:</lable>
                       <div class=" input_container">
                           <input type="text" placeholder="type user name" 
                           class=form-control name="discriptions" value=<?php echo $user_Date[0]["u_des"];?> >
                 </div>
                   </div>
                           
                       <div class="form-group form-group-lg">
                                   <lable class="control-lable col-sm-2"><?php la("phone")?>:</lable>
                               <div class=" input_container">
                                       <input type="text" placeholder="taype password"
                                       class="form-control" name=phone value=<?php echo $user_Date[0]["u_number"];?>>
                               </div>
                       </div>
                       <div class="form-group form-group-lg">
                                   <lable class="control-lable col-sm-2"><?php la("email")?>:</lable>
                               <div class=" input_container">
                                       <input type="email" placeholder="taype password"
                                       class="form-control" name="email" value=<?php echo $user_Date[0]["u_email"];?>>
                               </div>
                       </div>
                
                 
           
                        <input type="submit" class="btn bg_main btn-login btn-sm" name="send" value="<?php la("save")?>">
                </form>
                                </div>   
                </div> 
                

                

                
            <?php }else{
                $massege = '<div class="alert alert-danger"> this is users is un exist</div>';
                redir($massege);
            }?>
               
         <?php  }elseif ($do == "update"){
             if($_SERVER["REQUEST_METHOD"] == "POST"){
             
                $id      = filter_var( $_POST["id"] , FILTER_SANITIZE_NUMBER_INT);
                $addName = filter_var($_POST["name"] , FILTER_SANITIZE_STRING);
                $desc    = filter_var($_POST["discriptions"] ,FILTER_SANITIZE_STRING);
                $email   = filter_var($_POST["email"] ,FILTER_SANITIZE_STRING);
                $number  = filter_var($_POST["phone"] ,FILTER_SANITIZE_STRING);   

          
                    $q = $con->prepare("UPDATE users SET  u_name = ? , u_des = ? , u_email = ? , u_number = ?   where u_id = ? ");
                    $q->execute(array($addName , $desc , $email , $number ,$id));
                    $massege = '<div class="alert alert-success"> 1 recored update </div>'; 
                 echo $massege. '<meta http-equiv="refresh" content="3; url=new_users.php"> ';   
                   
                

             }
             else {
                 $massege ='<div class="alert alert-danger">you cant use this page directly </div>';
                 echo $massege. '<meta http-equiv="refresh" content="3; url=new_users.php"> ';   
             }




            }elseif ($do == "delete"){
                
              
                if($_COOKIE["u_admin_group"] > 1){

                    $id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : "undefined ";
                  
                    $check = checkExist( "u_id" ,"users"  , "u_id =  $id ");
                    if($check > 0){
                        
                       $q =$con->prepare("DELETE FROM users WHERE u_id = $id");
                       $q->execute();
                       $massege = '<div class="alert alert-success"> 1 records delete</div>';
                       echo $massege. '    <meta http-equiv="refresh" content="3; url=new_users.php"> ';   
                    }
                  
                   
                }else{
                    $massege = '<div class="alert alert-danger"> you cant remove this admin </div>';
                    redir($massege);
                }


            }elseif ($do == "active"){
               
                if($_COOKIE["u_admin_group"] > 0 )
                {
                    $id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : "undefined ";
                    $check = checkExist( "u_id" ,"users" , "u_id = $id" );
                    if($check > 0)
                    {
                        $q = $con->prepare("UPDATE posts SET p_status = 1  where p_id = ?");
                        $q->execute(array($id));
                        $massege ='<div class="alert alert-success" >this post be active </div>' ;
                        echo $massege. '    <meta http-equiv="refresh" content="3; url=new_users.php"> ';   
                    

                    }
                    else
                    {
                        $massege= '<div class="alert alert-danger">this user isnot exiest   </div>';
                        echo $massege. '    <meta http-equiv="refresh" content="3; url=new_users.php"> ';   


                    }



                  
                }
                else
                {
                    $massege= '<div class="alert alert-danger">you cant do this options  </div>';
                    redir($massege);
                }
            }elseif ($do == "improve"){
                if($_COOKIE["u_admin_group"] > 0 )
                {
                        $id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : "undefined ";
                        $check = checkExist( "u_id" ,"users" , "u_id = $id" );
                   
                    if($check > 0)
                    {
                        $q = $con->prepare("UPDATE users SET u_group = u_group + 1  where u_id = ?");
                        $q->execute(array($id));
                        $massege ='<div class="alert alert-success" >this user be improved </div>' ;
                        echo $massege. ' <meta http-equiv="refresh" content="3; url=new_users.php"> ';   
                    }
                    else
                    {
                        $massege= '<div class="alert alert-danger">that usser is not found  </div>';
                        echo $massege. '    <meta http-equiv="refresh" content="3; url=new_users.php"> ';               
                    }
 
 
 
                  
                }
                else
                {
                    $massege= '<div class="alert alert-danger">you cant do this options  </div>';
                    redir($massege);
                }
                 


            }elseif ($do == "profile"){
                $id = filter_var($_GET["id"] , FILTER_SANITIZE_NUMBER_INT);
               if($id == $_COOKIE["u_admin_id"]){ 
                
                ?>
                   <div class="container">
    <div class="fack_title right mt-5 mb-3 margin_top_bottom"> <h5><?php la("add_user")?><span><i class="fa fa-chevron-left"></i></span> members <span><i class="fa fa-chevron-left"></i></span> control panel </h4></div>

                <div class="form_container col-sm-12 <?php echo $algin?> margin_top_botom">
                <form class="form-horizontal  " action='<?php echo $_SERVER["PHP_SELF"] ;?>?do=profile_up'    method="post" enctype="multipart/form-data">

                    <input type="hidden" value=<?php echo $id ?> name="id" >
                        <div class="form-group form-group-lg upload_container">
                            <h3>image this :</h3>
                                <div class="custom_search_content ">
                                <div class="custom_search <?php echo $reverse?>">
                                    <span class="btn btn-sm btn-primaryy search_span"> <i class="fa fa-upload"></i> upload </span>    
                                    <input type="file" placeholder="taype password"
                                                        class="form-control custom_uplloded " name=pic>

                                </div>
                        </div>
                        </div>
                        <button class="btn bg_main">save</button>
               </form>
         <?php 
               }else{
                    echo "that eas not tou ";
               }

             }elseif ($do = "profile_up") {

                if($_SERVER["REQUEST_METHOD"] == "POST"){

                    $id = filter_var($_POST["id"] , FILTER_SANITIZE_NUMBER_INT);


                    $imgPost = $_FILES["pic"];
                

                    $imgPOstNmae = $imgPost["name"];
                    $imgPOstType = $imgPost["type"];
                    $imgPOstTemp = $imgPost["tmp_name"];
                    $imgPOstSize = $imgPost["size"];
                  $imgPOstNmae = 'profile/' . $imgPOstNmae;

                    $aarayExtintion = array("jpg" , "jpeg" , "png" , "svg");

                    (@$nameofpic = strtolower(end(explode(".", $imgPOstNmae ))));
                
                    


                    move_uploaded_file( $imgPOstTemp ,  __DIR__."\\".$imgPOstNmae);
                  
                  
               
              


                    $erro = array();

                    if( ! in_array($nameofpic , $aarayExtintion)){
                        $erro[]  = '<div class="alert alert-danger"> this is extention is not allow </div>'; 
                     
                    }

                    //section valide 
                   

                 
                   
                    foreach($erro as $err){
                        echo $err;
                    }

                    if(count($erro) == 0){
                        
                    $q = $con->prepare("UPDATE users SET  u_profile = ? where u_id = ?");
                    
                     $q->execute(array($imgPOstNmae  , $id));
                     $massege = '<div class="alert alert-success">1 recored insert</div>' ;
                     echo $massege. '  <meta http-equiv="refresh" content="3; url=show.php?do=users&&id='. $id .'"> ';   

                    }
                
                } else{
                    $massege = '<div class="alert alert-danger">you cant use this page directly </div>'; 
                    echo $massege. '  <meta http-equiv="refresh" content="3; url=show.php?do=users&&id='. $id .'"> ';   

                }
                 
            
         
         
         ?>
                


            
            
            <?php }            include "include/footer.php";
            
            
            ?>


         


