<?php
   setcookie("u_admin_name" ,  $user["u_name"]  , time()-20000 , "/");
   setcookie("u_admin_id" ,  $user["u_id"]  , time()- 200000 , "/");
   setcookie("u_admin_pass" ,  $user["u_pass"]  , time() -200000 , "/");
   header("location: index.php");
?>
