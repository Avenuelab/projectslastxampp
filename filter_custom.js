$(document).ready(function(){
 
  $('.portfolio-btn').find('.btn').on('click',function(){

   $('.portfolio-btn').find('.btn').removeClass("active");
   $(this).addClass("active");
   return false;
 });
  

  $(function() {
    
    var selectedClass = "";
    $('.portfolio-btn').find('.btn').on('click',function(){
    selectedClass = $(this).attr("rel");
    $(".portfolio-content").find('.all').fadeOut(200);
    $(".portfolio-content").find(".all." + selectedClass).delay(200).fadeIn(200);
    });
  });
  
   // open modal
   $(".portfolio-container").find('.all').on('click',function() {
    var modalId = Number($(this).attr("rel-data"));
    $('.portfolio-container').find('#'+modalId).parents('.modal-box').fadeIn();
    
  });

   // close modal
  $('.portfolio-container').find(".close").click(function() {
    $(this).parents('.modal-box').fadeOut();
   
  });

 // close model on scroll
$(document).scroll(function(){
    $('.portfolio-container').find('.modal-box').fadeOut();
});
   
});