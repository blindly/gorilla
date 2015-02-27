<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Gorilla - Personal Finance</title>
        
        <!-- Bootstrap -->
        <link href="/static/external/bootstrap-3.3.2/bootstrap.min.css" rel="stylesheet">
        
        <!-- Bootstrap Theme Yeti -->
        <!-- <link href="/static/external/bootstrap-themes/bootstrap-yeti.min.css" rel="stylesheet"> -->
        
        <!-- Jquery UI -->
        <link href="/static/external/jquery-ui-1.11.3.custom/jquery-ui.min.css" rel="stylesheet">
        
        <!-- Custom Fonts -->
        <!--
        <link href="/static/external/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
        -->
        
        <!-- Custom styles for this template -->
        <link href="/static/css/navbar-fixed-top.css" rel="stylesheet">
        <link href="/static/css/style.css" rel="stylesheet">
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body>
        
        <!-- Fixed navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a href="/" class="navbar-brand">Gorilla</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                    <li><a href="/home">Home</a></li>
                    <?php if ( $gorillaUuid ) : ?>
                        <li><a href="/expenses">Expenses</a></li>
                        <li><a href="/mileage">Mileage</a></li>
                        <li><a href="/bills">Bills</a></li>
                        <li><a href="/user/u/<?= $gorillaUuid ?>">Personal Link</a></li>
                    <?php else: ?>
                        <li><a href="/user/register">Register</a></li>
                    <?php endif; ?>
                  <li><a href="/help">Help</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
        
        <div class="container-fluid">