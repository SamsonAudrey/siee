
<!DOCTYPE html>
<html>
<head>
	<title>Pages des RDV (Pour client)</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <base href = "<?php echo base_url(); ?>">
  	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>


<h2 align="center">Mes RDV</h2>
<div class="table-responsive">
	<div class="container">
		

		<div class="tab-content">
				<table class="table">
				  <thead>
				    <tr class="bg-warning">
				      <th scope="col">#</th>
				      <th scope="col">Date rdv</th>
				      <th scope="col">Intervention</th>
				      <th scope="col">Date Demande</th>
				      <th scope="col">Dispo 1</th>
				      <th scope="col">Dispo 2</th>
				      <th scope="col">Commentaire</th>
				      <th scope="col">Validé</th>
				      <th scope="col">Annulation</th>
				    </tr>
				  </thead>
				  <tbody>
				    
				<?php $count=1; ?>


				<?php foreach ($rdvmine as $rdv_item): ?>

				<tr>
				      <th scope="row"><?php echo $count ?></th>
				      <td><?php echo $rdv_item['daterdv'] ?></td>
				      <td><?php echo $rdv_item['appellationservice'].' '.$rdv_item['appellationobjet'] ?></td>
				      <td><?php echo $rdv_item['datedemande'] ?></td>
				      <td><?php echo $rdv_item['datedispo1'] ?></td>
				      <td><?php echo $rdv_item['datedispo2'] ?></td>
				      <td><?php echo $rdv_item['commentairerdv'] ?></td>
				      <td><?php 
				      if($rdv_item['valide'] == 't')
				      {
				      	echo 'OUI';
				      }
				      else
				      {
				      	echo 'ATTENTE';
				      } ?></td>
				      <td><a href="<?php echo site_url('rdv/verif_delete/'.$rdv_item['idrdv']); ?>">Annuler</a></td>
				</tr> 				
				 <?php $count++;

				endforeach; ?> 

				</tbody>
				</table>
		    
		</div>
		  
	</div>
</div>

</body>
</html>
