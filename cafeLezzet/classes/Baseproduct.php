<?php 
$filepath= realpath(dirname(__FILE__));//http://localhost/shop olan url kısım. daha kolay ulaşılsın diye yazıldı. Yoksa admin kısım rahat classlara ulaşırken diğer bölümler erişemiyor.
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');
 
?>
 
<?php
class Baseproduct{
	private $db;  // I crate Property for Database Class
	private $fm; // I crate Property for Format Class  
 
    public function __construct(){
       $this->db   = new Database(); // I crate Object for Database Class
       $this->fm   = new Format(); // I crate Object for Format Class  
	}

	public function baseInsert($baseName,$catId){  // Our method with id 
	  	$baseName =  mysqli_real_escape_string($this->db->link, $this->fm->validation($baseName));
      $catId    =  mysqli_real_escape_string($this->db->link, $this->fm->validation($catId));
   
	 
	    if (empty($baseName)|| empty($catId)) { // validation for empty check 
	    	 $msg = "Baseproduct boş bırakılamaz!";
	    	 return $msg;
	    	}else {
	    		$query = "INSERT INTO tbl_base(baseName,catId) VALUES ('$baseName','$catId')"; // Insert Query 
	    		$baseinsert = $this->db->insert($query);
	    		if ($baseinsert) {
	    			$msg = "<span class='success'>Ana Ürün Başarılı Eklendi.</span> ";
            header("refresh:1; url=base.php");
	    			return $msg; // return Message 
	    		}else {
	    			$msg = "<span class='error'>Ana Ürün eklenmedi!</span> ";
	    			return $msg; // return Message 
	    		}
	    	}
	  }
  public function getAllCategory(){
        $query = "SELECT tbl_base.*, tbl_category.catName
               FROM tbl_base
               INNER JOIN tbl_category
                ON tbl_base.catId=tbl_category.catId 
               ORDER BY tbl_base.baseId DESC ";
        $result =  $this->db->select($query);
        return $result; 
  }
	  public function getAllBase(){ 
       	$query = "SELECT * FROM tbl_base ORDER BY baseId DESC";
         $result = $this->db->select($query);
         return $result; 
       }

    public function getBaseById($id){
     	$query = "SELECT * FROM tbl_base WHERE baseId ='$id' ";
         $result = $this->db->select($query);
         return $result;
     }


     public function baseUpdate($baseName, $catId, $id){
 
     
     $baseName =  mysqli_real_escape_string($this->db->link, $this->fm->validation($baseName));
     $catId    =  mysqli_real_escape_string($this->db->link, $this->fm->validation($catId));
     $id =  mysqli_real_escape_string($this->db->link, $id );
 
     if (empty($baseName) || empty($catId)) {  // Check empty filed 
    	 $msg = "<span class='error'>Alanlar bırakılamaz.</span> ";
    	 return $msg;
 
     }else {
	 $query = "UPDATE tbl_base
            SET
            baseName = '$baseName',
            catId    = '$catId'
            WHERE baseId = '$id' ";
            $update_row  = $this->db->update($query);
            if ($update_row) {
            	$msg = "<span class='success'>Ana Ürün Başarılı güncellendi.</span> ";
              header("refresh:1; url=base.php");
            	return $msg; // return message 
            }else {
            	$msg = "<span class='error'>Ana Ürün Güncellenmedi.</span> ";
    			return $msg; // return message 
            }
 
     }
 
 }

 public function delBaseById($id){
          $query = "DELETE FROM tbl_base WHERE baseId ='$id' ";
          $basedeldata = $this->db->delete($query);
          if ($basedeldata) {
            $msg = "<span class='success'>Base Başarılı Silindi.</span> ";
          return $msg; // return this message 
          }else {
            $msg = "<span class='error'>Base Silinmedi!</span> ";
                 return $msg; // return this message 
            }
    }
     public function baseBySearch($search){
    $query = "SELECT * FROM tbl_base WHERE baseName LIKE '%$search%' order by baseName";
     $result = $this->db->select($query);
     return $result;
  }
}

   
