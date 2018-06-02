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
	<div align="center">
		<h2><?php echo "Profil de ".$clients_item['nomclient']." ".$clients_item['prenomclient'] ?></h2>
		<br/> <br/>
		Mail = <?php echo $clients_item['email'];?>
		<br/>
		Téléphone = <?php echo "0".$clients_item['telephoneclient'];?>
		<br/>
		Type = <?php echo $typeclient;?>
		<br/>
		<h3>Adresse:</h3>
		<br/>
		<?php echo $clients_item['rueadresse']." ".$clients_item['numeroadresse'];?>
		<br/>
		<?php echo $villeclient; ?>
	</div>
	<?php } ?>
</body>
</html>

