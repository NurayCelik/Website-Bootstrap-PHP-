<?php
 define('CSSPATHMAIN', 'bootstrap-4.0/'); //define css path
  $cssItemMain = 'mystyle.css'; //css item to display
?>

<!DOCTYPE html>
<html lang="tr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no, user-scalable=yes">
    <meta name="keywords" content="website, yönetim panelli web site, paket satış, demo" />
    <meta name="description" content="Web Sitesi Satın Almak İsteyenler İçin Tasarlandı.">
    <meta name="author" content="Nuray Çelik & Anka Yazılım">
    <title>PHP-MYSQL Lezzet Cafe Paket Yazılım</title>
    
    <link rel="stylesheet" type="text/css" href="bootstrap-4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.0/css/bootstrap.css">
    <script type="text/javascript" href="bootstrap-4.0/js/bootstrap.min.js"></script>
   
    <link rel="stylesheet" type="text/css" href="<?php echo (CSSPATHMAIN . "$cssItemMain"); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Kristi" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Judson" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
    
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]> <![endif]-->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <body class="full-screen-preview" >


   <!--<div class="yenidiv col-lg-12 col-md-12">
        <div class="firinci_var_header">-->
          
          <?php

          $activePage = basename($_SERVER['PHP_SELF'], ".php");
          
          echo '<nav class="navbar navbar-expand-lg navbar-dark firinci_menu_kont" id="nav">
          <div class="container-fluid">
          <div class="hizalama">
            <h1 class="lezzetLogoH1">
              <a class="lezzetLogo_a" href="index.php">
        <img class="lezzetLogo rounded" src="images/cafeLezzet.jpg" rel="logo" Width="70" Height="50" alt="Lezzzet Cafe"/></a></h1>
        <form method="POST">
        <div class="searchDiv bg">
          <input type="text" placeholder="Ara..."/>
          <button type="submit"><i class="fa fa-search"></i></button>
        </div>
        </form>
        </div>
          
           <button class="navbar-toggler yeni_button" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse yeni_collaps" id="navbarNav">
            <ul class="navbar-nav firinci_menu">';
            ?>
            
        <li class="nav-item"><a href="index.php" class="nav-link <?php if ($activePage=="") {echo "active"; } elseif($activePage=="index") {echo "active"; } else  {echo "noactive";}?>" style="color:#dce4e8;">Anasayfa</a></li>
        <li class="nav-item"><a href="hakkimizda.php" class="nav-link <?php if ($activePage=="hakkimizda") {echo "active"; } else  {echo "noactive";}?>"  style="color:#dce4e8;">Hakkımızda</a></li>
        <li class="nav-item"><a href="urunler.php" class="nav-link <?php if ($activePage=="urunler" || $activePage=="urun") {echo "active"; } else  {echo "noactive";}?>" style="color:#dce4e8;" >Ürünler</a></li>
        <li class="nav-item"><a href="catering.php" class="nav-link <?php if ($activePage=="catering") {echo "active"; } else  {echo "noactive";}?>"  style="color:#dce4e8;" style="color:#dce4e8;">Caterıng</a></li>
        <li class="nav-item"><a href="medya.php" class="nav-link <?php if ($activePage=="medya") {echo "active"; } else  {echo "noactive";}?>" style="color:#dce4e8;">Medya</a></li>
        <li class="nav-item"><a href="iletisim.php" class="nav-link <?php if ($activePage=="iletisim") {echo "active"; } else  {echo "noactive";}?>" style="color:#dce4e8;">İletişim</a></li>
    
    <?php

            echo '</ul>
                </div>
              </div>
            </div>
          </nav>';
          ?>
       
   


  </div> 
</div> 
  <div class="clearfix"></div>

