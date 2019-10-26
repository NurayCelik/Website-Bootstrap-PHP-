<?php 

include 'header.php';
include '../../classes/Pages.php'; ?> 

<?php
 $fm = new Format(); 
 $page =  new Pages(); 

 if (isset($_GET['delvideo'])) {
   $id = $_GET['delvideo'];
   $delvideo = $page->delSliderById($table, $columnId, $column, $id);
} 

?>


---------------------------------------------------------------------

<form action="upload_file.php" method="post" enctype="multipart/form-data">
<label for="file"><span>Filename:</span></label>
<input type="file" name="file" id="file" /> 
<br />
<input type="submit" name="submit" value="Submit" />
</form>

</body>
</html>
<?php

$allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma");
$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

if ((($_FILES["file"]["type"] == "video/mp4")
|| ($_FILES["file"]["type"] == "audio/mp3")
|| ($_FILES["file"]["type"] == "audio/wma")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg"))

&& ($_FILES["file"]["size"] < 20000)
&& in_array($extension, $allowedExts))

  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";
  }
?>
------------------------------------


<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">


    </div>

    <div class="col-md-12">
      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

          <form action="" method="POST">
            <div class="input-group">
              <input type="text" class="form-control" name="aranan" placeholder="Anahtar Kelime Giriniz...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit" name="arama">Ara!</button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>


    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
             <div align="left" class="col-md-6">
              <h2 >Video Liste <small>
              <?php
               if (isset($delvideo)) {
                echo  $delvideo;
               }
              ?>
            </small></h2><br>
              </div>
              <div align="right" class="col-md-6">
                <a href="slideradd.php"><button  class="btn btn-danger "><i class="fa fa-plus" aria-hidden="true"></i> Yeni Ekle</button></a>
              </div>
              <div class="clearfix"></div>
            </div>


            <div class="x_content">
              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                      <th width="80"  class="column-title text-center">No</th>
                      <th width="250" class="column-title text-center">Slider İmage </th>
                      <th width="120" class="column-title text-center">Slider Ad </th>
                      <th width="100" class="column-title text-center">Slider Sıra </th>
                      <th width="300" class="column-title text-center">Slider Durum </th>
                      <th width="60" class="column-title text-center"></th>
                      <th width="" class="column-title text-center"></th>
                      <th width="60" class="column-title text-center"></th>
                      


                    </tr>
                  </thead>

                  <tbody>

                    <?php 
                    
                    if(!isset($_POST['arama'])) {
                    
                    $brand = new Brand();
                    $takenSlider = $brand->getAllSlider();
                    if($takenSlider)
                    {
                      $i=0;
                      while($result=$takenSlider->fetch_assoc())
                      {
                        $i++;
                   
                      ?>


                      <tr>
                        <td class="text-center"><?php echo $i; ?></td>
                        <td class="text-center"><img width="200" height="100" src="<?php echo $result['image']; ?>"></td>
                        <td class="text-center"><?php echo $fm->validation($result['sliderName']); ?></td>
                        <td class="text-center"><?php echo $fm->validation($result['sliderSira']); ?></td>
                        <td class="text-center"><?php 

                          if($result['sliderDurum']=="1") {

                           echo "AKTİF";
                         } else {

                          echo "PASİF";
                        }

                        ?></td>
                        <td width="" class="text-center"></td>
                        <td width="10%" class="text-right"><a href="slideredit.php?slideredit=<?php echo $result['sliderId']; ?>"><button type="submit" style="width:80px;" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i>Düzenle</button></a>
                        </td>
                   
                        <td width="10%" class="text-left"><a onclick="return confirm('Are you sure to delete')"
                        href="?delvideo=<?php echo $result['sliderId']; ?>"><button type="submit" style="width:80px;" class="btn btn-danger btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Sil</button></a>
                      </td>

                      </tr>

                      <?php 
                            } 
                          }
                        } 
                    
                       else
                    {
                       $aranan=$_POST['aranan'];

                      $bulunan=$brand->sliderBySearch($aranan); 

                       if($bulunan)
                        {
                          $i=0;
                          while($sonuc=$bulunan->fetch_assoc()){
                            $i++;
                            ?>
                               <tr>
                        <td width="" class="text-center"><?php echo $i; ?></td>
                        <td width="" class="text-center"><img width="200" height="100" src="<?php echo $sonuc['image']; ?>"></td>
                        <td width="" class="text-center"><?php echo $fm->validation($sonuc['sliderName']); ?></td>
                        <td width=""class="text-center"><?php echo $fm->validation($sonuc['sliderSira']); ?></td>
                        <td width="" class="text-center"><?php 

                          if($sonuc['sliderDurum']=="1") {

                           echo "AKTİF";
                         } else {

                          echo "PASİF";
                        }

                        ?>
                          
                        </td>
                        <td width="" class="text-right"><a href="slideredit.php?slideredit=<?php echo $sonuc['sliderId']; ?>"><button style="width:80px;" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Düzenle</button></a></td>
                        
                        <td width="" class="text-center"><a  onclick="return confirm('Are you sure to delete')" href="?delvideo=<?php echo $sonuc['sliderId'];?>"><button style="width:70px;" class="btn btn-danger btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Sil</button></a></td>
                        
                        <td width="" class="text-left"><a href="slider.php"><button style="width:70px;" class="btn btn-info btn-sm"><i class="fa fa-undo" aria-hidden="true"></i> Geri</button></a></td>
                     
                      </tr>
                      <?php
                        }
                    }
                    else
                    {
                      ?>
                      <tr>
                        
                        <td width="" class="text-center"></td>
                        <td width="" class="text-center"></td>
                        <td width="100%" class="text-center">Aradığınız <renk style="color:red; font-size: 20px"><?php echo $aranan; ?></renk> bulunamadı! </td><td class="text-center"></td>
                        <td width="" class="text-center"></td>
                        <td class="text-center"></td>
                        <td width="20%" class="text-center"><a href="slider.php"><button style="width:80px; height:35px;" class="btn btn-primary btn-xs"><i class="fa fa-undo" aria-hidden="true"></i> Geri Dön</button></a>
                      </td>
                      </tr>
                    <?php
                    }
                  }
                  ?>
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->



  <?php include 'footer.php'; ?>
