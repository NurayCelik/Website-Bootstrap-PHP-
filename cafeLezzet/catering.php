<?php
include "header.php";
?>
<section>
  <div class="parallaxCat img-responsive" style="background-image: url('images/catering.jpg'">

</div>
<div class="clearfix"></div>
<div class="firinciCatering">
	<div class="container padding0">
		<div class="row">
			<div class="col-lg-12 padding0">
				 <div class="cateringParag">
           <h3 class="cateringFirst"><span>C</span>atering</h3>
            <h5 class="headCatering">Bir Tabak İster Misiniz?</h5>
             <div class="separator_flower">✻</div>
              <p>
									Düğün resepsiyonları, prova yemekleri, ofis partileri, toplantılar, doğum günü partileri ve diğer etkinlikleriniz için LezzetCafe saha dışında da hizmet verir ve etkinliğiniz için özel bir menü oluşturur. 
              </p>
              <p>Tesis bünyesinde içecek ve yemek servisi de mevcuttur. Hizmetlerimiz arasında Kokteyl Organizasyon / Coffee Break / Kahvaltı - Brunch / Açık Büfe Yemek - Buffet / Barbekü - BBQ bulunmkatadır. Bir istek göndermek veya daha fazla bilgi almak için <a href="info@leezzetcafe.com">buradan</a> bize ulaşabilirsiniz.
              </p>
             </div>
            </div>
          </div>
        </div>
						<div class="clearfix"></div>
        <div class="container catMargin">
            <div class="cateringCont">
              <div class="row">
                <div class="col catGaleriImg"><img src="images/kofte.jpg" width="190" height="150"></div>
                <div class="col catGaleriImg"><img src="images/spagetti.jpg" width="190" height="150"></div>
                <div class="col catGaleriImg"><img src="images/pizza.jpg" width="190" height="150"></div>
                <div class="col catGaleriImg"><img src="images/makarnakofte.jpg" width="190" height="150"></div>
                <div class="col catGaleriImg"><img src="images/borek.jpg" width="190" height="150"></div> 
                <div class="clearfix"></div>
                <div class="w-100"></div>      
                <div class="col catGaleriImg"><img src="images/burger.jpg" width="190" height="125"></div>
                <div class="col catGaleriImg"><img src="images/dilimkek.jpg" width="190" height="150"></div>
                <div class="col catGaleriImg"><img src="images/kurabiye.jpg" width="190" height="150"></div>
                <div class="col catGaleriImg"><img src="images/sarma.jpg" width="190" height="125"></div>
                <div class="col catGaleriImg"><img src="images/tuzlukurabiye.jpg" width="190" height="150"></div>
                <div class="w-100"></div>      
                <div class="col catGaleriImg"><img src="images/macaroon.jpg" width="190" height="150"></div>
                <div class="col catGaleriImg"><img src="images/borekcesit.jpg" width="190" height="150"></div>
                <div class="col catGaleriImg"><img src="images/kalite.jpg" width="190" height="150"></div>
                <div class="col catGaleriImg"><img src="images/baklava.jpg" width="190" height="150"></div>
                <div class="col catGaleriImg"><img src="images/sweets.jpg" width="190" height="150"></div>
                <div class="w-100"></div>
                <div class="col catGaleriImg"><img src="images/kofte.jpg" width="190" height="150"></div>
                <div class="col catGaleriImg"><img src="images/spagetti.jpg" width="190" height="150"></div>
                <div class="col catGaleriImg"><img src="images/pizza.jpg" width="190" height="150"></div>
                <div class="col catGaleriImg"><img src="images/makarnakofte.jpg" width="190" height="150"></div>
                <div class="col catGaleriImg"><img src="images/borek.jpg" width="190" height="150"></div> 
                <div class="w-100"></div>      
                <div class="col catGaleriImg"><img src="images/burger.jpg" width="190" height="150"></div>
                <div class="col catGaleriImg"><img src="images/dilimkek.jpg" width="190" height="150"></div>
                <div class="col catGaleriImg"><img src="images/kurabiye.jpg" width="190" height="150"></div>
                <div class="col catGaleriImg"><img src="images/sarma.jpg" width="190" height="150"></div>
                <div class="col catGaleriImg"><img src="images/tuzlukurabiye.jpg" width="190" height="150"></div>
                <div class="w-100"></div>      
                <div class="col catGaleriImg"><img src="images/macaroon.jpg" width="190" height="150"></div>
                <div class="col catGaleriImg"><img src="images/borekcesit.jpg" width="190" height="150"></div>
                <div class="col catGaleriImg"><img src="images/kalite.jpg" width="190" height="150"></div>
                <div class="col catGaleriImg"><img src="images/baklava.jpg" width="190" height="150"></div>
                <div class="col catGaleriImg"><img src="images/sweets.jpg" width="190" height="150"></div>
              </div>
            </div>
           </div>
          </div>
				</div>
			</div>

<div class="clearfix"></div>
<div class="firinci_aile">
    <div class="dokuRengi">
     <div class="container">
      <div class="row" id="FranchiseForm">
       
     
          <div class="col-lg-8 col-md-10 offset-lg-2 offset-md-1 franchiseFormu" id="formGirisi0">
         <?php
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

     


        
        if(!empty($_POST['ad']) || !empty($_POST['soyad']) || !empty($_POST['telefon']) || !empty($_POST['email']) || !empty($_POST['mesaj'])) {
           
          ini_set('SMTP', 'smtp.yourisp.com');
          ini_set( 'display_errors', 1 );
          error_reporting( E_ALL );
          require("class.phpmailer.php");



        $email_to = "nuraykeskincelik@hotmail.com";
        $subject = "Fırıncı Bala Form Bilgileri";
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

        $email_message = "Form detayları aşağıdadır.\n\n";

        function clean_string($string) {
          $bad = array("content-type","bcc:","to:","cc:","href");
          return str_replace($bad,"",$string);
        }

        $email_message .= "First Name: ".clean_string($ad)."\n";
        $email_message .= "Last Name: ".clean_string($soyad)."\n";
        $email_message .= "Email: ".clean_string($emailFrom)."\n";
        $email_message .= "Telephone: ".clean_string($telefon)."\n";
        $email_message .= "Mesajınız: ".clean_string($mesaj)."\n";


      /*  

 $mail = new PHPMailer();
    
      $mail->IsSMTP();                                   // send via SMTP
      $mail->Host     = "mail.firincibala.com"; // SMTP servers
      $mail->SMTPAuth = true;     // turn on SMTP authentication
      $mail->Username = "info@firincibala.com";  // SMTP username
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
      echo '<renk style="color:#49b981; font-size:28px;">'. $ad.'</renk> Bizimle iletişime geçtiğiniz için teşekkürler. Çok yakında size geri döneceğiz.<br><br><br><a href="franchise.php" style="color:#dc3545">Forma Geri Dön<a>';
      }*/
       // create email headers
        $headers = 'From: '.$emailFrom."\r\n".
        'Reply-To: '.$emailFrom."\r\n" .
        'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $email_message, $headers); 
        echo '<renk style="color:#49b981; font-size:28px;">'. $ad.'</renk> Bizimle iletişime geçtiğiniz için teşekkürler. Çok yakında size geri döneceğiz.<br><br><br><a href="franchise.php" style="color:#dc3545">Forma Geri Dön<a>';

 }
 else{  
        $ad = ""; // required
        $soyad = ""; // required
        $emailFrom = ""; // required
        $telefon = ""; // required
        $mesaj = ""; //required


     ?>
     <div class="formGirisi">
          <h3>mesaj bırak</h3>
          </div>
          <form name="sentMessage" id="contactForm" enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF'];?>#formGirisi0" method ="post">
             <div class="form-group">
                <input type="text" id="ad" name="ad" class="form-control" placeholder="Ad Soyad" required="required">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                  <input type="text" id="telefon" name="telefon" class="form-control" placeholder="Telefon" required="required">
                  <p class="help-block  text-danger"></p>
              </div>
              <div class="form-group">
                  <input type="email" id="email" class="form-control" name="email" placeholder="Email" required="required">
                  <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <textarea name="mesaj" id="mesaj" class="form-control" name="mesaj" rows="4" placeholder="Mesaj" required="required"></textarea>
                <p class="help-block text-danger"></p>
              </div>
              <div id="success"> </div>
              <button type="submit" id="gonderButon" name="gonderButon" name ="submit" class="btn btn-custom btn-lg form_butonu1">Gönder</button>
           </form>
     <?php         
    }
    ?>
 

          </div>
        </div>
     </div>
  </div>
</div>

	
<div class="clearfix"></div>

   		
</section>
  <?php

  include "footer.php";
  
  ?> 
  