
<?php $title = 'article';?>

<?php ob_start();?>

<div class="jumbotron" id=headers>
  <div class="container">
    <h1>Votre bibliothèque</h1>
  </div>
</div>

<section class="container">
  <div class="row">
   

    <div class="col-md-6">
      <?php
      foreach ($post as $select) 
      { ?>

        <div class="panel panel-default">

            <div class="panel-heading">
              <h2><?=htmlspecialchars($select->getTitle())?></h2>
            </div>

            <div class="list-group">
              <div class="list-group-item"><?=htmlspecialchars_decode(nl2br($select->getPost()))?><span class="label label-default"><em>le <?=htmlspecialchars($select->getDatepost())?></em></span></div>
            </div>

            <div class="panel-footer">
                <div class="btn-group "><a class="btn btn-primary btn-sm" href="index.php?admin=editpost&amp;id=<?=$select->getID()?>">modifier</a>
                          <a class="btn btn-default btn-danger btn-sm" href="index.php?admin=deletepost&amp;id=<?=$select->getID()?>">supprimer</a></div>
                
              </div>

        </div> 

      <?php }
      ?>
    </div>

    <div class="col-md-6">
      <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title">Commentaires</div>
          </div>
          <div class="list-group">
            <?php
            foreach ($postComments as $data) 
            {?>
              <div class="list-group-item"><h5><em>le <?=htmlspecialchars($data->getDatecomment())?></em></h5><h5><?=htmlspecialchars($data->getComment())?><a href="index.php?admin=deletecomment&amp;id=<?=$data->getID()?>" class="btn btn-danger btn-xs pull-right">supprimer</a></h5></div>
            <?php }
            ?>
          </div>
        
          <div class="panel-footer">
              
          </div>
      </div>
    </div>
  </div>
</section>

<div class="jumbotron" id="separator">
  <div class="container">
    
  </div>
</div>

<section class="container">
  <div class="row">
  <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title"><h3>Les autres Billets</h3></div>
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
                foreach ($allposts as $other) 
                { ?>

                  <tr class="trmaxheight">
                    <td class="col-md-1">
                      <em>le <?=htmlspecialchars($other->getDatepost())?></em>
                    </td>
                    <td class="col-md-2">
                      <h4><?=htmlspecialchars($other->getTitle())?> </h4>
                    </td>
                    <td class="col-md-9">
                      <div>
                      <?php
                        $txt= htmlspecialchars_decode(nl2br($other->getPost()));
                        $tab=str_word_count($txt,2);
                        $mot=array_keys($tab);
                        if(count($mot)>100)
                        {
                        echo substr($txt,0,$mot[50]).'...';
                        }
                        else
                        {
                        echo $txt;
                        }
                      ?>
                      </div>
                    </td>
                    <td class="col-md-1">
                      <div class="btn-group-vertical"><a class="btn btn-primary btn-sm" href="index.php?admin=adminposts&amp;id=<?=$other->getID()?>">lire</a><a class="btn btn-primary btn-sm" href="index.php?admin=editpost&amp;id=<?=$other->getID()?>">modifier</a>
                          <a class="btn btn-default btn-danger btn-sm" href="index.php?admin=deletepost&amp;id=<?=$other->getID()?>">supprimer</a></div>
                    </td>
                  </tr>

                <?php } 
                ?>
              </tbody>
          </table>
        </div>
      </div>


</div>
</section>

<?php $content = ob_get_clean();?>

<?php require ('body.php');?>