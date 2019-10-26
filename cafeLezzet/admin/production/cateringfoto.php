<?php 

include 'header.php';
include '../../classes/Pages.php'; 
include '../../classes/Pagina.php'; ?>

<?php
 $fm    = new Format(); 
 $page  =  new Pages(); 
 $pg    = new Pagina(5);

 if (isset($_GET['delgaleri']) && isset($_GET['imagedeleted']) && isset($_GET['name'])) {
   $id = $_GET['delgaleri'];
   $columnName = $_GET['imagedeleted'];
   $columnIdName = $_GET['name'];
   $delarsiv = $page->delItemById("tbl_galericatering", $columnIdName, $columnName, $id);
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
              <input type="text" class="form-control" name="aranan" placeholder="Sıra No Giriniz...">
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
          <div class="x_panel"><br>
            <div class="x_title">
             <div align="left" class="col-md-6">
              <h2>Catering Foto Galeri<small>
              <?php
               if (isset($delarsiv)) {
                echo  $delarsiv;
               }
                 $kayitliGaleri = $pg->satirSayiBul("tbl_galericatering",'galeriCateringId');
                 $row = mysqli_fetch_array($kayitliGaleri,MYSQLI_NUM);
                 $kayitSayisi = $row[0];
                 if ($kayitSayisi)
                  echo 'Toplam <span style="color:#d9534f;">'.$kayitSayisi." </span>Foto Kayitli";
              ?>
            </small></h2><br>
              </div>
              <div align="right" class="col-md-6">
                <a href="cateringfotoadd.php"><button  class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i> Yeni Ekle</button></a>
              </div>
              <br>
              <br>
              <div class="clearfix"></div>
            </div>


            <div class="x_content">
              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                      <th width="" class="column-title text-center">No</th>
                      <th width="" class="column-title text-center">Catering İmage </th>
                      
                      <th width="" class="column-title text-center"></th>
                       <th width="" class="column-title text-center"></th>


                    </tr>
                  </thead>

                  

                    <?php 
                    
                    if(!isset($_POST['arama'])) {
                    
                    $takenGaleri = $pg->pagination_one('tbl_galericatering','galeriCateringId');
                    while($result=$takenGaleri->fetch_assoc())
                      {
                        if($result){
                   
                     ?>

                  <tbody>
                      <tr><div class="col-md-12 text-center">
                        <td class="text-center"><?php echo $result['sira']; ?></td>
                        <td class="text-center"><img width="200" height="100" src="<?php echo $result['image']; ?>"></td>
                        <td width="15%" class="text-right"><a href="cateringfotoedit.php?cateringFotoEdit=<?php echo $result['galeriCateringId']; ?>&columnIdName=galeriCateringId"><button type="submit" style="width:80px;" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i>Düzenle</button></a>
                        </td>
                        <td width="10%" class="text-left"><a onclick="return confirm('Are you sure to delete')"
                        href="?delgaleri=<?php echo $result['galeriCateringId'];?>&imagedeleted=image&name=galeriCateringId"><button type="submit" style="width:80px;" class="btn btn-danger btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Sil</button></a>
                      </td></div></tr>
                  </tbody>

                  <?php

  
                   }
                  }

                 ?>
 
                <tbody><tr><div class="col-md-12 text-center"><ul class="pagination ">
                <?php echo $pg->pagination_two(); ?>
                  
                </ul>
                 </div></tr></tbody>
                                            
                <?php                 

                }          
                else {
                       $aranan=$_POST['aranan'];

                      $bulunan=$pg->itemBySearch('tbl_galericatering','sira',$aranan); 

                       if($bulunan)
                        {
                          $i=0;
                          while($sonuc=$bulunan->fetch_assoc()){
                            $i++;
                            ?>
                   <tbody> <tr>

                        <td width="" class="text-center"><?php echo $sonuc['sira']; ?></td>
                        <td width="" class="text-center"><img width="200" height="100" src="<?php echo $sonuc['image']; ?>"></td>
                        
                        <td width="15%" class="text-right"><a href="cateringfotoedit.php?cateringFotoEdit=<?php echo $result['galeriCateringId']; ?>&columnIdName=galeriCateringId"><button type="submit" style="width:80px;" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i>Düzenle</button></a>
                        </td>
                        <td width="" class="text-center"><a onclick="return confirm('Are you sure to delete')"
                        href="?delgaleri=<?php echo $result['galeriCateringId'];?>&imagedeleted=image&name=galeriCateringId"><button style="width:70px;" class="btn btn-danger btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Sil</button></a></td>
                        
                      </tr>
                      <?php
                        }
                      }
               
                  
                    else
                    {
                      ?>
                      <tr>
                        <td width="" class="text-center"></td>
                       
                       <td width="100%" class="text-center">Aradığınız <renk style="color:red; font-size: 20px"><?php echo $aranan; ?></renk> bulunamadı! </td><td class="text-center"></td>
                        <td width="20%" class="text-center"><a href="cateringfoto.php"><button style="width:80px; height:35px;" class="btn btn-primary btn-xs"><i class="fa fa-undo" aria-hidden="true"></i> Geri Dön</button></a>
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
