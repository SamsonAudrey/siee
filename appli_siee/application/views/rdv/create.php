<!DOCTYPE html>
<html>
<head>
	<title>Creation RDV</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
  <base href = "<?php echo base_url(); ?>">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>


	<div class='container' align="center">
		<div class="card" style="width: 50rem;">
  			<ul class="list-group list-group-flush">
				<li class="list-group-item">
				<h2><?php echo $title; ?></h2>

					<?php echo validation_errors(); ?>
				</li>
		

				<li class="list-group-item">
					<?php 
		 			echo form_open('rdv/create/'.$client['idclient']);?>
					<?php
		 			echo form_label('IDintervention', 'idintervention');
					$idintervention= array(
		 
					'name'=>'idintervention',

					'class'	=>'form-control',
		 
					'id'=>'idintervention'
		 
					);

					/*$this->db->select('idintervention,idservice,interventions.idobjet');
					$this->db->from('interventions');
					$this->db->join('objets', 'objets.idobjet = interventions.idobjet');
					$this->db->where('objets.idtype',$client['idtype']);
					$this->db->order_by('idservice', 'ASC');
					$query = $this->db->get();*/

					echo'<select name=\'idintervention\' class="form-control">';
					foreach ($interventions as $interv)
					{
						/*if (isset($row)){
						$this->db->select('appellationservice');
						$this->db->where('idservice',$row->idservice);
						$service = $this->db->get('services');
						$this->db->select('appellationobjet');
						$this->db->where('idobjet',$row->idobjet);
						$objet = $this->db->get('objets');*/
						/*	foreach ($service->result() as $serv) {
								foreach ($objet->result() as $obj) {*/
								?>
									<option value="<?php echo $interv['idintervention']; ?>"><?php echo $interv['appellationservice']." ".$interv['appellationobjet']; ?></option>
								<?php
								}
					echo '</select>';
			 		?>


			 	</li>
				
				<li class="list-group-item">
	 			<h3>Choisissez deux jours de disponibilité </h3>
	 			<?php
	 			echo form_label('Date','datedispo1');?>
	 			<input id="datedispo1" type="date" name="datedispo1" requireds>
	 			<span class="validity"></span>
	 			
	 			</li>
	 			<li class="list-group-item">
 		
		 			<?php
		 			echo form_label('Date','datedispo2');?>
		 			<input id="datedispo2" type="date" name="datedispo2" requireds>
		 			<span class="validity"></span>
 			
 				</li>
		 		
				<li class="list-group-item">
					<h3> Expliquer votre demande </h3>
					<?php
					echo form_label('Commentaire','commentairerdv');
					$commentairerdv= array(
	 
					'name'=>'commentairerdv',
	 
					'id'=>'commentairerdv',
	 
					'placeholder'=>'Commentaire...',

					'class'		=>		'form-control',
	 
					'value'=>set_value('commentairerdv')
	 
					);
					echo form_textarea($commentairerdv);
					?>
				</li>
				<li class="list-group-item">
					<?php
					echo form_submit('submit', 'Valider le RDV ');
					?>
				</li>

		<?php

  			echo form_close();

  			
			?>
		</ul>
	</div>
</div>
	
			
</body>
</html>

