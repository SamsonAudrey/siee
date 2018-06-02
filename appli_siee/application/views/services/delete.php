<!DOCTYPE html>
<html>
<head>
	<title>Supprésion service</title>
	<meta charset="utf-8">
</head>
<body>

<div class='container' align="center">
		<div class="card" style="width: 50rem;">
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<h2>Service à supprimer</h2>
				</li>
				<li class="list-group-item">
					<p><?php echo $services_item['appellationservice']; ?></p>
				</li>
				
				<li class="list-group-item">
					<h2> Etes-vous sûr ? </h2>
					<?php echo form_open('services/delete/'.$services_item['idservice']);
					echo form_submit('oui','OUI');
					echo form_close();

					echo form_open('services');
					echo form_submit('non','NON');
					echo form_close();?>
			</ul>
		</div>
	</div>
</body>
</html>
