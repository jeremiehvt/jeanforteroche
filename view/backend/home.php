
<?php $title = 'home';?>

<?php ob_start();?>

<div class="jumbotron" id="work">
  <div class="container">
  <h1>Votre tableau de bord</h1>
  <h4>Vous trouverez ici un résumé de votre activité</h4>
  </div>
</div>

<section class="container">
  <div class="row">
    

      <aside class="col-md-2">
        <div class="panel panel-default">
          <div class="panel-heading">
          <h3 class="panel-title">Mon profil</h3>
        </div>
        <?php
        foreach ($user as $data) 
          { ?>

            
              <div class="list-group">
                <div class="list-group-item">
                  <h5>Nom :</h5>
                  <p><?=htmlspecialchars($data->getPseudo());?></p>
                </div>
                <div class="list-group-item">
                  <h5>Mail :</h5>
                  <p><?=htmlspecialchars($data->getEmail());?></p>
                </div>
                <div class="list-group-item">
                  <h5>Biographie :</h5>
                  <?=htmlspecialchars_decode(nl2br($data->getBio()));?>
                </div>
                
              </div>

          <div class="panel-footer">
                <a class="btn btn-default btn-sm btn-primary" href="index.php?admin=updateprofil">modifier mon profil</a>
          </div>
          <?php }
          ?>
          </div>
        </aside>

      <section class="col-md-6">
        <div class="row">
          
         
          <div class="jumbotron" id="workflow">
            
              
              <div class="btn-group">
                <a class="btn btn-primary btn-lg" href="index.php?admin=newpost">Ajouter un article</a><a class="btn btn-primary btn-lg" href="index.php?admin=adminallposts">Accéder à tous mes articles</a>
              </div>
            
          </div>

          <div class="panel panel-default">
            
            <table class="table table-striped">
              
              <div class="panel-heading">
                <h1 class="panel-title">Ajouts récents</h1>
              </div>
              
              <tbody>
                <?php
              foreach ($posts as $data)
              { ?>
                <tr >
                  <td class="col-md-12">
                    <h2><span class="label label-default"><?=htmlspecialchars($data->getID())?></span> <em><?=htmlspecialchars($data->getTitle())?></em></h2>
                  </th>
                  
                </td>
                <tr class="active">
                  <td class="col-md-12">
                     <?php
                        $txt= htmlspecialchars_decode(nl2br($data->getPost()));
                        $tab=str_word_count($txt,2);
                        $mot=array_keys($tab);
                        if(count($mot)>100)
                        {
                        echo substr($txt,0,$mot[80]).'...';
                        }
                        else
                        {
                        echo $txt;
                        }
                      ?><p><small class="badge pull-right"> <em>le <?=htmlspecialchars($data->getDatepost())?></em></small></p>
                    <div class="btn-group"><a class="btn btn-primary btn-sm" href="index.php?admin=adminposts&amp;id=<?=$data->getID()?>">lire</a><a class="btn btn-primary btn-sm" href="index.php?admin=editpost&amp;id=<?=$data->getID()?>">modifier</a>
                        <a class="btn btn-default btn-danger btn-sm" href="index.php?admin=deletepost&amp;id=<?=$data->getID()?>">supprimer</a></div>

                    
                  </td>
                </tr>
                <?php }
            ?>
               
              </tbody>

              
              
            </table>
            
          </div>

        </div>
      </section>

      <aside class="col-md-2">
        

        <div class="panel panel-default">
                <div class="panel-heading">
                  <h5 class="panel-title">Les derniers commentaires</h5>
                </div>
                <div class="list-group">
                <?php
                foreach ($lastcomments as $data)
                  { ?>
                    <div class="list-group-item">

                      <h4><span class="label label-default">n°<?=htmlspecialchars($data->getID())?></span></h4><h5><em class="date">le <?=htmlspecialchars($data->getDatecomment())?></em></br><?=htmlspecialchars(nl2br($data->getComment()))?></h5><div><a class="btn btn-danger btn-xs" href="index.php?admin=deletecomment&amp;id=<?=$data->getID()?>">supprimer</a></div>

                    </div>
                  <?php }
                ?>
              </div>
              <div class="panel-footer">
                
              </div>
        </div>
              
      </aside>

      <aside class="col-md-2">
              
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h5 class="panel-title">commentaires signalés</h5>
                </div>

                 <div class="list-group">
                
                <?php
                foreach ($reportcomments as $data)
                  { ?>
                    <div class="list-group-item "><h4><span class="label label-default">n°<?=htmlspecialchars($data->getIdcomment())?></span></h4></div>

                  <?php }
                ?>
              </div>

              <div class="panel-footer">
                 
              </div>
                
            </div>

      </aside>
  </div>
</section>

<?php $content = ob_get_clean();?>

<?php require ('body.php');?>