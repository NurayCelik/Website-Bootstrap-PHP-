<?php 
include 'header.php';
include '../../classes/Category.php';
include '../../classes/Product.php';
include '../../classes/Baseproduct.php';
?>
<?php 
  $pd =  new Product();  
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ) { 
        $images = serialize($_FILES); 
        $insertProduct = $pd->productInsert($_POST, $images);
        
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
        <h3>Yönetim Paneli</h3>
         <?php 
                  if (isset($insertProduct)) {
                       echo $insertProduct;
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
              <h2>Ürün Ekle <small>
                
              
            </small> </h2>
                <ul class="nav navbar-right panel_toolbox">


                  <a href="urun.php"><button type="submit" name="back" class="btn btn-info btn-sm"><i class="fa fa-undo"></i> Vazgeç</button></a>


                </ul>
                <div class="clearfix"></div>
              </div>

              <div class="x_content">

                <form action="" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Ürün Ad<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" id="first-name" required="required" name="productName" placeholder="Ürün adını giriniz..." class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Ana Ürün<span class="required">*</span>
                    </label>
                   <div class="col-md-9 col-sm-9 col-xs-12">
              
                      <select id="select" name="baseId" id="first-name" required="required"  placeholder="Ana ürün adını giriniz..." class="form-control col-md-7 col-xs-12">
                        <option>Select Ana Ürün</option>   
                            <?php
                              $base = new Baseproduct();  // Create Category Object 
                              $getBase =  $base->getAllBase();  // With this object i create some of he method.
                                 if ($getBase) {
                                  while ($result1 = $getBase->fetch_assoc()) {
                      ?>
                        <option value="<?php echo $result1['baseId'];  ?>"><?php echo $result1['baseName']; ?></option>
                                <?php   }  } ?>
                      </select>
                    </div>
                  </div>
                     <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Kategori<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                    
                      <select id="select" name="catId" id="first-name" required="required" placeholder="Kategori adını giriniz..." class="form-control col-md-7 col-xs-12">
                        <option>Select Kategori</option>   
                            <?php
                              $cat = new Category();  // Create Category Object 
                              $getCat =  $cat->getAllCat();  // With this object i create some of he method.
                                 if ($getCat) {
                                  while ($result = $getCat->fetch_assoc()) {
                            ?>
                              <option value="<?php echo $result['catId'];  ?>"><?php echo $result['catName']; ?></option>
                                      <?php   }  } ?>
                            </select>
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">İçerik1<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <textarea  class="ckeditor" id="editor1" name="body"></textarea>

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
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Fiyatı<span class=""></span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" id="first-name" required="required" name="price" placeholder="Ürün Fiyatı giriniz..." class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                    <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                    </label>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <input type="file" id="first-name" required="" name="image[]"  class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                    </label>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <input type="file" id="first-name" required="" name="image[]"  class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Ürün Tipi<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="heard" name="type" placeholder="Ürün Tipi Seçiniz..." class="form-control col-md-7 col-xs-12">
                            <option value="0">Öne Çıkan</option>
                            <option value="1">Ayrıntı</option>
                        </select>
                    </div>
                  </div>

               <div align="right" class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                <button type="submit" name="submit" class="btn btn-primary">Kaydet</button>
              </div>

            </form>



          </div>
        </div>
      </div>

    </div>
  </div>
</div>
</div>
<!-- /page content -->



<?php include 'footer.php'; ?>
