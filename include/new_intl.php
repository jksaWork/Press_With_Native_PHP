<?php 
(@session_start() or die());
//ths style or js files
$css = "new_front/css/";
$js  = "new_front/js/";
$img  = "new_front/img/";
$template = "include/";
$uploaded = "uploaded\profile\\";

include_once "include/lang/function.php";
include_once "new_header.php";
include_once "include/lang/english.php";



if(isset( $_SESSION["userINforamtion"])){
    $userData = $_SESSION["userINforamtion"];
}


// this is pages here 



include "connect.php";
$algin = "text-right";
$reverse= "flex-row-reverse";
if(isset($_COOKIE["lang"])){
    $algin = "text-left";
    $reverse = "";
}
$now = get_now();





