
<?php $title = 'article';?>

<?php ob_start();?>

<section class="container" id="selectedpostpage">
  <div class="raw">
   
      <section class="col-md-12">
        <div class="raw">
            
                  <div class="thumbnail col-md-6" id="selectedpost">
                    <?php
                      foreach ($post as $select) 
                        { ?>
                          <h2><?=htmlspecialchars($select->getTitle())?></h2>
                          <p><em>le <?=htmlspecialchars($select->getDatepost())?></em></p>
                          <h4><?=htmlspecialchars_decode(nl2br($select->getPost()))?></h4>
                        <?php }
                    ?>
                  </div>
               
                
                  <div class="col-md-6">
                  <div class="raw">

                    <div class="col-md-8">
                    <h3 class="headers">Commentaires</h3>
                      <?php
                        foreach ($postComments as $data) 
                          {?>
                            <h5><em>le <?=htmlspecialchars($data->getDatecomment())?></em></h5>
                            <h5><?=htmlspecialchars($data->getComment())?></h5>
                            <p><a href="index.php?action=report&amp;id=<?=$data->getID()?>" class="btn btn-danger btn-xs">signaler</a></p>
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
              foreach ($allposts as $other) 
                { ?>
                  
                    <div class="raw">
                        <div class="thumbnail col-md-5" id="otherlastpost">
                          <h4><?=htmlspecialchars($other->getTitle())?> </h4>
                          <h5 id="otherparagraphe"><?=htmlspecialchars_decode(nl2br($other->getPost()))?></h5>
                          <p><em>le <?=htmlspecialchars($other->getDatepost())?></em> </p>
                          <p><a class="btn btn-primary btn-sm" href="index.php?action=post&amp;id=<?=$other->getID()?>">Lire></a></p>
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