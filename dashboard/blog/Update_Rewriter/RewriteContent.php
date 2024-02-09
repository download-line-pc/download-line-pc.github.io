<?php
    session_start();
    include"../Check.php";
    include"../Config.php";

    $blog="SELECT * FROM `blog` WHERE `blog_id`='$_GET[blog_id]'";
    $blog = mysqli_query($mysqli, $blog);
    $blog=mysqli_fetch_array($blog);
    $p="blog";

    
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>Rewrite content : <?php echo $blog['blog_title'];?></title>
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
<script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/super-build/ckeditor.js"></script>

<style>
            #container {
                width: 1000px;
                margin: 20px auto;
            }
            .ck-editor__editable[role="textbox"] {
                /* editing area */
                min-height: 300px;
            }
            .ck-content .image {
                /* block images */
                max-width: 80%;
                margin: 20px auto;
            }
        </style>


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
                        <li class="breadcrumb-item"><a href="<?php echo$site[site_name];?>/dashboard/blog/Blog.php">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Rewrite content : <?php echo $blog['blog_title'];?></li>
                    </ol>
                </nav>
    </div>
</div>

<div class="row">

    <div class="col-12 mb-4">                    
        <div class="card border-0 shadow">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="fs-5 fw-bold mb-0">Rewrite content : <?php echo $blog['blog_title'];?></h2>
                    </div>
                </div>
            </div>

<!--content start-->

<form method="post" action="" enctype="multipart/form-data">
                                    <div class="row p-4">

                                        <div class="col-md-12 pb-3 bg">
                                          <div class="alert alert-warning" role="alert">
                                            <img src="<?php echo$blog[blog_img]?>" class="img-thumbnail">
                                          </div>
                                        </div>

                                        <div class="col-md-12 pb-3">
                                            <div class="form-group">
                                                <label>Blog Title</label>
                                                <div class="input-group">
                                                    <input type="text" name="blog_title" class="form-control" value="<?php echo$blog[blog_title];?>" required>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12 pb-3">
                                            <div class="form-group">
                                                <label>Blog Keywords</label>
                                                <div class="input-group">
                                                    <input type="text" name="blog_keyword" class="form-control" value="<?php echo$blog[blog_keyword];?>" required>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12 pb-3">
                                            <div class="form-group">
                                                <label>Blog Description</label>
                                                <div class="input-group">
                                                    <input type="text" name="blog_description" class="form-control" value="<?php echo$blog['blog_description'];?>" required>
                                                </div>
                                            </div>
                                        </div>


                                        

                                        


                                        <div class="col-md-12 pb-3">
                                            <div class="form-group">
                                                <label>รายละเอียด</label>
                                                <textarea rows="5" id="editor" class="form-control" name="blog_detail"><?php echo $blog['blog_detail'];?></textarea>
                                                
                                            </div>
                                        </div>



                                        <div class="col-md-12 pb-3">

                                            <div class="form-group">
                                                <label>Feature</label>
                                                <div class="input-group">
                                                    <input class="form-check-input" type="radio" <?php if ($blog[blog_feature]=='1') { ?> checked <?php }?> name="blog_feature" value="1">
                                                    <label class="form-check-label mx-2">Yes</label>
                                                </div>
                                                <div class="input-group">
                                                    <input class="form-check-input" type="radio" <?php if ($blog[blog_feature]=='0') { ?> checked <?php }?> name="blog_feature" value="0">
                                                    <label class="form-check-label mx-2">No</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-12 pb-3">

                                            <div class="form-group">
                                                <label>แสดงรูปด้านบน</label>
                                                <div class="input-group">
                                                    <input class="form-check-input" type="radio" <?php if ($blog[show_top]=='1') { ?> checked <?php }?> name="show_top" value="1">
                                                    <label class="form-check-label mx-2">Yes</label>
                                                </div>
                                                <div class="input-group">
                                                    <input class="form-check-input" type="radio" <?php if ($blog[show_top]=='0') { ?> checked <?php }?> name="show_top" value="0">
                                                    <label class="form-check-label mx-2">No</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-12 pb-3">
                                            <div class="form-group">
                                                <label>Download Link</label>
                                                <div class="input-group">
                                                    <input type="text" name="download_link" class="form-control" value="<?php echo$blog['download_link'];?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 pb-3">
                                            <div class="form-group">
                                                <label>Money site</label>
                                                <div class="input-group">
                                                    <input type="text" name="money_site" class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 pb-3 bg">
                                          <div class="alert alert-warning" role="alert">
                                            <?php if($blog['download_img']!=''){?>
                                            <img src="<?php echo$blog['download_img']?>" class="img-thumbnail">
                                            <?php }?>
                                          </div>
                                        </div>
                                
                                        <div class="col-md-12 pb-3">
                                            <div class="form-group">
                                                <input type="hidden" name="AddRewrite" value="1">
                                                <input type="hidden" name="blog_img" value="<?php echo $blog['blog_img']?>">
                                                <input type="hidden" name="download_img" value="<?php echo $blog['download_img']?>">
                                                <input type="hidden" name="blog_id" value="<?php echo $blog['blog_id']?>">
                                                <button type="submit" class="btn btn-tertiary btn-fill">Add rewrite</button>
                                                <a href="Blog.php" class="btn btn-secondary btn-fill px-2" role="button">Cancel</a>
                                            </div>
                                        </div>

                                    </div><!--end row-->
</form>  

            




<!--content end-->
        </div><!--end card-->
    </div> <!--end col--> 

                      
</div><!--end row-->

<?php

if($_POST["AddRewrite"]=="1"){


$ints = date('Ymdhisa');
$today_date = date('Ymd');


    $sql = "SELECT * FROM `remote` ORDER BY `host_id` ASC";
    $result = mysqli_query($mysqli,$sql);
    $rowcount=mysqli_num_rows($result);
    $row=mysqli_fetch_array($query);


include"spin.php";

$spinner = new Spinner();

// it supports variable, just set and place in your template. eg {varname}
//$spinner->set('varname1', 'addicted to ThaiSEOBoard');

// this is raw text you want to spin, supports variable and nested spin block
//$template = "{{You should not|You shouldn't|You ought not|It's not necassary to}|{You shouldn't|You should not|You mustn't|You must not}|{You ought not|It's not necassary to|You must not}|{It's not necassary to|You shouldn't|You cannot|You ought not}} {varname1}";





    for($x=1;$x<=$rowcount;$x++){$row=mysqli_fetch_array($result);


 echo $hostx=$row['host_ip'];
 echo "<br/>";
 echo  $usernamex=$row['host_user'];
 echo "<br/>";
 echo $passwordx=$row['host_pass'];
 echo "<br/>";
 echo $databasex=$row['host_db'];
 echo "<br/>";
 echo "DATABASE $x";
 echo "<br/>";

$mysqlix = mysqli_connect("$hostx", "$usernamex", "$passwordx", "$databasex") or die ("Can't connect database! $usernamex ");
$mysqlix->query("set names utf8");


$blog="SELECT * FROM `blog` ORDER BY `blog_id` DESC";//new_id
$blog = mysqli_query($mysqlix, $blog);
$blog=mysqli_fetch_array($blog);
$blog_id =$blog['blog_id']+1;
if($blog_id ==1){
$blog_id =101;}


// call spin() method when you are ready
$blog_title=$spinner->spin($_POST['blog_title']);
$blog_keyword=$spinner->spin($_POST['blog_keyword']);
$blog_description=$spinner->spin($_POST['blog_description']);
$blog_detail=$spinner->spin($_POST['blog_detail']);



//$result=array["<strong>$blog_keyword</strong>","<u><strong>$blog_keyword</strong></u>","<u>$blog_keyword</u>","<u><i>$blog_keyword</i></u>"];

$ran_color = rand(1,2);

if ($ran_color==1){
    $random_color="red";
    } 
    else if($ran_color==2){
        $random_color="green";
    }


$rand_result = rand(1,4);


if  ($rand_result == 1) {
$random_result = "<font style=\"color:$random_color\"><strong>$blog_keyword</strong></font>";
} 
    else if ($rand_result == 2){
    $random_result = "<font style=\"color:$random_color\"><u><strong>$blog_keyword</strong></u></font>";
    } 
        else if ($rand_result == 3){
        $random_result = "<u>$blog_keyword</u>";
        } 
            else if ($rand_result == 4){
            $random_result = "<u><i>$blog_keyword</i></u>";
            }


$blog_detailx=str_replace("$blog_keyword", "$random_result", "$blog_detail");

//สุ่มurlnetwork
    $network = "SELECT * FROM `remote` ORDER BY rand()";
    $network = mysqli_query($mysqli,$network);
    $network=mysqli_fetch_array($network);


$sqlx = "INSERT INTO `blog` 
(`blog_id`,
`blog_title`,
`blog_keyword`,
`blog_description`,
`blog_detail`,
`blog_feature`,
`blog_img`,
`show_top`,
`download_link`,
`download_img`,
`money_site`,
`network_url`,
`link_well`) 
VALUES 
('$blog_id',
'$blog_title',
'$blog_keyword',
'$blog_description',
'$blog_detailx',
'$_POST[blog_feature]',
'$_POST[blog_img]',
'$_POST[show_top]',
'$_POST[download_link]',
'$_POST[download_img]',
'$_POST[money_site]',
'$network[host_url]',
'$link_wellx')";
$query = mysqli_query($mysqlix,$sqlx) or die ("can not insert data to $usernamex");


$blog_url=$row['host_url']."/"."blog/".$blog_title."/".$blog_id."/";
//$blog_url="xxxxx";

echo $add_random_blog = "INSERT INTO `random_blog` (`blog_url`,`blog_title`) VALUES ('$blog_url','$blog_title')";
$query_random = mysqli_query($mysqli,$add_random_blog) or die ("can not insert data to random_blog");

}



 echo"<script>window.location='Blog.php';</script>";
}

?>

<?php
//include"footer.php";
?>

</main>

<script>
            // This sample still does not showcase all CKEditor 5 features (!)
            // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
            CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
                // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                toolbar: {
                    items: [
                        'exportPDF','exportWord', '|',
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                        'textPartLanguage', '|',
                        'sourceEditing'
                    ],
                    shouldNotGroupWhenFull: true
                },
                // Changing the language of the interface requires loading the language file using the <script> tag.
                // language: 'es',
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                    ]
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                placeholder: 'Welcome to CKEditor 5!',
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                fontSize: {
                    options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                    supportAllValues: true
                },
                // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                htmlSupport: {
                    allow: [
                        {
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        }
                    ]
                },
                // Be careful with enabling previews
                // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                htmlEmbed: {
                    showPreviews: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                mention: {
                    feeds: [
                        {
                            marker: '@',
                            feed: [
                                '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                                '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                                '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                                '@sugar', '@sweet', '@topping', '@wafer'
                            ],
                            minimumCharacters: 1
                        }
                    ]
                },
                // The "super-build" contains more premium features that require additional configuration, disable them below.
                // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                removePlugins: [
                    // These two are commercial, but you can try them out without registering to a trial.
                    // 'ExportPdf',
                    // 'ExportWord',
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                    // Storing images as Base64 is usually a very bad idea.
                    // Replace it on production website with other solutions:
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                    // 'Base64UploadAdapter',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                    // from a local file system (file://) - load this site via HTTP server if you enable MathType
                    'MathType'
                ]
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
