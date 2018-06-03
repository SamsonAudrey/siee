
<!DOCTYPE html>
<html>
<head>
	<title>Page de modification du profil</title>
	<meta charset="utf-8">

	
</head>
<body>
	
<div class='container' align="center">
		<div class="card" style="width: 50rem;">
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<div class="form-group">
						<h3>Modification de votre profil</h3><br>
						<p class="erreur">
						<?php echo validation_errors(); ?></p>
					</div>
				</li>
				<li class="list-group-item">

					<?php echo form_open('clients/modif_profil/'.$clients_item['idclient']); ?>
					<?php echo form_label('Nom :', 'nomclient'); ?>
							 	
					<?php 
					$nomclient= array(
			 		'name'=>'nomclient',
			 
					'id'=>'nomclient',
					 
					'placeholder'=>'Votre nom',

					'class'		=>	 'form-control',
					 
					'value'=>$clients_item['nomclient']
					);
					echo form_input($nomclient); ?>
				</li>			
				<li class="list-group-item">
					<?php echo form_label('Prénom :', 'prenomclient'); ?>
					<?php 
					$prenomclient= array(
			 
					'name'=>'prenomclient',
						 
					'id'=>'prenomclient',
						 
					'placeholder'=>'Votre prénom',

					'class'		=>	 'form-control',
						 
					'value'=>$clients_item['prenomclient']
					);
					echo form_input($prenomclient); ?>
				</li>
				<li class="list-group-item">
					<?php echo form_label('Téléphone :', 'telephoneclient'); ?>
					<?php 
					$telephoneclient= array(
				 
					'name'=>'telephoneclient',
							 
					'id'=>'telephoneclient',
							 
					'placeholder'=>'0600000000',

					'class'		=>	 'form-control',
							 
					'value'=>'0'.$clients_item['telephoneclient']
					);
					echo form_input($telephoneclient); ?>
				</li>
				<li class="list-group-item">
					
					<?php echo form_label('Mail :', 'email'); ?>
					<?php 
					$email= array(
		 
					'name'=>'email',
					 
					'id'=>'email',

					'type'=>'email',
					 
					'placeholder'=>'exemple@gmail.com',

					'class'		=>	 'form-control',
					 
					'value'=>$clients_item['email']
					);
					echo form_input($email); ?>
				</li>
				<li class="list-group-item">
					<?php echo form_label('Confirmation mail :', 'email2'); ?>
					<?php 
					$email2= array(
			 
					'name'=>'email2',
						 
					'id'=>'email2',

					'type'=>'email',
						 
					'placeholder'=>'exemple@gmail.com',

					'class'		=>	 'form-control'
					);
					echo form_input($email2); ?>
				</li>
				<li class="list-group-item">
					<?php echo form_label('Rue :', 'rueadresse');
					$rueadresse= array(
		 
							'name'=>'rueadresse',
					 
							'id'=>'rueadresse',
					 
							'placeholder'=>'Rue de l\'exemple',

							'class'		=>	 'form-control',
					 
							'value'=>$clients_item['rueadresse']
					);
					echo form_input($rueadresse); ?>
			</li>
			<li class="list-group-item">
				<?php echo form_label('Numéro :', 'nomeroadresse');
				$numeroadresse= array(
	 
						'name'=>'numeroadresse',
				 
						'id'=>'numeroadresse',
				 
						'placeholder'=>'1',

						'class'		=>	 'form-control',
				 
						'value'=>$clients_item['numeroadresse']
				);
				echo form_input($numeroadresse); ?>
			</li>
			<li class="list-group-item">
				<?php echo form_label('Ville :', 'idville');
				$idville= array(
 
					'name'=>'idville',
 
					'id'=>'idville',

					'value'=>$clients_item['idville']
 
				);
				echo'<select name=\'idville\' class="form-control" value="'.$clients_item['idville'].'"" >';
				foreach ($villes as $ville):
				?>
					<option value="<?php echo $ville['idville']; ?>"><?php echo $ville['nomvile']; ?></option>
 				<?php
				endforeach;
 
				echo'</select>';
				?>
			</li>
			<li class="list-group-item">
				<?php
				 $submit = array(
        			'name'          => 'submit',
        		
        			'id'            => 'button',
        		
        			'value'         => 'Je modifie',
        		
        			'type'          => 'submit',

        			'class'			=> 'btn btn-primary btn-lg btn-block login-button',
        		
        			'class'			=> 'login loginmodal-submit'
				
				);
			 	echo form_submit('submit', 'Modifier'); ?>
			</li>
		</ul>
	</div>
</div>

			 
	
</body>
</html>