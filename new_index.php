<?php
$title = "home";
session_start();
include "include/new_intl.php";
include "new_navigation.php";
if (isset($_GET["wellcom"])) {
	echo '<div class="alert alert-info">نم استلام الطلب سيتم الناكد من المعلومات </div>';
}
?>
<div class="new_container">
	<div class="row margin_top_bottom align-items-center">
		<div class="col-md-8">
			<?php include "new_sliding_carosel.php"; ?>
		</div>
		<div class="col-md-4">
			<?php include "last_four_posts.php" ?>
		</div>
	</div>
</div>
<!-- this is setion to show the news by useing for loop -->
<!-- ظظmohammed@altigani.osman -->

<?php
$categorires = get_last_where(" c_name , color", "categories",  "where c_status = 1");
print_r($categorires);

// $categorires  = getLetest("c_name , color " , "categories" ,  "" , "limit 10");
foreach ($categorires as $key  => $section) :
	// $postsAll = ineerjoin("users.u_name , posts.* ,TIMESTAMPDIFF(MINUTE , P_data , NOW()) AS p_second "  , "posts" , "users", "users.u_id = posts.p_user "   ,
	// "where p_cat = $key  and p_status =1" ,"limit 7" , "ORDER BY p_data DESC");
	$key = $key + 1;
	$last_post =  get_last_where("p_name , p_image , p_id , p_cat , p_mark,TIMESTAMPDIFF(MINUTE , P_data , NOW()) AS p_second  ", "posts", "where p_cat = $key and p_status =1  ", " order by p_id desc ",  "limit 4");

?>


<section class="<?php echo $section[0]; ?>" style="--main-color:<?php echo $section[1] ?>">
	<div class="new_container">
		<div class="container_head">
			<span class="color"> </span>
			<h2><?php echo $section[0]; ?> </h2> <span><i class="fa fa-chevron-left fa-sm"></i></span>
		</div>
		<div class="row">
			<?php foreach ($last_post as $post) { ?>
			<div class=" col-md-3 col-sm-6 mt-3">
				<div class="post_container squre_shape">
					<div class="post_img">
						<a
							href="show_post.php?id=<?php echo $post["p_id"] ?>&&name=<?php echo str_replace(" ", ">", $post["p_name"]) ?>&&cat=<?php echo $post["p_cat"] ?> ">
							<img src="post/<?php echo $post["p_image"] ?>" alt="cant fount here"
								oneror="alert()"></a>
					</div>
					<div class="post_head text-right" class="main_link">
						<?php if (!empty($post["p_mark"])) { ?>
						<span class="mark_categories">
							<?php echo $post["p_mark"]; ?>
						</span>
						<span class="btn btn-primary"> <a download="index.php" href="index.php">dwonlaod</a>
						</span>
						<?php } ?>
						<a href="show_post.php?id=<?php echo $post["p_id"] ?>&&name=<?php echo str_replace(" ", ">", $post["p_name"]) ?>&&cat=<?php echo $post["p_cat"] ?>"
							class="main_link"><span>

							</span> <?php echo $post["p_name"] ?></a>
							
					</div>
				</div>
			</div>

			<?php }  ?>

		</div>
		<div class="add_more section<?php echo $key ?> margin_top_bottom">
			<span class="show_btn btn  "
				onclick="get_data(100 , <?php echo $key; ?>, 'section<?php echo $key ?>' );">show more <span
					class="m-1"><i class="fa fa-chevron-left "></i></span></span>
		</div>

</section>
</div>


<section>
	<div class="container_head">
		<span class="color"> </span>
		<h2 class="spical"><?php la("let_go") ?></h2> <span><i class="fa fa-chevron-left fa-lg"></i></span>
	</div>
	<iframe src="let_go.php" frameborder="0" class=" farme_let">

	</iframe>
</section>

<?php
endforeach;
// include "post_see.php";
include "include/new_footer_section.php";
include "include/new_footer.php";
?>