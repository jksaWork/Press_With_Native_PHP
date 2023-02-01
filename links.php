<?php
include "include/new_intl.php";
$categories  = getLetest("c_name , c_id, color" , "categories" ,  "where c_status = 1" , "limit 10");
?>

<ul class="navigation_item">
    <li>
       <a href="index.php" class="navigation_link">
        <?php la("home")?>
        </a>
    </li>
    <li style="--main-color:red">
       <a href="latestpost.php" class="navigation_link">
        <?php la("latest_posts")?>
        </a>
    </li>
    <?php foreach ($categories as $cate ) :  ?>
    <li style="--main-color:<?php echo $cate["color"];?>">
        <a href="new_cat.php?pageName=<?php echo $cate["c_id"]?>" class="navigation_link">
       <?php echo $cate["c_name"];?>
        </a>
    </li>

    <?php endforeach ?>
     
 </ul>
 <ul class="langague">
     <div class="lang_ul">
     <div class="link">  
             <a href=# class="navigation_link langage_toggler"><?php la("langauge") ?></a>
            <ul class="list_of_langaue">
                <li class="active"><?php la("arabic") ?></li>
                <li><?php la("english") ?></li>
                <li><?php la("others") ?></li>
            </ul>
       </div>
     <span><i class=" fa fa-chevron-down ml-3 mr-3"></i> </span>
     
        
								
     </div>
    

 </ul>
 <h5 class="copyright_media">copy right at jksa </h5>