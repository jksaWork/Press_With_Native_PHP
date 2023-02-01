<?php 
(@session_start());
?>
<div class="uperbar">
   <div class="container"> 
       <div class="row align-items-center  custom_media_justify">
           <div class="col-6 row justify-content-flex-star">
           <div>
   
        <div class="upper_information">
        <?php if( isset($_SESSION["userData"])) { ?>
            <div class="img_upper_container">
                <img src="<?php echo $img?>profile.svg" alt="" class="upper_img">
            </div>

      <div class="dropdown show">
      <button class="btn btn-default dropdown-toggle" data-toggel="dropdown" type="button" id="dropdawn " aria-haspopup="true" aria-expanded="false">
        seeting
        </button>
            <ul class="dropdown-menu" aria-labelledby="dropdawn" >
             <li   class="dropdown-item"><a href="showPrfile.php">profile</a></li>
             <li class="dropdown-item"><a href="new.php"  class="dropdown-item">add new</a></li>
             <li class="dropdown-item"><a href="logout.php"  class="dropdown-item">logout</a></li>
            </ul>
       </div>
        <?php }else{?>
      <div class="btn_group">
      <a class="btn btn-primaryy btn-sm" href="login.php">login</a>
      <a class="btn btn-second btn-sm" href="sing.php">sing_up</a>
      
      </div>
            
            
        <?php }?>
           
        
            
       

     </div>
    </div>
</div>
<div class="col-6 justify-content-end row  serch_sections">
   
        <form action="search.php" method="get" class="col-10">
        <div class="custom_search_content">
        <div class="custom_search <?php echo $reverse?>  align-items-center">
            <button class="btn btn-sm btn-primaryy search_span "> <span class="bigmid">
                 <?php la("search")?></span> 
                 <span class="minmed"><div class="fa fa-search"></div></span>
        
        </button>
            <input
            name="search"
             type="search"
              placeholder="<?php la("search_palceholder"); ?>" 
              class="<?php echo $algin?> media_search_option"/>
           </div>
        </form>
    </div>
</div>

</div>

</div>
</div>  

