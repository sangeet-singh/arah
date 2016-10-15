<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Creative - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $assets; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $assets; ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Plugin CSS -->
    <link href="<?php echo $assets; ?>vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="<?php echo $assets; ?>css/creative.min.css" rel="stylesheet">
    <link href="<?php echo $assets; ?>css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

   <div class="container vertical-center">
        <div class="row row-centered">
            <div class="col-centered">
                <div class="jumbotron jumbotron-login">
                    <h2>Login</h2>
                    <?php echo form_open($base_url . 'welcome/login', 'class="form-login"'); 
                        echo form_input('username', 'sangeet') . '<br / >';
                        echo form_password('password','') . '<br />';
                        echo form_submit('submit','submit');
                    ?>
                </div>
            </div>
        </div>
    </div>

<!-- jQuery -->
<script src=" <?php echo $assets; ?>js/jquery.min.js"></script>
<script src=" <?php echo $assets; ?>js/creative.min.js"></script>
<script src=" <?php echo $assets; ?>js/jquery.easing.min.js"></script>
<script src=" <?php echo $assets; ?>js/bootstrap.min.js"></script>

</body>
</html>