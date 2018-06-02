<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>


<?php 
 	echo form_open('objets/create');

	echo form_label('Appellation', 'appellationobjet');
	$appellationobjet= array(
 
		'name'=>'appellationobjet',
 
		'id'=>'appellationobjet',
 
		'placeholder'=>'Interphone',
 
		'value'=>set_value('appellationobjet')
 
	);
	echo form_input($appellationobjet);
	echo form_error('appellationobjet');


	$options = array(
		'2'           => 'syndic',
        '1'         => 'particulier',
	);
	echo form_label('Type', 'idtype');
	echo form_dropdown('idtype', $options, '1');
	/*$multipletype = array('1', '2');
	echo form_dropdown('idtype', $options, $multipletype);*/

	/*echo form_label('Idtype', 'idtype');
	$idtype= array(
 
		'name'=>'idtype',
 
		'id'=>'idtype',
 
		'placeholder'=>'idtype',
 
		'value'=>set_value('idtype')
 
	);
	echo form_input($idtype);
	echo form_error('idtype');*/

	echo form_submit('submit', 'Ajouter l\'objet');




  echo form_close();
?>


