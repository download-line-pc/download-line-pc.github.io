<?php
    session_start();
    include"../Check.php";
    include"../Config.php";
    $p="carousel";
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>ภาพสไลด์ : <?php echo$site[site_title];?></title>
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
                        <li class="breadcrumb-item active" aria-current="page">ภาพสไลด์</li>
                    </ol>
                </nav>
    </div>
</div>

<div class="row">
  <div class="col-lg-3 col-md-3 col-12 py-3">
    <a class="btn btn-secondary d-inline-flex align-items-center me-2" href="<?php echo$site[site_name];?>/dashboard/carousel/AddCarousel.php" role="button"><svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>เพิ่มภาพสไลด์</a>


  </div>

    <div class="col-12 mb-4">                    
        <div class="card border-0 shadow">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="fs-5 fw-bold mb-0">ภาพสไลด์</h2>
                    </div>
                </div>
            </div>

<!--content start-->
<div class="table-responsive">
<table class="table">
  <table class="table table-hover table-striped">
                                    <thead>
                                      <th width="25" align="center">ลำดับ</th>
                                      <th></th>
                                      <th width="10%"><div align="center">จัดการ</div></th>
                                    </thead>
                                    <tbody>
<?php
    $sql = "SELECT * FROM carousel ORDER BY cs_sequence ASC";
    $query = mysqli_query($mysqli,$sql);
    $i=0;
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
  $i++;
?>
                                        <tr>
                                          <td class="text-center"><?=$row['cs_sequence']?></td>
                                          <td>
                                            <a href="<?=$row['cs_link']?>" target="_blank"><img src="../../assets/img/carousel/<?php echo $row['img_src']?>" class="img-fluid"></a>
                                            <div class="alert alert-secondary fs-3 mt-2 text-center" role="alert"><?=$row['cs_title']?></div>
                                            <div class="alert alert-info fs-5 text-center" role="alert"><?=$row['cs_desc']?></div>
                                          </td>
                                          <td align="center">
                                            <a class="btn btn-info btn-xs" href="EditCarousel.php?cs_id=<?=$row['cs_id']?>" role="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggles2" viewBox="0 0 16 16">
  <path d="M9.465 10H12a2 2 0 1 1 0 4H9.465c.34-.588.535-1.271.535-2 0-.729-.195-1.412-.535-2z"/>
  <path d="M6 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 1a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm.535-10a3.975 3.975 0 0 1-.409-1H4a1 1 0 0 1 0-2h2.126c.091-.355.23-.69.41-1H4a2 2 0 1 0 0 4h2.535z"/>
  <path d="M14 4a4 4 0 1 1-8 0 4 4 0 0 1 8 0z"/>
</svg>แก้ไข
                                            </a>




                                            <a class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="javascript:if(confirm('ยืนยันที่จะลบ?')==true){window.location='Carousel.php?cs_id=<? echo $row[cs_id]?>&delete_cs=1';}" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg>ลบ</a>


                                          </td>

                                        </tr>
 <?php
}
 ?>
                                    </tbody>
                                </table>
</table>
</div>

  

  <?php

if($_GET[delete_cs]=="1"){

$sql = "DELETE FROM carousel WHERE cs_id = '".$_GET[cs_id]."' ";
$query = mysqli_query($mysqli,$sql)or die("Can not delete Carousel");


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
