<!DOCTYPE html>
<html>
<head>
	<title>Modification d'intervention</title>
</head>
<body>


<div class='container' align="center">
		<div class="card" style="width: 50rem;">
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<div class="form-group">
						<h2>Modification</h2>
						<?php echo validation_errors(); ?>
					</div>
				</li>
				<li class="list-group-item">
					<?php 
					 	echo form_open('interventions/modif_interventions/'.$interventions_item['idintervention']);

					 	echo form_label('Idservice : ', 'idservice');
						$idservice= array(
					 
							'name'=>'idservice',
					 
							'id'=>'idservice',

							'value'=>$interventions_item['idservice']
					 
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
					echo form_label('Idobjet : ', 'idobjet');
						$idobjet= array(
					 
							'name'=>'idobjet',
					 
							'id'=>'idobjet',

							'value'=>$interventions_item['idobjet']
					 
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
					 
							'value'=>$interventions_item['dureeintervention']
					 
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
					 
							'value'=>$interventions_item['descriptionintervention']
					 
						);
						echo form_textarea($descriptionintervention);
					?>
				</li>
				<li class="list-group-item">
					<?php echo form_submit('submit', 'Modifier l\'intervention'); ?>
				</li>
				<?php   echo form_close(); ?>
			</ul>
		</div>
	</div>
</body>
</html>

