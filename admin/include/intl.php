
<?php 

(@session_start() or die());






//thsis style or js files
$css = "../front/css/";
$js  = "../front/js/";
$img  = "../front/img/";
$template = "include/";
$uploaded = "../post/";



// this is pages here 
include_once "include/lang/arabic.php";
include_once "include/lang/function.php";
include_once "header.php";

include "connect.php";
$algin = "text-right";
$reverse= "flex-row-reverse";
$left = "left";
if(isset($_GET["lang"])){
    $algin = "text-left";
    $reverse = "";
    $left = "right";
}
include "connect.php";
$now = get_now();




