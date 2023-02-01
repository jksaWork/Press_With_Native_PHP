<?php 
include "include/connect.php";
include "include/lang/function.php";
include "include/lang/arabic.php";
if( $_SERVER["REQUEST_METHOD"] == "POST" ){
   
    $page = $_POST["page"];
    $num = $_POST["num"];
    $new_limit = $num - ($page * 10);
    $new_limit_min = $new_limit - 10;

    $response = get_limit_where_users( $new_limit_min  , $new_limit );  
    $admin =  is_admin($_COOKIE['u_admin_group']) ? "show" : "hidden";  
  
    
    foreach($response as $user)  :?>

<div class="min_size_view list_veiw">
              <div class="img_post_min_size">
                    <?php if(empty($user["u_profile"])){?>
                      <img src="../front/img/alwifaq.png" alt="not found " class="circal">
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
                                <li class="<?php echo $admin?>"> <a href="new_users.php?do=active&id=<?php echo $user["u_id"]?> "><?php la("add")?></a></li>
                                <li  class="<?php echo $admin?>"> <a  href="new_users.php?do=delete&id=<?php echo $user["u_id"]?> " ><?php la("delete")?></a></li>
                                <li  class="<?php echo $admin?>"> <a  href="new_users.php?do=edit&id=<?php echo $user["u_id"]?> " ><?php la("edit")?></a></li>                        
                            </ul>   
                       </div>
                </ul>
               </div>

                </div>
                    
                
           
                    <?php endforeach ;?>
                    <div class="more_post">
<?php   
}
?>
 <div class="<?php echo $algin?>">
                        <span class="btn btn-primaryy mt-4 bg_main" onclick="get_post(<?php echo  $page +1 ?> ,<?php echo  $new_limit?>)"> show more users <span><i class="fa fa-eye"></i></span> </span>
                    </div> 
  <script src="../front/js/new_js_file.js">
  </script>


