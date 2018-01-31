
<?php $title = 'home';?>

<?php ob_start();?>

<div class="jumbotron" id="alaska">
  <div class="container">
    <h1 id="hometitle">Billet Simple pour l'Alaska</h1>
    <h2 id="homesubtitle">le dernier roman de Jean Forteroche</h2>
  </div>
</div>

<section class="container">
  <div class="row">
    
      <div class="jumbotron" id="actuality">
        <div class="container">
        <h2>Les dernières actualités</h2>
        </div>
      </div>

      <aside class="col-md-2" id="author">
        <div class="panel panel-default">
          <div class="panel-heading">
          <h3 class="panel-title">L'auteur</h3>
        </div>
        <?php
        foreach ($user as $data) 
          { ?>

            
              <div class="list-group">
                <div class="list-group-item">
                  <h5>Biographie :</h5>
                  <?=htmlspecialchars_decode(nl2br($data->getBio()));?>
                </div>
                
              </div>

          
          <?php }
          ?>
          </div>
      </aside>
<section class="col-md-8">
  <div class="panel panel-default">

    <table class="table table-striped">

      <div class="panel-heading">
       <h1 class="panel-title">Dernier Billet</h1>
      </div>

     
      <?php
        foreach ($lastpost as $data)
        { ?>

      <tbody>
        
        <tr >
        <td >
        <h2><span class="label label-default"><?=htmlspecialchars($data->getID())?></span> <em><?=htmlspecialchars($data->getTitle())?></em></h2>
        </th>

        </td>
        <tr class="active">
        <td >
          <div>
            <?php
              $txt= htmlspecialchars_decode(nl2br($data->getPost()));
              $tab=str_word_count($txt,2);
              $mot=array_keys($tab);
              if(count($mot)>100)
              {
              echo substr($txt,0,$mot[100]).'...';
              }
              else
              {
              echo $txt;
              }
            ?>
          </div>
          <div>
            <p><span class="badge pull-right"> <em>le <?=htmlspecialchars($data->getDatepost())?></em></span></p>
          </div>
        </td>
        </tr>

      </tbody>
      <tfoot>
        <tr>
          <td>
            <div class="row">
          <div class="col-md-2">
            <a class="btn btn-primary btn-sm btn-block" href="index.php?action=post&amp;id=<?=$data->getID()?>">Lire</a>
          </div>
        </div>
          </td>
        </tr>
      </tfoot>
      <?php }
        ?>


    </table>

  </div>
</section>
      <aside class="col-md-2">
        
        <div class="panel panel-default">
                <div class="panel-heading">
                  <h5 class="panel-title">Commentaires du dernier billet</h5>
                </div>

             <div class="list-group">
                <?php
                foreach ($getcomments as $com)
                  { ?>
                    
                    <div class="list-group-item"><em class="date">le <?=$com->getDatecomment()?></em><br><?=$com->getComment()?><br><a class="btn btn-danger btn-xs" href="index.php?action=report&amp;id=<?=$com->getID()?>">signaler</a></div>
                  <?php }
                ?>
              </div>

              <div class="panel-footer">
                 
              </div>
        </div>
      </aside>

  </div>
</section>

<div class="jumbotron" id="separator">
  <div class="container">
    
  </div>
</div>

<section class="container">
  <div class="row">
<section class="col-md-10">
    <div class="panel panel-default">
            
            <table class="table table-striped">
              
              <div class="panel-heading">
                <h1 class="panel-title">Les derniers posts</h1>
              </div>
              
              <tbody>
                <?php
              foreach ($lastposts as $data)
              { ?>
                <tr >
                  <td>
                    <h2><span class="label label-default"><?=htmlspecialchars($data->getID())?></span> <em><?=htmlspecialchars($data->getTitle())?></em></h2>
                  </th>
                  
                </td>
                <tr class="active">
                  <td>
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
                    <div>
                      <p><span class="badge pull-right"><em>le <?=htmlspecialchars($data->getDatepost())?></em></span></p>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-2">
                        <a class="btn btn-primary btn-sm btn-block" href="index.php?action=post&amp;id=<?=$data->getID()?>">Lire</a>
                      </div>
                    </div>

                    
                  </td>
                </tr>
                <?php }
            ?>
               
              </tbody>

              
              
            </table>
            
          </div>
</section>
      <aside class="col-md-2">
          <div class="panel panel-default">
                <div class="panel-heading">
                  <h5 class="panel-title">Les derniers commentaires </h5>
                </div>

             <div class="list-group">
                <?php
                foreach ($LastComments as $com)
                  { ?>
                    
                    <div class="list-group-item"><em class="date">le <?=$com->getDatecomment()?></em><br><?=$com->getComment()?><br><a class="btn btn-danger btn-xs" href="index.php?action=report&amp;id=<?=$com->getID()?>">signaler</a></div>
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