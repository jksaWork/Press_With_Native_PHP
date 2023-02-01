//    var  back = $(this).data("back");
//    var   color= $(this).data("font");
//    alert(color);

//     document.documentElement.style.setProperty("--light-mode" , back);
//     document.documentElement.style.setProperty("--light" , color);
//     localStorage.setItem("color" ,color );


$(function(){
  
    var local = localStorage.getItem("body_class") ;
    if( local  !== null){
        $("body").addClass(local);
        if(local =="dark_mode"){
            $("span.dark_mode").addClass("active").siblings().removeClass("active");
        }

    }
    $("h5").on("click" , function(){
        toogleClass($(this));
       
        $(".navigation_container").load($(this).data("load"));

       
    });
// search function toogle the div =====================================================================================================
$(".sea_btn").on("click" ,function(){
 $(".custom_search").addClass("flex_1");
 $(this).hide();
 $(".search_from").fadeIn();
 $("body").on( "click" , function(e){
     if(  e.target.nodeName == "INPUT" || e.target.className =="btn bg_main sea_btn"){
          
       
     }else{
        $(".custom_search").removeClass("flex_1");
        $(".sea_btn").fadeIn();
        $(".search_from").hide();
       

     }


    //  dark mode and light mode ===========================================
   
  
 });
});



// =============================toggle light mode and drak mode section================================================
$(".change_mode .dark_mode , .light_mode").on("click" , function(e){
    var class_name = this.className;

    $(this).addClass("active").siblings().removeClass("active");
    if( $(this).hasClass("dark_mode")) {
        $("body").addClass("dark_mode ").removeClass(" light_mode");
        localStorage.setItem("body_class" , "dark_mode");

      
    }
    else {
        $("body").addClass("light_mode ").removeClass(" dark_mode");
        localStorage.setItem("body_class" , "light_mode");
    }
   


    

function get_post( page_pram , num_pram ){

               
    $.ajax({
            method : "POST",
            url: "admin/include/ajax_method.php" , 
            data: { page : page_pram, num: num_pram },
             success:function(response){
                     $(".more_post").append( response);
             }
    });
}

});
//  function load the login =============
        $(function(){
    $("h5").on("click" , function(){
        toogleClass($(this));
       
        $(".navigation_container").load($(this).data("load"));
       
    })
})
        function toogleClass(pram){
            if( ! pram.hasClass("active")){
                pram.addClass("active").siblings().removeClass("active");
            }
        }

// langaue toogler =============================================================================
$(".langague").on("click" , function(){
 $(this).siblings(".list_of_langaue").slideToggle();

});

//  function nuber tow ===========================================================================
$(".point").on("click" , function(){
    
   $(this).siblings(".list_of_langaue").slideToggle();


});




    })
    
    function toogleClass(pram){
    if( ! pram.hasClass("active")){
        pram.addClass("active").siblings().removeClass("active");
    }
    }
    $(".menu_toogler").on("click" , function(){
        $(".navigation_bars").addClass("left_zero");
        $(".copyright_media").addClass("copy_fiexd");
       
    });
    $(".close_container").on("click" , function(){
        $(".navigation_bars").removeClass("left_zero");
        $(".copyright_media").addClass("copy_fiexd");
    });





 function get_data(  one , tow , three) {
    $.ajax({
        method:"GET",
        url: `more_post.php?id=${one}&&cat=${tow}`,
        success: function(data){
           $("." + three).html(data);
        } 
      
    } )

    
}

$("body").nicescroll();

