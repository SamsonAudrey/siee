<!DOCTYPE html>
<html>
<head>
	<title>Page de connexion</title>
	<meta charset="utf-8">
	<base href = "<?php echo base_url(); ?>">
  	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<body>
	<div class='container' align="center">
		<div class="card" style="width: 50rem;">
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<h2>Connexion</h2>
					<p class="erreur">
					<?php echo $erreur; ?>
					<?php echo validation_errors(); ?>
					</p>
				</li>
				<li class="list-group-item">
			<!-- <div class="form-group"> -->
					<?php echo form_open('clients/connexion'); ?>
					<?php echo form_label('Mail :', 'emailconnect'); ?>
					<?php 
					$emailconnect= array(
		 			'name'		=>		'emailconnect',
			 
					'id'		=>		'emailconnect',

					'type'		=>		'email',
					 
					'placeholder'=>		'exemple@gmail.com',

					'class'		=>		'form-control',
					 
					'value'=>set_value('emailconnect')
					);
					echo form_input($emailconnect); ?>
				</li>
			<!-- <div class="form-group"> -->
				<li class="list-group-item">
					<?php echo form_label('Mot de passe :', 'mdpconnect'); ?>
					<?php 
					$mdpconnect= array(
		 
					'name'		=>		'mdpconnect',
					
					'id'		=>		'mdpconnect',

					'type'		=>		'password',
					 
					'placeholder'=>		'Votre mot de passe',

					'class'		=>		'form-control',

					);
					echo form_input($mdpconnect); ?>
				</li>
			<!-- <div class="form-group"> -->
				<li class="list-group-item">
					<?php 
					$submit = array(
	        		'name'          => 'submit',
	        		
	        		'id'            => 'button',
	        		
	        		'value'         => 'Je me connecte',
	        		
	        		'type'          => 'submit',
	        		
	        		'class'			=> 'btn btn-lg btn-primary btn-block btn-signin'
					
					);
					echo form_submit($submit); ?>
				</li>
			</ul>
		</div>
	</div>

			
</body>
</html>
