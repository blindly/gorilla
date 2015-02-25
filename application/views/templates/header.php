<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Gorilla App</title>
        
        <!-- CSS -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
        
        
        <!-- CSS Yeti -->
        <!--<link href="/static/external/bootstrap-themes/bootstrap-yeti.min.css" rel="stylesheet">-->
        
        <!-- Custom styles for this template -->
        <link href="/static/css/navbar-fixed-top.css" rel="stylesheet">
        <link href="/static/css/style.css" rel="stylesheet">
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
              <a class="navbar-brand" href="/">Gorilla</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="/">Expenses</a></li>
                <li><a href="#mgp">MPG</a></li>
                <li><a href="#reports">Reports</a></li>
                <li><a href="/user/uuid/<?= $gorillaUuid ?>">Access Link</a></li>
              </ul>
            <!--
              <ul class="nav navbar-nav navbar-right">
                <li><a href="../navbar/">Default</a></li>
                <li><a href="../navbar-static-top/">Static top</a></li>
                <li class="active"><a href="./">Fixed top <span class="sr-only">(current)</span></a></li>
              </ul>
            -->
            </div><!--/.nav-collapse -->
          </div>
        </nav>