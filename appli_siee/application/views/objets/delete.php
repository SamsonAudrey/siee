<!DOCTYPE html>
<html>
<head>
	<title>Supprésion objets</title>
	<meta charset="utf-8">
</head>
<body>

<div class='container' align="center">
		<div class="card" style="width: 50rem;">
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<h2>Objet à supprimer</h2>
				</li>
				<li class="list-group-item">
					<p><?php echo $objets_item['appellationobjet']; ?></p>
				</li>
				<li class="list-group-item">
					<h4>Pour les :</h4>
					<p><?php echo $objets_item['nomtype'] ?></p>
				</li>
				
				<li class="list-group-item">
					<h2> Etes-vous sûr ? </h2>
					<?php echo form_open('objets/delete/'.$objets_item['idobjet']);
					echo form_submit('oui','OUI');
					echo form_close();

					echo form_open('objets');
					echo form_submit('non','NON');
					echo form_close();?>
				</li>
			</ul>
		</div>
	</div>
</body>
</html>

