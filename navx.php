<div class="col-xl-4 col-md-12 col-sm-12">
          <div class="text-center py-3 d-none d-sm-none d-md-none d-xl-block">
            <a href="<?php echo$site[site_name]?>">
            <img src="<?php echo$site[site_name]?>/assets/img/<?php echo$site[site_logo]?>">
            </a>
          </div>
          <div class="list-group d-none d-sm-none d-md-none d-xl-block">
              <?php
                  $sql = "SELECT * FROM `blog` ORDER BY 'blog_id' DESC";
                  $query = mysqli_query($mysqli,$sql);
                  $i=0;
                  while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                  {
                  $i++;
                  ?>
              <a href="<?php echo$site[site_name];?>/blog/<?php echo str_replace(" ","-",$row[blog_title]);?>-<?php echo$row[blog_id]?>" class="list-group-item list-group-item-action left_nav_link" aria-current="true"><i class="bi bi-caret-right"></i> <?php echo$row[blog_title]?></a>
              <?php }?>
          </div>


          <div class="bg-light px-2 d-block d-sm-block d-md-none mb-2">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="<?php echo$site[site_name]?>"><img src="<?php echo$site[site_name]?>/assets/img/<?php echo$site[site_logo]?>" class="logo_xs"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <?php
                  $sql = "SELECT * FROM `blog` ORDER BY 'blog_id' DESC";
                  $query = mysqli_query($mysqli,$sql);
                  $i=0;
                  while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                  {
                  $i++;
                  ?>
                    <a class="nav-link" aria-current="page" href="<?php echo$site[site_name];?>/blog/<?php echo str_replace(" ","-",$row[blog_title]);?>-<?php echo$row[blog_id]?>"><i class="bi bi-caret-right"></i> <?php echo$row[blog_title]?></a>
                  <?php }?>

                  </li>
              </ul>
          </div>
          </nav>
        </div>

        </div><!---end nav col--->

        