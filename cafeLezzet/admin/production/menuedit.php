<?php include 'header.php';?>
<?php include '../../classes/Brand.php';  ?>  
<?php 
 if (!isset($_GET['menuedit'])  || $_GET['menuedit'] == NULL ) {
     echo "<script>window.location = 'menuedit.php';  </script>";
  }else {
    $id = $_GET['menuedit']; // get this id from productlist.php page and take this with one variable as $id 
 
  }
 
   $brand =  new Brand(); // Create object for Product Class 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['guncelle']) ) {
       $updateMenu = $brand->menuUpdate($_POST,$_FILES, $id); // This method is for update data 
    }
 
?> 
<head>  
  <script src="//cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
</head>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Yönetim Paneli </h3>
        <?php 
            if (isset($updateMenu)) {  // Show update data message 
               echo $updateMenu;
              
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
             <div align="left" class="col-md-6">
              <h2 >Menu Güncelle <small>
                </small></h2><br>
              </div>
              <div align="right" class="col-md-6">
                <a href="menu.php"><button  class="btn btn-warning "><i class="fa fa-undo" aria-hidden="true"></i> Geri Dön</button></a>
              </div>
              <div class="clearfix"></div>
            </div>

              <div class="x_content">
                <?php 
                 $getMenu = $brand->getMenuById($id);  // in our product class i create one method with id 
                 if ($getMenu) {
                    while ($value = $getMenu->fetch_assoc()) {
                        # code...
                ?>

              
                <form action="" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  
                     <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Yüklü Resim<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <img width="200" height="100" src="<?php echo $value['image']; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">İmage Seç<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" id="first-name"  name="image"  class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                
                   <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Menü Ad<span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" id="first-name" required="required" name="menuName" value="<?php echo $value['menuName']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                  
                     <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Menü Detay <span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">

                        <textarea  class="ckeditor" id="editor1" name="menuDetay"><?php echo $value['menuDetay']; ?>"</textarea>

                      </div>
                    </div>

                    <script type="text/javascript">


                     CKEDITOR.replace( 'editor1',
                     {
                      filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
                      filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
                      filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
                      filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                      filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                      filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                      forcePasteAsPlainText: true
                    } 
                    );
                  </script>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Menü Url<span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" id="first-name"  name="menuUrl" value="<?php echo $value['menuUrl']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                   

                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Menü Sıra<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" id="first-name" required="required" name="menuSira" value="<?php echo $value['menuSira']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>




                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Menü Durum<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                     <select id="heard" class="form-control" name="menuDurum" required>
                       <option>Select Durum</option>
                          <?php
                        if ($value['menuDurum'] == 1) { ?>
                           <option selected = "selected" value="1">Aktif</option>
                            <option value="0">Pasif</option>
                       <?php } else {  ?>
 
                            <option value="1">Aktif</option>
                            <option selected = "selected" value="0">Pasif</option>
                        <?php }  ?>
                    </select>
                  </div>
                </div>
               <div align="right" class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                <button type="submit" name="guncelle" class="btn btn-primary">Güncelle</button>
              </div>

            </form>
                <?php  } } ?>


              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->



  <?php include 'footer.php'; ?>
