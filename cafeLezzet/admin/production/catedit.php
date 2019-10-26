<?php 
include 'header.php';
include '../../classes/Category.php';  ?>
 
 <?php
  if (!isset($_GET['catedit'])  || $_GET['catedit'] == NULL  || isset($_POST['back'])) { // get this ID as catid
     echo "<script>window.location = 'catlist.php';  </script>"; // we transfer to catlist.php page
  }else {
    $id = $_GET['catedit']; // Get this id from catadd.php and take this on $id variable.
  }
 ?>  
 
 
 <?php 
   $cat =  new Category();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['guncelle'])) {
        $catName = $_POST['catName'];
        
        $updateCat = $cat->catUpdate($catName, $id); // Here with category object i create one method
    }

?>
 
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Yönetim Paneli</h3>
           <?php
              if(isset($updateCat)) {
                  echo $updateCat;
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
              <h2>Kategori Güncelle <small>
                
              
            </small> </h2>
                <ul class="nav navbar-right panel_toolbox">




                </ul>
                <div class="clearfix"></div>
              </div>

              <div class="x_content">

                  <?php 
                     $getCat = $cat->getCatById($id); // With category object i create one method with also id
                      if ($getCat) {
                      while ($result = $getCat->fetch_assoc()) {
         
                   ?>
                <form action="" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Kategori Ad<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input  type="text" id="first-name" required="required" name="catName" value="<?php echo $result['catName']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                   

               <div align="right" class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                <button type="submit" name="guncelle" class="btn btn-primary btn-sm">Güncelle</button>
                 <a href="catlist.php"><button type="submit" name="back" class="btn btn-info btn-sm"><i class="fa fa-undo"></i> Vazgeç</button></a>
                </div>

            </form>

                <?php }} ?>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>
</div>
<!-- /page content -->



<?php include 'footer.php'; ?>
