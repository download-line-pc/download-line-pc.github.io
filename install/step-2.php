<?php
//include"dashboard/Config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Step 2 - Create Table</title>
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
                    </ol>
            </nav>

            <form action="step-3.php" method="post" enctype="multipart/form-data">
                <div class="bg-white  rounded p-5">

                    <div class="row">
                        <div class="col-md-6 offset-md-3 mb-4">
                          <h2><i class="bi bi-database"></i> CREATE TABLE</h2>
                            <?php
                              if ($_POST['create_table']=='1'){
                                echo $host=$_POST['host'];
                                $username=$_POST['username'];
                                $password=$_POST['password'];
                                $database=$_POST['database'];

                                // Create connection
                                $conn = new mysqli($host, $username, $password, $database);
                                // Check connection
                                if ($conn->connect_error) {
                                  die("Connection failed: " . $conn->connect_error);
                                }


                                // sql to create table
                                //$sql = "";

                                // sql to create table blog
                                $blog = "CREATE TABLE `site_config` (
                                `site_id` int(1) NOT NULL,
                                `site_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
                                `site_title` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
                                `site_keyword` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
                                `site_description` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
                                `site_logo` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
                                `site_color` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
                                `footer_desc` text COLLATE utf8_unicode_ci DEFAULT NULL,
                                `key_1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
                                `key_1_url` text COLLATE utf8_unicode_ci DEFAULT NULL,
                                `key_2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
                                `key_2_url` text COLLATE utf8_unicode_ci DEFAULT NULL,
                                `key_3` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
                                `key_3_url` text COLLATE utf8_unicode_ci DEFAULT NULL,
                                `modal_img` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
                              ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";


                                if ($conn->query($blog) === TRUE) {
                                  echo "Table blog created successfully";
                                  echo "<br>";
                                } else {
                                  echo "Error creating table: " . $conn->error;
                                  echo "<br>";
                                }



                                // sql to create table user
                                $user = "CREATE TABLE `site_user` (
                                `user_id` int(10) NOT NULL,
                                `user_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
                                `user_password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
                                `user_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
                                `user_image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
                                `user_type` int(1) DEFAULT NULL,
                                `insert_date` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
                                `last_update` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
                              ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";


                                if ($conn->query($user) === TRUE) {
                                  echo "Table user created successfully";
                                  echo "<br>";
                                } else {
                                  echo "Error creating table: " . $conn->error;
                                  echo "<br>";
                                }



                                
                                // sql to create table blog
                                $blog = "CREATE TABLE `blog` (
                                `blog_id` int(10) NOT NULL,
                                `blog_title` text NOT NULL,
                                `blog_keyword` text NOT NULL,
                                `blog_description` text NOT NULL,
                                `blog_detail` longtext NOT NULL,
                                `blog_feature` varchar(1) NOT NULL,
                                `blog_img` varchar(300) NOT NULL,
                                `show_top` int(1) NOT NULL,
                                `download_link` varchar(300) DEFAULT NULL,
                                `download_img` varchar(300) DEFAULT NULL,
                                `money_site` varchar(500) DEFAULT NULL,
                                `network_url` varchar(300) DEFAULT NULL,
                                `link_well` varchar(300) DEFAULT NULL
                              ) ENGINE=InnoDB DEFAULT CHARSET=utf8";


                                if ($conn->query($blog) === TRUE) {
                                  echo "Table blog created successfully";
                                  echo "<br>";
                                } else {
                                  echo "Error creating table: " . $conn->error;
                                  echo "<br>";
                                }



                                // sql to create table corousel
                                $carousel = "CREATE TABLE `carousel` (
                              `cs_id` int(10) NOT NULL,
                              `img_src` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
                              `cs_link` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
                              `cs_sequence` int(2) NOT NULL,
                              `cs_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
                              `cs_desc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
                              `cs_lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL
                            ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";


                                if ($conn->query($carousel) === TRUE) {
                                  echo "Table carousel created successfully";
                                  echo "<br>";
                                } else {
                                  echo "Error creating table: " . $conn->error;
                                  echo "<br>";
                                }





                                $conn->close();
                              }
                            ?>
                            
                        </div>
                    </div>





                    <div class="row">
                        <div class="col-md-6 offset-md-3 mb-4">
                            <div class="d-grid mt-3">
                                    <button type="submit" class="btn btn-lg btn-primary fs-3"><i class="bi bi-arrow-right"></i> NEXT</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="progress-wrapper">
                                <div class="progress-info">
                                    <div class="progress-label">
                                        <span class="text-success">Step 2</span>
                                    </div>
                                    <div class="progress-percentage">
                                        <span>25%</span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>

              


                </div>
            </form>

            
        </div>
    </div>
</div>
</section>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
<script src="../assets/js/volt.js"></script>
</html>