<?php
session_start();

$title = "post";


if (isset($_COOKIE["u_admin_name"])) {
	include "include/intl.php";
	include "include/check_member.php";
	include "include/new_navigation.php";
	$id = $_COOKIE["u_admin_id"];
	$group = $_COOKIE["u_admin_group"];
	$admin =  is_admin($group) ? "show" : "hidden";
} else {
	header("location: index.php");
}
$do = isset($_GET["do"]) ? $_GET["do"] : "file";


if ($do == "file") {


	if (isset($_GET["mange"])) {
		if ($_GET["mange"] == "unactive") {
			$where = "WHERE p_status = 0";
			$unactive = "";
		} elseif ($_GET["mange"]) {
			$where = "WHERE p_status  != 0";
			$active = "";
		}
	} else {
		$where = "";
		$all = "";
	}

	$q = $con->prepare("SELECT  *   FROM `posts`  $where  order by p_id DESC  limit 10 ");
	$q->execute();
	$posts = $q->fetchAll();

	//    $src= $_SERVER["DOCUMENT_ROOT"];

?>
<div class="container">
	<h2 class="text-center"><?php la("mange_posts") ?></h2>
	<div class="fack_title right mt-5 mb-3 margin_top_bottom">
		<h5><?php la("mange_posts") ?> <span><i class="fa fa-chevron-left"></i></span> <?php la("posts") ?> <span><i
					class="fa fa-chevron-left"></i></span> <?php la("cp") ?> </h4>
	</div>

	<section class="data_container">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link <?php if (isset($all)) {
													echo "active";
												} ?>" href="posts.php"><?php la("all") ?></a>
			</li>
			<li class="nav-item">
				<a class="nav-link activeate <?php if (isset($active)) {
																echo "active";
															} ?>" href="?mange=active"><?php la("active") ?></a>
			</li>
			<li class="nav-item">
				<a class="nav-link unactiveate <?php if (isset($unactive)) {
																	echo "active";
																} ?>" href="?mange=unactive"><?php la("un_active") ?></a>
			</li>
		</ul>
		<div class="tab-content">
			<?php if (count($posts) == 0) { ?>

			<div class="alert alert-info te"><?php la("this_is_no_post") ?></div>

			<?php } else { ?>
			<?php foreach ($posts as $post) : ?>
			<div>


				<div class="min_size_view list_veiw">
					<div class="img_post_min_size">
						<?php if (empty($post["p_image"])) { ?>
						<img src="<?php echo $img ?>profile.svg" alt="not found " class="circal w-100">
						<?php } else { ?>
						<img src="<?php echo $uploaded . $post["p_image"]; ?>" alt="not fund " class="w-100">

						<?php } ?>
					</div>
					<div class="head_post_min_size right">
						<a href="#" class="main_link"> <?php echo $post["p_name"] ?></a>
					</div>
					<div class="col-md-2">
						<ul class="langague  custom_option left_30">
							<div class=" custom_options_div">
								<div class="point">
									<span></span>
									<span></span>
									<span></span>
								</div>
								<ul class="list_of_langaue large_width post_shape">
									<li class=""> <a
											href="show.php?do=post&id=<?php echo $post["p_id"]; ?>&&name=<?php echo $post["p_name"] ?>&&cat=<?php echo $post["p_cat"]; ?>">
											<?php la("info") ?></a></li>
									<li class="<?php echo $admin ?>"> <a
											href="posts.php?do=active&id=<?php echo $post["p_id"] ?>"><?php la("add") ?></a>
									</li>
									<li class="<?php echo $admin ?>"> <a
											href="posts.php?do=delete&id=<?php echo $post["p_id"] ?>"><?php la("delete") ?></a>
									</li>
									<li class="<?php echo $admin ?>"> <a
											href="posts.php?do=edit&id=<?php echo $post["p_id"] ?>"><?php la("edit") ?></a>
									</li>
									<li class="<?php echo $admin ?>"> <a
											href="posts.php?do=improve&id=<?php echo $post["p_id"] ?>"><?php la("improve") ?></a>
									</li>

								</ul>
							</div>
						</ul>
					</div>

				</div>



				<?php endforeach; ?>
				<div class="more_post">
					<div class="container">
						<span class="btn btn-primaryy mt-4 bg_main" onclick="get_post(1 ,<?php echo $posts[0]['p_id']; ?>)">
							<?php la("show_more") ?>
							<span><i class="fa fa-eye ml-1 mr-1"></i></span> </span>
						<script>
						function get_post(page_pram, num_pram) {

							$.ajax({
								method: "POST",
								url: "ajax_method.php",
								data: {
									page: page_pram,
									num: num_pram,
									where: "post"
								},
								success: function(response) {
									alert(response);
									$(".more_post").html(response);
								},
								error: function() {
									alert("can do this");
								}
							});
						}
						</script>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>

</div>



<div class="<?php echo $algin ?>">
	<a href="?do=add" class="btn btn-primaryy mt-4 bg_main"> <?php la("add_new_post") ?> <span><i
				class="fa fa-plus ml-1 mr-1"></i></span> </a>
</div>
</section>



</div>

</div>



</div>


<?php } elseif ($do == "add") {

?>
<div class="container">
	<div class="fack_title right mt-5 mb-3 margin_top_bottom">
		<h5>add post <span><i class="fa fa-chevron-left"></i></span> members <span><i
					class="fa fa-chevron-left"></i></span> control panel </h4>
	</div>

	<div class="form_container col-sm-12 <?php echo $algin ?> margin_top_botom">
		<form class="form-horizontal  " action='<?php echo $_SERVER["PHP_SELF"]; ?>?do=insert' method="post"
			enctype="multipart/form-data">

			<div class="form-group form-group-lg">
				<lable class="control-lable col-sm-2"> <?php la("name_of_artical") ?> :</lable>
				<div class=" input_container">
					<input type="text" placeholder="<?php la("name_of_artical_pl") ?>" class=form-control name=name required>
				</div>
			</div>
			<div class="form-group form-group-lg">
				<lable class="control-lable col-sm-2"><?php la("name_in_post") ?>:</lable>
				<div class=" input_container">
					<input type="text" placeholder="<?php la("name_in_post_pl") ?>" class=form-control name=descriptions
						required>
				</div>
			</div>
			<div class="form-group form-group-lg">
				<lable class="control-lable col-sm-2"> <?php la("mark") ?>:</lable>
				<div class=" input_container">
					<input type="text" placeholder="<?php la("mark_pl") ?> " class=form-control name=mark>
				</div>
			</div>
			<div class="form-group form-group-lg">

				<lable class="control-lable col-sm-2"><?php la("artical") ?>:</lable>
				<textarea name="artical" id="addArtical" cols="30" rows="10" class="form-control"></textarea>

			</div>
			<div class="form-group form-group-lg">
				<lable class="control-lable col-sm-2"> <?php la("mark") ?>:</lable>
				<div class=" input_container">
					<input type="text" placeholder="<?php la("mark_pl") ?> " class=form-control name=fake_title>
				</div>
			</div>

			<div class="form-group form-group-lg upload_container">
				<h6><?php la("post_img") ?> :</h6>
				<div class="custom_search_content ">

					<div class="custom_search <?php echo $reverse ?>">
						<span class="btn btn-sm btn-primaryy search_span"> <i class="fa fa-upload"></i> upload
						</span>

						<input type="file" placeholder="taype password" class="form-control custom_uplloded " name=imgPost>

					</div>
				</div>
			</div>

			<lable class="control-lable col-sm-2"> <?php la("section") ?>:</lable>

			<select name="categor" id="catSelect" class="form-group w-100">

				<?php

					$cats = getLetest("*", "categories", "c_id", "5");
					foreach ($cats as $cat) { ?>
				<option value="<?php echo $cat["c_id"] ?>"><?php echo $cat["c_name"] ?></option>

				<?php } ?>
			</select>
			<br>


			<input type="submit" class="btn bg_main btn-login btn-sm" name="send" value=<?php la("save") ?>>
		</form>
	</div>
</div>

<?php
} elseif ($do == "insert") {
	if ($_SERVER["REQUEST_METHOD"] == "POST") {


		$addName = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
		$desc = filter_var($_POST["descriptions"], FILTER_SANITIZE_STRING);
		$mark = filter_var($_POST["mark"], FILTER_SANITIZE_STRING);
		$artical = filter_var($_POST["artical"], FILTER_SANITIZE_STRING);
		$fake = filter_var($_POST["fake_title"], FILTER_SANITIZE_STRING);

		$select = filter_var($_POST["categor"], FILTER_SANITIZE_STRING);
		$id = $_COOKIE["u_admin_id"];
		$imgPost = $_FILES["imgPost"];


		$imgPOstNmae = $imgPost["name"];
		$imgPOstType = $imgPost["type"];
		$imgPOstTemp = $imgPost["tmp_name"];
		$imgPOstSize = $imgPost["size"];

		$aarayExtintion = array("jpg", "jpeg", "png", "svg");

		(@$nameofpic = strtolower(end(explode(".", $imgPOstNmae))));

		move_uploaded_file($imgPOstTemp,  $_SERVER["DOCUMENT_ROOT"] . "/new_wefage/post//" . $imgPOstNmae);





		$erro = array();

		// if( !z false){
		//     $erro[]  = '<div class="alert alert-danger"> this is extention is not allow </div>'; 

		// }

		//section valide 


		if (empty($addName)) {
			$erro[]  = '<div class="alert alert-danger"> post name can\'t be emty</div>';
		}
		if (empty($desc)) {
			$erro[]  = '<div class="alert alert-danger"> post content can\'t be emty</div>';
		}
		if (empty($desc)) {
			$erro[]  = '<div class="alert alert-danger"> post content can\'t be emty</div>';
		}

		foreach ($erro as $err) {
			echo $err;
		}

		if (count($erro) == 0) {
			$up = $con->prepare("UPDATE users SET howadd = howadd + 1 WHERE u_id = ?");
			$up->execute(array($_COOKIE["u_admin_id"]));

			$q = $con->prepare("INSERT INTO posts (p_name ,  p_des , p_mark,p_artical ,  p_data ,p_image, p_status , p_user , p_cat , p_day , fake_tit )  VALUES 
                    (?,?,?,?,now(),?,?,?, ?, dayofyear(now()) ,?) ");
			$q->execute(array($addName, $desc, $mark, $artical, $imgPOstNmae, 0, $id, $select, $fake));
			$massege = '<div class="alert alert-success">1 recored insert</div>';
			echo $massege . '<meta http-equiv="refresh" content="3 url=posts.php">';
		}
	} else {
		$masseg = '<div class="alert alert-danger">you cant use this page directly </div>';
		redir($masseg);
	}
} elseif ($do == "edit") {
	$id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : "undefined ";
	$check = checkExist("p_id", "posts", "p_id = $id ");
	$post_Date = checkExist("*", "posts", "p_id =  $id", true);

	if ($check > 0) {
	?>

<div class="container">
	<div class="fack_title right mt-5 mb-3 margin_top_bottom">
		<h5><?php la("edit_post"); ?> <span><i class="fa fa-chevron-left"></i></span> <?php la("posts"); ?> <span><i
					class="fa fa-chevron-left"></i></span> <?php la("cp"); ?> </h4>
	</div>

	<div class="form_container col-sm-12 <?php echo $algin ?> margin_top_botom">
		<form class="form-horizontal  " action='<?php echo $_SERVER["PHP_SELF"]; ?>?do=update' method="post"
			enctype="multipart/form-data">
			<input type="hidden" name="id" value=<?php echo $post_Date[0]["p_id"] ?>>

			<div class="form-group form-group-lg">

				<lable class="control-lable col-sm-2"> <?php la("name_of_artical") ?>:</lable>
				<div class=" input_container">
					<input type="text" placeholder="litite descrption to artical " class=form-control name=name required
						value="<?php echo $post_Date[0]["p_name"] ?>">
				</div>
			</div>
			<div class="form-group form-group-lg">
				<lable class="control-lable col-sm-2"><?php la("name_in_post") ?>:</lable>
				<div class=" input_container">
					<input type="text" placeholder="more exsplane about artical descrption to artical " class=form-control
						name=descriptions required value="<?php echo $post_Date[0]["p_des"] ?>">
				</div>
			</div>
			<div class="form-group form-group-lg">
				<lable class="control-lable col-sm-2"> <?php la("mark") ?> :</lable>
				<div class=" input_container">
					<input type="text" placeholder="more exsplane about artical descrption to artical " class=form-control
						name=mark required value="<?php echo $post_Date[0]["p_mark"] ?>">
				</div>
			</div>
			<div class="form-group form-group-lg">

				<lable class="control-lable col-sm-2"><?php la("artical") ?>:</lable>
				<textarea name="artical" id="addArtical" cols="30" rows="10"
					class="form-control"><?php echo $post_Date[0]["p_artical"] ?></textarea>
			</div>



			<lable class="control-lable col-sm-2"><?php la("section") ?>:</lable>

			<select name="categor" id="catSelect" class="form-group w-100">

				<?php

						$cats = getLetest("*", "categories", "c_id", "5");
						foreach ($cats as $cat) { ?>
				<option value="<?php echo $cat["c_id"] ?>"><?php echo $cat["c_name"] ?></option>

				<?php } ?>
			</select>
			<br>


			<input type="submit" class="btn btn-primaryy bg_main btn-sm" value=<?php la("edit") ?>>
		</form>
	</div>
	<!-- 0994078032   -->
</div>




<?php } else {
		$massege = '<div class="alert alert-danger"> this is users is un exist</div>';
		redir($massege);
	} ?>

<?php  } elseif ($do == "update") {
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
		$addName = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
		$desc = filter_var($_POST["descriptions"], FILTER_SANITIZE_STRING);
		$mark = filter_var($_POST["mark"], FILTER_SANITIZE_STRING);
		$artical = filter_var($_POST["artical"], FILTER_SANITIZE_STRING);
		$select = filter_var($_POST["categor"], FILTER_SANITIZE_STRING);



		$q = $con->prepare("UPDATE posts SET  p_name = ? , p_des = ? , p_mark = ? , p_l_up = now()  ,  p_artical = ? , p_cat = ? where p_id = ?");
		$q->execute(array($addName, $desc, $mark, $artical, $select, $id));
		$massege = '<div class="alert alert-success"> 1 recored update </div>';
		echo $massege . '<meta http-equiv="refresh" content="3; url=posts.php"> ';
	} else {
		$massege = '<div class="alert alert-danger">you cant use this page directly </div>';
		echo $massege . '<meta http-equiv="refresh" content="3; url=posts.php"> ';
	}
} elseif ($do == "delete") {


	if ($_COOKIE["u_admin_group"] > 0) {

		$id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : "undefined ";

		$check = checkExist("p_id", "posts", "p_id = $id ");
		if ($check > 0) {
			$q = $con->prepare("DELETE FROM posts WHERE p_id = $id");
			$q->execute();
			$massege = '<div class="alert alert-success"> 1 records delete</div>';
			echo $massege . ' <meta http-equiv="refresh" content="3; url= ' . $_SERVER["HTTP_REFERER"] . '   "> ';
		}
	} else {
		$massege = '<div class="alert alert-danger"> you cant remove this admin </div>';
		redir($massege);
	}
} elseif ($do == "active") {

	if ($_COOKIE["u_admin_group"] > 0) {
		$id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : "undefined ";
		$check = checkExist("p_id", "posts", "p_id = $id");
		if ($check > 0) {

			$q = $con->prepare("UPDATE posts SET p_status = 1  where p_id = ?");
			$q->execute(array($id));
			$massege = '<div class="alert alert-success" >this post be active </div>';
			echo $massege . '    <meta http-equiv="refresh" content="3; url=posts.php"> ';
		} else {
			$massege = '<div class="alert alert-danger">this ispost  is not exiest   </div>';
			echo $massege . '    <meta http-equiv="refresh" content="3; url=posts.php"> ';
		}
	} else {
		$massege = '<div class="alert alert-danger">you cant do this options  </div>';
		redir($massege);
	}
} elseif ($do == "improve") {
	if ($_COOKIE["u_admin_group"] > 0) {
		$id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : "undefined ";
		$check = checkExist("p_id", "posts", "p_id = $id");

		if ($check > 0) {
			$q = $con->prepare("UPDATE posts SET p_im = p_im + 1  where p_id = ?");
			$q->execute(array($id));
			$massege = '<div class="alert alert-success" >this post be active </div>';
			echo $massege . ' <meta http-equiv="refresh" content="3; url=new_users.php"> ';
		} else {
			$massege = '<div class="alert alert-danger">this ispost  is not exiest   </div>';
			echo $massege . '    <meta http-equiv="refresh" content="3; url=new_users.php"> ';
		}
	} else {
		$massege = '<div class="alert alert-danger">you cant do this options  </div>';
		redir($massege);
	}
}
include "include/footer.php";


?>