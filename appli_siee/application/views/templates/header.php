<?php 
  if ($connecte>-1)
  {
      $isconnecte=0;
      if($admin)
      {
        $admin=0;
      }
      else
      {
        $admin=1;
      }
  }
  else
  {
    $isconnecte=1;
    $admin=1;
  }
  
?>

<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <base href = "<?php echo base_url(); ?>">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">


   <!-- <link rel="stylesheet" href="bootstrap.css">
  <link rel="stylesheet" href="bootstrap-theme.css">
  <link rel="stylesheet" href="bootstrap-theme.min.css">
  <link rel="stylesheet" href="bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">SIEE</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home">Accueil</a></li>
        <?php
        if($isconnecte === 1){
          ?>
        <li><a href="interventions/">Interventions</a></li>
        <?php
        }
        else{
        ?>
        <li class="dropdown">
          
          <?php
            if($admin === 0){
          ?>
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Interventions<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="interventions/">Voir</a></li>
            <li><a href="interventions/create">Ajouter</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Objets<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="objets/">Voir</a></li>
            <li><a href="objets/create">Ajouter</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Services<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="services/">Voir</a></li>
            <li><a href="services/create">Ajouter</a></li>
          </ul>
        </li>
        <li><a href="clients">Clients</a></li>
        <?php }
        else{
          ?>
          <li><a href="interventions/">Interventions</a></li>
          <li><a href=<?php echo "rdv/create/".$connecte ?>>RDV</a></li>
        <?php }} ?>
        <li><a href="about">A propos</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <?php 
        if($isconnecte === 1)
        {
          ?>
        <base href = "<?php echo base_url(); ?>">
        <li><a href="clients/connexion"><span class="glyphicon glyphicon-user"></span> Connexion</a></li>
        <li><a href="clients/inscription"><span class="glyphicon glyphicon-log-in"></span> Inscription</a></li>
        <?php
        }
        else
        {
          ?>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Profil<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <?php
            if($admin === 0){
          ?><base href = "<?php echo base_url(); ?>">
            <li><a href="rdv">TOUS LES RDV</a></li>
            <li><a href=<?php echo "clients/profil/".$connecte ?>>Mon profil</a></li>
            <li><a href=<?php echo "clients/modif_profil/".$connecte ?>>Modifier mon profil</a></li>
            <li><a href="#">Ajouter compte admin</a></li>
          <?php 
          }
          else{
            ?><base href = "<?php echo base_url(); ?>">
            <li><a href="rdv">Mes RDV</a></li>
            <li><a href=<?php echo "clients/profil/".$connecte ?>>Mon profil</a></li>
            <li><a href=<?php echo "clients/modif_profil/".$connecte ?>>Modifier mon profil</a></li>
            <li><a href=<?php echo "clients/verif_delete/".$connecte ?>>Supprimer mon compte</a></li>
            <?php } ?>
          </ul>
        </li>
        <li><a href="clients/deconnexion"><span class="glyphicon glyphicon-user"></span> Deconnexion</a></li>
        <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>
  
<!-- <div class="container">
  <h3>Collapsible Navbar</h3>
  <p>In this example, the navigation bar is hidden on small screens and replaced by a button in the top right corner (try to re-size this window).
  <p>Only when the button is clicked, the navigation bar will be displayed.</p>
</div> -->

</body>
</html>