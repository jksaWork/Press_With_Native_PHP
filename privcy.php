<?php 
include "include/new_intl.php";
$do  =  isset($_GET["do"]) ? $_GET["do"] : "undefined"; 
include "new_navigation.php";
if($do == "how_us"){ ?>
<div class="container">
    <h1 class="text-right mr-3"> <b><?php la("home")?></b> <i class="fa fa-chevron-left ml-2 mr-2"></i><b><?php la($do)?></b></h1>
<div class="margin_top_bottom">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="img_svg_des">
                <img src="front/new_img/face.svg" alt="">
        </div>
      </div>
      <div class="col-md-6">
          <div class="desc_word text-right">
              <h1> <span class="cl_main"> alwefage </span>  aleparia</h1>
              <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat perferendis reprehenderit repellat aspernatur culpa libero voluptate atque neque, perspiciatis amet mollitia ad alias nisi? Quo iste pariatur adipisci error labore?
              </p>
              <div class="alert alert-info">the page is un from this news in side </div>
          </div>
      </div>
    </div>
</div>

</div>

<div id="up">
<?php  }elseif($do=="call_us"){ ?>
    <div class="container">
    <h1 class="text-right mr-3"> <b><?php la("home")?></b> <i class="fa fa-chevron-left ml-2 mr-2"></i><b><?php la($do)?></b></h1>
<div class="margin_top_bottom">
    <div class="row align-items-center">
      
      <div class="col-md-6">
          <div class="desc_word text-right">
              <h1> <span class="cl_main"> alwefage </span>  aleparia</h1>
              <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat perferendis reprehenderit repellat aspernatur culpa libero voluptate atque neque, perspiciatis amet mollitia ad alias nisi? Quo iste pariatur adipisci error labore?
              </p>
              <div class="alert alert-info">the page is un from this news in side </div>
          </div>
      </div>
      <div class="col-md-6">
      <h1 class="text-right">  <?php la("socil_media") ?></h1>
        <div class="socil_media_box">
        <div class="media face">
                <div class="media_img">  <img src="front/new_img/face.svg" alt="whats app" title="whats app" ></div>
                <div class="media_data"> mohammed@altigani.com </div>
            </div>  
            <div class="media whats">
                <div class="media_img ">  <img src="front/new_img/tel.svg" alt="whats app" title="whats app" ></div>
                <div class="media_data"> mohammed@altigani.com </div>
            </div>
            <div class="media twitter">
                <div class="media_img">  <img src="front/new_img/twitter.svg" alt="whats app" title="whats app" ></div>
                <div class="media_data"> mohammed@altigani.com </div>
            </div>
            <div class="media email">
                <div class="media_img">  <img src="front/new_img/email.svg" alt="whats app" title="whats app" ></div>
                <div class="media_data"> mohammed@altigani.com </div>
            </div>
            
         
            <div class="media tel">
                <div class="media_img">  <img src="front/new_img/whats.svg" alt="whats app" title="whats app" ></div>
                <div class="media_data"> mohammed@altigani.com </div>
            </div>
            

            

        </div>
       
      </div>
    </div>
</div>


<?php } ?>

</div>
<?php include "include/new_footer_section.php";
include "include/new_footer.php"; ?>