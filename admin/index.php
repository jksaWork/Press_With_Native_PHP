<?php
$noDesc = "";
session_start();

if (isset($_COOKIE["u_admin_name"])) {
	header("location: dashbord.php");
}
include "include/intl.php";
?>
<div class="container">
	<div class="form_container col-sm-12 <?php echo $algin ?>">
		<div class="text-center">
			<img src="<?php echo $img ?>profile.svg" alt="" class="login_profile">
		</div>
		<h3 class="text-center"><?php la("login") ?></h3>
		<form class="form-horizontal  " action=<?php echo $_SERVER["PHP_SELF"]; ?> method="post">

			<div class="form-group form-group-lg mt-5">

				<lable class="control-lable col-sm-2"><?php la("email") ?>:</lable>
				<div class=" input_container">
					<input type="text" placeholder="<?php la("placeholder_email") ?>" class=form-control name=name required>
				</div>
				<h6><?php if (isset($_SESSION["user"])) {
							echo $_SESSION["user"];
							$_SESSION["pw"] = "";
						} ?></h6>


			</div>


			<div class="form-group form-group-lg">
				<lable class="control-lable col-sm-2 "><?php la("password") ?>:</lable>
				<div class=" input_container">
					<input type="text" placeholder="<?php la("placeholder_pass") ?>" class="form-control" name=pass>
				</div>
				<h6><?php if (isset($_SESSION["pw"])) {
							echo $_SESSION["pw"];
							$_SESSION["pw"] = "";
						} ?></h6>
			</div>
			<div class="margin_bottom">
				<input type="submit" class="btn bg_main btn-login btn-sm mt-3 mb-2" name="send"
					value="<?php la("login") ?>">

			</div>


			<h6><a href="#"><?php la("forget_pass") ?> </a></h6>
			<h6><a href="sing.php"><?php la("not_have_acount") ?> </a></h6>

		</form>
	</div>
</div>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
	$pass = filter_var($_POST["pass"], FILTER_SANITIZE_STRING);
	$q = $con->prepare("SELECT * FROM users WHERE u_email = ? ");
	$q->execute(array($name));
	$result = $q->rowCount();

	$user = $q->fetch();
	if ($result == 1) {

		if (password_verify($pass, $user["u_pass"])) {
			$_SESSION["u_admin_name"] = $name;
			$_SESSION["u_admin_information"] = $user;
			$_SESSION["userINforamtion"] = $user;
			setcookie("u_admin_name",   $user["u_name"],  time() + (20000  * 10000), "/");
			setcookie("u_admin_id",     $user["u_id"],  time() + (200000 * 10000), "/");
			setcookie("u_admin_pass",   $user["u_pass"],  time() + (200000 * 10000), "/");
			setcookie("u_admin_group",  $user["u_group"],  time() + (200000 * 10000), "/");
			header("location: dashbord.php");
		} else {
			$_SESSION["pw"] = "يوجد خطاء في كلمه المرور ";
			$_SESSION["user"] = "";
		}
	} else {
		$_SESSION["user"] = " لايوجد مستخدم بهذا العنوان ";
	}
}
?>