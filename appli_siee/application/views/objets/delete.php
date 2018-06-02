<?php 
echo '<h2>'.'Objet à supprimer : '.'</h2>';
echo $objets_item['appellationobjet'].'de type : '.$objets_item['idtype'];

echo '<h3>'.'Etes vous sur ? '.'</h3>';

//echo form_button('supprimer','SUPPRIMER');

/*$js = 'onClick="supprimer()"';
echo form_button('supprimer', 'SUPPRIMER', $js);*/
 ?>
 <a href="<?php echo site_url('objets/delete/'.$objets_item['idobjet']); ?>">Oui</a>
  <a href="<?php echo site_url('objets/view/'.$objets_item['idobjet']); ?>">Non</a>