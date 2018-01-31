
<?php $title = 'ajout d\'un article';?>

<?php ob_start();?>

<div class="jumbotron" id="work">
  <div class="container">
  <h1>Ajouter un article</h1>
  
  </div>
</div>

          <div class="container">
                <div class="row">
                  <div class="col-md-12">
                      <form action="index.php?admin=addpost" method="POST" class="form-horizontal col-md-10">
                      
                       
                        <div class="row">
                          <div class="form-group">
                            <label for="subject" class="col-md-1">titre</label>
                            <div class="col-md-3">
                              <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group">
                            <div class="col-md-8">
                              <textarea type="text" name="post" id="post" class="form-control" required>
                              </textarea>
                              <p class="help-block">Vous pouvez agrandir la fenêtre de texte</p>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-2">
                              <input type="submit" class="btn btn-primary btn-sm btn-block" value="publier">
                            </div>
                          </div>
                          
                        </div>
                      </form>
                    </div>
                  </div>
            </div>


<?php $content = ob_get_clean();?>

<?php require ('body.php');?>