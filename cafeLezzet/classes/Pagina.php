<?php 
$filepath= realpath(dirname(__FILE__));//http://localhost/shop olan url kısım. daha kolay ulaşılsın diye yazıldı. Yoksa admin kısım rahat classlara ulaşırken diğer bölümler erişemiyor.
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');
 
?>
 
<?php
class Pagina{
	private $db;  // I crate Property for Database Class
	private $fm; // I crate Property for Format Class  
 	
 public $numperpage=0;
 public $numrecords = 0;
 public $instance;
 public $page;
 public $start;
 public $numlinks=0;
 public $islem;
  
  public function __construct($numperpage) {
 		$this->db   = new Database(); // I crate Object for Database Class
      	$this->fm   = new Format(); // I crate Object for Format Class  
        $this->numperpage = $numperpage;
        $this->set_instance();
       
    }
     
	public function get_start(){
		return ($this->page -1) * $this->numperpage;
	}
	public function set_total($numrecords){
		$this->numrecords = $numrecords;
	}
	private function set_instance(){
		$this->page = (int) (!isset($_GET[$this->instance]) ? 1 : $_GET[$this->instance]); 
		$this->page = ($this->page == 0 ? 1 : $this->page < 0 ? 1 : $this->page);
	}
	public function get_limit(){
        	return "LIMIT ".$this->get_start().",$this->numperpage";
        }
	
  	public function get_limit_keys(){
        	return ['offset' => $this->get_start(), 'limit' => $this->numperpage];

    	}
    public function pagination_one($table,$column) { 
    	
	  $this->islem = $this->satirSayiBul($table, $column);
	  $row = mysqli_fetch_array($this->islem,MYSQLI_NUM);
       
      $this->numrecords = $row[0];
      $this->numlinks = ceil($this->numrecords/$this->numperpage);
      $this->page = isset($_GET['instance'])?(int)$_GET['instance'] : 1;
      if($this->page < 1) $this->page = 1; 
      if($this->page > $this->numrecords) $this->page = $this->numrecords;
      $start =($this->page-1) * $this->numperpage;
      $sonuc = $this->sayfaDuzenle("$table","$column", $this->get_start(), $this->numperpage);
 		return $sonuc;

 		}                
  

    public function pagination_two() { 

      $prev = (int)$this->page-1;
 	  $next = (int)$this->page + 1;

		$sayfa_goster = 7;

		$en_az_orta = ceil($sayfa_goster/2);
		$en_fazla_orta = ($this->numlinks+1) - $en_az_orta;

		$sayfa_orta = $this->page;
		if($sayfa_orta < $en_az_orta) $sayfa_orta = $en_az_orta;
		if($sayfa_orta > $en_fazla_orta) $sayfa_orta = $en_fazla_orta;

		$sol_sayfalar = round($sayfa_orta - (($sayfa_goster-1) / 2));
		$sag_sayfalar = round((($sayfa_goster-1) / 2) + $sayfa_orta); 

		if($sol_sayfalar < 1) $sol_sayfalar = 1;
		if($sag_sayfalar > $this->numlinks) $sag_sayfalar = $this->numlinks;

		$pagination="";
		if($en_az_orta>1)
		{

		if($this->page != 1) $pagination .= '<li><a href="'.$_SERVER['PHP_SELF'].'?instance=1">&lt;&lt; ilk sayfa</a></li>';
		if($this->page != 1) $pagination .= '<li><a href="'.$_SERVER['PHP_SELF'].'?instance='.($prev).'">&lt; önceki</a></li>';
		 
		for($s = $sol_sayfalar; $s <= $sag_sayfalar; $s++) {
		    if($this->page == $s) {
		        $pagination .=  '<li class="active secili"><a ">'.$s.'</a></li>';
		    } else{
		      $pagination .=  '<li><a href="'.$_SERVER['PHP_SELF'].'?instance='.$s.'" style="cursor:pointer;">'.$s.'</a></li>';
		      }
		}
		 
		if($this->page != $this->numlinks) $pagination .= ' <li><a href="?instance='.$next.'">sonraki &gt;</a></li>';
		if($this->page != $this->numlinks) $pagination .= ' <li><a href="?instance='.$this->numlinks.'">son sayfa &gt;&gt;</a></li>';
		}

		return $pagination;
}

	public function sayfaDuzenle($table, $column, $baslangic, $sayfaSayisi){
      $query = "SELECT * FROM $table order by $column DESC  limit $baslangic,$sayfaSayisi";
       $result = $this->db->select($query);
       return $result;
    }

    public function satirSayiBul($table, $column){
      $query = "SELECT COUNT($column) FROM $table";
       $result = $this->db->select($query);
       return $result;
    }
     public function arsivBySearch($search){
      $query = "SELECT * FROM  tbl_fotoarsiv WHERE arsivId LIKE '%$search%'";
     $result = $this->db->select($query);
     return $result;
  }
   public function itemBySearch($table, $column,$search){
      $query = "SELECT * FROM  $table WHERE $column LIKE '%$search%'";
     $result = $this->db->select($query);
     return $result;
  }

  public function getAllProduct($firstTable, $firstColumn, $secondTable,$secondColumn, $second2Column,$thirdTable,$thirdColumn,$third2Column, $baslangic, $sayfaSayisi){
        $query = "SELECT $firstTable.*, $secondTable.$secondColumn, $thirdTable.$thirdColumn
               FROM $firstTable
               INNER JOIN $thirdTable
               ON $firstTable.$third2Column = $thirdTable.$third2Column
               INNER JOIN $secondTable
               ON $firstTable.$second2Column = $secondTable.$second2Column
               ORDER BY $firstTable.$firstColumn DESC limit $baslangic,$sayfaSayisi";
               
        $result =  $this->db->select($query);
        return $result; 
  }
   public function pagination_product($firstTable, $firstColumn, $secondTable,$secondColumn, $second2Column,$thirdTable,$thirdColumn,$third2Column) { 
    	
    	
	  $this->islem = $this->satirSayiBul($firstTable, $firstColumn);
	  if($row = mysqli_fetch_array($this->islem,MYSQLI_NUM)){

       
      $this->numrecords = $row[0];
      @$this->numlinks = ceil($this->numrecords/$this->numperpage);
      $this->page = isset($_GET['instance'])?(int)$_GET['instance'] : 1;
      if($this->page < 1) $this->page = 1; 
      if($this->page > $this->numrecords) $this->page = $this->numrecords;
      $start =($this->page-1) * $this->numperpage;
      $sonuc = $this->getAllProduct($firstTable, $firstColumn, $secondTable,$secondColumn, $second2Column,$thirdTable,$thirdColumn,$third2Column, $this->get_start(), $this->numperpage);
 		return $sonuc;

 		} 
 		else 
 			$msg = "Hata";
 		return $msg;
 		}               
}
    