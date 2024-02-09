<?
include"dashboard/Config.php";
$blog="SELECT * FROM `blog` WHERE `blog_id`='$_GET[blog_id]'";
$blog = mysqli_query($mysqli, $blog);
$blog=mysqli_fetch_array($blog);

    $pre_id=($blog[blog_id]-1);
    $nex_id=($blog[blog_id]+1);

    $previous="SELECT * FROM blog WHERE blog_id='$pre_id'";
    $previous = mysqli_query($mysqli, $previous);
    $previous=mysqli_fetch_array($previous);


    $next="SELECT * FROM blog WHERE blog_id='$nex_id'";
    $next = mysqli_query($mysqli, $next);
    $next=mysqli_fetch_array($next);

/*
include"spin.php";
$spinner = new Spinner();

$read_more=$spinner->spin("{อ่านบทความเพิ่มเติม|อ่านเนื้อหาเพิ่มเติม|อ่านรายละเอียดเพิ่มเติม|อ่านบทความน่าสนใจ|อ่านข้อมูลเพิ่มเติม}");
$from=$spinner->spin("{จากเว็บ|จากบล็อก|จากเว็บไซต์}");

$blog_title=$spinner->spin($blog['blog_title']);
$blog_keyword=$spinner->spin($blog['blog_keyword']);
$blog_description=$spinner->spin($blog['blog_description']);
$blog_detail=$spinner->spin($blog['blog_detail']);
*/
?>
<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title><?php echo $blog['blog_title'];?></title>
<meta name="keywords" content="<?php echo $blog['blog_keyword']?>" />
<meta name="description" content="<?php echo $blog['blog_description']?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="<?php echo$site['site_name']?>/assets/css/design.css" rel="stylesheet">
<link href="<?php echo$site['site_name']?>/assets/img/favicon.png" rel="shortcut icon"/>
</head>

<body>
<div class="container my-4">
    <?php include"nav.php";?>
    <div class="row mt-3">

        

        <div class="col-12">
            <div class="main_box rounded-3">

              <div class="p-5">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo$site['site_name']?>" class="text_link">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $blog['blog_title']?></li>
                  </ol>
                </nav>

                <?php if($blog['show_top']=='1'){?>
                  <img src="<?php echo$blog['blog_img']?>" class="img-fluid rounded-4" alt="<?php echo $blog['blog_keyword']?>">
                <?php }?>

                  <div class="home_content_box">
                    <h1 class="text-dark py-4 fs-2"><?php echo $blog['blog_title']?></h1>
                    <?php echo $blog['blog_detail']?>
                  </div>

                  <?php if($blog['show_top']=='0'){?>
                  <img src="<?php echo$blog['blog_img']?>" class="img-fluid rounded-4" alt="<?php echo $blog['blog_keyword']?>">
                <?php }?>




                  <?php if($blog['download_link']!=''){?>
                   <div class="text-center">
                      <?php if($blog['download_img']!=''){?>
                        <a href="<?php echo$blog['download_link']?>" class="fs-3 px-5 py-3">
                          <img src="<?php echo $blog['download_img']?>" class="img-fluid mt-3" alt="<?php echo$blog['blog_keyword']?>">
                        </a>
                      <?php } else {?>
                      <a href="<?php echo $blog['download_link']?>" class="btn btn download_bt rounded-4 mt-3 fs-4 px-3 py-2 text-white">Download Now <i class="bi bi-download  ms-2"></i></a>
                      <?php }?>
                    </div>
                  <?php }?>


                  <!--Random Post from Multi-Domain->
                  <?php //include"dashboard/Config.php"; ?>
                  


                <!----ลิ้งค์ไปหน้า-หลัง-->
                <div class="row pt-3">
                  <div class="col-xs-6 col-sm-6 col-md-6">
                     <?php
                     include"dashboard/Config.php";
                      if($previous!=''){
                      $previous="SELECT * FROM blog WHERE blog_id='$previous[blog_id]'";
                      $previous = mysqli_query($mysqli, $previous);
                      $blogx=mysqli_fetch_array($previous);
                    ?>
                    <a href="<?php echo$site['site_name'];?>/blog/<?php echo str_replace(" ","-",$blogx['blog_title']);?>-<?php echo$blogx['blog_id']?>" class="text_link">
                      <div class="p-2"><i class="bi bi-arrow-left"></i> เก่ากว่า</div>
                    </a>
                  <?php } ?>
                  </div>


                  <div class="col-xs-6 col-sm-6 col-md-6 text-end">                    
                    <?                       
                      if($next!=''){
                      $next="SELECT * FROM blog WHERE blog_id='$next[blog_id]'";
                      $next = mysqli_query($mysqli, $next);
                      $blogx=mysqli_fetch_array($next);
                    ?> 

                    <a href="<?php echo$site['site_name'];?>/blog/<?php echo str_replace(" ","-",$blogx['blog_title']);?>-<?php echo$blogx['blog_id']?>" class="text_link">
                      <div class="p-2">ใหม่กว่า <i class="bi bi-arrow-right"></i></div>
                    </a>
                    <?php } ?>

                  </div>
                </div>
                <!--ลิ้งค์ไปหน้า-หลัง-->

              </div>
            </div>
            <?php include"footer.php";?>
        </div>
    </div>
</div>



</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>