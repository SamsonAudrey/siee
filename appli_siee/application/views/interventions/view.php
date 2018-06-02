<?php 
echo '<h2>'.'Détail de l\'intervention'.'</h2>';
echo 'Numéro d\'intervention '.$interventions_item['idintervention']."\n";

echo 'Intervention : '.$interventions_item['appellationservice'].' pour '.$interventions_item['appellationobjet'];

echo 'Durée :'.$interventions_item['dureeintervention'].' H'."\n";
echo 'Description : '.$interventions_item['descriptionintervention']."\n";
 ?>

  <a href="<?php echo site_url('interventions/verif_delete/'.$interventions_item['idintervention']); ?>">SUPPRIMER</a>