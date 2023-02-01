<?php 
include "include/connect.php";
include "include/lang/function.php";
include "include/lang/arabic.php";
if( $_SERVER["REQUEST_METHOD"] == "POST" ){
   
    $page = $_POST["page"];
    $num = $_POST["num"];
    $where = $_POST["where"];
    $new_limit = $num - ($page * 10);
    $new_limit_min = $new_limit - 10;
    echo $new_limit . $new_limit_min;
           $response = get_limit_where_post( $new_limit_min  , $new_limit );  
           $admin =  is_admin($_COOKIE['u_admin_group']) ? "show" : "hidden";  

    
    
    foreach($response as $post){?>
<div>
<div class="min_size_view list_veiw">
              <div class="img_post_min_size">
                    <?php if(empty($post["p_image"])){?>
                      <img src="<?php echo $img ?>profile.svg" alt="not found " class="circal">
                    <?php }else{?>
                    <img src="../post/<?php echo $post["p_image"]; ?>" alt="not fund " >

                       <?php }?>
               </div>
               <div class="head_post_min_size right">
                          <h4> <?php echo $post["p_name"]?></h4>
                          </div>
               <div class="col-md-2">
               <ul class="langague  custom_option left_30">
                        <div class=" custom_options_div">
                            <div class="point">
                              <span></span>
                              <span></span>
                              <span></span>
                           </div>
                           <ul class="list_of_langaue post_shape large_width">
                                <li class=""> <a href="show.php?do=post&id=<?php echo $post["p_id"]; ?>&&name=<?php echo $post["p_name"]?>&&cat=<?php echo $post["p_cat"];?>" > <?php la("info")?></a></li>
                                <li class="<?php echo $admin?>"> <a href="posts.php?do=active&id=<?php echo $post["p_id"] ?>"><?php la("add")?></a></li>
                                <li  class="<?php echo $admin?>"> <a  href="posts.php?do=delete&id=<?php echo $post["p_id"] ?>" ><?php la("delete")?></a></li>
                              
                            </ul>   
                       </div>
                </ul>
               </div>

                </div>

                </div>

<?php   }
}
?>
 <div class="<?php echo $algin?>">
                        <span class="btn btn-primaryy mt-4 bg_main" onclick="get_post(<?php echo  $page +1 ?> ,<?php echo  $new_limit?>)"> show more post <span><i class="fa fa-eye"></i></span> </span>
                    </div> 
  <script src="../front/js/new_js_file.js">
  </script>


