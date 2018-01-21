
<?php $title = 'modification d\'un article';?>

<?php ob_start();?>

<div class="jumbotron" id="contact">
          <div class="container">
                <div class="raw">
                  <div class="col-md-12">
                      <form action="index.php?admin=updatepost&id=<?=$_GET['id']?>" method="POST" class="form-horizontal col-md-10">
                       <h3 class="form-group">Modifier votre article</h3>
                          <?php 
                          foreach ($post as $data)
                          {?>


                       
                                  <div class="row">
                                    <div class="form-group">
                                      <label for="title" class="col-md-1">titre</label>
                                      <div class="col-md-3">
                                        <input type="text" name="title" id="title" class="form-control" value="<?=htmlspecialchars($data->getTitle());?>" required>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="form-group">
                                      <div class="col-md-8">
                                        <textarea type="text" name="post" id="post" class="form-control" required>
                                          
                                              <?=htmlspecialchars_decode(nl2br($data->getPost()));?>
                                         
                                            
                                          
                                        </textarea>
                                      </div>
                                    </div>
                                  </div>

                              <?php } ?>

                              


                        <div class="form-group">
                          <input type="submit" class="btn btn-primary btn-sm" value="publier">
                        </div>
                      </form>
                    </div>
                  </div>
            </div>
          </div>

<?php $content = ob_get_clean();?>

<?php require ('body.php');?>