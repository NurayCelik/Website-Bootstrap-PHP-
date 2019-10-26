<?php 

include 'header.php';
include '../../classes/Brand.php'; ?> 

<?php
 $fm = new Format(); 
 $brand =  new Brand(); 

 if (isset($_GET['delslider'])) {
   $id = $_GET['delslider'];
   $delslider = $brand->delSliderById($id);
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
              <h2 >Slider Liste <small>
              <?php
               if (isset($delslider)) {
                echo  $delslider;
               }
              ?>
            </small></h2><br>
              </div>
              <div align="right" class="col-md-6">
                <a href="slideradd.php"><button  class="btn btn-danger "><i class="fa fa-plus" aria-hidden="true"></i> Yeni Ekle</button></a>
              </div>
              <div class="clearfix"></div>
            </div>


            <div class="x_content">
              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                      <th width="80"  class="column-title text-center">No</th>
                      <th width="250" class="column-title text-center">Slider İmage </th>
                      <th width="120" class="column-title text-center">Slider Ad </th>
                      <th width="100" class="column-title text-center">Slider Sıra </th>
                      <th width="300" class="column-title text-center">Slider Durum </th>
                      <th width="60" class="column-title text-center"></th>
                      <th width="" class="column-title text-center"></th>
                      <th width="60" class="column-title text-center"></th>
                      


                    </tr>
                  </thead>

                  <tbody>

                    <?php 
                    
                    if(!isset($_POST['arama'])) {
                    
                    $brand = new Brand();
                    $takenSlider = $brand->getAllSlider();
                    if($takenSlider)
                    {
                      $i=0;
                      while($result=$takenSlider->fetch_assoc())
                      {
                        $i++;
                   
                      ?>


                      <tr>
                        <td class="text-center"><?php echo $i; ?></td>
                        <td class="text-center"><img width="200" height="100" src="<?php echo $result['image']; ?>"></td>
                        <td class="text-center"><?php echo $fm->validation($result['sliderName']); ?></td>
                        <td class="text-center"><?php echo $fm->validation($result['sliderSira']); ?></td>
                        <td class="text-center"><?php 

                          if($result['sliderDurum']=="1") {

                           echo "AKTİF";
                         } else {

                          echo "PASİF";
                        }

                        ?></td>
                        <td width="" class="text-center"></td>
                        <td width="10%" class="text-right"><a href="slideredit.php?slideredit=<?php echo $result['sliderId']; ?>"><button type="submit" style="width:80px;" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i>Düzenle</button></a>
                        </td>
                   
                        <td width="10%" class="text-left"><a onclick="return confirm('Are you sure to delete')"
                        href="?delslider=<?php echo $result['sliderId']; ?>"><button type="submit" style="width:80px;" class="btn btn-danger btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Sil</button></a>
                      </td>

                      </tr>

                      <?php 
                            } 
                          }
                        } 
                    
                       else
                    {
                       $aranan=$_POST['aranan'];

                      $bulunan=$brand->sliderBySearch($aranan); 

                       if($bulunan)
                        {
                          $i=0;
                          while($sonuc=$bulunan->fetch_assoc()){
                            $i++;
                            ?>
                               <tr>
                        <td width="" class="text-center"><?php echo $i; ?></td>
                        <td width="" class="text-center"><img width="200" height="100" src="<?php echo $sonuc['image']; ?>"></td>
                        <td width="" class="text-center"><?php echo $fm->validation($sonuc['sliderName']); ?></td>
                        <td width=""class="text-center"><?php echo $fm->validation($sonuc['sliderSira']); ?></td>
                        <td width="" class="text-center"><?php 

                          if($sonuc['sliderDurum']=="1") {

                           echo "AKTİF";
                         } else {

                          echo "PASİF";
                        }

                        ?>
                          
                        </td>
                        <td width="" class="text-right"><a href="slideredit.php?slideredit=<?php echo $sonuc['sliderId']; ?>"><button style="width:80px;" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Düzenle</button></a></td>
                        
                        <td width="" class="text-center"><a  onclick="return confirm('Are you sure to delete')" href="?delslider=<?php echo $sonuc['sliderId'];?>"><button style="width:70px;" class="btn btn-danger btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Sil</button></a></td>
                        
                        <td width="" class="text-left"><a href="slider.php"><button style="width:70px;" class="btn btn-info btn-sm"><i class="fa fa-undo" aria-hidden="true"></i> Geri</button></a></td>
                     
                      </tr>
                      <?php
                        }
                    }
                    else
                    {
                      ?>
                      <tr>
                        
                        <td width="" class="text-center"></td>
                        <td width="" class="text-center"></td>
                        <td width="100%" class="text-center">Aradığınız <renk style="color:red; font-size: 20px"><?php echo $aranan; ?></renk> bulunamadı! </td><td class="text-center"></td>
                        <td width="" class="text-center"></td>
                        <td class="text-center"></td>
                        <td width="20%" class="text-center"><a href="slider.php"><button style="width:80px; height:35px;" class="btn btn-primary btn-xs"><i class="fa fa-undo" aria-hidden="true"></i> Geri Dön</button></a>
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
