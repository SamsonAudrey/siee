<!DOCTYPE html>
<html>
<head>
	<title>Création service </title>
	<meta charset="utf-8">
</head>
<body>


<div class='container' align="center">
		<div class="card" style="width: 50rem;">
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<div class="form-group">
						<h2>Création</h2>
						<?php echo validation_errors(); ?>
					</div>
				</li>
				<li class="list-group-item">
					<?php 
					 echo form_open('service/create');

					echo form_label('Appellation : ', 'appellationservice');
					$appellationservice= array(
					
					'name'=>'appellationservice',
					
					'id'=>'appellationservice',
					 
					'placeholder'=>'Dépannage',
					 
					'value'=>set_value('appellationservice')
					 
					);
					echo form_input($appellationservice);
					echo form_error('appellationservice');
					?>
				</li>
				<li class="list-group-item">
					<?php echo form_submit('submit', 'Ajouter le service');
					echo form_close(); ?>
				</li>
			</ul>
		</div>
	</div>

</body>
</html>