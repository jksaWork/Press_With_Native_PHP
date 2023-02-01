<?php 
include "include/new_intl.php";
if (isset($_GET["cat"])){
   $cat = inTval(filter_var($_GET["cat"] , FILTER_SANITIZE_NUMBER_INT));
   $where = "where p_cat = $cat";
}
elseif(false){
   $where = "where p_user = $p_user";

}
else{
   $where =" ";
}

$reslut =get_last_where("*" , "posts" ,  "", "order by p_im desc "  , "limit 1");




?>

<section calss="margin_top_bottom">

   <div class="popular_post margin_top_bottom">
      <div class="popular_img_container">
        <a href="show_post.php?id=<?php echo $reslut[0]["p_id"]?>&name<?php $reslut[0]["p_name"]?>&cat=<?php echo $reslut[0]['p_cat']?>"> <img src="post/<?php echo $reslut[0]["p_image"]; ?>" alt="notfund"></a>
      </div>
   <div class="popular_title">
   <span class="new_color"></span>  
      <h4> <a class="th_link" href="show_post.php?id=<?php echo $reslut[0]["p_id"]?>&name<?php $reslut["p_name"]?>&cat=<?php echo $reslut[0]['p_cat']?>"><?php echo $reslut[0]["p_name"]; ?></a></h4>
    </div>
   <div class="popular_overlay">
   
   </div>
   </div>
</section>
</div>
