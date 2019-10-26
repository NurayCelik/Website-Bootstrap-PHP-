<?php 
$filepath= realpath(dirname(__FILE__));//http://localhost/shop olan url kısım. daha kolay ulaşılsın diye yazıldı. Yoksa admin kısım rahat classlara ulaşırken diğer bölümler erişemiyor.

include_once($filepath.'/../lib/Session.php'); 
Session::checkLogin();

include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');

?>

<?php
class Adminlogin {

	private $db;  // Database class property 
	private $fm;  // Format class property 
    
    public function __construct() { 
    	$this->db   = new Database(); // Object for Database Class
		$this->fm   = new Format();   // Object for Format Class
    }
    public function adminLogin($adminUser,$adminPass){
    	$adminUser = $this->fm->sqlonleme($this->fm->validation($adminUser)); //here i with this format class object i access the method
		$adminPass = $this->fm->sqlonleme($this->fm->validation($adminPass)); //here i with this format class object i access the method
		$adminUser =  mysqli_real_escape_string($this->db->link, stripslashes($adminUser )); // our login filed adminUser 
		$adminPass =  mysqli_real_escape_string($this->db->link, stripslashes($adminPass )); // our login filed adminPass 

		if (empty($adminUser) || empty($adminPass)) {
    	 $loginmsg = "Kayıt Bulunmadı!"; // I take one variable as $loginmsg 
    	 return $loginmsg;
    	}
        else {
        $query = "SELECT adminId, adminName,adminUser,adminEmail,level,adminPass,image  FROM tbl_admin WHERE adminUser=? ";
    	$result = $this->db->selectLogin($query,$adminUser,$adminPass);
        if ($result!= false) {
    	$value = $result->fetch_array(MYSQLI_ASSOC);
        $result->close();

        $realSifre = password_verify($adminPass, $value['adminPass']);

        if($realSifre !=false && $adminUser==$value['adminUser']){
          
           
                Session::set("adminlogin", true);
                Session::set("logget", time());
                Session::set("adminId", $value['adminId']);
    			Session::set("yetki", $value['level']);
    			Session::set("adminUser", $value['adminUser']);
    			Session::set("adminName", $value['adminName']);
                Session::set("image", $value['image']);
    			header("Location:index.php");
            
        		
            }
            else{
               
               $loginmsg = "Kayıt Bulunmadı!";
                return $loginmsg; // here we return this message we have to get this msg letter for display this text.
            }
        }
            else{
               
               $loginmsg = "Kayıt Bulunmadı!";
    			return $loginmsg; // here we return this message we have to get this msg letter for display this text.
    		}
            

}
}

}


   

 ?>