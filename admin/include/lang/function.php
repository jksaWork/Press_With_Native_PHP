<?php
function title()
{
	global $title;
	if (isset($title)) {
		return $title;
	} else {
		return "defalut";
	}
}



function redir($masege, $url = null, $second = 3)
{
	if ($url === null) {
		$url = "index.php";
	} elseif ($url === "back") {

		$url = $_SERVER["HTTP_REFERER"];
	} else {
		$url = $url;
	}
	echo "<div class='margin_message container '>";
	echo $masege;
	echo "<div class='alert alert-info'>uo will go to the home page after $url tow second</div>";

	header("refresh: $second ; url=$url");
}
function act($pram)
{
	if ($pram == 0) {
		echo "unactive";
	} else {
		echo "active";
	}
}
function admin($pram)
{
	if ($pram == 0) {
		echo "user";
	} elseif ($pram == 1) {
		echo "write";
	} elseif ($pram > 1) {
		echo "admin";
	}
}

function is_admin()
{
	if ($_COOKIE["u_admin_group"] > 2) {
		return true;
	} else {
		return false;
	}
}
function is_mine($pram)
{
	if ($_COOKIE["u_admin_id"] == $pram) {
		return true;
	} else {
		return false;
	}
}


// function check the query if this item is eiset or now 


function checkExist($select, $form, $filed, $getdata = false)
{

	// the conection will be globl to use here 

	global $con;
	//conect with data 

	$check = $con->prepare(" SELECT $select FROM $form WHERE  $filed ");

	$check->execute();

	$row = $check->rowCount();
	$col = $check->fetchAll();
	if ($getdata == false) {
		return $row;
	} else {
		return $col;
	}
}






//functio to clack the databse table column 


function calcDataBase($item, $table, $where = NULL)
{
	global $con;
	$q = $con->prepare("SELECT COUNT($item) FROM $table $where ");

	$q->execute();

	return $q->fetchColumn();
}


//this function to get letest of the database structre;



function getLetest($select = "*", $from = "users", $order = "userID", $limt = 5, $where = null)
{
	global $con;
	$q = $con->prepare("SELECT $select FROM $from  $where ORDER BY $order DESC LIMIT $limt ");
	$q->execute();
	$row = $q->fetchAll();
	return $row;
}


///function check value tru or false ;

function value($pram)
{
	$value = $pram == 0 ? "false" : "true";
	echo  $value;
} // }
//  
function ineerjoin($select, $from, $join, $on1, $where)
{
	global $con;
	$q = $con->prepare("SELECT $select FROM $from INNER JOIN $join ON $on1 where $where");
	$q->execute();
	$result  = $q->fetch();
	return $result;
}




function get_now()
{
	global $con;
	$q = $con->prepare("select dayname(now()) , dayofmonth(now()) as day_number   ,monthname(now()) as month , CURRENT_DATE   ");
	$q->execute();
	return $q->fetch();
}
// getlimit===================================================================
function get_limit($one, $tow)
{
	global $con;

	$q = $con->prepare("SELECT * , TIMESTAMPDIFF(SECOND , P_data , NOW()) AS p_second FROM posts  where p_id  between  ? and ? order by p_data desc");
	$q->execute(array($one, $tow));
	return $q->fetchAll();
}

//new function get limit upgrade ================================================
function get_limit_where_post($one, $tow)
{
	global $con;

	$q = $con->prepare("SELECT * , TIMESTAMPDIFF(SECOND , P_data , NOW()) AS p_second FROM posts  where p_id  between  ? and ? order by p_data desc");
	$q->execute(array($one, $tow));
	return $q->fetchAll();
}
function get_limit_where_users($one, $tow)
{
	global $con;

	$q = $con->prepare("SELECT * , TIMESTAMPDIFF(SECOND , `data` , NOW() ) AS p_second FROM users  where u_id  between  ? and ? order by  `data` desc");
	$q->execute(array($one, $tow));
	return $q->fetchAll();
}
function get_limit_where_com($one, $tow)
{
	global $con;

	$q = $con->prepare("SELECT * , TIMESTAMPDIFF(SECOND , `com_date` , NOW() ) AS p_second FROM comments  where com_id  between  ? and ? order by  `com_date` desc");
	$q->execute(array($one, $tow));
	return $q->fetchAll();
}