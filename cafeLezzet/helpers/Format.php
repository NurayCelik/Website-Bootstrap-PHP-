<?php 

class Format{

  public function validation($data){
  $data1 = trim($data);
  $data2 = stripcslashes($data1);
  $data3 = htmlspecialchars($data2);
  return $data3; // here i return this $data variable so we can use this.
 }
public function textShorten($text, $limit = 800){
	$text1 = $text. "";
	$text2 = substr($text1, 0, $limit);
	$text3 = $text2."...";
	return $text3; 
}	
 public function sqlonleme($data)
  {
    $data = str_replace("select","",$data);
    $data = str_replace("SELECT","",$data);
    $data = str_replace("*", "", $data);
    $data = str_replace("from","",$data);
    $data = str_replace("FROM","",$data);
    return $data;
  }


 public function formatDate($date){

 return date('m.d.Y - H:i:s', strtotime($date));
 }

 public function formatDateOnly($date){
 return date('m.d.Y', strtotime($date));
 }
 public function formatGetYearOnly($date){
 return date('Y', strtotime($date));
 }

public function seo($s) {
	$tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',' ',',','?');
	$eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','','');
	$s = str_replace($tr,$eng,$s);
	$s = strtolower($s);
	$s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
	$s = preg_replace('/\s+/', '-', $s);
	$s = preg_replace('|-+|', '-', $s);
	$s = preg_replace('/#/', '', $s);
	$s = str_replace('.', '', $s);
	$s = trim($s, '-');
	return $s;
}

function tcevir($tarih){
	$tr = explode("-",$tarih); 
	$tarih1 = $tr[2]."-".$tr[1]."-".$tr[0]; 
	return $tarih1;
}
}
?>
