<!DOCTYPE html>
<html>
<head>
	<title>Détail de l'intervention</title>
</head>
<body>

<div class='container' align="center">
		<div class="card" style="width: 50rem;">
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<h2>Détail</h2>
				</li>
				<li class="list-group-item">
					<p><?php echo $interventions_item['appellationservice'].' pour '.$interventions_item['appellationobjet']; ?></p>
				</li>
				<li class="list-group-item">
					<h4>Durée (heure) :</h4>
					<p><?php echo $interventions_item['dureeintervention'] ?></p>
				</li>
				<li class="list-group-item">
					<h4>Description :</h4>
					<p><?php echo $interventions_item['descriptionintervention'] ?></p>
				</li>
			</ul>
		</div>
	</div>
</body>
</html>

