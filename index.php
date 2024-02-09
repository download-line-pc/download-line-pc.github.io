<?
include"dashboard/Config.php";
$p="home";
?>
<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title><?php echo$site['site_title']?></title>
<meta name="keywords" content="<?php echo$site['site_keyword']?>" />
<meta name="description" content="<?php echo$site['site_description']?>" />
<meta name="Robots" content="ALL" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo$site['site_name']?>/assets/css/design.css" rel="stylesheet">
<link href="<?php echo$site['site_name']?>/assets/img/favicon.png" rel="shortcut icon"/>
</head>
<body>
<div class="container my-4">
    <?php include"nav.php";?>

    <?php include"carousel.php";?>
    <div class="row mt-3">     

        <div class="col-12">
            <div class="main_box rounded-3 mb-3">

              <div class="p-5">
                  <?php
                  $sql = "SELECT * FROM `blog` WHERE `blog_feature` = 1 ORDER BY `blog_id` DESC LIMIT 1";
                  $query = mysqli_query($mysqli,$sql);
                  $i=0;
                  while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                  {
                  $i++;
                  ?>
                  
                  <?php if($row['show_top']=='1'){?>
                    <a href="<?php echo$site['site_name'];?>/blog/<?php echo str_replace(" ","-",$row['blog_title']);?>-<?php echo$row['blog_id']?>">
                      <img src="<?php echo$row['blog_img']?>" class="rounded-4 img-fluid" alt="<?php echo$row['blog_keyword']?>">
                    </a>
                  <?php }?>
                  <div class="home_content_box ">
                    <h2 class="pt-3"><a href="<?php echo$site['site_name'];?>/blog/<?php echo str_replace(" ","-",$row['blog_title']);?>-<?php echo$row['blog_id']?>" class="title_link fs-4"><?php echo$row['blog_title']?></a></h2>
                    <?php echo $row['blog_detail']?>
                  </div>
                  <?php if($row['show_top']=='0'){?>
                    <a href="<?php echo$site['site_name'];?>/blog/<?php echo str_replace(" ","-",$row['blog_title']);?>-<?php echo$row['blog_id']?>">
                      <img src="<?php echo $row['blog_img']?>" class="rounded-4 img-fluid" alt="<?php echo$row['blog_keyword']?>">
                    </a>
                  <?php }?>

                  <?php if($row['download_link']!=''){?>
                   <div class="text-center">
                      <?php if($row['download_img']!=''){?>
                        <a href="<?php echo$row['download_link']?>" class="fs-3 px-5 py-3">
                          <img src="<?php echo $row['download_img']?>" class="img-fluid mt-3" alt="<?php echo$row['blog_keyword']?>">
                        </a>
                      <?php } else {?>
                      <a href="<?php echo$row['download_link']?>" class="btn download_bt rounded-4 mt-3 fs-4 px-3 py-2 text-white">Download Now <i class="bi bi-download  ms-2"></i></a>
                      <?php }?>
                    </div>
                  <?php }?>
                  
                <?php }?>
              </div>

              
            </div>

            <?php

            $page = $_REQUEST[page];

            if($page==""){$page=1;}
            $numperpage = 3;
            $a=($numperpage*$page)-$numperpage;

                  $sql = "SELECT * FROM `blog` WHERE `blog_feature` = 0 ORDER BY `blog_id` DESC LIMIT $a,$numperpage";
                  $query = mysqli_query($mysqli,$sql);
                  $i=0;
                  while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                  {
                  $i++;
                  ?>

            <div class="main_box rounded-3 mt-3">
              <div class="p-5">


                  
                  
                  <?php if($row['show_top']=='1'){?>
                    <a href="<?php echo$site['site_name'];?>/blog/<?php echo str_replace(" ","-",$row['blog_title']);?>-<?php echo$row['blog_id']?>">
                      <img src="<?php echo$row['blog_img']?>" class="img-fluid rounded-4" alt="<?php echo$row['blog_keyword']?>">
                    </a>
                  <?php }?>
                  <div class="home_content_box">

                    <h2><a href="<?php echo$site['site_name'];?>/blog/<?php echo str_replace(" ","-",$row['blog_title']);?>-<?php echo$row['blog_id']?>" class="title_link fs-4"><?php echo$row['blog_title']?></a></h2>
                    <?php echo$row['blog_detail']?>

                  </div>

                  <?php if($row['show_top']=='0'){?>
                    <a href="<?php echo$site['site_name'];?>/blog/<?php echo str_replace(" ","-",$row['blog_title']);?>-<?php echo$row['blog_id']?>">
                      <img src="<?php echo$row['blog_img']?>" class="img-fluid rounded-4" alt="<?php echo$row['blog_keyword']?>">
                    </a>

                  <?php }?>




                  <?php if($row['download_link']!=''){?>
                   <div class="text-center">
                      <?php if($row['download_img']!=''){?>
                        <a href="<?php echo$row['download_link']?>" target="_blank" class="fs-3 px-5 py-3">
                          <img src="<?php echo $row['download_img']?>" class="img-fluid mt-3 w-100" alt="<?php echo$row['blog_keyword']?>">
                        </a>
                      <?php } else {?>
                      <a href="<?php echo$row['download_link']?>" target="_blank" class="btn download_bt rounded-4 mt-3 fs-4 px-3 py-2 text-white">Download Now <i class="bi bi-download ms-2"></i></a>
                      <?php }?>
                    </div>
                  <?php }?>
                  
                

              </div>
            </div>
            <?php }?>

            


        </div>
    </div>

    <!--pagination-->
    <div class="row mt-3">
        <div class="col-12">
            <nav aria-label="...">
              <ul class="pagination">
                  <li class="page-item disabled"><span class="page-link">หน้าที่</span></li>
                    <?php
                    $sql = "SELECT * FROM `blog` WHERE `blog_feature` !='1'";
                                $query = mysqli_query($mysqli,$sql);
                                $nums=mysqli_num_rows($query);

                                if($page==""){$page=1;}
                                $numsberpage = ceil($nums/$numperpage);
                                if($numsberpage!=0);
                                for($i=1;$i<=$numsberpage;$i++){
                                ?>
                  <li class="page-item <?php if($i==$page){?>active<?php } ?>" aria-current="page">
                    <span class="page-link">
                      <?php if($i!=$page){?><a href="?page=<?php echo $i?>"> <?php echo $i?> </a><?php } else {?>
                        <?php echo $i?>
                      <?php }?>
                    </span>
                  </li>
                    <? } ?>

              </ul>
            </nav>
        </div>
    </div>


    <!--end pagination-->


    <?php include"footer.php";?>


</div>



</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
</html>