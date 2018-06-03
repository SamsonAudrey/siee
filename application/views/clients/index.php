<!DOCTYPE html>
<html>
<head>
	<title>Pages des clients (Pour admin)</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <base href = "<?php echo base_url(); ?>">
  	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>


<h2 align="center">Les clients</h2>
<div class="table-responsive">
	<div class="container">
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
		  <li class="active"><a data-toggle="tab" href="#home">Tous</a></li>
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
				      <th scope="col">Type</th>
				      <th scope="col">Nom Prénom</th>
				      <th scope="col">Mail</th>
				      <th scope="col">Téléphone</th>
				      <th scope="col">Adresse</th>
				      <th scope="col">Ville</th>
				      <th scope="col">#</th>
				    </tr>
				  </thead>
				  <tbody>
				    
				<?php $count=1; ?>


				<?php foreach ($clients as $clients_item): ?>

				<tr>
				      <th scope="row"><?php echo $count ?></th>
				      <td><?php echo $clients_item['nomtype'] ?></td>
				      <td><?php echo $clients_item['nomclient']." ".$clients_item['prenomclient']; ?></td>
				      <td><?php echo $clients_item['email'] ?></td>
				      <td><?php echo "0".$clients_item['telephoneclient'] ?></td>
				      <td><?php echo $clients_item['rueadresse']." ".$clients_item['numeroadresse'] ?></td>
				      <td><?php echo $clients_item['nomvile'] ?></td>
				      <td><a href="<?php echo site_url('clients/profil/'.$clients_item['idclient']); ?>">Voir</a></td>
				</tr>
					
				  				
				 <?php $count++;?>

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
				      <th scope="col">Type</th>
				      <th scope="col">Nom Prénom</th>
				      <th scope="col">Mail</th>
				      <th scope="col">Téléphone</th>
				      <th scope="col">Adresse</th>
				      <th scope="col">Ville</th>
				      <th scope="col">#</th>
				    </tr>
				  </thead>
				  <tbody>
				    
				<?php $count=1; ?>


				<?php foreach ($syndics as $syndics_item): ?>

				<tr>
				      <th scope="row"><?php echo $count ?></th>
				      <td><?php echo $syndics_item['nomtype'] ?></td>
				      <td><?php echo $syndics_item['nomclient']." ".$syndics_item['prenomclient']; ?></td>
				      <td><?php echo $syndics_item['email'] ?></td>
				      <td><?php echo "0".$syndics_item['telephoneclient'] ?></td>
				      <td><?php echo $syndics_item['rueadresse']." ".$syndics_item['numeroadresse'] ?></td>
				      <td><?php echo $syndics_item['nomvile'] ?></td>
				      <td><a href="<?php echo site_url('clients/profil/'.$syndics_item['idclient']); ?>">Voir</a></td>
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
				      <th scope="col">Type</th>
				      <th scope="col">Nom Prénom</th>
				      <th scope="col">Mail</th>
				      <th scope="col">Téléphone</th>
				      <th scope="col">Adresse</th>
				      <th scope="col">Ville</th>
				      <th scope="col">#</th>
				    </tr>
				  </thead>
				  <tbody>
				    
				<?php $count=1; ?>


				<?php foreach ($particuliers as $particuliers_item): ?>

				<tr>
				      <th scope="row"><?php echo $count ?></th>
				      <td><?php echo $particuliers_item['nomtype'] ?></td>
				      <td><?php echo $particuliers_item['nomclient']." ".$particuliers_item['prenomclient']; ?></td>
				      <td><?php echo $particuliers_item['email'] ?></td>
				      <td><?php echo "0".$particuliers_item['telephoneclient'] ?></td>
				      <td><?php echo $particuliers_item['rueadresse']." ".$particuliers_item['numeroadresse'] ?></td>
				      <td><?php echo $particuliers_item['nomvile'] ?></td>
				      <td><a href="<?php echo site_url('clients/profil/'.$particuliers_item['idclient']); ?>">Voir</a></td>
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