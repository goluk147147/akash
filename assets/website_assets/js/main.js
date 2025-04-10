(function ($) {
    "use strict";

    $(document).ready(function($){
 // alert("width "+window.innerWidth+"px " + " height "+window.innerHeight+"px");
         window.onresize = function() {
             var width = window.innerWidth;
             var height = window.innerHeight;
             //portrait 810x965
             //landscape 1080x695 
            //console.log("width "+width+"px " + " height "+height+"px");
          
            
                window.setTimeout(function(){ 
                      // if(width==1080){
                    //     alert("1");
                    //     $('.res_ul').css({"right": "180px"})
                    // }
                   // window.scrollTo({ bottom: 0, behavior: 'smooth' });
                   // window.scrollTo({ left: 0, top: document.body.scrollHeight, behavior: "smooth" });
                     $("#sticker").sticky({
                            topSpacing: 0
                        });
                     $('.main-menu').meanmenu({
                            meanMenuContainer: '.mobile-menu',
                            meanScreenWidth: "992"
                        });
      

        
                 }, 1000); 


        }
   
        // stikcy js
        $("#sticker").sticky({
            topSpacing: 0
        });

        //mean menu
        $('.main-menu').meanmenu({
            meanMenuContainer: '.mobile-menu',
            meanScreenWidth: "992"
        });
        
         // search form
        $(".search-bar-icon").on("click", function(){
            $(".search-area").addClass("search-active");
        });

        $(".close-btn").on("click", function() {
            $(".search-area").removeClass("search-active");
        });
    
    });


}(jQuery));



