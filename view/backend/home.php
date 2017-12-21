
<?php $title = 'home';?>

<?php ob_start();?>



<section class="container">
  <div class="raw">
    

      <aside class="col-md-2">

          <h3 class="headers">Ajouter un Article</h3>
          <a class="btn btn-success btn-lg" href="index.php?action=edit&amp;id=<?=$data['id']?>">Ajouter</a>
      </aside>

      <section class="col-md-6">
        <div class="raw">
          <h3 class="headers">Tous les Articles</h3>

            <?php
              while ($data = $posts->fetch())
              { ?>

                <div class="thumbnail col-md-12" id="firstpost">
                  
                  <h2> <?=htmlspecialchars($data['title'])?></h2>
                  <p><em>le <?=htmlspecialchars($data['date_post'])?> </em></p>
                  <h4><?=htmlspecialchars($data['post'])?></h4>
                  <p><a class="btn btn-warning btn-xs" href="index.php?action=editpost&amp;id=<?=$data['id']?>">modifier </a></p>
                  <p><a class="btn btn-danger btn-xs" href="index.php?action=deletepost&amp;id=<?=$data['id']?>">supprimer </a></p>
                </div>

              <?php }
            ?>

        </div>
      </section>

      <aside class="col-md-2">
        
          <h3 class="headers">commentaires</h3>
            
              <ul class="list-group">
                <?php
                while ( $data = $allcomments->fetch()) 
                  { ?>
                    
                    <li class="list-group-item"><strong>n°<?=htmlspecialchars($data['id'])?></strong><br><em class="date">le <?=htmlspecialchars($data['date_comment'])?></em><br><?=htmlspecialchars($data['comment'])?><br><a class="btn btn-danger btn-xs" href="index.php?admin=deletecomment&amp;id=<?=$data['id']?>">supprimer</a></li>
                  <?php }
                ?>
              </ul>

      </aside>

      <aside class="col-md-2">
        
          <h3 class="headers">commentaires signaler</h3>
            
              <ul class="list-group">
                <?php
                while ( $data = $reportcomments->fetch())
                  { ?>
                    <li class="list-group-item"><strong>n° <?=htmlspecialchars($other['id_comment'])?></strong></li>
                  <?php }
                ?>
              </ul>

      </aside>
  </div>
</section>

<?php $content = ob_get_clean();?>

<?php require ('body.php');?>