<?php 

$filepath= realpath(dirname(__FILE__));//http://localhost/shop olan url kısım. daha kolay ulaşılsın diye yazıldı. Yoksa admin kısım rahat classlara ulaşırken diğer bölümler erişemiyor.
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');
 ?>

<?php
 class Category{
	private $db; // Create one Property for Database Class
	private $fm;// Create one Property for Format Class
 
    public function __construct(){
       $this->db   = new Database(); // Create one Object for Database Class
       $this->fm   = new Format(); // Create one Property for Object Class
	}
	 public function catInsert($catName){                
    $catName = $this->fm->validation($catName); // Validation for special Characters             
    $catName =  mysqli_real_escape_string($this->db->link, $catName ); // Validation for mysqli   
    if (empty($catName)) {
    	 $msg = "Kategori Boş Geçilmez!"; // validation for empty 
    	 return $msg;
    	}else {
        $query = "INSERT INTO tbl_category(catName) VALUES ('$catName')";  
        $catinsert = $this->db->insert($query);
    	 if ($catinsert) {
             $msg = "<span class='success'>Kategori başarıyla eklendi.</span> ";
              header("refresh:1; url=catlist.php"); // I create one span class
                 return $msg; // Here i return this Message 
            		}else {
             $msg = "<span class='error'>Kategori Eklenmedi!</span> "; // I create one span class as error
            	 return $msg; // Here i return this Message // else its will insert data in to the database with insert query.
             }
}
}

public function getAllCat(){
         $query = "SELECT * FROM tbl_category ORDER BY catId DESC";
         $result = $this->db->select($query);
         return $result;
     }

     public function getCatById($id){
        $query = "SELECT * FROM tbl_category WHERE catId ='$id' ";
         $result = $this->db->select($query);
         return $result;
     }

     public function catUpdate($catName, $id){
     $catName = $this->fm->validation($catName);
     $catName =  mysqli_real_escape_string($this->db->link, $catName );
     $id =  mysqli_real_escape_string($this->db->link, $id );
     if (empty($catName)) {
         $msg = "<span class='error'>Category Field Must Not be empty.</span> ";
         return $msg;
     }else {
            $query = "UPDATE tbl_category
            SET
            catName = '$catName'
            WHERE catId = '$id' ";
            $update_row  = $this->db->update($query);
            if ($update_row) {
                $msg = "<span class='success'>Kategori Güncelleme Başarılı.</span> ";
                header("refresh:2; url=catlist.php");
                return $msg; //Return the Message 
            }else {
                $msg = "<span class='error'>Kategori Güncellenmedi!</span> ";
                return $msg; // Return the Message 
            }
     }
 
 }

public function delCatById($id){
          $query = "DELETE FROM tbl_category WHERE catId ='$id' ";
          $deldata = $this->db->delete($query);
          if ($deldata) {
            $msg = "<span class='success'>Category Deleted Successfully.</span> ";
          return $msg; // return this Message 
          }else {
            $msg = "<span class='error'>Category Not Deleted .</span> ";
                 return $msg; // return this Message 
            }
    }
    public function catBySearch($search){
    $query = "SELECT * FROM tbl_category WHERE catName LIKE '%$search%' order by catName";
     $result = $this->db->select($query);
     return $result;
  }
 
}
?>