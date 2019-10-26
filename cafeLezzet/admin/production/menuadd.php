<?php 
include 'header.php';
include '../../classes/Brand.php';

$brand = new Brand();
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ekle']) ) { 
  echo $_POST['image']['name'];
        $insertMenu = $brand->menuInsert($_POST, $_FILES);
       
 
    }

?> 
<head>  
  <script src="//cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>

  <!-- Select2 -->
  <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">

</head>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Yönetim Paneli</h3>
          <?php 
                  if(isset($insertMenu)) {
                       echo $insertMenu;
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
              <h2>Menü Ekle <small>
                </small> </h2>
                <ul class="nav navbar-right panel_toolbox">

                   <a href="menu.php"><button type="submit" name="back" class="btn btn-info btn-sm"><i class="fa fa-undo"></i> Vazgeç</button></a>


                </ul>
                <div class="clearfix"></div>
              </div>

              <div class="x_content">

                <form action="" method="POST" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">İmage Seç<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="file" id="first-name" name="image" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Menü Ad<span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" id="first-name" required="required" name="menuName" placeholder="Menü adını giriniz..." class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                  
                     <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Menü Detay <span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">

                        <textarea  class="ckeditor" id="editor1" name="menuDetay"></textarea>

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
                        <input type="text" id="first-name"  name="menuUrl" placeholder="Menü url giriniz..." class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                   

                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Menü Sıra<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" id="first-name" required="required" name="menuSira" value="0" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>




                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Menü Durum<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                     <select id="heard" class="form-control" name="menuDurum" required>
                      <option value="1">Aktif</option>
                      <option value="0">Pasif</option>

                    </select>
                  </div>
                </div>

                <div align="right" class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                  <button type="submit" name="ekle" class="btn btn-primary">Kaydet</button>
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


<script src="../vendors/select2/dist/js/select2.full.min.js"></script>

<!-- Select2 -->
<script>
  $(document).ready(function() {
    $(".select2_single").select2({
      placeholder: "Select a state",
      allowClear: true
    });
    $(".select2_group").select2({});
    $(".select2_multiple").select2({
      maximumSelectionLength: 4,
      placeholder: "With Max Selection limit 4",
      allowClear: true
    });
  });
</script>
<!-- /Select2 -->

<?php include 'footer.php'; ?>
