<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - User</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $assets; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $assets; ?>css/custom.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $assets; ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Plugin CSS -->
    <link href="<?php echo $assets; ?>vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->

    <link href="<?php echo $assets; ?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $assets; ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $base_url . "welcome/index"?>">Dashboard</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li>
                            <?php 
                                echo form_open($base_url. 'welcome/logout/','id="logout"'); 
                                echo form_close();
                            ?>
                            <a href="#" class="logout-btn"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo $base_url . "welcome/index"?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo $base_url . "welcome/allquestions"?>"><i class="fa fa-fort-awesome fa-fw"></i> Contest</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Personal Information</h1>
                </div>
            </div>
            <div class="row highlight-box row-50">
                <div class="col-lg-6 ">
                    <div class="m-a-10">
                        <ul class="list-unstyled">
                            <li><p class="text-right">Name:</p></li>
                            <li><p class="text-right">Institute:</p></li>
                            <li><p class="text-right">Branch:</p></li>
                            <li><p class="text-right">Year:</p></li>
                        </ul>
                    </div>
                </div>
                    <div class="m-a-10">
                        <ul class="list-unstyled">
                            <li><p><?php echo $name;?></p></li>
                            <li><p><?php echo $institute;?></p></li>
                            <li><p><?php echo $branch;?></p></li>
                            <li><p><?php echo $year;?></p></li>
                        </ul>
                    </div>
                <div class="col-lg-6">
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->


    <script src="<?php echo $assets; ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo $assets; ?>vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo $assets; ?>js/jquery.easing.min.js"></script>
    <script src="<?php echo $assets; ?>vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="<?php echo $assets; ?>vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('.logout-btn').click(function(){
            $('#logout').submit();
        });
    });
    </script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo $assets; ?>vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo $assets; ?>js/sb-admin-2.min.js"></script>

</body>

</html>
