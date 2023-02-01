<?php 
$title= "search";
include "include/new_intl.php";
include "new_navigation.php";

    $serch_value =filter_var($_POST["search"], FILTER_SANITIZE_STRING);
    $q = $con->prepare("SELECT * , TIMESTAMPDIFF( MINUTE, P_data , NOW()) AS p_second , dayname(p_data) as day_name ,  dayofmonth(p_data) as day_number   ,monthname(p_data) as month_name  FROM posts WHERE p_name LIKE '%_".$serch_value."_%' or p_artical like '%_".$serch_value."%'limit 9");
    $q->execute();
    $serch_content = $q->fetchAll(); 
?>
<div class="margin_top_bottom">
<div class="new_container">
    <div class="row margin_top_bottom">
            <div class="col-md-8">
                 <div class="row  align-items-center">
                     <h6 class="<?php echo $algin?> col-6"><?php la("the_result_serch")?>:</h6>
                     <div class="col-6 justify-content-end row  serch_sections">
                         <form action="new_search.php" method="post" class="col-12">
                           <div class="custom_search_content diff_search">
                                <div class="custom_search <?php echo $reverse?>  align-items-center">
                                    <button class="btn btn-sm btn-primaryy search_span"><div class="fa fa-search"></div></button>
                                    <input name=search type="search" value="<?php echo $serch_value?>" class="<?php echo $algin?> media_search_option"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
     <div class="search_container">
            <div class="row">
            <?php $i = 0 ; if( ! count($serch_content) == 0){  
             foreach($serch_content as $post):
                        if( $i < 6){ $i++; ?>
                    <div class=" col-md-4 col-sm-6 mt-3">
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
                          <div class="row date_info">
                                    <div class="col-6 text-right cl_main">mohammed altigani <i class="fa fa-chevron-left"></i></div> 
                                        <div class="col-6"><?php echo $post["day_name"]?>/<?php echo $post["day_number"]?>/<?php echo $post["month_name"];?></div>
                                        
                                    </div>
                     </div>
                  </div>
                          <?php  } else { 
                                $i++;?>
                                <div class=" col-md-4 col-sm-6 mt-3">
                                <div class="min_size_view list_veiw row mt-3">
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
                              
                       <?php  }?>
                
         
            <?php endforeach ;
            } else{ ?>  
            <div class="alert alert-info <?php echo $algin?> mt-4 "><?php la("notfound_result") ;  echo $_POST["search"];  ?> </div>
            <?php } ?>   
        
            </div>
     </div>
 </div>

            <div class="col-md-4 ">
            
        
          
            </div>
            </div>
    </div>
</div>

<?php include "let_go.php"?>


<?php
 include "include/new_footer_section.php";
 include "include/new_footer.php";
?>