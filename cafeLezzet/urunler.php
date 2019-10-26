<?php
//<a href='?page=1'<? if ($_GET['page'] == 1) { echo ' class="active"'; } >1</a>
include "header.php";

echo '<section>
<div class="parallaxUrun img-responsive" style="background-image: url(\'images/urunler.jpg\')">

</div>
	
<div class="clearfix"></div>
<div class="container">
<div class="row">
			<div class="col col-12 urun_iceriK">
				<div class="firinci_blok">
					<div class="firinci_urun">	
	
	<ul class="urunler_menu urun_menu_0 urun_menu">
		<li><div class="col-lg-2 col-md-4 col-sm-4 col-xs-12 urunDiv"><a href="#content1" class="active1 same-class">Cafeden</a></div></li>
		<li><div class="col-lg-2 col-md-4 col-sm-4 urunDiv"><a href="#content2" class="same-class">Spesiyaller</a></div></li>
		<li><div class="col-lg-2 col-md-4 col-sm-4 urunDiv"><a href="#content3" class="same-class">Tatlılar</a></div></li>
		<li><div class="col-lg-2 col-md-4 col-sm-4 urunDiv"><a href="#content4" class="same-class">Kahvaltılar</a></div></li>
		<li><div class="col-lg-2 col-md-4 col-sm-4 urunDiv"><a href="#content5" class="same-class">İçecekler</a></div></li>
		<li><div class="col-lg-2 col-md-4 col-sm-4 urunDiv"><a href="#content6" class="same-class">Dondurmalar</a></div></li>
	</ul>
';	
?>

<script type="text/javascript">
   $(document).ready(function(){//resimlerin div id sine göre ekrana getirir.
  //HIDE ALL CONTENTS
  //$(".content").hide();
  //EVENT CLICK
  $(".urun_menu a").click(function(event){
   //PREVENT RELOAD
    event.preventDefault();
    
    //HIDE ALL CONTENTS
    $(".content").hide();

    //GET ID FROM NEW CONTENT TO SHOW
    var id_content = $(this).attr("href");
    //SHOW NEW CONTENT
    $(id_content).show();
    
    return false;
  });
});
</script> 
<script type="text/javascript">
	jQuery('.same-class').click(function(){
  jQuery('.same-class').removeClass('active1');
  jQuery(this).addClass('active1');
});
</script>

 <?php
         echo '<ul class="firinci_firindan_menu">';
         $sayfalar = array("Simit","Kaşarlı Simit","Kaşarlı Poğaça","Peynirli Poğaça","Sade Poğaça","Zeytinli Poğaça","Sade Açma","Zeytinli Açma");
          $boyut = sizeof($sayfalar);
         $resimler = array("acma","acma","acma","acma","acma","acma","acma","acma");
          

echo '<div id="content1" class="content">
 <div class="row menu1">';
 for ($i=0;$i<$boyut; $i++){
 	echo '
 <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 bottom_firindan">
  <div class="menu1_icerik">
	<div class="menu1_image_0">
		<div class="menu1_image_0_dis">
			<div class="firinci_menu_dis"></div>
			<a href="urun.php?id='.$i.'"><img src="images/urunler/'.$resimler[$i].'.jpg" alt="" class="img-circle" width="100%" height="100%"></a>
		</div>
	</div>
<div class="duzenContent">
<h5><a href="urun.php?id='.$i.'" class="urunlerRengi">'.@$sayfalar[$i].'</a>
</h5>
<p>20,00 ₺</p>
</div>
			</div>
		</div>
';
}
echo '</div>
</div>';



 
         echo '<ul class="firinci_firindan_menu">';
         $sayfalar = array("Su Böreği","Kıymalı Su Böreği","Pizza","Hamburger","Cheeseburger","Trileçe","Güllaç","Sütlaç");
          $boyut = sizeof($sayfalar);
         $resimler = array("borek","borek","pizza","hamburger","hamburger","kek","kek","kek");
          

echo '<div id="content2" style="display: none;" class="content">
 <div class="row menu1">';
 for ($i=0;$i<$boyut; $i++){
 	echo '
 <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 bottom_firindan">
  <div class="menu1_icerik">
	<div class="menu1_image_0">
		<div class="menu1_image_0_dis">
			<div class="firinci_menu_dis"></div>
			<a href="urun.php?id='.$i.'"><img src="images/urunler/'.$resimler[$i].'.jpg" alt="" class="img-circle" width="100%" height="100%"></a>
		</div>
	</div>
	<div class="duzenContent">
<h5><a href="urun.php?id='.$i.'" class="urunlerRengi" >'.@$sayfalar[$i].'</a>

	</h5>
<p>20,00 ₺<p/>
</div>
			</div>
		</div>
';
}
echo '</div>
</div>';



         echo '<ul class="firinci_firindan_menu">';
         $sayfalar = array("Franbuazlı Cheescake","Çikolotalı Cheescake","Limonlu Cheescake","Tiramisu","Muzlu Rulo","Oreo Cup","Bluebarry Cup","Magnolia Cup");
          $boyut = sizeof($sayfalar);
         $resimler = array("kek","kek","kek","kek","kek","kek","kek","kek");
          

echo '<div id="content3" style="display: none;" class="content">
 <div class="row menu1">';
 for ($i=0;$i<$boyut; $i++){
 	echo '
 <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 bottom_firindan">
  <div class="menu1_icerik">
	<div class="menu1_image_0">
		<div class="menu1_image_0_dis">
			<div class="firinci_menu_dis"></div>
			<a href="urun.php?id='.$i.'"><img src="images/urunler/'.$resimler[$i].'.jpg" alt="" class="img-circle" width="100%" height="100%"></a>
		</div>
	</div>
<div class="duzenContent">
<h5><a href="urun.php?id='.$i.'" class="urunlerRengi" >'.@$sayfalar[$i].'</a>

	</h5>
<p>20,00 ₺<p/>
</div>
			</div>
		</div>
';
}
echo '</div>
</div>';


 
         echo '<ul class="firinci_firindan_menu">';
         $sayfalar = array("Klasik","Sade Omlet","Sahanda Sucuklu Yumurta","Serpme Kahvaltı","Tereyağlı Simit Tabağı","Köy Kahvaltısı","Kaşarlı Tost","Karışık Tost");
          $boyut = sizeof($sayfalar);
         $resimler = array("acma","acma","acma","acma","acma","acma","acma","acma");
          

echo '<div id="content4" style="display: none;" class="content">
 <div class="row menu1">';
 for ($i=0;$i<$boyut; $i++){
 	echo '
 <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 bottom_firindan">
  <div class="menu1_icerik">
	<div class="menu1_image_0">
		<div class="menu1_image_0_dis">
			<div class="firinci_menu_dis"></div>
			<a href="urun.php?id='.$i.'"><img src="images/urunler/'.$resimler[$i].'.jpg" alt="" class="img-circle" width="100%" height="100%"></a>
		</div>
	</div>
<div class="duzenContent">
<h5><a href="urun.php?id='.$i.'" class="urunlerRengi" >'.@$sayfalar[$i].'</a>

	</h5>
<p>20,00 ₺<p/>
</div>
			</div>
		</div>
';
}
echo '</div>
</div>';



         echo '<ul class="firinci_firindan_menu">';
         $sayfalar = array("Türk Kahvesi","Espresso","Cappucino","Filte Kahve","Çay","Ihlamur","Adaçayı","Çilekli Milkshake");
          $boyut = sizeof($sayfalar);
         $resimler = array("cofefincan","cofefincan","cofefincan","cofefincan","cofefincan","cofefincan","cofefincan","cofefincan");
          

echo '<div id="content5" style="display: none;" class="content">
 <div class="row menu1">';
 for ($i=0;$i<$boyut; $i++){
 	echo '
 <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 bottom_firindan">
  <div class="menu1_icerik">
	<div class="menu1_image_0">
		<div class="menu1_image_0_dis">
			<div class="firinci_menu_dis"></div>
			<a href="urun.php?id='.$i.'"><img src="images/urunler/'.$resimler[$i].'.jpg" alt="" class="img-circle" width="100%" height="100%"></a>
		</div>
	</div>
<div class="duzenContent">
<h5><a href="urun.php?id='.$i.'" class="urunlerRengi" >'.@$sayfalar[$i].'</a>

	</h5>
<p>20,00 ₺<p/>
</div>
			</div>
		</div>
';
}
echo '</div>
</div>';



         echo '<ul class="firinci_firindan_menu">';
         $sayfalar = array("Sade Dondurma","Kakaolu Dondurma","Çilekli Dondurma","Karamelli Dondurma","Meyveli Dondurma","Vanilyalı Dondurma","Limonlu Dondurma","Sakızlı Dondurma");
          $boyut = sizeof($sayfalar);
         $resimler = array("dondurma","dondurma","dondurma","dondurma","dondurma","dondurma","dondurma","dondurma");
          

echo '<div id="content6" style="display: none;" class="content">
 <div class="row menu1">';
 for ($i=0;$i<$boyut; $i++){
 	echo '
 <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 bottom_firindan">
  <div class="menu1_icerik">
	<div class="menu1_image_0">
		<div class="menu1_image_0_dis">
			<div class="firinci_menu_dis"></div>
			<a href="urun.php?id='.$i.'"><img src="images/urunler/'.$resimler[$i].'.jpg" alt="" class="img-circle" width="100%" height="100%"></a>
		</div>
	</div>


	<div class="duzenContent">
<h5><a href="urun.php?id='.$i.'" class="urunlerRengi" >'.@$sayfalar[$i].'</a>

	</h5>
<p>20,00 ₺<p/>
</div>
			</div>
		</div>
';
}
echo '</div>
</div>';
?>

</div>
</div>

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
  