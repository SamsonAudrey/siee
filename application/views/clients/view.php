<!DOCTYPE html>
<html>
<head>
	<title>Page de profil</title>
</head>
<body>
	<?php
	if($connecte > -1){
		?>
<div class='container' align="center">
		<div class="card" style="width: 50rem;">
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<h2><?php echo "Client : ".$clients_item['nomclient']." ".$clients_item['prenomclient'] ?></h2>
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
					<?php echo $clients_item['numeroadresse']." ".$clients_item['rueadresse'];?>
					<br/>
					<?php echo $villeclient; ?></p>
				</li>
			</ul>
		</div>
	</div>

	<?php } ?>
</body>
</html>


