
<?php $title = 'Tout les Billets';?>

<?php ob_start();?>

<section class="container">
  <div class="raw">
   
      <section class="col-md-12">
        <div class="raw">
          
          <div class="thumbnail col-md-12" id="all">
            <h3 class="headers">Tout les Billets</h3>
            <?php
              foreach ($allposts as $data ) 
                { ?>
                    <div class="raw">
                        <div class="thumbnail col-md-3" id="allposts">
                          <h4><?=htmlspecialchars($data->getTitle())?> </h4>
                          <h5 id="allparagraphe"><?=htmlspecialchars_decode(nl2br($data->getPost()))?></h5>
                          <p><em>le <?=htmlspecialchars($data->getDatepost())?></em> </p>
                          <p><a class="btn btn-primary btn-sm" href="index.php?action=post&amp;id=<?=$data->getID()?>">Lire ></a></p>
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