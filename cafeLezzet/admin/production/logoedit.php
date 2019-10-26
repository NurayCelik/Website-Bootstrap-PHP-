<?php 
include 'header.php';
include '../../classes/Brand.php';  

 $brand =  new Brand();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logoduzenle'])) {
      $images = serialize($_FILES);
      $updateLogo = $brand->logoUpdate($images);
    }
   
     
?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Yönetim Paneli</h3>
        <?php 
        if(isset($updateLogo))
        {
          echo $updateLogo;
        }
        
        ?>
      </div>

    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Site Logo Güncelle<small>
                

                </small> </h2>
                <ul class="nav navbar-right panel_toolbox">




                </ul>
                <div class="clearfix"></div>
              </div>

              <div class="x_content">
               <form action="" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  <?php 
                      
                    $getSite = $brand->getSiteInfo();
                    if ($getSite) {
                     while ($value = $getSite->fetch_assoc()) { 
                     ?> 
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Logo Small<br>313x103 px<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                  
                    <?php 
                    if (strlen($value['LogoMd'])>0) {?>

                    <img width="200"  src="<?php echo $value['LogoMd']; ?>">

                    <?php } else {?>


                    <img width="200"  src="upload/logo-yok.png">


                    <?php } ?>

                    
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Logo Seç-small<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="first-name"  name="resimler[]"  class="form-control col-md-7 col-xs-12" multiple >
                  </div>
                </div>

                 <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Logo Large<br>500x210 px<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                    <?php 
                    if (strlen($value['LogoLg'])>0) {?>

                    <img width="200"  src="<?php echo $value['LogoLg']; ?>">

                    <?php } else {?>


                    <img width="200"  src="upload/logo-yok.png">


                    <?php } ?>

                    
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Logo Seç-large<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="first-name"  name="resimler[]"  class="form-control col-md-7 col-xs-12" multiple >
                  </div>
                </div>

                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="logoduzenle" class="btn btn-primary">Güncelle</button>
                </div>

              </form>
          <?php
                  }
                }
                
                ?>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- /page content -->



<?php include 'footer.php'; ?>
