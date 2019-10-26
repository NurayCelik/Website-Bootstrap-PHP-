<?php include 'header.php';?>
<?php include '../../classes/Product.php';  ?>  
<?php include '../../classes/Category.php';  ?>
<?php include '../../classes/Baseproduct.php';?>
<?php 
 if (!isset($_GET['urunedit'])  || $_GET['urunedit'] == NULL ) {
     echo "<script>window.location = 'urunedit.php';  </script>";
  }else {
    $id = $_GET['urunedit']; // get this id from productlist.php page and take this with one variable as $id 
 
  }
 
   $pd =  new Product(); // Create object for Product Class 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['guncelle']) ) {
       $updateProduct = $pd->productUpdate($_POST, $_FILES, $id); // This method is for update data 
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
            if (isset($updateProduct)) {  // Show update data message 
               echo $updateProduct;
              
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
              <h2 >Ürün Güncelle <small>
                </small></h2><br>
              </div>
              <div align="right" class="col-md-6">
                <a href="urun.php"><button  class="btn btn-warning "><i class="fa fa-undo" aria-hidden="true"></i> Geri Dön</button></a>
              </div>
              <div class="clearfix"></div>
            </div>

              <div class="x_content">
                <?php 
                 $getProd = $pd->getProById($id);  // in our product class i create one method with id 
                 if ($getProd) {
                    while ($value = $getProd->fetch_assoc()) {
                        # code...
                ?>

              
                <form action="" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Ürün Ad<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" id="first-name" required="required" name="productName" value="<?php echo $value['productName']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                    <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Ana Ürün<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                    
                      <select id="select" name="baseId" id="first-name" required="required" placeholder="Ana Ürün adını giriniz..." class="form-control col-md-7 col-xs-12">
                           
                            <?php
                              $base = new Baseproduct();  // Create Category Object 
                              $getBase =  $base->getAllBase();  // With this object i create some of he method.
                                 if ($getBase) {
                                  while ($result = $getBase->fetch_assoc()) {
                            ?>
                              <option <?php 
 
                             if ($value['baseId'] == $result['baseId']) { ?>
                              selected = "selected"
                       <?php }  ?> value="<?php echo $result['baseId'];  ?>" > <?php echo $result['baseName']; ?>
                       <?php   }  } ?>
                      </select>
                  </div>
                  </div>
                     <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Kategori<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                    
                      <select id="select" name="catId" id="first-name" required="required" placeholder="Ürün adını giriniz..." class="form-control col-md-7 col-xs-12">
                           
                            <?php
                              $cat = new Category();  // Create Category Object 
                              $getCat =  $cat->getAllCat();  // With this object i create some of he method.
                                 if ($getCat) {
                                  while ($result = $getCat->fetch_assoc()) {
                            ?>
                              <option <?php 
 
                             if ($value['catId'] == $result['catId']) { ?>
                              selected = "selected"
                       <?php }  ?> value="<?php echo $result['catId'];  ?>" > <?php echo $result['catName']; ?>
                       <?php   }  } ?>
                      </select>
                  </div>
                  </div>
                   <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">İçerik1<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <textarea  class="ckeditor" id="editor1" name="body"><?php echo  $value['body']; ?></textarea>

                    </div>
                  </div>
                   

                <script type="text/javascript">
                 
                         CKEDITOR.replace( 'editor$i',
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
                      <input type="text" id="first-name" required="required" name="price" value="<?php echo  $value['price']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                    <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Mevcut Resim<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <img width="200" height="100" src="<?php echo $value['image'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" id="first-name" name="image" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Ürün Tipi<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="heard" name="type" class="form-control col-md-7 col-xs-12">
                            <option>Select Tip</option>
                          <?php
                        if ($value['type'] == 0) { ?>
                           <option selected = "selected" value="0">Öne Çıkan</option>
                            <option value="1">Ayrıntı</option>
                       <?php } else {  ?>
 
                            <option value="0">Öne Çıkan</option>
                            <option selected = "selected" value="1">Ayrıntı</option>
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
