<?php
include "header.php";
?>
<section style="background-color: #000;">
<div class="parallaxIletisim img-responsive" style="background-image: url('images/iletisim.jpg')">

</div>

<div class="clearfix"></div>
<div class="iletisimPage">
  <div class="container-fluid text-center">
    <div class="row" id="dialo">
   <div class="col-md-6  offset-md-3 form_nitelik1" id="formGirisi">

      <?php
        
        
        if(!empty($_POST['ad']) || !empty($_POST['soyad']) || !empty($_POST['telefon']) || !empty($_POST['email']) || !empty($_POST['mesaj'])) {
           
          ini_set('SMTP', 'smtp.yourisp.com');
          ini_set( 'display_errors', 1 );
          error_reporting( E_ALL );
          require("class.phpmailer.php");
           function sqlonleme($data)
        {
           $bad = array("content-type","bcc:","to:","cc:","href","select","SELECT","* from","* FROM","*from","*FROM","SELECT * FROM","select *from","SELECT *","SELECT*FROM","select * FROM","select *FROM","select *from","s3","S3","%7C","%2B");
          $islem = str_replace($bad,"",$data);
          
          return $islem;
        }
        function check_input($data)
       {  
        
        $data1 = trim($data);
        $data2 = stripslashes($data1);
        $data3 = htmlspecialchars($data2);
         
          return sqlonleme($data3);
       }


      function getir($key, $varsayilan)
      {
        if(isset($_POST[$key]))
        {
              return check_input($_POST[$key]);
        }
        else

        return $varsayilan;
      }

     




        $email_to = "nuraykeskincelik@hotmail.com";
        $subject = "Lezzet Cafe Form Bilgileri";
        function died($error) {
            // your error code can go here
            echo "Üzgünüz gönderdiğiniz formda hatalar bulundu! ";
            echo "Bu hatalar şunlardır: <br /><br />";
            echo $error."<br /><br />";
            echo "Lütfen geri dönün ve hataları düzeltin!<br /><br />";
            die();
        }

       

        $varsayilan ="-";
        $ad = getir('ad',$varsayilan); // required
        $soyad = getir('soyad',$varsayilan); // required
        $emailFrom = getir('email',$varsayilan); // required
        $telefon = getir('telefon',$varsayilan); // required
        $mesaj = getir('mesaj',$varsayilan); //required

        $error_message = "";
        $email_exp = '/^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/';
        if(!preg_match($email_exp,$emailFrom)) {
        $error_message .= 'Lütfen geçerli e-posta adresi yazınız!<br />';
        }

          

     $mail = new PHPMailer();
    
      $mail->IsSMTP();                                   // send via SMTP
      $mail->Host     = "mail.lezzetcafe.com"; // SMTP servers
      $mail->SMTPAuth = true;     // turn on SMTP authentication
      $mail->Username = "info@lezzetcafe.com";  // SMTP username
      $mail->Password = ""; // SMTP password
      $mail->Port     = 587; 
      $mail->From     = $emailFrom; // smtp kullanýcý adýnýz ile ayný olmalý
      $mail->Fromname = $ad;
      $mail->AddAddress("nuraykeskincelik@hotmail.com","Nuray Çelik");
      $mail->Subject  =  $konu;
      $mail->Body     =  implode("    ",$_POST);
      
      
      if(!$mail->Send())
      {
         echo "Mesaj Gönderilemedi <p>";
         echo "Mailer Error: " . $mail->ErrorInfo;
         echo '<br><br><br><a href="franchise.php" style="color:#dc3545">Forma Geri Dön<a>'; 
         exit;
      }
      else{
      echo '<renk style="color:#49b981; font-size:28px;">'. $ad.' '.$soyad.'</renk> Bizimle iletişime geçtiğiniz için teşekkürler. Çok yakında size geri döneceğiz.<br><br><br><a href="franchise.php" style="color:#dc3545">Forma Geri Dön<a>';
      }
       

 }
 else{  
        $ad = ""; // required
        $soyad = ""; // required
        $emailFrom = ""; // required
        $telefon = ""; // required
        $mesaj = ""; //required


     ?>
    <div class="section-title text-center">
      <h3>Bize Ulaşın</h3>
    </div>
    <form name="sentMessage" id="contactForm" enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF'];?>#formGirisi" method ="post">
        <div class="row">
        <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="ad" id="ad" class="form-control" placeholder="Ad" required="required">
              <p class="help-block text-danger"></p>
             </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="soyad" id="soyad" class="form-control" placeholder="Soyad" required="required">
              <p class="help-block text-danger"></p>
             </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="telefon" id="telefon" class="form-control" placeholder="Telefon" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
       </div>
        <div class="form-group">
          <textarea name="mesaj" id="mesaj" class="form-control" rows="4" placeholder="Mesaj" required></textarea>
          <p class="help-block text-danger"></p>
        </div>
        <div id="success"></div>
        <button type="submit" class="btn btn-custom btn-lg form_butonu">Mesaj Gönder</button>

      </form>
      <?php         
    }
    ?>
    </div>
  </div>
</div>
</div>



<div class="clearfix"></div>

    <div class="container-fluid iletisim_sinir">
        <div class="row iletisim_map">
      <div class="map_icerik col-md-5 col-sm-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46223.59051011185!2d36.17959970798343!3d36.203608814120805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb29a3b5554024386!2sAvukat%20Murat%20%C3%87elik!5e0!3m2!1str!2str!4v1568888377852!5m2!1str!2str" style="border:0" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="iletisim_blok col-md-7 col-sm-12">
          <div class="iletisim_blok1">
            <div class="row">
          <div class="iletisim_blok_icerik col-md-6 col-sm-8 col-xs-8">
            <h5>Lezzet Cafe - Merkez</h5>
            <p>Ürgen Paşa Mah. No: Antakya/Hatay TÜRKİYE</p>
            <p>0 545 787 47 57</p>
            <p class="">info@lezzetcafe.com</p>
            <h5>ÇALIŞMA SAATLERİ</h5>
            <p class="calisma_saati">Pazartesi – Pazar : 6:00 - 12:00 </p>
          </div>
          <div class="iletisim_block_img col-md-6 col-sm-4 col-xs-4"><img src="images/coffee.jpg" width="100%" height="100%" alt="" class="img-responsive"></div>
        </div>
        </div>
        </div>
      </div>
    </div>

<div class="clearfix"></div>

  <div class="row iletisim_map1">
    <div class="container-fluid iletisim_sinir">
     
        <div class="iletisim_blok_0 col-md-7 col-sm-12">
          <div class="iletisim_blok_sube">
            <div class="row">
            <div class="iletisim_block_img1 col-md-6 col-sm-4 col-xs-4">
              <img src="images/turkishcafe.jpg" width="100%" height="100%" alt="" class="img-responsive"></div>
          <div class="iletisim_blok_icerik1 col-md-6 col-sm-8 col-xs-8">
            <h5>Lezzet Cafe - Şube</h5>
            <p>Ürgen Paşa Mah. No: Antakya/Hatay TÜRKİYE</p>
            <p>0 545 787 47 57</p>
            <p class="">info@lezzetcafe.com</p>
            <h5>ÇALIŞMA SAATLERİ</h5>
            <p class="calisma_saati">Pazartesi – Pazar : 6:00 - 12:00 </p>
          </div>
          </div>
        </div>
      </div>
 <div class="map_icerik1 col-md-5 col-sm-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46223.59051011185!2d36.17959970798343!3d36.203608814120805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb29a3b5554024386!2sAvukat%20Murat%20%C3%87elik!5e0!3m2!1str!2str!4v1568888377852!5m2!1str!2str" style="border:0" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>

        
        </div>
      </div>
  <div class="clearfix"></div>
  </section>
  <div class="clearfix"></div>

  <?php

  include "footer.php";
  
  ?>
  