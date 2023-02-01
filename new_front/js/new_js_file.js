//    var  back = $(this).data("back");
//    var   color= $(this).data("font");
//    alert(color);

//     document.documentElement.style.setProperty("--light-mode" , back);
//     document.documentElement.style.setProperty("--light" , color);
//     localStorage.setItem("color" ,color );


$(function(){
  
    var local = localStorage.getItem("body_class") ;
    var gray = localStorage.getItem("drak_gray") ;
    var link = localStorage.getItem("link_font") ;

    if( local  !== null){
        if(local =="dark_mode"){
        $("body").addClass(local);
            $("span.dark_mode").addClass("active").siblings().removeClass("active");
            document.documentElement.style.setProperty("--gray-color" , gray);
              document.documentElement.style.setProperty("--link_font" , link);
             document.documentElement.style.setProperty("--link_font" , "#fff");

        }
        
       
     


    }
    $("h5").on("click" , function(){
        toogleClass($(this));
       
        $(".navigation_container").load($(this).data("load"));

       
    });
// search function toogle the div =====================================================================================================
$(".search_btn").on("click" ,function(){
 $(".custom_search").addClass("width");
$(this).removeClass("active").siblings(".search_btn").addClass("active");
 $(".custom_2").addClass("active");



    //  dark mode and light mode ===========================================
   
  
 });




// =============================toggle light mode and drak mode section================================================
$(".change_mode .dark_mode , .light_mode").on("click" , function(e){
    var class_name = this.className;

    $(this).addClass("active").siblings().removeClass("active");
    if( $(this).hasClass("dark_mode")) {
        $("body").addClass("dark_mode ").removeClass(" light_mode");
        document.documentElement.style.setProperty("--gray-color" , "#353d50");
        document.documentElement.style.setProperty("--link_font" , "#fff");

        localStorage.setItem("body_class" , "dark_mode");
        localStorage.setItem("drak_gray" , "#353d50");
        localStorage.setItem("link_font" , "#fff ");
        

      
    }
    else {
        $("body").addClass("light_mode ").removeClass(" dark_mode");
        localStorage.setItem("body_class" , "light_mode");
        document.documentElement.style.setProperty("--gray-color" , "#eee");
        document.documentElement.style.setProperty("--link_font" , "#000");
        localStorage.setItem("drak_gray" , "#eee");
        localStorage.setItem("link_font" , "#000 ");
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
 console.log($(".lang_ul .link").children(".list_of_langaue").slideToggle())
});

//  function nuber tow ===========================================================================
$(".point").on("click" , function(){
    
   $(this).siblings(".list_of_langaue").slideToggle();


});



// toogle the active in week an month
$(".nav-item ").on("click" ,function () {
    toogleClass($(this));
 });



$(".nav-item ").on("click" ,function () {
    $(".post_see_container .old").hide();$(".relative_looding").fadeIn().delay(2000).fadeOut();
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
      
    } );

    
}

function fetch_data(pram){
    var request = new XMLHttpRequest();
    request.onreadystatechange =function(){
         if(this.readyState ==4 && this.status == 200 ){
                 var data  = this.responseText;
                 $(".post_see_container ").html( data );
                 console.log(data);
             }
         }
         request.open("GET" , "post_see_alt.php?no=100", false);
         request.send(); 
         
 }





