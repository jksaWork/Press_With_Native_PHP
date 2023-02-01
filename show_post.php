<?php 
if(isset($_GET["name"])){
  $link = filter_var($_GET["name"] ,FILTER_SANITIZE_STRING);
  $title =str_replace(">" , " " ,$link);  
}
include "include/new_intl.php";
include "new_navigation.php";
if(! empty($_GET["id"])){
   $id = intval(filter_var($_GET["id"] , FILTER_SANITIZE_NUMBER_INT));
   $check = checkExist("*" , "posts" , "p_id = $id ");
   $up = $con->prepare("UPDATE posts SET p_see = p_see + 1 WHERE p_id = ?");
   $up->execute(array($id));
   $another_post = getLetest(" * , dayname(now()) day_name , dayofmonth(now()) as day_number , monthname(now()) as month_name  " , "posts" , "order by p_im desc" , "limit 3");
   if( $check == 1 ){
     $post = ineerjoin( "posts.* , users.u_name , users.u_id , dayname(p_data) day_name , dayofmonth(p_data) as day_number , monthname(p_data) as month_name ,TIMESTAMPDIFF(SECOND , posts.P_data , NOW()) AS p_second", "posts", "users" , "users.u_id = posts.p_user " ,"where p_id = $id" );
   if(! empty($_GET["cat"]) && isset($_GET["cat"])){
    $cate = inTval(filter_var($_GET["cat"] , FILTER_SANITIZE_NUMBER_INT));
    $check = checkExist("c_name , color" , "categories" , "c_id = $cate" , true);
    $name_of_categoreis = $check[0][0];
        }
        ?>

<div class="face_body" style="--main-color:<?php echo $check[0]["color"]?>">


<div class="new_container post_container_head">
    <div class="fack_title right mt-5 mb-3"> 
     
    <h5><?php echo $title?>      <span><i class="fa fa-chevron-left"></i></span> <?php echo $name_of_categoreis ; ?>  <span><i class="fa fa-chevron-left"></i></span><?php la("home")?></h5></div>
       <div class="margin_top_bottom"></div>
        <div class="row ">
             <div class="col-md-4">
              <div class="post_descrption">
              <h1>
              <?php if(! empty($post["p_mark"])) {?>
                              <span class="mark_categories">
                               <?php echo $post["p_mark"]?>
                            </span>

              <?php } ?>

              <?php echo $post[0]["p_name"]?>
               </h1>

              <h3> <?php echo  $post[0]["p_des"]?>  </h3>
              <h5 class="margin_top_bottom right row"> <span class="ml-3 mr-3 bold"><?php la("post_users")?> :</span>  <a href="new_pro.php?id=<?php echo $post[0]['u_id']?>"> <?php echo $post[0]["u_name"];?></a></h5>
               <h5 class="margin_top_bottom right row" >  <span class="ml-3 mr-3"><b><?php la("date_post");?> : </b></span> <span> <?php echo da($post[0]["day_name"]);?></span> - <span> <?php echo $post[0]["day_number"];?></span>  - <span> <?php echo da($post[0]["month_name"]);?></h5>              
              <?php if( !empty($post[0]["p_l_up"])){ ?>
               <h5> <span class="bold"><?php la("last_up");?></span> <span><?php echo $post[0]["p_l_up"]?> </span></h5>
              <?php } ?>
               
            </div>
             </div>
             <div class="col-md-8">
               <div class="show_post_imgae">
                     <img src="post/<?php echo $post[0]["p_image"];?>" alt="this is not found" class="image_show_post">
               </div>
             </div>
      </div>
      </div>
      <script>
      window.onscroll =function(){
      let nav = document.querySelector(".nav_con_all").scrollHeight;
      let head_post = document.querySelector(".post_container_head").scrollHeight;
      let foot_post = document.querySelector(".post_information").scrollHeight;
   
         if(window.pageYOffset >= nav + head_post +100 ){
           document.querySelector(".socil_link" ).classList.add("mohammed ");
         }else{
           document.querySelector(".socil_link" ).classList.remove("altigai");

         }
         if(window.pageYOffset >= nav + head_post + foot_post -200 ){
           document.querySelector(".socil_link" ).classList.remove("osman");
            document.querySelector(".socil_link" ).classList.add("inline");
         }
        
         
        


      }

      
      
      </script>
      <div class="custom_hr margin_top_bottom"></div>
  
      </div>
      <div class="post_information">
      <div class="new_container">
         <div class="row post_cont">
            <div class="col-md-1">
                     <ul class="socil_link text-center">
                           <li><img src="front/new_img/face.svg" alt="face book section"></li>
                           <li><img src="front/new_img/twitter.svg" alt="face book section"></li>
                           <li><img src="front/new_img/tel.svg" alt="face book section"></li>
                           <li><img src="front/new_img/whats.svg" alt="face book section"></li>
                           <li><img src="front/new_img/email.svg" alt="face book section"></li>
                           <li><img src="front/new_img/link.svg" alt="face book section"></li>
                        </ul>
            </div>
               <div class="col-md-8">
                   <div class="inner_post">   
                        <p class="artical"><?php echo $post[0]["p_artical"];?>
                        <span class="alert alert-info d-block m-3">mohammed lorem
                        lorem   
                        altigani osman</span>
                        </p>
                     </div>
                     </div>
            <div class="col-md-3">
               date line
            </div>
         </div>
      </div>
   </div>
   </div>
   </div>
   </div>
</section>
<section class="more_posts" style="--main-color:<?php echo $check[0]["color"]?>">
<div class="new_container">
<div class="container_head">        
        <span class="color"> </span>   <h2 class="spical"><?php la("writter_chose")?></h2>  <span><i class="fa fa-chevron-left fa-lg"></i></span>
   </div>
   <div class="row">
      <?php foreach($another_post as $post){  ?>
      <div class="col-md-4 mt-5">
      <div class="post_container squre_shape">
                            <div class="post_img">
                            <a href="show_post.php?id=<?php echo $post["p_id"]?>&&name=<?php echo str_replace(" " , ">" ,$post["p_name"])?>&&cat=<?php echo $post["p_cat"]?>" >  <img src="post/<?php echo $post["p_image"]?>" alt="cant fount here"></a>
                            </div>
                            <div class="post_head" class="main_link">
                                    <a href="show_post.php?id=<?php echo $post["p_id"]?>&&name=<?php echo str_replace(" " , ">" ,$post["p_name"])?>&&cat=<?php echo $post["p_cat"]?>" class="main_link" > <?php echo $post["p_name"]?></a>
                            </div>
                       </div>
      </div>
      <?php } ?>
   </div>
</div>
</section>
<div class="bottom_of_post"></div>
<div style="--main-color:<?php echo $check[0]["color"]?>"> 
<?php
// include "post_see.php";
include "let_go.php";
?>
</div>
<?php

}else{
     $mmassge = '<div class="alert alert-danger">this iis id is not exiest </div>';
     redir($mmassge);
  }


}else {
   redir("","home.php");
}
include "include/new_footer_section.php";
include "include/new_footer.php";
?>