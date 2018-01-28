
<?php $title = 'home';?>

<?php ob_start();?>

<div class="jumbotron" id="alaska">
  <div class="container">
    <h1 id="hometitle">Billet Simple pour l'Alaska</h1>
    <p id="homesubtitle">le dernier roman de Jean Forteroche</p>
  </div>
</div>

<section class="container">
  <div class="raw">
    

      <aside class="col-md-2" id="author">
        <h3 class="headers">L'auteur</h3>
        <?php
          foreach ($user as $data) 
            {?>
              <p><?=htmlspecialchars_decode(nl2br($data->getBio()));?></p>
            <?php }
        ?>
      </aside>

      <section class="col-md-8">
        <div class="raw">
            <?php
              foreach ($lastpost as $data)
              { ?>
                <div class="thumbnail col-md-12" id="firstpost">
                  <h3 class="headers">À la Une</h3>
                  <h2> <?=htmlspecialchars($data->getTitle())?></h2>
                  <p><em>le <?=htmlspecialchars($data->getDatepost())?> </em></p>
                  <h4 id="firstparagraphe"><?=htmlspecialchars_decode(nl2br($data->getPost()))?></h4>
                  <p><a class="btn btn-primary" href="index.php?action=post&amp;id=<?=$data->getID()?>">Lire ></a></p>
                </div>

              <?php }
            ?>
          
          <div class="col-md-12 thumbnail" id="posts">
            <h3>Les derniers Billets</h3>
            <?php
              foreach ($lastposts as $data) 
                { ?>
                  
                    <div class="raw">
                        <div class="thumbnail col-md-5" id="lastposts" >
                          <h4> <?=htmlspecialchars($data->getTitle())?></h4>
                            <p><em class="date">le <?=htmlspecialchars($data->getDatepost())?> </em></p>
                            <h5 id="lastparagraphe"><?=htmlspecialchars_decode(nl2br($data->getPost()))?></h5>
                          <p><a class="btn btn-primary btn-sm" href="index.php?action=post&amp;id=<?=$data->getID()?>">Lire ></a></p>
                        </div>
                    </div>
                    
                <?php }
            ?>
          </div>

        </div>
      </section>

      <aside class="col-md-2">
        
          <h3 class="headers">Les derniers commentaires</h3>

             <ul class="list-group">
                <?php
                foreach ($allcomments as $com)
                  { ?>
                    
                    <li class="list-group-item"><em class="date">le <?=$com->getDatecomment()?></em><br><?=$com->getComment()?><br><a class="btn btn-danger btn-xs" href="index.php?action=report&amp;id=<?=$com->getID()?>">signaler</a></li>
                  <?php }
                ?>
              </ul>

            
       
      </aside>
  </div>
</section>

<?php $content = ob_get_clean();?>

<?php require ('body.php');?>