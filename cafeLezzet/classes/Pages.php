<?php 
$filepath= realpath(dirname(__FILE__));//http://localhost/shop olan url kısım. daha kolay ulaşılsın diye yazıldı. Yoksa admin kısım rahat classlara ulaşırken diğer bölümler erişemiyor.
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');
 
?>
 
<?php
class Pages{
	private $db;  // I crate Property for Database Class
	private $fm; // I crate Property for Format Class  
 
    public function __construct(){
       $this->db   = new Database(); // I crate Object for Database Class
       $this->fm   = new Format(); // I crate Object for Format Class  
	}

public function getAllTable($table){ 
        $query = "SELECT * FROM $table";
         $result = $this->db->select($query);
         return $result; 
       }


  public function delImageId($id, $columnCount, $tableName,$columnName){
    	$columnCount=unserialize($columnCount);
    	$count =count($columnCount);
       $query = "SELECT * FROM $tableName WHERE $columnName ='$id' ";
       $getData = $this->db->select($query);
         if ($getData) {
           while ($delImg = $getData->fetch_assoc()) {
           	for($i=0;$i<$count;$i++){
           $dellink = $delImg[$columnCount[$i]];
          	@unlink($dellink);
          }
            }
          }
        }
    
    public function aboutTopUpdate($data, $files=[])
     { 
   
      $files = unserialize($files);
	    $count = count($files['resimler']['name']); 

      $ustBaslik   =  mysqli_real_escape_string($this->db->link, strip_tags(addslashes($data['ustBaslik'] )));
      $baslik      =  mysqli_real_escape_string($this->db->link, $this->fm->validation(strip_tags(addslashes($data['baslik'] ))));
      $icerik1     =  mysqli_real_escape_string($this->db->link, strip_tags(addslashes($data['icerik1'] )));
      $icerik2     =  mysqli_real_escape_string($this->db->link, strip_tags(addslashes($data['icerik2'] )));
      $icerik3     =  mysqli_real_escape_string($this->db->link, strip_tags(addslashes($data['icerik3'] )));
      
     
      $permited = array('jpg','png','jpeg','gif');
	    
    
      if ($ustBaslik == "" || $baslik == "" || $icerik1 == "" || $icerik2 == "" || $icerik3 == "") {
      $msg = "<span class='error'>Alanlar Boş Olmamalı.</span> ";
          return $msg;
     }else {
    
     try{
	     if ($count>0) {

        for($i=0; $i<$count;$i++){
        $file_name  =  $files['resimler']['name'][$i];
        $file_size  =  $files['resimler']['size'][$i];
        $file_temp  =  $files['resimler']['tmp_name'][$i];
        $file_type  =  $files['resimler']['type'][$i];
      
          $div= explode('.',$file_name);
          $file_ext = strtolower(end($div));

          $uploaded_image[$i]= "upload/hakkimizda/".substr(md5(uniqid(rand(1,6))), 0, 8).'.'.$file_ext;
          $inserted_image[$i] ="upload/arsiv/".substr(md5(uniqid(rand(1,6))), 0, 8).'.'.$file_ext;
      
         if ($file_size > 1054589 ) {
          echo "<span class='error'>Image Boyutu 1MB den fazla olmamalı!</span>";
         }elseif (in_array($file_ext, $permited) === false) {
          echo "<span class='error'> Sadece şu uzantılı dosyaları yükleyebilirsiniz: ".implode(',', $permited)."</span>";
          } else{
          	 $id=1;
          	 $columnName=array('image1','image2');
          	 $columnCount = serialize($columnName);
          	 $tName='tbl_hakkimizda';
          	 $columnId='hakkimizdaId';
            $this->delImageId($id,$columnCount,$tName,$columnId);
             move_uploaded_file($file_temp, $uploaded_image[$i]);
             $sonuc =   copy($uploaded_image[$i], $inserted_image[$i]);
              if($sonuc){
              $tbl_fotoarsiv='tbl_fotoarsiv';
              $image='image';
             $this->ekleTable($tbl_fotoarsiv, $image, $inserted_image[$i]);
           }
             
          }
           
  }

		

        $query = "UPDATE tbl_hakkimizda
            SET
            ustBaslik  = '$ustBaslik',
            baslik 	   = '$baslik',
            icerik1    = '$icerik1',
            icerik2    = '$icerik2',
            icerik3    = '$icerik3',
            image1     = '$uploaded_image[0]',
            image2     = '$uploaded_image[1]'
           WHERE hakkimizdaId = '1' ";
             $updated_row = $this->db->update($query);
          if ($updated_row) {
          $msg = "<span class='success'>Hakkimizda Güncelleme Başarılı.</span> ";
         
          return $msg;
        }else {
          $msg = "<span class='error'>Hakkimizda Güncellenme Başarısız!</span> ";
          return $msg;
        } 
   
 }
       else{
        $query = "UPDATE tbl_hakkimizda
            SET
            ustBaslik  = '$ustBaslik',
            baslik     = '$baslik',
            icerik1    = '$icerik1',
            icerik2    = '$icerik2',
            icerik3    = '$icerik3'
          WHERE hakkimizdaId = '1' ";

          $updated_row = $this->db->update($query);
          if ($updated_row) {
           $msg = "<span class='success'>Hakkimizda Güncelleme Başarılı.</span> ";
          return $msg;
        }else {
          $msg = "<span class='error'>Hakkimizda Güncellenme Başarısız!</span> ";
          return $msg; // return This Message 
        } 
 
        }
    }
 

   catch(Exception $e)    
    {
      die($e->getMessage());
   		 }
	}  
}
	 public function aboutMiddleUpdate($data, $files=[])
     { 
   
     $files = unserialize($files);
	   $count = count($files['resimler']['name']); 

      $ustBaslik   =  mysqli_real_escape_string($this->db->link, strip_tags(addslashes($data['ortaBaslik1'] )));
      $baslik      =  mysqli_real_escape_string($this->db->link, $this->fm->validation(strip_tags(addslashes($data['ortaBaslik2'] ))));
 	
 	   $permited = array('jpg','png','jpeg','gif');
	    
    
      if ($ustBaslik == "" || $baslik == "") {
      $msg = "<span class='error'>Alanlar Boş Olmamalı!</span> ";
          return $msg;
     }else {
    
     try{
	if ($count>0) {

      for($i=0; $i<$count;$i++){
      $file_name  =  $files['resimler']['name'][$i];
      $file_size  =  $files['resimler']['size'][$i];
      $file_temp  =  $files['resimler']['tmp_name'][$i];
      $file_type  =  $files['resimler']['type'][$i];
    
        $div= explode('.',$file_name);
        $file_ext = strtolower(end($div));

        $uploaded_image[$i]= "upload/hakkimizda/".substr(md5(uniqid(rand(1,6))), 0, 8).'.'.$file_ext;
        $inserted_image[$i] ="upload/arsiv/".substr(md5(uniqid(rand(1,6))), 0, 8).'.'.$file_ext;
      
         if ($file_size > 1054589 ) {
          echo "<span class='error'>Image Boyutu 1MB den fazla olmamalı!</span>";
         }elseif (in_array($file_ext, $permited) === false) {
          echo "<span class='error'> Sadece şu uzantılı dosyaları yükleyebilirsiniz: ".implode(',', $permited)."</span>";
          } else{
          	 $id=1;
		         $columnName=array('ortaImage');
          	 $columnCount = serialize($columnName);
          	 $tName='tbl_hakkimizda';
          	 $columnId='hakkimizdaId';
            $this->delImageId($id,$columnCount,$tName,$columnId);
             move_uploaded_file($file_temp, $uploaded_image[$i]);
              $sonuc =  copy($uploaded_image[$i], $inserted_image[$i]);
              if($sonuc){
              $tbl_fotoarsiv='tbl_fotoarsiv';
              $image='image';
             $this->ekleTable($tbl_fotoarsiv, $image, $inserted_image[$i]);
           }
          }
           
  }

		

        $query = "UPDATE tbl_hakkimizda
            SET
            ortaBaslik1  = '$ustBaslik',
            ortaBaslik2	 = '$baslik',
            ortaImage    = '$uploaded_image[0]'
          WHERE hakkimizdaId = '1' ";
             $updated_row = $this->db->update($query);
          if ($updated_row) {
          $msg = "<span class='success'>Hakkimizda Güncelleme Başarılı.</span> ";
         
          return $msg;
        }else {
          $msg = "<span class='error'>Hakkimizda Güncellenme Başarısız!</span> ";
          return $msg;
        } 
   
 }
       else{
        $query = "UPDATE tbl_hakkimizda
            SET
            ortaBaslik1  = '$ustBaslik',
            ortaBaslik2	 = '$baslik'
          WHERE hakkimizdaId = '1' ";

          $updated_row = $this->db->update($query);
          if ($updated_row) {
           $msg = "<span class='success'>Hakkimizda Güncelleme Başarılı.</span> ";
          return $msg;
        }else {
          $msg = "<span class='error'>Hakkimizda Güncellenme Başarısız!</span> ";
          return $msg; // return This Message 
        } 
 
        }
    }
 

   catch(Exception $e)    
    {
      die($e->getMessage());
   		 }
	}  
}


public function aboutEndUpdate($data, $files=[]){ 
    
      $files = unserialize($files);
	    $count = count($files['resimler']['name']); 

      $altBaslik1      =  mysqli_real_escape_string($this->db->link, $this->fm->validation(strip_tags(addslashes($data['altBaslik1'] ))));
      $altIcerik1      =  mysqli_real_escape_string($this->db->link, $this->fm->validation(strip_tags(addslashes($data['altIcerik1'] ))));
      $altBaslik2      =  mysqli_real_escape_string($this->db->link, $this->fm->validation(strip_tags(addslashes($data['altBaslik2'] ))));
      $altIcerik2      =  mysqli_real_escape_string($this->db->link, $this->fm->validation(strip_tags(addslashes($data['altIcerik2'] ))));
      $altBaslik3      =  mysqli_real_escape_string($this->db->link, $this->fm->validation(strip_tags(addslashes($data['altBaslik3'] ))));
      $altIcerik3      =  mysqli_real_escape_string($this->db->link, $this->fm->validation(strip_tags(addslashes($data['altIcerik3'] ))));
 	
 	  $permited = array('jpg','png','jpeg','gif');
	    
    
      if ($altBaslik1 == "" || $altIcerik1 == "" || $altBaslik2 == "" || $altIcerik2 == "" || $altBaslik3 == "" || $altIcerik3 == "") {
      $msg = "<span class='error'>Alanlar Boş Olmamalı!</span> ";
          return $msg;
     }else {
    
     try{

     	if($count>0) {

      for($i=0; $i<$count;$i++){
      $file_name  =  $files['resimler']['name'][$i];
      $file_size  =  $files['resimler']['size'][$i];
      $file_temp  =  $files['resimler']['tmp_name'][$i];
      $file_type  =  $files['resimler']['type'][$i];
    
        $div= explode('.',$file_name);
        $file_ext = strtolower(end($div));

        $uploaded_image[$i]= "upload/hakkimizda/".substr(md5(uniqid(rand(1,6))), 0, 8).'.'.$file_ext;
        
        $inserted_image[$i]= "upload/arsiv/".substr(md5(uniqid(rand(1,6))), 0, 8).'.'.$file_ext;
      
         if ($file_size > 1054589 ) {
          echo "<span class='error'>Image Boyutu 1MB den fazla olmamalı!</span>";
         }elseif (in_array($file_ext, $permited) === false) {
          echo "<span class='error'> Sadece şu uzantılı dosyaları yükleyebilirsiniz: ".implode(',', $permited)."</span>";
          } else{
          	 $id=1;
		         $columnName=array('altImage1','altImage2','altImage3');
          	 $columnCount = serialize($columnName);
          	 $tName='tbl_hakkimizda';
          	 $columnId='hakkimizdaId';
             $this->delImageId($id,$columnCount,$tName,$columnId);
             move_uploaded_file($file_temp, $uploaded_image[$i]);
              $sonuc =   copy($uploaded_image[$i], $inserted_image[$i]);
              if($sonuc){
              $tbl_fotoarsiv='tbl_fotoarsiv';
              $image='image';
             $this->ekleTable($tbl_fotoarsiv, $image, $inserted_image[$i]);
           }
            
          }
           
  }
 
		

        $query = "UPDATE tbl_hakkimizda
            SET
            altBaslik1   = '$altBaslik1',
            altIcerik1	 = '$altIcerik1',
            altBaslik2   = '$altBaslik2',
            altIcerik2	 = '$altIcerik2',
            altBaslik3   = '$altBaslik3',
            altIcerik3	 = '$altIcerik3',
            altImage1    = '$uploaded_image[0]',
            altImage2    = '$uploaded_image[1]',
            altImage3    = '$uploaded_image[2]'
          WHERE hakkimizdaId = '1' ";
          	$updated_row = $this->db->update($query);
          if ($updated_row) {
          $msg = "<span class='success'>Hakkimizda Güncelleme Başarılı.</span> ";
         
          return $msg;
        }else {
          $msg = "<span class='error'>Hakkimizda Güncellenme Başarısız!</span> ";
          return $msg;
        } 
   
 }
       else{
        $query = "UPDATE tbl_hakkimizda
            SET
            altBaslik1   = '$altBaslik1',
            altIcerik1	 = '$altIcerik1',
            altBaslik2   = '$altBaslik2',
            altIcerik2	 = '$altIcerik2',
            altBaslik3   = '$altBaslik3',
            altIcerik3	 = '$altIcerik3'
          WHERE hakkimizdaId = '1' ";

          $updated_row = $this->db->update($query);
          if ($updated_row) {
           $msg = "<span class='success'>Hakkimizda Güncelleme Başarılı.</span> ";
          return $msg;
        }else {
          $msg = "<span class='error'>Hakkimizda Güncellenme Başarısız!</span> ";
          return $msg; // return This Message 
        } 
 
        }
    }
 

   catch(Exception $e)    
    {
      die($e->getMessage());
   		 }
	}  
}


  
  public function ekleTable($tableName, $columnName, $value){
    $query = "INSERT INTO $tableName($columnName)
               VALUES('$value')";
              $inserted_row= $this->db->insert($query);
            if ($inserted_row) {
            $msg = "<span class='success'>$tableName Ekleme Başarılı.</span> ";
            return $msg;
          }else {
            $msg = "<span class='error'>$tableName Eklenmedi!</span> ";
            return $msg;
          }
      }





  public function mainTopUpdate($data, $files=[])
    { 
   
      $files = unserialize($files);
      $count = count($files['images']['name']); 

      $markaBaslik1   =  mysqli_real_escape_string($this->db->link, strip_tags(addslashes($data['markaBaslik1'] )));
      $markaBaslik2   =  mysqli_real_escape_string($this->db->link, strip_tags(addslashes($data['markaBaslik2'] )));
  
      $permited = array('jpg','png','jpeg','gif');
      
    
      if ($markaBaslik1 == "" || $markaBaslik2 == "") {
      $msg = "<span class='error'>Alanlar Boş Olmamalı!</span> ";
          return $msg;
     }else {
    
  try{
    
     if ($count>0) {

      for($i=0; $i<$count;$i++){
      $file_name  =  $files['images']['name'][$i];
      $file_size  =  $files['images']['size'][$i];
      $file_temp  =  $files['images']['tmp_name'][$i];
      $file_type  =  $files['images']['type'][$i];
    
        $div= explode('.',$file_name);
        $file_ext = strtolower(end($div));

        $uploaded_image[$i]= "upload/anasayfa/".substr(md5(uniqid(rand(1,6))), 0, 8).'.'.$file_ext;
         $inserted_image[$i]= "upload/arsiv/".substr(md5(uniqid(rand(1,6))), 0, 8).'.'.$file_ext;
      
         if ($file_size > 1054589 ) {
          echo "<span class='error'>Image Boyutu 1MB den fazla olmamalı!</span>";
         }elseif (in_array($file_ext, $permited) === false) {
          echo "<span class='error'> Sadece şu uzantılı dosyaları yükleyebilirsiniz: ".implode(',', $permited)."</span>";
          } else{
             $id=1;
            $columnName=array('markaImage');
             $columnCount = serialize($columnName);
             $tName='tbl_anasayfa';
             $columnId='anasayfaId';
            $this->delImageId($id,$columnCount,$tName,$columnId);
             move_uploaded_file($file_temp, $uploaded_image[$i]);
             
              $sonuc =  copy($uploaded_image[$i], $inserted_image[$i]);
              if($sonuc){
              $tbl_fotoarsiv='tbl_fotoarsiv';
              $image='image';
             $this->ekleTable($tbl_fotoarsiv, $image, $inserted_image[$i]);
           }
             
          }
           
          }
        $query = "UPDATE tbl_anasayfa
            SET
            markaBaslik1  = '$markaBaslik1',
            markaBaslik2  = '$markaBaslik2',
            markaImage    = '$uploaded_image[0]'
          WHERE anasayfaId = '1' ";
             $updated_row = $this->db->update($query);
          if ($updated_row) {
          $msg = "<span class='success'>Anasayfa Güncelleme Başarılı.</span> ";
         
          return $msg;
        }else {
          $msg = "<span class='error'>Anasayfa Güncellenme Başarısız!</span> ";
          return $msg;
        } 
   
 }
       else{
        $query = "UPDATE tbl_anasayfa
            SET
            markaBaslik1  = '$markaBaslik1',
            markaBaslik2  = '$markaBaslik2'
          WHERE anasayfaId = '1' ";

          $updated_row = $this->db->update($query);
          if ($updated_row) {
           $msg = "<span class='success'>Anasayfa Güncelleme Başarılı.</span> ";
          return $msg;
        }else {
          $msg = "<span class='error'>Anasayfa Güncellenme Başarısız!</span> ";
          return $msg; // return This Message 
        } 
 
        }
    }
 

   catch(Exception $e)    
    {
      die($e->getMessage());
       }
  }  
}


public function mainMiddleUpdate($data, $files=[])
      {
    
      $files = unserialize($files);
      $count = count($files['images']['name']); 

      $hakBaslik   =  mysqli_real_escape_string($this->db->link, strip_tags(addslashes($data['hakBaslik'] )));
      $hakIcerik      =  mysqli_real_escape_string($this->db->link, $this->fm->validation(strip_tags(addslashes($data['hakIcerik'] ))));
      $hakhref   =  mysqli_real_escape_string($this->db->link, strip_tags(addslashes($data['hakhref'] )));
      $kaliteBaslik      =  mysqli_real_escape_string($this->db->link, $this->fm->validation(strip_tags(addslashes($data['kaliteBaslik'] ))));
      $kaliteIcerik   =  mysqli_real_escape_string($this->db->link, strip_tags(addslashes($data['kaliteIcerik'] )));
      $hizliBaslik      =  mysqli_real_escape_string($this->db->link, $this->fm->validation(strip_tags(addslashes($data['hizliBaslik'] ))));
      $icerikHizli   =  mysqli_real_escape_string($this->db->link, strip_tags(addslashes($data['icerikHizli'] )));
      $dogalBaslik      =  mysqli_real_escape_string($this->db->link, $this->fm->validation(strip_tags(addslashes($data['dogalBaslik'] ))));
      $icerikDogal   =  mysqli_real_escape_string($this->db->link, strip_tags(addslashes($data['icerikDogal'] )));
      
  
    $permited = array('jpg','png','jpeg','gif');
      
    
      if($hakBaslik == "" || $hakIcerik == "" || $hakhref == "" || $kaliteBaslik == "" || $kaliteIcerik == "" || $hizliBaslik == "" || $icerikHizli == "" || $dogalBaslik == "" || $icerikDogal == "") {
      $msg = "<span class='error'>Alanlar Boş Olmamalı!</span> ";
          return $msg;
     }else {
    
     try{

      if ($count>0) {

      for($i=0; $i<$count;$i++){
      $file_name  =  $files['images']['name'][$i];
      $file_size  =  $files['images']['size'][$i];
      $file_temp  =  $files['images']['tmp_name'][$i];
      $file_type  =  $files['images']['type'][$i];
    
        $div= explode('.',$file_name);
        $file_ext = strtolower(end($div));

        $uploaded_image[$i]= "upload/anasayfa/".substr(md5(uniqid(rand(1,6))), 0, 8).'.'.$file_ext;
        $inserted_image[$i]= "upload/arsiv/".substr(md5(uniqid(rand(1,6))), 0, 8).'.'.$file_ext;

      
         if ($file_size > 1054589 ) {
          echo "<span class='error'>Image Boyutu 1MB den fazla olmamalı!</span>";
         }elseif (in_array($file_ext, $permited) === false) {
          echo "<span class='error'> Sadece şu uzantılı dosyaları yükleyebilirsiniz: ".implode(',', $permited)."</span>";
          } else{
             $id=1;
             $columnName=array('hakImage1','hakImage2','kaliteImage','hizliImage','imageDogal');
             $columnCount = serialize($columnName);
             $tName='tbl_anasayfa';
             $columnId='anasayfaId';
            $this->delImageId($id,$columnCount,$tName,$columnId);
             move_uploaded_file($file_temp, $uploaded_image[$i]);
             $sonuc =  copy($uploaded_image[$i], $inserted_image[$i]);
              if($sonuc){
              $tbl_fotoarsiv='tbl_fotoarsiv';
              $image='image';
             $this->ekleTable($tbl_fotoarsiv, $image, $inserted_image[$i]);
           }
             
          }
           
  }

    

        $query = "UPDATE tbl_anasayfa
            SET
            hakBaslik      = '$hakBaslik',
            hakIcerik      = '$hakIcerik',
            hakhref        = '$hakhref',
            kaliteBaslik   = '$kaliteBaslik',
            kaliteIcerik   = '$kaliteIcerik',
            hizliBaslik    = '$hizliBaslik',
            icerikHizli    = '$icerikHizli',
            dogalBaslik    = '$dogalBaslik',
            icerikDogal    = '$icerikDogal',
            hakImage1      = '$uploaded_image[0]',
            hakImage2      = '$uploaded_image[1]',
            kaliteImage    = '$uploaded_image[2]',
            hizliImage     = '$uploaded_image[3]',
            imageDogal     = '$uploaded_image[4]' 
          WHERE anasayfaId = '1' ";
             $updated_row  =  $this->db->update($query);
          if ($updated_row) {
          $msg = "<span class='success'>Anasayfa Güncelleme Başarılı.</span> ";
         
          return $msg;
        }else {
          $msg = "<span class='error'>Anasayfa Güncellenme Başarısız!</span> ";
          return $msg;
        } 
   
 }
       else{
        $query = "UPDATE tbl_anasayfa
            SET
            hakBaslik      = '$hakBaslik',
            hakIcerik      = '$hakIcerik',
            hakhref        = '$hakhref',
            kaliteBaslik   = '$kaliteBaslik',
            kaliteIcerik   = '$kaliteIcerik',
            hizliBaslik    = '$hizliBaslik',
            icerikHizli    = '$icerikHizli',
            dogalBaslik    = '$dogalBaslik',
            icerikDogal    = '$icerikDogal'
          WHERE anasayfaId = '1' ";

          $updated_row = $this->db->update($query);
          if ($updated_row) {
           $msg = "<span class='success'>Anasayfa Güncelleme Başarılı.</span> ";
          return $msg;
        }else {
          $msg = "<span class='error'>Anasayfa Güncellenme Başarısız!</span> ";
          return $msg; // return This Message 
        } 
 
        }
    }
 

   catch(Exception $e)    
    {
      die($e->getMessage());
       }
  }  
}
    public function mainEndUpdate($data, $files=[])
    {
    
      $files = unserialize($files);
      $count = count($files['images']['name']); 

      $servisBaslik   =  mysqli_real_escape_string($this->db->link, strip_tags(addslashes($data['servisBaslik'] )));
      $servisIcerik1      =  mysqli_real_escape_string($this->db->link, $this->fm->validation(strip_tags(addslashes($data['servisIcerik1'] ))));
      $servisHref1   =  mysqli_real_escape_string($this->db->link, strip_tags(addslashes($data['servisHref1'] )));
      $servisIcerik2   =  mysqli_real_escape_string($this->db->link, strip_tags(addslashes($data['servisIcerik2'] )));
      $servisHref2   =  mysqli_real_escape_string($this->db->link, strip_tags(addslashes($data['servisHref2'] )));
      
  
    $permited = array('jpg','png','jpeg','gif');
      
    
      if($servisBaslik == "" || $servisIcerik1 == "" || $servisHref1 == "" || $servisIcerik2 == "" || $servisHref2 == "") {
      $msg = "<span class='error'>Alanlar Boş Olmamalı!</span> ";
          return $msg;
     }else {
    
     try{

      if ($count>0) {

      for($i=0; $i<$count;$i++){
      $file_name  =  $files['images']['name'][$i];
      $file_size  =  $files['images']['size'][$i];
      $file_temp  =  $files['images']['tmp_name'][$i];
      $file_type  =  $files['images']['type'][$i];
    
        $div= explode('.',$file_name);
        $file_ext = strtolower(end($div));

        $uploaded_image[$i]= "upload/anasayfa/".substr(md5(uniqid(rand(1,6))), 0, 8).'.'.$file_ext;
        $inserted_image[$i]= "upload/arsiv/".substr(md5(uniqid(rand(1,6))), 0, 8).'.'.$file_ext;

      
         if ($file_size > 1054589 ) {
          echo "<span class='error'>Image Boyutu 1MB den fazla olmamalı!</span>";
         }elseif (in_array($file_ext, $permited) === false) {
          echo "<span class='error'> Sadece şu uzantılı dosyaları yükleyebilirsiniz: ".implode(',', $permited)."</span>";
          } else{
             $id=1;
             $columnName=array('image1','image2','image3','image4');
             $columnCount = serialize($columnName);
             $tName='tbl_anasayfa';
             $columnId='anasayfaId';
            $this->delImageId($id,$columnCount,$tName,$columnId);
             move_uploaded_file($file_temp, $uploaded_image[$i]);
             $sonuc =  copy($uploaded_image[$i], $inserted_image[$i]);
              if($sonuc){
              $tbl_fotoarsiv='tbl_fotoarsiv';
              $image='image';
             $this->ekleTable($tbl_fotoarsiv, $image, $inserted_image[$i]);
           }
             
          }
           
  }

    

        $query = "UPDATE tbl_anasayfa
            SET
            servisBaslik   = '$servisBaslik',
            servisIcerik1  = '$servisIcerik1',
            servisHref1    = '$servisHref1',
            servisIcerik2  = '$servisIcerik2',
            servisHref2    = '$servisHref2',
            image1         = '$uploaded_image[0]',
            image2         = '$uploaded_image[1]',
            image3         = '$uploaded_image[2]',
            image4         = '$uploaded_image[3]'
          WHERE anasayfaId = '1' ";
             $updated_row  =  $this->db->update($query);
          if ($updated_row) {
          $msg = "<span class='success'>Anasayfa Güncelleme Başarılı.</span> ";
         
          return $msg;
        }else {
          $msg = "<span class='error'>Anasayfa Güncellenme Başarısız!</span> ";
          return $msg;
        } 
   
 }
       else{
        $query = "UPDATE tbl_anasayfa
            SET
            servisBaslik   = '$servisBaslik',
            servisIcerik1  = '$servisIcerik1',
            servisHref1    = '$servisHref1',
            servisIcerik2  = '$servisIcerik2',
            servisHref2    = '$servisHref2'
          WHERE anasayfaId = '1' ";

          $updated_row = $this->db->update($query);
          if ($updated_row) {
           $msg = "<span class='success'>Anasayfa Güncelleme Başarılı.</span> ";
          return $msg;
        }else {
          $msg = "<span class='error'>Anasayfa Güncellenme Başarısız!</span> ";
          return $msg; // return This Message 
        } 
 
        }
    }
 

   catch(Exception $e)    
    {
      die($e->getMessage());
       }
  }  
}


    

  public function delArsivById($id){
       $query = "SELECT * FROM tbl_fotoarsiv WHERE arsivId = '$id' ";
       $getData = $this->db->select($query);
         if ($getData) {
           while ($delImg = $getData->fetch_assoc()) {
           $dellink = $delImg['image'];
                  unlink($dellink);
            }
          }
       
               $delquery = "DELETE FROM tbl_fotoarsiv WHERE arsivId = '$id' ";
                $deldata = $this->db->delete($delquery);
            if ($deldata) {
              $msg = "<span class='success'>Arsiv Başarılı Silindi.</span> ";
            return $msg;
            }else {
              $msg = "<span class='error'>Arsiv Silinmedi!</span> ";
                 return $msg;
              } 
    }
    public function cateringUpdate($data)
    {
      $baslik      =  mysqli_real_escape_string($this->db->link, $this->fm->validation(strip_tags(addslashes($data['baslik'] ))));
      $altBaslik   =  mysqli_real_escape_string($this->db->link, strip_tags(addslashes($data['altBaslik'] )));
      $icerik      =  mysqli_real_escape_string($this->db->link, strip_tags(addslashes($data['icerik'] )));
      if ($baslik == "" || $altBaslik == "" || $icerik == "") {
      $msg = "<span class='error'>Alanlar Boş Olmamalı.</span> ";
          return $msg;
     }else {
    
     try{
     $query = "UPDATE tbl_catering
            SET
            baslik     = '$baslik',
            altBaslik  = '$altBaslik',
            icerik     = '$icerik'
           
          WHERE cateringId = '1' ";

          $updated_row = $this->db->update($query);
          if ($updated_row) {
           $msg = "<span class='success'>Catering Güncelleme Başarılı.</span> ";
          return $msg;
        }else {
          $msg = "<span class='error'>Catering Güncellenme Başarısız!</span> ";
          return $msg; // return This Message 
        } 
 
        } 
     
 
    
    catch(Exception $e)    
    {
      die($e->getMessage());
       }
  }  

}

      public function galeriCateringInsert($data, $file){

     $sira    =  mysqli_real_escape_string($this->db->link, $data['sira']);
     
 
     $permited = array('jpg','png','jpeg','gif');
     $file_name = $file['image']['name'];
     $file_size = $file['image']['size'];
     $file_temp = $file['image']['tmp_name'];
 
     $div = explode('.', $file_name);
     $file_ext = strtolower(end($div));
     $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
     $inserted_image = "upload/galericatering/".$unique_image;
     if ($sira == "") {
      $msg = "<span class='error'>Alanlar Boş Olamaz!</span> ";
          return $msg;
     }else{
          move_uploaded_file($file_temp, $inserted_image);
          $query = "INSERT INTO tbl_galericatering(sira, image) 
          VALUES ('$sira','$inserted_image')";  
 
          $inserted_row = $this->db->insert($query);
          if ($inserted_row) {
             header("refresh:2; url=cateringfoto.php");
          $msg = "<span class='success'>Foto Başarılı Eklendi.</span> ";
          return $msg; // return message 
        }else {
          $msg = "<span class='error'>Foto Eklenmedi!</span> ";
          return $msg; // return message 
        } 
     }


    }

    public function getItemById($table,$columnIdName,$id){
      $query = "SELECT * FROM $table WHERE $columnIdName ='$id' ";
             $result = $this->db->select($query);
             return $result;
   }

     public function ItemBySearch($table, $column, $search){
      $query = "SELECT * FROM $table WHERE $column LIKE '%$search%'";
     $result = $this->db->select($query);
     return $result;
  }

    public function cateringFotoUpdate($data, $file, $id){
 
    $sira   =  mysqli_real_escape_string($this->db->link, $data['sira'] );
   
     $permited = array('jpg','png','jpeg','gif');
     $file_name = $file['image']['name'];
     $file_size = $file['image']['size'];
     $file_temp = $file['image']['tmp_name'];
 
     $div = explode('.', $file_name);
     $file_ext = strtolower(end($div));
     $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
     $uploaded_image = "upload/galericatering/".$unique_image;
     if ($sira == "") {
     $msg = "<span class='error'>Alanlar Boş Olamaz!</span> ";
        return $msg;
     }else {
     if (!empty($file_name)) {
     if ($file_size > 1054589) {
      echo "<span class='error'>Image Boyutu 1MB'den Büyük Olamaz..1</span>";
     }elseif (in_array($file_ext, $permited) === false) {
      echo "<span class='error'> Sadece şu uzantılı dosyaları yükleyebilirsiniz : ".implode(',', $permited)."</span>";
      } else{
               $columnName=array('image');
               $columnCount = serialize($columnName);
               $tName='tbl_galericatering';
               $columnId='galericateringId';
              $this->delImageId($id,$columnCount,$tName,$columnId);

          move_uploaded_file($file_temp, $uploaded_image);
          $query = "UPDATE tbl_galericatering 
          SET 
          sira   = '$sira',
          image  = '$uploaded_image',
          
          WHERE galericateringId = '$id' ";
      
          $updated_row = $this->db->update($query);
          if ($updated_row) {
          $msg = "<span class='success'>Kayıt Başarıyla Güncellendi.</span> ";
          header("refresh:2; url=cateringfoto.php");
          return $msg;
        }else {
          $msg = "<span class='error'>Kayıt Güncellenmedi!</span> ";
          return $msg;
        } 
     }
 
      } else{
           $query = "UPDATE tbl_galericatering 
          SET 
          sira   = '$sira'
          WHERE galericateringId = '$id' ";
 
          $updated_row = $this->db->update($query);
          if ($updated_row) {
           $msg = "<span class='success'>Kayıt Başarıyla Güncellendi.</span> ";
          header("refresh:2; url=cateringfoto.php");
          return $msg;
        }else {
          $msg = "<span class='error'>Kayıt Güncellenmedi!</span> ";
          return $msg; // return This Message 
        } 
 
        }
    }
 
  }

    public function delItemById($table, $columnId, $column, $id){
       $query = "SELECT * FROM $table WHERE $columnId = '$id' ";
       $getData = $this->db->select($query);
         if ($getData) {
           while ($delImg = $getData->fetch_assoc()) {
           $dellink = $delImg[$column];
                  @unlink($dellink);
            }
          }
       
               $delquery = "DELETE FROM $table WHERE $columnId = '$id' ";
                $deldata = $this->db->delete($delquery);
            if ($deldata) {
              $msg = "<span class='success'>İsteğiniz Başarılı Silindi.</span> ";
            return $msg;
            }else {
              $msg = "<span class='error'>İsteğiniz Silinmedi!</span> ";
                 return $msg;
              } 
    }
   

 public function sliderInsert($data, $file){

      $sliderName    =  mysqli_real_escape_string($this->db->link, strip_tags(addslashes($data['sliderName'])));
      $sliderLink    =  mysqli_real_escape_string($this->db->link, strip_tags(addslashes($data['sliderLink'])));
      $sliderSira    =  mysqli_real_escape_string($this->db->link, $data['sliderSira']);
      $sliderDurum   =  mysqli_real_escape_string($this->db->link, $data['sliderDurum']);
 
     $permited = array('jpg','png','jpeg','gif');
     $file_name = $file['image']['name'];
     $file_size = $file['image']['size'];
     $file_temp = $file['image']['tmp_name'];
 
     $div = explode('.', $file_name);
     $file_ext = strtolower(end($div));
     $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
     $inserted_image = "upload/slider/".$unique_image;
     if ($sliderName == "" || $sliderLink == "" || $sliderSira == "" || $sliderDurum == "") {
      $msg = "<span class='error'>Alanlar Boş Olamaz!</span> ";
          return $msg;
     }else{
          move_uploaded_file($file_temp, $inserted_image);
          $query = "INSERT INTO tbl_slider(sliderName, image, sliderLink, sliderSira, sliderDurum) 
          VALUES ('$sliderName','$inserted_image','$sliderLink','$sliderSira','$sliderDurum')";  
 
          $inserted_row = $this->db->insert($query);
          if ($inserted_row) {
             header("refresh:2; url=slider.php");
          $msg = "<span class='success'>Slider Başarılı Eklendi.</span> ";
          return $msg; // return message 
        }else {
          $msg = "<span class='error'>Slider Eklenmedi!</span> ";
          return $msg; // return message 
        } 
     }


    }



    public function sliderUpdate($data, $file, $id){
 
    $sliderName   =  mysqli_real_escape_string($this->db->link, strip_tags(addslashes($data['sliderName'])));
    $sliderLink   =  mysqli_real_escape_string($this->db->link, strip_tags(addslashes($data['sliderLink'])));
    $sliderSira   =  mysqli_real_escape_string($this->db->link, $data['sliderSira'] );
    $sliderDurum  =  mysqli_real_escape_string($this->db->link, $data['sliderDurum']);
 
     $permited = array('jpg','png','jpeg','gif');
     $file_name = $file['image']['name'];
     $file_size = $file['image']['size'];
     $file_temp = $file['image']['tmp_name'];
 
     $div = explode('.', $file_name);
     $file_ext = strtolower(end($div));
     $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
     $uploaded_image = "upload/slider/".$unique_image;
     if ($sliderName == "" || $sliderLink == "" || $sliderSira == "" || $sliderDurum == "") {
     $msg = "<span class='error'>Alanlar Boş Olamaz!</span> ";
        return $msg;
     }else {
     if (!empty($file_name)) {
     if ($file_size > 1054589) {
      echo "<span class='error'>Image Boyutu 1MB'den Büyük Olamaz..1</span>";
     }elseif (in_array($file_ext, $permited) === false) {
      echo "<span class='error'> Sadece şu uzantılı dosyaları yükleyebilirsiniz : ".implode(',', $permited)."</span>";
      } else{
               $columnName=array('image');
               $columnCount = serialize($columnName);
               $tName='tbl_slider';
               $columnId='sliderId';
              $this->delImageId($id,$columnCount,$tName,$columnId);

          move_uploaded_file($file_temp, $uploaded_image);
          $query = "UPDATE tbl_slider
          SET 
          sliderName   = '$sliderName',
          image        = '$uploaded_image',
          sliderLink   = '$sliderLink',
          sliderSira   = '$sliderSira',
          sliderDurum  = '$sliderDurum'
          WHERE sliderId = '$id' ";
      
          $updated_row = $this->db->update($query);
          if ($updated_row) {
          $msg = "<span class='success'>Slider Başarıyla Güncellendi.</span> ";
          header("refresh:2; url=slider.php");
          return $msg;
        }else {
          $msg = "<span class='error'>Slider Güncellenmedi!</span> ";
          return $msg;
        } 
     }
 
      } else{
           $query = "UPDATE tbl_slider
          SET 
          sliderName   = '$sliderName',
          sliderLink   = '$sliderLink',
          sliderSira   = '$sliderSira',
          sliderDurum  = '$sliderDurum'
          WHERE sliderId = '$id' ";
 
          $updated_row = $this->db->update($query);
          if ($updated_row) {
           $msg = "<span class='success'>Slider Başarıyla Güncellendi.</span> ";
          header("refresh:2; url=slider.php");
          return $msg;
        }else {
          $msg = "<span class='error'>Slider Güncellenmedi!</span> ";
          return $msg; // return This Message 
        } 
 
        }
    }
 
  }

    

}