<?php
function title(){
    global $title;
    if(isset($title)){
        return $title;
    }
    else{
        return "defalut";
    }
}
function get_now(){
    global $con;
    $q = $con->prepare("select dayname(now()) , dayofmonth(now()) as day_number   ,monthname(now()) as month , CURRENT_DATE , dayofyear(now()) as dayy" );
    $q->execute();
    return $q->fetch();
}

function get_name($select , $from , $where ){
    global $con ;
    $q = $con->prepare("select ? from ? where ? ");
    $q->execute(array($select , $from , $where));
    return $q->fetch();
}
function redir($masege , $url =null , $second = 3){

    
        if( $url===null ){
             $url = "home.php";
        }
        elseif($url === "back"){
          
             $url= $_SERVER["HTTP_REFERER"];
        }
        else{
            $url =$url; 
        }
        echo "<div class='margin_message container'>";
        echo $masege;
    echo "<div class='alert alert-info'>uo will go to the home page after $url tow second</div>";

    header("refresh: $second ; url=$url");

}


// function check the query if this item is eiset or now 


function checkExist($select , $form, $filed , $getdata= false ){
   
    // the conection will be globl to use here 

    global $con;
    //conect with data 

    $check = $con->prepare(" SELECT $select FROM $form WHERE  $filed ");
    
    $check->execute();
   
    $row = $check->rowCount();
    $col= $check->fetchAll();
if($getdata == false){
    return $row;
}else{
    return $col;
}


  

}


function is_admin(){
    if($_COOKIE["u_admin_group"] > 2 ){
        return true;
    }else{
        return false;
    }
   }
   function is_mine ($pram){

           return false;
   }
   function act($pram){
    if($pram == 0 ){
        echo "unactive";
    } else {
        echo "active";
    }
    
}   





//functio to clac the databse table column 


function calcDataBase($item  , $table ,$where = null){
    global $con ;
    $q = $con->prepare("SELECT COUNT($item) FROM $table $where");

    $q->execute();
    
    return $q->fetchColumn();
}


//this function to get letest of the database structre;



function getLetest($select="*" , $from="users" , $order = null  , $limt= "limit 5"){
    global $con;
    $q= $con->prepare("SELECT $select FROM $from $order  $limt ");
    $q->execute();
    $row = $q->fetchall();
    return $row;
}

// ======= version2 

function get_last_where($select="*" , $from="users" ,  $where = null , $order = null  , $limt= "limit 5"){
    global $con;
    $q= $con->prepare("SELECT $select FROM $from $where $order  $limt ");
    $q->execute();
    $row = $q->fetchall();
    return $row;
}


///function check value tru or false ;

function value($pram){
    $value = $pram==0 ? "false": "true";
    echo  $value;
}// }
//  
function ineerjoin($select , $from , $join , $on1  ,$where , $limit = null , $order = null){
global $con;
$q = $con->prepare("SELECT $select FROM $from INNER JOIN $join ON $on1 $where $order $limit");
$q->execute();
$result  = $q->fetchAll();
return $result;

}

function joinTable($select , $from , $join1, $on1  , $join2 , $on2  ,$limt = 7 , $where){
    global $con;
    $q = $con->prepare("SELECT $select FROM $from INNER JOIN $join ON $on1 INNER JOIN $join2 ON $on2 where $where");
    $q->execute();
    $result  = $q->fetchAll();
    return $result;
    
    }



 



