
<!DOCTYPE html>
<html>
<head>
	<title>Page de modification du profil</title>
	<meta charset="utf-8">

	
</head>
<body>
	
	<div align="center">
		<div class="form-group">
			<h3>Modification</h3><br>

			<?php echo validation_errors(); ?>
		</div>
		<div class="form-group">
			
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
		</div>			
		<div class="form-group">
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
		</div>
		<div class="form-group">
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
				 
				'value'=>$clients_item['email']
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

			'class'		=>	 'form-control'
			);
			echo form_input($email2); ?>
						
		</div>
			
			<div class="form-group">
				<?php echo form_label('Rue :', 'rueadresse'); ?>
				<?php 
						$rueadresse= array(
	 
						'name'=>'rueadresse',
				 
						'id'=>'rueadresse',
				 
						'placeholder'=>'Rue de l\'exemple',

						'class'		=>	 'form-control',
				 
						'value'=>$clients_item['rueadresse']
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
				 
						'value'=>$clients_item['numeroadresse']
						);
						echo form_input($numeroadresse); ?>
			</div>
			<div class="form-group">
				<?php echo form_label('Ville :', 'idville'); ?>
				<?php  
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
			</div>
			<div class="form-group">
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
			</div>
			 
			<div class="form-group">
    <?php
	
		$submit = array(
        		'name'          => 'submit',
        		
        		'id'            => 'button',
        		
        		'value'         => 'retour',
        		
        		'type'          => 'submit',
        		
        		'class'			=> 'btn btn-lg btn-primary btn-block btn-signin'
				
				);
				?>
		<a href = "<?php echo site_url('pages/view'.'home');?>">RETOUR PAGE ACCUEIL</a><br> 
	</div>
	
</body>
</html>