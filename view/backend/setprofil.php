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
                    <?php
                            foreach ($user as $data ) 
                              {?>
                      <form action="index.php?admin=updateprofil&amp;id=<?=$data->getID()?>" method="POST" class="form-horizontal col-md-12">
                        
                        <div class="row">
                          <div class="col-md-12">
                            <h3 class="form-group col-md-12">Votre profil</h3>
                            
                              
                            

                                <div class="raw">
                                  <div class="col-md-6">
                                  <div class="row">

                                    <div class="form-group col-md-12">
                                      <label for="pseudo" class="col-md-3">pseudo</label>
                                      <div class="col-md-9">
                                        <input type="text" name="pseudo" id="pseudo" class="form-control" value="<?=htmlspecialchars($data->getPseudo());?>" required>
                                      </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                      <label for="pseudo" class="col-md-3">email</label>
                                      <div class="col-md-9">
                                        <input type="email" name="email" id="email" class="form-control" value="<?=htmlspecialchars($data->getEmail());?>" required>
                                      </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                      <label for="password" class="col-md-3">mot de passe</label>
                                      <div class="col-md-9">
                                        <input type="password" name="password" id="password" class="form-control" >
                                      </div>
                                    </div>

                                  </div>
                                </div>
                                </div>

                                <div class="raw">
                                  <div class="col-md-6">
                                    <div class="row">
                                      <label for="bio" class="col-md-3">Biographie</label>
                                      <div class="form-group col-md-12">

                                        <textarea name="bio" id="bio" class="form-control col-md-12"><?=htmlspecialchars_decode(nl2br($data->getBio()));?></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group col-md-12">
                            <input type="submit" class="btn btn-primary btn-sm" value="valider">
                            </div>


                              <?php }
                            ?>
                            
                          </div> 
                        </div>



                      </form>
                    </div>
                  </div>
            </div>
          </div>

<?php $content = ob_get_clean();?>

<?php require ('body.php');?>
