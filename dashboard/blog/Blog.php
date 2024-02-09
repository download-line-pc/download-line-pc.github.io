<?php
    session_start();
    include"../Check.php";
    include"../Config.php";
    $p="blog";
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>Blog</title>
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
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                    </ol>
                </nav>
    </div>
</div>

<div class="row">
  <div class="col-lg-3 col-md-3 col-12 py-3">
    <a class="btn btn-secondary d-inline-flex align-items-center me-2" href="<?php echo$site[site_name];?>/dashboard/blog/AddBlog.php" role="button"><i class="bi bi-newspaper me-2"></i></i> Add blog</a>


  </div>

    <div class="col-12 mb-4">                    
        <div class="card border-0 shadow">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="fs-5 fw-bold mb-0">Blog</h2>
                    </div>
                </div>
            </div>

<!--content start-->
<div class="table-responsive">
<table class="table">
  <table class="table table-hover table-striped">
                                    <thead>
                                      <th width="25" align="center">ID</th>
                                      <th></th>
                                      <th width="10%"><div align="center">จัดการ</div></th>
                                    </thead>
                                    <tbody>
<?php
    $sql = "SELECT * FROM `blog` ORDER BY `blog_id` DESC";
    $query = mysqli_query($mysqli,$sql);
    $i=0;
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
  $i++;
?>
                                        <tr>
                                          <td class="text-center"><i class="bi bi-newspaper"></i></i></td>

                                          <td><a href="RewriteContent.php?blog_id=<?php echo $row['blog_id']?>" style="text-decoration: underline;" ><?php echo $row['blog_title']?></a></td>
                                          <td class="text-center">
                                            <a class="btn btn-info btn-xs" href="EditBlog.php?blog_id=<?=$row['blog_id']?>" role="button">
                                                <i class="bi bi-pencil-square"></i>แก้ไข
                                            </a>




                                            <a class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="javascript:if(confirm('ยืนยันที่จะลบ?')==true){window.location='Blog.php?blog_id=<? echo $row[blog_id]?>&delete=1';}" role="button"><i class="bi bi-trash"></i>ลบ</a>


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

if($_GET[delete]=="1"){

$sql = "DELETE FROM `blog` WHERE `blog_id` = '".$_GET[blog_id]."' ";
$query = mysqli_query($mysqli,$sql) or die("Can not delete blog");


echo"<script>window.location='Blog.php';</script>";
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
