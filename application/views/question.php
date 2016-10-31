<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $question[0]['title']?></title>

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

<body background="#fff">

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
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
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
                    <div class="q-title">
                        <p><?php echo $question[0]['title']?></p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row q-content">
                    <div class="col-md-10 q-problem">
                        <h3>Problem</h3>
                        <div class="m-t-30"><?php echo $question[0]['html']?></div>
                    </div>
                </div>
                <div class="row q-content" style="background:#fff">
                    <div class="col-md-2 col-md-offset-6 lang">
                        <strong style="padding-left:30px">Environment</strong>
                    </div>
                    <div class="col-md-2">
                        <span style="padding:10px 0">
                            <select name="editor-select" id="editor-select" class="form-control">
                                <option value="c_cpp">C/C++</option>
                                <option value="java">JAVA</option>
                                <option value="python">PYTHON</option>
                                <option value="javascript">JAVASCRIPT</option>
                            </select>
                        </span>
                    </div>
                </div>
                <div class="row" style="background:#fff">
                    <div class="col-md-10">
                        <input type="hidden" id="prev-code" 
                            value="<?php 
                                        if(isset($code)){
                                            echo $code;
                                    }?>
                                ">
                        <span id="editor1">
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 compile-form" >
                        <?php 
                            $editorCode['type'] = 'hidden';
                            $editorCode['name'] = 'editor1';
                            $editorCode['class'] = 'editor2';
                            $editorCode['value'] = '';
                            echo form_open($base_url . 'welcome/compile_all', 'class="form-login"');
                            echo form_input($editorCode);
                            echo form_submit('submit','Compile and Run', 'class="btn btn-primary"');
                        ?>
                    </div>
                </div>
                <?php if(isset($code)){ ?>
                    <div class="row">
                        <div class="col-md-10 highlight-box">
                            <p>
                                <?php foreach ($error_message as $error) {
                                    echo $error . '<br>';

                                }
                                ?>
                            </p>

                        </div>
                    </div>
                <?php }?>
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
    <!--CodeMirror-->
    <script src="<?php echo $assets; ?>vendor/ace-builds/src-noconflict/ace.js"></script>
    <script>
        var editor = ace.edit("editor1");
        editor.setTheme("ace/theme/ambiance");
        editor.getSession().setMode("ace/mode/c_cpp");
        editor.setShowPrintMargin(false);
        editor.setValue($('#prev-code').val(),-1);
        $(document).ready(function(){
            $('#editor-select').on('change',function(){
                var env = this.value;
                editor.getSession().setMode("ace/mode/" + env);
            });
            $('.btn-primary').click(function(e){
                var data = editor.getValue();
                $('.editor2').val(data);
                
            });
        });
    </script>
</body>
</html>
