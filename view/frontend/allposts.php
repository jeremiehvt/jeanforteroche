
<?php $title = 'Tout les Billets';?>

<?php ob_start();?>

<div class="jumbotron" id="headers">
  <div class="container">
    <h1>Les aventures de Jean Forteroche</h1>
  </div>
</div>

<section class="container">
  <div class="row">
      <div class="col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title"><h3>Tous les billets</h3></div>
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
                      <div>
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
                      <div class="btn-group"><a class="btn btn-primary" href="index.php?action=post&amp;id=<?=$data->getID()?>">lire</a></div>
                    </td>
                  </tr>

                <?php } 
                ?>
              </tbody>
          </table>
        </div>
      </div>

      <aside class="col-md-4">
        

        <div class="panel panel-default">
                <div class="panel-heading">
                  <h5 class="panel-title">Tous les commentaires</h5>
                </div>
                <div class="list-group">
                <?php
                foreach ($allcomments as $data)
                  { ?>
                    <div class="list-group-item">

                      <h5><span class="label label-default"></span><em class="date">le <?=htmlspecialchars($data->getDatecomment())?></em></br><?=htmlspecialchars(nl2br($data->getComment()))?><a class="btn btn-danger btn-xs pull-right" href="index.php?action=report&amp;id=<?=$data->getID()?>">signaler</a></h5><div></div>

                    </div>
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