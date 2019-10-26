<?php
include "header.php";
?>
<section>
  <div class="parallaxMedya img-responsive" style="background-image: url('images/Canva.jpg')">

</div>
<div class="clearfix"></div>

<div class="medya">
  <div class="container medyaContainer">
    <div class="row">
      <div class="col-lg-12 padding0">
       <div class="medyaParag">
         <h2 class="medyaFirst"><span>M</span>edya</h2>
          <h5 class="headMedya">Etkinliklerimizden Kareler</h5>
        </div>
      </div>
    </div>
</div>
	<div class="container">
		<div class="row videoSayfa">
			<div class="col-lg-3 col-xs-12 videoDuzen">
				<div class="videoList">
          <h4>Videolar</h4>
					<ul class="mdya">

            <?php

            $isimler = array("Lezzet Cafe'den", "Lezzet Cafe Tanıtım","Lezzet Cafe Tanıtım1","Lezzet Cafe Tanıtım2", "Lezzet Cafe Tanıtım3", "Lezzet Cafe Tanıtım4", "Lezzet Cafe Tanıtım5", "Lezzet Cafe Tanıtım6");

            for ($i=0; $i<=sizeof($isimler); $i++)
              {
                echo '<li><a href="'.$_SERVER['PHP_SELF'].'?id='.$i.'" class="renk" >'.@$isimler[$i].'</a></li>';
              }
			      ?>
              
			        </ul>	
				</div>
			</div>

			<div class="col-lg-9 col-xs-12 metin">
    
  <?php 
      
    $id = @$_GET['id'];


   $videoAdlari = array("restorant","kahvalti","tavuk","restorant","kahvalti","tavuk","restorant","kahvalti");
   
   echo '<div class="video-header wrap" style="display:';if($id==null){ echo 'block';} else { echo 'none;';}
   echo '">
      <div class="fullscreen-video-wrap">
        <video src="images/videolar/kahvalti.mp4" width="700" height="1000" type="video/mp4" autoplay preload="yes" loop /> 
        </video>
      </div>   </div>';
      $video= '<div class="video-header wrap" id="'.$id.'">
      <div class="fullscreen-video-wrap">
        <video src="images/videolar/'.@$videoAdlari[$id].'.mp4" width="700" height="1000" type="video/mp4" autoplay preload="yes" loop /> 
        </video>
      </div>   </div>';
    
     
      for($i=0; $i<sizeof($id); $i++)
         {
         // echo $videoAdlari[$i];
          echo $video;
          break;
       } 

        ?>
      </div>
   </div>
  </div>
</div>
    <div class="clearfix"></div> 
<div class="container-fluid wrapperContainer">
  <div class="row">
    <div class="col-md-12 mediaEdit">
      <header class="medyaGecis">
        <div class="medyaFirst0" >
          <img class="medyaFirst0Img responsive" width="1500" height="500" src="images/medya1.jpg" />
        </div>
        <div class="medyaFirstWrapper">
          <hgroup class="medyaGroup0">
            <h3 class="medyahead0"><span>N</span>aturel</h3>
            <h2 class="medyaSecond0">Tatlar</h2>
          </hgroup>
        </div>
      </header>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<div class="container">
  <div class="medyaHaber">
    <div class="medyaAltBlok">
      <div class="row">
        <div class="col-lg-8 medyaSol">
          <h3>Lezzet Cafe'den yeni ürünler</h3>
          <h6><time>22.07.2019</time>
           <span>Yeni Express Gazetesi</span></h6>
           
           <div class="bilgi" id="bilgi">
           
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <p class="haberFoto"><img src="images/kalite.jpg" alt=""/> </p>
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            
         </div>
        </div>
        <div class="col-lg-4 col-sm-12 col-xs-12 haberler">
          <div class="medyaSag">
            <h5>Basında Lezzet Cafe</h5>
            
              <div class="haber">
              <ul>
                <div class="wrapper">
                  <div class="sliding-background">
                    <li>
                       <a href="#">Ünlüler Lezzet Cafe'de</a>
                    </li>
                    <li>
                     <a href="#">Lezzet Cafe 2. şubesi̇ni̇ açti</a>
                    </li>
                    <li>
                      <a href="#">Lezzet Cafe'den yeni ürünler</a>
                    </li>
                    <li>
                      <a href="#">Lezzet Cafe'ye kalite belgesi</a>
                    </li>
                    <li>
                       <a href="#">Gazeteciler Lezzet Cafe'de buluştu</a>
                    </li>
                    <li>
                      <a href="#">Lezzet Cafe'den müşterilerine sürpriz doğum günü partisi</a>
                    </li>
                  </div>  
                </div>
              </ul>
            </div>
           </div>
          </div>
          
        </div>
       </div> 
      
    </div>
   </div>
</div>
<div class="clearfix">
<div id="gallery">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 padding0">
       <div class="medyaParag1">
         <h3 class="medyaFirst1"><span>İ</span>nstagram'da Lezzet Cafe </h3>
         <h5 class="medyaSecond"><i class="fa fa-instagram iconInstagram" aria-hidden="true"></i>500,000 Takipçi</h5>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-sm-3 col-md-3 col-lg-3">
          <div class="gallery-item"> <img src="images/sweets.jpg" class="img-responsive" alt=""></div>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
              <div class="gallery-item"> <img src="images/kurabiye.jpg" class="img-responsive" alt=""></div>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
              <div class="gallery-item"> <img src="images/borek.jpg" class="img-responsive" alt=""></div>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
              <div class="gallery-item"> <img src="images/pizza.jpg" class="img-responsive" alt=""></div>
            </div>
            <div class="w-100"></div>
            <div class="col-sm-3 col-md-3 col-lg-3">
            <div class="gallery-item"> <img src="images/sweets.jpg" class="img-responsive" alt=""></div>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
              <div class="gallery-item"> <img src="images/kurabiye.jpg" class="img-responsive" alt=""></div>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
              <div class="gallery-item"> <img src="images/borek.jpg" class="img-responsive" alt=""></div>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
              <div class="gallery-item"> <img src="images/pizza.jpg" class="img-responsive" alt=""></div>
        </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>

</section>
<div class="clearfix"></div>

  <?php

  include "footer.php";
  
  ?>
  