<!DOCTYPE html>
<html>
<head>
	<title>Page de connexion</title>
	<meta charset="utf-8">
	
	

</head>
<body>
	<div align="center">
	<div class="form-group">
        	<!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
        </div>
			<?php echo validation_errors(); ?>
			<div class="form-group">
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
			</div>	
			<div class="form-group">
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
				echo form_submit($submit); ?>
			</div>
		</div>
</body>
</html>
