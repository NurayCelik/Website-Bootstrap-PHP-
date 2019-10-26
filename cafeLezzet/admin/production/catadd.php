<?php 
include 'header.php';
include '../../classes/Category.php';

?>
<?php 
  $cat =  new Category();  
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
       $catName = $_POST['catName']; // here i add our input filed name 
        $insertCat = $cat->catInsert($catName); // with this Category object i access one method. 
    }
?>

?> 

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Yönetim Paneli</h3>
         <?php 
                  if (isset($insertCat)) {
                       echo $insertCat;
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
              <h2>Kategori Ekle <small>
                
              
            </small> </h2>
                <ul class="nav navbar-right panel_toolbox">

                 <a href="catlist.php"><button type="submit" name="back" class="btn btn-info btn-sm"><i class="fa fa-undo"></i> Vazgeç</button></a>


                </ul>
                <div class="clearfix"></div>
              </div>

              <div class="x_content">

                <form action="" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Kategori Ad<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" id="first-name" required="required" name="catName" placeholder="Kategori adını giriniz..." class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                   

               <div align="right" class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                <button type="submit" name="submit" class="btn btn-primary btn-md">Kaydet</button>
             
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
