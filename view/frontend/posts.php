
<?php $title = 'home';?>

<?php ob_start();?>

<section class="container" id="selectedpostpage">
  <div class="raw">
   
      <section class="col-md-12">
        <div class="raw">
            
                  <div class="thumbnail col-md-6" id="selectedpost">
                    <?php
                      while ($data = $post->fetch()) 
                        { ?>
                          <h2><?=htmlspecialchars($data['select_title'])?></h2>
                          <p><em>le <?=htmlspecialchars($data['date_post'])?></em></p>
                          <h4><?=htmlspecialchars($data['select_post'])?></h4>
                        <?php }
                      $post->closeCursor();
                    ?>
                  </div>
               
                
                  <div class="col-md-6">
                  <div class="raw">

                    <div class="col-md-8">
                    <h3 class="headers">Commentaires</h3>
                      <?php
                        while ($data = $postComments->fetch()) 
                          {?>
                            <h5><strong><?=htmlspecialchars($data['pseudo'])?></strong> <em>le <?=htmlspecialchars($data['date_comment'])?></em></h5>
                            <h5><?=htmlspecialchars($data['comment'])?></h5>
                          <?php }
                        $post->closeCursor();
                      ?>
                    </div>
                    <div class="col-md-8">
                          <form class="form-inline" method="POST" action="index.php?commentid=<?=$data['id']?>">
                            <div class="input-group col-lg-8">
                              <input type="text" name="comment" id="comment" placeholder="commentaires" class="form-control">
                              <span class="input-group-btn"><button class="btn btn-default" type="submit">envoyer</button></span>
                            </div>
                          </form>
                      </div>

                  

                    </div>
                  </div>
                  
              
              
          
          <div class="thumbnail col-md-10" id="otherposts">
            <h3>Les autres Billets</h3>
            <?php
              while ($data = $allposts->fetch()) 
                { ?>
                  
                    <div class="raw">
                        <div class="thumbnail col-md-3" id="otherlastpost">
                          <h4><?=htmlspecialchars($data['title'])?> </h4>
                          <h5><?=htmlspecialchars($data['post'])?></h5>
                          <p><em>le <?=htmlspecialchars($data['date_post'])?></em> </p>
                          <p><a class="btn btn-primary btn-sm" href="index.php?id=<?=$data['id']?>">Lire ></a></p>
                        </div>
                    </div>
                  
                <?php } $allposts->closeCursor();
            ?>
           
          </div>

        </div>
      </section>

      
  </div>
</section>

<?php $content = ob_get_clean();?>

<?php require ('body.php');?>