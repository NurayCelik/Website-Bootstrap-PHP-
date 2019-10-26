 <!-- sidebar menu -->
 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3> <?php 

              if (Session::get("yetki")==5) {
                 echo "Yetki: Yönetici";
               } ?></h3>
    <ul class="nav side-menu">
     <li><a href="index.php"><i class="fa fa-dashboard"></i>Yönetim Paneli<span class="label label-success pull-right"></span></a></li>
     <ul class="nav side-menu">
      
      <li><a><i class="fa fa-cog"></i>Sayfa Seçenekleri<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
        
        <li><a><i class="fa fa-home"></i><small>Anasayfa İşlemleri</small><span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
        <li><a href="maintop.php">Üst Bölüm<span class="label label-success pull-right"></span></a></li>
        <li><a href="mainmiddle.php">Orta Bölüm<span class="label label-success pull-right"></span></a></li>
        <li><a href="mainend.php">Alt Bölüm<span class="label label-success pull-right"></span></a></li>
        </ul>
      </li>
        <li><a><i class="fa fa-cog"></i><small>Hakkımızda İşlemleri</small><span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
        <li><a href="abouttop.php">Üst Bölüm<span class="label label-success pull-right"></span></a></li>
        <li><a href="aboutmiddle.php">Orta Bölüm<span class="label label-success pull-right"></span></a></li>
        <li><a href="aboutend.php">Alt Bölüm<span class="label label-success pull-right"></span></a></li>
        </ul>
      </li>
        <li><a><i class="fa fa-cog"></i><small>Ürünler İşlemleri</small><span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
       <li><a href="catlist.php">Category İşlemleri<span class="label label-success pull-right"></span></a></li>
       <li><a href="base.php">Ana Ürün İşlemleri<span class="label label-success pull-right"></span></a></li>
      <li><a href="urun.php">Ürün İşlemleri<span class="label label-success pull-right"></span></a></li>
       </ul>
      </li>
      <li><a><i class="fa fa-cog"></i><small>Catering İşlemleri</small><span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
         <li><a href="catering.php">Catering<span class="label label-success pull-right"></span></a></li>
         <li><a href="cateringfoto.php">Catering Galeri<span class="label label-success pull-right"></span></a></li>
        </ul>
      </li>
       <li><a><i class="fa fa-cog"></i><small>Medya Sayfası İşlemleri</small><span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
         <li><a href="video.php">Video<span class="label label-success pull-right"></span></a></li>
         <li><a href="#.php">İçerik<span class="label label-success pull-right"></span></a></li>
        </ul>
      </li>
        <li><a href="arsiv.php"><i class="fa fa-image"></i> Foto Arşiv / <small>Güncelenen</small><span class="label label-success pull-right"></span></a></li>
       </ul>

      </li>
      

       <li><a href="slider.php"><i class="fa fa-image"></i> Slider İşlemleri<span class="label label-success pull-right"></span></a></li>

       <li><a href="menu.php"><i class="fa fa-list"></i> Menü İşlemleri<span class="label label-success pull-right"></span></a></li>

   

       <li><a><i class="fa fa-cog"></i> Site İşlemleri <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="logoedit.php">Site Logo </a></li>
          <li><a href="siteinfo.php">Site Hakkında</a></li>
          <li><a href="iletisiminfo.php">İletişim Bilgileri </a></li>
          <li><a href="apiInfo.php">Api Bilgileri</a></li>
          <li><a href="sosyalmedya.php">Sosyal Medya Bilgileri</a></li>
        </ul>
      </li>


    </ul>




  </ul>

</div>


</div>
            <!-- /sidebar menu -->