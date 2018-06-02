<h2><?php echo $title; ?></h2>

<?php foreach ($interventions as $interventions_item): ?>

        <h3><?php echo $interventions_item['idintervention']; ?></h3>
        <div class="main">
                <?php 
    				echo "Cette intervention est : ".$interventions_item['appellationservice']." pour ".$interventions_item['appellationobjet'].""; 
    				//probleme affichage !!!!! 
				

                ?>
        </div>
        <p><a href="<?php echo site_url('interventions/'.$interventions_item['idintervention']); ?>">Voir l'intervention</a></p>

<?php endforeach; ?>