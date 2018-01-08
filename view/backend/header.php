
<header>

  <nav class="nav navbar-inverse navbar-fixed-top">

    <div class="container-fluid">

      <div class="navbar-header">

        <a class="navbar-brand" id="logo" href="index.php?admin=home"><img src="public/images/logoblanc.png"></a>                

      </div>

        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php?admin=home"><?=$_SESSION['user']?></a></li>
          <li><a href="index.php?admin=newpost">Ajouter un article</a></li>
          <li><a href="index.php?admin=deconnexion">Déconnexion</a></li>
        </ul>

        
    </div>

  </nav>

</header>
