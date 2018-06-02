<?php 
echo '<h2>'.'Objet à supprimer : '.'</h2>';


echo '<h3>'.'Etes vous sur ? '.'</h3>';

//echo form_button('supprimer','SUPPRIMER');

/*$js = 'onClick="supprimer()"';
echo form_button('supprimer', 'SUPPRIMER', $js);*/
 ?>
 <a href="<?php echo site_url('interventions/delete/'.$interventions_item['idintervention']); ?>">Oui</a>
  <a href="<?php echo site_url('interventions/view/'.$interventions_item['idintervention']); ?>">Non</a>