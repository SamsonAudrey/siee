<!DOCTYPE html>
<html>
<head>
	<title>Pages des RDV (Pour admin)</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <base href = "<?php echo base_url(); ?>">
  	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>


<h2 align="center">Les RDV</h2>
<div class="table-responsive">
	<div class="container">
		<ul class="nav nav-tabs">
		  <li class="active"><a data-toggle="tab" href="#home">Tous</a></li>
		  <li><a data-toggle="tab" href="#menu1">Validés</a></li>
		  <li><a data-toggle="tab" href="#menu2">En attente</a></li>
		</ul>

		<div class="tab-content">
		  <div id="home" class="tab-pane fade in active">
		    <h3>Tous</h3>
		    <p>
				<table class="table">
				  <thead>
				    <tr class="bg-warning">
				      <th scope="col">#</th>
				      <th scope="col">Date rdv</th>
				      <th scope="col">Intervention</th>
				      <th scope="col">Client</th>
				      <th scope="col">Date Demande</th>
				      <th scope="col">Dispo 1</th>
				      <th scope="col">Dispo 2</th>
				      <th scope="col">Commentaire</th>
				      <th scope="col">Validé</th>
				      <th scope="col">#</th>
				    </tr>
				  </thead>
				  <tbody>
				    
				<?php $count=1; ?>


				<?php foreach ($rdv as $rdv_item): ?>

				<tr>
				      <th scope="row"><?php echo $count ?></th>
				      <td><?php echo $rdv_item['daterdv'] ?></td>
				      <td><?php echo $rdv_item['appellationservice'].' '.$rdv_item['appellationobjet'] ?></td>
				      <td><?php echo $rdv_item['nomclient']." ".$rdv_item['prenomclient']; ?></td>
				      <td><?php echo $rdv_item['datedemande'] ?></td>
				      <td><?php echo $rdv_item['datedispo1'] ?></td>
				      <td><?php echo $rdv_item['datedispo2'] ?></td>
				      <td><a href="<?php echo site_url('rdv/'.$rdv_item['idrdv']); ?>">Voir</a></td>
				      <td><?php 
				      if($rdv_item['valide'] == 't')
				      {
				      	echo 'OUI';
				      }
				      else
				      {
				      	echo 'ATTENTE';
				      } ?></td>
				      <td><a href="<?php echo site_url('rdv/validation/'.$rdv_item['idrdv']); ?>">Valider</a></td>
				</tr> 				
				 <?php $count++;

				endforeach; ?> 

				</tbody>
				</table>
		    </p>
		</div>
		  <div id="menu1" class="tab-pane fade">
		  	<h3>Validés</h3>
			<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#menu3">Futurs</a></li>
			  <li><a data-toggle="tab" href="#menu4">Passés</a></li>
			</ul>

			<div class="tab-content">
			  <div id="menu3" class="tab-pane fade in active">
			    <h3>Futurs</h3>
			    <p>
					<table class="table">
					  <thead>
					    <tr class="bg-warning">
					      <th scope="col">#</th>
					      <th scope="col">Date rdv</th>
					      <th scope="col">Intervention</th>
					      <th scope="col">Client</th>
					      <th scope="col">Date Demande</th>
					      <th scope="col">Dispo 1</th>
					      <th scope="col">Dispo 2</th>
					      <th scope="col">Commentaire</th>
					      <th scope="col">#</th>
					    </tr>
					  </thead>
					  <tbody>
					    
					<?php $count=1; ?>


					<?php foreach ($futurs as $futur_item): ?>

					<tr>
					      <th scope="row"><?php echo $count ?></th>
					      <td><?php echo $futur_item['daterdv'] ?></td>
					      <td><?php echo $futur_item['appellationservice'].' '.$futur_item['appellationobjet'] ?></td>
					      <td><?php echo $futur_item['nomclient']." ".$futur_item['prenomclient']; ?></td>
					      <td><?php echo $futur_item['datedemande'] ?></td>
					      <td><?php echo $futur_item['datedispo1'] ?></td>
					      <td><?php echo $futur_item['datedispo2'] ?></td>
					      <td><a href="<?php echo site_url('rdv/'.$futur_item['idrdv']); ?>">Voir</a></td>
					      <td><a href="<?php echo site_url('rdv/validation/'.$futur_item['idrdv']); ?>">Modifier Date</a></td>
					</tr> 				
					 <?php $count++;

					endforeach; ?> 

					</tbody>
					</table>
			    </p>
			</div>
			  <div id="menu4" class="tab-pane fade">
			    <h3>Passés</h3>
			    <p>
					<table class="table">
					  <thead>
					    <tr class="bg-warning">
					      <th scope="col">#</th>
					      <th scope="col">Date rdv</th>
					      <th scope="col">Intervention</th>
					      <th scope="col">Client</th>
					      <th scope="col">Date Demande</th>
					      <th scope="col">Dispo 1</th>
					      <th scope="col">Dispo 2</th>
					      <th scope="col">Commentaire</th>
					    </tr>
					  </thead>
					  <tbody>
					    
					<?php $count=1; ?>


					<?php foreach ($pasts as $past_item): ?>

					<tr>
					      <th scope="row"><?php echo $count ?></th>
					      <td><?php echo $past_item['daterdv'] ?></td>
					      <td><?php echo $past_item['appellationservice'].' '.$past_item['appellationobjet'] ?></td>
					      <td><?php echo $past_item['nomclient']." ".$past_item['prenomclient']; ?></td>
					      <td><?php echo $past_item['datedemande'] ?></td>
					      <td><?php echo $past_item['datedispo1'] ?></td>
					      <td><?php echo $past_item['datedispo2'] ?></td>
					      <td><a href="<?php echo site_url('rdv/'.$past_item['idrdv']); ?>">Voir</a></td>
					</tr> 				
					 <?php $count++;

					endforeach; ?> 

					</tbody>
					</table>
			    </p>
			</div>
		    
		  </div>
		
	</div>
		  <div id="menu2" class="tab-pane fade">
		    <h3>En attente de validation</h3>
		    <p>
		    	<table class="table">
				  <thead>
				    <tr class="bg-warning">
				      <th scope="col">#</th>
					  <th scope="col">Intervention</th>
					  <th scope="col">Client</th>
					  <th scope="col">Date Demande</th>
					  <th scope="col">Dispo 1</th>
					  <th scope="col">Dispo 2</th>
					  <th scope="col">Date rdv</th>
					  <th scope="col">Commentaire</th>
					  <th scope="col">Validé</th>
					  <th scope="col">#</th>
				    </tr>
				  </thead>
				  <tbody>
				    
				<?php $count=1; ?>


				<?php foreach ($attentes as $attente_item): ?>

				<tr>
				      <th scope="row"><?php echo $count ?></th>
				      <td><?php echo $attente_item['appellationservice'].' '.$attente_item['appellationobjet'] ?></td>
				      <td><?php echo $attente_item['nomclient']." ".$attente_item['prenomclient']; ?></td>
				      <td><?php echo $attente_item['datedemande'] ?></td>
				      <td><?php echo $attente_item['datedispo1'] ?></td>
				      <td><?php echo $attente_item['datedispo2'] ?></td>
				      <td><?php echo $attente_item['daterdv'] ?></td>
				      <td><a href="<?php echo site_url('rdv/'.$attente_item['idrdv']); ?>">Voir</a></td>
				      <td><?php 
				      if($attente_item['valide'] == 't')
				      {
				      	echo 'OUI';
				      }
				      else
				      {
				      	echo 'ATTENTE';
				      } ?></td>
				      <td><a href="<?php echo site_url('rdv/validation'.$attente_item['idrdv']); ?>">Valider</a></td>
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
