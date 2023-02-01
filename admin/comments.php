
<?php 

    session_start();
 


    $title ="comments";
    $title ="mange users";
    if(isset($_COOKIE["u_admin_name"])){
        include "include/intl.php";
        include "include/check_member.php";
        include "include/new_navigation.php";
        $id =$_COOKIE["u_admin_id"];
        $group = $_COOKIE["u_admin_group"];

    }else{
        header("location: index.php");
    }


  include "include/check_member.php";


            $do = isset($_GET["do"]) ? $_GET["do"]: "file";

              if($do == "file") { 
                    

                if(isset($_GET["mange"])){
                    if($_GET["mange"] == "unactive"){
                        $where = "WHERE com_stat = 0";
                        $unactive = "";
                    }elseif ($_GET["mange"]) {
                      $where = "WHERE com_stat  != 0";
                      $active = "";
                        
                    }
                }else{
                    $where = "";
                    $all="";
                }

            $q =$con->prepare("SELECT  *   FROM `comments`  $where  order by com_id DESC  limit 10 ");
            $q->execute();
            $posts = $q->fetchAll();
          
        //    $src= $_SERVER["DOCUMENT_ROOT"];
         
              ?>
          <div class="container">
             <h2 class="text-center mt-5"><?php la("mange_comments")?></h2>  
<div class="fack_title right mt-5 mb-3 margin_top_bottom"> <h5><?php la("mange_comments"); ?> <span><i class="fa fa-chevron-left"></i></span> <?php la("comments")?> <span><i class="fa fa-chevron-left"></i></span> control panel </h4></div>
      
<section class="data_container">
<ul class="nav nav-tabs" id="myTab" role="tablist">
<li class="nav-item">
<a class="nav-link <?php if(isset($all)){echo "active" ;}?>" href="comments.php"><?php la("all")?></a>
</li>
<li class="nav-item">
<a class="nav-link activeate <?php if(isset($active)){echo "active" ;}?>" href="?mange=active" ><?php la("active")?></a>
</li>
<li class="nav-item">
<a class="nav-link unactiveate <?php if(isset($unactive)){echo "active" ;}?>"  href="?mange=unactive" ><?php la("un_active")?></a>
</li>
</ul>
<div class="tab-content">
<?php foreach ( $posts as $com ): ?>
   <div>      
 

      <div class="min_size_view list_veiw">
          <div class="img_post_min_size">
                <?php if(empty($com["u_profile"])){?>
                  <img src="<?php echo $img ?>profile.svg" alt="not found " class="circal">
                <?php }else{?>
                <img src="<?php echo $uploaded.$user["u_profile"]; ?>" alt="not fund " >

                   <?php }?>
           </div>
           <div class="head_post_min_size right">
                      <h4> <?php echo $com["com_text"]?></h4>
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
                            <li class=""> <a href="show.php?do=com&id=<?php echo $com["com_id"];?>" > <?php la("info")?></a></li>
                            <li class=""> <a href="comments.php?do=active&id=<?php echo $com["com_id"]?> "><?php la("add")?></a></li>
                            <li  class=""> <a  href="comments.php?do=delete&id=<?php echo $com["com_id"]?> " ><?php la("delete")?></a></li>
                                             
                        </ul>   
                   </div>
            </ul>
           </div>

            </div>
                
            
       
                <?php endforeach ;?>
                <div class="more_post">
                <div class="container">
                    <span class="btn btn-primaryy mt-4 bg_main" onclick="get_post(1 ,<?php echo $posts[0]['com_id'];?> , 'comments' )"> <?php la("show_more")?> <span><i class="fa fa-eye ml-3 mr-3"></i></span> </span>                
                    <script>
 function get_post(  page_pram , num_pram , where_pram ){

           alert();
            $.ajax({
                    method : "POST",
                    url: "ajax_method com.php" , 
                    data: { page : page_pram, num: num_pram , where : where_pram },
                     success:function(response){
                         alert(response);
                             $(".more_post").html( response);
                     },
                     error:function () {
                         alert("can do this ");
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
                   
                </section>
           

                    
                    </div>

                    </div>



                    </div>


    <?php            }elseif ($do == "edit"){
                $id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : "undefined ";  
                $check = checkExist( "com_id" ,"comments" , "com_id" , $id);
                $userDate = checkExist( "*" ,"comments" , "com_id" , $id , true);
              
                 if($check > 0){ ?>
                 <div class="container">
                <div class="form_container col-sm-12">
                <form class="form-horizontal  " action='<?php echo $_SERVER["PHP_SELF"] ;?>?do=update'    method="post">
          
                   <div class="form-group form-group-lg">
                       <input type="hidden" name="id" value=<?php echo $id?>>
                           
                               <lable class="control-lable col-sm-2">name:</lable>
                           <div class=" input_container">
                               <input type="text" placeholder="type user name" 
                               class=form-control name=name required value='<?php echo $userDate["com_name"]?>' >
                           </div>
   
                   </div>
                   <div class="form-group form-group-lg">
                           
                           <lable class="control-lable col-sm-2">description:</lable>
                       <div class=" input_container">
                      <textarea name="descriptions" id="addArtical" cols="30" rows="6"  class="form-control" ><?php echo $userDate["com_text"] ?></textarea>
                       </div>

           
                           
                 </div>
                    
                        <input type="submit" class="btn btn-primary btn-login btn-sm" name="send">
                </form>
               </div>
            </div>   
                </div> 
                

                
            <?php }else{
                $massege = '<div class="alert alert-danger"> this is users is un exist</div>';
                     echo $massege. '<meta http-equiv="refresh" content="3; url=dashbord.php"> ';   

            }?>
               
         <?php  }elseif ($do == "update"){
             if($_SERVER["REQUEST_METHOD"] == "POST"){

                $name = $_POST["name"];
                $id   = $_POST["id"];
                $desc = $_POST["descriptions"];
                
                    
                    $q = $con->prepare("UPDATE comments SET  com_name = ? , com_text = ? where com_id = ?");
                    $q->execute(array( $name, $desc , $id));
                    $massege = '<div class="alert alert-success"> 1 recored update </div>'; 
                    echo $massege. '<meta http-equiv="refresh" content="3; url=dashbord.php"> ';   


             }
             else {
                 $massege ='<div class="alert alert-danger">you cant use this page directly </div>';
                 redir($massege);
             }




            }elseif ($do == "delete"){
                if($_COOKIE["u_admin_group"] > 1){

                    $id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : "undefined ";
                  
                    $check = checkExist( "com_id" ,"comments" , "com_id" , $id);
                    if($check > 0){
                       $q =$con->prepare("DELETE FROM comments WHERE com_id = $id");
                       $q->execute();
                       $massege = '<div class="alert alert-success"> 1 records delete</div>';
                   
                       echo $massege. '<meta http-equiv="refresh" content="3; url=comments.php"> ';   

                    }
                   
                }else{
                    $massege = '<div class="alert alert-danger"> you cant remove this admin </div>';
                    echo $massege. '<meta http-equiv="refresh" content="3; url=dashbord.php"> ';   
                    
                }



            }elseif ($do == "active"){
           
                if($_COOKIE["u_admin_group"] > 0 ){
                    $id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : "undefined ";
                    $check = checkExist( "com_id" ,"comments" , "com_id" , $id);
                    if($check > 0){

                        $q = $con->prepare("UPDATE comments SET com_stat = 1  where com_id = ?");
                        $q->execute(array($id));
                        $massege ='<div class="alert alert-success" >thiscomments be active </div>' ;
                        echo $massege. '<meta http-equiv="refresh" content="3; url=comments.php"> ';   


                    }else{
                        $massege= '<div class="alert alert-danger">this is users is not exiest   </div>';
                       echo $massege. '<meta http-equiv="refresh" content="3; url=comments.php"> ';   


                    }



                  
                }else{
                    $massege= '<div class="alert alert-danger">you cant do this options  </div>';
                    echo $massege. '<meta http-equiv="refresh" content="3; url=dashbord.php"> ';   

                }
            }
            
            
            include "include/footer.php";
            
            
            ?>


         


