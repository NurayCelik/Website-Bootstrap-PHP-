
<?php include 'header.php';?>
<?php include '../../classes/Category.php';  ?>  
<?php include_once '../../helpers/Format.php';?>
 
<?php 
$fm = new Format(); // Crate Product Class Object 
$cat =  new Category();  // Create Category Class object
 if (isset($_GET['delcat'])) {
 $id = $_GET['delcat']; // get this delcat Id and take this on $id variable 
 $delCat = $cat->delCatById($id);//With Category class object i access method with id  
 
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
              <input type="text" class="form-control" name="aranan" placeholder="Anahtar Kelime Giriniz...">
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
              <h2>Yönetim Paneli<small>
                <?php
               
               if (isset($delCat)) {
                echo  $delCat;
               }
              ?>    </small></h2><br>
              </div>
              <div align="right" class="col-md-6">
                <a href="catadd.php"><button  class="btn btn-danger "><i class="fa fa-plus" aria-hidden="true"></i> Yeni Ekle</button></a>
              </div>
              <div class="clearfix"></div>
            </div>


            <div class="x_content">
              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">

                      <th width="100" class="column-title text-center">Sıra No</th>
                      <th width="100" class="column-title text-center">Kategori Ad </th>
                      <th class="column-title text-center"></th>
                      <th class="column-title text-center"></th>
                      <th width="80" class="column-title"></th>
                      <th width="80" class="column-title"></th>


                    </tr>
                  </thead>

                  <tbody>
                 
                    <?php
                    if(!isset($_POST['arama'])) {

                     
            
                   $getCat = $cat->getAllCat();
                      if($getCat)
                      {
                        $i =0;
                        while($result=$getCat->fetch_assoc()){
                          $i++;
                      
                    ?>


                      <tr>
                        <td class="text-center"><?php echo $i; ?></td>
                        <td class="text-center"><?php echo $fm->validation($result['catName']); ?></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        
                        <td class="text-right"><a href="catedit.php?catedit=<?php echo $result['catId']; ?>"><button style="width:80px;" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Düzenle</button></a></td>
                        
                        <td class="text-left"><a onclick="return confirm('Are you sure to delete')" href="?delcat=<?php echo $result['catId'];?>"><button style="width:80px;" class="btn btn-danger btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Sil</button></a></td>

                      </tr>

                      <?php } }
                    }
                   
                    else
                    {

                    $aranan=$_POST['aranan'];

                      $bulunan=$cat->catBySearch($aranan); 

                       if($bulunan)
                        {
                          $i=0;
                          while($sonuc=$bulunan->fetch_assoc()){
                            $i++;
                            ?>

                       <tr>
                        <td class="text-center"><?php echo $i; ?></td>
                        <td class="text-center"><?php echo $fm->validation($sonuc['catName']); ?></td>
                        <td class="text-center"></td>
                        
                        
                        <td class="text-right"><a href="catedit.php?catedit=<?php echo $sonuc['catId']; ?>"><button style="width:80px;" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Düzenle</button></a></td>
                        <td class="text-center"><a  onclick="return confirm('Are you sure to delete')" href="?delcat=<?php echo $sonuc['catId'];?>"><button style="width:70px;" class="btn btn-danger btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Sil</button></a></td>
                        <td class="text-left"><a href="catlist.php"><button style="width:60px;" class="btn btn-info btn-sm"><i class="fa fa-undo" aria-hidden="true"></i> Geri</button></a></td>
                     
                      </tr>
                      <?php
                        }
                    }
                    else
                    {
                      ?>
                      <tr>
                      <td  class="text-center"></td>
                      <td width="100%" class="text-center">Aradığınız <renk style="color:red; font-size: 20px"><?php echo $aranan; ?></renk> bulunamadı! </td>
                      
                      <td width="100%" class="text-center"></td>
                      <td width="100%" class="text-center"></td>
                      <td width="100%" class="text-center"></td>
                      <td width="100%" class="text-center"><a href="catlist.php"><button style="width:80px; height:35px;" class="btn btn-primary btn-sm"><i class="fa fa-undo" aria-hidden="true"></i> Geri Dön</button></a></td>
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
