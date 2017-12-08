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
                      <form action="index.php?sendmail" method="POST" class="form-horizontal col-md-10">
                       <h3 class="form-group">Contact</h3>

                        <div class="row">
                          <div class="form-group">
                            <label for="email" class="col-md-1">mail</label>
                            <div class="col-md-3">
                              <input type="email" name="email" id="email" class="form-control" required>
                            </div>

                            <label for="subject" class="col-md-1">subject</label>
                            <div class="col-md-3">
                              <input type="text" name="subject" id="subject" class="form-control" required>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group">
                            <div class="col-md-8">
                              <textarea type="text" name="message" id="message" class="form-control" placeholder="votre message"></textarea>
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
