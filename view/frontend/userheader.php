
<header>

  <nav class="nav navbar-inverse navbar-fixed-top">

    <div class="container-fluid">

      <div class="navbar-header" >

        <a class="navbar-brand" id="logo" href=""><img src="public/images/logoblanc.png"></a>                

      </div>

        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php">Accueil</a></li>
          <li><a href="index.php?page=allposts">Billet simple pour l'Alaska</a></li>
          <li><a href="index.php?page=contact">Contact</a></li>
        </ul>

        <form action="" method="POST" class="navbar-form navbar-right inline-form">
          <p><?=$_SESSION['pseudo']?></p>
          <a href="index.php?page=logout" class="btn btn-primary btn-sm">log-out</a>
        </form>
    </div>

  </nav>

</header>
