<?php

function la( $sentents){
    static $words= array(

        "message" =>"helolo aadimn",
        "admin" => "adminstrator"

    );
    return $words[$sentents];

    
}
?>