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
	<title>Page de profil</title>
</head>
<body>
	<?php
	if($isconnecte === 0){
		?>
<div class='container' align="center">
		<div class="card" style="width: 50rem;">
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<h2><?php echo "Profil de ".$clients_item['nomclient']." ".$clients_item['prenomclient'] ?></h2>
				</li>
				<li class="list-group-item">
					Mail = <?php echo $clients_item['email'];?>
				</li>
				<li class="list-group-item">
					Téléphone = <?php echo "0".$clients_item['telephoneclient'];?>
				</li>
				<li class="list-group-item">
					Type = <?php echo $typeclient;?>
				</li>
				<li class="list-group-item">
					<h3>Adresse:</h3>
					<p><br/>
					<?php echo $clients_item['rueadresse']." ".$clients_item['numeroadresse'];?>
					<br/>
					<?php echo $villeclient; ?></p>
				</li>
			</ul>
		</div>
	</div>

	<?php } ?>
</body>
</html>

