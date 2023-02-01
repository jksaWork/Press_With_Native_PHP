<?php 
include "include/new_intl.php";
if(isset($_GET["cat"])){
    $cat = filter_var($_GET["cat"] , FILTER_SANITIZE_NUMBER_INT);
    $where = "and p_cat = $cat";
}else{
    $where = "";
}
if(isset($_GET["no"]) && is_numeric($_GET["no"]))
{
    $var = filter_var($_GET["no"], FILTER_SANITIZE_NUMBER_INT);
   
    $now = get_now();
     $now_day = $now["dayy"];
    $week_day = $now_day - $var;
  
  
  $q2= $con->prepare("SELECT *  , dayname(p_data) as day_name , dayofmonth(p_data) as day_number   ,monthname(p_data) as month_name  FroM posts  where p_day between ? and ?  $where order by p_see desc limit 4");
  $q2->execute(array($week_day , $now_day));
  $posts2 = $q2->fetchAll();
}
?>
<div class="row ">
      <?php foreach($posts2 as $post ) { ?>
               <div class="col-12 mt-3 mb-3">
               <div class="min_size_view list_veiw row ">
                                    <div class="img_post_min_size">
                                            <a href="#">  <img src="post/<?php echo $post["p_image"];?>" alt="this is image is not found now"></a>
                                    </div>
                                
                                    <div class="head_post_min_size right">
                                            <p><a href="show_post.php?id=<?php echo $post["p_id"]?>&&name=<?php echo str_replace(" " , " > " ,$post["p_name"])?>?>&&cat=<?php echo $post["p_cat"]?>" class="second_link">
                                           
                                            <?php echo $post["p_name"];?>"
                                                        </a>
                                            </p>

                                        </div>
                                        
                                    </div> 
                                    <div class="row date_info">
                                    <div class="col-6 text-right cl_main">mohammed altigani <i class="fa fa-chevron-left"></i></div> 
                                        <div class="col-6"><?php echo $post["day_name"]?>/<?php echo $post["day_number"]?>/<?php echo $post["month_name"];?></div>
                                        
                                    </div>
                                </div>
               
            <?php } ?>
            <div class="row new">

            </div>
            </div>