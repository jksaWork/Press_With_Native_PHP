<?php 
include "include/new_intl.php";


function latestPost($one , $tow){
    global $con;
    
$q = $con->prepare("SELECT * FROM posts  where p_id  between  ? and ? order by p_data desc");
$q->execute(array($one, $tow));
return $q->fetchAll();
}

$number_of_data = calcDataBase("p_id" , "posts");
$second_no = $number_of_data - 4 ;
$three_no = $second_no - 3;



$four_post = latestPost( $three_no,$second_no );

foreach($four_post as $post){?>
<div class="min_size_view list_veiw row">
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
<?php }?>
</div>
</div>





