
 $(document).ready(function() {
        $(window).resize(function() {
         if($(this).width() < 1205) { 
              $('.classRemove').removeClass('col-lg-2');
              $('.boyutParag1').removeClass('col-lg-6');
              $('.boyutParag1').addClass('col-md-10 offset-md-1');
               $('.boyutImg1').removeClass('col-lg-4');
                $('.boyutImg1').addClass('col-md-8 offset-md-2');
              
          } 
          else {
             $('.classRemove').addClass('col-lg-2');
              $('.boyutParag1').addClass('col-lg-6');
               $('.boyutImg1').addClass('col-lg-4');
                $('.boyutParag1').removeClass('col-md-10 offset-md-1');
                $('.boyutImg1').removeClass('col-md-8 offset-md-2');
               
          }
        });
});



 //Bu bölüm navbar düzenler siyah bAackground için
 $(document).ready(function() {
        $(window).scroll(function() {
         if($(this).scrollTop() >=100) { 
              $('.navbar').addClass('solid');
               $('.searchDiv').addClass('bg1');
              
               $('.searchDiv').removeClass('bg');
              
          } else {
              $('.navbar').removeClass('solid');
              $('.searchDiv').removeClass('bg1');
              
                $('.searchDiv').addClass('bg');
             
          }
        });
});


//Bu Bölüm medya sayfası için kodları içeriir

   $('.renk').click(function()
      {
   $('#renk a').css('color','#dc3545');
   }
  );
   

  document.querySelector('video').defaultPlaybackRate = 1.0;
  document.querySelector('video').play();
  
  var videos =document.querySelectorAll('video');
  for (var i=0;i<videos.length;i++)
  {
   
    if(i==0)
    {videos[i].muted = !videos[i].muted;
    videos[i].playbackRate = 1.0;
    videos[i].play();
   
  }
  else{
    videos[i].playbackRate = 0.5;
    videos[i].play();
    
  }
}
       








