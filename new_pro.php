<?php
include "include/new_intl.php";
include "new_navigation.php";
    if(! empty($_GET["id"]) && isset($_GET["id"])){
        $id = intval(filter_var($_GET["id"] , FILTER_SANITIZE_NUMBER_INT));
        $check = checkExist("*" , "users" , "u_id =$id");
        $mine =  is_mine($id) ? "show" : "hidden";

     
       
        if( $check == 1 ){
         $user_info = checkExist("*" , "users" , "u_id = $id" , true);

     
        }}?> 
        
        
        <div class="container">
    <div class="right mt-5 mb-3 margin_top_bottom"> <h5>  <?php la("home") ?>  <span><i class="fa fa-chevron-left"></i></span> <?php la("users")?> <span><i class="fa fa-chevron-left"></i></span><?php la("show_user")?></h4></div>

        <div class="container">
            <div class="user_info margin_top_bottom mt-5 mb-5 pb-5">
                <div class  ="image_group">
                    <div class="overflow">
                    <div class="large_image">
                        <img src="front/img/main.png" alt="this is good">
                    </div>
                    </div>
                    <div class=" min_image ">
                        <span class="change_pc <?php echo $mine?>">
                               <a href="new_users.php?do=profile&&id=<?php echo $user_info[0]["u_id"]?>"><span><i class="fa fa-camera "></i></span></a>
                       </span>
                       <?php if(empty($user_info[0]["u_profile"])){ ?>
                        <script>alert("<?php echo $user_info["u_profile"] ?>")  </script>
                            <img src="front/img/alwifaq.png" alt="not found " class="circal">
                            <?php }else{?>
                            <img src="admin/<?php echo $user_info[0]["u_profile"]; ?>" alt="not fund " >

                       <?php }?>
                    </div>
                </div>
                <div class="user_data">
                    <div>
                        <span>name : </span> <h6><?php echo $user_info[0]["u_name"]?></h6>
                    </div>
                    <div>
                       <span>email : </span><h6><?php echo $user_info[0]["u_email"]?></h6>
                    </div>
                    <div>
                       <span>phone : </span><h6> <?php echo $user_info[0]["u_number"]?></h6>
                    </div>
                    <div>
                       <span>job : </span><h6> <?php echo $user_info[0]["u_des"]?></h6>
                    </div>
                    <div>
                       <span>status : </span><h6><?php act($user_info[0]["u_group"])?></h6>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="user_info p-2 mt-3 mb-3 text-right"><a class="main_link" href="show_post_users.php?id=<?php echo $user_info[0]["u_id"] ?>&n= <?php echo $user_info[0]["u_name"]?>"><?php la("show_all_post")?> <?php echo $user_info[0]["u_name"]?></a></div>
                    
              <?php 
              include "include/new_footer_section.php";
              include "include/new_footer.php";
              ?>

