$(()=>{
    "use stritc";

  
    
// $("body").nicescroll();

   $(".delete").click(function(){
       var jksa = confirm("do you wont delet this user");
   })
   $(".info_container").on("click" , function(){
      $(this).siblings(".hidden").slideToggle(500);
     
   })
    var imgWidth  = $(".show_img_container img").width();
   $(".show_img_container img").css("height" , imgWidth);

   
   $(".create_text , .create_text_post").on("keyup",function(){
    $(this.dataset.change).text($(this).val());
 });

$(".carousel").carousel({
    interval:1000,

    
});



// // load show poost by click in post 
//                 $(".headingFirstPost").on("click" ,function(){ $.ajax({
//                                         method:"post" ,
//                                         url:"home.php" , 
//                                         data: "d;fjdsc",
//                                         success:function(){
//                                             alert();
//                                         }
//                             })			                            			} )


// show poost by click in post 
            $(".headingFirstPost").on("click" ,function(){  
                var id = $(this).data("id"); 
        
                    location.href="showpost.php?id="+id ;
        
        
             

                });
                   
                $(".side_cart > .row").click(function(e){
                    var id = $(this).data("id");
                    
                  location.href="showpost.php?id="+id ;
            
            
                    
                });
           

              
})


// main muenu scrool
$(".iconToggel").on("click" ,()=>{
      
    if( $(".iconToggel").hasClass("active") ){
        $(".iconToggel").removeClass("active");
        $(".navigation").removeClass("box-shadow");
        $(".navigations").animate({
         left:"-70%", 
        } , 300 ,() =>{
            $("body").animate({
                left:"0%",
            })
        } );
      
    }
    else{

     $(".navigations").animate({
         left:0

     } ,
        300 , () =>{
        $(".navigation").addClass("box-shadow");
            
            $("body").animate({
                left:"70%",
            });

        });
   

     $(".iconToggel").addClass("active");

   
 }


});

// add class fiexed to navbar 
window.onscroll=function(){
    if(pageYOffset >= 90){ 
        $("nav").addClass("fixed");


    }else{
        $("nav").removeClass("fixed");

    } 
    }
