<?php


    $do = $_GET["do"];
    $id= isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : "undefined";
    if($id == "undefined"){
         $message = '<div class="alert alert-danger"> you catn use this page directly </div>';
      echo $message .'<meta http-equiv="refresh" content="3; url=dashbord.php"> ';

    }   
     if($do == "post"){  
        $title= "عرض | المقال"; 
        include "include/intl.php";
        include "include/new_navigation.php";
        include "include/check_member.php";
        $class = is_admin() ? "show" : "hidden";



if(isset($_GET["name"])){
  $link = filter_var($_GET["name"] ,FILTER_SANITIZE_STRING);
  $title =str_replace(">" , " " ,$link);  
}


// echo $_SERVER["DOCUMENT_ROOT"];

if(! empty($_GET["id"]) && isset($_GET["id"])){
   $id = intval(filter_var($_GET["id"] , FILTER_SANITIZE_NUMBER_INT));


   $check = checkExist("*" , "posts" , "p_id =$id");


  
   if( $check == 1 ){
    $post = checkExist("*" , "posts" , "p_id = $id" , true);
$mine =  is_mine($post[0]["p_user"]) ? "show" : "hidden";


if(! empty($_GET["cat"]) && isset($_GET["cat"])){
    $cat = inTval(filter_var($_GET["cat"] , FILTER_SANITIZE_NUMBER_INT));
    $check = checkExist("c_name" , "categories" , "c_id = $cat" , true);
    
   
    $name_of_categoreis = $check[0][0];
        }
        ?>
<div class="margin_top_bottom">
<div class="new_container ">
    <div class="fack_title right mt-5 mb-3 margin_top_bottom"> <h5><?php la("show_post")?>  <span><i class="fa fa-chevron-left"></i></span> <?php echo $name_of_categoreis ;  ?> <span><i class="fa fa-chevron-left"></i></span> <?php la("cp")?> </h5></div>
        <div class="row ">
             <div class="col-md-4">
              <div class="post_descrption">
              <h1><?php echo $post[0]["p_name"]?></h1>
              <h3><?php echo $post[0]["p_des"]?> </h3>
               <h6 class="margin_top_bottom right row"> <span><?php la("date_post")?> :</span>  <?php echo $post[0]["p_data"];?></h6>
            </div>
             </div>
             <div class="col-md-8">
               <div class="show_post_imgae">
               <span class="custom_edit <?php echo $mine?>">
                    <a href="posts.php?do=edit&&id=<?php echo$post[0]["p_id"]?>"><span><i class="fa fa-pen fa-large"></i></span></a>
                </span>
                     <img src="../post/<?php echo $post[0]["p_image"];?>" alt="this is not found" class="image_show_post">
               </div>
             </div>
     
      </div>
      <div class="row margin_top_bottom">
        <div class="col-md-6">
            <p><?php echo $post[0]["p_artical"]?></p>
        </div>
        <div class="col-md-6">
            
        </div>
    </div>

</div>

<?php



}else{
     $message = '<div class="alert alert-danger">this iis id is not exiest </div>';
      echo $message .'<meta http-equiv="refresh" content="3; url=posts.php"> ';
  }


}else {
   redir("","home.php");
}
?>





<?php 

} elseif ($do== "users"){
    $title= "عرض | المستخدم"; 
    include "include/intl.php";
    include "include/new_navigation.php";
    include "include/check_member.php";
    $class = is_admin() ? "show" : "hidden";

    if(! empty($_GET["id"]) && isset($_GET["id"])){
        $id = intval(filter_var($_GET["id"] , FILTER_SANITIZE_NUMBER_INT));
        $check = checkExist("*" , "users" , "u_id =$id");
        $mine =  is_mine($id) ? "show" : "hidden";

     
       
        if( $check == 1 ){
         $user_info = checkExist("*" , "users" , "u_id = $id" , true);

     
        }}?> 
        
        
        <div class="container">
    <div class="fack_title right mt-5 mb-3 margin_top_bottom"> <h5> <?php la("show_user")?>  <span><i class="fa fa-chevron-left"></i></span> <?php la("users")?> <span><i class="fa fa-chevron-left"></i></span> <?php la("cp")?> </h4></div>

        <div class="container">
            <div class="user_info margin_top_bottom mt-5 mb-5 pb-5">
                <div class="image_group">
                    <div class="overflow">
                    <div class="large_image">
                        <img src="../front/img/main.png" alt="this is good">
                    </div>
                    </div>
                    <div class=" min_image ">
                        <span class="change_pc <?php echo $mine?>">
                               <a href="new_users.php?do=profile&&id=<?php echo $user_info[0]["u_id"]?>"><span><i class="fa fa-camera "></i></span></a>
                       </span>
                       <?php if(empty($user_info[0]["u_profile"])){ ?>
                        <script>alert("<?php echo $user_info["u_profile"] ?>")  </script>
                            <img src="<?php echo $img ?>alwifaq.png" alt="not found " class="circal">
                            <?php }else{?>
                            <img src="<?php echo $user_info[0]["u_profile"]; ?>" alt="not fund " >

                       <?php }?>
                    </div>
                </div>
                <div class="user_data">
                    <div>
                        <span class="text-right"><?php la("name")?> : </span> <h6><?php echo $user_info[0]["u_name"]?></h6>
                    </div>
                    <div>
                       <span class="text-right"><?php la("email")?> : </span><h6><?php echo $user_info[0]["u_email"]?></h6>
                    </div>
                    <div>
                       <span class="text-right" ><?php la("phone")?> : </span><h6> <?php echo $user_info[0]["u_number"]?></h6>
                    </div>
                    <div>
                       <span class="text-right" ><?php la("job")?>: </span><h6> <?php echo $user_info[0]["u_des"]?></h6>
                    </div>
                    <div>
                       <span class="text-right" ><?php la("stat")?> : </span><h6><?php act($user_info[0]["u_group"])?></h6>
                    </div>
                    <div>
                       <span class="text-right"><?php la("admin")?> : </span><h6><?php admin($user_info[0]["status"] ) ;?></h6>
                </div> 
               
                <span class="custom_edit <?php echo $mine?>">
                    <a href="new_users.php?do=edit&&id=<?php echo $user_info[0]["u_id"]?>"><span><i class="fa fa-pen fa-large"></i></span></a>
                </span>
            </div>
         

    
                <div class="row m-1 <?php echo $class;?>">
                        <div class="col-3 btn-primary  btn  m-0 p-0"><a href="new_users.php?do=delete&&id=<?php echo $user["u_id"]; ?>" class="btn_link">unactive</a></div>
                        <div class="col-3 btn-info btn >"><a href="new_users.php?do=delete&&id=<?php echo $user["u_id"]; ?>" class="btn_link">improve</a></div>
                        <div class="col-3 btn-danger btn "><a href="new_users.php?do=delete&&id=<?php echo $user["u_id"]; ?>" class="btn_link">delete</a></div>
                        <div class="col-3 btn btn-success "><a href="new_users.php?do=delete&&id=<?php echo $user["u_id"]; ?>" class="btn_link">edit</a></div>
                    </div>

            </div>
          
        </div>
    


   
<?php } elseif($do == "com"){
       $title= "عرض | التعليق"; 
       include "include/intl.php";
       include "include/new_navigation.php";
       include "include/check_member.php";
       $class = is_admin() ? "show" : "hidden";
  ?>
   <div class="new_container <?php echo $algin;?>">
                <div class="fack_title right mt-5 mb-3 margin_top_bottom"> <h5><?php echo la("show_com")?>  <span><i class="fa fa-chevron-left"></i></span> <?php la("comments") ?> <span><i class="fa fa-chevron-left"></i></span> <?php la('cp') ?></h5></div> 
            <div class="row margin">
             
                <div class="col-md-12">
                <div class="latest_container ">
                 <h3 class="latest_heading">
                     <i class="fa fa-pen"></i> <?php la("the_com")?>
                 </h3>
                 <ul class="latest_body">

                  <?php $comments_arr =  checkExist("*" , "comments" , "com_id = $id ", true); 
                     $comments = $comments_arr[0];
                     ?>
                  
                  <div class=" marginTop">
                      
                        <div class="card-content ">
                        <div class="commentRow row" >
                     <div class="col-3 profile_comments"> 
                    </div>
                     <div class="col-8  word_comments">
                        <h6 class="name"><a href="<?php echo "showProfile.php?id=" .$comments["u_id"];?>">
                        <?php echo $comments["com_name"]?></a></h6>
                            <p> <?php echo $comments["com_text"]?>
                        </div>
                  </div>
                   

  <?php 
}





include "include/footer.php";
    
// // }else{
//    $message = '<div class="alert alert-danger"> you catn use this page directly </div>';
//    redir($message);
// }
?>