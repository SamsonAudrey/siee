<?php 
echo '<h2>'.'Voici le détail du RDV'.'</h2>';
echo "Demande de RDV faite le : ".$rdv_item['datedemande'];
echo "Disponibilités : ".$rdv_item['datedispo1']." | ".$rdv_item['datedispo2']." | ".$rdv_item['datedispo3'];
echo $rdv_item['commentairerdv'];
 ?>