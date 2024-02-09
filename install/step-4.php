<?php
include"dashboard/Config.php";

/*echo $sql = "INSERT INTO `site_config` (`site_id`,`site_name`,`site_title`,`site_keyword`,`site_description`) 
VALUES ('1','$_POST[site_name]','$_POST[site_title]','$_POST[site_keyword]','$_POST[site_description]')";
$query = mysqli_query($mysqli,$sql) or die ("can not insert data");
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Step 4 - Add User</title>
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
                        <li class="breadcrumb-item active" aria-current="page">Database connect</li>
                        <li class="breadcrumb-item active" aria-current="page">Create Table</li>
                        <li class="breadcrumb-item active" aria-current="page">Site config</li>
                        <li class="breadcrumb-item active" aria-current="page">Add user</li>
                    </ol>
            </nav>
            
 
            <form action="" method="post" enctype="multipart/form-data">
                <div class="bg-white  rounded p-5">

                    <div class="row">
                        <div class="col-md-6 offset-md-3 mb-4">
                            <h2><i class="bi bi-database"></i> Add user</h2>
                            <div class="form-group">
                                <label class="fs-4">E-mail</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-envelope"></i></div>
                                    <input class="form-control fs-3" name="user_email"  type="email" value="" required >
                                 </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 offset-md-3 mb-4">
                            <div class="form-group">
                                <label class="fs-4">Password</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-key"></i></div>
                                    <input class="form-control fs-3" name="user_password" id="user_password" type="password" required >
                                 </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 offset-md-3 mb-4">
                            <div class="form-group">
                                <label class="fs-4">Confirm Password</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-key"></i></div>
                                    <input class="form-control fs-3" name="confirm_password" type="password" id="confirm_password" aria-describedby="basic-addon1" required >
                                 </div>
                                 <span id='message' class="fs-3"></span>
                            </div>
                        </div>
                    </div>





                    <div class="row">
                        <div class="col-md-6 offset-md-3 mb-4">
                            <div class="d-grid mt-3">
                                    <input type="hidden" name="add_user" value="1">
                                    <button type="submit" class="btn btn-lg btn-primary fs-3"><i class="bi bi-arrow-right"></i> NEXT</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="progress-wrapper">
                                <div class="progress-info">
                                    <div class="progress-label">
                                        <span class="text-success">Step 4</span>
                                    </div>
                                    <div class="progress-percentage">
                                        <span>75%</span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </form>

            <?php
            if($_POST['add_user']=='1'){
            include"../dashboard/Config.php";

            //$user_name = str_replace('"', '', $_POST[user_name]);
            $user_email = base64_encode($_POST[user_email]);
            $user_password = base64_encode($_POST[user_password]);
            $hashed =$user_email.$user_password;


            $sql = "INSERT INTO `site_user` (`user_id`,`user_email`,`user_password`) VALUES ('1','$_POST[user_email]','$hashed')";
            $query = mysqli_query($mysqli,$sql)or die("can not insert user");
             
            echo"<script>window.location='step-5.php';</script>";
            }

            ?>

            
        </div>
    </div>
</div>
</section>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
$('#user_password, #confirm_password').on('keyup', function () {
  if ($('#user_password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
</script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
<script src="../assets/js/volt.js"></script>
</html>