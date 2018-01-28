<?php $title = 'profil';?>

<?php ob_start();?>

        <div class="container">
          <div class="raw">
            <div class="col-md-12"></div>
          </div>
        </div>

        <div class="jumbotron" id="contact">
          <div class="container">
              <div class="raw">
                <div class="col-md-12">
                  <h3 class="col-md-12">Votre Profil</h3>

                  <?php
                    foreach ($user as $data) 
                      { ?>
                        <div class="row">
                              <div class="col-md-6">
                                  <p class="col-md-3">pseudo : <?=htmlspecialchars($data->getPseudo());?></p>
                                  
                              </div>
                        </div>
                        <div class="row">
                              <div class="col-md-6">
                                  <p class="col-md-3">mail : <?=htmlspecialchars($data->getEmail());?></p>
                                  
                              </div>
                        </div>
                        <div class="row">
                              <div class="col-md-12">
                                  <p class="col-md-12">Biographie :</br><?=htmlspecialchars_decode(nl2br($data->getBio()));?></p>
                                  
                              </div>
                        </div>
                        <div class="row">
                              <div class="col-md-12">
                                  <a class="btn btn-default" href="index.php?admin=updateprofil">modifier mon profil</a>
                              </div>
                        </div>
                      <?php } 
                  ?>
                </div>
              </div>
          </div>
        </div>

<?php $content = ob_get_clean();?>

<?php require ('body.php');?>
