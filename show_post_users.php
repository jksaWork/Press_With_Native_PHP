<?php
if(isset($_GET["n"]) && is_numeric($_GET["id"])){ 
$name = filter_var($_GET["n"] , FILTER_SANITIZE_STRING);
$id = filter_var($_GET["id"] , FILTER_SANITIZE_NUMBER_INT);
$title = $name;

include "include/new_intl.php";
include "new_navigation.php";

$p_user = $id;

function latestPost_inner($one , $tow){
    global $con; 
$q = $con->prepare("SELECT * , TIMESTAMPDIFF(SECOND , P_data , NOW()) AS p_second FROM posts  where p_id  < ? and p_user = ?  order by p_data desc LIMIT 8");
$q->execute(array($one, $tow));
return $q->fetchAll();

}
$number_of_data = calcDataBase("p_id" , "posts" , "where p_cat = $p_user");

if(isset($_GET["no"]) && is_numeric($_GET["no"])){
   $nuberpage  = filter_var($_GET["no"] , FILTER_SANITIZE_NUMBER_INT);

    $latest_data =latestPost_inner($nuberpage ,$id ) ;
}else{

    $latest_data = latestPost_inner($number_of_data ,$id ) ;
    $nuberpage = 1;
}
$pages = floor($number_of_data / 10);
$index  = count($latest_data) - 1;


?>

<div class="new_container">
    <div class="margin_top_bottom">
        <h3 class="text-right mr-3"> <b><?php la("home")?></b> <i class="fa fa-chevron-left ml-2 mr-2 fa-sm"></i><b><?php la("show_all_post")?> <?php echo $name?></a></h3>
    </div>
    <div class="row">
      <div class="col-md-8">
        <div class="last_post">
          <div class="last_post_img">
            <img src="post/<?php echo  $latest_data[0]["p_image"]?>" alt="<?php echo "this is not good"?>" title='jksa altigani osman'">
          </div> 
          <div class="last_post_title text-right">
             <p><a class="th_link" href="show_post.php?id=<?php echo $latest_data[0]["p_name"]?>&name=<?php echo $latest_data[0]["p_id"]?>&cat=<?php echo $latest_data[0]["p_cat"]?>"><?php echo $latest_data[0]["p_name"]?><?php echo $latest_data[0]["p_des"]?></a></p>
          </div>   
        </div>
      </div>
      <div class="col-md-4">
        <?php include "last_four_posts.php"?>
      </div>
    </div>
 <!-- end main posts and the another post -->
 <div class="margin_top_bottom">
 <div class="row">


<?php foreach($latest_data as $post){ ?>
  <div class=" col-md-3 col-sm-6 mt-3">
      <div class="post_container squre_shape">
            <div class="post_img">
            <a href="show_post.php?id=<?php echo $post["p_id"]?>&&name=<?php echo str_replace(" " , ">" ,$post["p_name"])?>&&cat=<?php echo $post["p_cat"]?>" >  <img src="post/<?php echo $post["p_image"]?>" alt="cant fount here"></a>
            </div>
            <div class="post_head text-right" class="main_link">
            <?php if(! empty($post["p_mark"])) {?>
              <span class="mark_categories">
                <?php echo $post["p_mark"];?>
            </span>
            <?php } ?>
                <a href="show_post.php?id=<?php echo $post["p_id"]?>&&name=<?php echo str_replace(" " , ">" ,$post["p_name"])?>&&cat=<?php echo $post["p_cat"]?>" class="main_link" ><span>                
                    </span> <?php echo $post["p_name"]?></a>
            </div>
       </div>
    </div>

<?php } ?>
</div>
</div>
<div class="new_container">
<div class="pagination mt-4" >
        <a href="?id=<?php echo $id ?>&n=<?php echo $name?>&no=<?php echo $latest_data[$index]["p_id"] ;?>" class="btn bg_main"><?php la("show_more")?></a>
</div>
</div>
            </div>

</div>



<div>
<?php include "let_go.php"?>
</div>
  </div>
<?php
 include "include/new_footer_section.php";
 include "include/new_footer.php";
              }
?>