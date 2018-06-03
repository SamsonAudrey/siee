<!DOCTYPE html>
<html>
<head>
	<title>Détail de l'intervention</title>
	<meta charset="utf-8">
</head>
<body>

<div class='container' align="center">
		<div class="card" style="width: 50rem;">
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<h2>Intervention à supprimer</h2>
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
				<li class="list-group-item">
					<?php if($delete)
					{
						?>
					<h2> Etes-vous sûr ? </h2>
					<?php echo form_open('interventions/delete/'.$interventions_item['idintervention']);
					 $dataoui = array(
        			'name'          => 'oui',
        			'id'            => 'button',
        			'class'			=> 'btn btn-danger',
        			'type'          => 'submit',
        			'content'       => 'Oui'
					);

					echo form_submit('oui','OUI');
					echo form_close();

					echo form_open('interventions');
					$datanon = array(
        			'name'          => 'oui',
        			'id'            => 'button',
        			'class'			=> 'btn btn-danger',
        			'type'          => 'submit',
        			'content'       => 'Non'
					);

					echo form_submit('non','NON');
					echo form_close();?>
					<?php
					}
					else
					{
						?>
						<h2>Cette intervention ne peut pas être supprimée</h2>
						<p>Elle fait partie d'un rdv futur. Effectuez dabord ce rdv pour pouvoir supprimer cette intervention.</p>
						<?php
					}?>
			</ul>
		</div>
	</div>
</body>
</html>



