
<?php $title = 'Tout les Billets';?>

<?php ob_start();?>

<div class="jumbotron" id="headers">
  <div class="container">
    <h1>Votre bibliothèque</h1>
  </div>
</div>

<section class="container">
  <div class="row">

      <div class="col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title"><h3>Tous vos billets</h3></div>
          </div>
          <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>
                    <h4>date</h4>
                  </th>
                  <th>
                    <h4>titre</h4>
                  </th>
                  <th>
                    <h4>article</h4>
                  </th>
                  <th>
                    <h4>action</h4>
                  </th>
                  
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($allposts as $data) 
                { ?>

                  <tr>
                    <td class="col-md-1">
                      <em>le <?=htmlspecialchars($data->getDatepost())?></em>
                    </td>
                    <td class="col-md-2">
                      <h4><?=htmlspecialchars($data->getTitle())?> </h4>
                    </td>
                    <td class="col-md-5">
                      <div >
                       <?php
                        $txt= htmlspecialchars_decode(nl2br($data->getPost()));
                        $tab=str_word_count($txt,2);
                        $mot=array_keys($tab);
                        if(count($mot)>100)
                        {
                        echo substr($txt,0,$mot[40]).'...';
                        }
                        else
                        {
                        echo $txt;
                        }
                      ?>
                      </div>
                    </td>
                    <td class="col-md-1">
                      <div class="btn-group-vertical"><a class="btn btn-primary btn-sm" href="index.php?admin=adminposts&amp;id=<?=$data->getID()?>">lire</a><a class="btn btn-primary btn-sm" href="index.php?admin=editpost&amp;id=<?=$data->getID()?>">modifier</a>
                          <a class="btn btn-default btn-danger btn-sm" href="index.php?admin=deletepost&amp;id=<?=$data->getID()?>">supprimer</a></div>
                    </td>
                  </tr>

                <?php } 
                ?>
              </tbody>
          </table>
        </div>
      </div>

      <aside class="col-md-2">
        

        <div class="panel panel-default">
                <div class="panel-heading">
                  <h5 class="panel-title">Tous les commentaires</h5>
                </div>
                <div class="list-group">
                <?php
                foreach ($allcomments as $data)
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