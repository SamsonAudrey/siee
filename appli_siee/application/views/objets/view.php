<?php 
echo '<h2>'.'Voici l\'objet'.'</h2>';
echo $objets_item['appellationobjet'].'de type : '.$objets_item['idtype'];

 ?>
 <a href="<?php echo site_url('objets/verif_delete/'.$objets_item['idobjet']); ?>">SUPPRIMER</a>