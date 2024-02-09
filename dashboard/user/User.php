<?php
    session_start();
    include"../Check.php";
    include"../Config.php";

    $user="SELECT * FROM `site_user` WHERE `user_id`='$_GET[user_idx]'";
    $user = mysqli_query($mysqli, $user);
    $us=mysqli_fetch_array($user);
    $p="user";
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>ผู้ดูแลระบบ</title>
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
<script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">


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
                        <li class="breadcrumb-item active" aria-current="page">ผู้ดูแลระบบ <?php echo $_SESSION['user_id']?></li>
                    </ol>
                </nav>
    </div>
</div>

<div class="row">


    <div class="col-9 mb-4">                    
        <div class="card border-0 shadow">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="fs-5 fw-bold mb-0">ผู้ดูแลระบบ</h2>
                    </div>

                </div>
            </div>

        <!--content start-->
<div class="table-responsive">
<table class="table">
  <table class="table table-hover table-striped">
                                    <thead>
                                      <th width="10%" align="center"></th>
                                      <th width="40%">User Name</th>
                                      <th>Email</th>
                                      <th width="10%"><div align="center">จัดการ</div></th>
                                    </thead>
                                    <tbody>
<?php
    $sql = "SELECT * FROM `site_user`  ORDER BY `user_id` DESC";
    $query = mysqli_query($mysqli,$sql);
    $i=0;
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
  $i++;
?>
                                        <tr>
                                          <td class="text-center"><i class="bi bi-person-circle"></i></td>
                                          <td><?=$row[user_name]?></td>
                                          <td><?=$row[user_email]?></td>
                                          <td class="text-center">
                                            <a class="btn btn-info btn-xs" href="User.php?edit_user=1&user_idx=<?php echo $row[user_id] ?>" role="button">
                                                <i class="bi bi-pencil-square"></i> แก้ไข</a>




                                            <a class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="javascript:if(confirm('ยืนยันที่จะลบ?')==true){window.location='User.php?user_idx=<? echo $row[user_id]?>&delete_user=1';}" role="button"><i class="bi bi-trash"></i> ลบ</a>


                                          </td>

                                        </tr>
 <?
}
 ?>
                                    </tbody>
                                </table>
</table>
</div>






        <!--content end-->
        </div><!--end card-->
    </div> <!--end col--> 





    <div class="col-3 mb-4">                    
        <div class="card border-0 <?php if($_GET[edit_user]=='1'){?>bg-primary<?php }?> shadow">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <?php if($_GET[edit_user]=='1'){?>
                        <h2 class="fs-5 fw-bold mb-0 text-white">แก้ไขข้อมูลผู้ดูแลระบบ</h2>
                        <?php } else {?>
                        <h2 class="fs-5 fw-bold mb-0">เพิ่มผู้ดูแลระบบ </h2>
                        <?php }?>
                    </div>
                </div>
            </div>

<!--content start-->

<?php if($_GET[edit_user]=='1'){?>
<form method="post" action="" enctype="multipart/form-data">
                                    <div class="row p-4">



                                        <div class="col-md-12 pb-3">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                                                <input type="text" class="form-control" id="usernameValidate" value="<?php echo $us[user_name]?>" name="user_name" aria-describedby="basic-addon1">
                                            </div>
                                        </div>

                                        <div class="col-md-12 pb-3">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-fill"></i></span>
                                                <input type="email" class="form-control" value="<?php echo $us[user_email]?>" name="user_email" aria-describedby="basic-addon1">
                                            </div>
                                        </div>

                                        <div class="col-md-12 pb-3">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                                                <input type="password" class="form-control" value="<?php echo $us[user_password]?>" name="user_passwordx" id="user_passwordx"  aria-describedby="basic-addon1" > 
                                            </div>
                                        </div>


                                        <div class="col-md-12 pb-3">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                                                <input type="password" class="form-control" value="<?php echo $us[user_password]?>" name="confirm_passwordx" id="confirm_passwordx"  aria-describedby="basic-addon1" >
                                            </div>
                                            <span id='message'></span>
                                        </div>




                                        <div class="col-md-12 pb-3">
                                            <div class="form-group">
                                                <input type="hidden" name="update_user" value="1">
                                                <button type="submit" name="submit" class="btn btn-tertiary"><i class="bi bi-pencil-square"></i> แก้ไขข้อมูลผู้ดูแลระบบ</button>
                                                <a href="<?php echo$site[site_name];?>/dashboard/user/User.php" class="btn btn-secondary btn-fill px-2" role="button">ยกเลิก</a>
                                            </div>
                                        </div>

                                    </div><!--end row-->
</form>

<?php } else {?>

<form method="post" action="" enctype="multipart/form-data">
                                    <div class="row p-4">



                                        <div class="col-md-12 pb-3">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                                                <input type="text" class="form-control" id="usernameValidate" placeholder="ชื่อผู้ดูแลระบบ" name="user_name" aria-describedby="basic-addon1">
                                            </div>
                                        </div>

                                        <div class="col-md-12 pb-3">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-fill"></i></span>
                                                <input type="email" class="form-control" placeholder="อีเมล" name="user_email" aria-describedby="basic-addon1">
                                            </div>
                                        </div>

                                        <div class="col-md-12 pb-3">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                                                <input type="password" class="form-control" minlength="8" placeholder="รหัสผ่าน" name="user_password" id="user_password" aria-describedby="basic-addon1" > 
                                            </div>
                                        </div>


                                        <div class="col-md-12 pb-3">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                                                <input type="password" class="form-control" minlength="8" placeholder="ยืนยันรหัสผ่าน" name="confirm_password" id="confirm_password" aria-describedby="basic-addon1" >
                                            </div>
                                            <span id='message'></span>
                                        </div>




                                        <div class="col-md-12 pb-3">
                                            <div class="form-group">
                                                <input type="hidden" name="add_user" value="1">
                                                <button type="submit" class="btn btn-tertiary"><i class="bi bi-person-plus-fill"></i> เพิ่มผู้ดูแลระบบ</button>
                                            </div>
                                        </div>

                                    </div><!--end row-->
</form>

  
<?php }?>
            




<!--content end-->
        </div><!--end card-->
    </div> <!--end col-->                   
</div><!--end row-->

<?php

/*add user*/
if($_POST[add_user]=="1"){

$user_name = str_replace('"', '', $_POST[user_name]);
$user_email = base64_encode($_POST[user_email]);
$user_password = base64_encode($_POST[user_password]);
$hashed =$user_email.$user_password;


$sql = "INSERT INTO `site_user` (`user_name`,`user_email`,`user_password`,`user_type`) VALUES ('$user_name','$_POST[user_email]','$hashed','2')";
$query = mysqli_query($mysqli,$sql)or die("can not insert user");
 

echo"<script>alert('เพิ่มผู้ดูแลระบบแล้ว');window.location='User.php';</script>";

}


/*edit user*/
if($_POST[update_user]=="1"){

/*รับมาใหม่*/
$user_name = str_replace('"', '', $_POST[user_name]);
$user_email = base64_encode($_POST[user_email]);
$user_passwordx = base64_encode($_POST[user_passwordx]);
$hashed =$user_email.$user_passwordx;

/*จากฐานข้อมูล*/




if($_POST[user_passwordx]!=$us[user_password]){
     $update = "UPDATE `site_user` SET `user_name` = '".$user_name."',`user_email` = '".$_POST[user_email]."',`user_password` = '".$hashed."'  WHERE `user_id` = '".$_GET[user_idx]."' ";
    } else {  
         $update = "UPDATE `site_user` SET `user_name` = '".$user_name."',`user_email` = '".$_POST[user_email]."'  WHERE `user_id` = '".$_GET[user_idx]."' ";
            }

$query = mysqli_query($mysqli,$update) or die("can not update");


echo"<script>alert('แก้ไขรายการแล้ว');window.location='User.php';</script>";
}



/*Delete User*/
if($_GET[delete_user]=='1'){

    if($_SESSION['user_id']==$_GET[user_idx]){
        echo"<script>alert('คุณไม่สามารถลบผู้ดูแลระบบที่กำลังอยู่ในระบบได้');window.location='User.php';</script>"; 
    } else {

        $sql = "DELETE FROM `site_user` WHERE `user_id` = '".$_GET[user_idx]."' ";
        $query = mysqli_query($mysqli,$sql)or die("Can not delete User");

        echo"<script>alert('ลบผู้ดูแลระบบแล้ว');window.location='User.php';</script>";  
}
}

?>

<?php
//include"footer.php";
?>

</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
$('#user_password, #confirm_password').on('keyup', function () {
  if ($('#user_password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
</script>
<script type="text/javascript">
$('#user_passwordx, #confirm_passwordx').on('change', function () {
  if ($('#user_passwordx').val() == $('#confirm_passwordx').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
</script>

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
