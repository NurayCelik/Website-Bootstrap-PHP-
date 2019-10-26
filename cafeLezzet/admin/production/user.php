<?php include 'header.php';?>
<?php include '../../classes/Brand.php';  ?>  
<?php include_once '../../helpers/Format.php';?>

<?php 
$brand =  new Brand();
$fm    =  new Format();

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ) {
        $updateAdmin = $brand->adminUpdate($_POST, $_FILES);
    }
   
 ?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Admin Update İşlemleri </h3>
        <?php 
                if (isset($updateAdmin)) { 
                    echo $updateAdmin;
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
              <h2><small>
              </small> </h2>
                <ul class="nav navbar-right panel_toolbox">




                </ul>
                <div class="clearfix"></div>
              </div>

              <div class="x_content">
              <?php 
                $getAdmin = $brand->getAdminData(); // Create this method in our User.php Class
                if ($getAdmin) {
                 while ($value = $getAdmin->fetch_assoc()) { 
              ?> 

               <form action="" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Resmi<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                    <?php 
                    if (strlen($value['image'])>0) { ?>

                    <img width="150"  src="<?php echo $value['image']; ?>">

                    <?php } else {?>


                    <img width="150"  src="upload/admin/resim-yok.jpg">
                   <?php
                    } 
                    ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="first-name"  name="image"  class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Admin Username<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" required="required"  name="adminUser" value="<?php echo $fm->validation($value['adminUser']); ?>" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ad Soyad<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" required="required"  name="adminName" value="<?php echo $fm->validation($value['adminName']); ?>" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Admin Şifre<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" required="required"  name="adminPass" value="<?php echo $value['adminPass']; ?>" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Admin Email<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" required="required" name="adminEmail" value="<?php echo $fm->validation($value['adminEmail']); ?>" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Admin Level<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" required="required" name="level" value="<?php echo $fm->validation($value['level']); ?>" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
               <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="submit" class="btn btn-primary">Güncelle</button>
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
