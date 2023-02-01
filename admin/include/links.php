<ul class="navigation_item">
    <li date-color="red">
        <a href="dashbord.php" class="navigation_link"><?php la("cp")?>
        </a>
    </li>
    <li date-color="red">
        <a href="new_users.php " class="navigation_link">  <?php la("users");?>
        </a>
    </li>
    <li date-color="red">
        <a href="posts.php " class="navigation_link"><?php la("posts");?>
        </a>
    </li>
    <li date-color="red">
        <a href="comments.php " class="navigation_link"> <?php la("comments")?>
        </a>
    </li>
    <li date-color="red">
        <a href="your_post.php?id=<?php echo $_COOKIE["u_admin_id"]?>" class="navigation_link"> <?php la("your_post")?>
        </a>
    </li>
   
    <li date-color="red">
        <a href="show.php?do=users&&id=<?php echo $_COOKIE["u_admin_id"]; ?>" class="navigation_link"><?php la("pro")?>
        </a>
    </li>
  
    <li date-color="red">
        <a href="categories.php " class="navigation_link"><?php la("categoreis");?>
        </a>
    </li>
      <li date-color="red">
        <a href="out.php " class="navigation_link"> <?php la("out")?>
        </a>
    </li>
    
    </ul>
   
