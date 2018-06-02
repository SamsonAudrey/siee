<?php 
echo '<h2>'.'Supprimer votre compte ? '.'</h2>';

 ?>
 <a href="<?php echo site_url('clients/delete/'.$clients_item['idclient']); ?>">Oui</a>
 <a href="<?php echo site_url('clients/profil/'.$clients_item['idclient']); ?>">Non</a>