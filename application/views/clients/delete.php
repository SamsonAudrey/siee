<!DOCTYPE html>
<html>
<head>
	<title>Supprésion de compte</title>
</head>
<body>

<div class='container' align="center">
		<div class="card" style="width: 50rem;">
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<h3>Etes-vous sur de vouloir supprimer votre compte ?</h3>
				</li>
				<li class="list-group-item">
					<a href="<?php echo site_url('clients/delete/'.$clients_item['idclient']); ?>">Oui</a>
 					<a href="<?php echo site_url('clients/profil/'.$clients_item['idclient']); ?>">Non</a>
 				</li>
 			</ul>
 		</div>
 	</div>
</body>
</html>
