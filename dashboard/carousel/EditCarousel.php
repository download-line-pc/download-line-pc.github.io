<?php
    session_start();
    include"../Check.php";
    include"../Config.php";
    $carousel="SELECT * FROM carousel WHERE cs_id='$_GET[cs_id]'";
    $carousel = mysqli_query($mysqli, $carousel);
    $cs=mysqli_fetch_array($carousel);
    $p="carousel";
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>แก้ไขภาพสไลด์ : <?php echo$cs[cs_title];?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<!-- Favicon -->
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo$site[site_name];?>/dashboard/assets/img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo$site[site_name];?>/dashboard/assets/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo$site[site_name];?>/dashboard/assets/img/favicon/favicon-16x16.png">
<link rel="manifest" href="<?php echo$site[site_name];?>/dashboard/assets/img/favicon/site.webmanifest">
<link rel="mask-icon" href="<?php echo$site[site_name];?>/dashboard/assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">

<!-- Sweet Alert -->
<link type="text/css" href="<?php echo$site[site_name];?>/dashboard/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

<!-- Notyf -->
<link type="text/css" href="<?php echo$site[site_name];?>/dashboard/vendor/notyf/notyf.min.css" rel="stylesheet">

<!-- Volt CSS -->
<link type="text/css" href="<?php echo$site[site_name];?>/dashboard/css/volt.css" rel="stylesheet">



</head>

<body>  
<?php
include"../Nav.php";
?>
    
<main class="content">
  <?php
    include"../Top.php";
  ?>
  
  
  <div class="row">
    <div class="col px-3 pt-3">
        <nav aria-label="breadcrumb" class="d-md-inline-block">
                    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                        <li class="breadcrumb-item">
                            <a href="<?php echo$site[site_name];?>/dashboard/Dashboard.php">หน้าหลัก</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo$site[site_name];?>/dashboard/carousel/Carousel.php">ภาพสไลด์</a></li>
                        <li class="breadcrumb-item active" aria-current="page">แก้ไขภาพสไลด์</li>
                    </ol>
                </nav>
    </div>
</div>

<div class="row">


    <div class="col-12 mb-4">                    
        <div class="card border-0 shadow">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="fs-5 fw-bold mb-0">แก้ไขภาพสไลด์</h2>
                    </div>
                </div>
            </div>

<!--content start-->

<form method="post" action="" enctype="multipart/form-data">
                                    <div class="row p-4">

                                        <div class="col-md-12 pb-3 bg">

                                            <img src="../../assets/img/carousel/<?php echo$cs['img_src']?>" class="img-fluid">

                                        </div>

                                        <div class="col-md-12 pb-3 bg">
                                          <div class="alert alert-warning" role="alert">
                                            <div class="form-group">
                                            <label>ภาพสไลด์ (ขนาด 1920 x 880)</label>
                                            <input name="fileUpload" type="file" class="btn btn-default">  
                                            </div>
                                          </div>
                                        </div>


                                        <div class="col-md-12 pb-3">
                                            <div class="form-group">
                                                <label>หัวเรื่อง</label>
                                                <input type="text" name="cs_title" class="form-control" value="<?php echo $cs[cs_title]?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12 pb-3">
                                            <div class="form-group">
                                                <label>คำอธิบาย</label>
                                                <input type="text" name="cs_desc" class="form-control" value="<?php echo $cs[cs_desc]?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12 pb-3">
                                            <div class="form-group">
                                                <label>ลับดับ</label>
                                                <input type="number" name="cs_sequence" class="form-control"  value="<?php echo $cs[cs_sequence]?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12 pb-3">
                                            <div class="form-group">
                                                <label>ลิ้งค์</label>
                                                <input type="text" name="cs_link" class="form-control" value="<?php echo $cs[cs_link]?>" required>
                                            </div>
                                        </div>
                                        
                                        

                                        <div class="col-md-12 pb-3">
                                            <div class="form-group">
                                                <input type="hidden" name="edit_cs" value="1">
                                                <input type="hidden" name="cs_id" value="<?php echo $_GET[cs_id]?>">
                                                <button type="submit" class="btn btn-tertiary btn-fill">แก้ไขภาพสไลด์</button>
                                                <a href="<?php echo$site[site_name];?>/dashboard/carousel/Carousel.php" class="btn btn-secondary btn-fill px-2" role="button">ยกเลิก</a>
                                            </div>
                                        </div>

                                    </div><!--end row-->
</form>

  

            
<?php

if($_POST[edit_cs]=="1"){


$ints = date('Gis');
$cs_title = str_replace('"', '', $_POST[cs_title]);
$cs_desc = str_replace('"', '', $_POST[cs_desc]);
$cs_link = str_replace('"', '', $_POST[cs_link]);
$cs_sequence = str_replace('"', '', $_POST[cs_sequence]);
      
$update = "UPDATE carousel SET 
cs_title = '".$cs_title."',
cs_desc = '".$cs_desc."',
cs_link = '".$cs_link."',
cs_sequence = '".$cs_sequence."'
WHERE cs_id = '".$_POST[cs_id]."' ";
$query = mysqli_query($mysqli,$update)or die("can not update");


/*img*/
if(trim($_FILES["fileUpload"]["tmp_name"]) != ""){

$uploadedFile_type=$_FILES['fileUpload']['type'];
if($uploadedFile_type=="image/JPG" || $uploadedFile_type=="image/jpg" || $uploadedFile_type=="image/JPEG" || $uploadedFile_type=="image/jpeg" || $uploadedFile_type=="image/pjpeg" || $uploadedFile_type=="image/pjpg" || $uploadedFile_type=="image/png"  || $uploadedFile_type=="image/PNG"){

//$images = $_FILES["fileUpload"]["tmp_name"];
$img = "$ints".$_FILES["fileUpload"]["name"];

copy($_FILES["fileUpload"]["tmp_name"],"../../assets/img/carousel/$ints".$_FILES["fileUpload"]["name"]);

$update_img = "UPDATE carousel SET img_src = '".$img."' WHERE cs_id = '".$_POST[cs_id]."' ";
$query = mysqli_query($mysqli,$update_img) or die("can not update img");

}
}  

echo"<script>window.location='Carousel.php';</script>";
}

?>



<!--content end-->
        </div><!--end card-->
    </div> <!--end col-->                   
</div><!--end row-->



<?php
//include"footer.php";
?>

</main>

    <!-- Core -->
<script src="<?php echo$site[site_name];?>/dashboard/vendor/@popperjs/core/dist/umd/popper.min.js"></script>
<script src="<?php echo$site[site_name];?>/dashboard/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Vendor JS -->
<script src="<?php echo$site[site_name];?>/dashboard/vendor/onscreen/dist/on-screen.umd.min.js"></script>

<!-- Slider -->
<script src="<?php echo$site[site_name];?>/dashboard/vendor/nouislider/distribute/nouislider.min.js"></script>

<!-- Smooth scroll -->
<script src="<?php echo$site[site_name];?>/dashboard/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

<!-- Charts -->
<script src="<?php echo$site[site_name];?>/dashboard/vendor/chartist/dist/chartist.min.js"></script>
<script src="<?php echo$site[site_name];?>/dashboard/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

<!-- Datepicker -->
<script src="<?php echo$site[site_name];?>/dashboard/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

<!-- Sweet Alerts 2 -->
<script src="<?php echo$site[site_name];?>/dashboard/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>

<!-- Moment JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

<!-- Vanilla JS Datepicker -->
<script src="<?php echo$site[site_name];?>/dashboard/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

<!-- Notyf -->
<script src="<?php echo$site[site_name];?>/dashboard/vendor/notyf/notyf.min.js"></script>

<!-- Simplebar -->
<script src="<?php echo$site[site_name];?>/dashboard/vendor/simplebar/dist/simplebar.min.js"></script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Volt JS -->
<script src="<?php echo$site[site_name];?>/dashboard/assets/js/volt.js"></script>

    
</body>

</html>
