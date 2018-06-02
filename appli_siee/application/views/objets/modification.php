<!DOCTYPE html>
<html>
<head>
	<title>Modification objet </title>
	<meta charset="utf-8">
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
					echo form_open('objets/modif_objets/'.$objets_item['idobjet']);
					echo $objets_item['appellationobjet'] ?>
					 
					
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
					<?php echo form_submit('submit', 'Modifier l\'objet');
					echo form_close(); ?>
				</li>
			</ul>
		</div>
	</div>

</body>
</html>


