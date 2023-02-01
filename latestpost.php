<?php
$title = "اخر الاخبار";

include "include/new_intl.php";
include "new_navigation.php";



function latestPost_inner($one , $tow){
    global $con; 
$q = $con->prepare("SELECT * , TIMESTAMPDIFF(SECOND , P_data , NOW()) AS p_second FROM posts  where p_id  between  ? and ? order by p_data desc");
$q->execute(array($one, $tow));
return $q->fetchAll();

}
$number_of_data = calcDataBase("p_id" , "posts");

if(isset($_GET["no"]) && is_numeric($_GET["no"])){
    $nuberpage = $_GET["no"];
    $between = $number_of_data - ($nuberpage * 10 ) ;
    $betweensql = ($between + 8);
    $latest_data =latestPost_inner($between ,$betweensql ) ;
}else{
    $between = $number_of_data -  10  ;
    $betweensql = ($between + 8);
    $latest_data =latestPost_inner($between ,$number_of_data ) ;
    $nuberpage = 1;
}
$pages = floor($number_of_data / 10);

?>

<div class="new_container">
    <div class="margin_top_bottom">
        <h3 class="text-right mr-3"> <b><?php la("home")?></b> <i class="fa fa-chevron-left ml-2 mr-2"></i><b><?php la("latest_posts")?></b></h3>
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
        <ul class="pagination <?php echo $algin?> cl_main">
        <?php if($pages > 10 ){$pages = 10; } 
              for ($i=1; $i < $pages ; $i++) { ?>
                    <li class="page-item <?php if( $i == $nuberpage){echo "active";}?> li_active ">
                      <a class="page-link cl_main" href="?no=<?php echo $i?>" ><?php echo $i?></a>
                    </li>
                  <?php } ?>
                  <li class="page-item">
                      <a class="page-link page_link" href="?no=<?php echo $nuberpage + 1?>">Next</a>
                  </li>
        </ul>
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
?>