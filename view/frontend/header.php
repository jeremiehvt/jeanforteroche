
<header>

  <nav class="nav navbar-inverse navbar-fixed-top">

    <div class="container-fluid">

      <div class="navbar-header">

        <a class="navbar-brand" id="logo" href=""><img src="public/images/logoblanc.png"></a>                

      </div>

        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php">Accueil</a></li>
          <li><a href="index.php?page=allposts">Billet simple pour l'Alaska</a></li>
          <li><a href="index.php?page=contact">Contact</a></li>
        </ul>

        <form action="index.php?page=login" method="POST" class="navbar-form navbar-right inline-form">
          <input type="text" name="pseudo" id="pseudo" class="input-sm form-control" placeholder="pseudo"> 
          <input type="password" name="password" id="password" class="input-sm form-control" placeholder="mot de passe">
          <button class="btn btn-primary btn-sm">log-in</button>
          <a href="index.php?page=inscription" class="btn btn-default btn-sm">sign-in</a>
        </form>
    </div>

  </nav>

</header>
