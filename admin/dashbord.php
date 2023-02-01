<?php
session_start();
include "include/intl.php";
echo '<div>' ;
include "include/check_member.php";
include "include/new_navigation.php";
$group = $_COOKIE["u_admin_group"];
$admin =  is_admin($group) ? "show" : "hidden";  

?>
<!-- start the control panel  -->
<?php if(isset($_GET["wellcom"])) { ?>
<div class="alert alert-success"> wellcom <?php echo $_COOKIE["u_admin_name"];?> on contorl panel?></div>
<script>alert("مرحبا بك <?php echo $_COOKIE["u_admin_name"]?> في لوحه التحكم")</script>
<?php } ?>



<div class="new_container">
    <div class="fack_title right mt-5 mb-3 margin_top_bottom"> <h5> لوحه التحكم <span><i class="fa fa-chevron-left ml-3 mr-3"></i></span>  </h5>  </div>
 <!-- 0997909
 827 -->
        
</div>
<div class="container">
    <div class="website_counter">
        <div class="row">
            <div class="col-md-3 col-6 p-0">
         
         <div class=" counter_div">
                <div class="row text-center">
                    <div class="col-12"><h3><?php la("users")?></h3></div>
               </div>
               <div class="row align-items-center m-0">
                      <div class="col-6 icon_div">
                            <i class="fa fa-users m-0"></i>
                      </div>
                    <div class="col-6 text-center">
                    <span class="number"><a href="new_users.php"><?php echo calcDataBase("*" , "users")?></a></span>
                    </div>
                </div>
         </div>
         </div>
         <div class="col-md-3 col-6 p-0">
    
            <div class=" counter_div green">
                <div class="row text-center">
                    <div class="col-12"><h3><?php la("posts")?> </h3></div>
               </div> 
               <div class="row align-items-center m-0">
                      <div class="col-6 icon_div">
                            <i class="fa fa-posts m-0"></i>
                      </div>
                    <div class="col-6 text-center">
                    <span class="number"> <a href="posts.php"><?php echo calcDataBase("*" , "posts")?></a></span>
                    </div>
                </div>
         </div>
         </div>
         <div class="col-md-3 col-6 p-0">
                   
            <div class=" counter_div darkgray">
                <div class="row text-center">
                    <div class="col-12"><h3><?php la("categoreis") ?></h3></div>
               </div>
               <div class="row align-items-center m-0">
                      <div class="col-6 icon_div">
                            <i class="fa fa-glass-martini-alt m-0"></i>
                      </div>
                    <div class="col-6 text-center">
                    <span class="number"> <a href="categories.php"><?php echo calcDataBase("*" , "categories")?></a></span>
                    </div>
                </div>
</div>
         </div>
         <div class="col-md-3 col-6 p-0">
         <div class=" counter_div red">
                <div class="row text-center">
                    <div class="col-12"><h3><?php la("viewer")?></h3></div>
               </div>
               <div class="row align-items-center m-0">
                      <div class="col-6 icon_div">
                            <i class="fa fa-users-cog m-0"></i>
                      </div>
                    <div class="col-6 text-center">
                    <span class=""> <a href="posts.php"><?php echo calcDataBase("*" , "users")?></a></span>
                    </div>
                </div>
</div>
        </div>
    
    </div>
</div>
<section class="latest margin">
    <div class="container <?php echo $algin?>">
            <div class="row">
        <div class="col-md-6">
             <div class="latest_container ">
                 <h3 class="latest_heading">
                     <i class="fa fa-users"></i> <?php la("latest_users")?>
                 </h3>
                 <div class="latest_body">

                  <?php $latestUsers =getLetest("u_name , u_id , u_group" , "users " , " u_id "  ,  5 , "where u_group = 0");
              
              if(! count($latestUsers)== 0){ 
              foreach($latestUsers as $user ){ ?>
               
               <div class="row justify-content-between align-items-center "> <h5> <?php echo $user["u_name"]?></h5>
                   <ul class="langague  custom_option">
                        <div class=" custom_options_div">
                            <div class="point">
                              <span></span>
                              <span></span>
                              <span></span>
                           </div>
                           <ul class="list_of_langaue large_width post_shape">
                                <li class="<?php echo $admin ; ?>"> <a href="new_users.php?do=active&id=<?php echo $user["u_id"]?> "><?php la("add")?></a></li>
                                <li  class="<?php echo $admin ; ?>"> <a  href="new_users.php?do=delete&id=<?php echo $user["u_id"]?> " ><?php la("delete")?></a></li>
                                <li  class="<?php echo $admin ; ?>"> <a  href="new_users.php?do=edit&id=<?php echo $user["u_id"]?> " ><?php la("edit")?></a></li>
                                <li  class="<?php echo $admin ; ?>"> <a  href="new_users.php?do=improve&id=<?php echo $user["u_id"]?> " ><?php la("improve")?></a></li>
                                                  
                            </ul>   
                </ul>
                </div>

              <!-- this is old way  -->
                  
                 <?php   } }else{?>
                 <div><?php la("this_is_no_users")?> </div>
                  
                  <?php }?>
                 </div>
             </div>

        </div>
        <div class="col-md-6">
             <div class="latest_container ">
                 <h3 class="latest_heading">
                     <i class="fa fa-users"></i> <?php la("latest_post")?>
                 </h3>
                 <div class="latest_body">

                  <?php $latestPost =getLetest("*" , "posts" , "p_id"  ,  5 , "where p_status = 0");
                  if(count($latestPost) == 0){?>
                  <li><?php la("no_post")?></li>

                  <?php }else{ ?>

               
                <?php  foreach($latestPost as $post ){ ?>
                   
                  <div class="row justify-content-between align-items-center"> <h5 class='head_latest'> <?php echo $post["p_name"]?></h5>
                   <ul class="langague  custom_option">
                        <div class=" custom_options_div">
                            <div class="point">
                              <span></span>
                              <span></span>
                              <span></span>
                           </div>
                           <ul class="list_of_langaue top_0">
                                <li class=""> <a href='show.php?do=post&id=<?php echo $post["p_id"] ?>&name=<?php echo $post["p_name"]?>&cat=<?php echo $post["p_cat"]?>'> <?php la("info")?></a></li>
                                <li class=""> <a href="users.php?do=active&id=<?php echo $user["u_id"] ?>"><?php la("add")?></a></li>
                                <li  class=""> <a  href="users.php?do=active&id=<?php echo $user["u_id"] ?>" ><?php la("delete")?></a></li>
                              
                            </ul>   
                       </div>
                </ul>
                </div>



                  <!-- this i snew thsi is old  -->
                  
                 <?php   }     }?>
                 </div>
             </div>
        
                        </div>

    </div>
    <div class="row marginTop">
        <div class="col-md-6 mt-5">
             <div class="latest_container ">
                 <h3 class="latest_heading">
                     <i class="fa fa-users"></i> <?php la("latest_comments")?>
                 </h3>
                 <div class="latest_body">

                  <?php $latestcom =getLetest("*" , "comments" , "com_id"  ,  5 , "where com_stat = 0");
                  if(count($latestcom) == 0){?>
                  <li><?php la("no_com")?></li>

                  <?php }else{ ?>

               
                <?php  foreach($latestcom as $com ){ ?>
            <div class="row justify-content-between align-items-center"> <h5> <?php echo $com["com_text"]?></h5>
                   <ul class="langague  custom_option">
                        <div class=" custom_options_div">
                            <div class="point">
                              <span></span>
                              <span></span>
                              <span></span>
                           </div>
                           <ul class="list_of_langaue">
                                <li ><a href="show.php?do=com&id=<?php echo $com["com_id"]?>"><?php la("info")?></a></li>
                                <li> <a href="comments.php?do=active&id=<?php echo $com["com_id"] ?>"><?php la("add")?></a></li>
                                <li ><a href="comments.php?do=delete&id=<?php echo $com["com_id"] ?>"><?php la("delete")?></a></li>
                              
                            </ul>   
                       </div>
                </ul>
             </div>
                 <?php   }     }?>
                 </div>
             </div>

        </div>
  
  <div class="col-md-6 mt-5">   
             <div class="latest_container  <?php echo $algin?>">
                 <h3 class="latest_heading">
                     <i class="fa fa-users"></i> <?php la("categoreis")?>
                 </h3>
                 <div class="latest_body">

                  <?php $categoreis =getLetest("*" , "categories" , "c_id"  ,  5  , "where c_status = 0");
                  if(  count($categoreis) == 0) {?>
                    <li><?php la("no_com")?></li>
                  <?php }
                  else
                  {

                
                     foreach($categoreis as $cat ){ ?>
                   <div class="row justify-content-between align-items-center"> <h5> <?php echo $cat["c_name"]?></h5>
                   <ul class="langague  custom_option">
                        <div class=" custom_options_div">
                            <div class="point">
                              <span></span>
                              <span></span>
                              <span></span>
                           </div>
                           <ul class="list_of_langaue">
                                <li class="active"> <a href="categories.php?do=active&id=<?php echo $cat["c_id"] ?>"> <?php la("add")?></a></li>
                                <li><a href="categories.php?do=delete&id=<?php echo $cat["c_id"] ?>"><?php la("delete")?></a></li>
                                <li><a  href="categories.php?do=edit&id=<?php echo $cat["c_id"] ?>"> <?php la("edit")?></a></li>
                              
                            </ul>   
                       </div>
                </ul>
             </div>
                 <?php }
                  }
           ?>
                 
                 </div>
             </div>

        </div>
  



</section>









<?php
include "include/footer.php";
?>