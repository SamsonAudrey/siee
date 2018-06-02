<!DOCTYPE html>
<html>
<head>
	<title>Page d'inscription</title>
	<meta charset="utf-8">

	
</head>
<body>
	
	<div align="center">
		<div class="form-group">
			<h3>Inscription</h3><br>

			<?php echo validation_errors(); ?>
		</div>
		<div class="form-group">
			<?php echo form_open('clients/inscription'); ?>
			<?php echo form_label('Nom :', 'nomclient'); ?>
					 	
			<?php 
			$nomclient= array(
	 		'name'=>'nomclient',
	 
			'id'=>'nomclient',
			 
			'placeholder'=>'Votre nom',

			'class'		=>	 'form-control',
			 
			'value'=>set_value('nomclient')
			);
			echo form_input($nomclient); ?>
		</div>			
		<div class="form-group">
			<?php echo form_label('Prénom :', 'prenomclient'); ?>
			<?php 
			$prenomclient= array(
	 
			'name'=>'prenomclient',
				 
			'id'=>'prenomclient',
				 
			'placeholder'=>'Votre prénom',

			'class'		=>	 'form-control',
				 
			'value'=>set_value('prenomclient')
			);
			echo form_input($prenomclient); ?>
		</div>
		<div class="form-group">
		<?php echo form_label('Téléphone :', 'telephoneclient'); ?>
		<?php 
		$telephoneclient= array(
	 
		'name'=>'telephoneclient',
				 
		'id'=>'telephoneclient',
				 
		'placeholder'=>'0600000000',

		'class'		=>	 'form-control',
				 
		'value'=>set_value('telephoneclient')
		);
		echo form_input($telephoneclient); ?>
		</div>
		<div class="form-group">
					
			<?php echo form_label('Mail :', 'email'); ?>
				<?php 
				$email= array(
	 
				'name'=>'email',
				 
				'id'=>'email',

				'type'=>'email',
				 
				'placeholder'=>'exemple@gmail.com',

				'class'		=>	 'form-control',
				 
				'value'=>set_value('email')
				);
				echo form_input($email); ?>
						
		</div>
		<div class="form-group">
			<?php echo form_label('Confirmation mail :', 'email2'); ?>
			<?php 
			$email2= array(
	 
			'name'=>'email2',
				 
			'id'=>'email2',

			'type'=>'email',
				 
			'placeholder'=>'exemple@gmail.com',

			'class'		=>	 'form-control',
				 
			'value'=>set_value('email2')
			);
			echo form_input($email2); ?>
						
		</div>
		<div class="form-group">
			<?php echo form_label('Mot de passe :', 'mdp'); ?>
			<?php 
			$mdp= array(
	 
			'name'=>'mdp',
				 
			'id'=>'mdp',

			'type'=>'password',

			'class'		=>	 'form-control',
				 
			'placeholder'=>'Votre mot de passe'

			);
			echo form_input($mdp); ?>
		</div>
		<div class="form-group">
			<?php echo form_label('Confirmation mdp :', 'mdp2'); ?>
			<?php 
						$mdp2= array(
	 
						'name'=>'mdp2',
				 
						'id'=>'mdp2',

						'type'=>'password',

						'class'		=>	 'form-control',
				 
						'placeholder'=>'Confirmation mot de passe'

						);
						echo form_input($mdp2); ?>
			</div>
			<div class="form-group">
				<?php echo form_label('Type de client :', 'idtype'); ?>
				<?php  
					$idtype= array(
 
					'name'=>'idtype',
 
					'id'=>'idtype'
 
					);


					echo'<select name=\'idtype\' class="form-control">';
					foreach ($types as $type):
					
							?>

							<option value="<?php echo $type['idtype']; ?>"><?php echo $type['nomtype']; ?></option>
 					<?php
					endforeach;
					echo'</select>';

					?>
			</div>
			<div class="form-group">
				<?php echo form_label('Rue :', 'rueadresse'); ?>
				<?php 
						$rueadresse= array(
	 
						'name'=>'rueadresse',
				 
						'id'=>'rueadresse',
				 
						'placeholder'=>'Rue de l\'exemple',

						'class'		=>	 'form-control',
				 
						'value'=>set_value('rueadresse')
						);
						echo form_input($rueadresse); ?>
			</div>
			<div class="form-group">
				<?php echo form_label('Numéro :', 'nomeroadresse'); ?>
				<?php 
						$numeroadresse= array(
	 
						'name'=>'numeroadresse',
				 
						'id'=>'numeroadresse',
				 
						'placeholder'=>'1',

						'class'		=>	 'form-control',
				 
						'value'=>set_value('numeroadresse')
						);
						echo form_input($numeroadresse); ?>
			</div>
			<div class="form-group">
				<?php echo form_label('Ville :', 'idville'); ?>
				<?php  
					$idville= array(
 
					'name'=>'idville',
 
					'id'=>'idville',

					'value'=>set_value('idville')
 
					);


					echo'<select name=\'idville\' class="form-control",>';
					foreach ($villes as $ville):
							?>


							<option value="<?php echo $ville['idville']; ?>"><?php echo $ville['nomvile']; ?></option>
 					<?php
						
					 endforeach; 
 
					echo'</select>';
					?>
			</div>
			<div class="form-group">
						<?php
				 
			 		$submit = array(
        			'name'          => 'submit',
        		
        			'id'            => 'button',
        		
        			'value'         => 'Je m\'inscris',
        		
        			'type'          => 'submit',

        			'class'			=>		'btn btn-primary btn-lg btn-block login-button',
        		
        			'class'			=> 'login loginmodal-submit'
				
					);
			 
				  
				 
					echo form_submit('submit', 'Je m\'inscris'); ?>
			</div>
			 
			<div class="form-group">
    <?php
	
		$submit = array(
        		'name'          => 'submit',
        		
        		'id'            => 'button',
        		
        		'value'         => 'Je me connecte',
        		
        		'type'          => 'submit',
        		
        		'class'			=> 'btn btn-lg btn-primary btn-block btn-signin'
				
				);
				?>
		<a href = "<?php echo site_url('pages/view'.'home');?>">RETOUR PAGE ACCUEIL</a><br> 
	</div>
	
</body>
</html>