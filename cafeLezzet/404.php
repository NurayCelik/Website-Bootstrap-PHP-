<?php

//güvenlik için
header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);

include "header.php";

?>
<section>

<style>
.notfound{}
.notfound h2{font-size: 80px;line-height: 130px;text-align: center;margin-top:30px} 

.notfound h2 span{display: block;color:red;font-size: 150px;} 
 .backColor{background-color: black; padding: 110px;}

 </style>
 <div class="main">
 	<div class="backColor">
 		
 	</div>
    <div class="content">       
     <div class="section group">
<div class="notfound"> 
  <h2> <span>404</span> Not Found</h2>
</div>
      </div>
       <div class="clear"></div>
    </div>
 </div>

<div class="clearfix"></div>
  
</section>    
<?php
include "footer.php";
?>