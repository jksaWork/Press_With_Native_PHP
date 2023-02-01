<?php 
    $title = "categores";

    include "include/new_intl.php"; 
   include "new_navigation.php";
//    latest post 


    if(! empty($_GET["pageName"]) &&isset($_GET["pageName"])){
        $id = inTval(filter_var($_GET["pageName"] , FILTER_SANITIZE_NUMBER_INT));
        $limted =calcDataBase("p_id" , "posts" , "where p_cat = $id ");
        $check = checkExist("*" , "categories" , "c_id =$id");
        $fack = checkExist("c_name , color" , "categories" , "c_id =$id" , true);
        if(isset($_GET["no"])){
          $no = filter_var($_GET["no"] , FILTER_SANITIZE_NUMBER_INT);
          $where = "and p_id < $no";
          echo $where;
        }
        else{
            $where = "";
        }

          if( $check == 1 ){
           
            $q = $con->prepare("SELECT * FROM posts where p_cat = ? order by p_im desc");
            $q->execute(array($id));
            $reslut = $q->fetch();

                $q2 = $con->prepare("SELECT * , dayname(p_data) as day_name , dayofmonth(p_data) as day_number   ,monthname(p_data) as month_name  FROM `posts` WHERE p_cat = ?   ? and p_status = 1 order BY p_id LIMIT 8 ");
                $q2->execute(array($id , $where));
                $posts = $q2->fetchAll();   

               ?> 
               
<div class="face_body" style="--main-color:<?php echo $fack[0]["color"];?>">
<div class="new_container">
      <h3 class="text-right mt-5"><?php la("home")?> <i class="fa fa-chevron-left fa-sm"></i> <?php echo $fack[0]["c_name"]?></h3>
        <div class="margin_top_bottom">
                <div class="last_post cat">
                <div class="last_post_img text-center">
                    <img src="post/<?php echo  $reslut["p_image"]?>" alt="<?php echo "this is not good"?>" title='jksa altigani osman'">
                </div> 
                <div class="last_post_title text-center">
                    <p><a class="th_link" href="show_post.php?id=<?php echo $reslut["p_id"]?>&name=<?php echo $reslut["p_name"]?>&cat=<?php echo $reslut["p_cat"]?>"><?php echo $reslut["p_name"]?><?php echo $reslut["p_des"]?></a></p>
                </div>   
                </div>
            </div>
        </div>

<!-- old styling new_styling here  -->
<div class="new_container">
    <div class="row margin_top_bottom">
     
            <?php
            $i = 1;
            foreach( $posts as $post){  
                if( $i < 5){ $i++; ?>
                    <div class=" col-md-3 col-sm-6 mt-3">
                    <div class="post_container squre_shape">
                          <div class="post_img">
                          <a href="show_post.php?id=<?php echo $post["p_id"]?>&&name=<?php echo str_replace(" " , ">" ,$post["p_name"])?>&&cat=<?php echo $post["p_cat"]?>" >  <img src="post/<?php echo $post["p_image"]?>" alt="cant fount here"></a>
                          </div>
                          <div class="post_head text-right" class="main_link">
                          <?php if(! empty($post["p_mark"])) {?>
                            <span class="mark_categories">
                              <?php echo $post["p_mark"]?>
                          </span>
                          
                          <?php } ?>
                              <a href="show_post.php?id=<?php echo $post["p_id"]?>&&name=<?php echo str_replace(" " , ">" ,$post["p_name"])?>&&cat=<?php echo $post["p_cat"]?>" class="main_link" ><span>
                                  
                                  </span> <?php echo $post["p_name"]?></a>
                          </div>
                          <div class="row date_info">
                                    <div class="col-6 text-right cl_main"><?php  echo $post["fake_tit"]; ?> <i class="fa fa-chevron-left fa-sm"></i></div> 
                                        <div class="col-6"><?php da($post["day_name"])?> - <?php echo $post["day_number"]?> - <?php da($post["month_name"]);?></div>
                                        
                                    </div>
                     </div>
                  </div>
                          <?php  } else { 
                                $i++;?>
                                <div class=" col-md-3 col-sm-6 mt-3">
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
                              
                       <?php  }
                
                ?>
           
           
            <?php }?>


                </div>

             <?php
             $cat = $id;
          
               ?>
              <section>
              <div class="container_head">        
                    <span class="color"> </span>   <h2 class="spical"><?php la("let_go")?></h2>  <span><i class="fa fa-chevron-left fa-lg"></i></span>
                </div>
                    <iframe src="let_go.php?cat=<?php echo $id?>" frameborder="0" class=" farme_let">

                    </iframe>
           </section>

             </div>

            
             </div>
 


                        </div>
                        </div>
                        </div>

   <?php
}else{
    $massege = '<div class="alert alert-danger">error 404 </div>' ;
    echo $massege. '<meta http-equiv="refresh" content="3 url=index.php">';
    
}

}



include "include/new_footer_section.php";
include "include/new_footer.php";
?>