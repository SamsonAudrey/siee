<!DOCTYPE html>
<html>
<head>
	<title>Pages des interventions</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <base href = "<?php echo base_url(); ?>">
  	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

<h2 align="center">Les interventions</h2>
	<div class="container">
		<div class="table-responsive">
			<div class="card" style="width: 35rem;">
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<input id="string" name="string" type="text" value="" />
					<input type="submit" value="Rechercher" onclick="searchString()" />
					<script>
					function searchString() {
		  				var Sstring = $('#string').val();
		  				if( Sstring != ""){
		  					$("tr:contains('" + Sstring + "')").css("background", "#FF8C00");
		  				}
		  				else{
		  					$("tr:contains('" + Sstring + "')").css("background", "white");
		  				}
					}	
					</script>
				</li>
			</ul>
			</div>
			<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#home">Toutes</a></li>
			  <li><a data-toggle="tab" href="#menu1">Syndics</a></li>
			  <li><a data-toggle="tab" href="#menu2">Particuliers</a></li>
			</ul>

			<div class="tab-content">
			  <div id="home" class="tab-pane fade in active">
			    <h3>Tous</h3>
		    	<p>
				<table class="table">
				  <thead>
				    <tr class="bg-warning">
				      <th scope="col">#</th>
				      <th scope="col">Service</th>
				      <th scope="col">Objet</th>
				      <th scope="col">Durée (heure)</th>
				      <th scope="col">Description</th>
				      <th scope="col">Modifier</th>
				      <th scope="col">Supprimer</th>
				    </tr>
				  </thead>
				  <tbody>
				    
				

				<?php foreach ($interventions as $interventions_item): ?>
				

				<tr>
				      <th scope="row"><?php echo $interventions_item['idintervention'] ?></th>
				      <td><?php echo $interventions_item['appellationservice'] ?></td>
				      <td><?php echo $interventions_item['appellationobjet']?></td>
				      <td><?php echo $interventions_item['dureeintervention'] ?></td>
				      <td><a href="<?php echo site_url('interventions/'.$interventions_item['idintervention']); ?>">Voir</a></td>
				      <td><a href="<?php echo site_url('interventions/modif_interventions/'.$interventions_item['idintervention']); ?>">Modifier</a></td>
				      <td><a href="<?php echo site_url('interventions/verif_delete/'.$interventions_item['idintervention']); ?>">Supprimer</a></td>
				</tr>

				<?php endforeach; ?> 

				</tbody>
				</table>
			</p>
		</div>
			<div id="menu1" class="tab-pane fade">
		    <h3>Syndics</h3>
		    <p>
		    	<table class="table">
				  <thead>
				    <tr class="bg-warning">
				      <th scope="col">#</th>
				      <th scope="col">Service</th>
				      <th scope="col">Objet</th>
				      <th scope="col">Durée (heure)</th>
				      <th scope="col">Description</th>
				      <th scope="col">Modifier</th>
				      <th scope="col">Supprimer</th>
				    </tr>
				  </thead>
				  <tbody>
				    
				<?php $count=1; ?>


				<?php foreach ($syndics as $syndics_item): ?>

				<tr>
				      <th scope="row"><?php echo $syndics_item['idintervention'] ?></th>
				      <td><?php echo $syndics_item['appellationservice'] ?></td>
				      <td><?php echo $syndics_item['appellationobjet']?></td>
				      <td><?php echo $syndics_item['dureeintervention'] ?></td>
				      <td><a href="<?php echo site_url('interventions/'.$syndics_item['idintervention']); ?>">Voir</a></td>
				      <td><a href="<?php echo site_url('interventions/modif_interventions/'.$syndics_item['idintervention']); ?>">Modifier</a></td>
				      <td><a href="<?php echo site_url('interventions/verif_delete/'.$syndics_item['idintervention']); ?>">Supprimer</a></td>
				</tr>
					
				  				
				 <?php $count++;?>

				<?php endforeach; ?> 

				</tbody>
				</table>
		    </p>
		  </div>
		  <div id="menu2" class="tab-pane fade">
		    <h3>Particuliers</h3>
		    <p>
		    	<table class="table">
				  <thead>
				    <tr class="bg-warning">
				      <th scope="col">#</th>
				      <th scope="col">Service</th>
				      <th scope="col">Objet</th>
				      <th scope="col">Durée (heure)</th>
				      <th scope="col">Description</th>
				      <th scope="col">Modifier</th>
				      <th scope="col">Supprimer</th>
				    </tr>
				  </thead>
				  <tbody>
				    
				<?php $count=1; ?>


				<?php foreach ($particuliers as $particuliers_item): ?>

				<tr>
				      <th scope="row"><?php echo $particuliers_item['idintervention'] ?></th>
				      <td><?php echo $particuliers_item['appellationservice'] ?></td>
				      <td><?php echo $particuliers_item['appellationobjet']?></td>
				      <td><?php echo $particuliers_item['dureeintervention'] ?></td>
				      <td><a href="<?php echo site_url('interventions/'.$particuliers_item['idintervention']); ?>">Voir</a></td>
				      <td><a href="<?php echo site_url('interventions/modif_interventions/'.$particuliers_item['idintervention']); ?>">Modifier</a></td>
				      <td><a href="<?php echo site_url('interventions/verif_delete/'.$particuliers_item['idintervention']); ?>">Supprimer</a></td>
				</tr>
					
				  				
				 <?php $count++;?>

				<?php endforeach; ?> 

				</tbody>
				</table>
		    </p>
		</div>
	</div>
</div>
</div>
</div>
</body>
</html>
