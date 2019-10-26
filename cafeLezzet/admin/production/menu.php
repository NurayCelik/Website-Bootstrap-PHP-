<?php 

include 'header.php';
include '../../classes/Brand.php';
include_once '../../helpers/Format.php';

$brand = new Brand();
$fm = new Format();
?>

<?php
 if (isset($_GET['delmenu'])) {
   $id = $_GET['delmenu'];
   $deletemenu = $brand->delMenuById($id);
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
              <h2 >Menü İşlemleri <small>
                <?php
                 if (isset($delmenu)) {
                  echo  $delmenu;
                 }
                ?></small></h2><br>
              </div>
              <div align="right" class="col-md-6">
                <a href="menuadd.php"><button  class="btn btn-danger "><i class="fa fa-plus" aria-hidden="true"></i> Yeni Ekle</button></a>
              </div>
              <div class="clearfix"></div>
            </div>


            <div class="x_content">
              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">

                      <th class="column-title text-center">Menü Ad </th>
                      <th width="200" class="column-title text-center">Menu İmage</th>
                      <th class="column-title text-center">Menü Sıra </th>
                      <th class="column-title text-center">Menü Durum </th>
                      <th width="80" class="column-title"></th>
                      <th width="80" class="column-title"></th>


                    </tr>
                  </thead>

                  <tbody>

                    <?php
                    if(!isset($_POST['arama'])) {

                     $getBrand = $brand->getAllMenu(); // Create method in Product Class 
                     if ($getBrand) {
                      $i = 0;
                    while ($result = $getBrand->fetch_assoc() ) {
                      $i++;
                   ?>


                      <tr>

                        <td class="text-center"><?php echo $fm->validation($result['menuName']); ?></td>
                        <td class="text-center"><img width="200" height="100" src="<?php echo $result['image']; ?>"></td>
                        <td class="text-center"><?php echo $result['menuSira']; ?></td>

                        <td class="text-center"><?php 

                         if ($result['menuDurum']=="1") {

                          echo "AKTİF";
                        } else {

                         echo "PASİF";
                    }

                        ?></td>
                        
                        <td class="text-center"><a href="menuedit.php?menuedit=<?php echo $result['menuId']; ?>"><button style="width:80px;" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Düzenle</button></a></td>
                        
                        <td class="text-center"><a href="?delmenu=<?php echo $result['menuId']; ?>"><button style="width:80px;" class="btn btn-danger btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Sil</button></a></td>

                      </tr>

                      <?php  }  } 
                      }
                   
                    else
                    {
                      $aranan=$_POST['aranan'];

                      $bulunan=$brand->menuBySearch($aranan); 

                       if($bulunan)
                        {
                          $i=0;
                          while($sonuc=$bulunan->fetch_assoc()){
                            $i++;
                            ?>
                        <tr>

                          <td width="10%" class="text-center"><?php echo $fm->validation($sonuc['menuName']); ?></td>
                          <td class="text-center"><?php echo $sonuc['image']; ?></td>
                          <td class="text-center"><?php echo $sonuc['menuSira']; ?></td>

                          <td class="text-center"><?php 

                            if($sonuc['menuDurum']=="1") {

                             echo "AKTİF";
                           } else {

                            echo "PASİF";
                          }

                          ?></td>

                          <td class="text-center"><a href="menuedit.php?menuedit=<?php echo $sonuc['menuId']; ?>"><button style="width:80px;" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Düzenle</button></a></td>

                          <td class="text-center"><a href="?delmenu=<?php echo $sonuc['menuId']; ?>"><button style="width:80px;" class="btn btn-danger btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Sil</button></a></td>

                        </tr>
                        <?php
                        }
                    }
                    else
                    {
                      ?>
                      <tr>
                      <td width="80" class="text-center"></td>
                      <td width="100%" class="text-center">Aradığınız <renk style="color:red; font-size: 20px"><?php echo $aranan; ?></renk> bulunamadı! </td>
                      <td width="" class="text-center"></td>
                      <td width="" class="text-center"></td>
                      <td width="" class="text-center"></td>
                      <td width="" class="text-center"><a href="menu.php"><button style="width:80px; height:35px;" class="btn btn-primary btn-sm"><i class="fa fa-undo" aria-hidden="true"></i> Geri Dön</button></a>
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
