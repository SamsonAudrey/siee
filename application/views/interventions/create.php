<!DOCTYPE html>
<html>
<head>
	<title>Création d'intervention</title>
	<meta charset="utf-8">
</head>
<body>


<div class='container' align="center">
		<div class="card" style="width: 50rem;">
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<div class="form-group">
						<h2>Création</h2>
						<p class="erreur">
						<?php echo validation_errors(); ?></p>
					</div>
				</li>
				<li class="list-group-item">
					<?php 
					 	echo form_open('interventions/create');

					 	echo form_label('Service : ', 'idservice');
						$idservice= array(
					 
							'name'=>'idservice',
					 
							'id'=>'idservice',

							'value'=>set_value('idservice')
					 
						);

						

						echo'<select name=\'idservice\'>';
						foreach ($services as $service):
						?>

							<option value="<?php echo $service['idservice']; ?>"><?php echo $service['appellationservice']; ?></option>
					 
						<?php
						endforeach;
					 
						echo'</select>';
						?>
				</li>
				<li class="list-group-item">
					<?php
					echo form_label('0bjet : ', 'idobjet');
						$idobjet= array(
					 
							'name'=>'idobjet',
					 
							'id'=>'idobjet',

							'value'=>set_value('idobjet')
					 
						);

						

						echo'<select name=\'idobjet\'>';
						foreach ($objets as $objet):
						?>

						<option value="<?php echo $objet['idobjet']; ?>"><?php echo $objet['appellationobjet']; ?></option>
					 
						<?php
						endforeach;
					 
						echo'</select>';
					?>
				</li>
				<li class="list-group-item">
					<?php
						echo form_label('Durée (en heure) : ', 'dureeintervention');
						$dureeintervention= array(
					 
							'name'=>'dureeintervention',
					 
							'id'=>'dureeintervention',
					 
							'placeholder'=>'1',

							'size'=>20,
					 
							'value'=>set_value('dureeintervention')
					 
						);
						echo form_input($dureeintervention);
						echo form_error('dureeintervention');
						?>
				</li>
				<li class="list-group-item">
					<?php
					echo form_label('Description : ','descriptionintervention');
						$descriptionintervention= array(
					 
							'name'=>'descriptionintervention',
					 
							'id'=>'descriptionintervention',
					 
							'placeholder'=>'texte',
					 
							'value'=>set_value('descriptionintervention')
					 
						);
						echo form_textarea($descriptionintervention);
					?>
				</li>
				<li class="list-group-item">
					<?php echo form_submit('submit', 'Ajouter l\'intervention'); ?>
				</li>
				<?php   echo form_close(); ?>
			</ul>
		</div>
	</div>
</body>
</html>


