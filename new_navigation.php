<div class="nav_con_all">
	<div class="header_of_navigations">
		<div class="data_line">
			<div class="new_container">
				<div class="row justify-content-between">
					<div class="flex-1 right justify-content date">
						<div class="row">
							<span> <?php da($now[0]); ?></span> - <span> <?php echo $now[1]; ?></span> - <span>
								<?php da($now[2]); ?></span> - <span> <?php da($now[3]); ?></span>
						</div>
					</div>
					<div class="flex-1 d_none_media">
						<ul class="upper_list">
							<li class="upper_list_item"> <a href="privcy.php?do=how_us" class="second_link">
									<?php la("how_us") ?> </a></li>
							<li class="upper_list_item"> <a href="privcy.php?do=call_us"
									class="second_link"><?php la("call_us") ?> </a></li>
							<li class="upper_list_item"> <a href="privcy.php" class="second_link"><?php la("privcy") ?> </a>
							</li>
							<li class="upper_list_item"> <a href="join_us.php" class="second_link"><?php la("join_us") ?> </a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="new_container">
			<div class="row logo_line">
				<div class="col-6">
					<div class="main_image_container">
						<a href="new_index.php">
							<img src="front/img/main.png" class="main_image">
						</a>
					</div>
				</div>
				<div class="col-6">
					<div class="buttom_container">
						<div class="row custom_search">
							<div class="change_mode ">
								<span class="dark_mode btn "><i class="fa fa-moon fa-lg"></i></span>
								<span class="light_mode btn active"> <i class="fa fa-sun fa-lg"></i> </span>

							</div>
							<div class="col">
								<form action="new_search.php" method="post">
									<div class="row align-content-center ">
										<span class="btn bg_main  search_btn active"> <?php la("search") ?> <i
												class="fa fa-search fa-sm mr-2"></i> </span>
										<button class="btn bg_main  search_btn"> <?php la("search") ?> <i
												class="fa fa-search fa-sm mr-2"></i> </button>

										<div class="custom_2">
											<input type="search" name="search" placeholder="<?php la("sh_plc") ?>">

										</div>
								</form>
							</div>
						</div>
					</div>

					<!-- <div class="custom_search">
                                <div class="btn bg_main sea_btn"> search <i class="fa fa-search"></i> </div>
                                     <div class="search_from">
                                        <form action="search.php" method="POST">
                                                <div class="custom_search_input">
                                                        <button class="btn bg_main "> search <i class="fa fa-search"></i> </button>

                                                        <input type="text">
                                                </div>
                                        </form>
                                  </div>
                        </div> -->
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
		<h5 class="active" data-load="handlers/links.html"> <span class="menu_icons"><i class="fa fa-bars"></i>
			</span><span>meun </span></span></h5>
		<h5 data-load="login.php"> <span class="menu_icons"><i class="fa fa-user"></i> </span><span>login</span></h5>
		<span class="close_container"><i class="fa fa-chevron-left fa-lg"></i> </span>
	</div>
	<div class="navigation_container">

		<?php include "links.php" ?>
	</div>
	</div>
</nav>
</div>
</div>
</div>

<script>
$(function() {
	$("h5").on("click", function() {
		toogleClass($(this));

		$(".navigation_container").load($(this).data("load"));

	})
})

function toogleClass(pram) {
	if (!pram.hasClass("active")) {
		pram.addClass("active").siblings().removeClass("active");
	}
}
</script>