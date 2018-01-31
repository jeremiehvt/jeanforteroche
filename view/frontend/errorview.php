<?php $title = 'erreur';?>

<?php ob_start();?>

        
        <div class="jumbotron" id="headerseparator">
          <div class="container">
            <div class="col-md-12"></div>
          </div>
        </div>

        <div class="jumbotron" id="contact">
          <div class="container">
                <div class="row">
                  <div class="col-md-12">
                      
                       

                      <h3><?=$errormessage;?></h3>
                      <h4><a href="index.php"></a></h4>

                    </div>
                  </div>
            </div>
          </div>

<?php $content = ob_get_clean();?>

<?php require ('body.php');?>
