<?php $title = 'contact';?>

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
                      <form action="" method="POST" class="form-horizontal col-md-10">
                       <h3 class="form-group">Contact</h3>

                        <div class="row">
                          <div class="form-group">
                            <label for="nom" class="col-md-1">Nom</label>
                            <div class="col-md-3">
                              <input type="text" name="nom" id="nom" class="form-control">
                            </div>

                            <label for="prenom" class="col-md-1">Prénom</label>
                            <div class="col-md-3">
                              <input type="text" name="prenom" id="prenom" class="form-control">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group">
                            <label for="pesudo" class="col-md-1">pseudo</label>
                            <div class="col-md-3">
                              <input type="text" name="pseudo" id="pseudo" class="form-control">
                            </div>

                            <label for="mail" class="col-md-1">Mail</label>
                            <div class="col-md-3">
                              <input type="text" name="mail" id="mail" class="form-control">
                            </div>
                          </div>
                        </div>

                        

                        <div class="row">
                          <div class="form-group">
                            <div class="col-md-8">
                              <textarea type="text" name="message" id="nom" class="form-control" placeholder="votre message"></textarea>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-sm">envoyer</button>
                        </div>
                      </form>
                    </div>
                  </div>
            </div>
          </div>

<?php $content = ob_get_clean();?>

<?php require ('body.php');?>
