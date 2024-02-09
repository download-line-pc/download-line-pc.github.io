<?php
//include"dashboard/Config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Step 3 - Site Config</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/css/design.css" rel="stylesheet">
<link href="../assets/css/volt.css" rel="stylesheet">
<link href="../assets/img/favicon.png" rel="shortcut icon"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
<section class="gray_bg py-5">
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Database Connect</li>
                        <li class="breadcrumb-item active" aria-current="page">Create Table</li>
                        <li class="breadcrumb-item active" aria-current="page">Site Config</li>
                    </ol>
            </nav>
            
            <form action="" method="post" enctype="multipart/form-data">
                <div class="bg-white  rounded p-5">


                    <div class="row">
                        <div class="col-md-8 offset-md-2 mb-4">
                            <h2><i class="bi bi-database"></i>SITE CONFIGURATION</h2>
                            <div class="form-group">
                                <label class="fs-4">Site URL</label>
                                <div class="input-group">
                                    <input class="form-control fs-3" name="site_name" type="text" placeholder="https//" required >
                                 </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-8 offset-md-2 mb-4">
                            <div class="form-group">
                                <label class="fs-4">Title</label>
                                <div class="input-group">
                                    <input class="form-control fs-3" name="site_title" type="text" placeholder="" required >
                                 </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-8 offset-md-2 mb-4">
                            <div class="form-group">
                                <label class="fs-4">Keywords</label>
                                <div class="input-group">
                                    <input class="form-control fs-3" name="site_keyword" type="text" placeholder="" required >
                                 </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 offset-md-2 mb-4">
                            <div class="form-group">
                                <label class="fs-4">Description</label>
                                <div class="input-group">
                                    <textarea class="form-control fs-3" name="site_description" rows="5" required></textarea>
                                 </div>
                            </div>
                        </div>
                    </div>





                    <div class="row">
                        <div class="col-md-8 offset-md-2 mb-4">
                            <div class="d-grid mt-3">
                                    <input type="hidden" name="site_config" value="1">
                                    <button type="submit" class="btn btn-lg btn-primary fs-3"><i class="bi bi-arrow-right"></i> NEXT</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="progress-wrapper">
                                <div class="progress-info">
                                    <div class="progress-label">
                                        <span class="text-success">Step 3</span>
                                    </div>
                                    <div class="progress-percentage">
                                        <span>50%</span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>

              


                </div>
            </form>

            <?php
            if($_POST['site_config']=='1'){
            include"../dashboard/Config.php";

            echo $sql = "INSERT INTO `site_config` (`site_id`,`site_name`,`site_title`,`site_keyword`,`site_description`) 
            VALUES ('1','$_POST[site_name]','$_POST[site_title]','$_POST[site_keyword]','$_POST[site_description]')";
            $query = mysqli_query($mysqli,$sql) or die ("can not insert data");

            echo"<script>window.location='step-4.php';</script>";
            }

            ?>
        </div>
    </div>
</div>
</section>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
<script src="../assets/js/volt.js"></script>
</html>