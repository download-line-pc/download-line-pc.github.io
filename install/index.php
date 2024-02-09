<?php
include"dashboard/Config.php";
$p="install";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Step 1 - Database Connect</title>
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
                    </ol>
            </nav>

            <div class="bg-white  rounded p-5">

            <?php if($_POST['check_db']==''){?>
            <form action="" method="post" enctype="multipart/form-data">
                

                    <div class="row">
                        <div class="col-md-6 offset-md-3 mb-4">
                            <div class="form-group">
                                <label class="fs-4">HOST</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-stack"></i></div>
                                    <input class="form-control fs-3" name="host" type="text" value="localhost" required >
                                 </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 offset-md-3 mb-4">
                            <div class="form-group">
                                <label class="fs-4">DATABASE NAME</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-stack"></i></div>
                                    <input class="form-control fs-3" name="db_name" type="text" placeholder="" required >
                                 </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 offset-md-3 mb-4">
                            <div class="form-group">
                                <label class="fs-4">USER NAME</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-person-bounding-box"></i></div>
                                    <input class="form-control fs-3" name="user_name" type="text" placeholder="" required >
                                 </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 offset-md-3 mb-4">
                            <div class="form-group">
                                <label class="fs-4">DATABASE PASSWORD</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-key-fill"></i></div>
                                    <input class="form-control fs-3" name="db_password" type="text" placeholder="" required >
                                 </div>
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-md-6 offset-md-3 mb-4">
                            <div class="d-grid mt-3">
                                    <input type="hidden" name="check_db" value="1">
                                    <button type="submit" class="btn btn-lg btn-primary fs-3">CONNECT</button>
                            </div>
                        </div>
                    </div>

                    




                
            </form>

            <?php } else {

                $host=$_POST['host'];
                $username=$_POST['user_name'];
                $password=$_POST['db_password'];
                $database=$_POST['db_name'];

                //$mysqli = mysqli_connect("$host", "$username", "$password", "$database") or die ("Can't connect database! ");
                $mysqli = mysqli_connect("$host", "$username", "$password", "$database");



                if(!$mysqli){
            ?>
            <div class="alert alert-warning mt-3 text-danger fs-4 text-center" role="alert">Can not connect database!</div>
            <div class="row">
                    <div class="col-md-6 offset-md-3 mb-4">
                        <div class="d-grid mt-3">
                            <a class="btn btn-info mt-3" href="" role="button"><i class="bi bi-arrow-clockwise"></i> BACK</a>
                        </div>
                    </div>
             </div>

            <?php

                } else {

                ?>
            <form method="post" action="step-2.php">
                    <div class="row">
                        <div class="col-md-6 offset-md-3 mb-4">
                            <div class="alert alert-success mt-3 fs-4 text-center" role="alert"><i class="bi bi-check2-circle"></i> Database connect successfull</div>
                            <table class="table table-stripe">
                                <tr>
                                    <td width="40%">Host</td>
                                    <td><?php echo $_POST['host']?></td>
                                </tr>
                                <tr>
                                    <td>Database Name</td>
                                    <td><?php echo $_POST['db_name']?></td>
                                </tr>
                                <tr>
                                    <td>Database Username</td>
                                    <td><?php echo $_POST['user_name']?></td>
                                </tr>
                                <tr>
                                    <td>Database Username</td>
                                    <td><?php echo $_POST['db_password']?></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 offset-md-3 mb-4">
                            <div class="d-grid mt-3">
                                    <input type="hidden" name="create_table" value="1">
                                    <input type="hidden" name="host" value="<?php $host;?>">
                                    <input type="hidden" name="username" value="<?php echo $username;?>">
                                    <input type="hidden" name="password" value="<?php echo $password;?>">
                                    <input type="hidden" name="database" value="<?php echo $database;?>">
                                    <button type="submit" class="btn btn-lg btn-primary fs-3"><i class="bi bi-table"></i> CREATE TABLE</button>
                            </div>
                        </div>
                    </div>


            </form>
            <?php } } ?>

            <div class="row">
                        <div class="col-12">
                            <div class="progress-wrapper">
                                <div class="progress-info">
                                    <div class="progress-label">
                                        <span class="text-success">Step 1</span>
                                    </div>
                                    <div class="progress-percentage">
                                        <span>0%</span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width:0%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>

        </div><!--end white bg-->
            
        </div>
    </div>
</div>
</section>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
<script src="../assets/js/volt.js"></script>
</html>