<?php 
include 'header.php';
include '../../classes/Pages.php';  
include_once '../../helpers/Format.php';

$fm    = new Format(); 
$page  = new Pages();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['guncelle'])) { 
       $images = serialize($_FILES);
       $updatedMainTop  = $page->mainMiddleUpdate($_POST, $images);
    }
  
?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Yonetim Paneli</h3>
        <?php  
        if(isset($mainTopUpdate))
        {
          echo $mainTopUpdate;
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
              <h2>Anasayfa Düzenleme <small>/ orta bölüm
                </small> </h2>
                <ul class="nav navbar-right panel_toolbox">
                </ul>
                <div class="clearfix"></div>
              </div>

              <div class="x_content">
                <?php 
                      
                    $getMainTop = $page->getAllTable("tbl_anasayfa");
                    if ($getMainTop) {
                     while ($value = $getMainTop->fetch_assoc()) { 
                     ?> 
                <form action="" method="POST" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                   <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Image<span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                  
                    <?php 
                    if (strlen($value['hakImage1'])>0) {?>

                    <img width="200"  src="<?php echo $value['hakImage1']; ?>">

                    <?php } else { ?>


                    <img width="200"  src="upload/anasayfa/logo-yok.png">


                    <?php } ?>

                    
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Image Seç<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                     <input type="file" id="first-name" required="required" name="images[]" class="form-control col-md-7 col-xs-12" multiple>
                    </div>

                </div>
                 <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Image<span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                  
                    <?php 
                    if (strlen($value['hakImage2'])>0) {?>

                    <img width="200"  src="<?php echo $value['hakImage2']; ?>">

                    <?php } else { ?>


                    <img width="200"  src="upload/anasayfa/logo-yok.png">


                    <?php } ?>

                    
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Image Seç<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                     <input type="file" id="first-name" required="required" name="images[]" class="form-control col-md-7 col-xs-12" multiple>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Başlık<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" id="first-name" required="required" name="hakBaslik" value="<?php echo $fm->validation($value['hakBaslik']); ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">İçerik<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" id="first-name" required="required" name="hakIcerik" value="<?php echo $fm->validation($value['hakIcerik']); ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Href1<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" id="first-name" required="required" name="hakhref" value="<?php echo $fm->validation($value['hakhref']); ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Kalite Image<span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                  
                    <?php 
                    if (strlen($value['kaliteImage'])>0) {?>

                    <img width="200"  src="<?php echo $value['kaliteImage']; ?>">

                    <?php } else { ?>


                    <img width="200"  src="upload/anasayfa/logo-yok.png">


                    <?php } ?>

                    
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Image Seç<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                     <input type="file" id="first-name" required="required" name="images[]" class="form-control col-md-7 col-xs-12" multiple>
                    </div>

                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Hızlı Image<span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                  
                    <?php 
                    if (strlen($value['hizliImage'])>0) {?>

                    <img width="200"  src="<?php echo $value['hizliImage']; ?>">

                    <?php } else { ?>


                    <img width="200"  src="upload/anasayfa/logo-yok.png">


                    <?php } ?>

                    
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Image Seç<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                     <input type="file" id="first-name" required="required" name="images[]" class="form-control col-md-7 col-xs-12" multiple>
                    </div>

                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Doğal Image<span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                  
                    <?php 
                    if (strlen($value['imageDogal'])>0) {?>

                    <img width="200"  src="<?php echo $value['imageDogal']; ?>">

                    <?php } else { ?>


                    <img width="200"  src="upload/anasayfa/logo-yok.png">


                    <?php } ?>

                    
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Image Seç<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                     <input type="file" id="first-name" required="required" name="images[]" class="form-control col-md-7 col-xs-12" multiple>
                    </div>

                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Kalite Başlik<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" id="first-name" required="required" name="kaliteBaslik" value="<?php echo $fm->validation($value['kaliteBaslik']); ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Kalite İçerik<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" id="first-name" required="required" name="kaliteIcerik" value="<?php echo $fm->validation($value['kaliteIcerik']); ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Hızlı Başlık<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" id="first-name" required="required" name="hizliBaslik" value="<?php echo $fm->validation($value['hizliBaslik']); ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Hızlı İçerik<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" id="first-name" required="required" name="icerikHizli" value="<?php echo $fm->validation($value['icerikHizli']); ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Doğal Başlık<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" id="first-name" required="required" name="dogalBaslik" value="<?php echo $fm->validation($value['dogalBaslik']); ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Doğal İçerik<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" id="first-name" required="required" name="icerikDogal" value="<?php echo $fm->validation($value['icerikDogal']); ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                
               

                <div align="right" class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                  <button type="submit" name="guncelle" class="btn btn-primary">Güncelle</button>
                </div>

              </form>

                <?php } }?>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- /page content -->



<?php include 'footer.php'; ?>
