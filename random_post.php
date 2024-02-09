
                  <!--randome link--->
                  <?php

                  $main_host = "SELECT * FROM `main_host` WHERE `host_id` = 1";
                  $main_host = mysqli_query($mysqli,$main_host);
                  $row=mysqli_fetch_array($main_host);  
                  
                  $hostx=$row['host_ip'];
                  $usernamex=$row['host_user'];
                  $passwordx=$row['host_pass'];
                  $databasex=$row['host_db'];

                  mysqli_close($mysqli);

                  $mysqlix = mysqli_connect("$hostx", "$usernamex", "$passwordx", "$databasex") or die ("Can't connect database! $usernamex ");
                  $mysqlix->query("set names utf8");
                  
                  $random_blog="SELECT * FROM `random_blog` ORDER BY RAND()";
                  $random_blog = mysqli_query($mysqlix, $random_blog);
                  $rb=mysqli_fetch_array($random_blog);

                  ?>
                  <a href="<?php echo $rb['blog_url'];?>"><?php echo $rb['blog_title'];?></a>

                  <?php if($blog['show_top']=='0'){?>
                  <img src="<?php echo$blog['blog_img']?>" class="img-thumbnail" alt="<?php echo $blog['blog_keyword']?>">
                  <?php }?>

                  <?php if($blog['download_link']!=''){?>
                   <div class="text-center">
                      <?php if($blog['download_img']!=''){?>
                        <a onclick="{window.location='<?php echo $blog['download_link']?>';}" data-bs-toggle="modal" data-bs-target="#download_triker" class="fs-3 px-5 py-3">
                          <img src="<?php echo $blog['download_img']?>" class="img-fluid mt-3">
                        </a>
                      <?php } else {?>
                      <a onclick="{window.location='<?php echo $blog['download_link']?>';}" data-bs-toggle="modal" data-bs-target="#download_triker" class="btn btn-success download_bt mt-3 fs-3 px-5 py-3">Download</a>
                      <?php }?>
                    </div>
                  <?php }?>