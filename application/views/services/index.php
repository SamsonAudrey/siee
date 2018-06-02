<!DOCTYPE html>
<html>
<head>
	<title>Pages des Services</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<base href = "<?php echo base_url(); ?>">
  	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>


<h2 align="center">Les services</h2>
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
				<table class="table">
				  <thead>
				    <tr class="bg-warning">
				      <th scope="col">#</th>
				      <th scope="col">Appellation</th>
				      <th scope="col">Supprimer</th>
				    </tr>
				  </thead>
				  <tbody>
				    
				<?php $count=1; ?>


				<?php foreach ($services as $services_item): ?>

				<tr>
				      <th scope="row"><?php echo $count ?></th>
				      <td><?php echo $services_item['appellationservice']?></td>
				      <td><a href="<?php echo site_url('services/verif_delete/'.$services_item['idservice']); ?>">Supprimer</a></td>
				</tr>			
				 <?php 
				 $count++;

				endforeach;?>

				</tbody>
				</table>
		    
		</div>
	</div>
</body>
</html>
