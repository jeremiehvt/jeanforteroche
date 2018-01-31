<?php $title = 'connection';?>

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
                      <form action="index.php?action=update" method="POST" class="form-horizontal col-md-10">
                       <h4 class="form-group">Veuillez saisir votre nouveau mot de passe</h4>

                        <div class="row">
                          <div class="form-group">
                            
                            <div class="col-md-3">
                              <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <input type="submit" class="btn btn-danger btn-sm" value="validation"></input>
                        </div>
                      </form>
                    </div>
                  </div>
            </div>
          </div>

<?php $content = ob_get_clean();?>

<?php require ('body.php');?>
