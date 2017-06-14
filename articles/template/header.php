<?php
  if(!defined('RESTRICTED'))exit('No direct script access allowed!');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>:: Ongis School ::</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="<?php echo $baseUrl; ?>assets/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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
            <a class="navbar-brand" href="<?php echo $baseUrl; ?>">Ongis School</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php
                $pageOnArticle = (!empty($_GET['page'])) ? $_GET['page'] : null;
                if($pageOnArticle != "articles"){
                  echo "<li class=\"active\"><a href=\"$baseUrl\" class=\"active\">Home</a></li>";
                  echo "<li><a href=\"$baseUrl". "index.php?page=articles\">Articles</a></li>";
                }
                else {
                  echo "<li><a href=\"$baseUrl\" class=\"active\">Home</a></li>";
                  echo "<li class=\"active\"><a href=\"$baseUrl"."index.php?page=articles\">Articles</a></li>";
                }
                ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<!-- end of Fixed navbar -->
