<?php 
include "include/connect.php";
include "include/lang/function.php";
include "include/lang/arabic.php";
if( $_SERVER["REQUEST_METHOD"] == "POST" ){
   
    $page = $_POST["page"];
    $num = $_POST["num"];
    $new_limit = $num - ($page * 10);
    $new_limit_min = $new_limit - 10;
    echo $new_limit . $new_limit_min;
     
           $response = get_limit_where_com( $new_limit_min  , $new_limit );  

    
    
    foreach($response as $com){?>
 <div class="min_size_view list_veiw">
          <div class="img_post_min_size">
           
                  <img src="../front/img/profile.svg" alt="not found " class="circal">
             
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
                            <li class=""> <a href="show.php?do=comments&id=<?php echo $com["com_id"]; ?>>" > <?php la("info")?></a></li>
                            <li class=""> <a href="comments.php?do=active&id=<?php echo $com["com_id"]?> "><?php la("add")?></a></li>
                            <li  class=""> <a  href="comments.php?do=delete&id=<?php echo $com["com_id"]?> " ><?php la("delete")?></a></li>
                            <li  class=""> <a  href="comments.php?do=edit&id=<?php echo $com["com_id"]?> " ><?php la("edit")?></a></li>                        
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


