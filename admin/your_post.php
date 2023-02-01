<?php

include "include/intl.php";
include "include/new_navigation.php";
if(isset($_GET["id"]) && is_numeric($_GET["id"])){
$id =filter_var($_GET["id"] , FILTER_SANITIZE_NUMBER_INT);
$mine =  is_mine($id) ? "show" : "hidden";

 

    if(isset($_GET["mange"])){
        if($_GET["mange"] == "unactive"){
            $where = "  p_status = 0 and p_user = $id";
            $unactive = "";
        }elseif ($_GET["mange"]) {
          $where = "  p_status  != 0 and p_user =  $id";
          $active = "";
            
        }
    }else{
        $where = " p_user = $id ";
        $all="";
    }

$q =$con->prepare("SELECT  *  FROM `posts` where $where ");
$q->execute();
$posts = $q->fetchAll();


//    $src= $_SERVER["DOCUMENT_ROOT"];
?>


             
  <div class="container">
    <div class="fack_title right mt-5 mb-3 margin_top_bottom row justify-content-between"> <h5 class="order-1"> <?php la("your_post")?> <span><i class="fa fa-chevron-left"></i></span> <?php la("pro") ?> <span><i class="fa fa-chevron-left"></i></span> <?php la("cp")?> </h5> <a href="show.php?do=users&&id=<?php echo $_COOKIE["u_admin_id"]; ?>"><i class="fa fa-arrow-left fa-lg cl_main"></i> </a></div>       
    <section class="data_container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link <?php if(isset($all)){echo "active" ;}?>" href="your_post.php?id=<?php echo $id ?>"><?php la("all"); ?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link activeate <?php if(isset($active)){echo "active" ;}?>" href="your_post.php?mange=active&id=<?php echo $id ?>"  ><?php la("active")?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link unactiveate <?php if(isset($unactive)){echo "active" ;}?>"  href="?mange=unactive&id=<?php echo $id; ?>"><?php la("un_active")?></a>
  </li>
</ul>
<div class="tab-content">
<?php 
if( ! count($posts) == 0){ 
 


foreach ( $posts as $post ): ?>
       <div>      
     
  
          <div class="min_size_view list_veiw">
              <div class="img_post_min_size">
                    <?php if(empty($post["p_image"])){?>
                      <img src="<?php echo $img ?>profile.svg" alt="not found " class="circal">
                    <?php }else{?>
                    <img src="<?php echo $uploaded.$post["p_image"]; ?>" alt="not fund " >

                       <?php }?>
               </div>
               <div class="head_post_min_size right">
                          <a href="#" class="main_link"> <?php echo $post["p_name"]?></a> 
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
                                <li class=""> <a href="show.php?do=post&id=<?php echo $post["p_id"]; ?>&&name=<?php echo $post["p_name"]?>&&cat=<?php echo $post["p_cat"];?>" > <?php la("info")?></a></li>
                                <li  class=""> <a  href="posts.php?do=edit&id=<?php echo $post["p_id"] ?>" ><?php la("edit")?></a></li>
                                <li  class="<?php echo $mine?>"> <a  href="posts.php?do=delete&id=<?php echo $post["p_id"] ?>" ><?php la("delete")?></a></li>
                                <li  class=""> <a  href="posts.php?do=edit&id=<?php echo $post["p_id"] ?>" ><?php la("edit")?></a></li>
                              
                            </ul>   
                       </div>
                </ul>
               </div>

                </div>
                    
                
           
                    <?php endforeach ;?>
                    </div>
                        </div>
                    
    <?php }else{ ?>

              <div class="alert alert-sucsess">thre is no users to show </div>

                    <?php }?>
                    </div>

                        </div>
                    

                       <div class="new_container">
                            <div class="<?php echo $algin?>">
                                <a href="posts.php?do=add" class="btn btn-primaryy mt-4 bg_main"> <?php  la("add_new_post") ?><span><i class="fa fa-plus ml-2 mr-2"></i></span> </a>
                            </div>
                        </div>
                    </section>
               

                        
                        </div>

                        </div>



                        </div>


            <?php 

}else{
    $msg = '<div class="alert alert-danger">found error</div>';
    echo $msg. '<meta http-equiv="refresh" content="3; url=dashbord .php"> ';
} ?>











<?php include "include/footer.php"; ?>