<?php
include"../dashboard/Config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Step 5 - Installtion Complete</title>
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
                        <li class="breadcrumb-item active" aria-current="page">Finished</li>
                    </ol>
                </nav>

                <div class="bg-white  rounded p-5">

                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success text-center" role="alert"><h2><i class="bi bi-check2-circle"></i> INSTALLATION COMPLETE</h2></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-4 text-center">
                            <a class="btn btn-info" href="<?php echo $site['site_name']?>" role="button"><i class="bi bi-house"></i> Homepage</a>
                            <a class="btn btn-info" href="<?php echo $site['site_name']?>/dashboard/" role="button"><i class="bi bi-person-circle"></i> Dashboard</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="progress-wrapper">
                                <div class="progress-info">
                                    <div class="progress-label">
                                        <span class="text-success">Complete</span>
                                    </div>
                                    <div class="progress-percentage">
                                        <span>100%</span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            
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