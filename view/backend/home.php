
<?php $title = 'home';?>

<?php ob_start();?>



<section class="container">
  <div class="raw">
    

      <aside class="col-md-2">

          <h3 class="headers">Ajouter un Article</h3>
          <a class="btn btn-success btn-lg" href="index.php?admin=newpost">Ajouter</a>
      </aside>

      <section class="col-md-6">
        <div class="raw"><?= 'SID';?>
          <h3 class="headers">Tous les Articles</h3>

            <?php
              while ($data = $posts->fetch())
              { ?>

                <div class="thumbnail col-md-12" id="firstpost">
                  
                  <h2> <?=htmlspecialchars($data['title'])?></h2>
                  <p><em>le <?=htmlspecialchars($data['date_post'])?> </em></p>
                  <h4><?=htmlspecialchars_decode(nl2br($data['post']))?></h4>
                  <p><a class="btn btn-warning btn-xs" href="index.php?admin=editpost&amp;id=<?=$data['id']?>">modifier </a></p>
                  <p><a class="btn btn-danger btn-xs" href="index.php?admin=deletepost&amp;id=<?=$data['id']?>">supprimer </a></p>
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
                    <li class="list-group-item"><strong>n°<?=htmlspecialchars($data['id'])?></strong><br><em class="date">le <?=htmlspecialchars($data['date_comment'])?></em><br><?=htmlspecialchars(nl2br($data['comment']))?><br><a class="btn btn-danger btn-xs" href="index.php?admin=deletecomment&amp;id=<?=$data['id']?>">supprimer</a></li>
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
                    <li class="list-group-item"><strong>n° <?=htmlspecialchars($data['id_comment'])?></strong><a class="btn btn-danger btn-xs pull-right" href="index.php?admin=deletereport&amp;id=<?=$data['id_comment']?>">supprimer</a></li>

                  <?php }
                ?>
              </ul>

      </aside>
  </div>
</section>

<?php $content = ob_get_clean();?>

<?php require ('body.php');?>