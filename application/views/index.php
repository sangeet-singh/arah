<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Questions</title>

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
        <nav class="bg navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" id="dash" href="<?php echo $base_url . "welcome/index"?>">Dashboard</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown" >
                    <a id="nav-li-border" class="dropdown-toggle" data-toggle="dropdown" href="#">
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
            <!-- /.navbar-static-side -->
        </nav>

        <div id="q-t-wrapper">
            <div class="container-fluid border">
                <div class="row">
                    <div class="q-t-heading">
                        <p class="text-center">Questions</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row q-t-content">
                    <table class="table q-t-table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>S.no</td>
                                <td>Question</td>
                                <td>Points</td>
                                <td>Difficulty</td>
                                <td>Enter</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sno = 1;
                                foreach($questions as $question){
                                    echo "<tr style=\"text-align:center\">";
                                    echo "<td>" . $sno . "</td>";
                                    echo "<td>" . ucfirst($question['title']) . "</td>";
                                    echo "<td>" . $question['points'] . "</td>";
                                    echo "<td>" . ucfirst($question['difficulty']) . "</td>";
                                    echo "<td>";
                                    echo "<a href=\"" . $base_url . "welcome\question/" . $question['qid'] . "\"> Enter </a>";
                                    echo "</td>";
                                    echo "</tr>";
                                    $sno = $sno + 1; 
                                }
                            ?>
                        </tbody>
                    </table>
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
