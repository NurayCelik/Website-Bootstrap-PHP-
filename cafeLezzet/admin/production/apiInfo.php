<?php 
include 'header.php';
include '../../classes/Brand.php';  
include_once '../../helpers/Format.php';

$fm    = new Format(); 
$brand =  new Brand();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['guncelle'])) {
        $updateApi = $brand->ApiUpdate($_POST);
    }
  
?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Yönetim Paneli</h3>
         <?php 
            if(isset($updateApi))
            {
              echo $updateApi;
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
              <h2>Api Güncelle<small>
                </small> </h2>
                <ul class="nav navbar-right panel_toolbox">
                </ul>
                <div class="clearfix"></div>
              </div>

              <div class="x_content">
                <?php 
                      
                  $getApi = $brand->getApiSocial();
                  if($getApi){
                    while ($value = $getApi->fetch_assoc()) { 
                ?> 
                <form action="" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Google Recapctha Api<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" value="<?php echo $fm->validation($value['recapctha']); ?>" name="recapctha" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Merkez Goole Map Api <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name"  name="mermapApi" value="<?php echo $fm->validation($value['mermapApi']); ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Şube Google Map Api <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name"  name="subemapApi" value="<?php echo $fm->validation($value['subemapApi']); ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Google Analystic <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name"  name="goanalystic" value="<?php echo $fm->validation($value['goanalystic']); ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="guncelle" class="btn btn-primary">Güncelle</button>
                  </div>

                </form>

              <?php } }  ?>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->



  <?php include 'footer.php'; ?>
