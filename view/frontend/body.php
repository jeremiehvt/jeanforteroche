<!DOCTYPE html>
<html>

    <head>
      <title><?=$title?></title>
      <link rel="stylesheet" type="text/css" href="public/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="public/css/custom.css">
      
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    </head>


    <body>
      
      <?php require_once 'header.php';?>
      <?=$content;?>
      <?php require_once 'footer.php';?>
      
    </body>


</html>