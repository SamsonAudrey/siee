<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>


<?php 
 	echo form_open('interventions/create');

 	echo form_label('Idservice', 'idservice');
	$idservice= array(
 
		'name'=>'idservice',
 
		'id'=>'idservice'
 
	);

	

	echo'<select name=\'idservice\'>';
	foreach ($services as $service):
	?>

		<option value="<?php echo $service['idservice']; ?>"><?php echo $service['appellationservice']; ?></option>
 
	<?php
	endforeach;
 
	echo'</select>';

	echo form_label('Idobjet', 'idobjet');
	$idobjet= array(
 
		'name'=>'idobjet',
 
		'id'=>'idobjet'
 
	);

	

	echo'<select name=\'idobjet\'>';
	foreach ($objets as $objet):
	?>

	<option value="<?php echo $objet['idobjet']; ?>"><?php echo $objet['appellationobjet']; ?></option>
 
	<?php
	endforeach;
 
	echo'</select>';

 
//ca ca marche : 


	echo form_label('Durée (en heure)', 'dureeintervention');
	$dureeintervention= array(
 
		'name'=>'dureeintervention',
 
		'id'=>'dureeintervention',
 
		'placeholder'=>'1',

		'size'=>50,
 
		'value'=>set_value('dureeintervention')
 
	);
	echo form_input($dureeintervention);
	echo form_error('dureeintervention');


	echo form_label('Description','descriptionintervention');
	$descriptionintervention= array(
 
		'name'=>'descriptionintervention',
 
		'id'=>'descriptionintervention',
 
		'placeholder'=>'texte',
 
		'value'=>set_value('descriptionintervention')
 
	);
	echo form_textarea($descriptionintervention);


	echo form_submit('submit', 'Ajouter l\'intervention');




  echo form_close();
?>

