
<div class="header_of_navigations">
     <div class="data_line">
           <div class="new_container">
              <div class="row">
                    <div class="col-12 right justify-content date">
                    <div class="row">
                           <span> <?php echo $now[0];?></span> - <span> <?php echo $now[1];?></span>  - <span> <?php echo $now[2];?></span> - <span> <?php echo $now[3];?></span>               
               </div>
                </div>
               </div>
                   
             </div>
        </div>
        <div class="new_container">
<div class="row logo_line">
        <div class="col-6">
                <div class="main_image_container">
                        <img src="../front/img/main.png" class="main_image dark_mode_none">
                </div>
        </div>
        <div class="col-6">
                <div class="buttom_container">
                    
                        <div class="change_mode">
                                <span class="dark_mode btn "><i class="fa fa-moon fa-lg"></i></span>
                               <span class="light_mode btn active"> <i class="fa fa-sun fa-lg"></i> </span>

                        </div>
                        <div class="custom_search">
                                <div class="btn bg_main sea_btn">  <i class="fa fa-search"></i>  <?php la("search")?></div>
                                     <div class="search_from">
                                        <form action="search.php" method="POST">
                                                <div class="custom_search_input">
                                                        <button class="btn bg_main "> <?php la("serach")?> <i class="fa fa-search"></i> </button>

                                                        <input type="text">
                                                </div>
                                        </form>
                                  </div>
                        </div>
                        <div class="menu_toogler">
                                <span class="first"></span>
                                <span class="sec"></span>
                                <span class="thre"></span>
                        </div>
                        </div>

                        
                </div>
        </div>
        </div>
</div>


<nav class="navigation_bars">
 
   
        <div class="menu_media">
                <h5 class="active" data-load="handlers/links.html"> <span class="menu_icons"><i class="fa fa-bars"></i> </span><span>meun </span></h5> 
              
                <span class="close_container"><i class="fa fa-chevron-left fa-lg"></i>  </span> 
        </div>
        <div class="navigation_container">
           <?php include "links.php"?>
        </div>
        </div>
</nav>
</div>
</div>

 
    </script>