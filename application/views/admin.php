<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Admin</title>

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
    <script type="text/javascript" src="<?php echo $assets; ?>plugins/ckeditor/ckeditor.js"></script>

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
                    <h1 class="page-header">Add Questions</h1>
                </div>
            </div>
            <div class="row highlight-box">
                <div class="col-md-10">
                    <br>
                    <?php
                        $qid = array(
                                'type' => 'number',
                                'name' => 'qid',
                                'class' => 'form-control',
                                'required' => 'required'
                                );
                        $points = array(
                                'type' => 'number',
                                'name' => 'points',
                                'class' => 'form-control',
                                'required' => 'required'
                                );
                        $options = array(
                                'Easy' => 'Easy',
                                'Medium' => 'Medium',
                                'Difficulty' => 'Difficulty'
                                );
                        $question = array(
                                'name' => 'html',
                                'class' => 'form-control',
                                'id' => 'ck-question',
                                'required' => 'required'
                                );
                        $title = array(
                                'name' => 'title',
                                'class' => 'form-control',
                                'required' => 'required'
                                );
                        $result = array(
                                'name' => 'result',
                                'class' => 'form-control',
                                'id' => 'ck-result',
                                'required' => 'required'
                                );
                        $input = array(
                                'name' => 'input',
                                'class' => 'form-control',
                                'id' => 'ck-input',
                                'required' => 'required'
                                );
                        echo form_open($base_url . 'welcome/add_question', 'class="form-group"'); 
                        echo "Question Number " . form_input($qid) . '<br / >';
                        echo "Points " . form_input($points) . '<br / >';
                        echo "Difficulty " . form_dropdown('difficulty',$options,'Easy','class="form-control"') . '<br / >';
                        echo "Title" . form_input($title) . '<br/>';
                        echo "Question " . form_textarea($question);
                        echo "Input File " . form_textarea($input);
                        echo "Result File " . form_textarea($result);
                        echo form_submit('submit','submit','class="form-control btn btn-primary btn-custom ques-submit"');
                    ?>
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
