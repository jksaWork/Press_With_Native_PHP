<?php 
$categorires = get_last_where(" c_name , color" , "categories",  "where c_status = 1");

?>
<ul class="footer_navigation_item">
    <?php foreach ($categories as $cat ) :  ?>
    <li date-color="footer_li" class="footer_li">
        <a href="categorires.php?id=<?php echo $cat["c_id"]?>" class="navigation_link">
          <?php echo $cat["c_name"];?>
        </a>
    </li>

    <?php endforeach; ?>

