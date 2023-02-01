
<?php 
    session_start();

    $title =" mange categories";

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
                        $where = "WHERE c_status = 0";
                        $unactive = "";
                    }elseif ($_GET["mange"]) {
                      $where = "WHERE c_status  != 0";
                      $active = "";
                        
                    }
                }else{
                    $where = "";
                    $all="";
                }

            $q =$con->prepare("SELECT  *   FROM `categories`  $where  order by c_id ");
            $q->execute();
            $posts = $q->fetchAll();
          
        //    $src= $_SERVER["DOCUMENT_ROOT"];
         
              ?>
          <div class="container">
             <h2 class="text-center"><?php la("mange_categoreis")?> </h2>  
<div class="fack_title right mt-5 mb-3 margin_top_bottom"> <h5><?php la("mange_categoreis" )?><span><i class="fa fa-chevron-left"></i></span> <?php la("comments")?> <span><i class="fa fa-chevron-left"></i></span> <?php la("cp")?></h4></div>
      
<section class="data_container">
<ul class="nav nav-tabs" id="myTab" role="tablist">
<li class="nav-item">
<a class="nav-link <?php if(isset($all)){echo "active" ;}?>" href="categories.php"><?php la("all")?></a>
</li>
<li class="nav-item">
<a class="nav-link activeate <?php if(isset($active)){echo "active" ;}?>" href="?mange=active" ><?php la("active")?></a>
</li>
<li class="nav-item">
<a class="nav-link unactiveate <?php if(isset($unactive)){echo "active" ;}?>"  href="?mange=unactive" ><?php la("un_active")?></a>
</li>
</ul>
<div class="tab-content">
<?php foreach ( $posts as $cat ): ?>
   <div>      
 

      <div class="min_size_view list_veiw">
          <div class="img_post_min_size">
                <?php if(empty($cat["color"])){?>
                  <div></div>
                <?php }else{?>
                            <div style="background: <?php echo $cat["color"];?>" class="alter_img"></div>
                   <?php }?>
           </div>
           <div class="head_post_min_size right">
                      <h4> <?php echo $cat["c_name"]?></h4>
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
                            <li class="<?php echo $admin?>"> <a href="categories.php?do=active&id=<?php echo $cat["c_id"]?> "><?php la("add")?></a></li>
                            <li  class="<?php echo $admin?>"> <a  href="categories.php?do=delete&id=<?php echo $cat["c_id"]?> " ><?php la("delete")?></a></li>
                            <li  class="<?php echo $admin?>"> <a  href="categories.php?do=edit&id=<?php echo $cat["c_id"]?> " ><?php la("edit")?></a></li>                        
                        </ul>   
                   </div>
            </ul>
           </div>

            </div>
                
            
       
                <?php endforeach ;?>
                 </ul>
             </div>

        </div>
        
            <div class="<?php echo $algin?>">
            <a href="?do=add" class="btn bg_main m-4"> <?php la("add_cat")?> </a>

            </div>
  </div>

                  </div>
             

                       
              </div>
                        

            <?php } elseif ($do == "add") {
                ?>
                <div class="container">
              
<div class="fack_title right mt-5 mb-3 margin_top_bottom"> <h5><?php la("add_cat")?> <span><i class="fa fa-chevron-left"></i></span> <?php la("categoreis")?><span><i class="fa fa-chevron-left"></i></span> <?php la("cp")?> </h4></div>

                <div class="form_container col-sm-12 <?php echo $algin?>">
                <form class="form-horizontal  " action='<?php echo $_SERVER["PHP_SELF"] ;?>?do=insert'    method="post">
          
                   <div class="form-group form-group-lg">
                           
                               <lable class="control-lable col-sm-2"><?php la("name_of_categores") ?>:</lable>
                           <div class=" input_container">
                               <input type="text" placeholder="<?php la("palceholder_name_of_categores") ?>" 
                               class=form-control name=name required>
                           </div>
   
                   </div>
                   <div class="form-group form-group-lg">
                           
                           <lable class="control-lable col-sm-2"> <?php la("description_of_categories") ?>:</lable>
                       <div class=" input_container">
                           <input type="text" placeholder="<?php la("palcerholder_description_of_categories") ?>" 
                           class=form-control name=discriptions required>
                       </div>

                  </div>
                  <div class="form-group form-group-lg">
                           
                           <lable class="control-lable col-sm-2"> <?php la("color") ?>:</lable>
                       <div class=" ">
                           <input type="color" placeholder="<?php la("palcerholder_description_of_categories") ?>" 
                           name=color_of_categoreis required>
                       </div>

                  </div>
                
           
                        <input type="submit" class="btn bg_main btn-login btn-sm" name="send" value="<?php la("add")?>" >
                </form>
                                </div>   
                </div> 

                    <?php
            }elseif ($do == "insert"){
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $addName = filter_var($_POST["name"] , FILTER_SANITIZE_STRING);
                    $desc = filter_var($_POST["discriptions"] , FILTER_SANITIZE_STRING);
                    $color = $_POST["color_of_categoreis"] ;
                   $check =  0;

                    if($check == 0){
                       $add = $_COOKIE["u_admin_id"];
                       $q = $con->prepare("INSERT INTO categories (c_name , c_descriptions  , howadd , color , c_status)  VALUES
                        ( ? , ? , ? , ? , 1 )");
                       $q->execute(array($addName , $desc , $add , $color));
                       $massege = '<div class="alert alert-success">1 recored insert</div>' ;
                       echo $massege. '<meta http-equiv="refresh" content="3; url=categories.php"> ';   

                    }else{
                        $massege = '<div class="alert alert-danger">this is categore is  exist</div>'; 
                       echo $massege. '<meta http-equiv="refresh" content="3; url=categories.php"> ';   
                        
                    }
                 

                  
                  

                }
                else{
                    $masseg = '<div class="alert alert-danger">you cant use this page directly </div>'; 
                    redir($masseg);
                }



            }elseif ($do == "edit"){
                $id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : "undefined ";  
                $check = checkExist( "c_id" ,"categories" , "c_id = $id");
                $cat =  checkExist( "*" ,"categories" , "c_id = $id ", true);
               
             
              
                 if($check > 0){ ?>
                 <div class="container <?php echo $algin?>">
                <div class="form_container col-sm-12">
                <form class="form-horizontal  " action='<?php echo $_SERVER["PHP_SELF"] ;?>?do=update'    method="post">
          
                   <div class="form-group form-group-lg">
                       <input type="hidden" name="id" value="<?php echo $cat[0]["c_id"] ?>" >
                           
                               <lable class="control-lable col-sm-2"><?php  la("name_of_categores") ?> :</lable>
                           <div class=" input_container">
                               <input type="text" 
                               class=form-control name=name required value="<?php echo $cat[0]["c_name"]?>" >
                           </div>
   
                   </div>
                   <div class="form-group form-group-lg">
                           
                           <lable class="control-lable col-sm-2"><?php  la("description_of_categories") ?> :</lable>
                       <div class=" input_container">
                           <input type="text"
                           class=form-control name=descriptions value="<?php echo $cat[0]["c_descriptions"]?> " >
                       </div>

               </div>
               <div class="form-group form-group-lg">
                           
                           <lable class="control-lable col-sm-2"> color categoreis<?php la("description_of_categories") ?>:</lable>
                       <div class=" ">
                           <input type="color" placeholder="<?php la("palcerholder_description_of_categories") ?>" 
                           name=color_of_categoreis >
                       </div>

                  </div>
                           
                           
                
                        <input type="submit" class="btn bg_main btn-login btn-sm" name="save">
                </form>
                                </div>   
                </div> 
                

                
            <?php }else{
                $massege = '<div class="alert alert-danger"> this is users is un exist</div>';
                echo $massege. '<meta http-equiv="refresh" content="3; url=categories.php"> ';   

            }?>
               
         <?php  }elseif ($do == "update"){
             if($_SERVER["REQUEST_METHOD"] == "POST"){

                $name = $_POST["name"];
                $id   = $_POST["id"];
                $desc = $_POST["descriptions"];
                $color = $_POST["color_of_categoreis"];
               
                    $q = $con->prepare("UPDATE categories SET  c_name = ?  ,  c_descriptions = ? , color = ? where c_id = ?");
                    $q->execute(array($name , $desc , $color ,$id) );
                    $massege = '<div class="alert alert-success"> 1 recored update </div>'; 
                    echo $massege. '<meta http-equiv="refresh" content="3; url=categories.php"> ';   

                

             }
             else {
                 $massege ='<div class="alert alert-danger">you cant use this page directly </div>';
                 redir($massege);
             }




            }elseif ($do == "delete"){
                if($_COOKIE["u_admin_group"]> 1){

                    $id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : "undefined ";
                  
                    $check = checkExist( "c_id" ,"categories" , "c_id" , $id);
                    if($check > 0){
                       $q =$con->prepare("DELETE FROM categories WHERE c_id = $id");
                       $q->execute();
                       $massege = '<div class="alert alert-success"> 1 records delete</div>';
                       echo $massege. '<meta http-equiv="refresh" content="3; url=categories.php"> ';   
 
                    }
                   
                }else{
                    $massege = '<div class="alert alert-danger"> you cant remove this admin </div>';
                    redir($massege);
                }



            }elseif ($do == "active"){
               
                if($_COOKIE["u_admin_group"] > 0 ){
                    $id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : "undefined ";
                    $check = checkExist( "c_id" ,"categories" , "c_id" , $id);
                    if($check > 0){

                        $q = $con->prepare("UPDATE categories SET c_status = 1  where c_id = ?");
                        $q->execute(array($id));
                        $massege ='<div class="alert alert-success" >this user be active </div>' ;
                        echo $massege. '<meta http-equiv="refresh" content="3; url=categories.php"> ';   


                    }else{
                        $massege= '<div class="alert alert-danger">this is users is not exiest   </div>';
                        redir($massege);

                    }



                  
                }else{
                    $massege= '<div class="alert alert-danger">you cant do this options  </div>';
                    redir($massege);
                }
            }
            
            
            include "include/footer.php";
            
            
            ?>


         


