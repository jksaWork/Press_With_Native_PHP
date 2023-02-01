<?php include "include/new_intl.php"?>

<section class="slider_content">
    <div class="overlay"></div>

    
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators" >
            <?php
            $slids = getLetest("* ,   TIMESTAMPDIFF(MINUTE , P_data , NOW()) AS p_second ,MONTHNAME (p_data) AS p_month
            ,dayofmonth(p_data) as day ,   MINUTE(p_data) AS MINUTE    ,   HOUR(p_data) AS HOUR 
            " , "posts" , "ORDER BY p_data DESC");
          

                foreach ($slids as $key => $slid) {
                
                  ?>
            <li class="custom_indecators" data-target="#carouselExampleIndicators" data-slide-to=<?php echo $key ?> class="active"> <span class="unmber_of_slide"><?php echo $key + 1?></span></li>
                    
            <?php } ?>
            </ol>
          <div class="carousel-inner row align-items-center">
          <?php 

          
            foreach ($slids as $key => $slid) { 
              $mint = $slid["MINUTE"] < 10 ?  "0".$slid["MINUTE"]: $slid["MINUTE"];
              $hour = $slid["HOUR"] < 10 ?  "0".$slid["HOUR"]: $slid["HOUR"];
              $day = $slid["day"] < 10 ?  "0".$slid["day"]: $slid["day"];
              $month = $slid["p_month"];
              $date = $month ."/" . $day . "/ ". $hour . " : " . $mint;
      
              
              
              ?> 
                      <div class="carousel-item  <?php $act = $key == 1 ? "active" : ""; echo $act ?>" style=" background-image:url('<?php echo "post/".$slid["p_image"]?>')" >
                            <div class="carousel_post">
                                      <div>
                                        
          <h1><a class="post_link" href="show_post.php?id=<?php echo $slid["p_id"]?>&name=<?php echo str_replace(" " , ">" ,$slid["p_name"])?>&&cat=<?php echo $slid["p_cat"] ?>"><?php echo $slid["p_name"]?> </a></h1>                                    
                                      </div>
                                  </div>
                          
                      </div>
            <?php } ?>
                    

            </div>
        
     <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only" >previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"> </span>
          <span class="sr-only" > next</span>
          </a> 
        
        
      </div>
</section>