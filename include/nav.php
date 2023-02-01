<?php 
include "intl.php";

?>
<nav class="navbar navbar-expand-lg  bg-light">
    <div class="container">
        <div class="navigation_continer align-items-center">
        <div class="logo text-right">
                 <h2><?php la("heading_of_website")?> </h2>
        </div>
        <ul class="navigations">
                <div class="iconToggel ">
                        <span class="first"></span>
                        <span class="sec"></span>
                        <span class="last"></span> 
                </div>
                <h5><?php la("menu")?></h5>
                        <li><a href=""><span class="minmed ml-3 "><i class="fa fa-search"></i></span> <?php la("home")?></a></li>
                        <li><a href="latestpost.php"><span class="minmed ml-3 "><i class="fa fa-search"></i></span><?php la("latest_posts")?></a></li>
                     <li> <span class="minmed ml-3 "><i class="fa fa-search"></i></span>   <button class=" dropdown-toggle  btn-all " data-toggel="dropdown" type="button" id="dropdawn " aria-haspopup="true" aria-expanded="false">
                        <a href=""><span class="minmed ml-3"> <?php la("categoreis")?>
                        </button> </a></li>
                        <li><a href=""><span class="minmed ml-3 "><i class="fa fa-search"></i></span><?php la("how_us")?></a></li>
                        <li><a href=""><span class="minmed ml-3 "><i class="fa fa-search"></i></span><?php la("call_us")?></a></li>
                        <h5 class="copyright"><?php la("copyright")?></h5>
                </ul>
        </div>  
     </div>
    </nav>
    
