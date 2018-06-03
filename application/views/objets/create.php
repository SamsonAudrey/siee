<!DOCTYPE html>
<html>
<head>
	<title>Création objet </title>
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
					 echo form_open('objets/create');

					echo form_label('Appellation : ', 'appellationobjet');
					$appellationobjet= array(
					
					'name'=>'appellationobjet',
					
					'id'=>'appellationobjet',
					 
					'placeholder'=>'Interphone',
					 
					'value'=>set_value('appellationobjet')
					 
					);
					echo form_input($appellationobjet);
					echo form_error('appellationobjet');
					?>
				</li>
				<li class="list-group-item">
					<?php
					$options = array(
						'1'           => 'syndic',
				        '2'         => 'particulier',
					);
					echo form_label('Pour clients du type : ', 'idtype');
					echo form_dropdown('idtype', $options, '1');
					?>
				</li>
				<li class="list-group-item">
					<?php echo form_submit('submit', 'Ajouter l\'objet');
					echo form_close(); ?>
				</li>
			</ul>
		</div>
	</div>

</body>
</html>


