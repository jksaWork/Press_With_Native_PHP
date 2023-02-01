<?php 
include "include/new_intl.php";
if(isset($cat)){
 
    $where = "where p_cat = $cat";
    $where2 = "and p_cat = $cat";
    // print_r($cat);
 
  }
  else{
      $where = "";
      $where2 = "";
  }
  
  $q= $con->prepare("SELECT *  , dayname(p_data) as day_name , dayofmonth(p_data) as day_number   ,monthname(p_data) as month_name  FroM posts  $where order by p_see desc limit 6");
  $q->execute();
  $posts = $q->fetchAll();
  $now = get_now();
  $now_day = $now["dayy"];
  $week_day = $now_day - 100;
  echo $week_day;


$q2= $con->prepare("SELECT *  , dayname(p_data) as day_name , dayofmonth(p_data) as day_number   ,monthname(p_data) as month_name  FroM posts  where p_day between ? and ?  $where2 order by p_see desc limit 4");
$q2->execute(array($week_day , $now_day));
$posts2 = $q2->fetchAll();
 
?>
<div class="new_container">
<section class="margin_top_bottom text-right">
<div class="row">
<span class="color ml-3 mr-3"> </span> 
<h2>   <?php la("more_seens")?>  <i class="fa fa-chevron-left fa-sm"></i></h2>
</div>
   <div class="row">
    <div class="col-md-8" >
        <div class="row">
            <?php foreach($posts as $post) {?>
                <div class="col-md-4 col-sm-6">
                <div class="post_container squre_shape mt-5">
                          <div class="post_img">
                          <a href="show_post.php?id=<?php echo $post["p_id"]?>&&name=<?php echo str_replace(" " , ">" ,$post["p_name"])?>&&cat=<?php echo $post["p_cat"]?>" >  <img src="post/<?php echo $post["p_image"]?>" alt="cant fount here"></a>
                          </div>
                          <div class="post_head text-right" class="main_link">
                          <?php if(! empty($post["p_mark"])) {?>
                            <span class="mark_categories">
                              
                          </span>
                          
                          <?php } ?>
                              <a href="show_post.php?id=<?php echo $post["p_id"]?>&&name=<?php echo str_replace(" " , ">" ,$post["p_name"])?>&&cat=<?php echo $post["p_cat"]?>" class="main_link" ><span>
                                  
                                  </span> <?php echo $post["p_name"]?></a>
                          </div>
                          <div class="row date_info">
                                    <div class="col-6 text-right cl_main">mohammed altigani <i class="fa fa-chevron-left"></i></div> 
                                        <div class="col-6"><?php da($post["day_name"])?>-<?php da($post["day_number"])?>-<?php da($post["month_name"]);?></div>
                                        
                                    </div>
                     </div>
                          </div>
            <?php } ?>
        </div>       
    </div>
    <div class="col-md-4 mt-5" id="#lood">

    <?php  if(isset($cat)) { ?>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item active" onclick="fetch_data_<?php echo $cat ?>(44)" >
              <div class="nav-link "   > <?php la("week")?> </div>
          </li>
           <li class="nav-item "   onclick="fetch_data_<?php echo $cat ?>(44)">
              <div class="nav-link " > <?php la("month")?> </div>
          </li>
    </ul>  
    <?php }else{?>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item active" onclick="fetch_data(44)" >
              <span class="nav-link "   > <?php la("week")?> </span>
          </li>
           <li class="nav-item "   onclick="fetch_data(44)">
              <span class="nav-link " > <?php la("month")?> </span>
          </li>
    </ul> 
   
   <?php  } ?>    
        <div class="relative_looding d_none_custom">
        <div class="loading">
                <div class="container_loading">
                <span class="one"></span>
                <span class="tow"></span>
                <span class="there"></span>
                
                </div>
            </div>      
        </div>
        <div class="post_see_container">
        <div class="row old">
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
                                        <div class="col-6"><?php da($post["day_name"])?>/<?php echo $post["day_number"]?>/<?php da($post["month_name"]);?></div>
                                        
                                    </div>
                                </div>
               
            <?php } ?>
        </div>
       <div class="row new">

        </div>
       
        <?php if(isset($cat)){ ?>
        <script>
       function fetch_data_<?php echo $cat ?>(pram){
        var request = new XMLHttpRequest();
    request.onreadystatechange =function(){
         if(this.readyState ==4 && this.status == 200 ){
                 var data  = this.responseText;
                 $(".post_see_container .new").html( data )
                 console.log(data);
             }
         }
         request.open("GET" , "post_see_alt.php?no=100&cat=<?php echo $cat?>", false);
         request.send(); 
        }
    </script>
    <?php } ?>
        
        </div>


  </div>  
 </div>
</section>
</div>