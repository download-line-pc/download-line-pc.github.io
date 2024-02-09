<?php
    session_start();
    include"../Check.php";
    include"../Config.php";

    $blog="SELECT * FROM `blog` WHERE `blog_id`='$_GET[blog_id]'";
    $blog = mysqli_query($mysqli, $blog);
    $blog=mysqli_fetch_array($blog);
    $p="blog";



    if($_GET['rewrite']=='1'){

    $rewriter="SELECT * FROM `rewriter` ORDER BY `id` DESC";
    $rewriter = mysqli_query($mysqli, $rewriter);
    $rewriter=mysqli_fetch_array($rewriter);
    $nums=mysqli_num_rows($rewriter);
    

   
    for($x=0;$x<=$nums;$x++){


    $rewriterx="SELECT * FROM `rewriter` WHERE `id` = $rewriter[id]";
    $rewriterx = mysqli_query($mysqli, $rewriterx);
    $rewriterx=mysqli_fetch_array($rewriterx);

    $keyword=$rewriterx['keyword'];
    $kw_code=$rewriterx['kw_code'];
    $blog_detail = str_replace("$keyword","$kw_code", $blog['blog_detail']);


    
    




    }


    } else if ($_GET['rewriteTag']=='1'){

        $rewriter="SELECT * FROM `rewriter` ORDER BY `id` DESC";
        $rewriter = mysqli_query($mysqli, $rewriter);
        $rewriter=mysqli_fetch_array($rewriter);
        $nums=mysqli_num_rows($rewriter);

        for($x=0;$x<=$nums;$x++){

        $rewriterx="SELECT * FROM `rewriter` WHERE `id` = $rewriter[id]";
        $rewriterx = mysqli_query($mysqli, $rewriterx);
        $rewriterx=mysqli_fetch_array($rewriterx);


        $kw_code=$rewriterx['kw_code'];
        $content=$rewriterx['content'];
        $blog_detail=str_replace("$kw_code","$content", $blog['blog_detail']);
    }
    
    } else {

      $blog_detail=$blog['blog_detail'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>Edit Blog : <?php echo$blog[blog_title];?></title>
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
                        <li class="breadcrumb-item active" aria-current="page">Title : <?php echo$blog[blog_title];?></li>
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
                        <h2 class="fs-5 fw-bold mb-0">Edit : <?php echo$blog[blog_title];?></h2>
                    </div>
                </div>
            </div>

<!--content start-->

<form method="post" action="" enctype="multipart/form-data">
                                    <div class="row p-4">

                                        <div class="col-md-12 pb-3 bg">
                                          <div class="alert alert-warning" role="alert">
                                            <img src="<?php echo$blog['blog_img']?>" class="img-thumbnail">
                                            <div class="form-group">
                                            <label>แก้ไขภาพหลัก</label>
                                            <input name="fileUploadx" type="file" class="btn btn-default">
                                            </div>
                                          </div>
                                        </div>

                                        <div class="col-md-12 pb-3">
                                            <div class="form-group">
                                                <label>Blog Title</label>
                                                <div class="input-group">
                                                    <input type="text" name="blog_title" class="form-control" value="<?php echo$blog['blog_title'];?>" required>
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
                                                <textarea rows="5" id="editor" class="form-control" name="blog_detail"><?php echo $blog_detail;?></textarea>
                                                
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

                                        <div class="col-md-12 pb-3 bg">
                                          <div class="alert alert-warning" role="alert">
                                            <?php if($blog['download_img']!=''){?>
                                            <img src="<?php echo$blog['download_img']?>" class="img-thumbnail">
                                            <?php }?>
                                            <div class="form-group">
                                            <label>Image button</label>
                                            <input name="fileUpload" type="file" class="btn btn-default">
                                            </div>
                                          </div>
                                        </div>
                                
                                        <div class="col-md-12 pb-3">
                                            <div class="form-group">
                                                <input type="hidden" name="edit_blog" value="1">
                                                <input type="hidden" name="blog_id" value="<?php echo $blog['blog_id']?>">
                                                <button type="submit" class="btn btn-lg btn-tertiary btn-fill">Update</button>
                                                <a href="EditBlog.php?blog_id=<?php echo $_GET['blog_id']?>&rewrite=1" class="btn btn-lg btn-info btn-fill px-2" role="button">Rewriter</a>
                                                <a href="EditBlog.php?blog_id=<?php echo $_GET['blog_id']?>&rewriteTag=1" class="btn btn-lg btn-primary btn-fill px-2" role="button">Rewriter Tag</a>
                                                <a href="Blog.php" class="btn btn-lg btn-secondary btn-fill px-2" role="button">Cancel</a>
                                            </div>
                                        </div>

                                    </div><!--end row-->
</form>  

            




<!--content end-->
        </div><!--end card-->
    </div> <!--end col--> 



                      
</div><!--end row-->

<?php

if($_POST["edit_blog"]=="1"){


$ints = date('Gis');

      
echo $update = "UPDATE `blog` SET 
`blog_title` = '".$_POST[blog_title]."',
`blog_keyword` = '".$_POST[blog_keyword]."',
`blog_description` = '".$_POST[blog_description]."',
`blog_detail` = '".$_POST[blog_detail]."',
`blog_feature` = '".$_POST[blog_feature]."',
`show_top` = '".$_POST[show_top]."',
`download_link` = '".$_POST[download_link]."'
WHERE `blog_id` = '".$_POST[blog_id]."' ";
$query = mysqli_query($mysqli,$update) or die("can not update data");




/*blog img*/
if(trim($_FILES["fileUploadx"]["tmp_name"]) != ""){

$uploadedFile_type=$_FILES['fileUploadx']['type'];
if($uploadedFile_type=="image/JPG" || $uploadedFile_type=="image/jpg" || $uploadedFile_type=="image/JPEG" || $uploadedFile_type=="image/jpeg" || $uploadedFile_type=="image/pjpeg" || $uploadedFile_type=="image/pjpg" || $uploadedFile_type=="image/png"  || $uploadedFile_type=="image/PNG"){

//$images = $_FILES["fileUpload"]["tmp_name"];
$blog_img = "$ints".$_FILES["fileUploadx"]["name"];
$blog_img=$site['site_name']."/assets/img/".$blog_img;

copy($_FILES["fileUploadx"]["tmp_name"],"../../assets/img/$ints".$_FILES["fileUploadx"]["name"]);


$update_img = "UPDATE `blog` SET `blog_img` = '".$blog_img."' WHERE `blog_id` = '".$_POST[blog_id]."' ";
$query = mysqli_query($mysqli,$update_img) or die("can not update img");

}
}  


/*img button*/
if(trim($_FILES["fileUpload"]["tmp_name"]) != ""){

$uploadedFile_type=$_FILES['fileUpload']['type'];
if($uploadedFile_type=="image/JPG" || $uploadedFile_type=="image/jpg" || $uploadedFile_type=="image/JPEG" || $uploadedFile_type=="image/jpeg" || $uploadedFile_type=="image/pjpeg" || $uploadedFile_type=="image/pjpg" || $uploadedFile_type=="image/png"  || $uploadedFile_type=="image/PNG"){

//$images = $_FILES["fileUpload"]["tmp_name"];
$download_img = "$ints".$_FILES["fileUpload"]["name"];
$download_img=$site['site_name']."/assets/img/".$download_img;

copy($_FILES["fileUpload"]["tmp_name"],"../../assets/img/$ints".$_FILES["fileUpload"]["name"]);

$update_img = "UPDATE `blog` SET `download_img` = '".$download_img."' WHERE `blog_id` = '".$_POST[blog_id]."' ";
$query = mysqli_query($mysqli,$update_img) or die("can not update img_bt");

}
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