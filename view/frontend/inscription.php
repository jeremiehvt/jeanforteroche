<?php $title = 'contact';?>

<?php ob_start();?>

        

        
          <div class="container">
                <div class="raw">
                  <div class="col-md-6 " id="inscription">

                      <form action="index.php?user=new" method="POST" class="well col-md-12">
                       <h3 class="form-group">Inscription</h3>

                          <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" id="nom" class="form-control" required>
                          </div>

                          <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" name="prenom" id="prenom" class="form-control" required>
                          </div>
                          
                          <div class="form-group">
                            <label for="pesudo">pseudo</label>
                            <input type="text" name="pseudo" id="pseudo" class="form-control" required>
                          </div>
                          
                          <div class="form-group">
                            <label for="mail">Mail</label>
                            <input type="email" name="mail" id="mail" class="form-control" required>
                          </div>

                          <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                          </div>

                          <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">envoyer</button>
                          </div>

                    </form>
                  </div>
                </div>
            </div>
        

<?php $content = ob_get_clean();?>

<?php require ('body.php');?>
