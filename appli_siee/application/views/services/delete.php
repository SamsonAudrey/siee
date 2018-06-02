<?php 
echo '<h2>'.'service à supprimer : '.'</h2>';
echo $services_item['appellationservice'];

echo '<h3>'.'Etes vous sur ? '.'</h3>';

 ?>
 <a href="<?php echo site_url('services/delete/'.$services_item['idservice']); ?>">Oui</a>
  <a href="<?php echo site_url('services/view/'.$services_item['idservice']); ?>">Non</a>