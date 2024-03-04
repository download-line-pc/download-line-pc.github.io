
<nav class="navbar navbar-expand-sm navbar-dark bg-secondary">

<div class="container-fluid">

    <a href="https://downloadlinepc.com" class="navbar-brand mitr-bold" style="padding-left: 10px;padding-right: 10px;background-color: #07b53b;">Download LINE PC</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggle">

        <span class="navbar-toggler-icon"></span>

    </button>

   
    <div class="collapse navbar-collapse justify-content-end" id="navbarToggle">

        <ul class="navbar-nav">

            <li class="nav-item">
                <a href="index.php" class="nav-link link-ligh sarabun-extrabold"><h6 class="sarabun-extrabold">หน้าหลัก</h6></a>
            </li>

            <li class="nav-item">
                <a href="howto-install.php" class="nav-link link-ligh sarabun-extrabold"><h6 class="sarabun-extrabold">วิธีติดตั้ง LINE PC</h6></a>
            </li>

            <li class="nav-item">
                <a href="download.php" class="nav-link link-ligh sarabun-extrabold"><h6 class="sarabun-extrabold">Download</h6></a>
            </li>          

            <li class="nav-item">
                <a href="aboutus.php" class="nav-link link-ligh sarabun-extrabold"><h6 class="sarabun-extrabold">เกี่ยวกับเรา</h6></a>
            </li>

            <li class="nav-item">
                <a href="contactus.php" class="nav-link link-ligh sarabun-extrabold"><h6 class="sarabun-extrabold">ติดต่อเรา</h6></a>
            </li>

        </ul>

    </div>


</div>

</nav>


<?php

$rand_img = rand(1,21);

$img_result;

switch ($rand_img) {
case "1":
$img_result = "img/header_01.jpg";
break;
case "2":
$img_result = "img/header_02.jpg";
break;
case "3":
$img_result = "img/header_03.jpg";
break;
case "4":
$img_result = "img/header_04.jpg";
break;
case "5":
$img_result = "img/header_05.jpg";
break;
case "6":
$img_result = "img/header_06.jpg";
break;
case "7":
$img_result = "img/header_07.jpg";
break;
case "8":
$img_result = "img/header_08.jpg";
break;
case "9":
$img_result = "img/header_09.jpg";
break;
case "10":
$img_result = "img/header_10.jpg";
break;
case "11":
$img_result = "img/header_11.jpg";
break;
case "12":
$img_result = "img/header_12.jpg";
break;
case "13":
$img_result = "img/header_13.jpg";
break;
case "14":
$img_result = "img/header_14.jpg";
break;
case "15":
$img_result = "img/header_15.jpg";
break;
case "16":
$img_result = "img/header_16.jpg";
break;
case "17":
$img_result = "img/header_17.jpg";
break;
case "18":
$img_result = "img/header_18.jpg";
break;
case "19":
$img_result = "img/header_19.jpg";
break;
case "20":
$img_result = "img/header_20.jpg";
break;
case "21":
$img_result = "img/header_21.jpg";
break;
default:
$img_result = "img/header_01.jpg";
}
?>

<div class="bg-image" style="background-image: url('<?php echo "$img_result" ?>');background-repeat: no-repeat; height: 100vh;">

   <div class="container" style="padding-top:350px;">
      <h1 class="mitr-bold">ดาวน์โหลด Line PC ภาษาไทย</h1>
      <h3>Download Line PC ภาษาไทย รุ่นใหม่ล่าสุด</h3>
    
        <a href="download.php" class="btn btn-primary bg-gradient" style="padding-left:150px;padding-right:150px; height: 60px; border: none;"><h1 class="mitr-regular">Download</h1></a>
 
    </div>

</div>

</div>