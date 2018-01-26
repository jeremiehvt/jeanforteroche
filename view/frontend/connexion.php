<?php $title = 'connection';?>

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
                      <form action="index.php?action=connectuser" method="POST" class="form-horizontal col-md-10">
                       <h3 class="form-group">Connexion</h3>

                        <div class="row">
                          <div class="form-group">
                            <label for="pseudo" class="col-md-1">pseudo</label>
                            <div class="col-md-3">
                              <input type="text" name="pseudo" id="pseudo" class="form-control" required>
                            </div>

                            <label for="password" class="col-md-1">mot de passe</label>
                            <div class="col-md-3">
                              <input type="password" name="password" id="password" class="form-control" required><a href="index.php?action=forgotpassword"><p class="help-block">j'ai oublié mon mot de passe.</p></a>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <input type="submit" class="btn btn-primary btn-sm" value="connexion"></input>
                        </div>
                      </form>
                    </div>
                  </div>
            </div>
          </div>

<?php $content = ob_get_clean();?>

<?php require ('body.php');?>
