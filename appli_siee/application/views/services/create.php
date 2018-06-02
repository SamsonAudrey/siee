<h2><?php echo $title; ?></h2>
<?php echo validation_errors(); ?>


<?php 
 	echo form_open('services/create');

	echo form_label('Appellation', 'appellationservice');
	$appellationservice= array(
 
		'name'=>'appellationservice',
 
		'id'=>'appellationservice',
 
		'placeholder'=>'Création',
 
		'value'=>set_value('appellationservice')
 
	);
	echo form_input($appellationservice);
	echo form_error('appellationservice');


	

	echo form_submit('submit', 'Ajouter le service');




  echo form_close();
?>