<footer>
    <div class="footer_icerik">
      <div class="row">
        <div class="container">
        <div class="col col-12">
          <div class="firinci_logo_cont_footer">
            <a href="index.php" class="firinci_image_logo_footer">                       
            </a>
            <div class="firinci_foter_text"><span> <a href="index.php"><i>Lezzet Cafe</i></a></span></div>  
          </div>
          <div class="clearfix"></div>
          <div class="footer_bolumler">
          
         
         <?php 
         echo '<ul class="firinci_foter_menu">';
         $sayfalar = array("index","hakkimizda","urunler","catering","medya","iletisim");
          $boyut = sizeof($sayfalar);
          $sayfaAd = array("Anasayfa","Hakkımızda","Ürünler","Caterıng","Medya","İletişim");
          for($i=0; $i<6; $i++)
          if($i==2)
            echo '<li><a class="footer_sola_dayan footer_bolum" href="'.$sayfalar[$i].'.php">'.$sayfaAd[$i].'</a></li>';
          else
            echo '<li><a class="footer_sola_dayan"  href="'.$sayfalar[$i].'.php">'.$sayfaAd[$i].'</a></li>';
           echo '</ul></div><div class="clearfix"></div>';
           $sosyal =array("twitter","facebook","instagram");
           echo '<div class="sosyal"><ul class="firinci_social">';
          for($i=0; $i<3;$i++)
          {
            echo '<li><a href="https://'.$sosyal[$i].'.com/"><i class="fa fa-'.$sosyal[$i].' sosyaliconlar" aria-hidden="true"></i></a></li>';
          }
           echo '</ul></div><div class="clearfix"></div>';
          ?>
         
          <div class="firinci_copy_text">Copyright © 2019 <a class="markaFooter" href="www.lezzetcafe.com">Lezzet Cafe</a>. Tüm Hakları Saklıdır & by <a href="www.ankayazilim.net" style="color:#FEFCD6 !important;font-size: 18px;"><i>Anka Yazılım.</i></a></a></div>
          </div>
      </div>
    </div>
  </footer>
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="bootstrap-4.0/js/bootstrap.js"></script>
<script type="text/javascript" src="bootstrap-4.0/js/scriptler.js"></script> 


  </body>
 
</html>