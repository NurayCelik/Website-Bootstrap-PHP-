<?php include 'header.php';?>
<?php include '../../classes/Product.php';  ?>  
<?php include '../../classes/Baseproduct.php';  ?>  
<?php include_once '../../helpers/Format.php';?>
<?php include '../../classes/Pagina.php';  ?>  
 
<?php
$pg = new Pagina(10);
$prod = new Product(); // Crate Product Class Object 
$fm = new Format(); // Crate Product Class Object 
?>


<?php
 if (isset($_GET['delproduct'])) {
   $id = $_GET['delproduct'];
   $delpro = $prod->delPorById($id);
} 
?>






<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">


    </div>

    <div class="col-md-12">
      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

          <form action="" method="POST">
            <div class="input-group">
              <input type="text" class="form-control" name="aranan" placeholder="Ürün Adı Ara...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit" name="arama">Ara!</button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>


    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
             <div align="left" class="col-md-6">
              <h2 >Yönetim Paneli <small>
               <?php
                 if (isset($delpro)) {
                  echo  $delpro;
                 }
                 $kayitliUrun = $pg->satirSayiBul("tbl_product","productId");
                 $row = mysqli_fetch_array( $kayitliUrun,MYSQLI_NUM);
                 $kayitSayisi = $row[0];
                 if ($kayitSayisi)
                  echo 'Toplam <span style="color:#d9534f;">'.$kayitSayisi." </span>Ürün Kayitli";
                ?>
                </small></h2><br>
              </div>
              <div align="right" class="col-md-6">
                <a href="urunekle.php"><button  class="btn btn-danger "><i class="fa fa-plus" aria-hidden="true"></i> Yeni Ekle</button></a>
              </div>
              <div class="clearfix"></div>
            </div>


            <div class="x_content">
              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                      <th width="5" class="column-title text-center">Sıra</th>
                      <th width="20" class="column-title text-center">Ürün Ad</th>
                      <th width="20" class="column-title text-center">Ana Ürün</th>
                      <th width="10" class="column-title text-center">Kategori</th>
                      <th width="40" class="column-title text-center">Açıklama</th>
                      <th width="10" class="column-title text-center">Fiyat</th>
                      <th width="40" class="column-title text-center">İmage</th>
                      <th width="5" class="column-title text-center">Tip</th>
                      <th width="60" class="column-title text-center"></th>
                      <th width="60" class="column-title text-center"></th>
                      <th width="60" class="column-title text-center"></th>
                      <th width="60" class="column-title text-center"></th>


                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    if(!isset($_POST['arama'])) {
                        $a="tbl_product";
                        $b="productId";
                        $c="tbl_category";
                        $d="catName";
                        $e="catId";
                        $f="tbl_base";
                        $g="baseName";
                        $h="baseId";
                     $getProd = $pg->pagination_product($a,$b,$c,$d,$e,$f,$g,$h); // Create method in Product Class 
                     if ($getProd) {
                      $i = 0;
                    while ($result = $getProd->fetch_assoc() ) {
                      $i++;
                   ?>

                    
                      <tr>

                        <td width="5%" class="text-center"><?php echo $i; ?></td>
                        <td width="10%" class="text-center"><?php echo $fm->validation($result['productName']);?></td>
                        <td width="10%" class="text-center"><?php echo $fm->validation($result['baseName'],15);?></td>
                        <td width="10%" class="text-center"><?php echo $fm->validation($result['catName']);?></td>
                        <td width="10%" class="text-center"><?php echo $fm->validation($fm->textShorten($result['body'], 30));?></td>
                        <td width="5%" class="text-center"><?php echo $result['price'];?> ₺</td>
                        <td width="10%" class="text-center"><img src="<?php echo $result['image'];?>" class="text-center" height="50px;"></td>
                        <td width="10%" class="text-center">
                          <?php if ($result['type'] == 0) { 
                            echo "Öne Çıkan";
                              }else {
                                echo "Ayrıntı";
                           } 
                         ?>
                        </td>
                        <td width="5%" class="text-center"></td>
                        <td width="5%" class="text-center"></td>
                        
                        <td width="15%" class="text-right"><a href="urunedit.php?urunedit=<?php echo $result['productId']; ?>"><button type="submit" style="width:80px;" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i>Düzenle</button></a>
                        </td>
                   
                        <td width="15%" class="text-center"><a onclick="return confirm('Are you sure to delete')"
                        href="?delproduct=<?php echo $result['productId']; ?>"><button type="submit" style="width:80px;" class="btn btn-danger btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Sil</button></a>
                      </td>
                        </tr></tbody>
                   
                      <?php

  
 }
}

?>
 
<tbody><tr><div class="col-md-12 text-center"><ul class="pagination ">
<?php echo $pg->pagination_two(); ?>
  
</ul>
                      </div></tr></tbody> 
                            
  <?php                 

                }else
                    {
                       $aranan=$_POST['aranan'];

                      $bulunan=$prod->productInnerSearch($aranan); 

                       if($bulunan)
                        {
                          $i=0;
                          while($sonuc=$bulunan->fetch_assoc()){
                            $i++;
                            ?>
                          <tbody><tr>

                        <td width="5%" class="text-center"><?php echo $i; ?></td>
                        <td width="10%" class="text-center"><?php echo $fm->validation($sonuc['productName'],15);?></td>
                        <td width="7%" class="text-center"><?php echo $fm->validation($sonuc['baseName'],15);?></td>
                        <td width="7%" class="text-center"><?php echo $fm->validation($sonuc['catName']);?></td>
                        <td width="10%" class="text-center"><?php echo $fm->validation($fm->textShorten($sonuc['body'], 30));?></td>
                        <td width="5%" class="text-center"><?php echo $sonuc['price'];?> ₺</td>
                        <td width="5%" class="text-center"><img src="<?php echo $sonuc['image'];?>" class="text-center" height="50px;"></td>
                        <td width="10%" class="text-center">
                          <?php if ($sonuc['type'] == 0) { 
                            echo "Öne Çıkan";
                              }else {
                                echo "Ayrıntı";
                           } 
                         ?>
                        </td>
                        <td width="10%" class="text-center"></td>
                        <td width="10%" class="text-right"><a href="urunedit.php?urunedit=<?php echo $sonuc['productId']; ?>"><button style="width:80px;" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Düzenle</button></a></td>
                        <td width="10%" class="text-center"><a  onclick="return confirm('Are you sure to delete')" href="?delproduct=<?php echo $sonuc['productId'];?>"><button style="width:70px;" class="btn btn-danger btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Sil</button></a></td>
                        <td width="10%" class="text-left"><a href="urun.php"><button style="width:70px;" class="btn btn-info btn-sm"><i class="fa fa-undo" aria-hidden="true"></i> Geri</button></a></td>
                     
                      </tr>
                      <?php
                        }
                    }
                    else
                    {
                      ?>
                      <tr>
                       <td width="5%" class="text-center"></td>
                      <td width="5%" class="text-center"></td>
                      <td width="5%" class="text-center"></td>
                      <td width="200" class="text-center"></td>
                      <td width="100%" class="text-center">Aradığınız <renk style="color:red; font-size: 20px"><?php echo $aranan; ?></renk> bulunamadı! </td>
                     
                      <td width="" class="text-center"></td>
                      <td width="" class="text-center"></td>
                      <td width="" class="text-center"></td>
                      <td width="" class="text-center"></td>
                       <td width="" class="text-center"></td>
                      <td width="" class="text-center"></td>
                      <td width="20%" class="text-center"><a href="urun.php"><button style="width:80px; height:35px;" class="btn btn-primary btn-xs"><i class="fa fa-undo" aria-hidden="true"></i> Geri Dön</button></a>
                      </td>
                      </tr>
                    <?php
                    }
                  }
                  ?>
                    
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->



  <?php include 'footer.php'; ?>
