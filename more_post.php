
<?php
include "include/connect.php";
include "include/lang/function.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){
        $id = $_GET["id"];
        $cat = $_GET["cat"];

}

echo "<br>";
$q = $con->prepare("select p_name , p_id , p_image from posts where p_id < ? and p_cat = ? order by p_data desc limit 4 ");
$q->execute(array($id , $cat));
$posts = $q->fetchall();
?>
<div class="row margin_top_down">
        <?php foreach($posts as $post) { ?>

                        <div class="col-md-3 col-sm-6 mt-3">
                                        <div class="post_container squre_shape">
                                                <div class="post_img">
                                                        <div class="mark_categories"> new</div>
                                                <a href="view_news.php?id=<?php echo $post["p_id"]?>"> <img src="post/<?php echo $post["p_image"];?>" alt="cant fount here"></a>
                                                </div>
                                                <div class="post_head">
                                                        <a class="main_link"href="view_news.php?id=<?php echo $post["p_id"];?>"> <?php echo $post["p_name"];?></a>
                                                </div>
                                        </div>
                                </div>
        <?php } ?>
        <div class="add_more section<?php echo $key?> margin_top_bottom">

<a class="show_btn btn m-1 bg_main d-block" href="index.php">show more</a>
        </div>
        </div>