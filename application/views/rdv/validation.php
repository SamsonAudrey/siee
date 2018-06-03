<!DOCTYPE html>
<html>
<head>
	<title>Détail du rdv</title>
</head>
<body>

<div class='container' align="center">
		<div class="card" style="width: 50rem;">
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<h2>Rdv</h2>
					<p class="erreur">
					<?php echo form_open('rdv/validation/'.$rdv_item['idrdv']);
					echo validation_errors(); ?></p>
				</li>
				<li class="list-group-item">
					<?php
					echo form_submit('submit', 'Valider le RDV ');
					?>
				</li>
				
				<li class="list-group-item">
					<h4>Date du rdv</h4>
					<?php echo form_label('Date','daterdv');?>
	 				<input id="daterdv" type="date" name="daterdv" value="set_value('daterdv')" requireds>
	 				<span class="validity"></span>
				</li>
				<li class="list-group-item">
					<h4>Rdv demandé le </h4>
					<p><?php echo $rdv_item['datedemande']?></p>
				</li>
				<li class="list-group-item">
					<h4>Intervention </h4>
					<p><?php echo $rdv_item['appellationservice'].' pour '.$rdv_item['appellationobjet']; ?></p>
				</li>
				<li class="list-group-item">
					<h4>Client :</h4>
					<p><?php echo $rdv_item['nomclient']."  ".$rdv_item['prenomclient'] ?></p>
				</li>
				<li class="list-group-item">
					<h4>Dates de disponibilité</h4>
					<p><?php echo $rdv_item['datedispo1'].'  ou  '.$rdv_item['datedispo2'] ?></p>
				</li>
				<li class="list-group-item">
					<h4>Commentaire du client</h4>
					<p><?php echo $rdv_item['commentairerdv']?></p>
				</li>
			</ul>
		</div>
	</div>
</body>
</html>