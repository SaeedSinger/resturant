$(document).ready(function(){


   var offSet = 69;


   // About ==> Scroll To Abou Section
    $('.navbar .navbar-nav .about-us').click(function (){
        
         $('html,body').animate({
            
          scrollTop: $('.about').offset().top - offSet
        },2000);
     
    });

   // Contact ==> Scroll To Contact Section
    $('.navbar .navbar-nav .con').click(function (){
        
         $('html,body').animate({
            
          scrollTop: $('.contact-us').offset().top
        },2000);
       
    });
    
  
  
 $("#login-tab").click(function(){
    $("#signup").hide().attr("formnovalidate");
    $("#login").show();
});

$("#signup-tab").click(function(){
    $("#login").hide().attr("formnovalidate");
    $("#signup").show();
});

/*
 $(".card .input-group input").focus(function(){
    $(".card .input-group label").css('display','inline').fadeOut(2000);
    
});
*/
  /*    // Menu Page  
     // Trigger MixItUp
    $('#container').mixItUp();
    
   // Add Active Class
    $('.menu-box li a').click(function(){
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
    });
  */  
 
     
    // Confirmation Delete Message
    
    $('.confirm').click(function (){
        
       return confirm('Are You Sure?'); 
    });
    
    
    // Confirmation Update Admin
    
     $('.update_admin .update').click(function (){
        
       return confirm('Are You Sure You Want Update This Info?'); 
    });
    
     // Confirmation Add Admin
    
     $('.update_admin .add').click(function (){
        
       return confirm('Are You Sure You Want Add New Admin?'); 
    }); 
    
  
  
  });
