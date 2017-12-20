
<?php $title = 'home';?>

<?php ob_start();?>

<section class="container" id="selectedpostpage">
  <div class="raw">
   
      <section class="col-md-12">
        <div class="raw">
            
                  <div class="thumbnail col-md-6" id="selectedpost">
                    <?php
                      while ($select = $post->fetch()) 
                        { ?>
                          <h2><?=htmlspecialchars($select['select_title'])?></h2>
                          <p><em>le <?=htmlspecialchars($select['date_post'])?></em></p>
                          <h4><?=htmlspecialchars($select['select_post'])?></h4>
                        <?php }
                    ?>
                  </div>
               
                
                  <div class="col-md-6">
                  <div class="raw">

                    <div class="col-md-8">
                    <h3 class="headers">Commentaires</h3>
                      <?php
                        while ($data = $postComments->fetch()) 
                          {?>
                            <h5><em>le <?=htmlspecialchars($data['date_comment'])?></em></h5>
                            <h5><?=htmlspecialchars($data['comment'])?></h5>
                            <p><a href="index.php?action=report&amp;id=<?=$data['id']?>" class="btn btn-danger btn-xs">signaler</a></p>
                          <?php }
                        
                      ?>

                    </div>

                    <div class="col-md-8">

                        <form action="index.php?action=addcomment&amp;id=<?=$_GET['id']?>" method="POST" class="form-inline">
                          <div class="input-group col-lg-8">
                            <input type="text" name="comment" id="comment" placeholder="commentaires" class="form-control" required>
                            <span class="input-group-btn"><input class="btn btn-default" type="submit">envoyer</input></span>
                          </div>
                        </form>

                    </div>

                    </div>
                  </div>
                  
              
              
          
          <div class="thumbnail col-md-10" id="otherposts">
            <h3>Les autres Billets</h3>
            <?php
              while ($other = $allposts->fetch()) 
                { ?>
                  
                    <div class="raw">
                        <div class="thumbnail col-md-3" id="otherlastpost">
                          <h4><?=htmlspecialchars($other['title'])?> </h4>
                          <h5><?=htmlspecialchars($other['post'])?></h5>
                          <p><em>le <?=htmlspecialchars($other['date_post'])?></em> </p>
                          <p><a class="btn btn-primary btn-sm" href="index.php?action=post&amp;id=<?=$other['id']?>">Lire ></a></p>
                        </div>
                    </div>
                  
                <?php } 
            ?>
           
          </div>

        </div>
      </section>

      
  </div>
</section>

<?php $content = ob_get_clean();?>

<?php require ('body.php');?>