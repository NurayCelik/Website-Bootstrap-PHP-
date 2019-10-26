
<?php 
include '../lib/Session.php';

if(Session::get('adminName')==false){
	
	header("Location:production");

} else {

	//header("Location:production/login.php");

}

?>
