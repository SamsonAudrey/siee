<h2><?php echo $title; ?></h2>

<?php foreach ($rdv as $rdv_item): ?>

        <h3><?php echo $rdv_item['datedemande']; ?></h3>
        <div >
                <?php 
                echo "disponibilités : ".$rdv_item['datedispo1']."     ".$rdv_item['datedispo2']."     ".$rdv_item['datedispo3'];
                //."     type : ".$rdv_item['prenomclient']; ?>
        </div>
        <p><a href="<?php echo site_url('rdv/'.$rdv_item['idintervention'].'/'.$rdv_item['idclient']); ?>">Voir le RDV </a></p>

<?php endforeach; ?>