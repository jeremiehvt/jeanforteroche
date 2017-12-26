
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
        <p>la bio de l'auteur</p>
        <p>bonjour je m'appelle jean forteroche.</p>
      </aside>

      <section class="col-md-8">
        <div class="raw">
            <?php
              while ($data = $posts->fetch())
              { ?>
                <div class="thumbnail col-md-12" id="firstpost">
                  <h3 class="headers">À la Une</h3>
                  <h2> <?=htmlspecialchars($data['newtitle'])?></h2>
                  <p><em>le <?=htmlspecialchars($data['date_post'])?> </em></p>
                  <h4><?=htmlspecialchars_decode(nl2br($data['newpost']))?></h4>
                  <p><a class="btn btn-primary" href="index.php?action=post&amp;id=<?=$data['id']?>">Lire ></a></p>
                </div>

              <?php }
            ?>
          
          <div class="col-md-12 thumbnail" id="posts">
            <h3>Les derniers Billets</h3>
            <?php
              while ($data = $lastposts->fetch()) 
                { ?>
                  
                    <div class="raw">
                        <div class="thumbnail col-md-3" id="lastposts" >
                          <h4> <?=htmlspecialchars($data['title'])?></h4>
                          <p><em class="date">le <?=htmlspecialchars($data['date_post'])?> </em></p>
                          <h5><?=htmlspecialchars_decode(nl2br($data['post']))?></h5>
                          <p><a class="btn btn-primary btn-sm" href="index.php?action=post&amp;id=<?=$data['id']?>">Lire ></a></p>
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
                while ( $data = $allcomments->fetch()) 
                  { ?>
                    
                    <li class="list-group-item"><em class="date">le <?=htmlspecialchars($data['date_comment'])?></em><br><?=htmlspecialchars($data['comment'])?><br><a class="btn btn-danger btn-xs" href="index.php?action=report&amp;id=<?=$data['id']?>">signaler</a></li>
                  <?php }
                ?>
              </ul>
            
       
      </aside>
  </div>
</section>

<?php $content = ob_get_clean();?>

<?php require ('body.php');?>