<?php
    session_start();
    include"../Check.php";
    include"../Config.php";
    $p="seo";
    $site_id="1";
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>ตั้งค่าเว็บไซต์ : <?php echo$site[site_title];?></title>
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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
<script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>


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
                        <li class="breadcrumb-item active" aria-current="page">ตั้งค่าเว็บไซต์</li>
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
                        <h2 class="fs-5 fw-bold mb-0">ตั้งค่าเว็บไซต์</h2>
                    </div>
                </div>
            </div>

<!--content start-->

<form method="post" action="" enctype="multipart/form-data">
                                    <div class="row p-4">

                                        <div class="col-12">
                                            <div class="alert alert-warning" role="alert">การตั้งค่าส่วนนี้ต้องมีความเข้าใจเรื่อง SEO ระดับหนึ่ง</div>
                                        </div>

                                        <div class="col-md-12 pb-3">
                                            <div class="form-group">
                                                <label>URL</label>
                                                <input type="text" name="site_name" class="form-control" value="<?php echo $site[site_name]?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12 pb-3">
                                            <div class="form-group">
                                                <label>Site Title</label>
                                                <input type="text" name="site_title" class="form-control text-dark" value="<?php echo $site[site_title]?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12 pb-3">
                                            <div class="form-group">
                                                <label>Site Keyword</label>
                                                <input type="text" name="site_keyword" class="form-control text-dark" value="<?php echo $site[site_keyword]?>" required>
                                            </div>
                                        </div>



                                        <div class="col-md-12 pb-3">
                                            <div class="form-group">
                                                <label>Site Description</label>
                                                <textarea rows="4" class="form-control" name="site_description" required><?php echo $site[site_description]?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12 pb-3">
                                            <div class="form-group">
                                                <label>Footer Description</label>
                                                <textarea rows="4" class="form-control" name="footer_desc"><?php echo $site[footer_desc]?></textarea>
                                                <script>
                                                    CKEDITOR.replace( 'footer_desc', {
                                                        width: '100%',
                                                        height: 200
                                                    } );

                                                </script>
                                            </div>
                                        </div>

                                        <div class="col-md-2 pb-3">
                                            <div class="form-group">
                                                <label>Keyword 1</label>
                                                <input type="text" name="key_1" class="form-control text-dark" value="<?php echo $site[key_1]?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-10 pb-3">
                                            <div class="form-group">
                                                <label>Keyword 1 url</label>
                                                <input type="text" name="key_1_url" class="form-control text-dark" value="<?php echo $site[key_1_url]?>" required>
                                            </div>
                                        </div>


                                        <div class="col-md-2 pb-3">
                                            <div class="form-group">
                                                <label>Keyword 2</label>
                                                <input type="text" name="key_2" class="form-control text-dark" value="<?php echo $site[key_2]?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-10 pb-3">
                                            <div class="form-group">
                                                <label>Keyword 2 url</label>
                                                <input type="text" name="key_2_url" class="form-control text-dark" value="<?php echo $site[key_2_url]?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-2 pb-3">
                                            <div class="form-group">
                                                <label>Keyword 3</label>
                                                <input type="text" name="key_3" class="form-control text-dark" value="<?php echo $site[key_3]?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-10 pb-3">
                                            <div class="form-group">
                                                <label>Keyword 3 url</label>
                                                <input type="text" name="key_3_url" class="form-control text-dark" value="<?php echo $site[key_3_url]?>" required>
                                            </div>
                                        </div>



                                        <div class="col-md-12 pb-3">
                                            <div class="form-group">
                                                <label>RGB Color (#000000)</label>
                                                <input type="text" name="site_color" class="form-control text-dark" value="<?php echo $site[site_color]?>" required>
                                            </div>
                                        </div>


                                        <div class="col-md-12 pb-3 bg">

                                            <img src="../../assets/img/<?php echo$site[site_logo]?>" class="img-thumbnail">
                                            <div class="form-group">
                                            <label>LOGO</label>
                                            <input name="fileUploadx" type="file" class="btn btn-default">
                                            </div>
                                        </div>


                                        <div class="col-md-12 pb-3 bg">
                                            <img src="../../assets/img/<?php echo $site['modal_img']?>" class="img-thumbnail">
                                            <div class="form-group">
                                            <label>Modal Img</label>
                                            <input name="modal_img" type="file" class="btn btn-default">
                                            </div>
                                        </div>
                                        <hr>





                                        <div class="col-md-12 pb-3">
                                            <div class="form-group">
                                                <input type="hidden" name="update" value="1">
                                                <button type="submit" class="btn btn-tertiary btn-fill"><i class="bi bi-pencil-square"></i> Update</button>
                                            </div>
                                        </div>

                                    </div><!--end row-->
</form>

  

            
<?php

if($_POST[update]=="1"){


echo $update = "UPDATE `site_config` SET `site_name` = '".$_POST[site_name]."',
`site_title` = '".$_POST[site_title]."',
`site_keyword` = '".$_POST[site_keyword]."',
`site_description` = '".$_POST[site_description]."',
`site_color` = '".$_POST[site_color]."',
`footer_desc` = '".$_POST[footer_desc]."',
`key_1` = '".$_POST[key_1]."',
`key_1_url` = '".$_POST[key_1_url]."',
`key_2` = '".$_POST[key_2]."',
`key_2_url` = '".$_POST[key_2_url]."',
`key_3` = '".$_POST[key_3]."',
`key_3_url` = '".$_POST[key_3_url]."'
 WHERE `site_id` = '".$site_id."' ";
$query = mysqli_query($mysqli,$update) or die("can not update");



/*img*/

$ints = date('Gis');

if(trim($_FILES["fileUploadx"]["tmp_name"]) != ""){

$uploadedFile_type=$_FILES['fileUploadx']['type'];
if($uploadedFile_type=="image/JPG" || $uploadedFile_type=="image/jpg" || $uploadedFile_type=="image/JPEG" || $uploadedFile_type=="image/jpeg" || $uploadedFile_type=="image/pjpeg" || $uploadedFile_type=="image/pjpg" || $uploadedFile_type=="image/png"  || $uploadedFile_type=="image/PNG"){

//$images = $_FILES["fileUpload"]["tmp_name"];
$img = "$ints".$_FILES["fileUploadx"]["name"];

copy($_FILES["fileUploadx"]["tmp_name"],"../../assets/img/$ints".$_FILES["fileUploadx"]["name"]);

echo $update_img = "UPDATE `site_config` SET `site_logo` = '".$img."' WHERE `site_id` = '".$site_id."' ";
$query = mysqli_query($mysqli,$update_img) or die("can not update logo");

}
}  



/*modal_img*/

$ints = date('Gis');

if(trim($_FILES["modal_img"]["tmp_name"]) != ""){

$uploadedFile_type=$_FILES['modal_img']['type'];
if($uploadedFile_type=="image/JPG" || $uploadedFile_type=="image/jpg" || $uploadedFile_type=="image/JPEG" || $uploadedFile_type=="image/jpeg" || $uploadedFile_type=="image/pjpeg" || $uploadedFile_type=="image/pjpg" || $uploadedFile_type=="image/png"  || $uploadedFile_type=="image/PNG"){

//$images = $_FILES["fileUpload"]["tmp_name"];
$modal_img = "$ints".$_FILES["modal_img"]["name"];

copy($_FILES["modal_img"]["tmp_name"],"../../assets/img/$ints".$_FILES["modal_img"]["name"]);

$update_modal = "UPDATE `site_config` SET `modal_img` = '".$modal_img."' WHERE `site_id` = '1' ";
$query = mysqli_query($mysqli,$update_modal) or die("can not update modal_img");

}
}



echo"<script>alert('ปรับปรุงข้อมูลแล้ว');window.location='SEO.php';</script>";
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
