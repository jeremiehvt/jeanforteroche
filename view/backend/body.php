
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
      <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=mjxbftrvqwoj0x1uy323jwu9eyababfvh542tk4s2ktxee11"></script>
      <script type="text/javascript">
        tinymce.init({selector: 'textarea',language_url : 'lang/fr_FR.js',branding : false, menubar : false});
      </script>


    </head>


    <body>
      
      <?php require('header.php'); ?>
      
      <?=$content;?>

      <?php require ('footer.php');?>
      
    </body>


</html>